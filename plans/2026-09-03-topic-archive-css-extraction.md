# Topic Archive CSS Extraction — Removing the style-11852.css Dependency

> Scoped 2026-09-03, following the page-cleanup audit that surfaced this as a real (but fixable) risk.
> **Steps 1–5 done same day.** See "Completion notes" at the bottom.

## The problem, confirmed live today

All six live Topic Archive pages on staging (Strategy & Planning, Growth & Scaling, Sales & Marketing, People & Partnerships, Mindset & Resilience, Ownership & Entrepreneurship) load their Blog Post Card styling from one file:

```
https://synnovatiacom.stage.site/wp-content/uploads/generateblocks/style-11852.css
```

Page 11852 ("Preview: Strategy & Planning Archive") is not itself linked anywhere or meant to be live — it's a leftover manual preview page from Phase 1 of the blog rebuild. But GenerateBlocks compiled the Blog Post Card pattern's local styles under *that page's post ID* (because that's where the pattern was originally styled), so every page using the pattern points back to it. Trash or delete 11852 and all six topic archives lose their card styling.

Checked the file directly: it's small — 1,955 characters, 21 selectors, all auto-generated GenerateBlocks local classes (`.gb-text-993a6f2d` etc.) covering the card's title link, excerpt, topic tag, and button. This is a contained fix, not a large one.

## Root cause

GenerateBlocks compiles a block's "local" (non-global) styles into a stylesheet named after whichever post/page was open in the editor when the style was applied — not the shared pattern's own post ID (`wp_block` 11896, "Blog Post Card"). Styling appears to have been done while previewing the pattern live on page 11852, rather than through the pattern's own dedicated editor screen, so the compiled file inherited 11852's ID.

## The fix

Move these styles out of any single page's local scope, onto something that isn't tied to a disposable page. Two ways to do that — recommending the second:

1. **Re-style via the pattern's own editor** (Appearance → Patterns → Blog Post Card, post 11896) instead of via a preview page. GenerateBlocks would then compile to `style-11896.css`, tied to the pattern itself rather than a throwaway preview page. Simpler, but still a single point of failure if that pattern post is ever touched.
2. **Promote the styled properties to GenerateBlocks Global Classes** (e.g. `.blog-card-title`, `.blog-card-excerpt`, `.blog-card-tag`, `.blog-card-button`), which compile into the site's global stylesheet regardless of which page or pattern uses them. More durable — protects any future page that reuses this pattern too, not just today's six. Recommended approach.

## Steps

1. Open the Blog Post Card pattern (Appearance → Patterns, post 11896) directly — not via any preview page.
2. For each of the ~5 styled elements (title/link, excerpt, topic tag, button, image sizing), create a matching Global Class capturing its current computed styles — the existing navy/gold/teal + Fraunces/Barlow system, already correct, just relocating where it lives.
3. Apply the new global classes to the pattern's blocks, remove the old local styling.
4. Regenerate CSS Files (GenerateBlocks doesn't auto-recompile on save — confirmed required step from the original build).
5. Verify on all six live topic archive URLs: confirm the `<link>` tag no longer points to `style-11852.css`, and spot-check visual parity (176px images, 0px image-to-button gap, 32px card spacing — the same checklist used when these were first built).
6. Let it sit a day or two before touching 11852, in case anything needs a rollback — 11852 stays published and untouched during that window, so nothing breaks if the new styling needs adjustment.
7. Once confirmed stable: permanently delete page 11852. At that point page 185 (Business Coaching Blog ARCHIVED) also loses its only remaining dependency — worth revisiting whether to keep it as a historical record or clear it out too, purely your call at that point.

## Scope

Entirely GenerateBlocks admin UI work — no functions.php or theme code paste needed, unlike some earlier fixes on this build. Should be a single focused session.

## Risk / rollback

Low risk. 11852 isn't touched until step 7, so the live site keeps working throughout — if the new global classes don't render correctly, the six archives just keep using the old file until it's fixed.

## Completion notes (2026-09-03)

Steps 1–5 done, verified, same day as scoping. All six Blog Post Card elements (title, excerpt, topic tag, button, image, outer grid) converted to Global Classes (`blog-card-title`, `blog-card-excerpt`, `blog-card-tag`, `blog-card-button`, `blog-card-image`, `blog-card-grid`) via GenerateBlocks' "Move the local block styles" flow, applied directly in the pattern's own editor (post 11896), then Regenerate CSS Files + Purge Cache run, then page 11852 itself re-saved to force its own file to recompile.

**Real wrinkle found:** "Regenerate CSS Files" only marks files stale — it doesn't rewrite them until each page's own content is actually re-saved. style-11852.css itself never shrank even after regenerate + cache purge + revisiting the page; only re-saving page 11852 in the editor triggered anything, and even then the old file's *content* stayed unchanged (1,955 bytes, identical). Traced this to the real mechanism: GenerateBlocks bakes the CSS file reference into each block's own serialized attributes at the moment it's first styled, not as a live per-page lookup — so the stale `style-11852.css` link keeps getting enqueued on the six topic archives regardless.

**Why it's fine anyway:** confirmed directly (not assumed) that this no longer matters functionally. Pulled each of the six live topic archive pages' actual rendered HTML — none of them contain the old class names (`gb-text-993a6f2d` etc.) anymore; all six now render with the new global class names (`blog-card-title` etc.), which load from a genuinely separate, page-independent file (`style-global.css`, confirmed to contain all six new classes). The `style-11852.css` link tag is still present in the page source but is dead weight — nothing in the DOM references any selector from it. Visually confirmed correct navy/gold/teal rendering on `/topic/strategy-planning/` directly.

**What's left (step 6–7, not yet done):** the stale `style-11852.css` `<link>` tag itself is still being enqueued on all six pages — cosmetically unnecessary but functionally harmless (one extra small unused network request per page load). The plan's original wait-a-day-or-two-then-delete-11852 approach still applies before any deletion, though the real risk that motivated it (broken styling) is now already ruled out by direct verification rather than assumption. Deleting 11852 later would also need to account for cleaning up that lingering enqueue reference, or confirming it naturally drops once the page is gone.
