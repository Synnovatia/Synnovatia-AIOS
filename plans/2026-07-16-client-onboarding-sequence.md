# Client Onboarding Sequence — Plan (v2, right-sized for Synnovatia AIOS)

> Written 2026-07-16. Addresses "Client welcome email + agreement delivery" and "Client onboarding scheduling" in `context/task-audit.md` — both flagged as the top open Quick Wins in `outputs/2026-07-15-task-audit-followup.md`.
>
> **History:** This was fully scoped once before, in a since-deleted workspace (`aios-starter-kit-main`, session "Client onboarding sequence," 2026-07-06/07) — reached a detailed implementation plan but was never built. That plan assumed a standalone Python-scripts-on-launchd architecture with a dedicated HubSpot Private App token. This version reuses every real decision from that session but rebuilds the *how* around what Synnovatia AIOS actually has today: live HubSpot + Gmail MCP access and Claude scheduled tasks — no new credentials needed.

---

## Goal

When a HubSpot deal hits **Closed Won**, automatically:
1. Send a personalized welcome email with the 4 onboarding steps
2. Track a 4-item checklist (agreement signed, profile completed, meeting scheduled, invoice paid) so nothing falls through the cracks
3. Nudge Jackie or the client if something stalls

## What Already Exists (confirmed live, 2026-07-16)

- **Welcome email draft** — rewritten 2026-07-16 (new draft `r-7642630703959118390`; the original `r2105279011812120800` is superseded and should be deleted by Jackie). Now reads as four numbered steps:
  - **Step One:** Complete your Client Profile → `https://share.hsforms.com/1moHJVt5vQpKW2VYLsuCx1w2cyw` (new HubSpot-hosted form link, replaces the old `client-cafe-client-profile/` website page)
  - **Step Two:** Approve your Agreement for Services → `https://www.synnovatia.com/client-services-agreement/`
  - **Step Three:** No separate link — copy now says the Agreement form itself redirects to the scheduling calendar once approved (a HubSpot form redirect, not something this system needs to build)
  - **Step Four:** Pay Your Invoice — sent under separate cover
  
  This is the canonical template going forward — no rewrite needed, just personalization per client.
- **HubSpot** — deal pipeline already has `Closed Won` as a native stage. No onboarding-tracking properties exist yet (confirmed via live search 2026-07-16) — clean slate.
- **Gmail** — live MCP access (`create_draft`, `search_threads`, `list_drafts`) already used throughout this workspace (LinkedIn, HubSpot, client-reengagement drafts).
- **HubSpot MCP connector** — live read/write access already used throughout this workspace (`search_crm_objects`, `manage_crm_objects`, `search_properties`) — no separate Private App token needed.
- **Stripe** — `STRIPE_API_KEY_MAIN` already in `.env`, feeding the daily `data/data.db` collection. Same key should cover a per-customer invoice-status check.

## Live Test Results (2026-07-16)

Jackie submitted the Services Agreement form and booked a test Boomerang slot as "Test Client." Both confirmed real, usable notification emails:

**Agreement form (HubSpot-native form):**
- Sender: `noreply@notifications.hubspot.com`
- Subject: `Contact reconversion by submitting on the HubSpot Form "Client Agreement 10/07/2022"` (the form's literal HubSpot name — match on the fixed prefix `Contact reconversion by submitting on the HubSpot Form "Client Agreement`, not the whole subject, in case the form gets renamed/versioned)
- Body includes: contact First Name, Last Name, Email, submission Date, and a "View submission in HubSpot" link
- **Bonus:** since this is a native HubSpot form, the submission also creates/updates a HubSpot Contact automatically — meaning `agreement_signed_date` could alternatively be detected via HubSpot's own recent-conversion data on the contact, as a backup/cross-check to the email-based detection

**Boomerang booking confirmation:**
- Sender: `boomerang+scheduling@baydin.com`
- Subject: `Confirmed: {attendee name} / Jackie Nagel — 60 min Meeting @ {Day}, {Mon DD} · {start}-{end} ({tz})` — match on sender + subject prefix `Confirmed: `
- Body includes: "Your meeting with {name} is confirmed and has been added to your calendar," plus a WHAT/WHEN/WHO block with the attendee's email — **the WHO email is the match key** back to the client/deal

**Client Profile form — confirmed 2026-07-16 (retest, after Jackie fixed the form).** Same HubSpot-native pattern as predicted:
- Sender: `noreply@notifications.hubspot.com`
- Subject: `Contact reconversion by submitting on the HubSpot Form "Client Profile"` — match on prefix `Contact reconversion by submitting on the HubSpot Form "Client Profile`
- Body includes First Name, Last Name, Company Name, Email, Phone, Industry, Address, Years in Business, Number of Employees, Annual Revenue, and 3 Objective/Goal fields — a much richer capture than the agreement form. (Worth a future idea, not this build: this data could enrich the HubSpot contact/deal record automatically once we're touching it anyway.)

**All three live tests are now done.** Detection logic is fully specified — nothing left blocking the build.

**Boomerang link correction:** the canonical link is `https://meet.boomerangapp.com/jackie.synnovatia.com/meeting60` (with explicit `https://` — the live Gmail welcome draft currently has it bare, without the protocol prefix, which risks it not auto-linking in some email clients). Worth fixing in that draft directly — flagging rather than editing it myself since there's no draft-edit tool available here, only create-new; didn't want to leave a duplicate draft behind.

---

## Proposed Design

### Trigger
Daily scheduled task checks HubSpot for deals that moved to `Closed Won` since the last check and don't yet have an `onboarding_started_date` property set.

### The 4-step checklist (new HubSpot Deal properties)
| Property | Type | Set by |
|---|---|---|
| `onboarding_started_date` | date | Set when welcome email goes out |
| `agreement_signed_date` | date | Set when agreement-form notification email is detected |
| `profile_completed_date` | date | Set when profile-form notification email is detected |
| `meeting_scheduled_date` | date | Set when Boomerang confirmation email is detected |
| `invoice_paid_date` | date | Set when Stripe shows the matching invoice paid |

### Welcome email
Personalize the existing Gmail draft template with the client's first name and deal-linked details. **Draft-only, not auto-send** — consistent with every other send-style system already built here (LinkedIn, HubSpot marketing, client-reengagement all draft-then-Jackie-sends). Open to switching to auto-send later once the flow's been trusted through a few real clients.

### Detection (daily scheduled task)
- Search Gmail for messages from `noreply@notifications.hubspot.com` with subject prefix `Contact reconversion by submitting on the HubSpot Form "Client Agreement` → parse Email field from the body → match to deal/contact → set `agreement_signed_date`
- Search Gmail for messages from `noreply@notifications.hubspot.com` with subject prefix `Contact reconversion by submitting on the HubSpot Form "Client Profile` → parse Email field from the body → match to deal/contact → set `profile_completed_date`
- Search Gmail for messages from `boomerang+scheduling@baydin.com` with subject prefix `Confirmed: ` → parse the WHO email from the body → match to deal/contact → set `meeting_scheduled_date`
- Check Stripe for invoice-paid status on any deal missing `invoice_paid_date`

### Reminder
If `onboarding_started_date` is 5+ days ago and any of the 4 steps is still incomplete, draft a reminder email. Repeat every 5 days until all 4 are done (matches the original session's confirmed cadence).

### Architecture — the actual change from the old plan
No standalone Python scripts, no launchd jobs, no new HubSpot Private App token. One new **Claude scheduled task** (`onboarding-daily-check`, same pattern as `dashboard-daily-refresh`), running once daily, doing all of the above using tools already live in this environment. Simpler, and consistent with how every other automation in this workspace works.

---

## Components

| Component | Effort | Status |
|---|---|---|
| 5 new HubSpot Deal properties | Small | Not yet created |
| Welcome email template | Small | **Done 2026-07-16** — rewritten, new draft `r-7642630703959118390` |
| Live test — agreement form | — | **Done 2026-07-16** — sender/subject pattern confirmed |
| Live test — Boomerang booking | — | **Done 2026-07-16** — sender/subject pattern confirmed |
| Live test — profile form | — | **Done 2026-07-16** — sender/subject pattern confirmed |
| Gmail-matching rules (all 3 notification types) | Medium | Ready to build now — nothing blocking |
| `onboarding-daily-check` scheduled task | Medium | Not started |
| Reminder email template | Small | Not started |
| `context/client-onboarding.md` — system doc | Small | Not started, written last |

## Out of Scope (for now)
- Auto-sending the welcome email without review
- Instant/webhook-based detection (polling once daily is enough at Synnovatia's current volume)
- Payment collection or agreement e-signature itself — both stay on their existing static-link tools

---

## Build Steps

1. ~~Live test — agreement form, Boomerang booking, and Client Profile form~~ **Done 2026-07-16 — all three confirmed.**
2. ~~Rewrite welcome email template~~ **Done 2026-07-16** — new draft `r-7642630703959118390`, includes the corrected `https://` Boomerang-adjacent flow (agreement form now redirects to scheduling directly).
3. Create the 5 HubSpot Deal properties via the MCP connector.
4. Write the welcome-email personalization logic (pull client name from the deal/contact, draft via Gmail using the new template).
5. Write the reminder-email template.
6. Create the `onboarding-daily-check` scheduled task encoding: Closed-Won detection → welcome draft → inbox-watch for all 3 confirmations → Stripe invoice check → 5-day repeating reminder.
7. Document the system in `context/client-onboarding.md`, register it in `docs/_index.md` and CLAUDE.md's workspace structure.
8. Update `context/task-audit.md` to mark this "Built" once live.

---

## Decisions Confirmed (2026-07-16)

1. **Welcome email is draft-only**, not auto-send.
2. **Forward-only scope** — no backfilling existing mid-onboarding clients into this tracking; applies to new Closed-Won deals going forward.
3. Profile-form live test still pending — everything else (steps 3-5 above) can proceed in parallel since they don't depend on it; only the profile-detection matching rule and the full end-to-end test of `onboarding-daily-check` are blocked on it.
