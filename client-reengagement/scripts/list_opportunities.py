#!/usr/bin/env python3
"""Surface post-call follow-up opportunities and pending post-call emails."""
import csv
from pathlib import Path

MEETING_NOTES = Path(__file__).parent.parent / "data" / "meeting_notes.csv"


def main():
    with open(MEETING_NOTES, newline="") as f:
        rows = list(csv.DictReader(f))

    if not rows:
        print("No completed meetings logged yet.")
        return

    pending_emails = [r for r in rows if r["post_call_email_status"] == "pending"]
    opportunities = [r for r in rows if r["opportunity"].strip()]

    if pending_emails:
        print(f"{len(pending_emails)} post-call email(s) still to draft/send:\n")
        for r in pending_emails:
            print(f"  {r['name']} <{r['email']}> - met {r['meeting_date']}")
        print()

    if opportunities:
        print(f"{len(opportunities)} open follow-up opportunit{'y' if len(opportunities)==1 else 'ies'}:\n")
        for r in opportunities:
            print(f"  {r['name']} <{r['email']}> - {r['opportunity']}")
            if r["next_action"]:
                print(f"    Next action: {r['next_action']}")
    elif not pending_emails:
        print("No open opportunities or pending emails.")


if __name__ == "__main__":
    main()
