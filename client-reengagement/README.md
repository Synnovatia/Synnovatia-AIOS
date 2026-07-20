# Synnovatia Client Re-engagement System

Tracks former/current clients and manages a 6-month check-in cadence, with response-rate tracking to find the best day to send.

## Files

- `data/roster.csv` — every client: name, email, `client_since`, `last_checkin`, `status`, `last_status_date`, notes
- `data/due_now.csv` — output of the cadence check, oldest/most-overdue first
- `data/outreach_log.csv` — one row per outreach attempt, used to compute reply rate by day of week
- `data/meeting_notes.csv` — one row per completed call: notes, flagged opportunities, next action, post-call email status

## Weekly workflow

**Draft day: Mondays 7am. Send day: Tuesdays.** Monday's too busy for opens/replies, so batches go out Tuesday — but drafting happens Monday morning so there's a full day to review before sending. We're tracking reply rate by day to confirm Tuesday is actually the best send day (see `response_rate_report.py`).

Steps 1-2 run automatically via the `client-reengagement-monday-drafting` scheduled task (Mondays 7am, 5 emails per batch, established 2026-07-20). That task also runs the step-5 reply check before drafting.

1. `python3 scripts/check_reengagement.py` — refreshes `due_now.csv` with everyone past their 6-month mark
2. Claude drafts the next batch of 5 (oldest-first) into Gmail as drafts
3. **On Tuesday**, review and send the drafts yourself
4. Tell Claude who you sent to (or Claude marks it) — this runs:
   `python3 scripts/log_outreach.py sent <email>`
   which sets their `status=sent`, resets `last_checkin`/cadence, and logs the send with day-of-week
5. Periodically (a few days later), run `python3 scripts/list_pending_replies.py` to see who's awaiting a reply check — Claude checks Gmail for actual replies and logs the outcome:
   - Got a reply → `python3 scripts/log_outreach.py responded <email>`
   - Booked a call → `python3 scripts/log_outreach.py meeting_scheduled <email> --notes "..."`
   - No reply after ~2-3 weeks → `python3 scripts/log_outreach.py no_response <email>` (this does *not* reset their 6-month clock — they'll come back up for a real follow-up, not get marked as handled)
6. Check `python3 scripts/response_rate_report.py` periodically to see reply rate by day of week and confirm Tuesday is working

## After a call happens

Once a scheduled meeting actually takes place, tell Claude what happened — what was discussed, whether there's a follow-up opportunity (renewal, referral, new engagement), and what the next step is. Claude logs it and drafts the post-call email:

`python3 scripts/log_outreach.py meeting_completed <email> --notes "what was discussed" [--opportunity "e.g. interested in a renewal"] [--next-action "e.g. send updated pricing"]`

This sets `status=meeting_completed`, resets the cadence clock to the meeting date, and adds a row to `meeting_notes.csv`. Claude then drafts a personalized post-call follow-up email in Gmail referencing the actual conversation (not a generic template) and marks `post_call_email_status` as `drafted` once it's in your Drafts folder.

Run `python3 scripts/list_opportunities.py` any time to see:
- Post-call emails still waiting to be drafted/sent
- Every open follow-up opportunity flagged from a call, with its next action — so nothing gets lost in notes you'll forget later

## Status values

`drafted` → `sent` → `responded` / `no_response` / `meeting_scheduled` → `meeting_completed`
