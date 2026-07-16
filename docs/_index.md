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
| Finding meetings, transcripts, or summaries | `docs/intel-os.md` | Zoom-based meeting intelligence — live search, auto-recording + auto-summary as of 2026-07-11 |
| Working with client check-ins, re-engagement, or `client-reengagement/` | `docs/client-reengagement.md` | 6-month cadence system — 176-client roster, Gmail drafts, reply/opportunity tracking |
| Drafting LinkedIn content, outreach, or prospecting | `context/linkedin-marketing.md` | ICP, content pillars/cadence, outreach templates, hard boundary against automating LinkedIn actions |
| Drafting HubSpot marketing emails (Active Engagers/Drifting/Lapsed segments) | `context/hubspot-marketing.md` | Segment definitions, cadence per segment, "What I'm Watching" content thread — Claude drafts, Jackie sends via HubSpot |
| New client onboarding (welcome email, agreement/profile/scheduling tracking) | `context/client-onboarding.md` | Closed-Won trigger, 4-step checklist tracked in `data/onboarding/tracking.csv`, daily `onboarding-daily-check` scheduled task, draft-only welcome/reminder emails |
| Pre/post-meeting emails for existing clients (objective ask + recap) | `context/meeting-prep.md` | Calendar-first detection (green "Strategize // Name // Jackie" or Boomerang), tracked in `data/meeting-prep/tracking.csv`. `pre-meeting-objective-check` (4-day-out ask if objective missing) + `post-meeting-recap-check` (same-day recap + action items from Zoom summary), both hourly 8am-8pm. Excludes new clients (onboarding) and group masterminds |
| Any visual/design work — colors, typography, web/print layout | `context/style-guide.md` | 2026 Edition visual identity — navy/gold/teal palette, Fraunces/Barlow/Barlow Condensed type system |
| Updating or rebuilding the dashboard | `outputs/dashboard/dashboard.html` | Canonical, living file — overwritten in place (not dated) so the daily `dashboard-daily-refresh` scheduled task and the published artifact keep a stable path/URL. Business Goals (revenue vs. 2026/2027 goals, retainer clients, mastermind growth, To Do list), Personal, and checkable Reminders (business-only/everything toggle). `2026-07-13-mockup.html` is the frozen original mockup, kept for history only. |

## Integrations

| Condition | Doc | Summary |
|-----------|-----|---------|
| _(docs will appear here as you connect external services)_ | | |
