# Brand & Positioning Metrics

> Baseline captured 2026-09-13, tracking from the 2026-09-11 site relaunch (new "Strategic Perspective You Feel From the First Conversation" positioning, brand voice, and full site redesign — see `HISTORY.md`'s 2026-09-11 entry). Mirrors how `personal/health-goals.md` and `context/strategy.md` work — real numbers tracked against, not just reminders.

---

## Why This Exists

Jackie's question (2026-09-13): since updating the brand and positioning, is it actually working — creating more business, more exposure, greater interest? This file tracks that against a real pre/post-launch baseline rather than a gut feel.

## Baseline (as of 2026-09-11 launch)

### More Business

| Metric | Baseline | Source |
|---|---|---|
| Stripe revenue YTD (net) | $12,385 | `data/data.db` (Stripe live), 2026-09-11 |
| Stripe revenue MTD | $300 | Stripe live, 2026-09-11 |
| Total customers (all-time) | 48 | Stripe live |
| Self-reported YTD income | $17,425.02 | `context/current-data.md`, 2026-09-08 |
| Seven Figure Forum members | 4 (target: 6 by Jan 2027) | `context/current-data.md` |
| Mastermind for the Messy Middle members | 4 total, 2 paying (target: 8 total by Oct 2026) | `context/current-data.md` |
| Close rate (discovery call → signed client) | **No clean baseline exists.** HubSpot deals are logged at payment/closed-won, not from an initial discovery-call stage — checked 2026-09-13, only 29 deals total in HubSpot, mostly historical Payment Link records, not a tracked call pipeline. | — |
| Average new deal size | No meaningful baseline — too sparse/varied (recent deals: $325 on 9/10, $225 on 7/26) | HubSpot |
| Rate acceptance rate (proposals accepted at new pricing without negotiation) | No historical log — start tracking from now | — |
| Sales cycle length (first contact → signed) | No historical log — start tracking from now | — |

### More Exposure

| Metric | Baseline | Source |
|---|---|---|
| Branded search volume ("Synnovatia" queries) | **Not yet pulled.** Capture on the next Search Console refresh — last general keyword pull was 2026-08-11 per `content/strategy.md`, wasn't broken out by branded vs. non-branded query. | Search Console (manual pull) |
| Organic traffic / referral source mix | Not yet pulled — GA integration is manual, no baseline snapshot exists | Google Analytics (manual) |
| LinkedIn followers | 5,779 | `data/linkedin-metrics/log.csv`, 2026-09-11 |
| LinkedIn 7-day post impressions | 183 (a slow week — see note below) | Same, 2026-09-11 |
| LinkedIn 7-day search appearances | 23 | Same, 2026-09-11 |
| New inbound contacts with no prior relationship | No baseline — start tracking from now (HubSpot lifecycle stage "new" + source ≠ existing roster) | — |

*Note: 9/11's LinkedIn week was the lightest in impressions since 7/17 per the existing log — treat as a noisy single data point, not necessarily the "true" launch-week baseline. The 8/28–9/4 weeks (285–376 impressions) may be a more representative recent run rate to compare against going forward.*

### Greater Interest

| Metric | Baseline | Source |
|---|---|---|
| LinkedIn 7-day social engagements | 4 (slow week, same caveat as above) | `data/linkedin-metrics/log.csv`, 2026-09-11 |
| LinkedIn 90-day profile views | 54 | Same |
| Time on site / pages per session on repositioned pages (About, Work With Me, The Messy Middle) | Not yet pulled — GA is manual | Google Analytics (manual) |
| Free Business Assessment downloads / Schedule-a-Conversation clicks | Not yet wired as trackable GA goals — flagged to set up | — |
| Qualitative: prospects echoing "Strategic Perspective" language unprompted | No baseline by definition — log each occurrence as it happens | Jackie reports |

---

## How This Gets Tracked

- **Stripe/HubSpot revenue and mastermind counts:** already flow into `context/group/key-metrics.md` and `context/current-data.md` via the existing "Update my metrics" workflow — this file re-reads those rather than duplicating collection.
- **LinkedIn:** already tracked via the Aggregate Analytics export workflow in `context/linkedin-marketing.md` — this file pulls its most recent `log.csv` row rather than asking Jackie to report the same numbers twice.
- **Search Console branded query volume:** pull specifically (not just general keyword clusters) next time `content/strategy.md`'s keyword table is refreshed, and log it here too.
- **Google Analytics (traffic source mix, time on page, goal clicks):** manual, same as the rest of this workspace's GA usage — report numbers when you pull them, Claude logs here.
- **Discovery calls, rate acceptance, sales cycle:** no automated system exists (HubSpot's deal data doesn't capture this cleanly). Report each discovery call's outcome as it happens — booked, no-show, proposal sent, rate quoted, closed/not closed, and if not closed, why — and Claude logs it to the History table below.
- **Qualitative echo-back signal:** report whenever a prospect uses your own positioning language ("strategic perspective," "feel it from the first conversation," etc.) unprompted on a call or in writing — this is one of the strongest signals the message is landing, even without a formal metric.

## History

| Date | Stripe Rev YTD | LinkedIn Followers | LI 7d Impressions | LI 7d Engagements | New clients since launch | Notes |
|---|---|---|---|---|---|---|
| 2026-09-11 (baseline) | $12,385 | 5,779 | 183 | 4 | 0 | Launch-day baseline — site redesign and new positioning fully live. Impressions/engagements this specific week ran below the recent average (see caveat above); treat as one data point, not the true run rate. |

---

_Update monthly, or whenever a real data point comes in (a discovery call, a closed deal, a fresh LinkedIn export, a Search Console pull). This is the source of truth for whether the rebrand/positioning is working — same role `personal/health-goals.md` plays for fitness._
