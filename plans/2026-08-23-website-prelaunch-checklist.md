# Website Pre-Launch Checklist

> Compiled 2026-08-23. Staging (`synnovatiacom.stage.site`) now has the full redesign built and live: homepage, About, Work With Me, The Messy Middle, both mastermind pages, both Apply pages, Schedule a Conversation, and the full 8-page blog (all 5 build phases done). This checklist tracks what's left before pushing any of it to the real public site (synnovatia.com).

---

## The big open question — go-live mechanism

- [ ] **Decide how staging becomes production.** This isn't a simple content swap: staging runs a different theme and page builder (GeneratePress-based "Synnovatia Child" theme + native GenerateBlocks) than what production has historically used (Twenty Nineteen Child theme, with Elementor Pro in active use for some page types). No DreamHost "push staging to production" tool was found in staging's own plugin list — what *is* installed is Better Search Replace, the standard manual-migration tool, suggesting the intended path is export/import + domain search-replace rather than a one-click push. Confirm with DreamHost support if a native tool exists before assuming the manual path.
- [x] **Content divergence checked (2026-08-23) — smaller than feared.** Diffed every post and page between production and staging directly via their REST APIs: no pages exist on production that are missing from staging (nothing would be orphaned in a cutover), and content differences on shared posts were purely mechanical (per-site image domains), not real editorial drift. The one real gap — a blog post published on production 2026-08-11 that didn't exist on staging — has been pulled in and published on staging with matching title/excerpt/topics/date; both sites now show 563/563 posts. The one page most likely to have drifted (`messy-middle-mastermind`, edited on production as recently as July 20) was checked directly against the redesigned staging page — all three of that page's real corrections (revenue band, seat count, cohort dates) are already present there.
- [ ] Once the mechanism is confirmed, set a target launch date and work backward from it for everything below.

## Must-fix before launch

- [ ] **Name correction:** "Nia Troup" → **Naya James** — she confirmed this is her current legal name across all contexts. Still shows as "Nia Troup" on the About/homepage testimonial copy.
- [ ] **HubSpot form styling:** the embedded "Mastermind Application" and "7-Figure Forum Application" forms still show HubSpot's default button styling, not the site's teal (`#0F6E56`). Fix lives in HubSpot's own Style tab for each form — Jackie deliberately held off doing this earlier since it would also change the forms' appearance on the *current live* public pages, not just staging. Do this as part of the launch sequence, not before.
- [ ] **Video testimonials — still placeholders:**
  - Christina Carlson (Messy Middle mastermind page)
  - Mark Chapman, The I Do Society (Seven Figure Forum page)

## Client quote sign-offs

Jackie confirmed (2026-08-12) these are **not hard blockers** — but worth clearing before the quotes go live to the public.

- [ ] **Diane Leonard** — sign-off request has sat in Gmail Drafts since 2026-08-04, never sent
- [ ] **Anne Laguzza** (About page) — status never directly confirmed either way
- [ ] **Brooke Billingsley**, VP Perception Strategies (Work With Me page) — quote is live on the staging page but no sign-off outreach has been sent or tracked at all

Already confirmed and clear: Mark Chapman, Christina Carlson, Raffi Saroyan, Laura Labovich, John Lanza, Sandra Martinez Roe.

## Blog — one thing not to touch

- [ ] **Don't delete page 11852** ("Preview: Strategy & Planning Archive," currently published on staging). It looks like a leftover preview page but its compiled CSS file is the actual live stylesheet source for the Blog Post Card pattern across all six real topic archive pages. If anyone doing cleanup deletes it without knowing this, every topic archive page loses its styling. Worth a proper fix at some point — move the pattern's CSS to a page-independent source — but not urgent.

## Final QA pass (do this on staging right before go-live, not now)

- [ ] Click every nav link and internal CTA across all pages — confirm no leftover `#` placeholders
- [ ] Submit-test both HubSpot forms (Mastermind Application, 7-Figure Forum Application) end to end
- [ ] Confirm the Schedule a Conversation button opens the real Boomerang booking link
- [ ] Check mobile responsiveness on the homepage, blog front page, and one topic archive
- [ ] Confirm Google Analytics tracking is installed on whatever the production site ends up running (GA integration itself is manual in this workspace — not auto-verified)
- [ ] Spot-check 5–10 old production URLs against the new site structure to make sure nothing 404s — the site's Redirection plugin has 925+ legacy rules; new/renamed slugs have collided with old rules before (see `CLAUDE.md`'s "New-page gotcha" note) and should be checked with `fetch(url, {redirect:'manual'})` before publishing anything new

## Worth a heads-up, not a task

- The 40% rate increase tied to this rebrand (per `strategy.md`) is meant to land within 6 months of the relaunch — worth deciding whether the rate change gets announced to existing clients at the same time the new site goes live, or on its own separate timeline.

---

_Update this file as items get resolved. When the go-live mechanism is decided, this probably splits into a dedicated launch-day runbook._
