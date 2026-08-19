# CLAUDE.md

This file provides guidance to Claude when working with this workspace in Claude Cowork (or Claude Code).

---

## What This Is

This is **Synnovatia's EVOLV-OS workspace** — the AI Operating System for Jackie's solo strategic consulting practice, Synnovatia. Built on Evolv AI's EVOLV-OS Starter Kit, it's a layer of AI automation wrapped around the business, powered by plug-and-play modules installed one at a time.

**This file (CLAUDE.md) is the foundation.** It is automatically loaded at the start of every session. Keep it current — it is the single source of truth for how Claude should understand and operate within this workspace.

> Part of the **Evolv AI EVOLV-OS Program** — helping businesses recover time and increase profitability through AI automation. [evolv.one](https://evolv.one)

---

## The Claude-User Relationship

Claude operates as an **agent assistant** with access to the workspace folders, context files, and outputs. The relationship is:

- **User**: Jackie, founder and sole practitioner of Synnovatia, a strategic consulting practice for bootstrapped B2B service businesses. Semi-retired, also a cultural anthropology student (~20 hrs/week). Defines goals, provides context, and directs work through natural conversation.
- **Claude**: Reads context, understands Jackie's objectives (professional and personal), executes tasks, produces outputs, and maintains workspace consistency

Claude should always orient itself at session start, then act with full awareness of who the user is, what they're trying to achieve, and how this workspace supports that.

---

## EVOLV-OS Mission

You are helping a business owner build an **AI Operating System (EVOLV-OS)** — an autonomous intelligence layer wrapped around their entire business. Everything in this workspace serves that goal.

### The Problem: The Operator Trap
Most business owners are stuck working IN their business — firefighting, admin, managing people, checking dashboards, sitting in meetings just to stay informed. 80% of bandwidth goes to "must-dos." Nothing left for growth, strategy, or the life they actually wanted. The old model says hire more people, buy more tools, work more hours. EVOLV-OS says the answer is less — less manual work, less people needed, less time in operations. More bandwidth for the work that matters.

### The Solution: Five Layers
The EVOLV-OS gives it back — one layer at a time:
1. **Context** — Your AI understands the business (strategy, team, processes, history)
2. **Data** — Your AI sees the numbers in real-time (collectors pull from your actual data sources daily)
3. **Intelligence** — Your AI watches everything (meetings, messages, signals) and synthesizes into a daily brief
4. **Automate** — Audit every task, score each one, automate them away one by one. Each task automated = bandwidth recovered.
5. **Build** — Freed bandwidth applied to growth, new initiatives, or life. Work ON the business, not IN it.

### Five Principles
1. **Just Ask** — If you can describe it in plain English, Claude can build it. Don't self-censor. Ask for the impossible.
2. **Talk, Don't Type** — Voice-first. Hold FN, speak for 60 seconds, let Claude format it. 3x faster than typing.
3. **Layers, Not Leaps** — One layer at a time. Each independently valuable. Through gradual exposure, you become technical without even trying.
4. **Build for Scale & Security** — Human-in-the-loop by default. Your data stays local. Plan before you build.
5. **Borrow Before You Build** — 80% modules, 20% custom. Check the library before building from scratch.

### Three KPIs
These are how you know your EVOLV-OS is working:
- **Away-From-Desk Autonomy** — Hours per day you can step away and nothing falls apart. Target: business runs while you sleep.
- **Task Automation %** — Percentage of recurring tasks automated. Use the Task Audit (`context/task-audit.md`) as your scoreboard.
- **Revenue Per Employee** — Total revenue ÷ team members. Not bigger companies — leaner, faster, more profitable ones.

### How You Should Help
- Be patient. Assume the user is non-technical.
- Explain what you're doing in plain English BEFORE doing it.
- Celebrate wins — every module installed, every task automated is real progress toward freedom.
- When suggesting solutions, check existing modules first (Borrow Before You Build).
- Keep the three KPIs in mind — every automation should move at least one KPI.
- Never dump error logs or technical jargon. Find the problem, explain it simply, fix it.
- **Never ask the user to open a terminal.** Everything in this workspace is designed to work through natural conversation in Cowork.

---

## Context Summary

**Business:** Synnovatia — solo strategic consulting practice (25+ yrs experience) serving bootstrapped B2B service businesses, $250K–$4M revenue, via 1:1 consulting, monthly retainers, and two mastermind groups (Mastermind for the Messy Middle, Seven Figure Forum)
**Role:** Jackie — founder and sole practitioner, semi-retired (~3 hrs/day on the business), also a cultural anthropology student (~20 hrs/week)
**Current focus:** Growing to 5 new monthly clients within 3 months; growing both masterminds; rolling out the new brand voice and website redesign — positioning name "Strategic Perspective You Feel From the First Conversation," built from the "Different Is Better Than Better" client research — to support a 40% rate increase within 6 months
**Key metric to watch:** Annual income — currently ~$17K YTD, ~$35K projected without changes, targeting ~$100K/yr with the growth plan

---

## Workspace Structure

```
.
├── CLAUDE.md                # This file — core context, always loaded
├── GETTING-STARTED.md       # How to set up and use this workspace in Cowork
├── .env                     # API keys and credentials (gitignored, never commit)
├── .env.example             # API key template (safe to commit)
├── .gitignore               # Protects secrets from git
├── HISTORY.md               # Chronological log of everything built
├── context/                 # Background context about the user and business
│   ├── business-info.md     # What Synnovatia does
│   ├── personal-info.md     # Who Jackie is, her role
│   ├── strategy.md          # Current priorities and goals
│   ├── current-data.md      # Key metrics and current state (manual snapshot)
│   ├── brand-voice.md       # Positioning ("Strategic Perspective You Feel From the First Conversation") & voice rules, from the "Different Is Better Than Better" client research
│   ├── style-guide.md       # Visual identity — colors, typography, type scale (2026 Edition)
│   ├── linkedin-marketing.md    # LinkedIn content/outreach strategy
│   ├── hubspot-marketing.md     # HubSpot segment-based email marketing strategy
│   ├── business-intel-digest.md # One-time seed copy of the 2026-07-27 research pull; superseded by the "What I'm Watching" cloud routine below
│   ├── client-onboarding.md     # New client welcome/agreement/profile/scheduling tracking
│   ├── meeting-prep.md          # Pre-meeting objective ask + post-meeting recap for existing/ongoing clients
│   ├── general-business.md  # Shared company snapshot — give to team members
│   ├── team-member.md       # Template for team members (sector + role context)
│   ├── group/key-metrics.md # Auto-generated live metrics (Stripe, HubSpot) — read each session
│   └── import/              # Drop documents here for Claude to analyze
├── data/                    # DataOS + IntelOS — local database, metrics, meeting archive
│   ├── data.db                    # Daily snapshots from connected sources
│   ├── key-metrics.md             # Manual baseline + goals-progress tracking
│   ├── collect.log                # Daily collection job output
│   ├── meeting-summaries/         # Manual/fallback meeting notes (pre-Fathom or non-Fathom)
│   ├── onboarding/tracking.csv    # Client onboarding checklist state (source of truth, not HubSpot properties)
│   └── meeting-prep/tracking.csv # Pre-meeting objective-ask + post-meeting recap state for existing clients
├── scripts/                 # DataOS collectors (Stripe live; HubSpot via MCP; GA manual)
│   └── content_pipeline/    # Content Pipeline module scripts (db.py, writer.py, context_aggregator.py, generate_pipeline.py) — namespaced in its own subfolder so it doesn't collide with DataOS's scripts/db.py
├── content/                 # Content Pipeline — LinkedIn + blog idea tracking (capture → develop → schedule)
│   ├── strategy.md          # Platform/cadence, pillars, competitive positioning, Search Console keyword targets
│   ├── brand-and-audience.md # Brand positioning + 3 audience segments
│   ├── offers-and-funnels.md # Offers, funnels, CTA bank, audience→offer alignment
│   ├── pipeline.md          # Auto-generated dashboard view of all content ideas by stage
│   └── concepts/            # Full developed concept docs, one per idea, written by /develop
├── config/                  # launchd job for daily 6am data collection
├── docs/                    # System documentation
│   ├── _index.md            # Documentation routing index
│   └── _templates/          # Templates for creating new docs
├── .claude/commands/        # Slash commands — capture.md, develop.md, schedule.md (Content Pipeline)
├── .claude/skills/writing-style/ # Anti-AI-slop writing enforcement, auto-runs on all prose (installed 2026-08-01)
├── .claude/skills/academic/ # Academic paper search via OpenAlex/Unpaywall, free, no key (installed 2026-08-01)
├── .claude/skills/firecrawl/ # Web scrape/search/crawl CLI, needs FIRECRAWL_API_KEY in .env (installed 2026-08-01)
├── module-installs/         # EVOLV-OS modules — install by telling Claude
│   ├── context-os/          # Context layer (install first)
│   ├── infra-os/            # Version control + documentation
│   ├── data-os/             # Business data pipeline
│   ├── intel-os/            # Meeting + Slack intelligence
│   ├── content-pipeline-v1/ # Content intelligence system (installed 2026-07-27)
│   ├── writing-style/       # AAA Accelerator module — banned-word list + 12 rules + self-check (installed 2026-08-01)
│   ├── academic/            # AAA Accelerator module — OpenAlex/Unpaywall paper search (installed 2026-08-01)
│   ├── firecrawl/           # AAA Accelerator module — web scraping/search CLI (installed 2026-08-01)
│   └── flow-mode/           # Permission allowlist (Standard level) — fewer prompts for safe/routine commands, destructive ones still gated (installed 2026-08-03)
├── client-reengagement/     # 6-month client check-in cadence (176-client roster, migrated 2026-07-11)
│   ├── README.md            # Full weekly workflow
│   ├── data/                 # roster.csv, due_now.csv, outreach_log.csv, meeting_notes.csv
│   └── scripts/               # check_reengagement.py, log_outreach.py, list_opportunities.py, etc.
├── personal/                # Non-business reference docs (workout plans, etc.)
│   └── workout-plan.md      # Strength training program (Fortify-compatible)
├── plans/                   # Implementation plans
├── outputs/                 # Work products and deliverables
│   ├── dashboard/            # dashboard.html = canonical live file (daily auto-refresh); mockup kept for history
│   ├── morning-brief/        # brief.html = canonical live file for the standalone Morning Brief artifact (weekday auto-refresh, ~7:15am, edited in place — not regenerated)
│   ├── positioning/          # Positioning brief (statement + full rationale/proof points) — internal strategy doc, not customer-facing
│   ├── research/             # One-off research briefs (dated filenames) — e.g. 2026-08-07-cultural-anthropology-strategic-work-brief.md, applying cultural anthropology theory to client work, brand methodology, and content ideas
│   ├── strength-log/         # Strength Training Log tool source (published as a claude.ai artifact)
│   └── website-redesign/     # Website redesign (positioning: "Strategic Perspective You Feel From the First Conversation") — homepage/About/Work With Me/Messy Middle/mastermind pages, all six now deployed live on the DreamHost staging site (synnovatiacom.stage.site — password-protected, separate from WP login, not publicly indexed): homepage at /homepage-new-design-draft/, About at /about/ (replaced old 2020 content directly), Work With Me at /work-with-me/ (new page on a clean slug, deployed 2026-08-13), The Messy Middle at /the-messy-middle/ (overwrote the old predecessor page there, deployed 2026-08-13), Mastermind for the Messy Middle at /mastermind-for-the-messy-middle/ (post ID 11287, new page deployed 2026-08-16), Seven Figure Forum at /seven-figure-forum/ (post ID 11289, new page deployed 2026-08-16), Mastermind for the Messy Middle's dedicated Apply for Consideration page at /mastermind-for-the-messy-middle-apply/ (post ID 11291, deployed 2026-08-16, embeds the real live HubSpot "Mastermind Application" form — portal 110120, guid cb918a3d-5840-4fbd-9e42-95510ef5b670 — same form already in production on the current public site, found by checking that page's source directly rather than guessing among the portal's many similarly-named forms; all four Apply buttons on the Mastermind for the Messy Middle page now link here instead of "#" placeholders), and Seven Figure Forum's matching apply page at /seven-figure-forum-apply/ (post ID 11294, deployed 2026-08-16, embeds the real live "7-Figure Forum Application" form — portal 110120, guid 1f33f39d-b94b-4eab-aacd-55f7f3f17f86, using the `hs-form-frame` embed pattern that page's own live source actually uses, not the `hbspt.forms.create()` pattern the Messy Middle apply page uses — verify which pattern a given live page uses before assuming; all four Apply buttons on the Seven Figure Forum page now link here too), and a general Schedule a Conversation page at /schedule-a-conversation/ (post ID 11297, deployed 2026-08-16, links out to the real live Boomerang Calendar booking page — meet.boomerangapp.com/jackie.synnovatia.com/meeting — since that's what the site actually uses in production, not HubSpot; the Boomerang page blocks iframing so it can't be embedded inline, the button opens it in a new tab. All four "Schedule a Conversation" nav-cta buttons across the homepage, About, Work With Me, and The Messy Middle pages now link here instead of "#" placeholders). **All six pages now share the same 4-item nav** (About / The Messy Middle / Work With Me as a 4-item dropdown: Strategic Coaching / Solutions on the Fly / Mastermind for the Messy Middle / Seven Figure Forum / Perspective) — the old 5-item nav with a standalone "Masterminds" dropdown item is fully retired everywhere, applied to the four already-live pages on 2026-08-16 in the same pass as the two new page deploys. The last nav item was renamed from "Blog" to "Perspective" on 2026-08-16, echoing the confirmed "Strategic Perspective" positioning name — applied sitewide across all nine live pages (the six core pages plus the two Apply pages and Schedule a Conversation) and their local mockup source files. **Blog redesign (in progress, started 2026-08-16):** Jackie has a magazine-style blog front page + all-posts feed page, plus six topic-archive page mockups (Strategy & Planning, Growth & Scaling, Sales & Marketing, People & Partnerships, Mindset & Resilience, Ownership & Entrepreneurship), originally built outside the workspace June 19/23 (`~/Desktop/Website /synnovatia_blog_3_5.html`, `synnovatia_blog_page_2_8up.html`, `synnovatia_archive_*.html`). The live blog's actual WP category taxonomy (421 near-duplicate categories across 563 posts) is unusable, so the plan is a full re-tag into a new clean "Topic" taxonomy before the site build, rather than after — see `outputs/website-redesign/2026-08-16-blog-topic-classification.csv` (full 563-post topic mapping, AI-classified against the six topics' own rubric text). The 42-post low-confidence shortlist has been reviewed and resolved — Jackie sent her judgment back as a Numbers file (`2026-08-16-blog-topic-low-confidence-review-RESOLVED.numbers`/`.csv`, both archived in the same folder), 11 got reclassified and 31 confirmed the original call, all merged into the master mapping with confidence marked `reviewed`. Every one of the 563 posts now has a settled topic. The "Topic" taxonomy (six terms, hierarchical, REST-enabled) has since been built and the full mapping bulk-applied on the **staging** site only (562/563 posts tagged and verified exact-match against the master CSV — the one gap is the newest post, created after staging's last sync, so it doesn't exist there yet). Custom Post Type UI plugin used to build the taxonomy, no code. **2026-08-17: Topic taxonomy replicated to production.** Same setup as staging (Custom Post Type UI, hierarchical, REST-enabled, six terms) built on `synnovatia.com` directly and all 563 posts bulk-tagged via the REST API — 563/563 verified exact-match against the master CSV, zero mismatches. Production and staging are now both fully tagged. **2026-08-17: all 8 mockups reconciled to current brand** — new 4-item nav (matching the rest of the site), CTA copy ("Schedule a Conversation" in nav linking to the real `/schedule-a-conversation/` page, "Start the Conversation" in body CTAs), "Browse by Topic" links wired to the real live taxonomy archive URLs (`/topic/strategy-planning/` confirmed live, the other five slugs follow the identical WordPress sanitize_title convention), and logo markup switched from inline base64 to the standard `assets/synnovatia-logo-*.png` relative-path convention used sitewide. Individual post links, the cover-story link, and the feed page's numbered pager links were deliberately left pointing at the real live `synnovatia.com` URLs (real working content, not placeholders) rather than guessing an undecided future URL scheme — that's a build-time task. Also fixed a real pre-existing bug in the original feed-page mockup, unrelated to the brand work: a bare `nav` CSS selector meant only for the header was also matching the `<nav class="pager">` pagination element, pinning it to the top of the viewport instead of its place in the page flow — scoped both rules to `nav:not(.pager)`. Saved as 8 new files: `2026-08-17-blog-front-page-mockup.html`, `2026-08-17-blog-all-posts-mockup.html`, `2026-08-17-blog-archive-{strategy-planning,growth-scaling,sales-marketing,people-partnerships,mindset-resilience,ownership-entrepreneurship}-mockup.html`. Still local only — not deployed anywhere at the time of that pass. **2026-08-17 deploy update:** two of the eight blog mockups are now live on staging via Option B (Claude preps ready-to-paste HTML, Jackie pastes it herself in WP admin) — the front page at `/business-coaching-blog/` (`outputs/website-redesign/deploy-ready/01-front-page-DEPLOY.html`) and the all-posts feed page at `/business-coaching-blog/all/` (`outputs/website-redesign/deploy-ready/02-all-posts-feed-DEPLOY.html`, rebuilt as a real "Page 1 of 71" — 563 posts ÷ 8/page — using the 8 actual most-recent posts pulled live from the WordPress REST API, rather than the mockup's fabricated placeholder posts; still a static design/visual-QA preview, not the final build — real dynamic pagination across all 563 posts needs an actual WordPress template, not a Custom HTML paste, and is deliberately deferred as one combined future task shared with the six still-undeployed topic-archive pages, which have the same limitation). **Deploy method refined:** pasted content must go into a genuine Custom HTML block, not a Classic block — Classic blocks look identical in the editor toolbar but run WordPress's `wpautop` content filter over their content, which fragments raw pasted HTML/CSS into broken pieces (stray `<p>` tags, split-apart nav markup, invisible button text); confirmed via the editor's List View panel showing the block labeled "Classic," fixed by deleting it and inserting a real Custom HTML block instead. Also found on the feed page specifically (page-to-page theme markup isn't consistent even within the same site): a WordPress `wp_list_pages()` fallback-menu block sitting inside a `<header>` that lacked the usual `#masthead`/`.site-header` id/class, killed by targeting its distinctive `.page_item` class directly instead of the header wrapper; and the true outer width-constraining wrapper turned out to be GeneratePress's `.grid-container`/`.container`/`#page` classes, not the inner `#content`/`.entry-content` classes the front page's override had targeted. **2026-08-17, all six topic archives deployed — blog rollout complete:** applied the accumulated override recipe (broadened sidebar-kill, `.page_item` fallback-menu kill, `.grid-container`/`.container`/`#page` width fix, explicit button text-visibility properties, forced `!important` on the topics-band background) proactively to all six archives, each rebuilt with real per-topic article counts and real top-8-most-recent posts pulled from the classification CSV + live WP REST API (counts: Strategy & Planning 123, Growth & Scaling 73, Sales & Marketing 87, People & Partnerships 76, Mindset & Resilience 112, Ownership & Entrepreneurship 74) rather than the mockups' fabricated placeholder posts. Since the real `/topic/<slug>/` URLs are already-live WordPress taxonomy archive routes (not creatable Pages), each archive was deployed instead as a temporary design-preview Page nested under Business Coaching Blog at `/business-coaching-blog/preview-<topic-slug>/` — same static-preview scope as the feed page, clearly banner-labeled as temporary. All six rendered correctly on the first paste, no live debugging needed. Found and fixed a front-page regression in the same pass: its deploy file predated the `.page_item`/grid-container fixes (backported them), and separately a WordPress **Featured Image** assigned to the page was rendering an unrelated stock photo above the real content — fixed by removing the featured image at the source rather than adding another CSS override. All eight blog pages (front page, all-posts feed, six archives) are now live on staging. Deploy source files: `outputs/website-redesign/deploy-ready/01-front-page-DEPLOY.html` through `08-archive-ownership-entrepreneurship-DEPLOY.html`. **2026-08-17: real logo swapped in across all 8 blog pages**, replacing the CSS text wordmark placeholder. Jackie uploaded `synnovatia-logo-nav.png`/`synnovatia-logo-footer.png` to the staging Media Library and supplied the resulting URLs; deploy files updated to reference them directly rather than embedding base64 (an initial base64 attempt was abandoned as impractical — see HISTORY.md part 8). **2026-08-18: dynamic-pagination template build scoped** — see `plans/2026-08-18-blog-dynamic-pagination-build.md`. Real recon on production found the site's actual pages render through Elementor Pro's Theme Builder (not the plain theme), so the build will happen visually in Elementor rather than as raw PHP theme files — no code, matches how the rest of the site is built, and reuses WP-PageNavi (already installed and working on the current live blog). Key decisions locked in: WordPress-native `/page/2/`-style pagination URLs, build directly on production (Elementor content stays private until published), and the front page keeps its full Cover Story + Latest 4 magazine layout. Real wrinkle flagged: production's current live `/business-coaching-blog/` page is the actual live blog, not the redesign (which has only ever been on staging) — so the front-page/all-posts rebuild happens as new drafts first, with a deliberate reviewed go-live swap, not an in-place edit. **2026-08-18: Phase 1 built and published** — a reusable Elementor Loop Item template, "Blog Post Card" (Theme Builder → Loop Items on production), combining a featured-image column with a stacked topic tag / title / excerpt / "Read the full story" link column, confirmed pulling real post data (topic term, title, excerpt) and linking via the Post URL dynamic tag. Elementor's canvas click-to-add proved unreliable for targeting nested columns (kept defaulting to a new root section); worked around it with a Copy-a-stray-widget → right-click Paste-into-the-real-target → delete-the-original pattern, used repeatedly to assemble the card in order. Two Select2-style dropdowns (the topic taxonomy picker, the button's Dynamic Tags link picker) resisted browser automation entirely — Jackie finished both by hand in the live editor from written steps. Still open before Phase 2: a color/typography pass to bring the card from Elementor's plain defaults to the navy/gold/teal + Fraunces/Barlow system — deferred to Phase 2, since it'll be visible in real context once the archive template is built around it. **2026-08-18: Phase 2 built and published** — one Elementor Archive template, "Topic Archive" (Theme Builder → Archive), set to apply to the Topic taxonomy generally via Display Conditions rather than six separate templates: it auto-detects which topic it's showing and pulls the matching title, description, and posts. All six topic description blurbs (sourced from the mockup files) entered into their real WordPress term records first. Structure: Archive Title + description block, then a Loop Grid pulling in Phase 1's "Blog Post Card," one column, 8 per page, Numbers + Previous/Next pagination set to Page Reload for real crawlable `/page/2/`-style URLs. Found and fixed a real bug during verification — the Loop Grid's Query Source defaulted to "Posts" (a generic unfiltered query), so every topic page showed the same latest-posts list; fixed by switching Source to "Current Query," re-verified live on two topic URLs showing genuinely different, correctly filtered posts. **Phase 2 fully DONE (2026-08-18):** Jackie fixed the description block's Dynamic Tag herself (Archive Description, same manual Select2 method as Phase 1's two items) — verified live on `/topic/strategy-planning/` and `/topic/growth-scaling/` showing real term-specific descriptions and correctly filtered posts, 3 of 6 topic URLs spot-checked live in total. Only non-blocking polish remains: a color/typography styling pass (still Elementor's plain defaults, not navy/gold/teal + Fraunces/Barlow), the remaining 3 topic URLs to spot-check, and the mockup's "Browse Other Topics" band/search box, not yet built. **Phase 3 (front page + all-posts rebuild) started 2026-08-18:** two new draft pages cloned from the live pages (`business-coaching-blog-new-design-draft`, `all-posts-new-design-draft`), safe to rebuild without touching production, both confirmed using the "Elementor Full Width" template so the real theme header/footer still wrap the content automatically. **Front page DONE (draft), 2026-08-18:** all five sections built, saved, and verified live on the draft URL — Masthead, Cover Story (new published Loop Item template "Cover Story Card" via a 1-item Loop Grid ordered by date descending, fully automatic), The Latest (a second new published Loop Item template "Latest Note", 4 posts via a 5-item Loop Grid with the first item hidden by Custom CSS since this Elementor version's Loop Grid has no Offset control — keeps it automatic with no fixed post ID), Browse by Topic (real links to all six live topic archives, click-verified), and the CTA band linking to `/schedule-a-conversation/`. **All-posts page also DONE (draft), 2026-08-18:** Masthead + a Loop Grid using Phase 1's "Blog Post Card" template (topic tag visible, 1 column, 8 per page, genuinely chronological across all 563 posts, real Numbers + Previous/Next pagination set to Page Reload) + the same Browse by Topic/CTA sections as the front page — all verified live. **Phase 3 is now fully done** on both draft pages. What's left before Phase 4 (the reviewed go-live swap): Jackie's visual review of both drafts, and the still-deferred color/typography styling pass across Phases 1–3's plain-Elementor-defaults elements. New automation quirks found and documented in the plan doc, plus a key environment rule: the browser tool's `navigate()` function drops the WP login session every time, even with Remember Me checked — all admin navigation must use in-page link/menu clicks instead. Full detail in `plans/2026-08-18-blog-dynamic-pagination-build.md`. Production taxonomy and the logo swap were already done before this. **2026-08-18: Phase 4 styling pass DONE, go-live swap still pending.** Jackie reviewed both drafts and chose to do the deferred navy/gold/teal + Fraunces/Barlow styling pass before going live rather than after. All three Loop Item templates (Blog Post Card, Cover Story Card, Latest Note) plus the Masthead/"Browse by Topic" heading on both draft pages are now styled and published/saved. Blog Post Card is shared with the six live Topic Archive pages, so that part is already live there too — done with Jackie's explicit sign-off, verified on `/topic/strategy-planning/`, `/topic/sales-marketing/`, `/topic/growth-scaling/`. Both draft Pages themselves were saved via Elementor's "Save Draft," never "Publish," to keep them off the live site per Jackie's explicit instruction to stay in the draft area. **Real bug found and fixed in the same pass:** some cards showed a title with no excerpt snippet before the button while others did — the Post Excerpt widget's "Apply to post content" fallback setting was off on all three templates, so it only ever read the raw manual WordPress Excerpt field (blank on many older posts) instead of falling back to an auto-trimmed snippet from the post body. Turned it on with an Excerpt Length set per template (20/30/16 words); every card now shows something. Full detail in `HISTORY.md`'s 2026-08-18 (continued, part 6) entry, including new Elementor automation notes (color-picker hex fields need a precise click on the input itself before typing; native `<select>` dropdowns are far more reliable via direct form-fill than coordinate clicks; the Publish button's on-screen state can look stuck/glitchy after a click while still registering server-side — verify via the live site, not the button's visual state). **2026-08-19: both drafts reviewed and approved** (full top-to-bottom scroll-through of each), plus a follow-up fix — the all-posts page's pagination numbers were still in WordPress's default blue link style (outside the original card/masthead scope); now styled to match (navy/gold/Barlow Condensed uppercase) and re-saved as Draft. **Go-live swap on production now paused — the blog build is being folded into the staging launch instead.** Jackie confirmed the rest of the site redesign has been on staging (synnovatiacom.stage.site) this whole time, a different track from this blog build (deliberately built on production since Phase 1, a build-location choice, not a go-live-timing one). Rather than the blog going live on production alone, it'll launch together with the rest of the redesign when staging goes live — meaning this entire build (three Loop Item templates, the Topic Archive template, front page, all-posts page, all with the styling already done) needs to be replicated on staging. Not yet started. The six Topic Archive pages already live on production stay live either way — that decision isn't being unwound. **2026-08-19: staging rebuild scoped** — see `plans/2026-08-19-blog-staging-rebuild.md`. Real finding: staging isn't Elementor at all — Elementor/Elementor Pro are installed but inactive there, and the actual redesigned pages (confirmed via `/about/` rendering fully styled with Elementor off) are built in GenerateBlocks + GenerateBlocks Pro on a GeneratePress-based "Synnovatia Child" theme with Site Editor support. Jackie chose to rebuild the blog natively in GenerateBlocks to match, rather than reactivating Elementor and importing production's templates. GenerateBlocks has a native "Query" block (the Loop Grid equivalent) confirmed present. Staging's Topic taxonomy exists but term descriptions are empty and post counts differ from production's — needs a real check, not assumed parity. A five-phase plan mirroring the production build is written up. **Phase 1 done (2026-08-19):** the "Blog Post Card" synced pattern built natively in GenerateBlocks (`wp_block` post ID 11896) — a flex-row Container (Image left, fixed 200×150px, Featured Image dynamic tag; a Group stacking topic tag/title/excerpt/button on the right, each using GenerateBlocks Dynamic Tags), fully styled to navy/gold/teal + Fraunces/Barlow/Barlow Condensed to match production's Elementor version exactly, saved. Two real bugs found and fixed along the way: GenerateBlocks' per-block Font Family dropdown only lists 7 system fonts (no Google Fonts) — fixed via each Typography panel's "Enter Custom Value" option, which does render Fraunces/Barlow correctly since the fonts are already loading site-wide; and a layout regression where the Image and content Group ended up as unnested top-level siblings instead of inside the flex Container (GenerateBlocks' empty-container appenders and direct paste-onto-a-selected-block are both unreliable — paste always replaces the selected block — the reliable fix is insert-a-fresh-empty-sibling-via-the-toolbar-inserter, then select-and-paste to replace that empty placeholder in position). Phases 2-5 (Topic Archive template, front page + all-posts page, review/launch coordination, cleanup) not yet started. Full detail in `plans/2026-08-19-blog-staging-rebuild.md`. 2026-08-13-messy-middle-mockup.html (concept + Mastermind-for-the-Messy-Middle program details/pricing/apply-CTA on one page) is superseded both by the deployed core page and by 2026-08-13-mastermind-messy-middle-mockup.html, a full standalone draft of the Mastermind for the Messy Middle half (built 2026-08-13 from a richer reference file Jackie had built outside the workspace, real cohort details verified against the live `/messy-middle-mastermind/` page — hero, what-it-is, definition, a Christina Carlson member testimonial, a six-item "what happens in the group" grid, facilitator bio, cohort details, and an apply CTA with the real Oct 9 start / Sept 25 deadline dates). Content refocused 2026-08-15 from explaining the Messy Middle stage toward the benefits of the mastermind format itself, then reversed back to problem-first on 2026-08-16 (see below). Seven Figure Forum now has its own standalone page too (`2026-08-15-seven-figure-forum-mockup.html` + matching `.md`/`.docx`, mirrors the same structure) — real facts (pricing, cadence, eligibility, seat cap) pulled from the live public page at `synnovatia.com/7-figure-forum-business-coaching-mastermind-synnovatia/`, which the workspace had no prior record of; includes a real Zoey testimonial and a placeholder video slot for Mark Chapman, pending the actual video file. **2026-08-16 update, both mastermind pages:** the 2026-08-15 "hero leads with the format not the problem" call was reversed at Jackie's direction — both pages' heroes now lead with the problem (per `brand-voice.md`'s Craig Ullom messaging rule) and close with a bold bridge line (`.mm-hero-bridge`) that hands off explicitly to the format as the resolution ("That's exactly the stage this group is built for" / "That's the stage this Forum is built for"). Messy Middle's hero now uses Jackie's own pasted copy, headlined "This is the stage nobody warns you about." A reserved video-placeholder pattern (`.video-section`/`.video-block`, same CSS on both pages) now holds a spot for Christina Carlson's video testimonial on the Messy Middle page, matching the existing Mark Chapman placeholder on Seven Figure Forum — neither video file exists yet. Seven Figure Forum's "Inside the Forum" grid grew from 4 cells to 6 (added Feedback and Resources, worded distinct from Messy Middle's same-named cells) and its layout reverted from 2-column to the standard 3-column grid. Client quote sign-off status for all live pages tracked in the `project_website-redesign-status` memory, not here. **New-page gotcha found 2026-08-16:** the site runs the Redirection plugin with 925+ legacy rules migrated from the live site's URL history — a brand-new page can 301-redirect to an unrelated old page if its slug happens to match an existing rule (caught when `/mastermind-for-the-messy-middle/` redirected to the old `/messy-middle-mastermind/` page despite being correctly published). Before publishing any new page, check `fetch(url, {redirect:'manual'})` for `status:0`/`type:'opaqueredirect'`; if found, disable (don't delete) the offending rule via Tools → Redirection → search → Bulk Actions → Disable. Deploy = paste into the page's Custom HTML block in the block editor, PLUS append two CSS blocks not present in the source mockup file: a WordPress theme override (`#masthead, #site-navigation, div.site-footer, footer.site-info, .entry-header, .featured-image.page-header-image { display: none !important; }` + full-bleed width overrides + `.widget-area.sidebar { display: none !important; }` — the `.featured-image.page-header-image` selector is required whenever the page being overwritten has a featured image set, since GeneratePress renders it as a separate template element from `.entry-header`, discovered 2026-08-13 overwriting the old Messy Middle page) to suppress the GeneratePress theme's own header/nav/title/sidebar/featured-image, and a button-visibility fix (`!important` on button text/background) since the theme's link-color CSS otherwise washes out the mockup's teal buttons — verify both via `getComputedStyle` on `.site-header`, and via a full top-to-bottom screenshot scroll of the live page, not just the "Edit code" preview or the nav area. Also swap any `src="assets/..."` logo path for the real WP media-library URL. Then verify via "Edit code" preview before Update, then Save — WP admin has no reliable way to detect a silent failed save, so always re-verify via the REST API (`/wp-json/wp/v2/pages/<id>`) and a cache purge ("Purge Current Page" in the admin bar) after saving, not just the visual "Saved" state. GeneratePress child theme CSS (`h1-h6`, `.entry-content h2/h3/h4`, `p + p`) silently overrides same-or-lower-specificity page CSS — any pasted color/spacing rule needs `!important` to hold
├── reference/               # Templates, examples, reusable patterns
│   └── email-templates/     # onboarding-welcome.md, onboarding-reminder.md, pre-meeting-objective.md, post-meeting-recap.md
└── shares/                  # Packaged systems for sharing
```

---

## How to Use This Workspace (Cowork)

This workspace is designed for **Claude Cowork** — no terminal required. Everything is done through natural conversation.

### Starting a session

Say this at the start of every session:

> **"Initialize my session"**

Claude will read your context files, `HISTORY.md` (what's been built), `docs/_index.md` (documentation routing), and `context/group/key-metrics.md` (latest business numbers), then confirm it understands your business, current priorities, and what you're working on.

### Updating your metrics

Say: **"Update my metrics"**

Claude will:
1. Pull live numbers from connected sources (HubSpot CRM, Stripe revenue)
2. Ask you for numbers from sources that aren't auto-connected (Quicken, Google Analytics, mastermind headcounts)
3. Rewrite `context/group/key-metrics.md` and `context/current-data.md` with the fresh snapshot

**Live/automated:** HubSpot (CRM), Stripe (revenue — runs daily at 6am automatically via `scripts/collect.py`)
**Manual (tell Claude when asked):** Quicken, Google Analytics, mastermind enrollment counts

Claude can also run live queries against `data/data.db` directly if you ask about trends over time.

### Finding and saving meetings

Say: **"Find that meeting with [name]"** or **"What did we decide about [topic]?"**

Claude searches your Fathom account directly (meetings, transcripts, AI summaries, recordings) — no manual work needed for any meeting Fathom recorded. **Switched from Zoom to Fathom 2026-07-29** — meetings before that date live in Zoom's cloud (if recorded there) rather than Fathom's.

For older meetings, or calls Fathom didn't capture, say: **"Save this meeting summary: [paste]"** — Claude structures it and saves it to `data/meeting-summaries/`.

Slack is not connected (not used in the business).

### Client re-engagement

A full 6-month check-in cadence system lives in `client-reengagement/` (176-client roster, originally built outside this workspace and migrated in on 2026-07-11). Weekly rhythm: Claude drafts the batch automatically **Monday 7am** (`client-reengagement-monday-drafting`, 5 emails), Jackie reviews Monday and **sends Tuesday**:

Say things like:
- **"Who's due for a check-in?"** → runs `check_reengagement.py`, refreshes `client-reengagement/data/due_now.csv`
- **"Draft the next batch"** → Claude drafts personalized re-engagement emails into Gmail (oldest-overdue first), pulling context from HubSpot/past notes. Never sent automatically — always your review in Gmail.
- **"I sent to [name]"** → logs it: `log_outreach.py sent <email>`, resets their cadence clock
- **"Who's awaiting a reply check?"** → runs `list_pending_replies.py`; Claude checks Gmail for actual replies and logs outcomes (`responded` / `no_response` / `meeting_scheduled`)
- **"[Name]'s meeting happened, here's what we discussed: ..."** → logs `meeting_completed`, drafts a personalized post-call follow-up email, flags any opportunity + next action
- **"Any open opportunities?"** → runs `list_opportunities.py` — surfaces pending post-call emails and flagged follow-up opportunities
- **"How's the response rate looking?"** → runs `response_rate_report.py` — reply rate by day of week, to confirm Tuesday is actually the best send day

Full details: `client-reengagement/README.md`

### Content Pipeline (LinkedIn + blog)

Idea-tracking system for LinkedIn (existing Mon/Wed/Fri batch cadence, per `context/linkedin-marketing.md`) and the blog (`synnovatia.com/business-coaching-blog/`, monthly, SEO-driven). Installed 2026-07-27 on top of — not replacing — the existing LinkedIn Monday-batch workflow; it adds structured capture → develop → schedule tracking in `data/content.db`.

Say things like:
- **"/capture [idea]"** → classifies and stores a raw idea as a stub
- **"/develop #[id]"** → full concept development: strategic positioning (audience/authority/offer), then platform-specific packaging (LinkedIn hooks + visual concept, or blog meta title/H1/subheadings/internal links using real Search Console keyword data), interactive at each stage
- **"/schedule"** → batch-plan which developed ideas to create next and when

Strategy docs live in `content/` (`strategy.md`, `brand-and-audience.md`, `offers-and-funnels.md`) — read fresh by `/develop` every time, update them as positioning/offers/keyword targets evolve. `content/strategy.md` includes a real competitor ICP-fit analysis and a Search Console-sourced keyword-target table (re-pull periodically, since positions shift). No free offer/lead magnet is currently active — the blog's old "Core Business Assessment" download is confirmed outdated (flagged separately for removal from the live site).

Full details: `docs/content-pipeline.md`

### Saving your work

Say: **"Save my work"**

Claude will:
1. Update `HISTORY.md` with what was done this session
2. Check if any docs need updating
3. List the files that changed
4. **Write the commit summary for you** — one line, matching this repo's existing style (plain sentence case, semicolon-joined clauses, no period), ready to paste into GitHub Desktop's Summary field
5. Prompt you to open GitHub Desktop and commit

In GitHub Desktop: review the changed files, paste in the summary Claude wrote (edit if you want), click **Commit to main**, then **Push origin**.

### Installing modules

> **"Install [module name]"** — e.g., "Install ContextOS" or "Install the productivity module"

Claude will read the module's install guide and walk you through it step by step.

### Module install order (first time setup):

1. **"Install ContextOS"** — Claude learns your business — 30-45 min
2. **"Install InfraOS"** — Version control and documentation — 20-30 min
3. **"Install DataOS"** — Business data pipeline — 30-60 min
4. **"Install IntelOS"** — Meeting + Slack intelligence — 20-30 min
5. **"Install Content Pipeline"** (optional, requires ContextOS + DataOS) — LinkedIn + blog content idea tracking — 30-45 min

### Other things you can say

| Say this... | Claude does this... |
|---|---|
| "Initialize my session" | Reads context, confirms understanding |
| "Install [module name]" | Guided module installation |
| "Audit my tasks" | Scans recurring tasks, scores automation potential |
| "Create a plan for [X]" | Writes a structured implementation plan in plans/ |
| "Build me [X]" | Executes work from a plan |
| "Update my context" | Updates context/ files with new info you provide |
| "What's my current status?" | Reads context + HISTORY.md, gives a summary |
| "Brainstorm [topic]" | Explores options and trade-offs before taking action |
| "Update my metrics" | Refreshes key-metrics.md from HubSpot/Stripe + asks for manual numbers |
| "Write a report on [X]" | Produces a structured, professional output based on your context |
| "Save my work" | Updates HISTORY.md and docs, then guides you to commit in GitHub Desktop |
| "Find that meeting with [name]" | Searches Fathom directly for meetings, transcripts, summaries |
| "Save this meeting summary: [paste]" | Structures and saves to data/meeting-summaries/ |
| "Who's due for a check-in?" | Refreshes and shows who's overdue in the client re-engagement cadence |
| "Draft the next batch" | Drafts personalized re-engagement emails into Gmail for your review |
| "Launch a new mastermind cohort" | Walks the T-minus checklist in `context/mastermind-launch.md` — dates, page audit, invitation + nudge, intake window |
| "What's in my What I'm Watching digest?" | Checks Gmail drafts for today's "What I'm Watching" — daily research (economic trends / growth & scaling) for the $250K-$4M B2B service segment, drafted by the `what-im-watching-cloud` cloud routine and folded into both the dashboard and the morning brief as a collapsible section (name shared with the existing HubSpot "What I'm Watching" newsletter thread, in case Jackie wants to draw from it there — it's personal reading only until she says otherwise) |
| "/capture [idea]" | Content Pipeline — classifies a raw LinkedIn/blog idea and stores it as a stub in `data/content.db` |
| "/develop #[id]" | Content Pipeline — turns a stub into a full concept: strategic positioning, LinkedIn hooks or blog SEO packaging (using real Search Console keyword targets), CTA alignment — interactive, confirms at each stage |
| "/schedule" | Content Pipeline — batch-plan which developed ideas to create next and when, against the real LinkedIn Mon/Wed/Fri + monthly blog cadence |
| "Send the reply to [name/subject]" | Sends that specific, already-drafted email reply — the one action in this workspace where Claude actually executes a send (via browser automation on your real Gmail), and only ever when you name the specific email in the moment. See `docs/email-response.md` |
| Share a LinkedIn "Aggregate Analytics" export | Logs per-post and daily performance into `data/linkedin-metrics/` (post-performance.csv, daily-engagement.csv, log.csv) and gives an updated read on whether M/W/F is still the best posting cadence, building toward a real data-backed answer over time. See `context/linkedin-marketing.md`'s Cadence Performance Tracking section |

### Setting up Cowork scheduled tasks

Cowork can run recurring tasks automatically. Once DataOS or IntelOS is installed, tell Claude:

> **"Set up a daily task to collect my [Slack / Notion / analytics] data"**

Claude will help you configure it as a Cowork scheduled task — no cron jobs or scripts needed.

**Local vs. cloud:** Most scheduled tasks in this workspace are local — they run on this Mac and require the Cowork app to be open (if it's closed at the scheduled time, they run on next launch). For anything that must run reliably regardless of whether this app is open — and where you want visibility into whether it actually ran — say so, and Claude can set up an Anthropic **cloud routine** instead (via the `/schedule` skill). Cloud routines run on Anthropic's servers, show their own run history at [claude.ai/code/routines](https://claude.ai/code/routines), but cannot read/write local files — they can only reach the outside world through connected services (Gmail, HubSpot, etc.), so they're best suited to research-and-email or research-and-post tasks rather than anything that edits files in this workspace. The `what-im-watching-cloud` routine is the first example: it researches daily (Buyer Sentiment & Behavior + Growth & Marketing Tactics — PE/M&A and macro-data-release content deliberately excluded as of 2026-07-31) and saves the result as a Gmail draft addressed to jackie@synnovatia.com (this connector can only create drafts, not send — same as every other email-touching automation in this workspace). Both the dashboard and the weekday morning brief pick it up from that draft and render it as a "What I'm Watching" section with a collapsible (`<details>`/`<summary>`) block per theme, so it doesn't grow the page unbounded.

---

## Critical Instruction: Maintain This File

**Whenever Claude makes changes to the workspace, Claude MUST consider whether CLAUDE.md needs updating.**

After any change — adding workflows, new context, or modifying structure — ask:

1. Does this change add new functionality the user needs to know about?
2. Does it modify the workspace structure documented above?
3. Should a new phrase be listed in the "things you can say" table?
4. Does context/ need new files to capture this?

If yes to any, update the relevant sections. This file must always reflect the current state of the workspace.

---

## Team Member Workspaces

When a team member gets their own EVOLV-OS workspace, they don't need the full CEO context. Give them two files:

1. **`context/general-business.md`** — the shared company snapshot (copy from the CEO's workspace). Gives Claude the company baseline.
2. **`context/team-member.md`** — their personal file. They fill this in with their sector, role, day-to-day responsibilities, and tools. This keeps their context focused and avoids loading irrelevant CEO-level information into every session.

Claude reads both files together and tailors all assistance to that person's specific role — without the team member ever needing to re-explain who they are or what they do.

---

## Notes

- Context files live in `context/` — the richer they are, the more useful Claude becomes
- Plans live in `plans/` with dated filenames for history
- Outputs are organized by type/purpose in `outputs/`
- API keys go in `.env` — Claude will never ask you to commit this file
- Drop any document into `context/import/` and ask Claude to analyze it
