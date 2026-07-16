# Pre-Meeting Objective Ask

> Built 2026-07-16. Closes out the original audit's Quick Win #5 (post-meeting follow-ups were already handled by `client-reengagement/`). For **existing/ongoing clients only** — new clients' first meeting is handled by `context/client-onboarding.md`'s redirect flow instead.

---

## What It Does

The daily `pre-meeting-objective-check` scheduled task:

1. Scans Jackie's Google Calendar (not just Gmail) for the next 7 days — this matters because Jackie sometimes books the next meeting verbally at the end of a call, so it never goes through Boomerang at all. Calendar is the one place every client meeting shows up regardless of how it was booked.
2. Recognizes a client meeting one of two ways: (a) green (`colorId` 10) events titled `Strategize // {Client Name} // Jackie` — how Jackie marks meetings she scheduled herself, or (b) Boomerang-created events (title/description fingerprint). Skips anything with more than 2 non-Jackie attendees — mastermind group meetings already have their own hot-topics/agenda system.
3. Skips any meeting whose client is currently tracked in `data/onboarding/tracking.csv` (that's a new client's first meeting — already covered by onboarding)
4. Pulls the objective straight from the calendar event's own description when Boomerang captured one (it embeds "Objective: ..." directly in the event, no separate Gmail lookup needed)
5. If no objective was captured and the meeting is 4 or fewer days away, drafts a short email asking what they'd like to focus on — draft-only, Jackie reviews and sends

## Where Things Live

| What | Where |
|---|---|
| Tracking (source of truth) | `data/meeting-prep/tracking.csv` |
| Email template | `reference/email-templates/pre-meeting-objective.md` |
| Daily automation | Scheduled task `pre-meeting-objective-check` |

## Design Decisions

- **Calendar-first detection, not Gmail-first** — the original design only watched Boomerang confirmation emails, which would have missed meetings booked verbally and added straight to the calendar. Jackie caught this gap; the calendar scan (using her existing green + "Strategize // Name // Jackie" convention) covers both cases in one pass.
- **Existing clients only** — matched by excluding any email present in `data/onboarding/tracking.csv`
- **4-day timing** — chosen so the client has time to reply, but it's still fresh when the meeting happens
- **Group meetings excluded** — masterminds already have their own hot-topics/agenda system; only meetings with ≤2 non-Jackie attendees qualify
- **Objective field isn't always used** — Jackie confirmed clients sometimes fill in Boomerang's own Objective question at booking and sometimes don't; this only asks when it's genuinely missing, not every time. Read directly from the calendar event's description (Boomerang embeds it there) rather than re-parsing Gmail.
- **Draft-only** — same as every other send-style system in this workspace
- **Meeting identity** — uses the Google Calendar event's own `id` field as the stable key, unified across both detection paths (Strategize-pattern or Boomerang-created)

---

_Update this file if the detection pattern, timing, or template changes._
