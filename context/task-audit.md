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
| Client onboarding sequence (welcome email + agreement/profile/scheduling tracking) | Per new client | Was ~20-30 min/client manual | High | **Built** (2026-07-16) | `context/client-onboarding.md`. Daily `onboarding-daily-check` scheduled task (8:10am): detects new Closed-Won deals, drafts the personalized welcome email, watches Gmail for agreement/profile/Boomerang confirmations, checks Stripe for invoice-paid, sends a reminder draft every 5 days if incomplete. Tracked in `data/onboarding/tracking.csv` (not HubSpot properties — the connector here can't create new property definitions). Draft-only, forward-only scope (no backfill). All 3 detection patterns confirmed via live test 2026-07-16. |
| Rebrand rollout — website redesign | One-time project, not recurring | TBD | Medium | In Progress | New site build reflecting the "Different Is Better Than Better" positioning. `context/brand-voice.md` and `context/style-guide.md` ready to drive copy and visual design. |
| Rebrand rollout — style guide | One-time project, not recurring | TBD | Medium | **Built** (2026-07-13) | `context/style-guide.md` — full 2026 Edition visual identity imported from `Synnovatia_Style_Guide_2026.docx`: navy/gold/teal palette (hex codes), Fraunces/Barlow/Barlow Condensed type system, type scale, retire/keep list. Supersedes the earlier PDF spotted on Jackie's Desktop. |
| Rebrand rollout — brand voice | One-time project, not recurring | TBD | Medium | **Built** (updated 2026-07-13) | `context/brand-voice.md` — rebuilt from the full `DiB_Interview_Synthesis_Master.docx` (not just the one-pager summary): positioning thesis, voice rules, cross-interview theme tracker by signal strength, messaging pillars, locked CTA copy, AI-tell avoidance policy. **Corrected the audience revenue range from $350K–$4M to $250K–$4M** per the official 2026 Style Guide — fixed everywhere it appeared (business-info.md, linkedin-marketing.md, CLAUDE.md, the saved HubSpot draft output, and all 3 relevant scheduled task prompts — LinkedIn content drafting, HubSpot Active Engagers, HubSpot Drifting). |

## Client & Mastermind Delivery

| Task | Frequency | Est. Time | Automation Potential | Status | Notes |
|---|---|---|---|---|---|
| Meeting notes/summaries | Per meeting | Was ~10-15 min/meeting manual | High | **Automated** (2026-07-11) | Zoom auto-records + auto-summarizes; ask Claude to find/search any meeting |
| Client/mastermind metrics tracking | Daily | Was manual dashboard-checking | High | **Automated** (2026-07-11) | Stripe + HubSpot feed `context/group/key-metrics.md` automatically |
| The Dashboard — business + personal snapshot | Was manual (checking Stripe, HubSpot, health-goals separately) | ~5-10 min/day pulled together into one view | High | **Automated** (2026-07-15) | `outputs/dashboard/dashboard.html` — canonical live file, regenerated daily at ~7am by the `dashboard-daily-refresh` scheduled task. Revenue tracked against both the $35,000 (2026) and $100,000 (2027) goals, new-retainer progress (from Jul 1, 2026), mastermind growth, a To Do list (rate increase, 2nd Messy Middle mastermind launch/marketing), health-goal snapshot, and checkable reminders (business-only/everything toggle, includes personal/home items). Revenue trend line has only 5 days of data so far (collection started 2026-07-11); will fill in over time. |
| Invoicing / bookkeeping / bill paying | 20th & 30th of every month | ~10 hrs/month total | Medium | **In Progress** | Scope is broader than Synnovatia — also covers personal, household, and husband Leon Carroll's business (The Veritas Collective). Jackie keeps executing payments herself (hard boundary: Claude cannot move money). Recurring reminder set 2026-07-11 for the 15th/30th, moved to the 20th/30th on 2026-07-15 (Feb naturally skips the 30th, no 30th to fire on). Claude offers light assistance (summarizing numbers, answering questions) each time — active categorization/reconciliation not yet requested. |
| Account reconciliation | 30th of every month | TBD | Medium | **Automated** (2026-07-13) | 4 accounts: household, personal, Synnovatia, The Veritas Collective, Inc. Scheduled task `account-reconciliation-reminder` — separate from the bill-pay reminder above, though it lands on the same day. |
| Mastermind: Monday "hot topics" email | Seven Figure Forum: irregular (4-7 week gaps, always Friday) — Aug 7, Sep 11, Oct 30, Dec 11 2026. Messy Middle: every other Friday, restarts Q4 2026 (Oct 9, Oct 23, Nov 6, Nov 20, Dec 4, Dec 18) | Small, but wants a reminder | High | **Fully Built** | 20 one-time reminders scheduled 2026-07-11: 8 for Seven Figure Forum (Zoey Smith, Mark Chapman, Christina Carlson, Anne Laguzza — $1M+ band), 12 for Messy Middle (Elise Eidsness, Wilma Nachsin, Amy Hage, Sandra Roe — $250K-$500K band). Each drafts the hot-topics email into Gmail and researches 2 articles matched to the group's revenue band. |
| Mastermind: Wednesday agenda day | Same cadence as above | Small | Medium | **Fully Built** | Jackie drafts the agenda herself from member feedback and posts to Google Calendar — Claude's job is just the reminder + having the 2 articles ready, not drafting the agenda. Reminders scheduled alongside the Monday ones. |
| Mastermind: Messy Middle meeting dates | 6 dates, Q4 2026 | — | High | **Automated** (2026-07-11) | Added to Jackie's Google Calendar: Oct 9, Oct 23, Nov 6, Nov 20, Dec 4, Dec 18, 8:00-9:15am Pacific. No attendee invites sent — calendar blocks only. |

## Marketing & Growth Initiatives (flagged 2026-07-12, not yet scoped)

| Task | Frequency | Est. Time | Automation Potential | Status | Notes |
|---|---|---|---|---|---|
| Grow Messy Middle membership | New | TBD | Medium | **In Progress** (plan written 2026-07-13) | Currently 4 real members (Elise, Wilma, Amy, Sandra) + Jackie. Women-only group, $250K-$500K band. Full plan: `plans/2026-07-13-messy-middle-growth.md` — 3 channels (HubSpot 397 segment, LinkedIn, re-engagement roster mining), targeting 3-5 new by Oct 2026. |
| Grow Seven Figure Forum membership | New | TBD | Medium | Not started | Currently 4 members (Zoey Smith, Mark Chapman, Christina Carlson, Anne Laguzza) + Jackie. $1M+ band. Target: 6 members by Jan 2027 (see `context/strategy.md`). |
| LinkedIn marketing — original content | Draft: Fridays 9am (batch of 3). Live: Mon/Wed/Fri 7:30am | ~15-20 min review/schedule on Friday | High | **Fully Built** (2026-07-12) | Full system in `context/linkedin-marketing.md`. Friday reminder batch-drafts all 3 posts (Mon thought leadership, Wed story, Fri client win) in brand voice. Jackie schedules each via LinkedIn's own scheduler for 7:30am — no auto-posting (LinkedIn detects/restricts automation, real account risk). |
| LinkedIn marketing — outreach/prospecting | As needed | TBD | Medium | **Templates Built** | ICP + 3 connection-request templates + 1 follow-up template in `context/linkedin-marketing.md`. Claude can't safely search/connect on LinkedIn itself — Jackie does the actual searching/connecting; Claude drafts messages when given a prospect. |
| LinkedIn marketing — commenting/engagement | Reactive | TBD | Low | **Guidance Built** | No live visibility into Jackie's feed, so this stays reactive — Jackie shares what she's seeing, Claude drafts comment angles per the voice guidance in `context/linkedin-marketing.md`. |
| HubSpot marketing — Active Engagers (340) | Draft: 2nd & 16th of month. Send: Jackie's call via HubSpot | ~15-20 min review/build per cycle | High | **Fully Built** (2026-07-12) | Full system in `context/hubspot-marketing.md`. Biweekly direct-CTA drafts — general (book a call) + Messy Middle-fit women variant (mastermind application). First round drafted: `outputs/hubspot-marketing/2026-07-12-first-round-drafts.md`. |
| HubSpot marketing — Drifting (382) | Draft: 9th of month | ~15-20 min review/build per cycle | High | **Fully Built** (2026-07-12) | Monthly value-first send, home of the recurring "What I'm Watching" economic-trends content thread. No CTA. |
| HubSpot marketing — Lapsed (511) | Draft: 23rd of odd months (Jan/Mar/May/Jul/Sep/Nov) | ~15-20 min review/build per cycle | High | **Fully Built** (2026-07-12) | Bi-monthly, reuses/adapts the "What I'm Watching" thread at lower frequency. Explicitly NOT a repeat of the prior "we miss you"/"stay in touch" win-back sequence Jackie already ran — pure value, no ask. |
| HubSpot marketing segmentation note | — | — | — | N/A | Active Engagers count (340) verified exact via live HubSpot property filter. Drifting/Lapsed/Messy-Middle-women counts (382/511/397) are Jackie's stated numbers from saved HubSpot Lists — list membership isn't queryable via this connector, so treated as ground truth rather than independently re-verified. |

## Personal

Moved to `personal/task-audit.md` (2026-07-13) to keep the personal side of the KPI scoreboard separate from business tasks. See that file for grocery/meal planning, workout, weight tracking, cooking/cleaning/yard work, vacation, home maintenance, gifts, and school.

---

## Answered (2026-07-11)

- LinkedIn metrics: 15 min/week
- Invoicing/bookkeeping/bill paying: ~10 hrs/month, twice-monthly, spans personal + household + The Veritas Collective (husband's business) + Synnovatia
- Mastermind admin: minimal weekly, but two real recurring tasks (Monday hot-topics email, Wednesday agenda + 2 articles) — see table above for cadence
- Seven Figure Forum meets every 6 weeks; Messy Middle meets every other week but is on hiatus until Q4 2026
- Email response: ~30 min/day

## Still Open

1. **Messy Middle growth marketing** — plan written 2026-07-13 (`plans/2026-07-13-messy-middle-growth.md`); execution (dedicated HubSpot send, roster mining, LinkedIn weighting) not yet started
2. **Personal + school round** — completed 2026-07-12, now tracked separately in `personal/task-audit.md`
3. **Sales funnel tracking** — flagged 2026-07-15 as a future dashboard addition: prospects → sales calls → close rate. Not started; needs a decision on where the source data would live (HubSpot deal pipeline? a new log file?) before it can be built.
4. **LinkedIn metrics time series** — flagged 2026-07-15: the weekly LinkedIn check-in (see row above) currently writes into `context/current-data.md`/`data/key-metrics.md` as prose, not a structured log, so there's no real trend to chart yet. A simple dated CSV (profile views, post impressions, engagement, followers) would let this feed the dashboard the way Stripe data does.

---

_Update this file whenever a task's status changes. This is the scoreboard for the "Task Automation %" KPI in CLAUDE.md._
