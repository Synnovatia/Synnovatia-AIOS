# InfraOS

> Track every change, document every system, never lose work.

| Field | Value |
|-------|-------|
| Module | `infra-os` |
| Version | v1 |
| Phase | 1 - Foundation |
| Requires | ContextOS |
| Setup Time | 20-30 minutes |
| Running Cost | Free |

## What This Does

- **Git version control** — Every change to your workspace is tracked with save points you can browse, search, and undo
- **GitHub cloud backup** — Your workspace is backed up online. Laptop dies? Download and keep going.
- **Automatic documentation** — When you build systems, Claude creates and updates technical docs. Future sessions know how everything works.
- **Living changelog** — HISTORY.md records what was built every session. Your workspace has a memory.
- **Security hygiene** — `.gitignore` and `.env` patterns prevent your secrets from leaking

## What You Need

- A computer (Mac, Linux, or Windows)
- Claude Code installed
- ContextOS installed (the workspace foundation)
- A GitHub account (free — we'll create one if you don't have it)

## How to Install

1. Open this workspace in Claude Code
2. Run `/install module-installs/infra-os`
3. Follow along — Claude handles everything

**Estimated setup time:** 20-30 minutes

## Running Cost

Free. Git and GitHub (private repos) cost nothing.

## What's Inside

| File | Purpose |
|------|---------|
| `INSTALL.md` | Installation guide (Claude reads this) |
| `commands/commit.md` | The /commit command |
| `templates/history.md` | HISTORY.md changelog template |
| `templates/docs-index.md` | docs/_index.md routing index template |
| `templates/doc-system-template.md` | Template for system documentation |
| `templates/doc-integration-template.md` | Template for integration documentation |
| `templates/gitignore` | .gitignore security defaults |
| `templates/env-example` | .env.example pattern template |

---

> Part of the **Evolv AI EVOLV-OS Program** — helping businesses recover time and increase profitability through AI automation. [evolv.one](https://evolv.one)
