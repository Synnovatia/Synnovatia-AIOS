# Nav change: "Work With Me" → "Work Together" + new "One-to-One Coaching" dropdown item

> Written 2026-09-16. Scoped in a session with no live browser access; execution needs Cowork (has the browser tool that's done every other live nav edit on this site). This doc is the handoff brief.
>
> **Status: Done (2026-09-16).** Rolled out live sitewide — confirmed by Jackie. Spot-checked live on the About page: nav label reads "Work Together," dropdown is One-to-One Coaching / Mastermind for the Messy Middle / Seven Figure Forum (desktop and mobile), One-to-One Coaching linking to `/work-with-me/`. Open question below resolved: One-to-One Coaching placed first, as assumed.

---

## The change

1. Rename the top-level nav label **"Work With Me" → "Work Together"** — desktop nav, mobile hamburger panel, on every page.
2. Add a new dropdown item, **"One-to-One Coaching"**, linking to `/work-with-me/` (the existing Work With Me page becomes the primary/landing page for this dropdown item — it doesn't move or get renamed itself, only the nav *label* pointing at the dropdown changes).
3. Per CLAUDE.md's existing nav documentation, the dropdown under this label currently holds **Mastermind for the Messy Middle** and **Seven Figure Forum** (Strategic Coaching / Solutions on the Fly were already removed 2026-08-26 — they're sections *within* the Work With Me page, not separate destinations). New dropdown order should be:
   - **One-to-One Coaching** → `/work-with-me/` (new, add first)
   - Mastermind for the Messy Middle → (existing link, keep as-is)
   - Seven Figure Forum → (existing link, keep as-is)

**Before touching anything: pull the actual live markup for one page first** (About or Home) rather than assuming the structure above is still accurate — CLAUDE.md's documentation could be stale if anything changed since 2026-08-26. Confirm the current dropdown's exact HTML/CSS (class names, link structure) before editing.

---

## Pages to update (every page carrying the shared Custom HTML nav)

- Homepage
- About (`/about/`)
- Work With Me (`/work-with-me/`) — the nav lives on this page too, same as every other page
- The Messy Middle (`/the-messy-middle/`)
- Mastermind for the Messy Middle (`/mastermind-for-the-messy-middle/`)
- Seven Figure Forum (`/seven-figure-forum/`)
- Mastermind Apply (`/mastermind-for-the-messy-middle-apply/`)
- Seven Figure Forum Apply (`/seven-figure-forum-apply/`)
- Schedule a Conversation (`/schedule-a-conversation/`)

Each of these has its own duplicated copy of both the desktop nav dropdown markup AND the mobile hamburger panel's link list (built from scratch per page, not a CSS collapse of the desktop nav) — both need the label rename and the new link on every page.

## Blog — separate nav mechanism, handle after the pages above

- **Individual posts (all ~563):** nav is generated via a PHP hook in the Synnovatia Child theme (`functions.php`), not a per-page Custom HTML block. Per established practice on this site, Claude does not edit live theme PHP blind — draft the exact snippet change, then have Jackie paste it into `functions.php` herself, same as every prior PHP-touching fix (e.g. the `wp_nav_menu_args` filter, the stale-logo-URL fixes still outstanding from the 2026-09-11 mobile audit).
- **Six topic archive pages:** nav styling/overrides come from Customizer Additional CSS scoped to `body.tax-topic` — check whether the label text itself is hardcoded there or pulled from the same menu the rest of the site uses (Appearance → Menus' "Primary Menu," which per the 2026-08-26 nav-location bug required a `wp_nav_menu_args` filter workaround to render reliably at all). If it pulls from that menu, editing the menu item there may be the actual fix for the archives, not separate CSS.
- **Blog front page + All Posts page:** built with GenerateBlocks Query blocks, own nav copy — same rename + new link needed here too.

---

## Suggested execution order (matches the site's established, already-proven method)

1. Confirm the real current nav markup on one page live (don't assume — the CLAUDE.md summary could be stale).
2. Make the change on **one page first** (About is a good test case — smaller/simpler page), verify live: correct label text, new dropdown item present and pointing at `/work-with-me/`, existing two dropdown items unchanged, desktop AND mobile hamburger both updated, no `!important`/color-override regressions (this theme's CSS has repeatedly needed explicit `!important` on pasted styles — see CLAUDE.md's GeneratePress override notes).
3. Once confirmed clean on one page, roll the same change out to the remaining 8 pages.
4. Handle the blog's three separate mechanisms last: draft the PHP snippet for individual posts (hand to Jackie to paste), check/update the topic archives' menu-vs-CSS source, update the front/All Posts page's GenerateBlocks nav copy.
5. Full verification pass: screenshot scroll-through on desktop + mobile width for at least 2-3 of the 9 pages, click-test the new "One-to-One Coaching" link actually lands on `/work-with-me/`, and spot-check 2-3 individual blog posts + the topic archives once those are updated.
6. Update CLAUDE.md's nav description and this plan's status, then commit/push (or prompt Jackie through GitHub Desktop's commit flow, per the local-Cowork save mechanic).

---

## Open question to confirm with Jackie before/during execution

- Should "One-to-One Coaching" be the **first** item in the dropdown (above the two masterminds), or does order not matter? (Assumed first above, since it's the primary 1:1 offer being surfaced — confirm rather than assume if it matters.)
