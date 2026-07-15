# Personal Task Audit

> Personal-side scoreboard for the "Task Automation %" KPI — moved out of `context/task-audit.md` (2026-07-13) to keep business and personal tracking separate. See that file for the business-side audit.

---

## How to read this

- **Automation Potential:** High (Claude/systems can mostly own this) · Medium (Claude assists, human decides/executes) · Low (inherently human — relationship, judgment, physical)
- **Status:** Manual · In Progress · Automated

---

## Health & Household

| Task | Frequency | Est. Time | Automation Potential | Status | Notes |
|---|---|---|---|---|---|
| Grocery shopping / menu planning | Weekly (Tuesday check-in) | TBD | Medium | **In Progress** | Full profile in `personal/meal-planning.md`. Diet: Mayo Clinic-style, high protein, whole foods. Recurring reminder set 2026-07-12 (Tuesdays 6:06pm) — Jackie checks sale ads at Sprouts/Smart & Final/Albertsons herself and reports back; Claude builds the dinner menu + shopping list. (Tried browser-automating the sale scan first — too fragile, same lesson as LinkedIn.) |
| Food delivery coordination | As needed | TBD | Medium | Not started | |
| Workout planning | Recurring (calendar shows "Workout // Strength") | TBD | High | Not started | Claude can generate/adjust a plan; execution is physical. See `personal/workout-plan.md` for the current strength program. |
| Working out (time block) | Recurring, weekdays + Sat, 8:30am start | ~1-1.5 hrs/day, 5 days/wk | High | **Automated** (2026-07-12) | Google Calendar recurring series: Mon 3-mi walk (8:30-9:30), Tue hill warm-up+strength (8:30-9:45), Wed long hike 90+min (8:30-10:00), Thu hill warm-up+strength (8:30-9:45), Sat 4-5mi walk (8:30-10:00). Fri/Sun off. No end date. Conflicts get moved per-occurrence on request — e.g. Wed 7/22 hike moved to 9:15 (Strategize call at 8:00), Thu 7/23 strength skipped (heavy hiking days). |
| Weight stabilization/reduction tracking | Weekly (Sunday morning) | ~15 min/week | High | **Automated** (2026-07-13) | Scheduled task `weekly-weigh-in-reminder`, Sundays 8:00am — log weight, body fat %, and waist measurement. Baseline + goal captured 2026-07-15 in `personal/health-goals.md` (143.5 lbs / 38.3% body fat / 31.5in waist → 135-138 lbs / 30% / 28in). |
| Annual physical | Yearly, usually November | — | High | **Automated** (2026-07-13) | Scheduled task `annual-physical-reminder`, fires every Oct 1 to book with Dr. Torna ahead of the usual November slot. |
| Annual optometry visit | Yearly, ~April | — | High | **Automated** (2026-07-13) | Dr. Do. Last visit April 2026. Scheduled task `optometry-reminder`, fires every March 1. |
| Cooking | Recurring | TBD | Low | Not started | Flagged 2026-07-12. Claude can help with menu planning (see grocery row above) but the cooking itself is physical/human |
| House cleaning | Every 2 weeks | TBD | Low | Manual (by design) | Jackie does this herself — no reminder needed. Full detail in `personal/home-upkeep.md`. |
| Window cleaning | Annual, October | — | High | **Automated** (2026-07-13) | George Medrano. Scheduled task `window-cleaning-reminder`, fires every Oct 1. |
| Granite clean/seal (bath & kitchen) | Every 18 months | — | High | **Automated** (2026-07-13) | Fuller Stone Care. Last done April 2025. Scheduled task `granite-sealing-reminder` — next fires Oct 1 2026, then self-reschedules 18 months out each time it runs. |
| AC unit cleaning | Annual | — | High | **Automated** (2026-07-13) | Command Comfort. Last done April 2026. Scheduled task `ac-cleaning-reminder`, fires every April 1. |
| Tree trimming | Annual, fall (~September) | — | High | **Automated** (2026-07-13) | Art Green Care. Scheduled task `tree-trimming-reminder`, fires every Sept 1. |
| Pest inspection & treatment | Annual, June | — | High | **Automated** (2026-07-13) | Center Termite. Scheduled task `pest-inspection-reminder`, fires every June 1. |
| Spa cleaning | Every 2 weeks | TBD | Low | Manual (by design) | Jackie does this herself — no reminder needed. |
| Spa supplies/filter reorder | Every 6 months | — | High | **Automated** (2026-07-13) | Spa Daddy (online). Last ordered 2/27/2026. Scheduled task `spa-supplies-reminder`, fires every Feb 27 and Aug 27. |
| Regular yard/landscaping | As needed | TBD | Low | Manual (by design) | Jackie does this herself, as needed — no reminder set. |
| Bush & bonsai tree trim (3 bonsai) | Twice yearly, spring (March) & fall (November) | — | High | **Automated** (2026-07-13) | Scheduled task `yard-bush-bonsai-trim-reminder`, fires every March 1 and Nov 1. |
| Vegetable garden — planning & seed order | Yearly, March | — | High | **Automated** (2026-07-13) | Scheduled task `vegetable-garden-planning-reminder`, fires every March 1. |
| Vegetable garden — planting | Yearly, end of April/early May | — | High | **Automated** (2026-07-13) | Scheduled task `vegetable-garden-planting-reminder`, fires every April 25. |
| Vacation planning | As needed | TBD | Medium | Not started | |
| Home maintenance planning | As needed | TBD | Medium | **In Progress** (2026-07-13) | House cleaning, home systems, pool/spa, and yard/garden now tracked in `personal/home-upkeep.md`. |
| Birthday/anniversary cards & gifts | Recurring (per occasion) | TBD | High | Not started | Claude can track dates and draft/suggest gifts |

## School

| Task | Frequency | Est. Time | Automation Potential | Status | Notes |
|---|---|---|---|---|---|
| School homework/coursework | Weekly deadlines, self-paced | ~20 hrs/week total (school capacity, not just homework) | Low | N/A | Not an automation target — core capacity constraint, see `context/personal-info.md`. **Hard boundary: no AI in anything submitted** — Claude may only discuss/explain readings to help Jackie's own understanding, never draft notes/answers. |
| School: study-block calendar (this week) | Mon-Fri, 2026-07-13 to 07-17 | — | High | **Automated** (2026-07-12) | Google Calendar events, Pomodoro-structured (25/5): 10:30-12:00 (study), 12:30-1:30 (study), 3:00-5:00 (homework), Biological Anthropology final week |
| School: study-block calendar (next term) | Mon-Fri, 2026-08-31 to 10-25 | — | High | **Automated** (2026-07-12) | Same 3-block Pomodoro pattern set up as recurring weekday Google Calendar events for Bioanthropology Lab & Statistics. Deadlines within each block still unknown — see check-in below. |
| School: weekly deadline reminders | Weekly (once term starts) | — | High | Scheduled | One-time check-in scheduled 2026-08-25 to get the real syllabus deadlines and set up recurring deadline reminders once known (separate from the study-block calendar, which is already built). |

---

_Update this file whenever a personal task's status changes. Business-side tasks live in `context/task-audit.md`._
