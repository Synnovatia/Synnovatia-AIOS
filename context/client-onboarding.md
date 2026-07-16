# Client Onboarding Sequence

> Built 2026-07-16. Full design/history in `plans/2026-07-16-client-onboarding-sequence.md`. Automates the "welcome email + agreement/profile/scheduling tracking" flow flagged as a Quick Win in `outputs/2026-07-15-task-audit-followup.md`.

---

## What It Does

When a HubSpot deal hits **Closed Won**, the daily `onboarding-daily-check` scheduled task (8:10am):

1. Detects the new client and drafts a personalized welcome email in Gmail (never auto-sends — Jackie reviews and sends)
2. Tracks a 4-step checklist: agreement signed, profile completed, meeting scheduled, invoice paid
3. Sends a reminder draft every 5 days if anything's still incomplete

## Where Things Live

| What | Where |
|---|---|
| Tracking (source of truth) | `data/onboarding/tracking.csv` — one row per client, not HubSpot properties (the HubSpot connector here can read/search properties but can't create new custom property definitions) |
| Welcome email | Live Gmail draft, subject "Welcome to Synnovatia — Let's Get Started" — backup copy at `reference/email-templates/onboarding-welcome.md` |
| Reminder email | `reference/email-templates/onboarding-reminder.md` |
| Daily automation | Scheduled task `onboarding-daily-check` (`/Users/jackienagel/.claude/scheduled-tasks/onboarding-daily-check/SKILL.md`) |

## The 4 Onboarding Steps (client-facing)

1. **Client Profile** — https://share.hsforms.com/1moHJVt5vQpKW2VYLsuCx1w2cyw (HubSpot-hosted form)
2. **Agreement for Services** — https://www.synnovatia.com/client-services-agreement/ (HubSpot-hosted form; redirects to scheduling once approved)
3. **Schedule first conversation** — via the redirect above (Boomerang: https://meet.boomerangapp.com/jackie.synnovatia.com/meeting60)
4. **Pay invoice** — sent under separate cover (Stripe)

## Detection Logic

All three form/booking confirmations land in Jackie's inbox and are matched by contact email:

| Step | Detected via | Sender | Subject pattern |
|---|---|---|---|
| Agreement signed | Gmail | `noreply@notifications.hubspot.com` | `Contact reconversion by submitting on the HubSpot Form "Client Agreement...` |
| Profile completed | Gmail | `noreply@notifications.hubspot.com` | `Contact reconversion by submitting on the HubSpot Form "Client Profile"` |
| Meeting scheduled | Gmail | `boomerang+scheduling@baydin.com` | `Confirmed: ...` |
| Invoice paid | Stripe (`STRIPE_API_KEY_MAIN`) | — | Invoice status check by customer email |

All three notification patterns were confirmed via a live test on 2026-07-16 (test submissions/booking), not assumed.

## Design Decisions

- **Draft-only, not auto-send** — matches every other send-style system in this workspace (LinkedIn, HubSpot marketing, client-reengagement)
- **Forward-only scope** — no backfilling clients already mid-onboarding; applies to new Closed Won deals going forward
- **Local CSV over HubSpot properties** — the HubSpot MCP connector available here can't create new property definitions, so tracking lives in `data/onboarding/tracking.csv` instead, matching the pattern already used by `client-reengagement/`
- **Daily polling, not instant/webhook** — consistent with how every other automation here runs (scheduled Claude tasks, not always-on listeners)

## Future Ideas (not built)

- The Client Profile form captures rich business data (revenue, industry, goals) that could enrich the HubSpot contact/deal record automatically once the checklist logic is already touching it
- Auto-send could replace draft-only once the flow's been trusted through a few real clients

---

_Update this file if the detection patterns, templates, or cadence change._
