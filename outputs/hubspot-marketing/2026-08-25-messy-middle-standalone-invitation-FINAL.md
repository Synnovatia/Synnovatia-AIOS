# Standalone Mastermind Invitation — Messy Middle Women Segment (397)

> Build day audit completed 2026-08-25 (six days late — the `messymiddle-invitation-build-aug24` task fired 8/19 but never produced a build-day report). Copy is unchanged from the 2026-07-19 draft; every fact re-verified against the live site today, one day ahead of the confirmed **Wednesday, August 26** send.

---

**Send date:** Wednesday, August 26, 2026
**Applications close:** Friday, September 25, 2026
**Audience:** HubSpot's "Messy Middle-fit women" segment (397 contacts as of July — re-verify the live count in HubSpot before sending; this connector can't query list membership directly)

**Subject:** Applications close September 25 for the October cohort

**Preview text:** A few seats left in the next Mastermind for the Messy Middle.

---

Hi [First Name],

Quick, practical note this time. The next Mastermind for the Messy Middle cohort starts October 9, and applications close September 25.

Four women are already in — running B2B service businesses in the $250K-$500K range. We meet every other Friday, 8:00-9:15am Pacific, and work through what's actually on the table: growing without burning out, who to hire and who to let go, the client conversation you've been putting off, using AI without losing what makes the business yours. The group stays small on purpose, so there's still a handful of seats open before it fills.

$675 for the quarter. Six sessions. A room of peers who get it, not a course you work through alone.

If you've been thinking about applying, September 25 is the date to have it in by.

[Apply for Consideration] → https://www.synnovatia.com/messy-middle-mastermind/

Jackie

---

## Build-day audit (2026-08-25)

Ran the T-7→T-6 checklist from `context/mastermind-launch.md` today:

- **Member count:** still 4 women (Elise, Wilma, Amy, Sandra), 2 paying — unchanged since 2026-07-20, confirmed against `context/current-data.md` and the twice-monthly outreach status checks. "Four women are already in" still holds.
- **Apply path:** `https://www.synnovatia.com/messy-middle-mastermind/` loads (HTTP 200), the "Apply for Consideration" button reaches the live HubSpot embedded form.
- **Revenue band — now matches:** live page reads "$250K – $500K," fixed since the 2026-07-20 audit flagged $200–350K. No more mismatch with the email or the segment definition.
- **Cohort size — now matches:** live page reads "Only 8 seats available," fixed since the 6–10 mismatch flagged 2026-07-20.
- **Price — matches:** $675.00/quarter on the page.
- **Application timing — fixed 2026-08-25.** Added "For the October 9 cohort, applications close September 25." directly under the existing rolling-basis line on the live production page. Verified against the live public page, not just the editor's save state. Edited via Elementor's own `$e.run('document/elements/settings')` + `document/save/update` commands (JS console inside the WP admin Elementor editor) rather than simulated clicks — more reliable for a single-widget text change, worth reusing for future one-line copy fixes on Elementor pages.

All build-day items are now resolved. Nothing open before tomorrow's send.

## Notes carried over from the 2026-07-19 draft

- CTA uses the locked mastermind copy exactly: "Apply for Consideration."
- No em dashes in the body copy, per the AI-tell policy in `brand-voice.md`.
- Kept the "handful of seats open" framing (4 of 8 filled) rather than stating an exact number, consistent with the capacity/fill-goal distinction in `context/mastermind-launch.md`.
