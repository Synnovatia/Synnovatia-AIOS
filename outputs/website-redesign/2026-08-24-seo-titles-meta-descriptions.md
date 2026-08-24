# SEO Titles & Meta Descriptions — Redesigned Site

> Drafted 2026-08-24, ahead of go-live. None of the redesigned pages currently have real page titles or meta descriptions set — the `<title>` tags in the mockup/deploy HTML files are internal file labels only ("Synnovatia — Homepage Mockup," etc.) and get stripped when pasted into WordPress as Custom HTML blocks. These are the actual values to enter into each page's title field and meta description (Yoast/RankMath field, or WordPress's native equivalent) once the redesign is live.
>
> Grounded in `content/strategy.md`'s Search Console keyword clusters (growth advisor/strategist, accountability, accelerate business growth, business strategy, business plateau, employee turnover) and each page's real hero copy — nothing invented that isn't already on the page. Character counts are for the title/description text alone (Google typically shows ~50-60 chars of title, ~150-160 of description before truncating — everything below fits).

---

## Core pages

### Homepage (`/`)
**Title (59 chars):** Business Growth Advisor for Stage II Companies | Synnovatia
**Meta description (147 chars):** Stalled growth isn't a strategy problem you can out-work. Jackie Nagel helps $250K-$4M business owners find the perspective that gets them unstuck.
*Targets the "growth advisor" cluster (currently barely ranking, highest-alignment fix per the keyword table) and the "business plateau" cluster the H1 already speaks to directly.*

### About (`/about/`)
**Title (56 chars):** About Jackie Nagel | Business Growth Advisor, Synnovatia
**Meta description (153 chars):** 25+ years advising Stage II business owners ($250K-$4M) through growth plateaus other consultants haven't seen. Meet Jackie Nagel, founder of Synnovatia.

### Work With Me (`/work-with-me/`)
**Title (43 chars):** 1:1 Business Strategy Coaching | Synnovatia
**Meta description (155 chars):** Two ways to work with Jackie Nagel: ongoing strategic coaching for the stretch you're in now, or one sharp conversation when you need a fast, outside read.

### The Messy Middle (`/the-messy-middle/`)
**Title (57 chars):** The Messy Middle: Business Plateau Explained | Synnovatia
**Meta description (164 chars, slightly long — trim if the live field flags it):** You've outgrown the playbook that got you here, and the next one hasn't been written yet. Here's what the Messy Middle stage of business growth actually looks like.
*Directly targets "business plateau" — the flagship keyword cluster's namesake concept lives on this page.*

### Mastermind for the Messy Middle (`/mastermind-for-the-messy-middle/`)
**Title (44 chars):** Mastermind for the Messy Middle | Synnovatia
**Meta description (148 chars):** A women-only mastermind for $250K-$500K business owners navigating the stage nobody warns you about. Real accountability, real peers, real strategy.
*Targets the "accountability" cluster — several of its queries already rank on page 1, this is the page that concept should point to.*

### Seven Figure Forum (`/seven-figure-forum/`)
**Title (56 chars):** Seven Figure Forum | Mastermind for $1M+ Business Owners
**Meta description (137 chars):** What got you to $1M won't scale you past it alone. A mastermind built for founders past seven figures who need peers who actually get it.

---

## Conversion / utility pages

Lower SEO priority — these exist to convert an already-interested visitor, not to rank. Titles matter for browser tabs/bookmarks and social shares more than search.

### Mastermind for the Messy Middle — Apply (`/mastermind-for-the-messy-middle-apply/`)
**Title (51 chars):** Apply: Mastermind for the Messy Middle | Synnovatia
**Meta description (121 chars):** Ready to apply for the Mastermind for the Messy Middle? Tell us where your business stands and we'll follow up about fit.

### Seven Figure Forum — Apply (`/seven-figure-forum-apply/`)
**Title (38 chars):** Apply: Seven Figure Forum | Synnovatia
**Meta description (108 chars):** Ready to apply for the Seven Figure Forum? Tell us where your business stands and we'll follow up about fit.

### Schedule a Conversation (`/schedule-a-conversation/`)
**Title (36 chars):** Schedule a Conversation | Synnovatia
**Meta description (117 chars):** Book a time to talk with Jackie Nagel about where your business stands right now. No pitch, just a real conversation.

---

## Blog

### Blog front page (`/business-coaching-blog/`)
**Title (52 chars):** Business Coaching Blog | Notes From the Messy Middle
**Meta description (134 chars):** Strategic thinking for Stage II business owners: growth plateaus, accountability, and the real work of scaling past where you are now.

### All Posts (`/business-coaching-blog/all/`)
**Title (45 chars):** All Posts | Synnovatia Business Coaching Blog
**Meta description (129 chars):** Every article from the Synnovatia blog, browsable by date, on strategy, growth, and the Messy Middle stage of business ownership.

### Topic archives (`/topic/<slug>/`)
Each archive's meta description reuses the already-approved term description copy (`arch-desc` in the deploy files) almost verbatim — it was written for this exact purpose and doesn't need reinventing.

| Topic | Title | Meta description |
|---|---|---|
| Strategy & Planning | Strategy & Planning Articles \| Synnovatia Blog (46) | Frameworks, planning rhythms, and the clear-eyed thinking that turns a reactive business into a deliberate one. (111) |
| Growth & Scaling | Growth & Scaling Articles \| Synnovatia Blog (43) | What it takes to grow past the plateau: building the structure, capacity, and clarity to scale without breaking what works. (123) |
| Sales & Marketing | Sales & Marketing Articles \| Synnovatia Blog (44) | Winning attention and trust in a noisy market, and turning interest into the kind of revenue that compounds. (108) |
| People & Partnerships | People & Partnerships Articles \| Synnovatia Blog (48) | The people side of growth: hiring and trusting talent, reducing turnover, delegating without losing the thread, and building real partnerships. (143) |
| Mindset & Resilience | Mindset & Resilience Articles \| Synnovatia Blog (47) | The inner game of ownership: staying steady, clear, and resourceful when the business asks more of you than you expected. (121) |
| Ownership & Entrepreneurship | Ownership & Entrepreneurship Articles \| Synnovatia Blog (55) | The bigger questions of building and owning a business: identity, direction, and what it really means to be the one in charge. (126) |

*People & Partnerships' description leans on "reducing turnover" deliberately — the keyword table's newest finding is that several turnover long-tail queries ("how to reduce turnover," "prevent turnover") already rank #1 with zero clicks, likely because no page directly answers them. This archive is the closest existing match until a dedicated post exists.*

---

## Not covered here

- **Individual blog posts** (563 of them) — out of scope for a manual pass; each would need its own title/description, ideally generated as part of the `/develop` workflow going forward rather than retrofitted in bulk.
- **Image alt text, schema markup, sitemap/robots.txt** — technical SEO items better suited to the `/marketing:seo-audit` skill once it's run against the live site.
