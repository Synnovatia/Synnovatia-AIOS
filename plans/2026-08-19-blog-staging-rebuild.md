# Blog Staging Rebuild (Native GenerateBlocks)

> Scoped 2026-08-19. Follow-on to `plans/2026-08-18-blog-dynamic-pagination-build.md`, which built the same blog redesign on **production** using Elementor Pro's Theme Builder. Jackie decided the blog should launch together with the rest of the site redesign when **staging** goes live, not separately on production — so this build needs to happen a second time, natively, on staging.

---

## Why this isn't a copy-paste job

Production and staging turned out to be built on two different systems:

| | Production (synnovatia.com) | Staging (synnovatiacom.stage.site) |
|---|---|---|
| Theme | Twenty Nineteen Child | Synnovatia Child (GeneratePress-based, block-theme/Site-Editor capable) |
| Page builder | Elementor Pro (Theme Builder, Loop Grid, Loop Items, Archive templates) | GenerateBlocks + GenerateBlocks Pro (native Gutenberg blocks, incl. a dynamic "Query" block) |
| Elementor installed? | Active, in full use | Installed but **inactive** — Elementor Pro can't even activate ("unmet requirements") while core Elementor is off |

Confirmed by checking the live `/about/` page on staging with Elementor deactivated — it renders fully styled, meaning the real redesigned pages (homepage, About, Work With Me, etc.) were built in GenerateBlocks, not Elementor. Jackie chose to rebuild the blog natively in GenerateBlocks to match, rather than reactivating Elementor just for this and importing the production templates.

## What's already in place on staging

- **Topic taxonomy**: all six terms exist with real post counts (Strategy & Planning, Growth & Scaling, Sales & Marketing, People & Partnerships, Mindset & Resilience, Ownership & Entrepreneurship). Two gaps found:
  - Term **descriptions are empty** on all six — these were written and entered on production's term records during Phase 2 of the production build, never carried to staging.
  - Per-topic **post counts differ noticeably** from production's (e.g. Strategy & Planning shows 174 here vs. 123 on production) — worth a real check before assuming the tagging is in the same state as the 2026-08-16 staging taxonomy build; don't assume parity.
- **WP-PageNavi**: active here too, same as production — can provide the same numbered `/page/2/`-style pagination.
- **GenerateBlocks' "Query" block**: confirmed present in the block inserter — this is the native equivalent of Elementor's Loop Grid, the core primitive needed for dynamic post grids.
- **Site Editor available** (Appearance → Design): "Synnovatia Child" supports WordPress's native block-template system, which is the likely mechanism for a taxonomy archive template (WordPress's native `taxonomy-topic.php`-equivalent block template), rather than GeneratePress Premium's older "Elements" CPT hook system (no `gp_elements` menu found in admin).
- **Leftover from the original static-paste era**: six "Preview: [Topic] Archive" pages and a "Blog Front Page (Preview)" page, built 2026-08-17 via the old Custom-HTML-paste method (before Elementor Theme Builder was discovered on production). These predate this whole approach — decide whether to reference them for content/copy or just delete them (original Phase 5 cleanup assumed deleting once the real build shipped; that logic still applies, just pointed at staging now).

## Proposed phases (mirrors the production build, adapted to GenerateBlocks)

**Phase 1 — Reusable post-card pattern.**
Build the equivalent of "Blog Post Card" as a GenerateBlocks synced pattern (thumbnail, topic tag, title, excerpt, "Read the full story" link), styled to navy/gold/teal + Fraunces/Barlow from the start — no need to repeat production's "build plain, style later" detour now that the design is already proven.

**Phase 2 — Topic Archive template.**
Build a taxonomy archive block template (via the Site Editor) that auto-detects the current Topic term and pulls its title/description/posts, using a Query block with Phase 1's card pattern, real WP-PageNavi pagination. Re-enter the six topic description blurbs into staging's term records first (they're empty there now).

**Phase 3 — Front page + all-posts page.**
New pages (not in-place edits) for the Cover Story + Latest-4 front page and the full chronological all-posts feed, using GenerateBlocks Query blocks and the same card pattern.

**Phase 4 — Review, then coordinate go-live with the rest of the staging site.**
No separate go-live swap this time — ships as part of whatever launch sequencing Jackie decides for the full staging site.

**Phase 5 — Cleanup.**
Delete the six old "Preview: * Archive" pages and "Blog Front Page (Preview)" once the real templates are live (or earlier, if they're confirmed not needed for reference).

## Progress

**Phase 1 DONE (2026-08-19).** Built and saved the "Blog Post Card" synced pattern (`wp_block` post ID 11896) on staging via GenerateBlocks in the Site Editor. Structure: a Container (Display: Flex, Row, 24px column gap) holding a fixed 200×150px Image (Featured Image dynamic tag) on the left, and a native Gutenberg Group stacking four elements on the right — topic tag (Term List dynamic tag, styled Barlow Condensed/gold `#B29200`/uppercase/12px/1.5px letter-spacing), title (Headline block, Post Title dynamic tag linked to the post, styled Fraunces/navy `#0D1F4E`/24px/bold, gold on hover), excerpt (Post Excerpt dynamic tag at 20 words, styled Barlow/body text `#444441`/16px), and a button ("Read the full story →" linked via Post Permalink dynamic tag, styled teal `#0F6E56` background/white uppercase Barlow Condensed text, navy `#0D1F4E` background on hover). Fully matches production's Elementor "Blog Post Card" spec.

**Real bug found and fixed mid-build:** GenerateBlocks' per-block Font Family dropdown only lists 7 web-safe system fonts (Default/Inherit/System Font/Arial/Helvetica/Times New Roman/Georgia) — no Google Fonts registered. Fix: each Typography panel has a "More options" kebab → "Enter Custom Value," which accepts a raw CSS font-family string (e.g. `'Fraunces', Georgia, serif`) that renders correctly, confirmed by the fonts actually appearing serif/condensed in the Site Editor canvas itself. No separate Google Fonts library/enqueue step was needed — the fonts are already loading site-wide.

**Real bug found and fixed mid-build (layout regression):** at some point the flex-row Container ended up empty while the Image and content Group sat outside it as plain top-level siblings, which stacked them vertically instead of side-by-side. GenerateBlocks' empty-container appenders and direct clipboard-paste-onto-a-selected-block both proved unreliable (paste always *replaces* the selected block rather than appending) — the reliable fix was: select the non-empty sibling already inside the target container (Image), use the top-toolbar Block Inserter to insert a *fresh empty* Group as a new sibling in the same parent, then select that fresh empty Group and paste the clipboard content — paste replaces the empty placeholder in place, keeping the correct position. This pattern (insert-empty-sibling-via-toolbar, then paste-to-replace) is the reliable way to move a fully-built block into a specific container slot in this editor going forward.

## Not yet started

Phase 2 (Topic Archive template) through Phase 5 (cleanup) — not yet started.
