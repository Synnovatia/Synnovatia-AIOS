# System: Content Pipeline

> Content idea tracking for LinkedIn and the blog — capture → develop → schedule, with strategic positioning and platform-specific packaging on every piece. Installed 2026-07-27 from `module-installs/content-pipeline-v1/` (AAA Accelerator module). Layers on top of — does not replace — the existing LinkedIn Monday-batch workflow in `context/linkedin-marketing.md`.

## Architecture

```
/capture [idea] --> stub in [data/content.db] --> /develop #id --> [content/concepts/{id}-{slug}.md]
                                                          |                        |
                                            reads content/strategy.md,   writes developed idea
                                            brand-and-audience.md,       back to content_ideas
                                            offers-and-funnels.md,                |
                                            + 7-day context window                v
                                            (context_aggregator.py)      /schedule --> publish_date + film_by_date
                                                                                       |
                                                                          content/pipeline.md regenerated
                                                                          (dashboard view, generate_pipeline.py)
```

## Key Files

| File | Purpose |
|------|---------|
| `content/strategy.md` | Platform/cadence (LinkedIn 3x/week Mon-Wed-Fri, blog 1x/month), 4 content pillars, competitor ICP-fit analysis, Search Console-sourced keyword-target table |
| `content/brand-and-audience.md` | Brand positioning + 3 audience segments (Messy Middle Owner, Scaling B2B Owner, 1:1/Retainer Prospect) |
| `content/offers-and-funnels.md` | Active offers, funnels, CTA bank, audience→offer alignment (blog is CTA-light; no free offer currently active) |
| `content/pipeline.md` | Auto-generated dashboard — all ideas grouped by stage, regenerated after every write |
| `content/concepts/{id}-{slug}.md` | Full concept doc per developed idea, written by `/develop` |
| `data/content.db` | SQLite — `content_ideas` (full lifecycle) + `published_content` (context-window source) |
| `scripts/content_pipeline/db.py` | Schema + connection — **namespaced in its own subfolder**, see Gotchas |
| `scripts/content_pipeline/writer.py` | CRUD: `write_content_idea`, `write_developed_idea`, `update_status`, `log_published_content` |
| `scripts/content_pipeline/context_aggregator.py` | Builds the 7-day context window (recent published content, DataOS meetings if available, pipeline state) for `/develop` |
| `scripts/content_pipeline/generate_pipeline.py` | Renders `content/pipeline.md` from the database |
| `.claude/commands/capture.md` | `/capture` — quick idea capture + duplicate check |
| `.claude/commands/develop.md` | `/develop` — strategic positioning + packaging, interactive, confirms at each stage |
| `.claude/commands/schedule.md` | `/schedule` — batch scheduling against the real cadence, conflict detection |

## How It Works

`/capture [idea]` checks for duplicates, classifies channel/format/pillar against `content/strategy.md`, and stores a stub. `/develop #id` reads all three strategy docs plus the 7-day context window, presents a strategic frame (audience/authority/offer/funnel) for confirmation, then platform-specific packaging — LinkedIn hooks + visual concept, or blog meta title/H1/subheadings/internal links using the real keyword-target table — for confirmation, then writes the full concept to both the database and a concept doc. `/schedule` shows developed ideas ranked by priority, lets Jackie pick what to schedule and when, calculates `film_by_date` from `publish_date` minus format turnaround, and flags date conflicts. Nothing auto-publishes — LinkedIn posts still go out only via Jackie's own LinkedIn scheduling; blog CTAs stay light since that audience is cold/unaware.

## Configuration

No API keys required for core use. `python-dotenv` and `requests` (already present in `scripts/requirements.txt` from DataOS) cover dependencies. Notion sync (`notion_sync.py`) was **not installed** — declined during setup (2026-07-27, Recommended path). To add it later: copy `module-installs/content-pipeline-v1/AIOS Content Pipeline/scripts/notion_sync.py` to `scripts/content_pipeline/notion_sync.py`, fix its imports the same way `db.py`/`writer.py`/`context_aggregator.py` were fixed (see Gotchas), then follow the Notion setup steps in the module's `INSTALL.md`.

## Gotchas

- **Scripts live in `scripts/content_pipeline/`, not `scripts/` directly.** DataOS already owns `scripts/db.py` (a different schema, powering the daily 6am collection job) — installing the module's own `db.py` at the same path would have silently broken DataOS. All four scripts were copied into a subfolder instead, with `WORKSPACE_ROOT = Path(__file__).resolve().parent.parent.parent` (one extra `.parent` versus the module's original) and imports changed from `from scripts.db import ...` to `from scripts.content_pipeline.db import ...`. Keep this in mind if updating from a future version of the module — don't blindly overwrite `scripts/db.py`.
- **`context_aggregator.py` needed a Python 3.9 compatibility fix.** The original module used `sqlite3.Connection | None` return-type syntax (PEP 604, Python 3.10+), which crashes at import time on this workspace's Python 3.9 venv. Fixed by adding `from __future__ import annotations` at the top of the file. If any future module update reintroduces bare `X | None` syntax without that import, it will break the same way — verify with `python3 scripts/content_pipeline/context_aggregator.py` after any update.
- **No free offer/lead magnet is currently active.** The live blog sidebar still links to a "Core Business Assessment" download, but Jackie confirmed (2026-07-27) it's outdated/being retired. `/develop` is instructed not to reference it; a separate background task was flagged to clean it up on the live site. If a new lead magnet gets created, update `content/offers-and-funnels.md`.
- **Blog cadence is a separate monthly planning session, not folded into the LinkedIn Monday batch** (decided 2026-07-27) — don't assume `/develop`/`/schedule` for blog ideas happens on Mondays.
- **Keyword targets in `content/strategy.md` are a point-in-time Search Console pull** (2026-07-27, 3-month window). Positions and impressions will shift — re-pull periodically (Search Console → Performance → sort by Impressions, with Position column enabled) rather than treating the table as permanent.
- **The database (`data/content.db`) starts genuinely empty** apart from the one test concept (#1, "How to Accelerate Business Growth When the Economy Feels Uncertain") created during install verification — real usage starts from there.

## Dependencies

- **Depends on:** ContextOS (`context/` files), DataOS (`data/` directory convention, `python-dotenv`/`requests`). Optionally reads DataOS's `data/data.db` for meeting/YouTube context if those tables exist (they don't yet — IntelOS stores meetings via Fathom search, not a local table, so `recent_meetings` in the context window is currently always empty).
- **Used by:** LinkedIn content drafting (supplements, doesn't replace, `context/linkedin-marketing.md`'s Monday batch), blog content planning, feeds `context/task-audit.md` Task Automation KPI if tracked there.

## History

| Date | Change |
|------|--------|
| 2026-07-27 | Installed from `module-installs/content-pipeline-v1/`. Recommended path, LinkedIn + blog (not YouTube) — skipped the YouTube-only packaging framework. Workshop docs (`strategy.md`, `brand-and-audience.md`, `offers-and-funnels.md`) drafted from existing context rather than a full interview, then refined over several passes: real competitor ICP-fit research (only ActionCoach is a genuine same-ICP competitor — Strategic Coach/EOS/Vistage/TAB skew larger/pricier), real Search Console keyword-target research (three priority clusters identified: growth advisor/strategist, accountability, accelerate business growth), blog process decided as a separate monthly planning session, HubSpot "What I'm Watching" coordination rule added, success-signal definitions added for priority scoring. Scripts namespaced to `scripts/content_pipeline/` to avoid colliding with DataOS's `scripts/db.py`; `context_aggregator.py` patched for Python 3.9 compatibility. End-to-end tested: `/capture` → `/develop` produced concept #1 targeting the "accelerate business growth" keyword cluster, reframed around economic uncertainty per Jackie's request. |
