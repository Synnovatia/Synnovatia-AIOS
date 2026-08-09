# Health & Fitness Goals

> Baseline captured 2026-07-15. Mirrors how `context/strategy.md` / `context/current-data.md` work for the business — real numbers to track against, not just reminders.

---

## Current Metrics (as of 2026-08-09)

| Metric | Current | Goal | To Go |
|---|---|---|---|
| Weight | 144.8 lbs | 135–138 lbs | 7–10 lbs |
| Body fat | 38.2% | 30% | 8.2 points |
| Waist | 31 in | 28 in | 3 in |
| HRV | 32 | — | — |
| VO2 Max | 26.3 | 30 | 3.7 |

## How This Gets Tracked

- **Weight / body fat / waist / HRV:** logged weekly via the existing Sunday 8am reminder (`weekly-weigh-in-reminder`) — report the numbers, Claude updates this file's history. HRV added to the weekly check-in 2026-07-19 (previously only tracked per-workout in the session log).
- **VO2 Max:** added to tracking 2026-08-03, when Jackie upgraded regular walks to structured walk/run intervals (10-min warmup/cooldown bookending 3-minute walk/run segments) specifically to raise it. Not on a fixed cadence like the weekly weigh-in — update whenever a fresh reading comes in from an interval/VO2-focused session. See "VO2 Max Tracking" below for the history.
- **Workouts and walks:** no direct connector exists for Welltory or fitness/health apps generally (checked the MCP registry 2026-07-15, nothing available) — same fragility issue as the earlier LinkedIn/Sprouts browser-automation attempts. Instead, report each workout/walk's average heart rate, average HRV, and METs as you go (any cadence — after each session or in a batch); Claude logs it to `personal/workout-logs/session-log.csv`. Periodically (e.g. weekly), Claude reviews the trend and suggests adjustments to the coming week's program to keep it aligned with the goals above.
- The actual strength program lives in `personal/workout-plan.md`; session-level performance data lives in `personal/workout-logs/`
- **Recovery walks read low on MET-minutes, and that's fine (confirmed by Jackie 2026-07-26).** Easy walks routinely log low MET figures (e.g. 18–72 MET-min) — that's the point of a recovery effort, not a Welltory error. Don't flag low METs on a clearly easy/short/low-HR walk. Still note genuine reconciliation problems (a pace that can't math out against distance and time).
- **Training-week counting: a Sunday session counts toward the *upcoming* week, not the week just ended** (Jackie's preference, 2026-07-26). So the "Sessions logged this week" tally shouldn't retroactively grow on a Sunday from that day's own workouts.

## VO2 Max Tracking

| Date | VO2 Max | Session HR | Notes |
|---|---|---|---|
| 2026-08-03 | 26.2 | 126 avg | First tracked reading, from the first walk/run interval session (upgraded from a regular walk specifically to push this number toward the goal of 30). |
| 2026-08-09 | 26.3 | not reported | Second tracked reading, up 0.1 from 8/3. |

## History

| Date | Weight | Body Fat | Waist | HRV | Notes |
|---|---|---|---|---|---|
| 2026-07-15 | 143.5 lbs | 38.3% | 31.5 in | — | Baseline |
| 2026-07-19 | 145 lbs | 38% | 31 in | 27 | HRV added to weekly check-in starting this entry |
| 2026-07-26 | 146.4 lbs | 37.6% | 31 in | 24 | Weight up 1.4 lbs, body fat down 0.4 pts. Very active week (6 sessions incl. a 5.2-mi hike + two walks Sat). Morning-of HRV 24 — lowest of the three readings, consistent with accumulated training load. |
| 2026-08-02 | 144.8 lbs | 38% | 31 in | 26 | Weight down 1.6 lbs from last week, body fat up 0.4 pts (roughly a wash net of the weight change). Waist unchanged. HRV back up to 26, the highest of the four readings so far, a good recovery sign after last week's heavy load. |
| 2026-08-09 | 144.8 lbs | 38.2% | 31 in | 32 | Weight and waist unchanged from last week. Body fat up 0.2 pts, essentially flat. HRV jumped to 32, the highest reading yet, a strong recovery sign. |

---

_Update the History table each Sunday after the weigh-in check-in. This is the source of real numbers for anything that references health/fitness progress (e.g., the future dashboard's "Goal Progress" section)._
