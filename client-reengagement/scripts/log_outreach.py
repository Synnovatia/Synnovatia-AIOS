#!/usr/bin/env python3
"""
Update a client's outreach status and keep the response-rate log in sync.

Usage:
  python3 log_outreach.py sent <email> [--date YYYY-MM-DD]
  python3 log_outreach.py responded <email> [--date YYYY-MM-DD]
  python3 log_outreach.py no_response <email> [--date YYYY-MM-DD]
  python3 log_outreach.py meeting_scheduled <email> [--date YYYY-MM-DD] [--notes "..."]
  python3 log_outreach.py meeting_completed <email> [--date YYYY-MM-DD] --notes "..." [--opportunity "..."] [--next-action "..."]
"""
import csv
import sys
import argparse
from datetime import date, datetime
from pathlib import Path

ROOT = Path(__file__).parent.parent
ROSTER = ROOT / "data" / "roster.csv"
LOG = ROOT / "data" / "outreach_log.csv"
MEETING_NOTES = ROOT / "data" / "meeting_notes.csv"


def read_csv(path):
    with open(path, newline="") as f:
        reader = csv.DictReader(f)
        return reader.fieldnames, list(reader)


def write_csv(path, fieldnames, rows):
    with open(path, "w", newline="") as f:
        writer = csv.DictWriter(f, fieldnames=fieldnames)
        writer.writeheader()
        writer.writerows(rows)


def main():
    parser = argparse.ArgumentParser()
    parser.add_argument("action", choices=["sent", "responded", "no_response", "meeting_scheduled", "meeting_completed"])
    parser.add_argument("email")
    parser.add_argument("--date", default=date.today().isoformat())
    parser.add_argument("--notes", default="")
    parser.add_argument("--opportunity", default="")
    parser.add_argument("--next-action", dest="next_action", default="")
    args = parser.parse_args()

    if args.action == "meeting_completed" and not args.notes:
        print("meeting_completed requires --notes")
        sys.exit(1)

    action_date = datetime.strptime(args.date, "%Y-%m-%d").date()
    fieldnames, rows = read_csv(ROSTER)
    log_fieldnames, log_rows = read_csv(LOG)

    match = [r for r in rows if r["email"].lower() == args.email.lower()]
    if not match:
        print(f"No roster entry found for {args.email}")
        sys.exit(1)
    person = match[0]

    if args.action == "sent":
        person["status"] = "sent"
        person["last_status_date"] = action_date.isoformat()
        person["last_checkin"] = action_date.isoformat()
        log_rows.append({
            "email": args.email,
            "sent_date": action_date.isoformat(),
            "sent_day_of_week": action_date.strftime("%A"),
            "replied": "",
            "replied_date": "",
            "days_to_reply": "",
            "meeting_scheduled": "",
        })

    elif args.action == "responded":
        person["status"] = "responded"
        person["last_status_date"] = action_date.isoformat()
        person["last_checkin"] = action_date.isoformat()
        open_log_rows = [r for r in log_rows if r["email"].lower() == args.email.lower() and not r["replied"]]
        if open_log_rows:
            log_row = open_log_rows[-1]
            sent_date = datetime.strptime(log_row["sent_date"], "%Y-%m-%d").date()
            log_row["replied"] = "yes"
            log_row["replied_date"] = action_date.isoformat()
            log_row["days_to_reply"] = str((action_date - sent_date).days)

    elif args.action == "no_response":
        person["status"] = "no_response"
        person["last_status_date"] = action_date.isoformat()
        open_log_rows = [r for r in log_rows if r["email"].lower() == args.email.lower() and not r["replied"]]
        if open_log_rows:
            open_log_rows[-1]["replied"] = "no"

    elif args.action == "meeting_scheduled":
        person["status"] = "meeting_scheduled"
        person["last_status_date"] = action_date.isoformat()
        person["last_checkin"] = action_date.isoformat()
        if args.notes:
            person["notes"] = (person["notes"] + "; " if person["notes"] else "") + args.notes
        open_log_rows = [r for r in log_rows if r["email"].lower() == args.email.lower()]
        if open_log_rows:
            open_log_rows[-1]["meeting_scheduled"] = "yes"

    elif args.action == "meeting_completed":
        person["status"] = "meeting_completed"
        person["last_status_date"] = action_date.isoformat()
        person["last_checkin"] = action_date.isoformat()
        _, meeting_rows = read_csv(MEETING_NOTES)
        meeting_rows.append({
            "email": args.email,
            "name": f"{person['first_name']} {person['last_name']}",
            "meeting_date": action_date.isoformat(),
            "notes": args.notes,
            "opportunity": args.opportunity,
            "next_action": args.next_action,
            "post_call_email_status": "pending",
        })
        write_csv(MEETING_NOTES, ["email","name","meeting_date","notes","opportunity","next_action","post_call_email_status"], meeting_rows)

    write_csv(ROSTER, fieldnames, rows)
    write_csv(LOG, log_fieldnames, log_rows)
    print(f"Updated {args.email}: status={person['status']} as of {action_date.isoformat()}")


if __name__ == "__main__":
    main()
