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
| Check LinkedIn metrics (DiB tracker) | Weekly | 15 min/week | Medium | **In Progress** | Decided 2026-07-11: paste-in over browser automation (more reliable for a 15-min/week task). Recurring reminder set for Fridays 9:10am — Jackie pastes numbers, Claude logs them into `context/current-data.md` / `data/key-metrics.md`. |
| Identify potential clients (LinkedIn/database) + outreach strategy | Not yet scheduled | TBD | Medium | Not started | Claude can draft prospect lists and outreach angles; sending/relationship-building stays human |
| Re-engage former clients | Weekly (Tuesdays) | TBD | High | **In Progress** | Full system migrated from a pre-existing build 2026-07-11: `client-reengagement/` — 176-client roster, 6-month cadence, Gmail draft generation, opportunity tracking. 156 currently due; 4 awaiting reply check; 1 opportunity flagged (Ginny Kenyon) |
| Respond to email (general) | Daily | ~30 min/day (~3.5 hrs/week) | Medium | Not started | Claude could draft/triage responses for review; sending stays human |
| Rebrand rollout — website redesign | One-time project, not recurring | TBD | Medium | In Progress | New site build reflecting the "Different Is Better Than Better" positioning. `context/brand-voice.md` ready to drive copy. |
| Rebrand rollout — style guide | One-time project, not recurring | TBD | Medium | In Progress | An existing `Style Guide Synnovatia.pdf` was spotted on Jackie's Desktop (2026-07-11, during the client re-engagement folder search) — worth reviewing to see if it should be updated/merged with the new DiB brand voice rather than started fresh. |
| Rebrand rollout — brand voice | One-time project, not recurring | TBD | Medium | **Built** | `context/brand-voice.md` — positioning thesis, voice rules, messaging pillars, locked CTA copy, AI-tell avoidance policy. Ready to drive all future copy/content work. |

## Client & Mastermind Delivery

| Task | Frequency | Est. Time | Automation Potential | Status | Notes |
|---|---|---|---|---|---|
| Meeting notes/summaries | Per meeting | Was ~10-15 min/meeting manual | High | **Automated** (2026-07-11) | Zoom auto-records + auto-summarizes; ask Claude to find/search any meeting |
| Client/mastermind metrics tracking | Daily | Was manual dashboard-checking | High | **Automated** (2026-07-11) | Stripe + HubSpot feed `context/group/key-metrics.md` automatically |
| Invoicing / bookkeeping / bill paying | 15th & 30th of every month | ~10 hrs/month total | Medium | **In Progress** | Scope is broader than Synnovatia — also covers personal, household, and husband Leon Carroll's business (The Veritas Collective). Jackie keeps executing payments herself (hard boundary: Claude cannot move money). Recurring reminder set 2026-07-11 for the 15th/30th (Feb naturally skips the 30th, no 30th to fire on). Claude offers light assistance (summarizing numbers, answering questions) each time — active categorization/reconciliation not yet requested. |
| Mastermind: Monday "hot topics" email | Seven Figure Forum: irregular (4-7 week gaps, always Friday) — Aug 7, Sep 11, Oct 30, Dec 11 2026. Messy Middle: every other Friday, restarts Q4 2026 (Oct 9, Oct 23, Nov 6, Nov 20, Dec 4, Dec 18) | Small, but wants a reminder | High | **Fully Built** | 20 one-time reminders scheduled 2026-07-11: 8 for Seven Figure Forum (Zoey Smith, Mark Chapman, Christina Carlson, Anne Laguzza — $1M+ band), 12 for Messy Middle (Elise Eidsness, Wilma Nachsin, Amy Hage, Sandra Roe — $250K-$500K band). Each drafts the hot-topics email into Gmail and researches 2 articles matched to the group's revenue band. |
| Mastermind: Wednesday agenda day | Same cadence as above | Small | Medium | **Fully Built** | Jackie drafts the agenda herself from member feedback and posts to Google Calendar — Claude's job is just the reminder + having the 2 articles ready, not drafting the agenda. Reminders scheduled alongside the Monday ones. |
| Mastermind: Messy Middle meeting dates | 6 dates, Q4 2026 | — | High | **Automated** (2026-07-11) | Added to Jackie's Google Calendar: Oct 9, Oct 23, Nov 6, Nov 20, Dec 4, Dec 18, 8:00-9:15am Pacific. No attendee invites sent — calendar blocks only. |

## Marketing & Growth Initiatives (flagged 2026-07-12, not yet scoped)

| Task | Frequency | Est. Time | Automation Potential | Status | Notes |
|---|---|---|---|---|---|
| Grow Messy Middle membership | New | TBD | Medium | Not started | Currently 4 real members (Elise, Wilma, Amy, Sandra) + Jackie. Women-only group, $250K-$500K band. |
| Grow Seven Figure Forum membership | New | TBD | Medium | Not started | Currently 4 members (Zoey Smith, Mark Chapman, Christina Carlson, Anne Laguzza) + Jackie. $1M+ band. Target: 6 members by Jan 2027 (see `context/strategy.md`). |
| LinkedIn marketing (content/outreach, not just metrics tracking) | New | TBD | Medium | Not started | Distinct from the existing weekly LinkedIn metrics check-in — this is about actively marketing on LinkedIn (content, engagement, prospecting), not just measuring it. |
| Re-engage less-engaged leads (HubSpot) | New | TBD | Medium | Not started | 7,665 HubSpot contacts sit at "lead" lifecycle stage (as of 2026-07-12) — a large, largely untapped pool distinct from the 176-client `client-reengagement/` roster (which is for past *clients*, not never-converted leads). Needs its own scoping: segmentation, messaging, cadence. |

## Personal

| Task | Frequency | Est. Time | Automation Potential | Status | Notes |
|---|---|---|---|---|---|
| Grocery shopping / menu planning | Weekly (Tuesday check-in) | TBD | Medium | **In Progress** | Full profile in `personal/meal-planning.md`. Diet: Mayo Clinic-style, high protein, whole foods. Recurring reminder set 2026-07-12 (Tuesdays 6:06pm) — Jackie checks sale ads at Sprouts/Smart & Final/Albertsons herself and reports back; Claude builds the dinner menu + shopping list. (Tried browser-automating the sale scan first — too fragile, same lesson as LinkedIn.) |
| Food delivery coordination | As needed | TBD | Medium | Not started | |
| Workout planning | Recurring (calendar shows "Workout // Strength") | TBD | High | Not started | Claude can generate/adjust a plan; execution is physical |
| Working out (time block) | Recurring, weekdays + Sat, 8:30am start | ~1-1.5 hrs/day, 5 days/wk | High | **Automated** (2026-07-12) | Google Calendar recurring series: Mon 3-mi walk (8:30-9:30), Tue hill warm-up+strength (8:30-9:45), Wed long hike 90+min (8:30-10:00), Thu hill warm-up+strength (8:30-9:45), Sat 4-5mi walk (8:30-10:00). Fri/Sun off. No end date. Conflicts get moved per-occurrence on request — e.g. Wed 7/22 hike moved to 9:15 (Strategize call at 8:00), Thu 7/23 strength skipped (heavy hiking days). |
| Weight stabilization/reduction tracking | Ongoing | TBD | Medium | Not started | |
| Cooking | Recurring | TBD | Low | Not started | Flagged 2026-07-12. Claude can help with menu planning (see grocery row above) but the cooking itself is physical/human |
| Cleaning | Recurring | TBD | Low | Not started | Flagged 2026-07-12 |
| Yard work | Recurring | TBD | Low | Not started | Flagged 2026-07-12 |
| Vacation planning | As needed | TBD | Medium | Not started | |
| Home maintenance planning | As needed | TBD | Medium | Not started | |
| Birthday/anniversary cards & gifts | Recurring (per occasion) | TBD | High | Not started | Claude can track dates and draft/suggest gifts |
| School homework/coursework | Weekly deadlines, self-paced | ~20 hrs/week total (school capacity, not just homework) | Low | N/A | Not an automation target — core capacity constraint, see `context/personal-info.md`. **Hard boundary: no AI in anything submitted** — Claude may only discuss/explain readings to help Jackie's own understanding, never draft notes/answers. |
| School: study-block calendar (this week) | Mon-Fri, 2026-07-13 to 07-17 | — | High | **Automated** (2026-07-12) | Google Calendar events, Pomodoro-structured (25/5): 10:30-12:00 (study), 12:30-1:30 (study), 3:00-5:00 (homework), Biological Anthropology final week |
| School: study-block calendar (next term) | Mon-Fri, 2026-08-31 to 10-25 | — | High | **Automated** (2026-07-12) | Same 3-block Pomodoro pattern set up as recurring weekday Google Calendar events for Bioanthropology Lab & Statistics. Deadlines within each block still unknown — see check-in below. |
| School: weekly deadline reminders | Weekly (once term starts) | — | High | Scheduled | One-time check-in scheduled 2026-08-25 to get the real syllabus deadlines and set up recurring deadline reminders once known (separate from the study-block calendar, which is already built). |

---

## Answered (2026-07-11)

- LinkedIn metrics: 15 min/week
- Invoicing/bookkeeping/bill paying: ~10 hrs/month, twice-monthly, spans personal + household + The Veritas Collective (husband's business) + Synnovatia
- Mastermind admin: minimal weekly, but two real recurring tasks (Monday hot-topics email, Wednesday agenda + 2 articles) — see table above for cadence
- Seven Figure Forum meets every 6 weeks; Messy Middle meets every other week but is on hiatus until Q4 2026
- Email response: ~30 min/day

## Still Open

1. **Messy Middle growth marketing** — currently 4 real members, needs a plan to grow (women-only group)
2. **Personal + school round** — deferred to a separate pass per Jackie's request (2026-07-11)

---

_Update this file whenever a task's status changes. This is the scoreboard for the "Task Automation %" KPI in CLAUDE.md._
