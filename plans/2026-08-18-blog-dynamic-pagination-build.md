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

**Phase 2 — The six topic archive pages.**
One Elementor "Archive" template, set to apply to the Topic taxonomy generally (not six separate templates) — it automatically detects which of the six topics it's showing and pulls the right posts, title, and description for each. Needs the six topic description blurbs (already written, sitting in the mockup files) entered into each topic's real WordPress record. Real pagination via WP-PageNavi. Since nothing real currently lives at these URLs, this can be previewed privately and then published directly once it looks right — lower stakes than the next phase.

**Phase 3 — The front page and all-posts page.**
Built as new draft pages first (not edited in place on the live URL), using the same reusable card design. Front page gets the Cover Story + Latest 4 layout (Cover Story is fully automatic — always whatever post is currently most recent, no manual pinning). All-posts page becomes a genuine chronological, paginated feed of all 563 posts, 8 per page.

**Phase 4 — Review, then go live.**
You review both new pages as drafts. Once approved, we make the swap at the real `/business-coaching-blog/` and `/business-coaching-blog/all/` URLs — this is the moment the old live blog page gets retired, so it's a deliberate step with your sign-off, not something that happens automatically mid-build.

**Phase 5 — Cleanup.**
Delete the six temporary "preview-*" pages on staging (they become redundant once the real archive pages are live) and double-check the Redirection plugin doesn't have any old rule that would intercept the new `/page/2/`-style URLs — the same kind of gotcha that bit a new page earlier in this project.

## Resolved

**Cover Story curation:** confirmed 2026-08-18 — Cover Story is fully automatic, always whatever post is currently most recent. No manual pinning.

## Not in scope here

Replicating this same build on staging (currently only has the old static previews) — optional, lower priority once production is the real, working version. Can revisit later if you want staging to match.
