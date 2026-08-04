# Flow Mode 🌊

**Fewer permission prompts. Longer, uninterrupted Claude Code sessions.**

If you're constantly clicking **Allow** / **Always Allow**, this is the fix. Flow Mode installs a vetted allowlist of the safe, everyday commands your AIOS runs all the time — so Claude stops asking about the routine stuff and just works. The genuinely risky commands (deleting files, pushing to git, changing system services, anything that spends money) still ask first, on purpose.

It's a smarter default, not an "off switch." That's why it's safe to share.

---

## Install (takes 30 seconds)

1. **Unzip** this `flow-mode` folder into your AIOS skills directory:
   - Per-workspace: `<your-aios>/.claude/skills/flow-mode/`
   - Or all workspaces: `~/.claude/skills/flow-mode/`
2. **Open Claude Code** in your AIOS workspace.
3. **Say:** `install flow mode` (or `/flow-mode`).
4. Claude asks which level you want — pick **Standard** if unsure — and installs it.
5. **Start a new session** so the settings load.

Done. Your next sessions run with far fewer interruptions.

---

## The three levels

| Level | What happens | For who |
|-------|--------------|---------|
| **Standard** ⭐ | Safe everyday commands auto-approved. Risky ones still prompt. | Everyone. Safe for client workspaces. |
| **Standard + Auto-edits** | Above, plus file edits apply without a prompt. | Power users who trust Claude to edit freely. |
| **Full bypass** | No prompts at all. **Not recommended.** | Sandboxed/throwaway machines only. |

---

## What stays protected (always prompts under Standard)

`rm` · `git push` · `git reset --hard` · loading/unloading system services · POST requests · copying into system folders · sending email · any financial action.

These checkpoints are worth keeping — leave them on.

---

## How it works (for the curious)

Claude Code reads permission rules from `.claude/settings.json`. Every time you click "Always Allow," it writes one *exact-match* rule — so the next slightly-different command asks again. Flow Mode instead installs *pattern* rules (e.g. "any `git status` command") that cover whole categories of safe work at once. It **merges** into your existing settings — it never deletes rules you already had.

To undo it, open `.claude/settings.json` and remove the entries. Your own prior rules are untouched.

---

*Part of the AIOS toolkit — [aaaaccelerator.com](https://aaaaccelerator.com)*
