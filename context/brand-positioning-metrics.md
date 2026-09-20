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
| **Current standard rates (pre-increase baseline)** | Monthly retainers: **$325/mo** (1 meeting), **$600/mo** (2×60min meetings), **$1,100/mo** (4 meetings) | `context/business-info.md` |
| **Rate increase progress** (target: **40% by ~January 2027**, per `context/strategy.md`) | **0% so far** — no rate change confirmed as of 2026-09-13. This is the actual named goal this whole rebrand is meant to support; track every new client agreement's rate against the baseline above going forward, and log the date/amount whenever a rate change happens. **Rollout approach decided 2026-09-20:** new clients go straight to the full +40% pricing; existing clients get a smaller initial bump, then step up gradually over time until they reach the same +40% level — not an across-the-board increase on a single date. This directly lowers the pushback/retention risk in the row below (existing relationships aren't hit with the full jump at once) at the cost of a slower blended revenue ramp than an immediate across-the-board increase would produce. Actual new-client target pricing: hourly $300 → $420; retainers $325/$600/$1,100 → ~$455/$840/$1,540; Solutions on the Fly $140/$275 → ~$195/$385; Mastermind for the Messy Middle $675/qtr → ~$945/qtr; Seven Figure Forum $1,299/round → ~$1,820/round (see `outputs/website-redesign/2026-09-20-video-testimonial-outreach-and-guide.md` and the 5-year plan conversation for the full breakdown). Existing-client glide-path schedule (how much, how often) not yet decided — next real decision point. |
| Client retention / rate-increase pushback | No baseline — watch for it. A 40% increase risks losing existing clients even while it attracts new ones at the higher rate; log any client who leaves, downgrades, or pushes back specifically citing price, so this initiative's net effect (not just new-client wins) stays visible. | — |

### More Exposure

| Metric | Baseline | Source |
|---|---|---|
| Branded search volume ("Synnovatia" queries) | **No real customer brand searches found yet** — see corrected note below | Search Console (manual pull), 2026-09-13 |
| Organic traffic / referral source mix | **3,750 total sessions** (Jun 21–Sep 13 window): Direct 2,973 (79.3%), Referral 514 (13.7%), Organic Search 173 (4.6%), Email 24 (0.6%), Unassigned 18 (0.5%), Organic Social 13 (0.4%), AI Assistant 1 — see quality flag below | Google Analytics (manual pull), 2026-09-13 |
| LinkedIn followers | 5,779 | `data/linkedin-metrics/log.csv`, 2026-09-11 |
| LinkedIn 7-day post impressions | 183 (a slow week — see note below) | Same, 2026-09-11 |
| LinkedIn 7-day search appearances | 23 | Same, 2026-09-11 |
| New inbound contacts with no prior relationship | No baseline — start tracking from now (HubSpot lifecycle stage "new" + source ≠ existing roster) | — |
| **"How did you hear about us / why now" at intake** | **Not currently captured anywhere.** Checked `context/client-onboarding.md`'s Client Profile form (step 1 of onboarding) — it captures business data (revenue, industry, goals) but attribution/referral-source isn't confirmed as one of its fields. Without this, revenue and traffic numbers can grow without ever confirming the *positioning* is what actually converted someone, versus an existing relationship reactivating on its own. **Action item: check the Client Profile form's real fields, and add a "how did you hear about Synnovatia / what made you reach out now" question if it's missing.** This is the single most direct way to validate the new message is doing real work. | `context/client-onboarding.md` |

*Note: 9/11's LinkedIn week was the lightest in impressions since 7/17 per the existing log — treat as a noisy single data point, not necessarily the "true" launch-week baseline. The 8/28–9/4 weeks (285–376 impressions) may be a more representative recent run rate to compare against going forward.*

**Correction, 2026-09-13 (same day):** the initial "157 impressions, 0 clicks, avg. position 40.4" pull looked like a real branded-ranking problem, but the per-query breakdown showed only 2 rows total (`site:synnovatia.com` and `site:www.synnovatia.com`) making up that entire total. Those are `site:` search-operator queries — a technical way of checking what's indexed on a domain — not real customer searches for "Synnovatia." **There is no evidence of real customer brand-name searches in this 3-month window at all.** This is a different (and less alarming) finding than "ranking badly for your own name": it means almost nobody has searched your brand name yet, not that people are searching and not finding you. That's consistent with low current exposure for a small/relaunched brand rather than a technical problem.

**Indexing checked 2026-09-13 — also ruled out, independent of the above correction.** `https://synnovatia.com` (no www) shows "URL is not on Google" in URL Inspection, but `https://www.synnovatia.com` is indexed, and the non-www URL correctly 301-redirects to the www version when visited directly — expected canonicalization behavior, not a broken/missing homepage.

**Real baseline going forward:** effectively 0 real branded search impressions as of 2026-09-13. Re-pull in a few weeks (filtering to the exact query "synnovatia," not "contains synnovatia," to avoid catching `site:` operator noise again) to see whether real branded search volume starts appearing as exposure grows.

**GA data-quality flag, 2026-09-13:** the Reports snapshot's Top pages/screens table showed a page titled **"trafficheap.cc"** with 502 views/502 active users and a suspiciously low 0.2% bounce rate — the classic signature of referral-spam bot traffic (a fake "page" disguised as a hostname), not real visitors. This likely also explains why **Direct is 79.3% of all sessions but averages only 2 seconds of engagement time** — real direct visitors (someone typing your URL or using a bookmark) don't typically bounce that fast at that volume. By contrast, Referral (40s avg. engagement, 98.6% engagement rate) and Organic Search (1m19s avg., 90.2% engagement rate) look like genuine human traffic. **Treat the 79.3% Direct figure as inflated by bot traffic, not a real "warm traffic" signal**, until this is filtered out. A real fix (excluding this source, or setting up bot-filtering in GA) is worth doing before trusting the Direct number going forward — flagging as an action item, not yet resolved. Separately, "Page not found – Synnovatia" was dug into properly (2026-09-13): **188 sessions / 370 views across 89 distinct broken URLs in the last 90 days, real hostname, real visitors.** 75 of the 89 (84%) share one root cause — the old pre-WordPress HubSpot blog's URL structure (`/business-coaching-blog/bid/{id}/{slug}`) never got redirects during migration, and the numeric ID is still recoverable from the current site's own slugs, so most have a live counterpart just waiting on a redirect. Full breakdown, raw data, and recommended fix path: `outputs/website-redesign/2026-09-13-404-broken-links-audit.md` and its companion `.csv`. Not fixable from this session (no live site/browser access here) — handed off for the next browser-enabled session to action.

### Greater Interest

| Metric | Baseline | Source |
|---|---|---|
| LinkedIn 7-day social engagements | 4 (slow week, same caveat as above) | `data/linkedin-metrics/log.csv`, 2026-09-11 |
| LinkedIn 90-day profile views | 54 | Same |
| Time on site / pages per session on repositioned pages (About, Work With Me, The Messy Middle) | Not yet pulled — GA is manual | Google Analytics (manual) |
| Free Business Assessment downloads / Schedule-a-Conversation clicks | **Not yet wired as trackable GA goals/events.** These are the site's two real soft-conversion actions — until they're set up as actual GA Events (or Conversions), there is zero visibility into whether the redesigned site is generating any leads at all. **Action item, not just a data gap: set these up as GA4 Events next time GA is being configured**, so future pulls have real numbers instead of nothing. | — |
| Qualitative: prospects echoing "Strategic Perspective" language unprompted | No baseline by definition — log each occurrence as it happens | Jackie reports |

---

## How This Gets Tracked

- **Stripe/HubSpot revenue and mastermind counts:** already flow into `context/group/key-metrics.md` and `context/current-data.md` via the existing "Update my metrics" workflow — this file re-reads those rather than duplicating collection.
- **LinkedIn:** already tracked via the Aggregate Analytics export workflow in `context/linkedin-marketing.md` — this file pulls its most recent `log.csv` row rather than asking Jackie to report the same numbers twice.
- **Search Console branded query volume:** baseline captured 2026-09-13 — effectively 0 real customer searches found (see corrected note above). Re-pull periodically, filtered to the exact query "synnovatia" rather than "contains synnovatia" to avoid catching `site:` operator noise again, and log here.
- **Google Analytics (traffic source mix, time on page, goal clicks):** manual, same as the rest of this workspace's GA usage — report numbers when you pull them, Claude logs here. Traffic-mix baseline captured 2026-09-13; GA on production confirmed live and tracking (resolves that open item from the pre-launch checklist). A likely bot-traffic contamination issue (see flag above) should get filtered out before the next pull, so the Direct/Referral/Organic split is trustworthy.
- **Discovery calls, rate acceptance, sales cycle:** no automated system exists (HubSpot's deal data doesn't capture this cleanly). Report each discovery call's outcome as it happens — booked, no-show, proposal sent, rate quoted, closed/not closed, and if not closed, why — and Claude logs it to the History table below.
- **Qualitative echo-back signal:** report whenever a prospect uses your own positioning language ("strategic perspective," "feel it from the first conversation," etc.) unprompted on a call or in writing — this is one of the strongest signals the message is landing, even without a formal metric.
- **Rate increase progress:** report whenever a client agreement locks in a rate — new or renewal — so it can be checked against the $325/$600/$1,100 baseline tiers and rolled into a running "% toward 40%" read.
- **Client retention / pushback:** report if any client leaves, downgrades, or objects specifically to price — this is the cost side of the rate-increase initiative and needs to stay visible alongside the wins.
- **"How did you hear about us" intake question:** open action item — check the real fields on the Client Profile HubSpot form (linked from `context/client-onboarding.md`) and add this question if it's missing, so future signed clients' attribution actually gets captured.
- **GA Events for Free Business Assessment / Schedule-a-Conversation:** open action item — these need to be set up as real GA4 Events before they can be tracked at all.

## History

| Date | Stripe Rev YTD | LinkedIn Followers | LI 7d Impressions | LI 7d Engagements | Branded search (impr/clicks/pos) | New clients since launch | Notes |
|---|---|---|---|---|---|---|---|
| 2026-09-11 (baseline) | $12,385 | 5,779 | 183 | 4 | — | 0 | Launch-day baseline — site redesign and new positioning fully live. Impressions/engagements this specific week ran below the recent average (see caveat above); treat as one data point, not the true run rate. |
| 2026-09-13 | — | — | — | — | ~0 real | — | First branded Search Console pull initially read as 157 impr/0 clicks/pos 40.4, but the per-query breakdown showed that total was entirely `site:` operator queries (technical checks), not real customer searches — corrected same day. Real branded search volume is effectively 0 so far. Also confirmed homepage indexing/www-redirect are healthy, ruling that out as a factor. GA traffic-mix baseline also pulled same day: 3,750 sessions, 79.3% Direct / 13.7% Referral / 4.6% Organic Search — but Direct is likely inflated by bot traffic (a "trafficheap.cc" spam page and abnormally low 2s avg. engagement on Direct sessions), flagged for cleanup before trusting the split. |

---

_Update monthly, or whenever a real data point comes in (a discovery call, a closed deal, a fresh LinkedIn export, a Search Console pull). This is the source of truth for whether the rebrand/positioning is working — same role `personal/health-goals.md` plays for fitness._
