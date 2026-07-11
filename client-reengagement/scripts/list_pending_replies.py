#!/usr/bin/env python3
"""List everyone currently marked 'sent' so Gmail can be checked for replies."""
import csv
from datetime import date, datetime
from pathlib import Path

ROSTER = Path(__file__).parent.parent / "data" / "roster.csv"


def main():
    with open(ROSTER, newline="") as f:
        rows = list(csv.DictReader(f))

    pending = [r for r in rows if r["status"] == "sent"]
    if not pending:
        print("Nobody is currently awaiting a reply check.")
        return

    today = date.today()
    pending.sort(key=lambda r: r["last_status_date"])
    print(f"{len(pending)} people awaiting a reply check:\n")
    for r in pending:
        sent = datetime.strptime(r["last_status_date"], "%Y-%m-%d").date()
        days = (today - sent).days
        print(f"  {r['first_name']} {r['last_name']} <{r['email']}> - sent {r['last_status_date']} ({days} days ago)")


if __name__ == "__main__":
    main()
