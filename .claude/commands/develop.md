# /develop — Develop Content Concept

> Take a content idea stub and develop it into a fully strategized, packaged concept.

## Variables

$ARGUMENTS (the stub ID like "#5", or a raw idea to capture and develop in one go)

## Instructions

You are running the **Develop** step of the Content Pipeline. Your job is to take a captured idea and turn it into a fully developed content concept with strategic positioning, audience alignment, packaging, and offer mapping.

### Setup — Load Context

1. **Read the idea:**
   - If given an ID (#N): query `SELECT * FROM content_ideas WHERE id = N` via the content database
   - If given raw text: this is a new idea — capture it as a stub first (classify channel + format), then develop

2. **Read content strategy docs** (ALWAYS read these):
   - `content/strategy.md` — platform, cadence, pillars, personas, competitive positioning, keyword targets (for blog/SEO pieces)
   - `content/brand-and-audience.md` — brand positioning, target audience segments
   - `content/offers-and-funnels.md` — offers, funnels, audience → offer alignment, CTAs (note: no free offer currently active — don't invent one)

3. **Build the 7-day context window:**
   ```bash
   source .venv/bin/activate && python3 -c "
   import sys; sys.path.insert(0, '.')
   from scripts.content_pipeline.context_aggregator import build_context_window, format_context_for_prompt
   context = build_context_window(days=7)
   print(format_context_for_prompt(context))
   "
   ```
   Read the output — this tells you:
   - Recent published content (what's already been covered)
   - Recent meetings (themes, discussions, insights)
   - Current pipeline state (what's already queued)

   **For blog ideas specifically:** also cross-check against the existing 8-year blog archive at `synnovatia.com/business-coaching-blog/` (per the "Existing blog" note in strategy.md) so new posts extend rather than duplicate what's already published.

### Stage 1: STRATEGIC POSITIONING (Present and confirm)

Using the idea + context window + strategy docs, develop the strategic frame:

1. **Audience alignment** — Which of the three defined segments does this serve (Messy Middle Owner / Scaling B2B Owner / 1:1 Retainer Prospect)? What problem does it solve for them?
2. **Authority angle** — Why is Jackie THE voice on this topic? (Reference brand-and-audience.md's proof points)
3. **Offer alignment** — Which offer does this drive toward — retainer, messy_middle, seven_figure_forum, or brand_only? What's the CTA path? (Reference offers-and-funnels.md — remember blog CTAs stay light, no hard ask)
4. **Narrative fit** — How does this connect to what's been published recently? (Reference the context window)
5. **Funnel position** — awareness / consideration / conversion
6. **Content pillar** — thought leadership / story / client win / SEO-search

**STOP. Present the strategic frame concisely. Ask: "Does this positioning feel right? Any angle changes?"**

### Stage 2: PACKAGING (Present and confirm)

The packaging stage adapts based on channel.

#### For LinkedIn

1. **3-5 hook lines** — The first 1-2 lines that appear before "see more." Each should stop the scroll.
2. **Visual concept** — What image, carousel, or video thumbnail accompanies the post?
3. **Format recommendation** — Post, article, or carousel. With reasoning.
4. **Mandatory pre-presentation pass** (per `context/brand-voice.md` and `context/linkedin-marketing.md`): scrub AI-tell cadence (negation pivots, punchy fragment stacks, anaphora, "Here's the thing" openers, formulaic triads) AND push toward blunter/plainer/warmer phrasing — cut jargon, cut throat-clearing, default shorter. Jackie should never have to ask for this.

#### For Blog

1. **Target keyword** — pull from the Keyword Targets table in `content/strategy.md`; note current position/impressions so the gain is visible
2. **Meta title + meta description** — SEO-optimized, distinct from the on-page H1 if needed
3. **H1 + suggested subheadings** — structured for both readability and the target keyword's search intent
4. **Internal links** — 1-2 existing blog posts or service pages worth linking to/from (checked against the archive, not invented)
5. **CTA** — light-touch only, per the offers-and-funnels.md audience-alignment table (no free offer currently exists — don't link to the retired Core Business Assessment)

#### For All Channels

- Reference recent context so packaging doesn't repeat a recent angle
- Consider cross-pollination with the HubSpot "What I'm Watching" thread per strategy.md's coordination note, and flag it if relevant

**STOP. Present packaging options. Ask: "Which direction feels strongest? Any adjustments?"**

### Stage 3: STORE & FINALIZE

After the user confirms:

1. **Assign priority score (1-10)** using the Success Signals defined in `content/strategy.md`:
   - Strategic value (serves retainer/mastermind growth goals?)
   - Timeliness / demand signal (from context window, or a real Search Console keyword opportunity for blog pieces)
   - Production effort (format complexity, prep required)
   - Gap (not already covered recently, per the archive check)

2. **Write to database:**
   ```bash
   source .venv/bin/activate && python3 -c "
   import sys, json; sys.path.insert(0, '.')
   from scripts.content_pipeline.db import get_connection
   from scripts.content_pipeline.writer import write_developed_idea

   idea = {
       'id': EXISTING_ID_OR_NONE,
       'title': 'Selected primary title',
       'hook': 'Opening hook strategy',
       'description': 'Full concept description',
       'audience': 'Target audience description',
       'format_type': 'FORMAT',
       'channel': 'CHANNEL',
       'topics': 'comma,separated,topics',
       'source_type': 'develop',
       'title_options': json.dumps([
           {'text': 'Title/Hook A'},
           {'text': 'Title/Hook B'},
       ]),
       'funnel_position': 'awareness',
       'content_pillar': 'PILLAR',
       'audience_segment': 'SEGMENT',
       'offer_alignment': 'OFFER',
       'cta_path': 'CTA description',
       'proof_points': json.dumps([
           {'type': 'performance', 'text': 'Specific proof point'},
       ]),
       'authority_angle': 'Why Jackie owns this topic',
       'production_status': 'developed',
       'priority_score': 8,
       'research_json': json.dumps({'context_window': '7d'}),
       'developed_by': 'develop',
   }

   conn = get_connection()
   idea_id = write_developed_idea(conn, idea)
   conn.close()
   print(f'Saved as concept #{idea_id}')
   "
   ```

3. **Write concept doc:**
   Save the full concept to `content/concepts/{id}-{slug}.md` with all positioning, packaging, and strategy details.

4. **Regenerate pipeline:**
   ```bash
   source .venv/bin/activate && python3 scripts/content_pipeline/generate_pipeline.py
   ```

5. **Report:**
   - Saved as concept #ID
   - Concept doc written to `content/concepts/`
   - Primary title/hook + channel + format
   - Priority score
   - "Ready for scheduling. Run /schedule when you want to plan your content calendar."

### Critical Rules

- **Interactive** — Present strategic positioning, wait for confirmation. Present packaging, wait for confirmation. Never blast through all stages.
- **Context-first** — Always reference what the 7-day context window (and, for blog, the archive) tells you.
- **Channel-appropriate** — Don't suggest blog SEO packaging for a LinkedIn post or vice versa.
- **Voice compliance is non-negotiable for LinkedIn** — every draft gets the AI-tell + blunter/warmer scrub before being presented, per `context/brand-voice.md`.
- **CTA discipline** — LinkedIn/retainer content can carry a direct CTA; blog stays CTA-light per the audience-alignment table in offers-and-funnels.md.

$ARGUMENTS
