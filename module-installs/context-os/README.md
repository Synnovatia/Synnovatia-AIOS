# ContextOS

> The foundation of your EVOLV-OS — make your AI understand your business from the very first session.

| Field | Value |
|-------|-------|
| Module | `context-os` |
| Version | v1 |
| Phase | 1 - Foundation |
| Requires | Nothing (install first) |
| Setup Time | 30-45 minutes |
| Running Cost | Free |

## What This Does

- **Guided context collection** — Claude interviews you about your business, role, strategy, and current state through your choice of chat, paste, or document import
- **4 structured context files** built from your raw input — business overview, personal role, strategy, and current data
- **Personalized CLAUDE.md** — your workspace master file updated to reflect your specific business
- **Multi-business support** — if you run multiple businesses, Claude restructures your context folder with subfolders per business
- **Session initialization** — verified end-to-end: start a session, say "Initialize my session", Claude knows everything

## What You Need

- A computer (Mac, Linux, or Windows)
- Claude Code installed and working
- This workspace unzipped and open in your IDE

## How to Install

1. Open this workspace in Claude Code
2. Run `/install module-installs/context-os`
3. Follow along — Claude runs an interactive interview to build your context

**Estimated setup time:** 30-45 minutes

## Running Cost

Free — no API keys, no external services, no recurring costs.

## What's Inside

| File | Purpose |
|------|---------|
| `INSTALL.md` | Guided interview + context builder (Claude reads this) |
| `README.md` | This file — human overview |

## Input Methods

You choose how to feed context to Claude:

| Method | Best For |
|--------|----------|
| **Import documents** | Drop files into `context/import/` — business plans, Notion exports, strategy docs, anything |
| **Chat interview** | Talk through your business conversationally — Claude asks questions, you answer |
| **Paste text** | Copy/paste from website, LinkedIn, strategy docs, memos |

Mix and match — use all three if you want.

## Pro Tip

Export your ChatGPT data (Settings → Data Controls → Export) and drop it into `context/import/`. Claude will learn a ton from your conversation history.

---

> Part of the **Evolv AI EVOLV-OS Program** — helping businesses recover time and increase profitability through AI automation. [evolv.one](https://evolv.one)
