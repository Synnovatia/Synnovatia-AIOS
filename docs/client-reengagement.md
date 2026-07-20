# System: Client Re-engagement

> 6-month check-in cadence for former/current clients, with Gmail draft generation, reply tracking, and post-call opportunity capture. Originally built outside this workspace (on Jackie's Desktop as `synnovatia-client-reengagement`); migrated in on 2026-07-11.

## Architecture

```
[roster.csv] --> [check_reengagement.py] --> [due_now.csv] --> Claude drafts batch --> [Gmail Drafts]
                                                                        |
                                            drafted Mondays 7am (scheduled task), sent Tuesdays
                                                                        |
                                                          [log_outreach.py sent] --> [outreach_log.csv]
                                                                        |
                                                    reply found in Gmail --> [log_outreach.py responded/no_response]
                                                                        |
                                                       meeting happens --> [log_outreach.py meeting_completed]
                                                                        |
                                                          [meeting_notes.csv] --> post-call email drafted
```

## Key Files

| File | Purpose |
|------|---------|
| `client-reengagement/README.md` | Full weekly workflow, status pipeline reference |
| `client-reengagement/data/roster.csv` | Every client — name, email, client_since, last_checkin, status, notes |
| `client-reengagement/data/due_now.csv` | Output of the cadence check, most-overdue first |
| `client-reengagement/data/outreach_log.csv` | One row per outreach attempt — used for reply-rate-by-day analysis |
| `client-reengagement/data/meeting_notes.csv` | One row per completed call — notes, opportunity, next action, post-call email status |
| `client-reengagement/scripts/check_reengagement.py` | Computes who's past their 6-month mark |
| `client-reengagement/scripts/log_outreach.py` | Updates status: sent / responded / no_response / meeting_scheduled / meeting_completed |
| `client-reengagement/scripts/list_pending_replies.py` | Who's awaiting a reply check |
| `client-reengagement/scripts/list_opportunities.py` | Pending post-call emails + flagged follow-up opportunities |
| `client-reengagement/scripts/response_rate_report.py` | Reply rate by day of week sent |

## How It Works

See `client-reengagement/README.md` for the full weekly workflow — it's authoritative, don't duplicate it here. Summary: the `client-reengagement-monday-drafting` scheduled task runs Mondays 7am — it checks Gmail for replies to prior batches, refreshes the due list, and drafts 5 emails into Gmail (never auto-sends). Jackie reviews Monday and sends Tuesday; outcomes get logged back into the roster to reset the cadence clock.

## Configuration

No API keys — uses the Gmail MCP connector (already authorized) for drafting/searching, and HubSpot MCP connector for context when drafting.

## Gotchas

- **All scripts use only the Python standard library** (csv, datetime, pathlib, argparse) — no venv or pip install needed. Run with plain `python3`.
- **Never auto-send.** Every email is a Gmail draft; Jackie sends manually. This is a hard rule, not a default that can be relaxed.
- **Marc Friedenberg (row 176 in roster.csv)** had no `client_since`/`last_checkin` on migration — only a thin 2017 Gmail trace (an out-of-office auto-reply). Reference date was set to 2026-07-11 per Jackie's instruction, so he won't show as due until ~2027-01-11.
- **Reply outcomes have never been logged.** Both sent batches (7/06 and 7/14, 5 each) sit in `outreach_log.csv` with empty `replied` columns — nobody ran the Gmail reply check. The Monday task now does this first thing each week, but the response-rate report is meaningless until that backlog is worked through.
- **The 7/06 batch went out on a Monday**, the 7/14 batch on a Tuesday — mixed history, so day-of-week reply-rate data won't be comparable for a while.
- **`meeting_completed` requires `--notes`** — the script will refuse to log without them, by design (keeps `meeting_notes.csv` meaningful).

## Dependencies

- **Depends on:** Gmail MCP connector, HubSpot MCP connector (for drafting context)
- **Used by:** Weekly re-engagement workflow; feeds `context/task-audit.md` Task Automation KPI

## History

| Date | Change |
|------|--------|
| 2026-07-20 | Weekly drafting automated. Discovered there had never been a recurring task — "Tuesday" was documentation only, and both prior batches were drafted by hand. Created `client-reengagement-monday-drafting` (Mondays 7am): reply check on prior batches, then 5 new drafts, oldest-overdue first. Send day stays Tuesday; Monday drafting gives Jackie a full day to review. |
| 2026-07-11 | Migrated from a pre-existing standalone build on Jackie's Desktop (`synnovatia-client-reengagement`) into the AIOS workspace as `client-reengagement/`. Fixed one data gap (Marc Friedenberg, missing reference date). Verified all 5 scripts run correctly from the new location — 176 clients loaded, 156 due, 4 awaiting reply, 1 opportunity flagged. |
