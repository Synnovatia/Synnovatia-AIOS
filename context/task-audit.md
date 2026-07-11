# Task Audit

> Scoreboard for the "Task Automation %" KPI. Lists Jackie's recurring tasks, how much time each costs, how automatable it is, and what's actually been done. Update whenever a task moves from manual → automated, or a new recurring task surfaces.

---

## How to read this

- **Automation Potential:** High (Claude/systems can mostly own this) · Medium (Claude assists, human decides/executes) · Low (inherently human — relationship, judgment, physical)
- **Status:** Manual · In Progress · Automated

---

## Business Development

| Task | Frequency | Est. Time | Automation Potential | Status | Notes |
|---|---|---|---|---|---|
| Check LinkedIn metrics (DiB tracker) | Weekly (recurring calendar item) | TBD | Medium | Manual | Claude could log metrics into `data/key-metrics.md` if numbers are pasted in |
| Identify potential clients (LinkedIn/database) + outreach strategy | Not yet scheduled | TBD | Medium | Not started | Claude can draft prospect lists and outreach angles; sending/relationship-building stays human |
| Re-engage former clients | Weekly (Tuesdays) | TBD | High | **In Progress** | Full system migrated from a pre-existing build 2026-07-11: `client-reengagement/` — 176-client roster, 6-month cadence, Gmail draft generation, opportunity tracking. 156 currently due; 4 awaiting reply check; 1 opportunity flagged (Ginny Kenyon) |
| Rebrand rollout (website redesign, DiB positioning) | One-time project, not recurring | TBD | Medium | In Progress | `context/brand-voice.md` is ready to drive copy; website build itself is a project, not a recurring task |

## Client & Mastermind Delivery

| Task | Frequency | Est. Time | Automation Potential | Status | Notes |
|---|---|---|---|---|---|
| Meeting notes/summaries | Per meeting | Was ~10-15 min/meeting manual | High | **Automated** (2026-07-11) | Zoom auto-records + auto-summarizes; ask Claude to find/search any meeting |
| Client/mastermind metrics tracking | Daily | Was manual dashboard-checking | High | **Automated** (2026-07-11) | Stripe + HubSpot feed `context/group/key-metrics.md` automatically |
| Invoicing | Per client/engagement | TBD | Medium | Partial | Stripe already handles the sending; reconciling against Quicken is still manual |
| Bookkeeping | TBD | TBD | Medium | Not started | Jackie flagged interest in Claude assisting here — needs scoping |
| Mastermind facilitation admin (scheduling, reminders) | Per session | TBD | Medium | TBD | Not yet discussed — confirm current process |

## Personal

| Task | Frequency | Est. Time | Automation Potential | Status | Notes |
|---|---|---|---|---|---|
| Grocery shopping / menu planning | Weekly | TBD | Medium | Not started | Claude can generate menus/lists; shopping itself stays manual |
| Food delivery coordination | As needed | TBD | Medium | Not started | |
| Workout planning | Recurring (calendar shows "Workout // Strength") | TBD | High | Not started | Claude can generate/adjust a plan; execution is physical |
| Weight stabilization/reduction tracking | Ongoing | TBD | Medium | Not started | |
| Vacation planning | As needed | TBD | Medium | Not started | |
| Home maintenance planning | As needed | TBD | Medium | Not started | |
| Birthday/anniversary cards & gifts | Recurring (per occasion) | TBD | High | Not started | Claude can track dates and draft/suggest gifts |
| School homework | Recurring (calendar shows multiple "Homework" blocks/week) | ~20 hrs/week total (school capacity, not just homework) | Low | N/A | Not an automation target — core capacity constraint, see `context/personal-info.md` |

---

## Open Questions (answer to sharpen this audit)

1. Rough weekly time on: LinkedIn metrics check, invoicing/bookkeeping, mastermind admin?
2. What's the current process for mastermind scheduling/reminders — manual email, a tool, something else?
3. Is "bookkeeping" something you want Claude to actively do (categorize transactions, reconcile) or just assist with (answer questions about the numbers)?
4. Any other recurring weekly/monthly tasks not listed here?

---

_Update this file whenever a task's status changes. This is the scoreboard for the "Task Automation %" KPI in CLAUDE.md._
