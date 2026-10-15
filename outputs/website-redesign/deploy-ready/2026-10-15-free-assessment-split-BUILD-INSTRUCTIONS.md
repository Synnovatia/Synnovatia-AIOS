# Free Business Assessment split flow — build instructions

Five files, five real steps. Do them in this order — each one depends on the one before it.

## 1. Upload the two new PDFs — done (2026-10-15)

Both uploaded and verified live:
- Stage I: `https://www.synnovatia.com/wp-content/uploads/2026/10/core-business-assessment-stage1-core-fillable.pdf` (200, 14 pages, correct title)
- Stage II: `https://www.synnovatia.com/wp-content/uploads/2026/10/core-business-assessment-stage2-expansion-fillable.pdf` (200, 11 pages, correct title)

Both deploy-ready Thank You files already have these real URLs filled in — no more placeholders to swap in step 4.

## 2. Check the Follow-up setting on both HubSpot forms — done (2026-10-15)

Turns out there are two separate forms, not one shared form — the plan's updated to match:
- **Core form** (portal 110120, form ID `a22d11ca-5f45-4545-b1c0-49e71c12b0a1`)
- **Expansion form** (portal 110120, form ID `ee747f7e-5c95-402a-a85e-949da71e5f68`)

Both deploy-ready path page files are already updated to use their own correct form. On **each** form's Options tab, make sure "Follow-up" is **not** set to "redirect to a page" — leave it on the inline thank-you message, set to: "Thanks — pulling up your assessment now." Each path page's own code handles sending people to the right Thank You page; if either form's own redirect is also set, it can fight the page's script.

Set both forms' lists to **active** (not static) in the workflow, so future submissions keep landing in the right segment automatically.

## 3. Build the two path pages (safe to publish directly — nothing links to them yet)

- New page, slug `free-business-assessment-core` → paste `2026-10-15-free-assessment-path-core-DEPLOY.html`
- New page, slug `free-business-assessment-expansion` → paste `2026-10-15-free-assessment-path-expansion-DEPLOY.html`

Both use a Custom HTML block (not Classic). Publish both — safe to do since nothing on the live site points to them yet.

**Test both forms before moving on:** submit a real test entry on each path page and confirm it lands on the right Thank You page (you'll get a 404 on both, since those don't exist yet — that's expected for now, just confirm the *URL it redirects to* is correct: `/thank-you-core-business-assessment/` from the Core page, `/thank-you-business-expansion-assessment/` from the Expansion page).

## 4. Build the two Thank You pages

- **Existing page** `/thank-you-core-business-assessment/` → replace its Custom HTML block content with `2026-10-15-thank-you-core-UPDATED-DEPLOY.html` (the real PDF URL is already in it, nothing to swap).
- **New page**, slug `thank-you-business-expansion-assessment` → paste `2026-10-15-thank-you-expansion-DEPLOY.html` (real PDF URL already in it too). Set this page to **noindex** via the DreamHost SEO Toolkit's Advanced tab (matching the existing Core Thank You page).

Re-run the two test submissions from step 3 — this time confirm you land on a real page with the right PDF link, and that the download actually works.

## 5. Build the routing page as a draft, verify, then swap it live

- New, **unpublished** page, slug `free-business-assessment-new-draft` → paste `2026-10-15-free-assessment-routing-page-DRAFT.html`.
- Click through both option cards, confirm each lands on its correct path page, submit each form end to end one more time from here.
- Once everything checks out: archive the old `/free-business-assessment/` page's content (same pattern as every other page swap on this site — rename its slug to something like `free-business-assessment-archived-old-single-flow` so it's recoverable, not deleted), then promote the draft page's content onto the real `/free-business-assessment/` slug.
- Set a real meta title/description on the live routing page via the DreamHost SEO Toolkit (don't leave it on the "content extract" fallback).

## 6. Final sweep

- Click-test the three existing links that point at `/free-business-assessment/` and confirm they still land correctly: the homepage hero soft-CTA, The Messy Middle's inline CTA, and the blog post assessment band (GP Elements hook, element 12480). No changes needed to any of these — same URL, new content.
- Full top-to-bottom screenshot check on mobile for the routing page and both path pages (this site's nav/footer pattern is proven, but always worth a real check).
- Tell me once it's live — I'll verify everything end to end from here and update `HISTORY.md`/`CLAUDE.md`.
