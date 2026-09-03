# Redirect Audit Plan — Website + Blog Go-Live

> Prep work for the redirect audit session. Companion file: `outputs/website-redesign/2026-09-03-redirect-tracker.xlsx` (the actual tracking spreadsheet — Current Link / New Link / Notes / Complete checkbox, one tab for the core site, one for the blog).

---

## The one thing to decide before anything else

**How staging becomes production is still an open decision** (see `plans/2026-08-23-website-prelaunch-checklist.md` and the `project_website-redesign-status` memory). The three live options carry very different redirect needs:

- **DNS/hosting cutover** (point `synnovatia.com` at staging, retire old production) — production's own URL history and its 925+ existing Redirection rules stay put on the *old* server; only the *new* slug changes introduced by the redesign need new rules.
- **Content migration** (move staging's DB/media into the existing production install) — the 925+ existing rules travel with it automatically; still need new rules layered on top for redesign slug changes.
- **Manual page-by-page rebuild on production** (the approach already used for the six topic archives) — every redirect has to be created by hand, one at a time, same as those were.

The audit below works the same way regardless of which path gets picked, but *who* creates the final redirects (DreamHost/hosting-level vs. the Redirection plugin) depends on it. Confirm this first if it hasn't been settled yet.

---

## What's already known (pre-filled in the tracker)

Two slug changes are already confirmed from this build, both already caught once by the existing 925+ legacy Redirection rules colliding with a new page slug:

| Old (production) | New (staging) | Source |
|---|---|---|
| `/messy-middle-mastermind/` | `/mastermind-for-the-messy-middle/` | HISTORY.md 2026-08-16 — new page 301'd to this old one until the colliding rule was disabled |
| `/7-figure-forum-business-coaching-mastermind-synnovatia/` | `/seven-figure-forum/` | HISTORY.md 2026-08-15 — real facts pulled from this live production URL |

Everything else below is genuinely unknown until the audit steps run — don't assume more than these two.

---

## Audit steps — website (core pages)

1. **Pull production's real, current page list.** `https://synnovatia.com/wp-json/wp/v2/pages?per_page=100` for every currently-live URL, titles included.
2. **Pull staging's final page list** the same way, once it's confirmed which pages are actually going live (all the rebuilt ones, per `CLAUDE.md`'s website-redesign section).
3. **Match by content, not by title** — several pages were rebuilt at the *same* slug with entirely new content (About, The Messy Middle), which need no redirect at all; others moved to a new slug on purpose (the two above) or got consolidated (Strategic Coaching and Solutions on the Fly are now sections *within* `/work-with-me/`, not separate pages — their old production URLs, if any still exist, need to be found and pointed at `/work-with-me/`).
4. **Export the existing 925+ Redirection rules from production** (Tools → Redirection → Export, on production) before touching anything — this is the site's accumulated URL history from *before* this redesign, and needs to be preserved regardless of which go-live path gets chosen, not rebuilt from scratch.
5. **Spot-check old marketing/funnel pages** — Free Business Assessment, its Thank You page, Strategic Business Consultations, and Contact Form Thank You all kept their original slugs when rebuilt this week, so they likely need *no* redirect — confirm rather than assume.
6. **The homepage swap is a separate mechanism, not a redirect.** Staging's new homepage currently lives at `/homepage-new-design-draft/` — becoming the actual site homepage is a WordPress "front page" setting, not a Redirection-plugin rule. Track it in the tracker anyway so it doesn't get missed on go-live day.

## Audit steps — blog

1. **Individual posts need no redirect.** All 563 posts kept their real, existing production URLs throughout this rebuild (confirmed multiple times in HISTORY.md) — this is the one part of the blog that's already done.
2. **The front page and All Posts URLs stay the same slug, content only changes.** `/business-coaching-blog/` and `/business-coaching-blog/all/` — no redirect needed, just confirm the new content is what's live post-cutover.
3. **The real work: old categories → new topics.** Production's blog used 421 near-duplicate WordPress categories before this redesign; the new site replaced them with a clean 6-term Topic taxonomy (`/topic/<slug>/`). Any of those 421 old `/category/<slug>/` archive URLs that have real inbound traffic or backlinks need to redirect to whichever of the six `/topic/<slug>/` pages that category's posts actually landed in.
   - Reuse `outputs/website-redesign/2026-08-16-blog-topic-classification.csv` — it already maps all 563 posts to their final topic, which is the fastest way to work out which old category corresponds to which new topic in bulk, rather than mapping 421 categories by hand.
   - Prioritize by traffic: pull Google Search Console's top-performing category-archive URLs (if GA/Search Console access is available) rather than auditing all 421 blind — most will have negligible traffic.
4. **The six manual "Preview: * Archive" pages are not part of this** — five were already trashed, and page 11852 stays published on purpose (it's a load-bearing CSS dependency, not a real content page — see `CLAUDE.md`'s blog section).

---

## How to use the tracker

- One row per redirect. Current Link = the exact old URL as it exists on production today. New Link = the exact destination it should point to.
- Check the "Complete" box only after the redirect is actually live *and* verified — use `fetch(url, {redirect:'manual'})` from the browser console (a `301`/`opaqueredirect` response confirms the rule is firing) rather than trusting the admin UI, which has been unreliable for this before (see the Redirection-plugin bulk-action gotcha in HISTORY.md).
- Leave Notes blank until a row is actually worked — don't pre-fill guesses.
