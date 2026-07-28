# /schedule — Schedule Content

> Interactive scheduling session — pick developed ideas, assign dates, and optionally push to Notion.

## Variables

$ARGUMENTS (optional: "review" to review existing schedule instead of scheduling new content)

## Instructions

You are running a **Scheduling Session** for the Content Pipeline. Your job is to help the user pick which developed ideas to create next, assign dates, and manage their content calendar.

### Setup — Load Current State

1. **Read the user's strategy:**
   - `content/strategy.md` — cadence is LinkedIn 3x/week (Mon/Wed/Fri, drafted in the existing Monday 7am batch — this pipeline adds structured tracking on top of that, it doesn't replace it) and blog 1x/month via a separate monthly planning session

2. **Query the pipeline:**
   ```bash
   source .venv/bin/activate && python3 -c "
   import sys, sqlite3; sys.path.insert(0, '.')
   from scripts.content_pipeline.db import get_connection
   conn = get_connection()

   # Developed ideas ready to schedule
   developed = conn.execute(\"\"\"
       SELECT id, title, channel, format_type, priority_score,
              edit_turnaround_days, audience_segment, offer_alignment, created_at
       FROM content_ideas WHERE production_status = 'developed'
       ORDER BY COALESCE(priority_score, 0) DESC, created_at DESC
   \"\"\").fetchall()

   # Currently scheduled
   scheduled = conn.execute(\"\"\"
       SELECT id, title, channel, format_type, film_by_date,
              publish_date, production_status
       FROM content_ideas WHERE production_status IN ('scheduled', 'filmed', 'editing')
       ORDER BY publish_date ASC
   \"\"\").fetchall()

   print('=== DEVELOPED (ready to schedule) ===')
   for r in developed:
       p = f'P{r[\"priority_score\"]}' if r['priority_score'] else '—'
       print(f'  #{r[\"id\"]} [{r[\"channel\"] or \"?\"}] {r[\"title\"]} ({p})')

   print()
   print('=== CURRENTLY SCHEDULED ===')
   for r in scheduled:
       print(f'  #{r[\"id\"]} [{r[\"channel\"] or \"?\"}] {r[\"title\"]} — publish: {r[\"publish_date\"] or \"TBD\"} ({r[\"production_status\"]})')

   conn.close()
   "
   ```

3. **Read current offers/campaigns** (if the file exists):
   - `content/offers-and-funnels.md` — active campaigns to align with (currently: the "Different Is Better Than Better" rebrand rollout, and filling the Mastermind for the Messy Middle Q4 cohort)

### Stage 1: REVIEW CURRENT SCHEDULE

Present the current state:
- **Scheduled/In-progress items** with dates
- **Gaps** — days without content planned against the target cadence (LinkedIn 3x/week Mon/Wed/Fri; blog 1x/month)
- **Channel balance** — how the mix looks vs. target

Format as a compact table.

### Stage 2: PRESENT DEVELOPED IDEAS

Show developed ideas ranked by priority:

```
Ready to Schedule:
| # | ID | Title | Channel | Format | Priority | Edit Days |
|---|-----|-------|---------|--------|----------|-----------|
...
```

Suggest which ideas fit gaps in the current schedule and align with active campaigns (mastermind fill, rebrand rollout).

**Ask: "Which ideas do you want to schedule? Give me the IDs and target publish dates."**

**STOP. Wait for the user's picks.**

### Stage 3: CALCULATE DATES & CONFIRM

For each picked idea:
1. Calculate `film_by_date = publish_date - edit_turnaround_days`
2. Check for conflicts (two things on the same creation date)
3. Present the schedule:

```
Content Schedule:
| Create Date | Publish Date | Title | Channel | Format | Edit Days |
|-------------|-------------|-------|---------|--------|-----------|
...
```

**Ask: "Does this schedule work? Any date changes?"**

**STOP. Wait for confirmation.**

### Stage 4: UPDATE DB & OPTIONAL NOTION PUSH

After confirmation:

1. **Update content_ideas:**
   ```bash
   source .venv/bin/activate && python3 -c "
   import sys; sys.path.insert(0, '.')
   from scripts.content_pipeline.db import get_connection
   from scripts.content_pipeline.writer import update_status

   conn = get_connection()
   # Repeat for each scheduled idea:
   update_status(conn, IDEA_ID, 'scheduled',
       film_by_date='YYYY-MM-DD', publish_date='YYYY-MM-DD')
   conn.close()
   print('Schedule updated.')
   "
   ```

2. **Push to Notion** (only if Notion sync is configured — it is NOT set up by default for this workspace):
   Check if NOTION_API_TOKEN is set. If so, ask the user if they want to push to Notion.
   ```bash
   source .venv/bin/activate && python3 -c "
   import os; from dotenv import load_dotenv; load_dotenv()
   print('Notion configured:', bool(os.getenv('NOTION_API_TOKEN')))
   "
   ```
   If configured and user says yes:
   ```bash
   source .venv/bin/activate && python3 -c "
   import sys; sys.path.insert(0, '.')
   from scripts.content_pipeline.db import get_connection
   from scripts.content_pipeline.notion_sync import push_idea_to_notion

   conn = get_connection()
   for idea_id in [LIST_OF_IDS]:
       row = conn.execute('SELECT * FROM content_ideas WHERE id = ?', (idea_id,)).fetchone()
       idea = dict(row)
       page_id = push_idea_to_notion(idea)
       if page_id:
           conn.execute('UPDATE content_ideas SET notion_page_id = ? WHERE id = ?', (page_id, idea_id))
           conn.commit()
           print(f'  #{idea_id} → Notion: {page_id}')
   conn.close()
   "
   ```
   (`notion_sync.py` is not installed in this workspace yet — if the user wants Notion, install `module-installs/content-pipeline-v1/AIOS Content Pipeline/scripts/notion_sync.py` to `scripts/content_pipeline/notion_sync.py` first, following the Notion setup steps in the module's INSTALL.md.)

3. **Regenerate pipeline:**
   ```bash
   source .venv/bin/activate && python3 scripts/content_pipeline/generate_pipeline.py
   ```

4. **Report:**
   - Summary: X ideas scheduled
   - Next creation date and what to create
   - If Notion: "Check your Notion Content Pipeline for the full calendar."

### Review Mode

If `$ARGUMENTS` = "review":
- Show all scheduled/in-progress items
- Flag overdue items (film_by_date < today, still "scheduled")
- Allow status updates (mark as filmed, move to editing, mark published)
- Sync any status changes to Notion if configured

### Critical Rules

- **Interactive** — always confirm before updating dates or pushing to Notion
- **Conflict detection** — flag if two items have the same creation date
- **Format-aware scheduling** — blog articles need more lead time than a LinkedIn post
- **Never auto-schedule** — the user picks what to schedule and when; LinkedIn posts still go live only via Jackie's own LinkedIn scheduling, never auto-posted
- **Flexible workflow** — adapt to the cadence in strategy.md, not a generic default

$ARGUMENTS
