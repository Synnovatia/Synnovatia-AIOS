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

## Queued Content for Next Lapsed Send

Jackie's flagged this combination (2026-08-09) to build the next Lapsed "What I'm Watching" edition around, once the current 2026-08-08 draft (`outputs/hubspot-marketing/2026-08-08-lapsed-draft.md`) has gone out. Three pieces meant to tie together as one throughline (how service businesses grow right now, backed by real numbers) rather than run as separate unrelated items:

- **How service businesses can grow in 2026** (Fast Company) — from the 2026-08-07 `what-im-watching-cloud` digest. Argues the highest-leverage moves in a slower-growth environment are deepening existing-client expansion/retention (cheaper and faster than new-logo acquisition) and building steady referral-partner pipelines, paired with tightly targeted rather than broad campaigns. Link: https://www.fastcompany.com/91502717/how-service-businesses-can-grow-in-2026
- **Referral stat** (LocaliQ, "The Big Small Business Marketing Trends Report for 2026") — also from the 2026-08-07 digest. 83% of small business owners now name referrals as their top customer-acquisition source, up sharply from 65% a year earlier. Link: https://localiq.com/blog/small-business-marketing-trends-report-2026/
- **12% marketing-spend benchmark** (Hinge Marketing, "5 Key Takeaways from the 2026 High Growth Study") — already used once in the 2026-08-08 Lapsed draft; reuse or re-cite depending on how much time has passed by the next send. High-growth professional services firms invest 12% of revenue in marketing (vs. 5% for no-growth firms) and grow roughly 4x faster. Link: https://hingemarketing.com/blog/story/5-key-takeaways-from-the-2026-high-growth-study

**Why this combination:** ties Synnovatia's own growth advice (client expansion + referrals over broad acquisition) to two independent data points that back it up — a real benchmark to self-check against (12%) and a real shift in what's actually working for acquisition (referrals overtaking other channels). Fits the Lapsed segment's value-first, no-CTA strategy: informs rather than pitches, but the throughline itself doubles as an implicit case for referral-program thinking, which is also live on Jackie's own to-do list (see `referral-program-followup` reminder, 2026-08-14).

## Recurring Content Thread — "What I'm Watching"

A monthly economic-trends piece: what's happening in the economy, what to watch for, recommendations for small business owners. Positions Jackie as someone who keeps her audience informed, not just a service pitch. Appears in the Drifting monthly send, the Lapsed bi-monthly send (roughly every other cycle), and periodically in the Active Engagers biweekly rotation.

## Execution Notes

- **Since 2026-08-06:** Claude drafts email copy AND creates it as a real draft inside HubSpot (via `manage_marketing_email` — CREATE + EDIT_CONTENT), once Jackie reauthorized the HubSpot connection with Marketing Email API access. The Word doc deliverable stays too; both are produced so Jackie can review/edit in whichever she prefers. **Scheduling/sending still can't be automated** — not a permission issue this time, HubSpot's marketing email tools simply have no send/schedule operation exposed at all, so every send still requires Jackie's own action in HubSpot's UI. That's a hard ceiling, not a gap waiting to be closed.
- Confirmed send recipe (verified against Jackie's own real sends, 2026-08-06) — subscription type **185396 "Business Insights & Updates"**, from **"Jackie Nagel, Synnovatia"**, reply-to **jackie@synnovatia.com**, across all three segments. Recipient list IDs: Active Engagers general = **400** (exclude 404), Active Engagers Messy Middle-fit = **404**, Drifting = **401** (exclude 400/402/404), Lapsed = **402** (exclude 219).
- **Still fully blocked:** `marketable-contacts-write` (flipping unsub'd contacts to non-marketing) and `CAMPAIGN` object read/write (the latter needs an account-level change, not reauthorization — see Handling Unsubscribes above).
- **Style learning (added 2026-08-06):** `hubspot-send-stats-tracker` now also diffs the original markdown draft against the final shipped copy (via PREVIEW_CONTENT) once a send clears the 5-day stats window, and appends a plain-English description to `outputs/hubspot-marketing/style-learning-log.md`. That's a raw log, not standing guidance. A separate monthly task, `hubspot-style-pattern-review` (1st of the month), reads the accumulated log for edits that repeat across 2+ sends and texts Jackie a candidate rule to confirm — it never writes to this file or a memory file unsupervised. A pattern only becomes real guidance once she confirms it live, same as how the existing LinkedIn and re-engagement email edit-pattern memories were captured.
- Claude drafts email copy; Jackie builds/sends via HubSpot (no direct tool access to HubSpot's email/workflow creation)
- Brand voice throughout: peer not guru, precise not generic, warm not soft, confident not boastful, equip not help (see `context/brand-voice.md`)
- List segmentation (382/511/397) lives in Jackie's HubSpot Lists — Claude can't query these directly, relies on Jackie's counts

## Handling Unsubscribes (decided 2026-07-26)

- **Never delete an unsubscriber.** HubSpot auto-suppresses anyone who clicks unsubscribe — they will not receive future marketing without any action. Deleting the contact destroys that suppression record, so if they ever re-enter the system (import, form fill, integration sync) they come back emailable — a CAN-SPAM / GDPR violation. The unsubscribe record is a compliance asset; keep it.
- **Do nothing is the correct default** — suppression already holds. Optionally set them **non-marketing** to trim the billable marketing-contact count; that's safe and keeps the unsubscribe intact. Non-marketing >> delete, always.
- Distinct from deleting a contact *for cause* (e.g. Cora Willard, 2026-07-22 — removed entirely, no relationship wanted). That's not an unsubscribe and is the rare exception.

**Setting non-marketing status can't be automated end-to-end.** The `hs_marketable_status` property (the actual marketing/non-marketing toggle) is blocked from API writes — the connector lacks the `marketable-contacts-write` scope specifically. Confirmed blocked three times now: 2026-07-22 (Cora Willard), 2026-08-06 (Bill Peloquin, before Jackie's HubSpot reauthorization), and again 2026-08-06 (Bill Peloquin, retested immediately after that same reauthorization) — same error every time. **Bill Peloquin is still not fixed** — an earlier note in this conversation claiming he'd been flipped to non-marketing was wrong; the write never actually succeeded. The 2026-08-06 reauthorization fixed Marketing Email and Marketing Event access but did NOT fix this scope — it appears to be a separate permission that needs its own grant. Not something Claude can do from here.

**Workaround in place since 2026-08-06:** the `hubspot-unsub-nonmarketing-check` scheduled task runs weekly (Thursdays 6:14am) and searches for contacts where `hs_email_optout = true` but `hs_marketable_status` is still `true`. If it finds any, it texts Jackie the names/emails so she can flip them to non-marketing herself in HubSpot's UI (Contacts → filter → bulk action). It does not attempt the write itself. If a future session finds the write actually succeeds, that's a real change worth flagging, not something to assume.

## Send Performance Log

**Auto-tracked since 2026-08-06** by the `hubspot-send-stats-tracker` scheduled task (Mondays 6am, moved from 8am on 2026-08-10). Originally built as a contact-property proxy (marketing email objects were unreadable at the time), then rebuilt the same day once Jackie reauthorized the HubSpot connection with Marketing Email API access — now pulls real per-send stats directly via `get_marketing_email_analytics` (open/click rate excluding bots, unsubscribes, bounces), matched to a segment by parsing the email's name and identified via `hs_publish_date`. Waits 5+ days after a send before logging, so opens/clicks have time to accumulate. Texts Jackie a summary when it logs something; stays silent otherwise.

Running record of real send stats, newest first. Benchmarks for consulting/professional-services email: opens ~20-25% (soft metric — Apple Mail Privacy inflates), unsub healthy under ~0.5%.

| Date | Segment | Open | Click (of sent) | CTOR | Bounce | Unsub | Notes |
|---|---|---|---|---|---|---|---|
| 2026-08-19 | Active Engagers (236 delivered) | 50.42% | 0.00% | 0.00% | 0 | 1 (0.42%) | **Shipped content bears no resemblance to either drafted version** — see style-learning-log entry same date; this wasn't the planned direct-CTA "book a call" send at all, it was a different economic-commentary piece linking out to an existing blog post, with no CTA button. Delivered count (236) is well under the segment's registered ~330 contacts and doesn't match either drafted list size — no separate Messy Middle-fit email was found sent this cycle, only this one general-list send. **Open rate (50.42%) is by far the highest logged in this table** — more than double every prior send — but with zero clicks and no CTA in the shipped copy, there's nothing to attribute engagement to beyond the open itself. Unsub and bounce both stayed healthy. |
| 2026-08-12 | Lapsed (449 delivered) | 8.24% | 0.00% | 0.00% | 1 (~0.22%) | 1 (0.22%) | **First-ever Lapsed send logged in this table.** Shipped content was a full rewrite, not the drafted "What I'm Watching" economic-roundup piece — see style-learning-log entry same date. Open rate is well below the ~20-25% benchmark and even below the Drifting 07/29 send's 10.89% — weakest open performance logged so far across any segment. Bounce/unsub both stayed in healthy range despite the low open rate, and zero clicks continues the pattern seen on the 08/05 Active Engagers send. No prior Lapsed send to compare trend against yet. |
| 2026-08-05 | Active Engagers (~298) | 36.70% | 0.00% | 0.00% | 1 (~0.34%) | 1 (0.34%) | First WIW-format (value-first, no hard CTA) send to this segment, replacing the direct "book a call" ask. **Unsub dropped back to healthy range** — from 1.72% (07/22 direct-CTA send) to 0.34% — supporting the read that the hard ask, not the list, drove the prior spike. Opens even stronger than 07/22. **But zero clicks across 297 delivered** — strong opens aren't converting to any link engagement this cycle, worth watching next send. |
| 2026-07-29 | Drifting (~101 delivered) | 10.89% | 0.00% | 0.00% | 0 | 1 (0.99%) | First-ever "What I'm Watching" send to Drifting (value-first, no ask beyond a reply invite). **Open rate well below the ~20-25% benchmark**, and unsub (0.99%) is ~2x the healthy threshold despite no hard CTA — notable since this segment is explicitly meant to be low-pressure. No prior Drifting send to compare against yet; watch whether this holds or was a one-off (cold list waking back up). Delivered count (101) is well under the segment's stated 382 contacts — likely list-exclusion filtering, not a send error. |
| 2026-07-22 | Active Engagers (~340) | 30.09% | 0.86% | 2.86% | 2 (~0.6%) | 6 (1.72%) | **Final stats (2026-08-02 update).** General direct-CTA "book a call" send. Opens strong (well above norm), clicks soft, **unsub ~3.4× the healthy threshold** — consistent with a hard sales CTA. Keep direct asks to Active Engagers only; Drifting/Lapsed stay value-first. Watch whether the next Active Engagers send's unsub rate stays elevated or was a one-off. |

---

_Update as campaigns run and results come in — note what's working per segment._
