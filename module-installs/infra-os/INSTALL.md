# InfraOS — EVOLV-OS Module Installer

> Part of the Evolv AI EVOLV-OS Program.

<!-- MODULE METADATA
module: infra-os
version: v1
status: RELEASED
released: 2026-02-27
requires: [context-os]
phase: 1
category: Core OS
complexity: simple-medium
api_keys: 0
setup_time: 20-30 minutes
-->

---

## FOR CLAUDE

You are helping a user set up InfraOS — the version control, documentation, and security layer for their EVOLV-OS workspace. This is a **Claude Cowork environment** — never ask the user to open a terminal or run commands. Git is managed through **GitHub Desktop** (a visual app, no terminal needed).

**Behavior:**
- Assume the user has NEVER used Git, GitHub, or version control before
- Explain every concept in plain English BEFORE doing anything technical
- Use analogies — "save points in a video game," "Google Drive for your code," "a logbook"
- Celebrate small wins ("First commit done — your workspace is now being tracked!")
- Never skip verification steps — if a check fails, stop and help the user fix it
- Use encouraging language throughout — they are building something real

**Pacing:**
- Do NOT rush. This module is heavy on teaching. Pause after each concept.
- After GitHub Desktop install: "GitHub Desktop is ready. Let me explain what it actually does before we use it."
- After first commit: "That's your first commit! Everything in your workspace is now tracked."
- After first push: "It's backed up to GitHub. If your laptop dies tomorrow, your work is safe."
- After docs system: "Your workspace now documents itself. Let's test it."

**About the /commit command:**
This module normally installs a `/commit` slash command for Claude Code users. In Cowork, the equivalent is saying **"save my work"** — Claude will update HISTORY.md and docs, then guide the user to commit through GitHub Desktop. Save this in the user's CLAUDE.md.

---

## OVERVIEW

Read this to the user before starting:

We're about to set up **InfraOS** — the infrastructure layer for your AI Operating System. This gives your workspace version control, automatic documentation, and security practices.

Here's what you'll have when we're done:

- **GitHub backup** — Your entire workspace is backed up to the cloud through **GitHub Desktop** (a simple, visual app — no terminal needed). If your laptop dies, you download it and keep going.
- **"Save my work" workflow** — Say those words and Claude updates your changelog and documentation, then guides you to commit through GitHub Desktop.
- **A HISTORY.md changelog** — A living log of everything you've built. Every session, Claude adds what was done.
- **A docs/ system** — A self-documenting workspace. When you build systems, Claude creates and updates technical docs automatically.
- **Security hygiene** — A `.gitignore` that prevents secrets from leaking, and a `.env` pattern that keeps your API keys safe.

**Setup time:** 20-30 minutes
**Cost:** Free — no API keys, no external services
**Tool needed:** GitHub Desktop (free download — no terminal required)

---

## SCOPING

Before we start, two quick questions:

### Question 1: GitHub Account

"Do you already have a GitHub account?"

- **A) Yes** — Great, we'll skip account creation.
- **B) No** — No problem, we'll create one together at github.com. Takes 2 minutes.

Record: `HAS_GITHUB = true | false`

### Question 2: GitHub Desktop

"Do you have GitHub Desktop installed? It's a free app that lets you save your work without using a terminal."

- **A) Yes** — Great. We'll use it in a few steps.
- **B) No** — We'll install it together now.

Record: `HAS_GITHUB_DESKTOP = true | false`

---

## INSTALL

### Step 1: What is Git?

Before we touch anything, explain this:

"Think of Git like save points in a video game. Every time you do meaningful work, you create a save point called a **commit**. Each commit remembers exactly what changed and when.

If you make a mistake, you can go back to any previous save point. If you want to see what you did last Tuesday, you can look it up. Nothing is ever lost.

We'll use **GitHub Desktop** — a visual app — so you never need to touch a terminal."

---

### Step 2: Set up GitHub account (if needed)

**If HAS_GITHUB = false:**
Guide the user to github.com → Sign up. This takes 2 minutes in the browser.

**For everyone:**
Confirm they can log in to github.com.

---

### Step 3: Install GitHub Desktop (if needed)

**If HAS_GITHUB_DESKTOP = false:**

"Let's install GitHub Desktop — it's the visual interface for saving and backing up your workspace."

Guide the user to: https://desktop.github.com → Download → Install

Once installed: Sign in with their GitHub account.

[VERIFY] GitHub Desktop is open and signed in.

---

### Step 4: Create .gitignore — Protecting your secrets

Write the `.gitignore` file from `module-installs/infra-os/templates/gitignore` into the workspace root as `.gitignore`.

[VERIFY] The file exists at `.gitignore` in the workspace root.

"Now Git will automatically skip sensitive files. Your API keys and credentials are safe."

---

### Step 5: Create .env.example — The API key pattern

Write the `.env.example` file from `module-installs/infra-os/templates/env-example` into the workspace root.

If a `.env` file doesn't exist yet, create one as a copy of `.env.example`.

---

### Step 6: Set up recommended API keys

"While we're on the topic of API keys, let's get the main ones set up now."

Open the `.env` file and walk through each key:

#### Anthropic API Key

1. Go to https://console.anthropic.com/settings/keys
2. Sign in (or create an account)
3. Click **Create Key**, name it "EVOLV-OS Workspace"
4. Copy the key (starts with `sk-ant-`)

Add to `.env`:
```
ANTHROPIC_API_KEY=sk-ant-...
```

[VERIFY] Check that the key is saved in `.env`.

---

### Step 7: Create HISTORY.md

Write the `HISTORY.md` file from `module-installs/infra-os/templates/history.md` into the workspace root.

[VERIFY] The file exists and has the correct template structure.

---

### Step 8: Set up the docs/ system

Create the `docs/` folder in the workspace root, then write:
- `docs/_index.md` from `module-installs/infra-os/templates/docs-index.md`
- `docs/_templates/doc-system-template.md` from `module-installs/infra-os/templates/doc-system-template.md`
- `docs/_templates/doc-integration-template.md` from `module-installs/infra-os/templates/doc-integration-template.md`

[VERIFY] `docs/_index.md` exists and `docs/_templates/` has both template files.

---

### Step 9: Update CLAUDE.md — Add Cowork save workflow

Read the existing `CLAUDE.md`. Add this to the "How to Use This Workspace" section:

```markdown
### Saving your work

Say: **"Save my work"**

Claude will:
1. Update HISTORY.md with what was done this session
2. Check if any docs need updating
3. List the files that changed
4. Prompt you to open GitHub Desktop and commit

In GitHub Desktop: review the changed files, write a short description, click **Commit to main**, then **Push origin**.
```

Also update the "things you can say" table with:
| "Save my work" | Updates HISTORY.md and docs, then guides you to commit in GitHub Desktop |

---

### Step 10: What is GitHub? What is pushing?

"GitHub is like Google Drive for your code. It stores a copy of your workspace (and all your save points) online.

**Commit** = Save point on your machine (local).
**Push** = Upload your save points to GitHub (cloud).

Think of it like writing in a notebook vs photocopying the notebook and putting it in a safe."

---

### Step 11: Create the GitHub repository and add your workspace

1. Open **GitHub Desktop**
2. Click **File → Add Local Repository**
3. Navigate to your EVOLV-OS workspace folder and select it
4. GitHub Desktop may say "This directory does not appear to be a Git repository" → click **create a repository** → set Name, keep everything else default → **Create Repository**
5. In the bottom left, write a summary: "Initialize EVOLV-OS workspace with ContextOS and InfraOS"
6. Click **Commit to main**
7. Click **Publish repository** → set visibility to **Private** → **Publish Repository**

[VERIFY] Go to your GitHub profile → Repositories — your EVOLV-OS workspace should appear as a private repo.

"Your workspace is backed up. If your laptop dies tomorrow, everything is safe."

---

### Step 12: Update the session initialization behavior

Read the existing `CLAUDE.md` prime/initialization section. Add these two files to what Claude reads at session start:
- `HISTORY.md` — Workspace changelog (what was built, when)
- `docs/_index.md` — Documentation routing index (find relevant docs here)

---

## TEST

### Test 1: "Save my work"

Make a small change to HISTORY.md (add today's date and "InfraOS installed"). Then say "save my work".

Claude should:
1. Notice the change
2. Suggest any HISTORY.md or docs updates
3. List what changed
4. Prompt you to open GitHub Desktop and commit

Then in GitHub Desktop: commit the change and push. Go to GitHub — the new commit should appear.

### Test 2: Verify the docs system

Ask Claude: "Create a brief system doc for InfraOS." It should use `docs/_templates/doc-system-template.md` as the template and save to `docs/`.

---

## DAILY WORKFLOW

**Start of session:** Say "Initialize my session" — Claude reads HISTORY.md and docs/_index.md, knows what's been built.

**During work:** Build freely. Claude tracks what's happening.

**End of session:** Say "Save my work" — Claude updates docs and HISTORY.md, you commit and push in GitHub Desktop.

**Three steps: initialize to start, "save my work" to checkpoint, GitHub Desktop to back up.**

---

## WHAT'S NEXT

1. **DataOS** — Connect your business data sources into a local database. The natural next step.
2. **Keep building** — Every time you build something new, "save my work" tracks and documents it automatically.

---

> Part of the **Evolv AI EVOLV-OS Program** — helping businesses recover time and increase profitability through AI automation. [evolv.one](https://evolv.one)
