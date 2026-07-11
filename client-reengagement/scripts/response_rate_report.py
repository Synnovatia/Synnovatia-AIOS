#!/usr/bin/env python3
"""Report reply rate by day of week the email was sent."""
import csv
from collections import defaultdict
from pathlib import Path

LOG = Path(__file__).parent.parent / "data" / "outreach_log.csv"
DAY_ORDER = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]


def main():
    with open(LOG, newline="") as f:
        rows = list(csv.DictReader(f))

    if not rows:
        print("No outreach logged yet.")
        return

    sent_count = defaultdict(int)
    replied_count = defaultdict(int)

    for r in rows:
        day = r["sent_day_of_week"]
        if not day:
            continue
        sent_count[day] += 1
        if r["replied"] == "yes":
            replied_count[day] += 1

    print(f"{len(rows)} emails logged total.\n")
    print(f"{'Day':<10} {'Sent':>6} {'Replied':>8} {'Rate':>7}")
    for day in DAY_ORDER:
        sent = sent_count.get(day, 0)
        if sent == 0:
            continue
        replied = replied_count.get(day, 0)
        rate = f"{replied / sent * 100:.0f}%"
        print(f"{day:<10} {sent:>6} {replied:>8} {rate:>7}")


if __name__ == "__main__":
    main()
