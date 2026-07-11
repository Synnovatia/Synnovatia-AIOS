"""
DataOS — Stripe Revenue Collector (Charge-based, Synnovatia)

Synnovatia collects payment via a mix of Invoices and direct Checkout/Payment
Links, so Invoice totals alone undercount revenue. Charges (net of Refunds)
match Stripe's own dashboard total and are used as the source of truth here.
Invoice count is kept as a secondary, informational metric.

Requires:
    STRIPE_API_KEY_MAIN in .env (restricted key with Customers: Read,
    Invoices: Read, Charges: Read, Refunds: Read)

Tables created: stripe_daily
Extra pip: stripe
"""

import os
from datetime import datetime, timezone
from pathlib import Path
from dotenv import load_dotenv

load_dotenv(Path(__file__).resolve().parent.parent / ".env")

try:
    import stripe
except ImportError:
    raise ImportError(
        "Missing 'stripe' package — run: pip install stripe"
    )


def _collect_account(api_key, account_name):
    """Collect charge-based revenue data from a single Stripe account."""
    stripe.api_key = api_key

    now = datetime.now(timezone.utc)
    month_start = now.replace(day=1, hour=0, minute=0, second=0, microsecond=0)
    month_start_ts = int(month_start.timestamp())
    year_start_ts = int(now.replace(month=1, day=1, hour=0, minute=0, second=0, microsecond=0).timestamp())

    currency = "USD"

    def _revenue_since(ts):
        gross = 0.0
        customers = set()
        for ch in stripe.Charge.list(created={"gte": ts}, limit=100).auto_paging_iter():
            if ch.status != "succeeded":
                continue
            gross += (ch.amount or 0) / 100
            if ch.customer:
                customers.add(ch.customer)
        refunds = 0.0
        for rf in stripe.Refund.list(created={"gte": ts}, limit=100).auto_paging_iter():
            refunds += (rf.amount or 0) / 100
        return gross, refunds, customers

    gross_mtd, refunds_mtd, customers_mtd = _revenue_since(month_start_ts)
    gross_ytd, refunds_ytd, _ = _revenue_since(year_start_ts)

    # Informational: count of paid invoices (subset of total revenue, not summed separately)
    invoices_paid_mtd = 0
    for inv in stripe.Invoice.list(created={"gte": month_start_ts}, limit=100).auto_paging_iter():
        if inv.status == "paid":
            invoices_paid_mtd += 1
            currency = (inv.currency or "usd").upper()

    total_customers = 0
    for _ in stripe.Customer.list(limit=100).auto_paging_iter():
        total_customers += 1

    return {
        "account": account_name,
        "currency": currency,
        "revenue_mtd": round(gross_mtd - refunds_mtd, 2),
        "revenue_ytd": round(gross_ytd - refunds_ytd, 2),
        "refunds_mtd": round(refunds_mtd, 2),
        "invoices_paid_mtd": invoices_paid_mtd,
        "customers_billed_mtd": len(customers_mtd),
        "total_customers": total_customers,
    }


def collect():
    """Collect Stripe data from all configured accounts."""
    accounts = {}
    for key, value in os.environ.items():
        if key.startswith("STRIPE_API_KEY_") and value.strip():
            name = key.replace("STRIPE_API_KEY_", "").lower()
            accounts[name] = value.strip()

    if not accounts:
        return {
            "source": "stripe", "status": "skipped",
            "reason": "No STRIPE_API_KEY_* found in .env — "
                      "add STRIPE_API_KEY_MAIN=rk_live_... "
                      "(get yours at dashboard.stripe.com/apikeys)"
        }

    results = {}
    errors = []
    for name, api_key in accounts.items():
        try:
            results[name] = _collect_account(api_key, name)
        except Exception as e:
            errors.append(f"{name}: {e}")

    if not results:
        return {
            "source": "stripe", "status": "error",
            "reason": "; ".join(errors)
        }

    return {
        "source": "stripe",
        "status": "success",
        "data": {"accounts": results, "errors": errors}
    }


def write(conn, result, date):
    """Write Stripe data to database. Returns records written."""
    conn.execute("""
        CREATE TABLE IF NOT EXISTS stripe_daily (
            date TEXT NOT NULL,
            account TEXT NOT NULL,
            currency TEXT,
            revenue_mtd REAL,
            revenue_ytd REAL,
            refunds_mtd REAL,
            invoices_paid_mtd INTEGER,
            customers_billed_mtd INTEGER,
            total_customers INTEGER,
            collected_at TEXT,
            PRIMARY KEY (date, account)
        )
    """)

    if result.get("status") != "success":
        conn.commit()
        return 0

    collected_at = datetime.now(timezone.utc).isoformat()
    records = 0

    for name, data in result["data"]["accounts"].items():
        conn.execute(
            "INSERT OR REPLACE INTO stripe_daily "
            "(date, account, currency, revenue_mtd, revenue_ytd, refunds_mtd, invoices_paid_mtd, "
            "customers_billed_mtd, total_customers, collected_at) "
            "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
            (date, name, data["currency"], data["revenue_mtd"], data["revenue_ytd"], data["refunds_mtd"],
             data["invoices_paid_mtd"], data["customers_billed_mtd"],
             data["total_customers"], collected_at)
        )
        records += 1

    conn.commit()
    return records


if __name__ == "__main__":
    result = collect()
    if result["status"] == "success":
        for name, data in result["data"]["accounts"].items():
            print(f"\n{data['account']} ({data['currency']}):")
            print(f"  Revenue MTD: ${data['revenue_mtd']:,.2f}")
            print(f"  Revenue YTD: ${data['revenue_ytd']:,.2f}")
            print(f"  Refunds MTD: ${data['refunds_mtd']:,.2f}")
            print(f"  Invoices paid MTD: {data['invoices_paid_mtd']}")
            print(f"  Customers billed MTD: {data['customers_billed_mtd']}")
            print(f"  Total customers: {data['total_customers']}")
    else:
        print(f"{result['status']}: {result.get('reason', '')}")
