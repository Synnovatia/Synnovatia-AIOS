# Meeting Prep & Recap

> Built 2026-07-16. Covers the full lifecycle of a 1:1 client meeting: pre-meeting objective ask, then post-meeting recap with action items — closing out the original audit's Quick Win #5 in both directions (post-meeting follow-ups for *former/lapsed* clients were already handled by `client-reengagement/`; this is for *existing/ongoing* clients' regular sessions). New clients' first meeting is handled by `context/client-onboarding.md`'s redirect flow instead — not this system.

---

## What It Does

Both scheduled tasks share the same detection logic and the same tracking file (`data/meeting-prep/tracking.csv`), so a meeting has one continuous record from booking through recap.

**Shared detection** (both tasks): a candidate 1:1 client meeting is one matching EITHER:
- (a) Green (`colorId` 10) calendar events titled `Strategize // {Client Name} // Jackie` — how Jackie marks meetings she scheduled herself, including ones booked verbally at the end of a prior call (this is why detection is calendar-first, not Gmail-first — a verbally-booked meeting never generates a Boomerang email at all)
- (b) Boomerang-created events (title/description fingerprint)

Both skip: meetings with more than 2 non-Jackie attendees (mastermind group meetings have their own separate hot-topics/agenda system), and any client already tracked in `data/onboarding/tracking.csv` (new clients — handled by onboarding instead).

**`pre-meeting-objective-check`** (hourly, 8am-8pm):
1. Scans the next 7 days of calendar for candidate meetings
2. Pulls the objective straight from the calendar event's description when Boomerang captured one (embedded there directly, no Gmail lookup needed)
3. If no objective was captured and the meeting is 4 or fewer days away, drafts a short email asking what they'd like to focus on

**`post-meeting-recap-check`** (hourly, 8am-8pm):
1. Scans the last 24 hours of calendar for candidate meetings that have already ended
2. Extracts the Zoom meeting ID from the calendar event's own description and pulls that meeting's AI summary (`get_meeting_assets`)
3. Once the summary is ready (may take time to process — the task just tries again next hour if not), drafts a same-day recap: a brief 1-2 sentence summary of what was covered, plus the action items from Zoom's "next steps"

Both are draft-only — Jackie reviews and sends.

## Where Things Live

| What | Where |
|---|---|
| Tracking (source of truth, shared by both tasks) | `data/meeting-prep/tracking.csv` |
| Pre-meeting email template | `reference/email-templates/pre-meeting-objective.md` |
| Post-meeting email template | `reference/email-templates/post-meeting-recap.md` |
| Pre-meeting automation | Scheduled task `pre-meeting-objective-check` |
| Post-meeting automation | Scheduled task `post-meeting-recap-check` |

## Design Decisions

- **Calendar-first detection, not Gmail-first** — the original pre-meeting design only watched Boomerang confirmation emails, which would have missed meetings booked verbally and added straight to the calendar. Jackie caught this gap; the calendar scan (using her existing green + "Strategize // Name // Jackie" convention) covers both cases in one pass, for both pre- and post-meeting.
- **Existing clients only** — matched by excluding any email present in `data/onboarding/tracking.csv`
- **Separate from `client-reengagement/`'s post-call flow** — that one is for former/lapsed-client re-engagement calls specifically, and is manually triggered by Jackie telling Claude what happened. This system is automatic and covers regular ongoing 1:1 sessions instead. No overlap.
- **4-day pre-meeting timing** — chosen so the client has time to reply, but it's still fresh when the meeting happens
- **Same-day post-meeting timing** — hourly checks (rather than once daily) so the recap goes out same-day once Zoom's summary is actually ready, not the next morning
- **Group meetings excluded** — masterminds already have their own hot-topics/agenda system; only meetings with ≤2 non-Jackie attendees qualify
- **Objective field isn't always used** — Jackie confirmed clients sometimes fill in Boomerang's own Objective question at booking and sometimes don't; the pre-meeting ask only fires when it's genuinely missing
- **Recap wording gets light editing, not raw AI-summary paste** — per `context/brand-voice.md` (peer not guru, warm not soft)
- **Draft-only** — same as every other send-style system in this workspace
- **Meeting identity** — uses the Google Calendar event's own `id` field as the stable key, unified across both detection paths and both tasks

---

_Update this file if the detection pattern, timing, or templates change._
