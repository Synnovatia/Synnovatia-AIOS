# System: IntelOS

> Meeting intelligence via the live Fathom connector. No Slack (not used in the business), no departments (solo practice, single bucket).
>
> **Changed 2026-07-29:** switched from Zoom to Fathom for meeting recording/notetaking this week. Everything below describes the current (Fathom) system. See History at the bottom for the Zoom-era setup this replaced.

## Architecture

```
[Fathom recording + AI summary] --> [Fathom MCP connector] --> Claude (search on demand)

[Pre-Fathom meetings, or calls Fathom didn't record] --> [paste summary to Claude] --> [data/meeting-summaries/*.md]
```

## Key Files

| File | Purpose |
|------|---------|
| `data/meeting-summaries/README.md` | Format spec for manually-saved meeting notes |
| `data/meeting-summaries/*.md` | One file per manually-saved meeting (fallback only) |

## How It Works

1. Fathom records and auto-summarizes meetings on its own — no equivalent of the old Zoom "auto-start" settings to check; it's on by default per Fathom's own configuration
2. Claude queries this live via the Fathom MCP connector: `list_meetings` (filter by date/recorder/team, optionally include summaries/action items), `search_meetings` (topic/keyword search across summaries), `get_meeting_summary` / `get_meeting_transcript` (by `recording_id`), `find_person` (meetings involving a specific person), `get_recording_by_url` / `get_recording_by_call_id` (resolve a pasted Fathom link or call ID)
3. For meetings before the Fathom switch, or calls on a platform Fathom didn't capture, Jackie pastes a summary and Claude saves it to `data/meeting-summaries/`

## Configuration

No API keys — the Fathom connector is a pre-authorized MCP connector, not something configured via `.env`. All tools are read-only (Fathom's own instruction to Claude: never infer meeting content from memory, always call a tool first).

## Common Operations

**Find a meeting:**
> "Find that meeting with [name] last week"

**Get a meeting's transcript or summary:**
> "What did we decide about [topic] in the [meeting name] call?"

**Resolve a pasted Fathom link or call ID:**
> Paste the URL/ID directly — Claude resolves it via `get_recording_by_url`/`get_recording_by_call_id`, not a general search

**Save an older/non-Fathom meeting manually:**
> "Save this meeting summary: [paste]"

## Gotchas

- **Free plan caps AI summaries at 5/month.** Confirmed 2026-07-29 — Jackie is on Fathom's solo free plan. Recording and transcript storage are unlimited, but `get_meeting_summary` only returns a real synthesized summary for the first 5 meetings each calendar month; after that, Fathom falls back to a basic chronological transcript with no AI synthesis. This directly affects `post-meeting-recap-check`, which depends on a real summary to draft each client's recap — once monthly existing/ongoing-client meeting volume exceeds 5 (plausible as new retainer clients come on), later meetings that month may not have a usable summary. Not yet handled specially in the scheduled task — if this starts happening, the task should probably flag it to Jackie rather than draft a recap off an unsynthesized transcript.
- **No calendar-embedded meeting ID.** Zoom embedded a meeting ID directly in the calendar event description, which the old post-meeting-recap automation used to look up the recording. Fathom doesn't work that way — matching a calendar event to a Fathom recording is done by attendee email + date instead (`list_meetings` filtered by day, matched on `calendar_invitees`). See `context/meeting-prep.md` and the `post-meeting-recap-check` scheduled task for where this matters.
- **Meetings before the Fathom switch (2026-07-29) aren't retrievable via Fathom** — those live in Zoom's cloud (if recorded there) or nowhere, depending on whether Zoom's cloud recording was on at the time. Check `data/meeting-summaries/` for anything saved manually as a fallback.
- **No Slack.** Not used in the business — don't build Slack-related automation unless Jackie says otherwise.
- **No department/team tagging.** Solo practice — all meetings go in one bucket; `recorded_by`/`teams` filters exist in the Fathom tools but aren't needed here.

## Dependencies

- **Depends on:** Fathom MCP connector (pre-authorized, no setup)
- **Used by:** "Find that meeting" / "What did we decide" workflows, `pre-meeting-objective-check` and `post-meeting-recap-check` scheduled tasks (via `context/meeting-prep.md`)

## History

| Date | Change |
|------|--------|
| 2026-07-29 | Switched meeting recording/notetaking from Zoom to Fathom. Updated `post-meeting-recap-check` scheduled task (Fathom `list_meetings`/`get_meeting_summary` matched by attendee+date, instead of extracting a Zoom meeting ID from the calendar description and calling `get_meeting_assets`). Renamed `data/meeting-prep/tracking.csv` column `zoom_meeting_number` → `fathom_recording_id`. `pre-meeting-objective-check` was unaffected (calendar-only, no recording dependency). |
| 2026-07-11 | Initial IntelOS install on Zoom. Found and fixed two Zoom settings bugs: AI summary wasn't auto-starting, and automatic recording was set to local computer instead of cloud. No Slack (not used). No department classification (solo practice). Superseded 2026-07-29 above. |
