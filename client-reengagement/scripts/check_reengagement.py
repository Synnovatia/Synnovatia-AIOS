#!/usr/bin/env python3
import csv
from datetime import date, datetime
from pathlib import Path

ROSTER = Path(__file__).parent.parent / "data" / "roster.csv"
DUE_OUT = Path(__file__).parent.parent / "data" / "due_now.csv"
CADENCE_MONTHS = 6


def add_months(d: date, months: int) -> date:
    month = d.month - 1 + months
    year = d.year + month // 12
    month = month % 12 + 1
    day = min(d.day, [31, 29 if year % 4 == 0 and (year % 100 != 0 or year % 400 == 0) else 28,
                      31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month - 1])
    return date(year, month, day)


def parse_date(s: str) -> date:
    return datetime.strptime(s, "%Y-%m-%d").date()


def main():
    today = date.today()
    rows = []
    with open(ROSTER, newline="") as f:
        reader = csv.DictReader(f)
        fieldnames = reader.fieldnames
        for row in reader:
            reference = row["last_checkin"].strip() or row["client_since"].strip()
            reference_date = parse_date(reference)
            next_due = add_months(reference_date, CADENCE_MONTHS)
            row["next_checkin_due"] = next_due.isoformat()
            row["_days_overdue"] = (today - next_due).days
            rows.append(row)

    due = [r for r in rows if r["_days_overdue"] >= 0]
    due.sort(key=lambda r: -r["_days_overdue"])

    with open(DUE_OUT, "w", newline="") as f:
        writer = csv.DictWriter(f, fieldnames=fieldnames)
        writer.writeheader()
        for r in due:
            writer.writerow({k: r[k] for k in fieldnames})

    print(f"Checked {len(rows)} clients against a {CADENCE_MONTHS}-month cadence.")
    print(f"{len(due)} are due for a check-in as of {today.isoformat()}.")
    print(f"Full due list written to: {DUE_OUT}")


if __name__ == "__main__":
    main()
