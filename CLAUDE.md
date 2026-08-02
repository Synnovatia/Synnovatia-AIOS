# CLAUDE.md

This file provides guidance to Claude when working with this workspace in Claude Cowork (or Claude Code).

---

## What This Is

This is **Synnovatia's EVOLV-OS workspace** — the AI Operating System for Jackie's solo strategic consulting practice, Synnovatia. Built on Evolv AI's EVOLV-OS Starter Kit, it's a layer of AI automation wrapped around the business, powered by plug-and-play modules installed one at a time.

**This file (CLAUDE.md) is the foundation.** It is automatically loaded at the start of every session. Keep it current — it is the single source of truth for how Claude should understand and operate within this workspace.

> Part of the **Evolv AI EVOLV-OS Program** — helping businesses recover time and increase profitability through AI automation. [evolv.one](https://evolv.one)

---

## The Claude-User Relationship

Claude operates as an **agent assistant** with access to the workspace folders, context files, and outputs. The relationship is:

- **User**: Jackie, founder and sole practitioner of Synnovatia, a strategic consulting practice for bootstrapped B2B service businesses. Semi-retired, also a cultural anthropology student (~20 hrs/week). Defines goals, provides context, and directs work through natural conversation.
- **Claude**: Reads context, understands Jackie's objectives (professional and personal), executes tasks, produces outputs, and maintains workspace consistency

Claude should always orient itself at session start, then act with full awareness of who the user is, what they're trying to achieve, and how this workspace supports that.

---

## EVOLV-OS Mission

You are helping a business owner build an **AI Operating System (EVOLV-OS)** — an autonomous intelligence layer wrapped around their entire business. Everything in this workspace serves that goal.

### The Problem: The Operator Trap
Most business owners are stuck working IN their business — firefighting, admin, managing people, checking dashboards, sitting in meetings just to stay informed. 80% of bandwidth goes to "must-dos." Nothing left for growth, strategy, or the life they actually wanted. The old model says hire more people, buy more tools, work more hours. EVOLV-OS says the answer is less — less manual work, less people needed, less time in operations. More bandwidth for the work that matters.

### The Solution: Five Layers
The EVOLV-OS gives it back — one layer at a time:
1. **Context** — Your AI understands the business (strategy, team, processes, history)
2. **Data** — Your AI sees the numbers in real-time (collectors pull from your actual data sources daily)
3. **Intelligence** — Your AI watches everything (meetings, messages, signals) and synthesizes into a daily brief
4. **Automate** — Audit every task, score each one, automate them away one by one. Each task automated = bandwidth recovered.
5. **Build** — Freed bandwidth applied to growth, new initiatives, or life. Work ON the business, not IN it.

### Five Principles
1. **Just Ask** — If you can describe it in plain English, Claude can build it. Don't self-censor. Ask for the impossible.
2. **Talk, Don't Type** — Voice-first. Hold FN, speak for 60 seconds, let Claude format it. 3x faster than typing.
3. **Layers, Not Leaps** — One layer at a time. Each independently valuable. Through gradual exposure, you become technical without even trying.
4. **Build for Scale & Security** — Human-in-the-loop by default. Your data stays local. Plan before you build.
5. **Borrow Before You Build** — 80% modules, 20% custom. Check the library before building from scratch.

### Three KPIs
These are how you know your EVOLV-OS is working:
- **Away-From-Desk Autonomy** — Hours per day you can step away and nothing falls apart. Target: business runs while you sleep.
- **Task Automation %** — Percentage of recurring tasks automated. Use the Task Audit (`context/task-audit.md`) as your scoreboard.
- **Revenue Per Employee** — Total revenue ÷ team members. Not bigger companies — leaner, faster, more profitable ones.

### How You Should Help
- Be patient. Assume the user is non-technical.
- Explain what you're doing in plain English BEFORE doing it.
- Celebrate wins — every module installed, every task automated is real progress toward freedom.
- When suggesting solutions, check existing modules first (Borrow Before You Build).
- Keep the three KPIs in mind — every automation should move at least one KPI.
- Never dump error logs or technical jargon. Find the problem, explain it simply, fix it.
- **Never ask the user to open a terminal.** Everything in this workspace is designed to work through natural conversation in Cowork.

---

## Context Summary

**Business:** Synnovatia — solo strategic consulting practice (25+ yrs experience) serving bootstrapped B2B service businesses, $250K–$4M revenue, via 1:1 consulting, monthly retainers, and two mastermind groups (Mastermind for the Messy Middle, Seven Figure Forum)
**Role:** Jackie — founder and sole practitioner, semi-retired (~3 hrs/day on the business), also a cultural anthropology student (~20 hrs/week)
**Current focus:** Growing to 5 new monthly clients within 3 months; growing both masterminds; rolling out the "Different Is Better Than Better" rebrand (website + brand voice) to support a 40% rate increase within 6 months
**Key metric to watch:** Annual income — currently ~$17K YTD, ~$35K projected without changes, targeting ~$100K/yr with the growth plan

---

## Workspace Structure

```
.
├── CLAUDE.md                # This file — core context, always loaded
├── GETTING-STARTED.md       # How to set up and use this workspace in Cowork
├── .env                     # API keys and credentials (gitignored, never commit)
├── .env.example             # API key template (safe to commit)
├── .gitignore               # Protects secrets from git
├── HISTORY.md               # Chronological log of everything built
├── context/                 # Background context about the user and business
│   ├── business-info.md     # What Synnovatia does
│   ├── personal-info.md     # Who Jackie is, her role
│   ├── strategy.md          # Current priorities and goals
│   ├── current-data.md      # Key metrics and current state (manual snapshot)
│   ├── brand-voice.md       # "Different Is Better Than Better" positioning & voice rules
│   ├── style-guide.md       # Visual identity — colors, typography, type scale (2026 Edition)
│   ├── linkedin-marketing.md    # LinkedIn content/outreach strategy
│   ├── hubspot-marketing.md     # HubSpot segment-based email marketing strategy
│   ├── business-intel-digest.md # One-time seed copy of the 2026-07-27 research pull; superseded by the "What I'm Watching" cloud routine below
│   ├── client-onboarding.md     # New client welcome/agreement/profile/scheduling tracking
│   ├── meeting-prep.md          # Pre-meeting objective ask + post-meeting recap for existing/ongoing clients
│   ├── general-business.md  # Shared company snapshot — give to team members
│   ├── team-member.md       # Template for team members (sector + role context)
│   ├── group/key-metrics.md # Auto-generated live metrics (Stripe, HubSpot) — read each session
│   └── import/              # Drop documents here for Claude to analyze
├── data/                    # DataOS + IntelOS — local database, metrics, meeting archive
│   ├── data.db                    # Daily snapshots from connected sources
│   ├── key-metrics.md             # Manual baseline + goals-progress tracking
│   ├── collect.log                # Daily collection job output
│   ├── meeting-summaries/         # Manual/fallback meeting notes (pre-Fathom or non-Fathom)
│   ├── onboarding/tracking.csv    # Client onboarding checklist state (source of truth, not HubSpot properties)
│   └── meeting-prep/tracking.csv # Pre-meeting objective-ask + post-meeting recap state for existing clients
├── scripts/                 # DataOS collectors (Stripe live; HubSpot via MCP; GA manual)
│   └── content_pipeline/    # Content Pipeline module scripts (db.py, writer.py, context_aggregator.py, generate_pipeline.py) — namespaced in its own subfolder so it doesn't collide with DataOS's scripts/db.py
├── content/                 # Content Pipeline — LinkedIn + blog idea tracking (capture → develop → schedule)
│   ├── strategy.md          # Platform/cadence, pillars, competitive positioning, Search Console keyword targets
│   ├── brand-and-audience.md # Brand positioning + 3 audience segments
│   ├── offers-and-funnels.md # Offers, funnels, CTA bank, audience→offer alignment
│   ├── pipeline.md          # Auto-generated dashboard view of all content ideas by stage
│   └── concepts/            # Full developed concept docs, one per idea, written by /develop
├── config/                  # launchd job for daily 6am data collection
├── docs/                    # System documentation
│   ├── _index.md            # Documentation routing index
│   └── _templates/          # Templates for creating new docs
├── .claude/commands/        # Slash commands — capture.md, develop.md, schedule.md (Content Pipeline)
├── .claude/skills/writing-style/ # Anti-AI-slop writing enforcement, auto-runs on all prose (installed 2026-08-01)
├── .claude/skills/academic/ # Academic paper search via OpenAlex/Unpaywall, free, no key (installed 2026-08-01)
├── .claude/skills/firecrawl/ # Web scrape/search/crawl CLI, needs FIRECRAWL_API_KEY in .env (installed 2026-08-01)
├── module-installs/         # EVOLV-OS modules — install by telling Claude
│   ├── context-os/          # Context layer (install first)
│   ├── infra-os/            # Version control + documentation
│   ├── data-os/             # Business data pipeline
│   ├── intel-os/            # Meeting + Slack intelligence
│   ├── content-pipeline-v1/ # Content intelligence system (installed 2026-07-27)
│   ├── writing-style/       # AAA Accelerator module — banned-word list + 12 rules + self-check (installed 2026-08-01)
│   ├── academic/            # AAA Accelerator module — OpenAlex/Unpaywall paper search (installed 2026-08-01)
│   └── firecrawl/           # AAA Accelerator module — web scraping/search CLI (installed 2026-08-01)
├── client-reengagement/     # 6-month client check-in cadence (176-client roster, migrated 2026-07-11)
│   ├── README.md            # Full weekly workflow
│   ├── data/                 # roster.csv, due_now.csv, outreach_log.csv, meeting_notes.csv
│   └── scripts/               # check_reengagement.py, log_outreach.py, list_opportunities.py, etc.
├── personal/                # Non-business reference docs (workout plans, etc.)
│   └── workout-plan.md      # Strength training program (Fortify-compatible)
├── plans/                   # Implementation plans
├── outputs/                 # Work products and deliverables
│   ├── dashboard/            # dashboard.html = canonical live file (daily auto-refresh); mockup kept for history
│   ├── positioning/          # Positioning brief (statement + full rationale/proof points) — internal strategy doc, not customer-facing
│   ├── strength-log/         # Strength Training Log tool source (published as a claude.ai artifact)
│   └── website-redesign/     # "Different Is Better Than Better" website homepage/About copy + mockups
├── reference/               # Templates, examples, reusable patterns
│   └── email-templates/     # onboarding-welcome.md, onboarding-reminder.md, pre-meeting-objective.md, post-meeting-recap.md
└── shares/                  # Packaged systems for sharing
```

---

## How to Use This Workspace (Cowork)

This workspace is designed for **Claude Cowork** — no terminal required. Everything is done through natural conversation.

### Starting a session

Say this at the start of every session:

> **"Initialize my session"**

Claude will read your context files, `HISTORY.md` (what's been built), `docs/_index.md` (documentation routing), and `context/group/key-metrics.md` (latest business numbers), then confirm it understands your business, current priorities, and what you're working on.

### Updating your metrics

Say: **"Update my metrics"**

Claude will:
1. Pull live numbers from connected sources (HubSpot CRM, Stripe revenue)
2. Ask you for numbers from sources that aren't auto-connected (Quicken, Google Analytics, mastermind headcounts)
3. Rewrite `context/group/key-metrics.md` and `context/current-data.md` with the fresh snapshot

**Live/automated:** HubSpot (CRM), Stripe (revenue — runs daily at 6am automatically via `scripts/collect.py`)
**Manual (tell Claude when asked):** Quicken, Google Analytics, mastermind enrollment counts

Claude can also run live queries against `data/data.db` directly if you ask about trends over time.

### Finding and saving meetings

Say: **"Find that meeting with [name]"** or **"What did we decide about [topic]?"**

Claude searches your Fathom account directly (meetings, transcripts, AI summaries, recordings) — no manual work needed for any meeting Fathom recorded. **Switched from Zoom to Fathom 2026-07-29** — meetings before that date live in Zoom's cloud (if recorded there) rather than Fathom's.

For older meetings, or calls Fathom didn't capture, say: **"Save this meeting summary: [paste]"** — Claude structures it and saves it to `data/meeting-summaries/`.

Slack is not connected (not used in the business).

### Client re-engagement

A full 6-month check-in cadence system lives in `client-reengagement/` (176-client roster, originally built outside this workspace and migrated in on 2026-07-11). Weekly rhythm: Claude drafts the batch automatically **Monday 7am** (`client-reengagement-monday-drafting`, 5 emails), Jackie reviews Monday and **sends Tuesday**:

Say things like:
- **"Who's due for a check-in?"** → runs `check_reengagement.py`, refreshes `client-reengagement/data/due_now.csv`
- **"Draft the next batch"** → Claude drafts personalized re-engagement emails into Gmail (oldest-overdue first), pulling context from HubSpot/past notes. Never sent automatically — always your review in Gmail.
- **"I sent to [name]"** → logs it: `log_outreach.py sent <email>`, resets their cadence clock
- **"Who's awaiting a reply check?"** → runs `list_pending_replies.py`; Claude checks Gmail for actual replies and logs outcomes (`responded` / `no_response` / `meeting_scheduled`)
- **"[Name]'s meeting happened, here's what we discussed: ..."** → logs `meeting_completed`, drafts a personalized post-call follow-up email, flags any opportunity + next action
- **"Any open opportunities?"** → runs `list_opportunities.py` — surfaces pending post-call emails and flagged follow-up opportunities
- **"How's the response rate looking?"** → runs `response_rate_report.py` — reply rate by day of week, to confirm Tuesday is actually the best send day

Full details: `client-reengagement/README.md`

### Content Pipeline (LinkedIn + blog)

Idea-tracking system for LinkedIn (existing Mon/Wed/Fri batch cadence, per `context/linkedin-marketing.md`) and the blog (`synnovatia.com/business-coaching-blog/`, monthly, SEO-driven). Installed 2026-07-27 on top of — not replacing — the existing LinkedIn Monday-batch workflow; it adds structured capture → develop → schedule tracking in `data/content.db`.

Say things like:
- **"/capture [idea]"** → classifies and stores a raw idea as a stub
- **"/develop #[id]"** → full concept development: strategic positioning (audience/authority/offer), then platform-specific packaging (LinkedIn hooks + visual concept, or blog meta title/H1/subheadings/internal links using real Search Console keyword data), interactive at each stage
- **"/schedule"** → batch-plan which developed ideas to create next and when

Strategy docs live in `content/` (`strategy.md`, `brand-and-audience.md`, `offers-and-funnels.md`) — read fresh by `/develop` every time, update them as positioning/offers/keyword targets evolve. `content/strategy.md` includes a real competitor ICP-fit analysis and a Search Console-sourced keyword-target table (re-pull periodically, since positions shift). No free offer/lead magnet is currently active — the blog's old "Core Business Assessment" download is confirmed outdated (flagged separately for removal from the live site).

Full details: `docs/content-pipeline.md`

### Saving your work

Say: **"Save my work"**

Claude will:
1. Update `HISTORY.md` with what was done this session
2. Check if any docs need updating
3. List the files that changed
4. **Write the commit summary for you** — one line, matching this repo's existing style (plain sentence case, semicolon-joined clauses, no period), ready to paste into GitHub Desktop's Summary field
5. Prompt you to open GitHub Desktop and commit

In GitHub Desktop: review the changed files, paste in the summary Claude wrote (edit if you want), click **Commit to main**, then **Push origin**.

### Installing modules

> **"Install [module name]"** — e.g., "Install ContextOS" or "Install the productivity module"

Claude will read the module's install guide and walk you through it step by step.

### Module install order (first time setup):

1. **"Install ContextOS"** — Claude learns your business — 30-45 min
2. **"Install InfraOS"** — Version control and documentation — 20-30 min
3. **"Install DataOS"** — Business data pipeline — 30-60 min
4. **"Install IntelOS"** — Meeting + Slack intelligence — 20-30 min
5. **"Install Content Pipeline"** (optional, requires ContextOS + DataOS) — LinkedIn + blog content idea tracking — 30-45 min

### Other things you can say

| Say this... | Claude does this... |
|---|---|
| "Initialize my session" | Reads context, confirms understanding |
| "Install [module name]" | Guided module installation |
| "Audit my tasks" | Scans recurring tasks, scores automation potential |
| "Create a plan for [X]" | Writes a structured implementation plan in plans/ |
| "Build me [X]" | Executes work from a plan |
| "Update my context" | Updates context/ files with new info you provide |
| "What's my current status?" | Reads context + HISTORY.md, gives a summary |
| "Brainstorm [topic]" | Explores options and trade-offs before taking action |
| "Update my metrics" | Refreshes key-metrics.md from HubSpot/Stripe + asks for manual numbers |
| "Write a report on [X]" | Produces a structured, professional output based on your context |
| "Save my work" | Updates HISTORY.md and docs, then guides you to commit in GitHub Desktop |
| "Find that meeting with [name]" | Searches Fathom directly for meetings, transcripts, summaries |
| "Save this meeting summary: [paste]" | Structures and saves to data/meeting-summaries/ |
| "Who's due for a check-in?" | Refreshes and shows who's overdue in the client re-engagement cadence |
| "Draft the next batch" | Drafts personalized re-engagement emails into Gmail for your review |
| "Launch a new mastermind cohort" | Walks the T-minus checklist in `context/mastermind-launch.md` — dates, page audit, invitation + nudge, intake window |
| "What's in my What I'm Watching digest?" | Checks Gmail drafts for today's "What I'm Watching" — daily research (economic trends / growth & scaling) for the $250K-$4M B2B service segment, drafted by the `what-im-watching-cloud` cloud routine and folded into both the dashboard and the morning brief as a collapsible section (name shared with the existing HubSpot "What I'm Watching" newsletter thread, in case Jackie wants to draw from it there — it's personal reading only until she says otherwise) |
| "/capture [idea]" | Content Pipeline — classifies a raw LinkedIn/blog idea and stores it as a stub in `data/content.db` |
| "/develop #[id]" | Content Pipeline — turns a stub into a full concept: strategic positioning, LinkedIn hooks or blog SEO packaging (using real Search Console keyword targets), CTA alignment — interactive, confirms at each stage |
| "/schedule" | Content Pipeline — batch-plan which developed ideas to create next and when, against the real LinkedIn Mon/Wed/Fri + monthly blog cadence |

### Setting up Cowork scheduled tasks

Cowork can run recurring tasks automatically. Once DataOS or IntelOS is installed, tell Claude:

> **"Set up a daily task to collect my [Slack / Notion / analytics] data"**

Claude will help you configure it as a Cowork scheduled task — no cron jobs or scripts needed.

**Local vs. cloud:** Most scheduled tasks in this workspace are local — they run on this Mac and require the Cowork app to be open (if it's closed at the scheduled time, they run on next launch). For anything that must run reliably regardless of whether this app is open — and where you want visibility into whether it actually ran — say so, and Claude can set up an Anthropic **cloud routine** instead (via the `/schedule` skill). Cloud routines run on Anthropic's servers, show their own run history at [claude.ai/code/routines](https://claude.ai/code/routines), but cannot read/write local files — they can only reach the outside world through connected services (Gmail, HubSpot, etc.), so they're best suited to research-and-email or research-and-post tasks rather than anything that edits files in this workspace. The `what-im-watching-cloud` routine is the first example: it researches daily (Buyer Sentiment & Behavior + Growth & Marketing Tactics — PE/M&A and macro-data-release content deliberately excluded as of 2026-07-31) and saves the result as a Gmail draft addressed to jackie@synnovatia.com (this connector can only create drafts, not send — same as every other email-touching automation in this workspace). Both the dashboard and the weekday morning brief pick it up from that draft and render it as a "What I'm Watching" section with a collapsible (`<details>`/`<summary>`) block per theme, so it doesn't grow the page unbounded.

---

## Critical Instruction: Maintain This File

**Whenever Claude makes changes to the workspace, Claude MUST consider whether CLAUDE.md needs updating.**

After any change — adding workflows, new context, or modifying structure — ask:

1. Does this change add new functionality the user needs to know about?
2. Does it modify the workspace structure documented above?
3. Should a new phrase be listed in the "things you can say" table?
4. Does context/ need new files to capture this?

If yes to any, update the relevant sections. This file must always reflect the current state of the workspace.

---

## Team Member Workspaces

When a team member gets their own EVOLV-OS workspace, they don't need the full CEO context. Give them two files:

1. **`context/general-business.md`** — the shared company snapshot (copy from the CEO's workspace). Gives Claude the company baseline.
2. **`context/team-member.md`** — their personal file. They fill this in with their sector, role, day-to-day responsibilities, and tools. This keeps their context focused and avoids loading irrelevant CEO-level information into every session.

Claude reads both files together and tailors all assistance to that person's specific role — without the team member ever needing to re-explain who they are or what they do.

---

## Notes

- Context files live in `context/` — the richer they are, the more useful Claude becomes
- Plans live in `plans/` with dated filenames for history
- Outputs are organized by type/purpose in `outputs/`
- API keys go in `.env` — Claude will never ask you to commit this file
- Drop any document into `context/import/` and ask Claude to analyze it
