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
| Branded search volume ("Synnovatia" queries) | **157 impressions, 0 clicks, avg. position 40.4** | Search Console (manual pull), 2026-09-13 |
| Organic traffic / referral source mix | Not yet pulled — GA integration is manual, no baseline snapshot exists | Google Analytics (manual) |
| LinkedIn followers | 5,779 | `data/linkedin-metrics/log.csv`, 2026-09-11 |
| LinkedIn 7-day post impressions | 183 (a slow week — see note below) | Same, 2026-09-11 |
| LinkedIn 7-day search appearances | 23 | Same, 2026-09-11 |
| New inbound contacts with no prior relationship | No baseline — start tracking from now (HubSpot lifecycle stage "new" + source ≠ existing roster) | — |

*Note: 9/11's LinkedIn week was the lightest in impressions since 7/17 per the existing log — treat as a noisy single data point, not necessarily the "true" launch-week baseline. The 8/28–9/4 weeks (285–376 impressions) may be a more representative recent run rate to compare against going forward.*

**Flag worth a second look:** an average position of 40.4 (page 4+) for your own brand name is unusually low — a company's branded query typically ranks #1, since Google strongly favors a site for searches of its own name. 0 clicks out of 157 impressions is consistent with that (searchers aren't seeing you near the top, so they aren't clicking).

**Indexing checked 2026-09-13 — ruled out as the cause.** `https://synnovatia.com` (no www) shows "URL is not on Google" in URL Inspection, but `https://www.synnovatia.com` is indexed, and the non-www URL correctly 301-redirects to the www version when visited directly — so this is expected canonicalization behavior (Google correctly treats the redirect target as the real page), not a broken/missing homepage. Not the explanation for the weak branded position.

**Still open:** the 40.4 average is a blend across all "contains synnovatia" queries in the 3-month window, not necessarily the exact query "synnovatia" itself — a handful of unrelated long-tail matches could be dragging the average down while the core brand query ranks fine. Next step: pull the per-query breakdown (not just the aggregate) to see where "synnovatia" itself actually lands, and re-check the aggregate again in a few weeks post-relaunch regardless.

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
- **Search Console branded query volume:** baseline captured 2026-09-13. Re-pull periodically (e.g. alongside `content/strategy.md`'s keyword refreshes) and log it here — worth checking again in a few weeks given the low starting position flagged above.
- **Google Analytics (traffic source mix, time on page, goal clicks):** manual, same as the rest of this workspace's GA usage — report numbers when you pull them, Claude logs here.
- **Discovery calls, rate acceptance, sales cycle:** no automated system exists (HubSpot's deal data doesn't capture this cleanly). Report each discovery call's outcome as it happens — booked, no-show, proposal sent, rate quoted, closed/not closed, and if not closed, why — and Claude logs it to the History table below.
- **Qualitative echo-back signal:** report whenever a prospect uses your own positioning language ("strategic perspective," "feel it from the first conversation," etc.) unprompted on a call or in writing — this is one of the strongest signals the message is landing, even without a formal metric.

## History

| Date | Stripe Rev YTD | LinkedIn Followers | LI 7d Impressions | LI 7d Engagements | Branded search (impr/clicks/pos) | New clients since launch | Notes |
|---|---|---|---|---|---|---|---|
| 2026-09-11 (baseline) | $12,385 | 5,779 | 183 | 4 | — | 0 | Launch-day baseline — site redesign and new positioning fully live. Impressions/engagements this specific week ran below the recent average (see caveat above); treat as one data point, not the true run rate. |
| 2026-09-13 | — | — | — | — | 157 / 0 / 40.4 | — | First branded Search Console pull. Position 40.4 for the brand's own name is unusually weak — flagged for a re-check in a few weeks (see note above). |

---

_Update monthly, or whenever a real data point comes in (a discovery call, a closed deal, a fresh LinkedIn export, a Search Console pull). This is the source of truth for whether the rebrand/positioning is working — same role `personal/health-goals.md` plays for fitness._
