# Free Business Assessment: migrating to the Stage I/II split flow

> Written 2026-10-15. Scoping doc — the build itself hasn't started. This lays out what's already done, what's left, and the real decisions that need Jackie's call before work can start, so the next session can move straight to execution instead of re-litigating these mid-build.
>
> **All three decisions confirmed by Jackie, 2026-10-15:** one shared HubSpot form tagged by stage (Option A), two separate Thank You pages (Option B), build-as-draft-then-swap go-live (Option B). Ready for execution.
>
> **Status: build complete, awaiting Jackie's paste-and-verify pass (2026-10-15).** All five deploy-ready files are written: the draft routing page, both path pages (each with a real HubSpot form embed), and both Thank You pages (one new, one an update to the existing live page). The "tagged by stage" mechanism turned out simpler than a new hidden field — the SAME HubSpot form is embedded on both path pages, each with its own `onFormSubmitted` script sending the visitor to its own Thank You page, so which page a lead submitted from is itself the stage signal (visible in HubSpot's page-of-submission tracking) — no new HubSpot field needed. Step-by-step build order: `outputs/website-redesign/deploy-ready/2026-10-15-free-assessment-split-BUILD-INSTRUCTIONS.md` (also sent as a PDF).
>
> **Step 1 done, same day:** Jackie uploaded both PDFs to the WordPress Media Library and sent their real URLs — verified live (200, correct page counts, correct titles). Both Thank You page deploy files already have the real URLs filled in, no placeholders left for step 4.
>
> **Real correction to decision #1, same day:** turns out Jackie already had two separate HubSpot forms (Core: `a22d11ca-5f45-4545-b1c0-49e71c12b0a1`, Expansion: `ee747f7e-5c95-402a-a85e-949da71e5f68`), not the single shared form the "tagged by stage" plan assumed. Since both already existed, this is strictly simpler than the original plan — each path page now embeds its own dedicated form instead of one form doing double duty. Both path page deploy files updated to match. Both forms' thank-you message set to "Thanks — pulling up your assessment now."; both set to active (not static) list membership so future submissions keep auto-segmenting correctly.
>
> **PROJECT DONE as of 2026-10-17.** All 5 pages built, deployed, and verified live end to end: both path pages, both Thank You pages, and the routing page (swapped onto the real `/free-business-assessment/` slug, with the old single-flow page archived, not deleted, at `/free-business-assessment-archived-old-single-flow/`). Final polish items closed out: the hero heading keeps "Messy Middle" on one line (non-breaking space), real SEO meta title/description are live, and all 3 existing site links to the assessment (homepage, Messy Middle, blog post band) confirmed working. One real bug found and fixed along the way: the go-live swap left a stale Redirection-plugin rule (auto-created when the old page's slug changed) sending `/free-business-assessment/` to the archived page on plain visits — disabled in Tools → Redirection, then the page's own cache purged. No open items remain. Full detail in `HISTORY.md`'s 2026-10-17 entry.

---

## What's already built (nothing to redo here)

- **Two real fillable PDFs**, split by business stage, both auto-calculating and compressed to ~1.1MB:
  - "The Core Business Assessment" (Stage I) — 70 checkboxes, 14 pages
  - "Business Expansion Assessment" (Stage II) — 50 checkboxes, 11 pages
- **A two-path routing-page mockup** (`outputs/website-redesign/2026-10-09-core-business-assessment-split-mockup.html` + matching `.docx`) presenting the two stages as separate destinations, each with its own real question count, correct PDF titles in the download-confirmation copy, the real site logo, and a Privacy Policy footer link.

## What's currently live, and why it matters

The live `/free-business-assessment/` page still runs the **old single 100-item assessment** — a visual/copyright refresh of the original, not the split version. It's wired to a real HubSpot form (portal 110120, formId `a22d11ca-5f45-4545-b1c0-49e71c12b0a1`) and a direct-download Thank You page (`/thank-you-core-business-assessment/`, chosen over email delivery for spam-deliverability reasons back when it was built).

Three other spots on the site link to this page and assume the current single-assessment framing:
- Homepage hero soft-CTA ("Not ready yet? Take the free business assessment instead.")
- The Messy Middle page's inline CTA (right after the symptoms section)
- The blog post assessment band (GP Elements hook, element 12480, on all ~563 posts)

---

## The three real decisions

### 1. How does a visitor get the right PDF — one form or two? **→ Decided: Option A, one shared form**

- **Option A — one shared HubSpot form, tagged by path.** Both "Start Stage I" and "Start Stage II" buttons on the routing page submit to the same existing form, with a hidden field recording which stage was chosen. Least HubSpot setup work; keeps using the form already built. Downside: any future stage-specific email/workflow needs extra branching logic inside one form's automation.
- **Option B — two separate HubSpot forms**, one per stage, each able to carry its own workflow/welcome email from the start. More setup work on the HubSpot side (a new form to build), but cleaner separation if you ever want to message Stage I and Stage II leads differently.

**My instinct:** Option A — it's less new HubSpot work, and nothing about the current plan calls for different automated emails per stage yet. But this is your call since it affects how you can segment and follow up with these leads later.

### 2. One Thank You page or two? **→ Decided: Option B, two separate pages**

- **Option A — one shared Thank You page** that serves the correct PDF based on which path the visitor came from (a URL parameter like `?stage=1` vs `?stage=2`, or reading the hidden form field). Less to build and maintain, but needs a small bit of conditional logic.
- **Option B — two separate Thank You pages**, near-duplicates of the current one, each hardcoded to its own PDF. Dead simple to build (copy the existing page's pattern twice), no conditional logic, but two pages to keep in sync if the closing CTA or design ever changes.

**My instinct:** Option B — matches how every other paired thing on this site has been built (two mastermind pages, two Apply pages, two assessment PDFs already), and avoids introducing new conditional logic into a page that's never needed it before.

### 3. How does this go live — edit in place, or build-and-swap? **→ Decided: Option B, build as draft then swap**

- **Option A — edit the live page directly.** Faster, but the page is mid-edit and potentially broken for however long it takes to paste and verify.
- **Option B — build the new routing page as a draft/preview page first, verify it end-to-end, then swap it onto the real `/free-business-assessment/` slug** (same archive-and-promote pattern used for the blog front page and All Posts page go-live on 2026-08-23).

**My instinct:** Option B. It's the established, already-proven pattern on this site, and this page currently drives real traffic from three other live pages — not a good one to leave half-built in public.

---

## Decisions I'd default on unless you say otherwise (lower-stakes, stating my assumption rather than asking)

- **Same URL slug** (`/free-business-assessment/`) for the new routing page — keeps all three existing internal links working with zero changes elsewhere, and avoids the Redirection plugin's auto-redirect-on-slug-change gotcha that's bitten this build before.
- **No copy changes** to the homepage soft-CTA, Messy Middle inline CTA, or blog assessment band — their current generic wording ("take the free business assessment") still works once a visitor lands on a page that explains the two-path split itself.
- **Keep direct-download delivery** (not email) for both stages, matching the existing page's established reasoning.
- **Set a real meta title/description** on the new routing page through the DreamHost SEO Toolkit rather than leaving it on the "content extract" fallback (which grabs raw CSS on custom-HTML pages — a known issue already seen elsewhere on this site).

---

## Suggested execution order, once the three decisions above are made

1. Build the routing page as a new draft/preview page (not touching the live slug yet).
2. Upload both PDFs to the Media Library; wire the chosen form strategy to both "Start Stage I / Stage II" buttons.
3. Build the Thank You page(s) per the chosen structure, each serving the correct PDF.
4. Full verification pass on the draft: both paths click through correctly, both PDFs download, mobile check, SEO title/description set.
5. Archive the old live page's content, promote the new draft onto `/free-business-assessment/`.
6. Spot-check the three existing internal links (homepage, Messy Middle, blog assessment band) still land correctly post-swap.
7. Update `CLAUDE.md` and `HISTORY.md` to reflect the live split flow; retire the "not yet started" note on this migration.
