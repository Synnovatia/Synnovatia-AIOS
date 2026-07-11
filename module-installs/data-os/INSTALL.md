# DataOS — EVOLV-OS Module Installer

> Part of the Evolv AI EVOLV-OS Program.

<!-- MODULE METADATA
module: data-os
version: v1
status: RELEASED
released: 2026-02-27
requires: [context-os]
phase: 1
category: Core OS
complexity: complex
api_keys: 1-7 (depends on your sources)
setup_time: 30-60 minutes
-->

---

## FOR CLAUDE

You are helping a user install DataOS — their business data warehouse in **Claude Cowork**. Follow these rules.

**This is a GUIDED WORKSHOP, not just an install.** You are walking the user through a discovery process where you learn about their business, map their data sources, and build a CUSTOM data pipeline tailored to their exact setup.

**COWORK ENVIRONMENT — No terminal, no Python scripts.** DataOS in Cowork uses a simplified approach:
- Phase 1 (Discovery) is unchanged — pure conversation.
- Phase 2 (Foundation) is replaced with a Google Sheets or Notion-based data log instead of SQLite.
- Data collection uses Cowork connectors (Notion, Google Drive) and Claude-on-demand fetching rather than automated Python scripts.
- For scheduling: use Cowork's built-in scheduled task feature to have Claude check in on key metrics weekly.

**Key-metrics.md approach for Cowork:** Instead of auto-generating from a database, Claude maintains `context/current-data.md` by reading the user's connected data sources (Google Sheets, Notion, etc.) on demand. When the user says "update my metrics", Claude reads the connected sources and rewrites the file.

**Behavior:**
- Assume the user is non-technical unless they tell you otherwise
- Explain what you are doing at each step in plain English BEFORE doing it
- Celebrate small wins ("API key verified — nice, that's the hardest part done!")
- If something fails, do not dump error logs — explain the problem simply and suggest the fix
- Never skip verification steps — if a check fails, stop and help the user fix it

**Pacing:**
- After the discovery workshop: "Great, we've mapped your data landscape. Ready to start building?"
- After the foundation is built: "Pipeline framework is live — the hard part is done. Now we connect your actual data."
- After each collector: "That source is connected! Let me show you what's in the database now."

**Discovery Workshop (Phase 1):**
- Start by reading the user's context files to understand their business
- Based on what you learn, SUGGEST data sources — do not wait for the user to name them
- Present the plan before building — get a "yes" before you start writing files

**Custom Collector Building:**
- Example collectors are in `scripts/examples/`. Read them as PATTERNS, not copy-paste targets.
- Every collector must handle missing credentials gracefully (return status="skipped") and never break the pipeline

---

## OVERVIEW

Your business data is scattered across a dozen platforms — Stripe for revenue, YouTube for content metrics, Google Analytics for traffic, spreadsheets for P&L. Every time you want to know how things are going, you log into five different dashboards and piece the picture together manually.

DataOS fixes that. It pipes all of your data into one local SQLite database on your machine. A collection script runs every morning, pulls fresh numbers from all your connected sources, and writes them as daily snapshots. Over time, you build a dataset that shows exactly how your business is trending.

The real magic: your AI reads this data. Every time you initialize a session, it loads a freshly generated `key-metrics.md` file with your latest numbers. Your AI knows your revenue, your traffic, your subscriber growth — before you even ask.

**What you'll have when this is done:**
- A local SQLite database collecting daily snapshots of your business metrics
- Automated collectors for each of your data sources
- A `key-metrics.md` file that refreshes with every collection, loaded each session
- A daily cron job that runs everything automatically

**Setup time:** 30-60 minutes (depends on how many data sources you connect)
**Running cost:** Free. All APIs used have free tiers sufficient for daily collection.

---

## PHASE 1: DISCOVERY WORKSHOP

### Step 1: Understand the Business

Read the user's context files:
- `context/business-info.md` — what the business does
- `context/strategy.md` — current priorities and goals

If these don't exist, ask:
1. What does your business do?
2. How do customers find you?
3. What tools and platforms do you use day to day?
4. Where does your revenue come from?

### Step 2: Map the Funnel

Walk through their business funnel stage by stage. For each stage, identify WHERE that data currently lives:

**Top of Funnel:** Content (YouTube, TikTok, blog) | Ads (Google, Meta) | Outreach
**Middle of Funnel:** Website visits (Google Analytics) | Community | Lead magnets | Link clicks (Bitly)
**Bottom of Funnel:** Bookings (Calendly) | Applications | Proposals
**Revenue:** Payment processing (Stripe, PayPal) | P&L spreadsheet

### Step 3: Identify Data Sources

Present a suggested list of data sources based on what you learned. Example output:

```
Based on your business, here are the data sources I'd recommend connecting:

CONTENT & TRAFFIC
[ ] YouTube — channel stats, video performance (free API key)
[ ] Google Analytics — website traffic and sources (service account)

REVENUE
[ ] Stripe — revenue, subscriptions, MRR (free API key)
[ ] P&L Spreadsheet — monthly financials (service account)

MARKETING
[ ] Bitly — link click tracking (free API key)

That's 5 sources. Total setup time: ~40 minutes.
```

Ask: **"Did I miss anything? Any other tools where your business data lives?"**

### Step 4: Plan the Connections

For each selected source, explain what authentication is needed and the estimated setup time. Present total estimated setup time and get approval before building.

[VERIFY] User has confirmed which data sources to connect and is ready to proceed.

---

## PHASE 2: FOUNDATION (Cowork)

No Python or terminal setup required. Instead, we set up a **metrics tracking file** that Claude maintains, and connect your data sources through Cowork's connectors and on-demand fetching.

### Step 1: Create the data folder structure

Create these folders in the workspace root if they don't exist:
- `data/` — for metric snapshots and logs
- `context/group/` — for multi-business context (if applicable)

[VERIFY] Both folders exist.

### Step 2: Create the key metrics file

Create `data/key-metrics.md` with a template based on what you learned in Phase 1. Include sections for each data source the user identified.

Example structure:
```markdown
# Key Metrics — [Business Name]
Last updated: [date]

## Revenue
- MRR: [value]
- Total customers: [value]

## Traffic
- Monthly website visits: [value]

## [Other area]: ...
```

Ask the user to fill in their current numbers as a baseline. These will be updated over time.

[VERIFY] File exists with at least a baseline snapshot of current numbers.

### Step 3: Connect to data sources via Cowork connectors

For each data source identified in Phase 1, follow the appropriate path:

**Google Sheets (P&L, CRM, trackers):**
Cowork has native Google Drive/Sheets access. Ask the user to share their relevant sheets with Claude's working folder or use the Google Drive connector in Cowork settings.

**Notion:**
Cowork has a native Notion connector. Guide the user to connect it in Cowork's connector settings, then Claude can read their Notion dashboards directly.

**Stripe, YouTube, Google Analytics, other APIs:**
These don't have native Cowork connectors. Options:
- Ask the user to paste their latest numbers during sessions ("update my metrics with these numbers")
- Set up a Cowork **scheduled task** to prompt the user weekly for updated figures
- Advanced: use Cowork's computer use to navigate to the dashboard in the browser and read the numbers

### Step 4: Set up the "update my metrics" workflow

Add to `CLAUDE.md` under "How to Use This Workspace":

```markdown
### Updating your metrics

Say: **"Update my metrics"**

Claude will:
1. Ask for (or fetch from connected sources) your latest key numbers
2. Rewrite `data/key-metrics.md` with the fresh snapshot
3. Update `context/current-data.md` with the same numbers
```

[VERIFY] Say "Update my metrics" — Claude should read `data/key-metrics.md`, ask for the latest figures (or fetch from connectors), and update the file.

### Step 5: (Optional) Set up a Cowork scheduled task

If the user wants automatic weekly metric reminders:

"I can set up a Cowork scheduled task that reminds you every Monday morning to update your metrics. Want me to set that up?"

If yes: guide them through creating a Cowork scheduled task with the prompt:
> "It's Monday — time to update my EVOLV-OS metrics. Please read my key metrics file and walk me through updating each number."

**Milestone:** "Your DataOS is live in Cowork mode. Claude now knows your key numbers and can update them on demand or on a schedule. The more you keep this current, the more useful your AI becomes."

---

## PHASE 3: CONNECT DATA SOURCES

> Only follow the sections below that match what the user selected in Phase 1.
> Skip everything else. Each section is independent — do them in any order.
> After each source is connected, run a collection test before moving to the next.

### Create the .env File

```bash
cp scripts/.env.example .env 2>/dev/null || touch .env
```

---

### SOURCE: YouTube

**What you'll get:** Daily channel snapshots (subscribers, total views) plus video performance for the last 30 days.

**What you need:** A YouTube API key (free, 3 minutes to set up) + your YouTube Channel ID

**Extra packages:** `.venv/bin/pip install google-api-python-client google-auth`

**Get Your YouTube API Key:**
1. Go to https://console.cloud.google.com/apis/credentials
2. Create Project if needed, then "+ CREATE CREDENTIALS" → API key
3. Enable YouTube Data API at https://console.cloud.google.com/apis/library/youtube.googleapis.com

**Get Your Channel ID:**
1. Go to youtube.com, sign in, click your profile → "View your channel"
2. If URL shows @handle, go to youtube.com/account_advanced to find Channel ID (starts with `UC`)

Save to `.env`:
```
YOUTUBE_API_KEY=your_key_here
YOUTUBE_CHANNEL_ID=UCxxxxxxx
```

Install: Copy `scripts/examples/youtube.py` to `scripts/collect_youtube.py`

[VERIFY] `python scripts/collect.py --sources youtube`

---

### SOURCE: Stripe

**What you'll get:** Daily snapshots of MRR, active subscriptions, new/canceled subs, churn rate, and month-to-date revenue.

**What you need:** A Stripe API key (restricted, read-only)

**Get Your Stripe API Key:**
1. Go to https://dashboard.stripe.com/apikeys
2. Create a **restricted key** with all permissions set to **Read**
3. Name it "DataOS Read Only"

Save to `.env`:
```
STRIPE_API_KEY_MAIN=rk_live_your_key_here
```

**Multiple Stripe accounts:** Add each on a separate line: `STRIPE_API_KEY_AGENCY=...`, `STRIPE_API_KEY_SAAS=...`

Install: Copy `scripts/examples/stripe.py` to `scripts/collect_stripe.py`

[VERIFY] `python scripts/collect.py --sources stripe`

---

### SOURCE: Google Service Account (shared setup for GA4 + Sheets)

> Only needed if connecting Google Analytics or Google Sheets. Do this once — works for both.

1. Go to https://console.cloud.google.com → IAM & Admin → Service Accounts
2. Click "+ CREATE SERVICE ACCOUNT", name it `dataos-reader`
3. Go to Keys tab → Add Key → Create new key → JSON
4. Download the JSON file

```bash
copy %USERPROFILE%\Downloads\your-project-*.json credentials\google-service-account.json
```

Add to `.env`:
```
GOOGLE_SERVICE_ACCOUNT_JSON=./credentials/google-service-account.json
```

Enable APIs at Google Cloud Console:
- Sheets: https://console.cloud.google.com/apis/library/sheets.googleapis.com
- Analytics: https://console.cloud.google.com/apis/library/analyticsdata.googleapis.com

---

### SOURCE: Google Analytics (GA4)

**Requires:** Google Service Account (see above)

**Extra packages:** `.venv/bin/pip install google-analytics-data google-auth`

Get GA4 Property ID:
1. Go to https://analytics.google.com → Admin → Property Settings
2. Copy the Property ID (a number like `123456789`)

Save to `.env`: `GA4_PROPERTY_ID=your_property_id`

Grant access: In GA4 Admin → Property Access Management → Add service account email as Viewer

Install: Copy `scripts/examples/google_analytics.py` to `scripts/collect_google_analytics.py`

[VERIFY] `python scripts/collect.py --sources google_analytics`

---

### SOURCE: Google Sheets

**Requires:** Google Service Account (see above)

Get Sheet ID from URL: `https://docs.google.com/spreadsheets/d/SHEET_ID_HERE/edit`

Share the sheet with your service account email (Viewer permission)

Save to `.env`:
```
GOOGLE_SHEET_ID=your_sheet_id
GOOGLE_SHEET_TAB=Sheet1
```

Install: Copy `scripts/examples/google_sheets.py` to `scripts/collect_sheets.py` (or a custom name like `collect_pnl.py`)

---

### SOURCE: Bitly

**Extra packages:** None (uses requests, already installed)

Get Bitly token at https://app.bitly.com/settings/api/ → Generate token

Save to `.env`: `BITLY_ACCESS_TOKEN=your_token`

Install: Copy `scripts/examples/bitly.py` to `scripts/collect_bitly.py`

---

### SOURCE: Custom (Any Other API)

For any platform not listed above (Calendly, HubSpot, Notion, Airtable, Shopify, etc.):

1. Ask what platform/tool it is
2. Search the web for their API documentation
3. Build a custom collector following the pattern in `scripts/examples/`
4. Every collector follows: `collect() -> dict`, `write(conn, result, date) -> int`

---

## PHASE 4: KEY METRICS GENERATOR

After all collectors are connected, open `scripts/generate_metrics.py` and add a section function for each connected source in the CUSTOMIZATION ZONE (follow the existing `section_fx_rates` as a pattern).

Register each new section function in the `SECTIONS` list.

Run: `python scripts/generate_metrics.py`

[VERIFY] Read the generated `context/group/key-metrics.md` and confirm it has sections for each connected source.

---

### Wire Into Session Initialization and CLAUDE.md

**Update CLAUDE.md** to:
1. Mention that `context/group/key-metrics.md` should be read each session
2. Add `reference/data-access.md` as an on-demand doc
3. Note that Claude can run live SQL queries against `data/data.db` when asked about metrics

**Update CLAUDE.md** to mention the `data/` directory, DataOS scripts, and that Claude can query the database directly.

---

## PHASE 5: AUTOMATE

### macOS (launchd)

Copy `config/com.EVOLV-OS.data-collect.plist` to `~/Library/LaunchAgents/`, fill in the actual workspace path, then:

```bash
launchctl load ~/Library/LaunchAgents/com.EVOLV-OS.data-collect.plist
launchctl start com.EVOLV-OS.data-collect
```

### Linux (cron)

```bash
crontab -e
# Add:
0 6 * * * cd /path/to/workspace && .venv/bin/python scripts/collect.py >> data/collect.log 2>&1
```

### Windows (Task Scheduler)

Set up a scheduled task to run `.venv\Scripts\python.exe scripts\collect.py` daily at 6:00 AM from the workspace directory.

---

## PHASE 6: FULL PIPELINE TEST

```bash
python scripts/collect.py
python scripts/generate_metrics.py
```

[VERIFY] All connected sources show "OK". Final `key-metrics.md` shows current numbers for each source.

---

## WHAT'S NEXT

1. **Let it collect for a week.** After 7 days you'll see meaningful trends. After 30 days, month-over-month comparisons become useful.
2. **Add more collectors.** Just create a new `collect_*.py` file — the orchestrator auto-discovers it.
3. **Ask your AI about the data.** With your key metrics loaded each session, try: "How's revenue trending this month?" or "Which YouTube videos performed best last week?"
4. **Install IntelOS** — Meeting + Slack intelligence (pairs perfectly with DataOS)

---

> Part of the **Evolv AI EVOLV-OS Program** — helping businesses recover time and increase profitability through AI automation. [evolv.one](https://evolv.one)
