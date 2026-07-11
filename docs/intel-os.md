# System: IntelOS

> Meeting intelligence via the live Zoom connector. No Slack (not used in the business), no departments (solo practice, single bucket).

## Architecture

```
[Zoom Cloud Recording + AI Companion] --> [Zoom MCP connector] --> Claude (search on demand)

[Pre-2026-07-11 meetings, or non-Zoom calls] --> [paste summary to Claude] --> [data/meeting-summaries/*.md]
```

## Key Files

| File | Purpose |
|------|---------|
| `data/meeting-summaries/README.md` | Format spec for manually-saved meeting notes |
| `data/meeting-summaries/*.md` | One file per manually-saved meeting (fallback only) |

## How It Works

1. As of 2026-07-11, Zoom Cloud Recording is set to **auto-start** for every meeting, recording to the **cloud** (not local computer)
2. Zoom AI Companion's **Meeting summary with AI** is set to **auto-start** — every meeting gets a summary, transcript, and next-steps list with no manual action
3. Claude queries this live via the Zoom MCP connector: `search_meetings`, `get_meeting_assets`, `get_recording_resource`, `search_zoom` (Zoom Chat/Docs)
4. For meetings before this fix, or calls on non-Zoom platforms, Jackie pastes a summary and Claude saves it to `data/meeting-summaries/`

## Configuration

No API keys — the Zoom connector is a pre-authorized MCP connector, not something configured via `.env`.

**Zoom account settings that matter** (Settings → Zoom AI → Meeting, and Settings → Recording → General):
- Meeting summary with AI → Auto-start when meeting starts: **ON**
- Automatic recording → Record in the cloud: **ON** (was previously "Record to computer" — meetings before 2026-07-11 are only on Jackie's local machine, not searchable)

## Common Operations

**Find a meeting:**
> "Find that meeting with [name] last week"

**Get a meeting's transcript or summary:**
> "What did we decide about [topic] in the [meeting name] call?"

**Save an older/non-Zoom meeting manually:**
> "Save this meeting summary: [paste]"

## Gotchas

- **Meetings before 2026-07-11 are not retrievable via Zoom** — cloud recording was off (recording locally instead), so there's nothing in Zoom's cloud to query for those. If Jackie still has local recording files, those are outside Claude's reach unless manually shared.
- **"Restrict Zoom AI features when external users join" is ON** in Zoom settings — this didn't block summaries in testing, but if a future meeting has no summary, check this setting first, since mastermind/client calls always have external participants.
- **No Slack.** Not used in the business — don't build Slack-related automation unless Jackie says otherwise.
- **No department/team tagging.** Solo practice — all meetings go in one bucket.

## Dependencies

- **Depends on:** Zoom MCP connector (pre-authorized, no setup), Zoom account settings (Cloud Recording + AI Companion, both fixed 2026-07-11)
- **Used by:** "Find that meeting" / "What did we decide" workflows

## History

| Date | Change |
|------|--------|
| 2026-07-11 | Initial IntelOS install. Found and fixed two Zoom settings bugs: AI summary wasn't auto-starting, and automatic recording was set to local computer instead of cloud. No Slack (not used). No department classification (solo practice). |
