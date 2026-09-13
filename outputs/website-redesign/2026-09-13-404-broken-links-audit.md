# 404 / Broken Links Audit

> Built 2026-09-13, from Jackie's own GA4 Explore export (`2026-09-13-404-broken-links-audit.csv` in this folder — raw list, sorted by sessions descending). Surfaced while pulling GA traffic-mix data for `context/brand-positioning-metrics.md` — the "Page not found – Synnovatia" page title showed real, non-trivial traffic in the Reports snapshot, so it got a proper look.

---

## The headline number

**188 sessions / 370 views landed on a 404 page in the last 90 days, across 89 distinct broken URLs.** Not bot noise — this is the real hostname (`www.synnovatia.com`), real visitors.

## The root cause — one pattern explains 84% of it

**75 of the 89 broken URLs (84%) follow the exact same pattern:** `/business-coaching-blog/bid/{number}/{Title-Slug}` — e.g. `/business-coaching-blog/bid/132741/Are-Flies-Gumming-Up-Your-Business-Growth`.

This is the **old HubSpot blog's URL structure** (`bid` = HubSpot's internal blog-post ID) from before the site's migration to WordPress. When the migration happened, these old HubSpot URLs never got redirects to their new WordPress equivalents — so every old bookmark, backlink, cached search result, or shared link still pointing at a `/business-coaching-blog/bid/…` URL now dead-ends on a 404 page.

**Strong evidence the numeric ID is recoverable:** the current WordPress site's own permalink scheme embeds that same original ID directly in its slugs — e.g. the *live* page `/business-coaching-bid-157290-10-quick-tips-to-improve-your-productivity/` and the *dead* `/business-coaching-blog/bid/157290/10-Quick-Tips-to-Improve-Your-Productivity` share the ID **157290**. Whoever built the new URLs during migration deliberately kept the old ID visible in the new slug, almost certainly for exactly this kind of recovery. That means most of these 75 URLs likely have a live, findable counterpart on the current site — they just need the redirect wired up.

## Other patterns found (the remaining 16%)

| Pattern | Count | Example | Notes |
|---|---|---|---|
| Legacy HubSpot slug-only (no bid number) | 6 | `/business-coaching-blog/entrepreneurship-is-hard-at-first` | Same migration gap, just an older HubSpot URL style without the `/bid/{id}/` segment |
| Missing trailing slash — genuinely simple | 1 | `/strategic-business-consultations` (no slash) | **Confirmed live 2026-09-13:** the real page exists and loads correctly at `/strategic-business-consultations/` (with slash) — rebuilt 2026-09-02 as its own standalone page. Just needs a no-slash → same-URL-with-slash redirect. |
| Retired page, not a slash issue | 1 | `/monthly-coaching` (and `/monthly-coaching/`, confirmed 2026-09-13 — **both 404, not just the no-slash version**) | This isn't a trailing-slash bug — the page itself is gone on both variants. Matches what `plans/2026-09-03-redirect-audit-plan.md`/`CLAUDE.md` already flagged: `/monthly-coaching/` was the old "Strategic Coaching" page, its content now lives on **Work With Me**, and this specific redirect was deliberately held back pending a GA/Search Console traffic check — which this audit *is* that check (13 sessions in the same 90-day window, confirming it's worth fixing, not safe to ignore). **Correct fix: redirect both `/monthly-coaching` and `/monthly-coaching/` → `/work-with-me/`**, not to a same-page trailing slash. |
| Legacy asset links | 3 | `/Portals/110120/images/...jpg` (2 with Facebook `fbclid` params), `/hubfs/bigstock-Money-maker-optimized.jpg` | Old images from a pre-WordPress CMS, referenced from old Facebook shares. Very low traffic (1 session each) — not worth chasing. |
| Malformed link markup | 1 | `/can-you-grow-your-business-in-an-uncertain-economy-yes-with-a-business-growth-strategist/(opens in a new tab` | The literal text "(opens in a new tab" got concatenated onto a real URL somewhere — a copy/paste or markup bug in whatever page or email contains this link. Worth finding the source page and fixing the raw link markup. |
| Other one-off | 2 | `/business-coaching-bid-154287-are-you-ready-to-push-grow-consider-strategic-business-planning/` | A flat-slug URL with no matching live page found in this dataset — may be a genuinely retired post, or a typo somewhere. |

## What I can't do from this session

I don't have live/browser access to `synnovatia.com` from here (this session only has file, Git, HubSpot, Gmail, Drive, Calendar, and Fathom access — no WordPress admin or browser tool). I can't look up each broken URL's real current-site counterpart or build exact redirect targets myself right now.

## Recommended next step

The next time a session with live site access is working on `synnovatia.com` (per `CLAUDE.md`, that's typically the Cowork/browser-enabled environment that did the original redirect-audit work in this same folder), hand it `2026-09-13-404-broken-links-audit.csv` and ask it to:

1. For each `legacy-hubspot-bid-id` row, search the site (by the ID number, or by keywords from the old title) for the matching live post, and fill in the `new_url_(fill_in)` column
2. Bulk-import the resulting old-URL → new-URL pairs into the Redirection plugin — the exact same CSV-import method already used for the 84 blog-category redirects on 2026-09-06 (see `plans/2026-09-03-redirect-audit-plan.md` and that HISTORY.md entry)
3. Add the two confirmed redirects directly (no lookup needed): `/strategic-business-consultations` → `/strategic-business-consultations/`, and `/monthly-coaching` + `/monthly-coaching/` → `/work-with-me/`
4. Track down and fix the malformed "(opens in a new tab" link at its source

This is a genuine, previously-unknown gap in the 9/11 relaunch's redirect coverage — worth folding into the still-open "807 domain-hardcoded redirect targets" cleanup item flagged in `plans/2026-08-23-website-prelaunch-checklist.md` and the 2026-09-06 redirect audit, since both are the same underlying project (making sure old URLs still resolve after the WordPress migration).
