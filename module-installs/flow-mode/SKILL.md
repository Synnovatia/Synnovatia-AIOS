---
name: flow-mode
description: Reduce Claude Code permission prompts in an AIOS workspace for longer, uninterrupted sessions. Use when the user says "fewer allows", "stop asking permission", "uninterrupted session", "flow mode", "install the permission pack", or is tired of clicking Allow / Always Allow. Installs a vetted permission allowlist into .claude/settings.json — safe everyday commands stop prompting, genuinely destructive ones stay gated.
---

# Flow Mode — Fewer Permission Prompts

## What this does

Claude Code asks for permission before running commands. Every "Always Allow" click writes one narrow, exact-match rule to a settings file — so the *next* slightly-different command prompts again. That's why the clicking never ends.

This skill fixes it by installing a **curated allowlist of safe, everyday AIOS commands** into the workspace's `.claude/settings.json`. Reads, searches, git status/diff/commit, running project scripts, database queries — the stuff you approve constantly — stop interrupting. Anything genuinely destructive or outward-facing (deleting files, `git push`, changing system services, sending money) still asks first.

**This is not a "disable all permissions" button.** It's a smarter default. That distinction is the whole point — it's safe to share with clients.

## How to install it (follow these steps)

### Step 1 — Confirm the target workspace

Confirm you're in an AIOS workspace: there should be a `.claude/` directory and a `CLAUDE.md` at the root. If not, tell the user this skill is meant to run from the root of an AIOS workspace and stop.

### Step 2 — Ask which level they want

Present these three levels and let them pick (default to **Standard** if they don't care):

| Level | Effect | Best for |
|-------|--------|----------|
| **1. Standard** (recommended) | Safe everyday commands auto-approved. Destructive/outward-facing commands still prompt. | Everyone, including client workspaces. |
| **2. Standard + Auto-edits** | All of Standard, plus file edits apply without a prompt (adds `"defaultMode": "acceptEdits"`). | Power users who trust Claude to edit files freely. |
| **3. Full bypass** | No prompts at all. NOT recommended, never for clients. | Only a throwaway/sandboxed machine. Warn clearly before doing this. |

If they pick 3, warn them plainly: a malicious instruction hidden in a webpage, email, or document could then be executed with zero checkpoint. Recommend Level 1 instead. Only proceed if they still insist.

### Step 3 — Read the curated allowlist

Read the file `allowlist.standard.json` that ships alongside this skill (same folder). It contains the vetted `permissions.allow` array.

### Step 4 — Merge into .claude/settings.json (do NOT overwrite)

- Read the existing `.claude/settings.json` at the workspace root. If it doesn't exist, start from `{}`.
- **Merge**, don't replace: take the union of the existing `permissions.allow` array and the curated list. De-duplicate. Preserve every other key already in the file.
- If the user picked **Level 2**, also set `"defaultMode": "acceptEdits"` at the top level of the permissions object (`permissions.defaultMode`).
- If the user picked **Level 3**, set `"defaultMode": "bypassPermissions"` instead — only after the warning above.
- Write the merged result back to `.claude/settings.json` (the committed, shareable file — so it travels with the workspace). Preserve pretty-printing (2-space indent).

### Step 5 — Confirm

Tell the user, in plain English:
- Which level was installed.
- That the change is in `.claude/settings.json` and travels with the workspace when shared.
- That **the new rules take effect in the next session** (Claude Code loads settings at session start — the current session may need a restart to pick them up).
- A one-line reminder that destructive commands still prompt (unless they chose Level 3).

## What stays gated on purpose (never auto-allowed by Standard)

Do not add these to the allowlist under any level except an explicit Level 3 bypass:
`rm`, `rmdir`, `git push`, `git reset --hard`, `launchctl load/unload`, `curl`/`wget` POSTs, `cp`/`mv` into system directories, anything writing to `~/Library` or `/etc`, sending email, or any financial action. These are the checkpoints worth keeping.

## Uninstalling

To revert: open `.claude/settings.json` and remove the entries that came from `allowlist.standard.json` (and remove `permissions.defaultMode` if it was added). The user's own prior rules are untouched because Step 4 only ever added to them.
