# Homepage Structure & Direction Doc

> Written 2026-08-03. Synthesizes 8 design references scraped this session with the confirmed positioning brief (`outputs/positioning/positioning-brief.md`), the existing homepage copy draft (`2026-07-29-homepage-about-copy.md`), and the 2026 style guide (`context/style-guide.md`). This is a structural/direction doc, not final copy or a build — copy already exists and is linked to below rather than repeated.
>
> **Update 2026-08-04 — new canonical mockup:** `2026-08-04-homepage-merged.html` is now the live direction. Jackie confirmed she likes the eyebrows/subheaders and overall structure of the pre-AIOS `synnovatia_homepage_eyebrows_3.html` concept (Downloads) better than the reconciled `2026-07-16-homepage-mockup.html`, so it was merged: the eyebrows_3 file's structure/CSS as the base (two-column hero with photo/stat/pull-quote panel, per-section eyebrow labels, three-pillar "why different" breakdown, the five-words callout, editorial testimonials with a featured quote + three supporting, secondary CTA), with every piece of copy swapped to the confirmed/corrected version — see the reconciliation log below for what changed. `2026-07-16-homepage-mockup.html` is now historical, kept for reference only, same as `2026-07-13-mockup.html` before it.
>
> A frozen mockup exists at `2026-07-16-homepage-mockup.html` — reconciled against it below (Section 0). This doc supersedes that mockup's copy where they conflict; its visual system does not need to change. (Superseded 2026-08-04 by the merged file above — this section stays as the historical record of that reconciliation.)

---

## 0. Reconciliation against the 2026-07-16 mockup

Checked the mockup's full `<style>` block against `context/style-guide.md` line by line: every hex value used (`#0D1F4E`, `#B29200`, `#0F6E56`, `#F7F6F2`, etc.) and every `font-family` declaration (Fraunces / Barlow / Barlow Condensed) match the current style guide exactly. **The visual system needs no changes** — it was already built to spec, before this session's design research even started, and nothing in that research argues for a different visual direction.

**The mockup's hero photo already solves Open Item #2 below.** It's a real, warm, candid embedded photo — Jackie laughing, home-office setting with bookshelves, not a stock image. This is closer to "authentic but premium" than anything in the 8 reference sites reviewed this session. Recommendation: keep this photo (or one in the same spirit) rather than sourcing new stock — the one open question is whether it's still current/approved, not whether the *type* of photo is right.

**Where the mockup's copy had gone stale** (it predated the finished positioning brief and the 2026-07-29 copy draft):

1. ~~**Hero headline/subhead conflict.**~~ **Resolved 2026-08-03** — mockup's hero now uses the confirmed "Growth Stalled?" headline and subhead in place of "You're not stuck because you're doing something wrong. You've outgrown the strategy that got you here." (the version that risked presuming a repeat-pattern awareness the reader doesn't have yet, per the same edit logic in `plans/2026-07-28-positioning-statement-work.md`).

2. ~~**"Different is better than better." section header conflation.**~~ **Resolved 2026-08-03** — retitled to "Fortune 500 Thinking, Sized to Fit," a light paraphrase of already-confirmed tight-statement language ("the kind of strategic thinking usually reserved for Fortune 500 companies, sized to get your business growing again"), so it no longer presents the research-study name as if it were Synnovatia's tagline. Body paragraphs left as-is — they describe the substance honestly and didn't have the conflation problem, only the header did.

3. ~~**Messy Middle plateau descriptions outdated.**~~ **Resolved 2026-08-03** — section header and both paragraphs replaced with the confirmed "The Same Wall, More Than Once" copy (the sharpened per-wall diagnosis from the 2026-08-01 positioning brief update).

4. **Testimonial set doesn't match the confirmed set — still open, needs Jackie's decision.** Mockup includes a John Lanza (The Money Mammals, client since 2016) quote not present anywhere in the 2026-07-29 copy draft or the positioning brief's client roster. Also uses a different real Raffi Saroyan quote ("There is no one else doing what Jackie does, at this level, for entrepreneurs like us") than the confirmed draft's Raffi quote ("Jackie helps me see the 30,000-ft view") — both are legitimate, sourced quotes from the positioning brief, just different ones. **Needs a decision, not just a merge:** confirm whether John Lanza is still a client worth featuring (and get his sign-off alongside the other four), and pick one Raffi quote per placement rather than defaulting to whichever version happens to survive.

5. **One detail from the mockup's About section is worth pulling forward, not discarding — still open.** "She's also currently a cultural anthropology student, because asking clients to keep growing only works if she's doing the same" doesn't appear in the finalized About-page draft's "Why I Do This" section — it's a specific, warm, true detail that fits the voice well. Also worth reconciling: the mockup names a "Management Development for Entrepreneurs certification from UCLA's Anderson School of Business," more specific than the finalized draft's generic "Entrepreneurship certification from UCLA" — confirm which is factually correct and use the accurate version.

**Structural elements the mockup has that this doc didn't previously address** (no conflict, just filling gaps):
- **Nav:** About / The Messy Middle (dropdown: The Mastermind) / Work With Me (dropdown: Strategic Coaching, Solutions on the Fly) / Blog, plus a persistent "Schedule a Conversation" CTA button — matches the confirmed CTA bank in `content/offers-and-funnels.md`.
- **A tangled-to-resolved SVG line motif** near the hero eyebrow — a small chaos-resolving-to-clarity visual metaphor. On-brand, no conflict, worth keeping.
- **Footer:** wordmark, phone, email, LinkedIn, copyright/legal — standard, no changes needed.

---

## What we're borrowing, from where

| Site | What it's for | What it's not for |
|---|---|---|
| **thelastlayer.co** | Primary visual anchor — editorial warmth, premium-not-corporate photography, testimonial-led close, numbered/expandable portfolio pattern | Field mismatch (PR/influencer agency) — don't borrow its services-menu structure |
| **jkc.dev (Josh Kremer Consulting)** | Boutique-personal structure and tone — numbered section system (01 Approach, 02 Services...), direct "bring us the problem" closing copy, two-person "Meet the Team" honesty | Ecommerce-specific service list |
| **christopherboyer.com** | Narrative arc: "A hard truth → The good news → How I help" — structurally identical to Craig Ullom's problem-first messaging principle already in the positioning brief | Healthcare-specific content, corporate solutions-list structure |
| **michaeldmorrison.com** | Direct copy pattern: explicit limited-capacity language ("I work with a limited number of coaching clients so I can give each business owner the attention their business deserves") | Visual execution — generic coach-template, stock photo, popup-gated hero |

**What to actively avoid**, per sites reviewed and rejected:
- Alisa Cohn's full-screen email-capture gate blocking the homepage on load
- Zbra Studios' stat-badge/service-tile agency template feel (500+ websites launched, 97 awards)
- The Boutique COO's team-and-service-menu sprawl (wrong shape — you're a solo practice, not a shop)
- Dorie Clark's "As Seen In" press-logo bar — implies a media profile Synnovatia doesn't have; would read as reaching

---

## Section-by-section structure

### 1. Hero
**Copy:** already drafted — headline "Growth Stalled?", subhead, CTA "Start the Conversation" (`2026-07-29-homepage-about-copy.md`, Hero section).

**Visual direction:** Last Layer's pattern — full-bleed warm, real photography (not stock-corporate skyline shots like Boyer/Zbra) behind a confident display-serif headline. Per the style guide, this is Fraunces at 40-52px on Warm Off-White or a photo overlay, not a dark text-panel treatment like Zbra's. Consider a real photo of Jackie or her actual workspace over generic stock — nothing in the reference set nailed authentic-but-premium photography; this is the one gap worth solving deliberately rather than defaulting to a stock library.

**Do not**: gate this behind a popup (Cohn), or open with a services list (Zbra, Boutique COO).

---

### 2. The Pattern (problem-first hook)
**Copy:** already drafted — "The Same Wall, More Than Once" (three-plateau framework), `2026-07-29-homepage-about-copy.md`.

**Structural borrow:** Christopher Boyer's "A hard truth → The good news" arc. This section IS the "hard truth" half — name the pattern, validate the reader's felt experience ("it rarely feels like part of a pattern"), before any mention of Jackie or Synnovatia. Matches Craig Ullom's lead-with-the-problem principle directly.

**Visual direction:** plain, text-forward, Barlow body at generous line-height (1.7 per style guide) — no imagery competing with the diagnostic language here. This section works because it's precise, not decorative.

---

### 3. What I Bring (the turn — "the good news")
**Copy:** already drafted, `2026-07-29-homepage-about-copy.md`.

This is the Boyer-arc's second beat. Keep it short — the positioning brief's Pillar B (Wisdom/Breadth/Depth) is the substance here, already distilled into two paragraphs. Don't expand it into a services list.

---

### 4. Personalized, Not Packaged
**Copy:** already drafted, includes the Mark Chapman pull-quote.

**Visual direction:** style guide's pull-quote treatment — Fraunces italic + gold left-rule. This is where Kremer's numbered-section confidence could apply well if the page needs a visual anchor here (e.g., a small "02" label), but keep it subtle — Barlow Condensed eyebrow labels, per the style guide's own warning that "eyebrows lose force if overused."

---

### 5. What Clients Say
**Copy:** already drafted — three testimonials (Raffi Saroyan, Laura Labovich, Anne Laguzza).

**Blocked, not just pending:** every quote needs fresh public-use sign-off before this section can ship (flagged in the copy doc itself and in memory `project_rewrite-website-copy-after-steering-sheet`). Structure this section now; don't publish until sign-off is in hand.

**Layout:** stacked/asymmetrical per the copy doc's own note — explicitly not a 3-column grid (AI-Tell Policy in `brand-voice.md`). Last Layer's testimonial section (named, titled, no forced grid) is the closer visual model than Kremer's or Boyer's, neither of which features testimonials prominently on the homepage.

---

### 6. Closing CTA
**Copy:** already drafted — "Ready to talk through where you're stuck?"

**Copy borrow worth testing:** Kremer's closing line ("Bring us the symptoms... Every message gets a direct, personal reply, usually within a day or two") and Morrison's explicit limited-capacity framing both model a warmer, more specific closing than a bare CTA button. Consider folding a line like this in — it's consistent with the positioning brief's "Personalized, Not Packaged" pillar and gives the ask more texture without adding length. Not required — the existing closing copy already works — but worth trying as an A/B option if Jackie wants one more warmth pass.

---

## Ideas pulled from `synnovatia_homepage_eyebrows_3.html` (pre-AIOS mockup)

Jackie shared a third homepage concept, built before this workspace existed, from `~/Downloads/synnovatia_homepage_eyebrows_3.html`. It shares the same embedded hero photo and several of the same real client quotes as the workspace mockup, and is fully on-palette/on-font per the style guide (checked). It predates the finished positioning brief, so it carries the same staleness the 2026-07-16 mockup had (old headline, old plateau numbers) — not repeated here since those are already fixed. Two real content ideas from it are worth pulling forward, plus two factual/copy discrepancies that are now resolved.

**Built 2026-08-04 into `2026-08-04-homepage-merged.html`** — Jackie confirmed she likes this file's structure and direction, so what was "worth incorporating" below is now live, not just proposed:

- **Three-pillar "why different" structure**, from its Problem section: three numbered, evidence-backed points — Outside Objectivity, Lived Experience, Above & Beyond Engagement — each with a one-line client-sourced proof point (Objectivity Gap, Walks the Talk, Effort Where Others Pass, all real positioning-brief themes). Carried over unchanged; already accurate.
- **"Five words" callout**, sourced directly from Laura Labovich's interview in the positioning brief (Compassionate, Curious, Insightful, Thoughtful, Kind). Carried over unchanged.
- **Secondary CTA** on the closing section, alongside the primary: "Explore the Messy Middle." Carried over unchanged.
- **Two-column hero** (photo/stat-block/pull-quote panel on the left, eyebrow/headline/subhead/CTA on the right) and **per-section eyebrow labels** throughout — the specific structural pattern Jackie asked for by name.
- **Hero headline and eyebrow — reverted 2026-08-04.** First pass swapped the headline to "Growth Stalled?" and dropped "Stage II Entrepreneurs" from the eyebrow/stat-label, on the assumption that "Stage II" was deprecated terminology since it doesn't appear in the positioning brief or the confirmed 2026-07-29 copy draft. Jackie corrected this directly: keep "Stage II Entrepreneurs" as standing terminology in regular communication, and use the original eyebrows_3 headline/first-paragraph content instead ("You're not stuck because you're doing something wrong... I'm Jackie Nagel. For 25+ years I've equipped Stage II entrepreneurs..."), just with the already-corrected $250K–$4M revenue range. Checking `context/brand-voice.md` and `context/business-info.md` afterward confirmed "Stage II entrepreneurs" is in fact live, standing terminology there — it just isn't repeated in the positioning brief or the 2026-07-29 draft, which was the wrong signal to infer deprecation from. **Lesson for future edits:** absence from one reference document (the positioning brief) doesn't mean a term is retired — check the foundational context files (`brand-voice.md`, `business-info.md`) before treating any established term as outdated. Saved as memory `feedback_dont-infer-terminology-deprecated`.
- **Problem section — settled 2026-08-04 after two passes.** First pass used the confirmed "The Same Wall, More Than Once" diagnosis. Jackie asked to revert to the original eyebrows_3 content instead (simpler $250K–$500K framing). Looking at the sharper diagnosis again, she confirmed she actually prefers that paragraph content ($250,000–$400,000 / $750,000 to $1 million / $3–4 million, with the specific per-wall cause) — just not the header "The Same Wall, More Than Once" itself. **Final state:** header is now **"It Happens More Than Once"** (picked from three options offered — alternates were "You've Been Here Before" and "Growth Stalls in Predictable Places" — swap easily if she wants a different one later), body content is the full sharper diagnosis, both paragraphs merged into flowing prose rather than a separate styled closing line. Also fixed one word in point 03 (Above & Beyond Engagement): "Zoom" → "conversation," so it reads "I don't clock out when the conversation ends."
- **Status, per Jackie (2026-08-04): `2026-08-04-homepage-merged.html` is now the leading version, not a drift from `2026-07-29-homepage-about-copy.md` to be reconciled back.** The two have diverged on the hero headline ("You're not stuck because you're doing something wrong..." vs. the markdown draft's "Growth Stalled?") and the Problem section's wall-by-wall wording (reworded 2026-08-04: wall 2 now uses the "too complex to hold in your head" line, wall 3 now uses "shift from running on your judgment and presence to running as a professionally managed organization," pulled from the positioning brief's actual $3M–$4M diagnosis). Treat the HTML file as the current source of truth for homepage copy going forward — don't assume the markdown draft should overwrite it, or vice versa, without her say-so.

**Resolved — two discrepancies in the pre-AIOS file, both settled by existing workspace decisions, no new decision needed:**

- **Revenue floor stated as "$350K to $4M."** This is a known-superseded number — `context/task-audit.md` and `context/brand-voice.md` both document an explicit correction on 2026-07-13, from $350K–$4M to $250K–$4M, "per the official 2026 Style Guide — the $250K floor matches the actual Messy Middle mastermind band." The eyebrows_3 file simply predates that fix (it lives outside the workspace, in Downloads, so it wasn't caught in the original sweep). $250K stays correct everywhere; no live copy uses $350K.
- **CTA button reads "Map Your Next Level."** Not in the approved CTA bank (`content/offers-and-funnels.md`: "Start the Conversation" / "Schedule a Conversation" / "Find a Time That Works" / "Apply for Consideration"). Fixed 2026-08-04 in the merged file — hero button now reads "Start the Conversation," nav CTA reads "Schedule a Conversation."

**Added to the confirmed copy and both `.docx` files, then trimmed:**

- **Nia Troup testimonial** ("Jackie doesn't just cheer — she rolls up her sleeves and engages with the actual problem until something concrete comes out the other side," First Legal Services, client since 2010) — a real quote, also independently cited in the positioning brief's "Practical Collaboration, Not Cheerleading" theme. Sign-off list is six names total (Chapman, Saroyan ×2, Labovich, Laguzza, Lanza, Troup).
- **Trim done 2026-08-03.** What Clients Say was down to 4 quotes (Raffi, Laura, Anne, Lanza) instead of 5 — but not by deleting Naya. Her quote turned out to be a better thematic fit for **Personalized, Not Packaged** than a generic testimonials slot (it's specifically about hands-on collaborative work style, matching that section's own point), so it moved there instead, alongside Mark Chapman's quote. Raffi and John Lanza both stayed in What Clients Say despite covering similar objectivity/clarity ground — cutting either would have overridden an explicit decision Jackie already made (Raffi's two-quote placement; Lanza's "keep it" call), so neither was cut without asking.

---

## Open items before this can move to build

**Resolved 2026-08-03** (mechanical fixes, applied directly to `2026-07-16-homepage-mockup.html`): hero headline/subhead swapped to the confirmed "Growth Stalled?" copy; "Different is better than better." section header retitled to "Fortune 500 Thinking, Sized to Fit"; Messy Middle plateau copy replaced with the confirmed "The Same Wall, More Than Once" text. Verified in-browser — renders cleanly, no layout breakage.

**Resolved 2026-08-03** (Jackie's decisions on the four remaining open items, applied to the confirmed copy draft and both `.docx` files):

1. ~~Client quote sign-off~~ — **John Lanza confirmed as a keeper.** Sign-off list is now five: Mark Chapman, Raffi Saroyan (quoted twice), Laura Labovich, Anne Laguzza, John Lanza. His quote ("Her ability to distill the problems you're actually facing... is uncanny.") added to the What Clients Say section. **Still blocks Section 5** — sign-off itself hasn't happened yet, just the decision to pursue it.
2. ~~Hero photo~~ — **confirmed still current and approved.** No new photography needed.
3. ~~Raffi Saroyan quote placement~~ — **using both, per their existing spots.** "There is no one else doing what Jackie does, at this level, for entrepreneurs like us" added as the hero pull-quote; "Jackie helps me see the 30,000-ft view" stays in What Clients Say.
4. ~~UCLA certification detail~~ — **the specific version is correct.** "Management Development for Entrepreneurs certification from UCLA's Anderson School of Business" — corrected in `context/business-info.md` (was the generic version) and confirmed in the About copy.

~~6. One About-page detail still to fold in~~ — **Resolved 2026-08-03.** "I'm also currently a cultural anthropology student — because asking clients to keep growing only works if I'm doing the same" added to the end of the About page's "Why I Do This" section, in both the confirmed copy draft and `2026-07-29-about-page-copy.docx`.

**Still open:**

5. **Wilma Naschin's interview** (or Amy Hage's) — the $250K–$400K wall description in Section 2 is still an unvalidated working draft per the positioning brief's own data-quality notes; not a build blocker, but a reason not to treat that section's copy as fully final.

---

## 2026-08-04 — Homepage copy overhaul (current state, supersedes scattered notes above)

Extensive collaborative editing pass directly on `2026-08-04-homepage-merged.html`. Rather than patch every note above, here's the current, authoritative state:

**Who's featured on the page now, and their sign-off status (all pending, none sent yet):**
1. **Raffi Saroyan** (Showroom Exchange, client since 2012) — hero pull-quote only now ("There is no one else doing what Jackie does..."). Draft in Gmail.
2. **Diane Leonard** (DH Leonard Consulting & Grant Writing Services, client since 2013) — new addition, sourced from the live pre-redesign homepage snapshot (`2026-08-01-live-homepage-before-snapshot.md`), not the positioning brief. Two quotes used: one woven into the "How I Work" body copy, one in that section's side quote-block. Draft in Gmail (sent 2026-08-04).
3. **Laura Labovich** (The Career Strategy Group, client since 2000) — moved from "How I Work" into the testimonials feature spot ("Proof you can only feel..."). Draft in Gmail.
4. **Nia Troup** (First Legal, client since 2010) — testimonials support row. Draft in Gmail, still asks whether she prefers "Nia" or "Naya" published.
5. **Mark Chapman** (The I Do Society, client since 2014) — testimonials support row.
6. **John Lanza** (The Money Mammals, client since 2016) — testimonials support row. Draft in Gmail.

**Anne Laguzza is no longer featured anywhere on the page** — her quote was swapped out for Diane Leonard's in the "How I Work" side panel and not placed elsewhere. Drop her from active sign-off tracking; no need to pursue.

**Other changes this pass:**
- Hero paragraph gap filled: "Most owners are too close to see the real situation clearly. I bring the objective perspective that changes everything."
- Hero closing line changed to "on the problem you're facing" (echoes John Lanza's testimonial just below it).
- "How I Work" body rewritten to lead with what clients notice first (questions + hearing what's under the surface) instead of a framework/anti-framework comparison; cut the "harder part" framing so the work doesn't read as difficult for Jackie; kept only the 30,000-foot-view line from the old second paragraph.
- "Someone who pushes without punishing" (read as managerial) replaced with "encouraging, supportive, hardworking, and quick to make them feel genuinely heard and seen instead of processed."
- CTA headline changed to "Ready to see what's possible for you and your business?"
- **Full em-dash sweep across all visible copy on the page**, including inside the two direct client quotes that used dashes as transcription punctuation (John Lanza's, Nia Troup's) — replaced with commas, periods, or parentheses depending on context. Per Jackie's explicit instruction to remove anything that reads as AI-generated. CSS comments and the `<title>` tag were left alone since they're not visible copy.

**Status:** `2026-08-04-homepage-merged.html` remains the leading, authoritative version of the homepage copy (confirmed 2026-08-04) — `2026-07-29-homepage-about-copy.md` is not being kept in sync with it.

---

## 2026-08-04 — About page built

Jackie surfaced a previously-designed About page concept (`~/Desktop/Website /synnovatia_about_23_6.html`) already using the exact confirmed visual system (same CSS variables, fonts, nav/footer). Made it the new base for `2026-08-04-about-page-mockup.html`, replacing an earlier, simpler About mockup built in this same session off the plain 2026-07-29 copy draft. Structure: Hero (photo/headline), Origin ("Why I started Synnovatia"), "What Makes It Different" 6-card grid, Approach (with a Diane Leonard side pull-quote), Credentials & background (with a 3-stat block), Client Voices (3 testimonials), CTA. Verified rendering end-to-end in-browser.

**Real problem caught and fixed: several "quotes" in the candidate file weren't verbatim.** Checked the actual source (`context/import/DiB_Interview_Synthesis_Master.docx`) rather than trusting the candidate file's attributions at face value. Found that the source document itself distinguishes between quoted statements (in quotation marks — genuinely verbatim) and third-person paraphrased theme-summaries (no quotation marks, but still name-attributed in a "pull quotes" list). The candidate file had taken several of the *unquoted* paraphrases and formatted them as direct blockquotes attributed by name — not something the client actually said in that wording:
- Raffi Saroyan's "does the hard work — sustained effort, deep engagement, and a willingness to go where other advisors stop" is the source doc's own paraphrase ("Raffi noted that...") — not verbatim. His only two verbatim quotes are "Jackie helps me see the 30,000-ft view" and "There's no one else doing what Jackie does for solopreneurs" (both already placed on the homepage).
- Laura Labovich's "warmth is not incidental to the work — it's load-bearing" is lifted near-verbatim from the source doc's own analytical prose (not Laura's spoken words), then further embellished with invented phrasing ("not just serviced") not in the source at all. Her only verbatim quote is "You always leave a session feeling better than when you came in" (already on homepage).
- Christina Carlson's real verbatim fragment is just "Jackie walks the talk." — the rest of the candidate's quote ("She brings the credibility of lived experience...") was invented.
- John Lanza's candidate quote added an unsourced "Her business sense is keen and" prefix onto the already-confirmed, already-sign-off-requested wording.

**Fixed:** Origin section's two pull-quotes now use only verified verbatim quotes (Raffi's "30,000-ft view," reused from the homepage since both his real quotes are already spoken for elsewhere; and Mark Chapman's "I was too close to see my own situation objectively," used here by name for the first time). Client Voices section keeps only verbatim fragments: John Lanza's original confirmed wording (prefix removed), Christina Carlson's actual "Jackie walks the talk," and Sandra['s two genuinely quoted fragments combined ("Jackie is like a therapist to entrepreneurs. She's always jiggling the key, finding the way in.") — see open issue below on her surname.

**New names added to featured-clients tracking, per Jackie's decision to include both:**
- **Christina Carlson** — already a known, verified Seven Figure Forum member. HubSpot contact found (christina@unstuck.network, company "Unstuck Leadership Consulting, Inc." — corrected from the candidate file's "Unstuck, Inc."). Sign-off draft sent to Gmail 2026-08-04, matching the tone of the other 7; asked her to confirm her actual client-since year since none was documented anywhere in the workspace.
- **"Sandra Martinez" — RESOLVED 2026-08-04.** Jackie confirmed the full name is **Sandra Martinez Roe** (positioning brief and source synthesis doc named her "Sandra Martinez"; HubSpot's actual contact for Hello Earth Club is Sandra Roe, sandra@helloearthclub.com — confirming "Martinez" and "Roe" are the same person). The About page already shows "Sandra Martinez Roe." Sign-off outreach can proceed under this name.

**Credentials & background section corrected against `context/business-info.md`:** candidate's "Certified, Coach U & Corporate Coach U International" conflated teaching with certification — Jackie taught at both schools, she isn't certified by them — corrected to "Faculty, Corporate Coach University & Coach University." Mastermind names corrected to the official "Mastermind for the Messy Middle" and "Seven Figure Forum" (candidate had informal names). Two claims not previously documented anywhere in the workspace — "published author and regular contributor to publications" and a science-based/evidence-based coaching methodology — confirmed accurate by Jackie and added to `context/business-info.md`'s Differentiators line so they're no longer living only on this page.

**Full em-dash sweep applied** throughout all visible copy (including inside two client quotes, per the same standing instruction as the homepage's 2026-08-04 sweep).

**Images:** extracted the homepage's embedded hero photo and nav/footer logos out of base64 into real files under `outputs/website-redesign/assets/` (`jackie-hero.jpg`, `synnovatia-logo-nav.png`, `synnovatia-logo-footer.png`) so pages can share them without re-embedding a ~280KB blob each. Also extracted a second real Jackie photo (gardening, candid) from the About candidate file as `assets/jackie-about-hero.jpg`, giving the About page a distinct but equally authentic hero image.

**New standing instruction from Jackie, applies everywhere going forward, not just this file:** never leave any reference, label, or comment anywhere indicating content is AI/Claude-generated. Saved as memory `feedback_no-ai-generated-references`.

**Second real problem caught, this time against `context/brand-voice.md`'s own AI-Tell Policy — Jackie asked directly whether style-guide.md and brand-voice.md were being checked, and they hadn't been re-read this session.** Reading both fresh (not from memory of past sessions) surfaced two live violations in the About page as shipped:
- **3-column testimonial grid** (explicitly banned) — the Client Voices section used `grid-template-columns: 1fr 1fr 1fr`. Fixed using the same de-uniforming treatment already proven on the homepage's own testimonials section: uneven column widths (1.2fr/1fr/1.15fr), the middle card nudged down 40px, no hard dividers between cards. Verified via computed styles at a real 1280px viewport (the Browser pane's screenshot width is capped near 800-885px regardless of resize requests, which reads as still-stacked/mobile layout in screenshots even after fixing — confirmed the actual fix via `getComputedStyle` instead of trusting the screenshot alone).
- **Negation-pivot cadence** (explicitly banned, and normally scrubbed before Jackie ever sees a draft) — found and fixed: "Clients don't experience me as a coach selling a methodology. They experience me as someone who understands" → merged into one positive-first sentence; "That's not a philosophy. It's just what the work requires" → dropped the negation setup; "It's not early-stage chaos and it's not the plateau of a mature business" → rewritten as a positive comparative; "No frameworks. No sales pitch." (stacked ultra-short fragments) → cut, kept only the substantive sentence that followed. Eyebrow count checked too: only 2 on the page (Hero, CTA) — within the documented max.

**Also confirmed via style-guide.md:** colors, fonts, and pull-quote treatment (Fraunces italic + gold left-rule) all already matched exactly — no changes needed there. Confirmed the locked CTA copy table in brand-voice.md matches what's on the page ("Schedule a Conversation" nav, "Start the Conversation" body).

`context/brand-voice.md`'s client roster updated to "Sandra Martinez Roe" to match.

---

## Reference files
- Full scraped source: `.firecrawl/thelastlayer.md`, `zbrastudios.md`, `dorieclark.md`, `alisacohn.md`, `michaeldmorrison.md`, `theboutiquecoo.md`, `joshkremer.md`, `christopherboyer.md`, `jeremymalcolm.md` (temp — move any worth keeping permanently before `.firecrawl/` gets cleared)
