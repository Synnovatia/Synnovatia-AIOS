# Homepage Structure & Direction Doc

> Written 2026-08-03. Synthesizes 8 design references scraped this session with the confirmed positioning brief (`outputs/positioning/positioning-brief.md`), the existing homepage copy draft (`2026-07-29-homepage-about-copy.md`), and the 2026 style guide (`context/style-guide.md`). This is a structural/direction doc, not final copy or a build — copy already exists and is linked to below rather than repeated.
>
> A frozen mockup exists at `2026-07-16-homepage-mockup.html` — reconciled against it below (Section 0). This doc supersedes that mockup's copy where they conflict; its visual system does not need to change.

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

**Worth incorporating — recommendations, not yet built into any section above:**

- **Three-pillar "why different" structure**, from its Problem section: instead of prose paragraphs, break the differentiation into three numbered, evidence-backed points — Outside Objectivity, Lived Experience, Above & Beyond Engagement — each with a one-line client-sourced proof point (Objectivity Gap, Walks the Talk, Effort Where Others Pass, all real positioning-brief themes). This is a stronger, more scannable treatment of the same substance currently in Section 3 (What I Bring)'s two paragraphs. Worth considering as a restructure of that section rather than a new one.
- **"Five words" callout**, sourced directly from Laura Labovich's interview in the positioning brief (Compassionate, Curious, Insightful, Thoughtful, Kind) but never given its own visual moment in the confirmed copy or the reconciled mockup — a genuinely unused asset worth a small dedicated callout, likely near Section 4 (Personalized, Not Packaged) or Section 5 (What Clients Say).
- **Secondary CTA** on the closing section, alongside the primary: "Explore the Messy Middle" — gives a lower-commitment next step for a reader not ready to book a call. Worth considering for Section 6 (Closing CTA).

Restructuring "What I Bring" and adding a new callout are bigger content decisions than the mechanical fixes above — flagging as recommendations rather than executing them, since they'd change already-reviewed sections.

**Resolved — two discrepancies in the pre-AIOS file, both settled by existing workspace decisions, no new decision needed:**

- **Revenue floor stated as "$350K to $4M."** This is a known-superseded number — `context/task-audit.md` and `context/brand-voice.md` both document an explicit correction on 2026-07-13, from $350K–$4M to $250K–$4M, "per the official 2026 Style Guide — the $250K floor matches the actual Messy Middle mastermind band." The eyebrows_3 file simply predates that fix (it lives outside the workspace, in Downloads, so it wasn't caught in the original sweep). $250K stays correct everywhere; no live copy uses $350K.
- **CTA button reads "Map Your Next Level."** Not in the approved CTA bank (`content/offers-and-funnels.md`: "Start the Conversation" / "Schedule a Conversation" / "Find a Time That Works" / "Apply for Consideration"). Recommend retiring this phrase if this file's layout is ever built from — use the approved bank instead.

**Added to the confirmed copy and both `.docx` files, then trimmed:**

- **Naya Troup testimonial** ("Jackie doesn't just cheer — she rolls up her sleeves and engages with the actual problem until something concrete comes out the other side," First Legal Services, client since 2010) — a real quote, also independently cited in the positioning brief's "Practical Collaboration, Not Cheerleading" theme. Sign-off list is six names total (Chapman, Saroyan ×2, Labovich, Laguzza, Lanza, Troup).
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

## Reference files
- Full scraped source: `.firecrawl/thelastlayer.md`, `zbrastudios.md`, `dorieclark.md`, `alisacohn.md`, `michaeldmorrison.md`, `theboutiquecoo.md`, `joshkremer.md`, `christopherboyer.md`, `jeremymalcolm.md` (temp — move any worth keeping permanently before `.firecrawl/` gets cleared)
