# Health & Fitness Goals

> Baseline captured 2026-07-15. Mirrors how `context/strategy.md` / `context/current-data.md` work for the business — real numbers to track against, not just reminders.

---

## Current Metrics (as of 2026-07-15)

| Metric | Current | Goal | To Go |
|---|---|---|---|
| Weight | 143.5 lbs | 135–138 lbs | 5.5–8.5 lbs |
| Body fat | 38.3% | 30% | 8.3 points |
| Waist | 31.5 in | 28 in | 3.5 in |

## How This Gets Tracked

- **Weight / body fat / waist:** logged weekly via the existing Sunday 8am reminder (`weekly-weigh-in-reminder`) — report the three numbers, Claude updates this file's history
- **Workouts and walks:** no direct connector exists for Welltory or fitness/health apps generally (checked the MCP registry 2026-07-15, nothing available) — same fragility issue as the earlier LinkedIn/Sprouts browser-automation attempts. Instead, report each workout/walk's average heart rate, average HRV, and METs as you go (any cadence — after each session or in a batch); Claude logs it to `personal/workout-logs/session-log.csv`. Periodically (e.g. weekly), Claude reviews the trend and suggests adjustments to the coming week's program to keep it aligned with the goals above.
- The actual strength program lives in `personal/workout-plan.md`; session-level performance data lives in `personal/workout-logs/`

## History

| Date | Weight | Body Fat | Waist | Notes |
|---|---|---|---|---|
| 2026-07-15 | 143.5 lbs | 38.3% | 31.5 in | Baseline |

---

_Update the History table each Sunday after the weigh-in check-in. This is the source of real numbers for anything that references health/fitness progress (e.g., the future dashboard's "Goal Progress" section)._
