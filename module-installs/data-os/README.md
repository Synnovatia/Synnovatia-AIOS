# DataOS

> Pipe all your business data into one local database — fresh metrics every day, full picture every session.

| Field | Value |
|-------|-------|
| Module | `data-os` |
| Version | v1 |
| Phase | 1 - Foundation |
| Requires | ContextOS |
| Setup Time | 30-60 minutes |
| Running Cost | Free |

## What This Does

- **Discovers your data sources** through an interactive workshop — Claude maps your business and suggests what to connect
- **Builds custom collectors** for your specific tools (Stripe, YouTube, GA4, Google Sheets, Bitly, and more)
- **Creates a local SQLite database** with daily snapshots so you can track trends over time
- **Generates a key-metrics file** your AI reads every session — it always knows the current state of your business
- **Runs daily on autopilot** — a cron job collects everything at 6 AM, so data is fresh when you start work

## What You Need

- A computer (Mac, Linux, or Windows)
- Claude Code installed
- ContextOS installed (or willingness to describe your business during setup)
- Python 3.10+
- Accounts for whatever platforms you want to connect (Stripe, YouTube, GA4, etc.)

## How to Install

1. Open this workspace in Claude Code
2. Run `/install module-installs/data-os`
3. Follow along — Claude runs an interactive discovery workshop, then builds your custom pipeline

**Estimated setup time:** 30-60 minutes (depends on how many sources you connect)

## Running Cost

- **Database:** Free (SQLite on your machine, grows ~1MB per year of daily data)
- **API calls:** Free for most sources (YouTube, Stripe, GA4, Bitly all have free tiers)
- **Total: $0/month** for typical usage

## What's Inside

| File | Purpose |
|------|---------|
| `INSTALL.md` | Interactive installation workshop (Claude reads this) |
| `scripts/db.py` | Database framework |
| `scripts/config.py` | Environment variable loader |
| `scripts/collect.py` | Collection orchestrator |
| `scripts/generate_metrics.py` | Key metrics generator |
| `scripts/collect_fx_rates.py` | Starter collector (no auth needed) |
| `scripts/examples/*.py` | Reference collectors (YouTube, Stripe, GA4, Sheets, Bitly) |
| `scripts/.env.example` | API key template |
| `config/com.EVOLV-OS.data-collect.plist` | macOS daily scheduling template |

## Architecture

```
Your Data Sources          Collectors              Database            Output
━━━━━━━━━━━━━━━━          ━━━━━━━━━━              ━━━━━━━━            ━━━━━━
YouTube      ─────→  collect_youtube.py  ─┐
Stripe       ─────→  collect_stripe.py   ─┤
GA4          ─────→  collect_ga4.py      ─┼──→  data.db  ──→  key-metrics.md
Sheets       ─────→  collect_sheets.py   ─┤      (SQLite)      (read each session)
Bitly        ─────→  collect_bitly.py    ─┘
                          ▲
                     collect.py (orchestrator)
                          ▲
                     cron job (6 AM daily)
```

---

> Part of the **Evolv AI EVOLV-OS Program** — helping businesses recover time and increase profitability through AI automation. [evolv.one](https://evolv.one)
