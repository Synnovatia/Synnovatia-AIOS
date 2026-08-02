# Documentation Index

> Agents scan this file to find relevant docs before working on a system.
> Load only the docs that match your current task.
>
> **Update rule:** When you modify a documented system, update its doc.
> When you build a new system, create a doc and add it here.
>
> **Doc templates:** See `docs/_templates/` for system and integration doc templates.

---

## Systems

| Condition | Doc | Summary |
|-----------|-----|---------|
| Working with metrics, collectors, or `data/data.db` | `docs/data-os.md` | Daily data pipeline — Stripe (live) + HubSpot (on-demand), auto-generates `context/group/key-metrics.md` |
| Finding meetings, transcripts, or summaries | `docs/intel-os.md` | Fathom-based meeting intelligence (switched from Zoom 2026-07-29) — live search, auto-recording + auto-summary |
| Working with client check-ins, re-engagement, or `client-reengagement/` | `docs/client-reengagement.md` | 6-month cadence system — 176-client roster, reply/opportunity tracking. `client-reengagement-monday-drafting` (Mondays 7am) checks replies, then drafts 5 emails into Gmail; Jackie reviews Monday, sends Tuesday |
| Drafting LinkedIn content, outreach, or prospecting | `context/linkedin-marketing.md` | ICP, content pillars/cadence, outreach templates, hard boundary against automating LinkedIn actions |
| Drafting HubSpot marketing emails (Active Engagers/Drifting/Lapsed segments) | `context/hubspot-marketing.md` | Segment definitions, cadence per segment, "What I'm Watching" content thread — Claude drafts, Jackie sends via HubSpot |
| New client onboarding (welcome email, agreement/profile/scheduling tracking) | `context/client-onboarding.md` | Closed-Won trigger, 4-step checklist tracked in `data/onboarding/tracking.csv`, daily `onboarding-daily-check` scheduled task, draft-only welcome/reminder emails |
| Pre/post-meeting emails for existing clients (objective ask + recap) | `context/meeting-prep.md` | Calendar-first detection (green "Strategize // Name // Jackie" or Boomerang), tracked in `data/meeting-prep/tracking.csv`. `pre-meeting-objective-check` (4-day-out ask if objective missing) + `post-meeting-recap-check` (same-day recap + action items from Zoom summary), both hourly 8am-8pm. Excludes new clients (onboarding) and group masterminds |
| Launching or refilling a mastermind cohort (either group) | `context/mastermind-launch.md` | Reusable T-minus checklist anchored to the first session — date locking, landing-page audit, invitation + nudge sends, 2-week intake window, school-term collision check |
| Any visual/design work — colors, typography, web/print layout | `context/style-guide.md` | 2026 Edition visual identity — navy/gold/teal palette, Fraunces/Barlow/Barlow Condensed type system |
| Daily buyer-sentiment/growth research for the $250K-$4M segment ("What I'm Watching") | `what-im-watching-cloud` (Anthropic cloud routine, not a local task) | Personal reading, not client-facing — shares its name with the existing HubSpot "What I'm Watching" newsletter thread (`context/hubspot-marketing.md`) deliberately, in case Jackie later wants to draw from it there. Runs daily ~6:50am America/Los_Angeles on Anthropic's servers (not dependent on this app being open) — researches exactly 2 themes (Buyer Sentiment & Behavior / Growth & Marketing Tactics — hiring/labor content dropped 2026-07-27; PE/M&A and pure macro-data-release content — CPI/GDP/Fed-rate-decision reporting — dropped 2026-07-31 as not resonating with Jackie's audience) via WebSearch and saves the result as a Gmail draft addressed to jackie@synnovatia.com (this connector can only draft, not send). Both the 7-day/week dashboard refresh and the weekday 7:10am morning brief check Gmail drafts for that day's dated draft and render it as a "What I'm Watching" section with a collapsible `<details>`/`<summary>` per theme (keeps card length bounded); a missing draft gets flagged rather than silently dropped. Run history/reliability: [claude.ai/code/routines](https://claude.ai/code/routines). The local `context/business-intel-digest.md` file and its matching local scheduled task are retired (disabled, not deleted) — superseded by this routine |
| Updating or rebuilding the dashboard | `outputs/dashboard/dashboard.html` | Canonical, living file — overwritten in place (not dated) so the daily `dashboard-daily-refresh` scheduled task and the published artifact keep a stable path/URL. Business Goals (revenue vs. 2026/2027 goals, retainer clients, mastermind growth, To Do list), Personal, and checkable Reminders (business-only/everything toggle). `2026-07-13-mockup.html` is the frozen original mockup, kept for history only. |
| Drafting LinkedIn/blog content via `/capture`, `/develop`, `/schedule`, or working with `content/` or `data/content.db` | `docs/content-pipeline.md` | Idea tracking: capture → develop (strategic positioning + LinkedIn/blog packaging) → schedule. Scripts live in `scripts/content_pipeline/` (namespaced to avoid colliding with DataOS's `scripts/db.py`) — see doc before assuming the module's default file layout |

## Integrations

| Condition | Doc | Summary |
|-----------|-----|---------|
| _(docs will appear here as you connect external services)_ | | |
