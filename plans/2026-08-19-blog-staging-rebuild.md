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

**Real-content verification (2026-08-19).** Jackie asked to see the card rendered with real data. Since this staging theme's Site Editor doesn't expose a Templates screen (only Styles/Patterns — likely because "Synnovatia Child" doesn't declare full block-template support), a true one-template-fits-all taxonomy archive isn't buildable yet the way Phase 2 originally assumed; that gap needs revisiting before Phase 2 proper. As an interim step, added a live GenerateBlocks Query section (filtered to the Topic taxonomy = Strategy & Planning, 8 posts/page) to the existing `Preview: Strategy & Planning Archive` page, using the Blog Post Card pattern as the Loop Item — confirmed working with real posts, images, and correct per-topic filtering.

**Two more real bugs found and fixed while verifying on the live front end** (both invisible in the block editor canvas, only visible on the actual published page):
1. **Button text invisible** — text and background were both teal. Root cause: GenerateBlocks' external CSS file (Settings → CSS Print Method) doesn't regenerate automatically on save; fixed via Settings → "Regenerate CSS Files," which is now a required step after any pattern style change before checking the live front end.
2. **Post title rendered in the theme's default green underlined link style instead of navy Fraunces**, even after adding `!important` to the Headline block's own class. Root cause: GenerateBlocks' Headline block puts its class on the wrapping `<h2>`, not on the inner `<a>` it generates when a link is set — so an inherited (even `!important`) ancestor color always loses to the theme's unstyled-but-more-specific `a { color; text-decoration }` rule matched directly against that `<a>`. Also could not be diagnosed via `getComputedStyle()` from JS on a `:visited` link, since browsers deliberately report the unvisited color to scripts for privacy even when painting a different one — pixel/screenshot inspection was required instead. Fix: added explicit `& a { ... !important }` rules (plus `& a:visited` / `& a:hover`) in the Headline block's CSS Mode, rather than relying on the block's own top-level Typography styling. **Any future GenerateBlocks Headline/link-wrapping block in this build should get this same `& a {...}` treatment up front**, not just a color set on the block itself.

**Cleanup pass (2026-08-19, same day).** Once Jackie saw the live preview, she flagged that Strategy & Planning posts were listed twice on the page — once in the old static section (still present from the original paste-era build) and again in the new dynamic section below it. Deleted the old Custom HTML block entirely, leaving only the new dynamic section. That in turn removed the CSS that had been suppressing this page's real (broken) theme header/nav — without it, the page showed a raw `wp_list_pages()` fallback menu (every one of the site's ~40 pages, unstyled) instead of the real 4-item nav, plus the default GeneratePress sidebar ("Recent Posts" widget). Confirmed via a direct comparison that production-track pages (e.g. `/about/`) render the correct assigned nav fine — this fallback is specific to pages built via the old paste-and-suppress method, which is exactly why that method always paired pasted content with header/nav-hiding CSS in the first place. Fixed by: using the Page's native GeneratePress "Sidebar Layout: No Sidebars" control (cleaner than forcing `.widget-area.sidebar{display:none}` via CSS) plus a small Custom HTML block with `#masthead, #site-navigation { display: none !important; }` and a `.grid-container/.container/#page` full-width fix — the same minimal version of the established override recipe, since a decorative replacement masthead isn't needed once the page has no duplicate content to disguise.

**Two more real findings from Jackie's visual review of the cleaned-up preview:**
1. **Every card's topic tag/title/excerpt/button sat ~40px lower than its image**, breaking the top-alignment. Root cause: this theme's own stylesheet declares `.site-main .wp-block-group__inner-container { padding: 40px; }` as a blanket default for every native Gutenberg Group block — not something in the Blog Post Card pattern at all. GenerateBlocks blocks aren't affected (they don't use that class), but the pattern's content column uses a native Group block as its stacking wrapper. Fixed for this page via the same Custom HTML `<style>` block, adding `.wp-block-group__inner-container { padding-top: 0 !important; }`. **This will affect every future page built from this pattern** (front page, all-posts, and any topic archive) since it's a theme-wide rule — the durable fix, before wider rollout, is either to replace the content column's native Group block with a GenerateBlocks Container (which doesn't inherit this default and has reliable CSS Mode for one-off overrides) or to add this override once, site-wide, rather than per-page.
2. **The navy hero/masthead band was gone** after deleting the old static section — Jackie wanted a version of that navy branding context back. Re-added a simplified version (navy background, gold eyebrow "Notes from the Messy Middle / Strategy & Planning", white Fraunces `<h1>` topic title, light body description) as inline-styled HTML in the same Custom HTML block, rather than pasted mockup content. This is hand-written per-page for now — Phase 2's real Topic Archive template should build this as an actual dynamic block (Archive Title + Term Description) rather than hardcoded text, so it doesn't need re-typing per topic.

## Not yet started

Phase 2 proper (a true auto-detecting Topic Archive template) is blocked on finding the right templating mechanism now that the Site Editor's Templates screen isn't available here — needs investigation (block-template support flag, a different template hierarchy hook, or continuing with per-topic manual Query pages like this verification step) before proceeding. Front page + all-posts page (Phase 3), review/launch coordination (Phase 4), and cleanup (Phase 5) also not yet started.
