# HubSpot Marketing — 1:1 Client Generation

> Built 2026-07-12. Goal: generate new 1:1 clients from existing HubSpot marketing contacts, segmented by engagement recency. Voice follows `context/brand-voice.md` throughout. Channel is HubSpot itself — Claude drafts email copy/strategy, Jackie builds and sends the actual campaigns (no tool access to create/send HubSpot marketing emails or workflows directly).

---

## Segments (marketing contacts only, no non-marketing contacts)

| Segment | Definition | Count (as of 2026-07-12) | Verified |
|---|---|---|---|
| Active Engagers | Opened/clicked a marketing email in the last 90 days | 330 (updated 2026-08-02, was 340) | Confirmed exact match via HubSpot property filter (`hs_email_last_open_date`/`hs_email_last_click_date`) |
| Drifting | 90-180 days since last engagement | 382 | Jackie's stated number — HubSpot List membership isn't queryable via this connector, so treated as ground truth rather than independently verified (a rough date-filter approximation found only 88, confirming saved-list logic is more precise than raw property filters) |
| Lapsed | 180+ days since last engagement | 511 | Same as above — ground truth from Jackie |
| Messy Middle-fit women | Women who fit the Messy Middle mastermind criteria | 397 | Ground truth from Jackie — cuts across the above segments, used to route the mastermind-specific CTA |

## Cadence & Strategy Per Segment

### Active Engagers (340) — Biweekly, direct CTA
Warm audience. Go direct:
- **Messy Middle-fit women (397, overlapping subset):** invite to apply for the Mastermind for the Messy Middle
- **Everyone else:** book a "solutions on the fly" call, or Seven Figure Forum invite if revenue fit ($1M+)

**Draft cadence (updated 2026-08-02):** the `hubspot-active-engagers-draft` scheduled task now fires every Thursday at 6am Pacific, ~6 days ahead of each biweekly Wednesday send, instead of the prior 2nd/16th-of-month schedule (which had drifted onto a Sunday). Since cron can't express a true 14-day interval, the task self-checks the Send Performance Log below each run and skips drafting if one was already produced in the last ~10 days.

### Drifting (382) — Monthly, value-first
Not pitchy — goal is re-earning attention before they go fully cold. Thought leadership, useful content, warm reconnection tone. Home of the "What I'm Watching" thread (see below).

**Standing send day: Wednesdays** (decided 2026-07-28, to match the day Active Engagers sends tend to land on). First real send (using live `what-im-watching-cloud` research instead of the earlier generic placeholder) goes out 2026-07-29.

**Draft cadence (updated 2026-08-03):** the `hubspot-drifting-draft` scheduled task now fires every Thursday at 6am Pacific instead of the prior fixed 9th-of-month/10am schedule — same drift-avoidance fix as Active Engagers. The task self-checks for a Drifting draft in the last ~25 days and skips if one's already been produced this cycle.

**Reply-ask experiment (2026-07-29 send only, not yet a standing rule):** the drafted "no CTA, no ask" closer got replaced in Jackie's final edit with a genuine reply-engagement ask ("hit reply and let me know what you found most helpful") — driven by her own curiosity about reception, since this is the first "What I'm Watching" send to this segment, not a deliberate permanent strategy shift. Watch reply volume/content on this send before deciding whether to make it standing for future Drifting/Lapsed sends or drop back to pure value-only with no ask.

### Lapsed (511) — Bi-monthly (every ~6-8 weeks), pure value, no ask
**Decided 2026-07-12:** explicitly NOT a repeat of the previous "we miss you" / "should we stay in touch" win-back sequence Jackie already ran. Instead: fold into the same "What I'm Watching" content thread as Drifting, at lower frequency (deliverability best practice — don't over-mail cold contacts). No CTA, no ask. The rebrand itself is the quiet reason to notice her again. If someone re-engages, they naturally move to Drifting/Active cadence based on actual behavior — no explicit opt-back-in moment needed.

**Draft cadence (updated 2026-08-03):** the `hubspot-lapsed-draft` scheduled task now fires every Thursday at 6am Pacific instead of the prior fixed 23rd-of-odd-months/10am schedule — same drift-avoidance fix as Active Engagers and Drifting. The task self-checks for a Lapsed draft in the last ~45 days and skips if one's already been produced this cycle.

## Queued Content for Next Active Engagers Send

Article(s) Jackie's flagged to work into the next WIW-format Active Engagers draft (see the every-third-send rotation rule above). Remove each entry once it's been used in a draft.

- **Referral Marketing Statistics for 2026** (GrowSurf, referencing Nielsen's Global Trust in Advertising study) — saved 2026-08-03. 88-92% of consumers trust recommendations from people they know above any other form of advertising; referred customers convert at 3-5x other channels with 37% higher retention. **Why it matters:** most $250K-4M service businesses already grow primarily through referrals but rarely run a deliberate system for generating them — as trust in ads and cold outreach keeps eroding, formalizing referral generation is one of the highest-leverage, lowest-cost growth levers to prescribe to clients. Link: https://growsurf.com/statistics/referral-marketing-statistics/ (unwrapped from the Gmail redirect link Jackie pasted).

## Recurring Content Thread — "What I'm Watching"

A monthly economic-trends piece: what's happening in the economy, what to watch for, recommendations for small business owners. Positions Jackie as someone who keeps her audience informed, not just a service pitch. Appears in the Drifting monthly send, the Lapsed bi-monthly send (roughly every other cycle), and periodically in the Active Engagers biweekly rotation.

## Execution Notes

- Claude drafts email copy; Jackie builds/sends via HubSpot (no direct tool access to HubSpot's email/workflow creation)
- Brand voice throughout: peer not guru, precise not generic, warm not soft, confident not boastful, equip not help (see `context/brand-voice.md`)
- List segmentation (382/511/397) lives in Jackie's HubSpot Lists — Claude can't query these directly, relies on Jackie's counts

## Handling Unsubscribes (decided 2026-07-26)

- **Never delete an unsubscriber.** HubSpot auto-suppresses anyone who clicks unsubscribe — they will not receive future marketing without any action. Deleting the contact destroys that suppression record, so if they ever re-enter the system (import, form fill, integration sync) they come back emailable — a CAN-SPAM / GDPR violation. The unsubscribe record is a compliance asset; keep it.
- **Do nothing is the correct default** — suppression already holds. Optionally set them **non-marketing** to trim the billable marketing-contact count; that's safe and keeps the unsubscribe intact. Non-marketing >> delete, always.
- Distinct from deleting a contact *for cause* (e.g. Cora Willard, 2026-07-22 — removed entirely, no relationship wanted). That's not an unsubscribe and is the rare exception.

## Send Performance Log

Running record of real send stats, newest first. Benchmarks for consulting/professional-services email: opens ~20-25% (soft metric — Apple Mail Privacy inflates), unsub healthy under ~0.5%.

| Date | Segment | Open | Click (of sent) | CTOR | Bounce | Unsub | Notes |
|---|---|---|---|---|---|---|---|
| 2026-07-22 | Active Engagers (~340) | 30.09% | 0.86% | 2.86% | 2 (~0.6%) | 6 (1.72%) | **Final stats (2026-08-02 update).** General direct-CTA "book a call" send. Opens strong (well above norm), clicks soft, **unsub ~3.4× the healthy threshold** — consistent with a hard sales CTA. Keep direct asks to Active Engagers only; Drifting/Lapsed stay value-first. Watch whether the next Active Engagers send's unsub rate stays elevated or was a one-off. |

---

_Update as campaigns run and results come in — note what's working per segment._
