# IntelOS — EVOLV-OS Module Installer

> Part of the Evolv AI EVOLV-OS Program.

<!-- MODULE METADATA
module: intel-os
version: v1
status: RELEASED
released: 2026-02-26
requires: [context-os, data-os]
phase: 2
category: Core OS
complexity: medium
api_keys: 1-3
setup_time: 20-30 minutes
-->

---

## FOR CLAUDE

You are helping a user install IntelOS — the intelligence collection layer for their EVOLV-OS in **Claude Cowork**. This is a Cowork environment — never ask the user to open a terminal, install Python packages, or run scripts.

**COWORK APPROACH — No scripts, no bots, use native connectors:**
- **Slack:** Cowork has a built-in Slack connector. Guide the user to enable it in Cowork Settings → Connectors → Slack. No bot token, no API setup. Once connected, Claude can search Slack directly.
- **Meetings (Fireflies/Fathom):** Two paths — (A) user pastes meeting transcripts/summaries into the conversation for Claude to analyze and save, or (B) Claude uses Cowork computer use to navigate to the meeting recorder in the browser. Start with path A (simpler), offer B if they want automation.
- **No SQLite database:** Instead of a local database, Claude reads Slack via the connector on demand and stores meeting summaries in `data/meeting-summaries/` as markdown files.
- **Scheduling:** Use Cowork scheduled tasks for recurring intelligence checks (e.g., weekly Slack digest).

**Behavior:**
- Assume the user is non-technical unless they tell you otherwise
- Explain what you are doing at each step in plain English BEFORE doing it
- Celebrate small wins ("Slack is connected — your AI can now search your team conversations!")
- If something fails, do not dump error logs — explain the problem simply and suggest the fix
- Never skip verification steps

**Error handling:**
- If Python version is too old → provide exact upgrade instructions for their OS
- If an API key is invalid → walk them through getting a new one step by step
- If pip install fails → try: (1) upgrade pip, (2) install build tools, (3) specific fix
- Never say "check the logs" — find the problem and explain it

**Custom meeting recorder path:**
If the user doesn't use Fireflies or Fathom, help them build a custom collector:
1. Ask what meeting recorder they use
2. Search the web for that platform's API documentation
3. Assess feasibility honestly and either build a custom collector or recommend Fireflies/Fathom

---

## OVERVIEW

Read this to the user before starting:

We're about to set up **IntelOS** — the intelligence collection layer for your AI Operating System. This gives your AI a perfect memory of every meeting and team conversation.

Here's what you'll have when we're done:

- **Every meeting recording** automatically pulled into a searchable database (Fireflies, Fathom, or custom)
- **Every Slack message** collected daily — searchable by channel, person, keyword, date
- **Meeting classification** by department/team — if you have different teams, meetings get tagged automatically
- **Instant search** — ask your AI "find that meeting with Jimmy last week" or "has anyone mentioned the rebrand in Slack?"
- **Automatic collection** running on a schedule

**Setup time:** 20-30 minutes
**Running cost:** Free if using Fireflies/Fathom free tiers. Slack API is free.

---

## SCOPING

### Question 1: Meeting Recorder

"What do you use to record your meetings?"

- **A) Fireflies.ai** — Claude can access via computer use (browser) or you paste summaries in
- **B) Fathom** — Same as above
- **C) Something else** — We'll work with what you have; paste summaries directly
- **D) I don't record meetings yet** — Recommend [Fireflies](https://fireflies.ai) (free tier) or [Fathom](https://fathom.ai) (generous free plan). Set it up, record a few meetings, then come back.

Record: `MEETING_PLATFORM = fireflies | fathom | other | none`

### Question 2: Slack

"Do you use Slack for team communication?"

- **A) Yes** — Great — Cowork has a built-in Slack connector, no bot setup needed. 2 minutes to connect.
- **B) No** — Skip Slack. You can always add it later.

Record: `SLACK_ENABLED = true | false`

### Question 3: Team Classification

"Do you have different departments or teams in your business?"

- **A) Yes, I have departments** — "List them out and I'll tag meeting summaries accordingly."
- **B) No, it's just me / small team** — "Keep it simple — all meetings go into one bucket."

Record: `DEPARTMENTS = [list] | none`

After scoping, summarize the plan and get confirmation before proceeding.

---

## PREREQUISITES

No Python or terminal setup needed. Verify:
- This workspace exists (`CLAUDE.md` is present)
- User has a Claude Cowork subscription (Pro or Max)

[VERIFY] Read `CLAUDE.md` — it should exist and have business context filled in.

---

## INSTALL

### Step 1: Connect Slack [if SLACK_ENABLED = true]

"Cowork has Slack built in — no bot token or API setup needed. Let's connect it."

Guide the user:
1. Open Claude desktop app → Cowork
2. Go to **Settings → Connectors**
3. Find **Slack** → click **Connect** → sign in and authorize
4. Select the Slack workspace

[VERIFY] Ask Claude to "Check what Slack channels you can see" — it should list accessible channels.

"Slack is connected. Your AI can now search your team conversations."

---

### Step 2: Set up meeting intelligence [if MEETING_PLATFORM ≠ none]

**Path A — Paste summaries (simpler, works for everyone):**

Create `data/meeting-summaries/` folder. When the user has a meeting they want Claude to remember:
> "Here's the summary from my meeting with [name] on [date]: [paste]"

Claude saves it as `data/meeting-summaries/YYYY-MM-DD-name.md` with structured tags (participants, topics, decisions, action items).

**Path B — Computer use (Fireflies/Fathom users who want automation):**

Guide the user to enable computer use in Cowork settings. Then set up a scheduled task:
> "Every Monday morning, go to [fireflies.ai / fathom.ai] in Chrome, find meetings from the past week, and save summaries to data/meeting-summaries/"

---

### Step 3: Create the meeting summaries folder and template

Create `data/meeting-summaries/` in the workspace root.

Create `data/meeting-summaries/README.md` with:
```markdown
# Meeting Summaries

One file per meeting. File format: YYYY-MM-DD-description.md

Each file should contain:
- Date, participants, platform
- Key topics discussed
- Decisions made
- Action items (who does what by when)
- Open questions

To add a meeting: paste the summary to Claude and say "save this meeting summary".
```

---

### Step 4: (Optional) Weekly Slack digest scheduled task

"Want a weekly Slack digest? I can set up a Cowork scheduled task that reads your Slack channels every Monday and gives you a summary of what happened."

If yes: guide through creating a Cowork scheduled task with:
> "Read my connected Slack channels and give me a digest of the most important conversations from the past week. Save the digest to data/slack-digests/YYYY-MM-DD.md"

---

## HOW TO USE IT

Now that IntelOS is running, here's what you can ask:

- "Find that meeting I had with [name] last week" → Claude searches `data/meeting-summaries/`
- "What did we decide about [topic]?" → Claude reads all meeting files
- "What's happening in Slack this week?" → Claude reads via Slack connector
- "Save this meeting summary: [paste]" → Claude structures and saves it
- "Has anyone mentioned [topic] in Slack?" → Claude searches connected channels
print(f'Slack connected — workspace: {data.get(\"team\")}' if data.get('ok') else f'ERROR: {data.get(\"error\")}')
## WHAT'S NEXT

1. **Add more Slack channels** — In Cowork connector settings, expand which Slack channels Claude can access.
2. **Build the meeting habit** — After every important meeting, say "save this meeting summary" and paste the notes. It compounds fast.
3. **Task Audit** — Your Evolv AI consultant will guide you through a task audit to identify which recurring tasks can be automated. This is the next step after IntelOS.

---

> Part of the **Evolv AI EVOLV-OS Program** — helping businesses recover time and increase profitability through AI automation. [evolv.one](https://evolv.one)
