# Personal Life

> Personal health, fitness, and household context — separate from business context files. Claude reads this alongside `personal-info.md` to support workout tracking, health goals, appointments, and meal planning.

---

## Health Goals & Targets

_Current weight / body fat % / waist targets and baseline: TBD — the old "Goal: Vitality * Wealth * Reconditioning" tracker is outdated and no longer used as a source._

**Tracking cadence:** Weekly, Sunday mornings — log weight, body fat %, and waist measurement.

**Priorities:** Weight loss / body composition, strength & muscle building, cardio/endurance (HRV-focused, no specific training type required), general wellness & stress reduction. Sleep tracked via Apple Watch/Health app.

---

## Weekly Workout Routine

| Day | Activity |
|---|---|
| Monday | 3-mile walk |
| Tuesday | 15-mile hill warm-up + 45-60 min full-body strength training |
| Wednesday | Hike |
| Thursday | 15-mile hill warm-up + strength training |
| Friday | Rest day |
| Saturday | 5-mile walk |
| Sunday | Rest day |

Tracked via Apple Watch (HRV) and iPhone Health app.

**Strength Training - Day B exercises:** Dumbbell Sumo Deadlift, Dumbbell Reverse Lunge (per side), Dumbbell Overhead Press, Band Bent Over Row, Stability Ball Hip Bridge, Side Plank (per side), Single Arm Suitcase Carry (per side), Band Face Pull. Pre-loaded as quick-add chips in the Strength Training Log tool (artifact).

**Strength training logs** (split so weight/reps that change set-to-set, e.g. pyramid/ramping sets, are easy to call out as you go):
- `data/strength-training-log.csv` — one row per set: date, day, exercise, set_number, reps, weight_lbs, notes. Log sets as you do them, e.g. "squat set 1: 10 at 135, set 2: 8 at 155, set 3: 6 at 175" — Claude appends one row per set.
- `data/strength-training-sessions.csv` — one row per session: date, day, duration_min, avg_hr, mets, notes. Give Claude these once at the end of a workout, e.g. "that was 42 minutes, avg HR 128, METs 6."

Ask Claude for a day-over-day or week-over-week comparison any time — it reads straight from these files.

---

## Recurring Health Appointments

| Appointment | Cadence | Next date | Notes |
|---|---|---|---|
| Dentist cleaning | Every ~4 months | 11/18/2026 3:00 PM, then 3/24/2027 3:00 PM | |
| Annual physical | Yearly | _TBD — need last/next date_ | |
| Dermatologist (Dr. Kumar) | As needed | ~6 weeks from 7/13/2026 (already on calendar) | |
| Mammogram | Yearly, ~August | 8/28/2026 (already on calendar) | |

---

## Meals & Nutrition

**Preferences:** High protein focus. Not counting calories.

_The old "family_menu_final.docx" 4-week menu is outdated and no longer used as a source — menus will be planned fresh each week instead._

**Weekly routine:** Tuesday ~6:00 PM (or Wed morning) — check weekly sales ads at Albertsons, Smart & Final, and Sprouts. Review together to decide what to order, then plan the week's menu.

---

## Personal Errands & Admin

_Not yet scoped — bills/financial admin, car maintenance, home upkeep cadence still to be defined._

---

_Last updated: 2026-07-13_
