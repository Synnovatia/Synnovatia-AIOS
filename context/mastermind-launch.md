# Mastermind Cohort Launch Checklist

> Reusable process for launching or refilling a mastermind cohort — **Mastermind for the Messy Middle** or **Seven Figure Forum**.
> Built 2026-07-20 from the Oct 9 Messy Middle cohort launch, which surfaced most of these steps the hard way.
> Related: `context/hubspot-marketing.md` (segments/cadence), `context/brand-voice.md` (voice + AI-tell policy), `plans/2026-07-13-messy-middle-growth.md`.

---

## Why this exists

The Oct 2026 Messy Middle launch turned up three problems that were invisible until someone went looking: the landing page contradicted the email in three places, the application window left only one week for intake, and the intake week landed inside a school term. None of those are obvious from the email draft alone. This checklist front-loads them.

---

## The timeline

Everything is anchored to **T = the cohort's first session**. Work backward.

| When | What | Who |
|---|---|---|
| **T‑8 weeks** | Lock the dates. Audit the landing page. Verify the apply path. | Jackie + Claude |
| **T‑7 weeks** | Build the invitation email in HubSpot | Jackie (Claude surfaces copy) |
| **T‑6 weeks** | **Invitation sends** | Jackie |
| **T‑4 weeks** | Nudge drafted, using real application numbers | Claude |
| **T‑3 weeks** | **Nudge sends** | Jackie |
| **T‑2 weeks** | **Applications close** | — |
| **T‑2 → T‑0** | Intake: review, conversations, decisions, onboarding | Jackie |
| **T** | Cohort starts | Jackie |

**The one-week rule:** every drafting or build step sits at least a full week ahead of its send date. This is a standing preference, not a nicety — Jackie carries ~20 hrs/week of coursework and ~3 hrs/day on the business. Stretch it further during a term.

---

## T‑8 weeks — Lock dates and audit the page

**Dates**
- [ ] Cohort start date, and all session dates for the quarter (every other Friday, 8:00–9:15am Pacific)
- [ ] Application close date — **at least 2 weeks before the first session.** One week is not enough. Intake is the heaviest, least visible part of the launch: reading applications, having conversations, making decisions, onboarding. Rolling review (see the page audit below) flattens this load but doesn't remove it.
- [ ] Add all session dates to Google Calendar
- [ ] **Check against her school term.** Terms run roughly 8 weeks; get the exact dates. Flag any session that collides with a term start, term end, or finals. Flag it if the intake window falls mid-term — that's a real load on top of coursework, not a scheduling detail.

**Landing page audit** — do this every cycle, not just the first
- [ ] Fetch the live page and compare it against the email copy, line by line
- [ ] **Revenue band** matches the segment being emailed (Messy Middle: $250K–$500K, per `context/strategy.md`)
- [ ] **Cohort size** on the page matches the emails (Messy Middle: **8 seats**, stated flat rather than as a range — decided 2026-07-20)
- [ ] **Seats-open math is consistent.** If the page states capacity and the email says how many members are already in, a reader subtracts. Make sure the difference is the number of seats you actually want to sell, and that both move together if the member count changes before send day.
- [ ] **Count paying members, not just headcount.** As of 2026-07-20 the Messy Middle had 4 members but only 2 paying, so total headcount overstated revenue by half. Advertised capacity and the fill goal are different numbers: capacity is 6–8, the goal is a full 8 precisely because unpaid seats don't pay. Track both.
- [ ] **Two Messy Middle seats are permanently non-paying** — a family member and a close friend, by Jackie's choice (2026-07-20). They are a fixed cost of running the room, not a conversion target. Never draft an upgrade or payment ask to them, and never count them toward paying-member goals.
- [ ] **Price** matches ($675/quarter as of 2026-07)
- [ ] **Meeting schedule** matches the actual calendar
- [ ] **The close date appears on the page**, not only in the email. Jackie reviews applications on a **rolling basis** by preference (confirmed 2026-07-20) — easier than batching, and it spreads intake across the whole window instead of stacking it before kickoff. Rolling review and a close date are compatible: one answers "by when do I apply," the other "how fast will I hear back." But a page that says only "rolling basis" reads as *no rush* and undoes the email's urgency, so add the cohort's actual close date near the apply button each cycle.

**Apply path**
- [ ] Verify the apply URL loads (current: `https://www.synnovatia.com/messy-middle-mastermind/` — WordPress + Elementor, page ID 9145)
- [ ] Confirm the "Apply for Consideration" button actually reaches a working form
- [ ] Re-verify after any website redesign — the "Different Is Better Than Better" rebuild will change these URLs

---

## T‑7 → T‑6 — Invitation email

- [ ] Claude drafts; Jackie builds and sends in HubSpot. Claude never sends.
- [ ] Confirm the current member count in the copy against HubSpot and `context/current-data.md`. "Four women are already in" goes stale fast, and a wrong number is worse than no number.
- [ ] Audience: the relevant HubSpot segment (Messy Middle women segment was 397 contacts as of 2026-07)
- [ ] CTA copy is exactly **"Apply for Consideration"**
- [ ] CTA and preview text in sentence case, conversational — never Title Case ad-copy
- [ ] Mandatory AI-cadence scrub before Jackie sees it: no negation pivots, stacked fragments, anaphoric openers, "Here's the thing," formulaic triads, em dashes in body copy, arrow glyphs
- [ ] Don't contradict what a recent email already told the same list (capacity numbers especially)

---

## T‑4 → T‑3 — The nudge

A single send on a multi-week window underperforms. The second touch is what converts — the first email gets filed under "later."

- [ ] Get real numbers first: applications received, seats genuinely left
- [ ] Much shorter than the invitation. Assume they've seen it.
- [ ] **Only claim scarcity if it's true.** If the cohort is nearly empty, say so honestly and change the angle — a warmer personal ask, or move the deadline. Never manufacture urgency.
- [ ] Same voice rules and cadence scrub as above
- [ ] Re-verify the numbers on send day; a week is long enough for them to go stale

---

## T‑2 → T — Intake

- [ ] Review applications
- [ ] Intake conversations with candidates
- [ ] Accept/decline decisions — the group is hand-selected, so declining is a real and legitimate outcome
- [ ] Onboard accepted members: welcome, payment, calendar invites, discussion group access
- [ ] Update `context/current-data.md` and the dashboard with the new member count
- [ ] Set up the per-session hot-topics and agenda reminders for the quarter (see the existing `messymiddle-*` and `7fig-*` scheduled tasks as the pattern)

---

## After launch

- [ ] Log what the launch actually produced: emails sent, applications received, conversion, final cohort size
- [ ] Note anything that broke or ran late, so the next cycle starts from it
- [ ] If the cohort didn't fill, capture why before the memory fades — that's the input for the next launch, and for the second-cohort decision

---

## Scheduled tasks from the Oct 2026 cycle

Use these as the template when setting up the next launch:

| Task | Fires | Purpose |
|---|---|---|
| `messymiddle-invitation-build-aug24` | Aug 19 | Build day — page audit, apply link, member count |
| `messymiddle-nudge-draft-sep9` | Sep 9 | Draft the nudge from real numbers |
| `messymiddle-nudge-send-sep16` | Sep 16 | Send day — re-verify numbers first |
| `school-term-syllabus-checkin` | Aug 25 | Catches the Oct 23 term-end/session collision |
