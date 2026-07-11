# IntelOS

> Give your AI a perfect memory — every meeting and message, searchable forever.

| Field | Value |
|-------|-------|
| Module | `intel-os` |
| Version | v1 |
| Phase | 2 - Intelligence |
| Requires | ContextOS + DataOS |
| Setup Time | 20-30 minutes |
| Running Cost | Free |

## What This Does

- **Collects meeting recordings** automatically from Fireflies, Fathom, or your custom recorder into a searchable database
- **Collects Slack messages** daily — every channel, every thread, resolved to real names
- **Classifies meetings** by department/team so you can filter by stream (sales, engineering, etc.)
- **Instant search** — ask your AI to find any meeting or Slack conversation by person, topic, or date

## What You Need

- A computer (Mac, Linux, or Windows)
- Claude Code installed
- ContextOS + DataOS modules installed (or willingness to run standalone)
- A meeting recorder account: [Fireflies](https://fireflies.ai) (free tier) or [Fathom](https://fathom.ai) (free tier)
- A Slack workspace (optional)

## How to Install

1. Open this workspace in Claude Code
2. Run `/install module-installs/intel-os`
3. Follow along — Claude handles everything

**Estimated setup time:** 20-30 minutes

## Running Cost

- **Meeting collection:** Free (Fireflies and Fathom both have free tiers)
- **Slack collection:** Free (Slack API is free for reading messages)
- **Storage:** Free (SQLite on your machine, ~1MB per 100 meetings)
- **Total: $0/month** for basic usage

## What's Inside

| File | Purpose |
|------|---------|
| `INSTALL.md` | Installation guide (Claude reads this) |
| `scripts/db.py` | Database setup and query helpers |
| `scripts/collect_fireflies.py` | Fireflies meeting collector |
| `scripts/collect_fathom.py` | Fathom meeting collector |
| `scripts/collect_slack.py` | Slack message collector |
| `scripts/classify.py` | Meeting classifier (by department) |
| `scripts/collect_all.py` | Master collection script |
| `scripts/.env.example` | API key template |
| `config/com.EVOLV-OS.intel-collect.plist` | macOS scheduling template |

---

> Part of the **Evolv AI EVOLV-OS Program** — helping businesses recover time and increase profitability through AI automation. [evolv.one](https://evolv.one)
