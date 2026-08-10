# Email Response System

> Inbox reply drafting + optional Claude-executed send, gated entirely on Jackie's explicit go-ahead. Built 2026-08-10.

---

## How It Works

**Drafting (automatic):** `email-reply-drafting-check` scans jackie@synnovatia.com every 2 hours, 6am-6pm, every day (changed 2026-08-10 from hourly 8am-8pm). For each inbox thread where the most recent message isn't from Jackie, it drafts a reply in her voice and attaches it as a real Gmail draft on that thread — nothing new to check, the draft is just sitting there next time she opens the thread.

**Filtered out, so it doesn't draft noise:**
- Automated/bulk senders (no-reply@, newsletters, receipts, calendar-system notifications)
- Threads where Jackie's only cc'd and no reply from her specifically seems needed
- Threads that don't read like they expect a reply (FYIs, confirmations)
- Threads that already have a draft (checked via the Gmail connector's draft list before writing anything — never creates a second draft on the same thread)
- Anything older than roughly 4 days, so it's not resurrecting stale threads

**Voice matching:** follows the `writing-style` skill, cross-checks `context/brand-voice.md` for anything client/business-facing, and pulls a few of Jackie's actual recently-sent emails each run to calibrate tone against real examples rather than generic rules. If the sender matches a HubSpot contact, that record informs tone/context (client vs. prospect vs. mastermind member) without forcing it when there's no match.

**Notification:** if — and only if — a run drafts one or more new replies, it sends one text (iMessage to 310-809-6232) summarizing who they're from, e.g. "2 email replies drafted and ready to review: Carrie re: catch-up, Mark re: proposal." Quiet runs (nothing new to draft) send nothing. A thread only ever triggers a text once — the run it's first drafted — since an already-drafted thread is excluded from every later run's candidate list.

**Review:** happens in Gmail itself, same as every other draft in this workspace — no separate pending-review list. Jackie opens her inbox, the draft is on the thread, she reads/edits it like normal. The text just tells her something's worth checking.

**Sending (manual, every time):** this is the one system in the workspace where Claude can actually execute a send — but only when Jackie says so in a live chat, naming the specific email ("send the reply to Sarah"). Claude then drives Jackie's real logged-in Gmail via **Claude in Chrome** (not the sandboxed in-app browser — it needs her actual session) and clicks Send on that draft. This never happens on a schedule, never happens automatically, and never happens without her naming the specific email in that moment. If there's ever ambiguity about which draft she means, ask before clicking anything.

**After sending (added 2026-08-10):** once a reply is sent, the thread gets archived (removed from Inbox, not deleted — still fully searchable/retrievable in All Mail) via a direct Gmail connector API call (`unlabel_thread`, removing the `INBOX` label) so responded emails don't pile up in the inbox. The sent reply itself lands in Sent automatically, no action needed there.

*(Resolved 2026-08-10: the connector originally lacked label-write permission and this required a browser-automation workaround. Jackie reconnected the Gmail connector with broader access the same day — confirmed working via a real add/remove round-trip test, not just an unlabel no-op — so this is now a clean API call.)*

---

## Why This Is Different From Every Other Draft-Only System Here

Every other automation in this workspace (client re-engagement, HubSpot marketing, onboarding, meeting-prep) is draft-only by design — Jackie sends, Claude never does, because there's no send API on those connectors and the boundary was intentional. This system is the one deliberate exception, and it's scoped narrowly:

- It's the general-inbox system only. Re-engagement and HubSpot drafts are untouched — still 100% human-sends, unless Jackie separately asks to extend this capability there too.
- Even here, drafting and sending are two completely separate actions. The scheduled task never sends anything, ever, under any condition — that instruction is explicit in its prompt. Sending only ever happens as a live, reactive, one-email-at-a-time action Jackie triggers herself in conversation.
- There's still no native "send" API anywhere in this workspace. The send capability here works by browser automation (clicking the actual Send button on Jackie's real Gmail), which is inherently less reliable than an API call — if it ever fails or behaves unexpectedly, default to telling Jackie rather than retrying blindly.

## Task Reference

| Task | Schedule | What it does |
|---|---|---|
| `email-reply-drafting-check` | Every 2 hours, 6am-6pm, every day | Drafts replies to inbox threads awaiting a response |

Manage or disable via the Scheduled section in the sidebar, or ask Claude.
