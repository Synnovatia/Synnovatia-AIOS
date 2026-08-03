"""
DataOS — Dashboard Revenue Query

Fixed, zero-argument query used by the dashboard-daily-refresh scheduled task
to pull the latest Stripe snapshot and the MTD revenue trend. Kept as a
standalone script (rather than an inline python3 -c one-liner) so the
scheduled task invokes the exact same command every morning — that lets a
single permission-allowlist entry cover it indefinitely, instead of a fresh
ad hoc one-liner needing fresh approval each run.

Usage:
    python3 scripts/dashboard_revenue.py
"""

import sqlite3
from pathlib import Path

WORKSPACE_ROOT = Path(__file__).resolve().parent.parent
DB_PATH = WORKSPACE_ROOT / "data" / "data.db"


def main():
    con = sqlite3.connect(str(DB_PATH))

    latest = con.execute(
        "select * from stripe_daily order by date desc limit 1"
    ).fetchall()
    columns = [d[0] for d in con.execute("select * from stripe_daily limit 1").description]
    print("LATEST_COLUMNS:", columns)
    print("LATEST_ROW:", latest[0] if latest else None)

    trend = con.execute(
        "select date, revenue_mtd from stripe_daily order by date"
    ).fetchall()
    print("MTD_TREND:")
    for row in trend:
        print(row[0], row[1])

    con.close()


if __name__ == "__main__":
    main()
