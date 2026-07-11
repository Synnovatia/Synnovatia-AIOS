# System: DataOS

> Local data pipeline that collects business metrics daily and generates `context/group/key-metrics.md` for every session.

## Architecture

```
[Stripe API] --> [scripts/collect_stripe.py] --> [data/data.db (SQLite)] --> [scripts/generate_metrics.py] --> [context/group/key-metrics.md]
                                                         ^
                                              [scripts/collect.py orchestrator]
                                                         ^
                                    [macOS launchd, daily @ 6am, config/com.aios.data-collect.plist]
```

HubSpot is queried live via the MCP connector on demand (not part of the daily SQLite pipeline).

## Key Files

| File | Purpose |
|------|---------|
| `scripts/collect.py` | Orchestrator — discovers and runs all `collect_*.py` files |
| `scripts/collect_stripe.py` | Stripe collector — revenue via Charges minus Refunds |
| `scripts/db.py` | SQLite connection/init helpers |
| `scripts/config.py` | `.env` loader |
| `scripts/generate_metrics.py` | Reads `data/data.db`, writes `context/group/key-metrics.md` |
| `data/data.db` | SQLite database, daily snapshots (gitignored) |
| `data/key-metrics.md` | Manual baseline + goals-progress tracker (not auto-generated) |
| `config/com.aios.data-collect.plist` | macOS launchd job, runs `collect.py` daily at 6am |

## How It Works

1. `launchd` runs `scripts/collect.py` every morning at 6am
2. It discovers `collect_*.py` files in `scripts/` and runs each one
3. `collect_stripe.py` reads `STRIPE_API_KEY_MAIN` from `.env`, pulls succeeded Charges and Refunds for MTD/YTD, and writes to the `stripe_daily` table
4. After collection, `generate_metrics.py` runs automatically and rewrites `context/group/key-metrics.md`
5. Claude reads `context/group/key-metrics.md` at the start of every session

## Configuration

| Variable | Purpose | Required |
|----------|---------|----------|
| `STRIPE_API_KEY_MAIN` | Restricted read-only Stripe key (Customers, Invoices, Charges, Refunds — all Read) | Yes, for Stripe collection |

## Common Operations

**Run collection manually:**
```bash
.venv/bin/python scripts/collect.py
```

**Regenerate metrics without re-collecting:**
```bash
.venv/bin/python scripts/generate_metrics.py
```

**Check the daily automated job:**
```bash
launchctl list | grep aios
cat data/collect.log
```

**Debug issues:**
- If a collector is skipped, check `.env` has the right key set
- If numbers look wrong, check `data/collect.log` for the collection run output

## Gotchas

- **Revenue is Charges minus Refunds, not Invoice totals.** Synnovatia bills through a mix of Invoices and Checkout/Payment Links; only Charges capture all payment methods. An earlier Invoice-only version undercounted revenue by ~$1,350 (two mastermind payments that weren't invoiced).
- **Google Analytics is not connected.** Blocked by a Google Cloud org policy (`iam.disableServiceAccountKeyCreation`) on Jackie's account. Update GA numbers manually via "update my metrics" instead of trying to re-enable the policy.
- **Quicken has no API.** Manual updates only.
- **`data/key-metrics.md` vs `context/group/key-metrics.md`:** the former is a manually-maintained baseline + goals tracker; the latter is fully auto-generated from `data/data.db` on every collection run. Don't confuse the two.

## Dependencies

- **Depends on:** Python venv at `.venv/` (python-dotenv, requests, stripe), `.env` for credentials
- **Used by:** Session initialization (reads `context/group/key-metrics.md`), "update my metrics" workflow

## History

| Date | Change |
|------|--------|
| 2026-07-11 | Initial DataOS install — Stripe (live, charge-based) + HubSpot (live, on-demand) connected; Google Analytics and Quicken deferred to manual updates |
