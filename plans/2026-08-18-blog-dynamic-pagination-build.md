# Blog Dynamic Pagination Template Build

> Scope written 2026-08-18. Last of the three deferred blog-redesign items (production taxonomy and the logo swap are both already done). This turns the 8 static-preview blog pages into real, live, self-updating pages built with Elementor — the same visual tool the rest of the site already uses.

---

## The decisions already made

- **Pagination URLs:** WordPress's native `/page/2/` style (e.g. `/topic/strategy-planning/page/2/`), not the cleaner `/2/` style the mockups guessed at. Zero extra setup, no risk of colliding with the Redirection plugin's 925+ existing rules.
- **Build location:** Directly on production (`synnovatia.com`), not staging first. Elementor content stays private (draft, unpublished) until explicitly published, so this is safe to build without going live prematurely — and it skips redoing the same build twice, since Elementor templates don't copy between the staging and production WordPress installs automatically.
- **Front page design:** Keep the exact "Cover Story" (1 featured post) + "Latest" (4 posts) magazine layout from the mockup, not simplified to one plain list.

## What I found while scoping this

- Every real page on your site — including the current live blog — is actually built and rendered through **Elementor Pro's Theme Builder**, not WordPress's plain theme. That's why the old copy-paste page deploys needed so much CSS fighting: they were up against Elementor's markup, not the raw theme. Building the real thing *in* Elementor sidesteps all of that, and means you (or I) can visually tweak it afterward through the same editor used everywhere else on the site — no code.
- **WP-PageNavi**, the plugin that will handle real page-number pagination, is already installed and already working on your current live blog page. This isn't new, unproven tooling — it's a tool the site already depends on.
- The "Topic" taxonomy (the six topics, tagged across all 563 posts) is live and fully verified on production already — this build reads from that.
- **Important wrinkle:** your current live blog front page (`synnovatia.com/business-coaching-blog/`) is real, existing content visitors see today — it is *not* the same thing as the redesigned mockup that's only been deployed to staging so far. Building the new front page and all-posts page means creating new content that will eventually replace this live page, not editing it in place while it's still live. See the go-live step below — that's a deliberate, separate decision point, same as past "should we overwrite this real page" calls in this project.
- The six topic archive URLs (`/topic/strategy-planning/`, etc.) are lower-risk by comparison — nothing real lives there today, just WordPress's generic unstyled fallback view. Publishing the real design there doesn't displace any existing content.

## The build, in five phases

**Phase 1 — Build the reusable post-card design once. DONE (2026-08-18).**
Checked the actual deploy-ready files against this before building — the three listing surfaces aren't identical: the all-posts feed shows a topic tag, the six archives deliberately omit it (redundant on a page that's already filtered to one topic), and the front page's "Latest" section is a separate numbered-notes design with no thumbnail, tag, or read-more link at all.

Resolved with Jackie: build **one** reusable Elementor Loop Item template (thumbnail, title, excerpt, "Read the full story" link) with the topic tag as a conditional element — visible on the all-posts feed, hidden on the six archives. Used in two places (archives + all-posts), not three. The front page's "Latest" list stays its own distinct design, built separately in Phase 3, not part of this component.

Built and published as an Elementor Loop Item template named "Blog Post Card" (Theme Builder → Loop Items). Structure: Featured Image in a fixed-width left column; a right column stacking a Post Info element (configured for the Topic taxonomy, author/date/comments removed), Post Title, Post Excerpt, and a "Read the full story →" button-as-link. Confirmed correct in Elementor's own element tree before publishing.

**Two of three follow-up details closed out by Jackie directly (2026-08-18)**, after this session's browser automation couldn't operate Elementor's Select2 dropdowns (kept deselecting the widget instead of opening the list — a genuine automation limitation, not a data problem):
- Post Info's Taxonomy is now set to Topics — confirmed in the editor canvas, real topic terms rendering (e.g. "Growth & Scaling, Strategy & Planning" on the sample post).
- The "Read the full story →" button's Link field is now wired to the Post URL dynamic tag — confirmed in the editor panel.

**Still open:** No color/typography styling pass yet — the card currently renders in Elementor's plain defaults, not the site's navy/gold/teal + Fraunces/Barlow system from `context/style-guide.md`. Phase 2 (building the archive template around this card) is a natural point to do that styling pass, since it'll be visible in context there.

**Phase 2 — The six topic archive pages. DONE (2026-08-18).**
One Elementor "Archive" template, set to apply to the Topic taxonomy generally (not six separate templates) — it automatically detects which of the six topics it's showing and pulls the right posts, title, and description for each. Needs the six topic description blurbs (already written, sitting in the mockup files) entered into each topic's real WordPress record. Real pagination via WP-PageNavi. Since nothing real currently lives at these URLs, this can be previewed privately and then published directly once it looks right — lower stakes than the next phase.

Built and published as an Elementor Archive template named "Topic Archive" (Theme Builder → Archive). All six topic description blurbs entered into their real WordPress term records first (Posts → Topics → each term's Description field). Structure: Archive Title (auto-pulls the real topic name, e.g. "Topic: Strategy & Planning") + a description text block, then a Loop Grid widget pulling in the "Blog Post Card" template from Phase 1, one column, 8 items per page, Numbers + Previous/Next pagination set to Page Reload (so it produces real, crawlable `/page/2/`-style URLs per the decision above, not AJAX). Display Conditions set via the Theme Builder app to "Include: Topics" (the taxonomy generally, not six separate conditions) — confirmed this correctly overrides the site's existing generic "Search Page Design" archive template for `/topic/*/` URLs specifically, without touching how Categories/Search/other archives render.

**Real bug found and fixed during verification:** the Loop Grid's Query Source defaulted to plain "Posts," which shows the same latest-posts list on every archive page regardless of which topic it's supposed to be filtered to — confirmed by checking two different live topic URLs and seeing identical post lists. Fixed by changing Source to "Current Query," which pulls from WordPress's own archive query (the one that already knows which topic term the current page represents) instead of an independent, unfiltered query. Re-verified on `/topic/strategy-planning/` and `/topic/mindset-resilience/` live — genuinely different, correctly filtered posts on each, confirmed via real screenshots of both.

**Description Dynamic Tag fixed by Jackie (2026-08-18):** the same manual Select2 fix used for Phase 1's two items — clicked the block, clicked the Dynamic Tags icon, chose Archive Description. Verified live on `/topic/strategy-planning/` (real description: "Frameworks, planning rhythms, and the clear-eyed thinking that turns a reactive business into a deliberate one.") and `/topic/growth-scaling/` (real description: "What it takes to grow past the plateau: building the structure, capacity, and clarity to scale without breaking what works.") — both showing correct term-specific descriptions and genuinely different, correctly filtered post lists. That's 3 of 6 topic URLs now spot-checked live (strategy-planning, growth-scaling, mindset-resilience).

**Still open (not blocking, deferred to later polish):**
- No color/typography styling pass yet on either the card or the archive header/pagination — still Elementor's plain defaults, not the navy/gold/teal + Fraunces/Barlow system.
- Remaining 3 of 6 topic archive URLs not yet spot-checked live (`/topic/sales-marketing/`, `/topic/people-partnerships/`, `/topic/ownership-entrepreneurship/`), along with confirming `/page/2/` pagination actually works once a topic has more than 8 posts (all six do).
- The mockup's "Browse Other Topics" cross-navigation band and the per-topic search box weren't built in this pass — not blocking, but worth a decision on whether they're in scope for this template or a later polish pass.

**Phase 3 — The front page and all-posts page. DONE (both drafts), 2026-08-18.**
Built as new draft pages first (not edited in place on the live URL), using the same reusable card design. Front page gets the Cover Story + Latest 4 layout (Cover Story is fully automatic — always whatever post is currently most recent, no manual pinning). All-posts page becomes a genuine chronological, paginated feed of all 563 posts, 8 per page.

Two new draft pages created on production: **"Business Coaching Blog — New Design Draft"** (slug `business-coaching-blog-new-design-draft`, cloned from the live front page, nested under it) and **"All Posts — New Design Draft"** (slug `all-posts-new-design-draft`, cloned from the live "All" page) — both start as exact duplicates of the currently-live pages, safe to rebuild without touching production. Confirmed both use the "Elementor Full Width" page template, meaning the site's real theme header/footer wrap the content automatically — no need to rebuild the mockup's nav/footer HTML by hand, unlike the old static-paste deploy method.

**Front page — DONE (draft), 2026-08-18.** All five sections built, saved, and verified live on the draft URL:
- **Masthead:** an H1 ("Notes From the Messy Middle") and a tagline line, plain widgets, no styling pass yet.
- **Cover Story:** a new Elementor Loop Item template, **"Cover Story Card"** (Theme Builder → Loop Items, published) — Featured Image column + a stacked "Cover Story" kicker / dynamic Post Title / dynamic Post Excerpt / "Read the Cover Story" button (linked via the Post URL dynamic tag) column. Placed via a Loop Grid, template set to Cover Story Card, Columns/Items Per Page both 1, Pagination None. Query confirmed Source: Posts, Order By: Date, Order: DESC, Ignore Sticky Posts: Yes — fully automatic (always whatever post is currently most recent, no manual pinning).
- **The Latest:** a second new Loop Item template, **"Latest Note"** (H3 Post Title linked via Post URL + Post Excerpt, no image/tag/button per the Phase 1 surface-mismatch finding), published. Placed via a Loop Grid, 2 columns, 5 items per page (not 4 — see below), Order By Date DESC. **No Offset control exists in this Elementor Pro version's Loop Grid Query panel** — worked around it by pulling 5 items and hiding the first one via Custom CSS (`selector .e-loop-item:first-of-type { display: none !important; }` in the widget's Advanced → Custom CSS field) so it always excludes whichever post the Cover Story is currently showing, without ever needing a fixed post ID. Two of the four visible posts have no excerpt text in WordPress (a real per-post data gap, not a build issue) — their cards just show the title with no excerpt line beneath, which is correct behavior for the widget.
- **Browse by Topic:** a heading + a Text Editor widget with the six real `/topic/<slug>/` archive links (verified live — clicking through lands on the real Topic Archive page). Static content, no dynamic tags needed.
- **CTA:** heading ("Stuck somewhere in the Middle?") + subtext + a button linking to `/schedule-a-conversation/`.

**Real editing-quirk found and worked around this session:** this Elementor version's Text Editor "Code" (raw HTML) textarea does not respond to keyboard Delete/Backspace/Home/Cmd+Up/Cmd+Down at all when driven by browser automation — only mouse-based selection (click, click-drag, double-click, shift-click) and actual character-typing register. Fixing a stray leftover character requires selecting a small range via mouse (verify the exact selected substring first), then typing the corrected replacement text over it — never relying on a bare Delete/Backspace keystroke.

**All-posts page — DONE (draft), 2026-08-18.** All sections built, saved, and verified live on the draft URL:
- **Masthead:** same H1 + tagline as the front page.
- **Feed:** a Loop Grid using Phase 1's "Blog Post Card" template (topic tag visible, per the original Phase 1 decision that the tag shows on the all-posts feed but not the six archives), 1 column, 8 items per page, Source: Posts, Order By Date DESC — genuinely chronological across all 563 posts, no taxonomy filter. Pagination set to Numbers + Previous/Next, Load Type Page Reload (same real-URL approach as the topic archives).
- **Browse by Topic** and **CTA:** identical content to the front page's matching sections (same six topic links, same CTA copy and button).

**Known limitation, not a bug:** clicking a pagination number while still viewing the page as an unpublished draft produces a malformed preview URL (`?page_id=11672/2/` instead of a real path), because WordPress serves drafts through query-string preview URLs, not pretty permalinks — the Loop Grid's own pagination settings (Page Reload, Numbers + Previous/Next) are correct and will generate real, crawlable `/page/2/`-style URLs automatically once this page is actually published at Phase 4. Confirmed by inspecting the resulting URL directly rather than assuming from the visual (mis-)behavior.

Phase 3 (front page + all-posts feed) is now fully built on both draft pages. What's left before Phase 4 (the reviewed go-live swap): a final visual review by Jackie of both drafts, and the color/typography styling pass across all of Phase 1–3's plain-defaults elements (still deferred, not blocking).

**New automation quirks found this session (beyond Phase 1/2's Select2 and stuck-click issues):**
- Elementor's widget drag-and-drop only registers when the left panel is actively showing the **Elements/Widgets browser** — if a widget or section is selected (panel shows its settings instead), dragging silently fails. Click blank canvas first to force the panel back to Elements before every drag.
- Dropping a new widget into a column that already has content only registers when dropped **directly on top of the existing widget's rendered text/image**, not in the empty space below it within the same column. Dropping into a truly empty (zero-widget) column works anywhere in it.
- Widget order within a column is easiest to fix via the **Structure panel's drag-to-reorder**, which is reliable (unlike canvas drag for repositioning).
- The Elementor "Publish" button intermittently doesn't register synthetic clicks at all — same issue as Phase 2, no reliable automated workaround found this time (the classic-editor-Publish trick that worked in Phase 2 wasn't reachable either, since "Exit to WordPress" from the editor's hamburger menu also hit stuck clicks). Jackie clicked Publish herself to get "Cover Story Card" live.
- The Browser pane's `navigate()` tool unconditionally drops the WordPress login session on every call, even with "Remember Me" checked — required multiple re-logins this session. In-page link/menu clicks preserve the session fine. Going forward: navigate to WP admin URLs only via clicking real links/menus in the page, never the navigate tool.

**Phase 4 — Review, then go live. Styling pass DONE (2026-08-18); go-live swap still pending.**
You review both new pages as drafts. Once approved, we make the swap at the real `/business-coaching-blog/` and `/business-coaching-blog/all/` URLs — this is the moment the old live blog page gets retired, so it's a deliberate step with your sign-off, not something that happens automatically mid-build.

Jackie reviewed both drafts (screenshots) and chose to do the deferred styling pass before going live rather than after. All three Loop Item templates (Blog Post Card, Cover Story Card, Latest Note) and the page-level Masthead/"Browse by Topic" elements on both drafts are now styled to the navy/gold/teal + Fraunces/Barlow system — see `HISTORY.md`'s 2026-08-18 (continued, part 6) entry for the full detail, including a real Post Excerpt bug found and fixed (some cards showed no excerpt text — the widget's "Apply to post content" fallback was off; now on, with an Excerpt Length set per template). Blog Post Card is shared with the six live Topic Archive pages, so that part of the styling pass is already live there (verified on `/topic/strategy-planning/`, `/topic/sales-marketing/`, `/topic/growth-scaling/`) — done with Jackie's explicit sign-off since it was always the natural point to do it. Both actual draft Pages were saved via Elementor's "Save Draft," never "Publish," to keep them off the live site.

**Still open:** Jackie's final visual review of both restyled drafts, then the actual go-live swap.

**Phase 5 — Cleanup.**
Delete the six temporary "preview-*" pages on staging (they become redundant once the real archive pages are live) and double-check the Redirection plugin doesn't have any old rule that would intercept the new `/page/2/`-style URLs — the same kind of gotcha that bit a new page earlier in this project.

## Resolved

**Cover Story curation:** confirmed 2026-08-18 — Cover Story is fully automatic, always whatever post is currently most recent. No manual pinning.

## Not in scope here

Replicating this same build on staging (currently only has the old static previews) — optional, lower priority once production is the real, working version. Can revisit later if you want staging to match.
