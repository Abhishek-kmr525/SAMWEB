#!/usr/bin/env python3
"""Parse MT5 Strategy Tester report order data for strategy-level analysis."""
from collections import defaultdict
from datetime import datetime

# Entry orders extracted from visible HTML report data
# (time, strategy, direction, volume)
entries = [
    ("2026.01.02 03:15", "TraderMayne", "SHORT", 0.03),
    ("2026.01.02 16:04", "TGCapital", "SHORT", 0.01),
    ("2026.01.02 17:10", "TGCapital", "SHORT", 0.01),
    ("2026.01.02 19:00", "TGCapital", "SHORT", 0.01),
    ("2026.01.02 20:05", "TGCapital", "SHORT", 0.02),
    ("2026.01.02 20:10", "TGCapital", "SHORT", 0.01),
    ("2026.01.02 20:15", "TGCapital", "SHORT", 0.01),
    ("2026.01.05 01:35", "TravellingTrader", "SHORT", 0.02),
    ("2026.01.05 15:05", "JadeCap", "LONG", 0.03),
    ("2026.01.05 15:05", "TravellingTrader", "LONG", 0.03),
    ("2026.01.05 15:45", "JadeCap", "LONG", 0.02),
    ("2026.01.05 16:10", "Marco", "LONG", 0.01),
    ("2026.01.06 03:15", "JadeCap", "LONG", 0.02),
    ("2026.01.06 03:15", "TraderMayne", "LONG", 0.02),
    ("2026.01.06 03:15", "TravellingTrader", "LONG", 0.02),
    ("2026.01.06 03:15", "NBB", "LONG", 0.02),
    ("2026.01.06 03:20", "JadeCap", "LONG", 0.02),
    ("2026.01.06 03:20", "NBB", "LONG", 0.02),
    ("2026.01.06 04:00", "Marco", "LONG", 0.01),
    ("2026.01.06 09:00", "NBB", "LONG", 0.02),
    ("2026.01.06 12:15", "JadeCap", "LONG", 0.04),
    ("2026.01.06 12:20", "JadeCap", "LONG", 0.03),
    ("2026.01.06 13:30", "NBB", "LONG", 0.02),
    ("2026.01.06 13:40", "Marco", "LONG", 0.01),
    ("2026.01.07 04:15", "JadeCap", "LONG", 0.02),
    ("2026.01.07 04:15", "TraderMayne", "LONG", 0.02),
    ("2026.01.07 04:20", "JadeCap", "LONG", 0.02),
    ("2026.01.07 08:00", "JadeCap", "LONG", 0.03),
    ("2026.01.07 08:05", "JadeCap", "LONG", 0.02),
    ("2026.01.07 08:10", "JadeCap", "LONG", 0.02),
    ("2026.01.07 09:05", "JadeCap", "LONG", 0.05),
    ("2026.01.07 09:10", "JadeCap", "LONG", 0.04),
    ("2026.01.07 10:40", "Marco", "LONG", 0.01),
    ("2026.01.07 14:35", "JadeCap", "LONG", 0.02),
    ("2026.01.07 14:40", "JadeCap", "LONG", 0.02),
    ("2026.01.08 01:05", "TGCapital", "LONG", 0.02),
    ("2026.01.08 01:10", "TGCapital", "LONG", 0.02),
    ("2026.01.08 01:20", "TGCapital", "LONG", 0.02),
    ("2026.01.08 01:25", "TGCapital", "LONG", 0.02),
    ("2026.01.08 02:05", "TGCapital", "LONG", 0.02),
    ("2026.01.08 03:15", "JadeCap", "LONG", 0.02),
    ("2026.01.08 03:15", "TraderMayne", "LONG", 0.02),
    ("2026.01.08 03:15", "NBB", "LONG", 0.02),
    ("2026.01.08 03:15", "Marco", "LONG", 0.02),
    ("2026.01.08 03:20", "NBB", "LONG", 0.02),
    ("2026.01.08 04:00", "JadeCap", "LONG", 0.04),
    ("2026.01.08 04:00", "Marco", "LONG", 0.03),
    ("2026.01.09 03:50", "NBB", "LONG", 0.02),
    ("2026.01.09 03:55", "NBB", "LONG", 0.01),
    ("2026.01.09 04:10", "TGCapital", "LONG", 0.01),
    ("2026.01.09 04:45", "TGCapital", "LONG", 0.01),
    ("2026.01.09 07:35", "TGCapital", "LONG", 0.02),
    ("2026.01.09 07:40", "TGCapital", "LONG", 0.02),
    ("2026.01.09 08:30", "TGCapital", "LONG", 0.01),
    ("2026.01.09 08:35", "TGCapital", "LONG", 0.01),
    ("2026.01.09 10:10", "TGCapital", "LONG", 0.03),
    ("2026.01.09 10:15", "TGCapital", "LONG", 0.03),
    ("2026.01.09 11:20", "TGCapital", "LONG", 0.02),
    ("2026.01.09 12:10", "TGCapital", "LONG", 0.02),
    ("2026.01.09 13:00", "NBB", "LONG", 0.04),
    ("2026.01.09 14:00", "TGCapital", "LONG", 0.03),
    ("2026.01.09 14:26", "TGCapital", "LONG", 0.01),
    ("2026.01.09 14:45", "Marco", "LONG", 0.04),
    ("2026.01.09 15:35", "TGCapital", "LONG", 0.01),
    ("2026.01.09 15:41", "TGCapital", "LONG", 0.01),
    ("2026.01.09 15:45", "TraderMayne", "LONG", 0.01),
    ("2026.01.09 15:45", "Marco", "LONG", 0.01),
    ("2026.01.09 16:32", "TGCapital", "LONG", 0.01),
    ("2026.01.09 16:45", "TGCapital", "LONG", 0.01),
    ("2026.01.09 17:25", "TGCapital", "LONG", 0.01),
]

print("=" * 65)
print("  STRATEGY ENTRY FREQUENCY (First 8 Trading Days Visible)")
print("=" * 65)

strat_count = defaultdict(int)
strat_vol = defaultdict(float)
strat_dir = defaultdict(lambda: defaultdict(int))
for t, s, d, v in entries:
    strat_count[s] += 1
    strat_vol[s] += v
    strat_dir[s][d] += 1

print(f"\n  {'Strategy':<22} {'Entries':>8} {'Volume':>10} {'LONG':>6} {'SHORT':>6}")
print(f"  {'-'*22} {'-'*8} {'-'*10} {'-'*6} {'-'*6}")
for s in sorted(strat_count.keys(), key=lambda x: strat_count[x], reverse=True):
    print(f"  {s:<22} {strat_count[s]:>8} {strat_vol[s]:>10.2f} {strat_dir[s]['LONG']:>6} {strat_dir[s]['SHORT']:>6}")
print(f"  {'TOTAL':<22} {sum(strat_count.values()):>8} {sum(strat_vol.values()):>10.2f} "
      f"{sum(strat_dir[s]['LONG'] for s in strat_count):>6} {sum(strat_dir[s]['SHORT'] for s in strat_count):>6}")

# Daily entry clustering
print(f"\n{'=' * 65}")
print("  DAILY ENTRY CLUSTERING")
print("=" * 65)
daily = defaultdict(list)
for t, s, d, v in entries:
    day = t[:10]
    daily[day].append((t, s, d, v))

for day in sorted(daily.keys()):
    day_entries = daily[day]
    strats = defaultdict(int)
    tot_vol = 0
    for _, s, _, v in day_entries:
        strats[s] += 1
        tot_vol += v
    strat_str = ", ".join(f"{s}:{c}" for s, c in sorted(strats.items(), key=lambda x:-x[1]))
    print(f"  {day}: {len(day_entries):>3} entries, {tot_vol:.2f} lots | {strat_str}")

# Simultaneous entries (same timestamp)
print(f"\n{'=' * 65}")
print("  SIMULTANEOUS ENTRIES (Same Timestamp)")
print("=" * 65)
time_groups = defaultdict(list)
for t, s, d, v in entries:
    time_groups[t].append((s, d, v))
for t in sorted(time_groups.keys()):
    if len(time_groups[t]) >= 2:
        strats = [f"{s}({d})" for s, d, v in time_groups[t]]
        tot_v = sum(v for _, _, v in time_groups[t])
        print(f"  {t}: {len(time_groups[t])} trades ({tot_v:.2f} lots) -> {', '.join(strats)}")

# Day-level SL outcomes from visible data
print(f"\n{'=' * 65}")
print("  DAY-LEVEL OUTCOMES (Traced from visible order exits)")
print("=" * 65)
print("""
  Jan 2:  1 TraderMayne SHORT → SL (LOSS)
          5 TGCapital SHORT → ALL held over weekend, ALL SL (5 LOSSES)
  
  Jan 5:  1 TravellingTrader SHORT → SL in 15 min (LOSS)
          JadeCap + TravellingTrader LONG → SL in 17 min (2 LOSSES)
          JadeCap + Marco LONG → Trailing exit (2 possible WINS)
  
  Jan 6:  JadeCap, TraderMayne, TravellingTrader, NBB, Marco
          → 7 entries at 03:15-04:00, 5 hit TP (WINS), 1 trailing, 1 SL
          → JadeCap×2 + NBB + Marco cluster 12:15-13:40 → 3 trailing + 1 TP (WINS)
          ★ BEST DAY: ~8 wins, ~2 losses
  
  Jan 7:  JadeCap×2 + TraderMayne 04:15 → ALL SL at 07:34 (3 LOSSES)
          JadeCap×3 08:00-08:10 → ALL SL at 08:46 (3 LOSSES, 46 min)
          JadeCap×2 + Marco 09:05-10:40 → ALL SL at 14:20 (3 LOSSES)
          JadeCap×2 14:35-14:40 → ALL SL at 15:07 (2 LOSSES)
          ★ WORST DAY: 11 entries, 11 losses. JadeCap: 9 entries, ALL LOST.
  
  Jan 8:  TGCapital×5 01:05-02:05 → ALL SL within 100 min (5 LOSSES)
          JadeCap + TraderMayne + NBB×2 + Marco 03:15-03:20 → ALL SL (5 LOSSES)
          JadeCap + Marco 04:00 → BOTH SL within 30 min (2 LOSSES)
          ★ SECOND WORST: 12 entries, 12 losses
  
  Jan 9:  Mixed results. TGCapital dominated with ~18 entries.
          Some TP hits (4509.33, 4516.24) but many SL hits.
          NBB + TGCapital clusters → mostly SL
          ★ NET NEGATIVE: ~5 wins out of ~23 entries
""")

print("=" * 65)
print("  OVERALL REPORT SUMMARY STATISTICS")
print("=" * 65)
print("""
  Total Net Profit:        -433.13 (LOSING EA)
  Profit Factor:           0.84
  Win Rate:                31.45% (50 wins / 109 losses)
  Short Win Rate:          0.00% (0 wins out of 9 shorts)
  Long Win Rate:           33.33% (50 wins out of 150 longs)
  
  Average Win:             +46.51 pips
  Average Loss:            -25.31 pips
  Win/Loss Ratio:          1.84:1 (good, but win rate too low)
  
  Max Consecutive Wins:    12
  Max Consecutive Losses:  35 (!!)
  Avg Consecutive Wins:    6
  Avg Consecutive Losses:  12 (!!)
  
  Z-Score:                 -9.61 (99.74% confidence)
  → EXTREME negative: losses are massively clustered (NOT random)
  → Multiple correlated positions open/close together
  
  Equity Drawdown Max:     20.64% ($1,447.87)
  Balance Drawdown Max:    17.79% ($1,204.50)
  Sharpe Ratio:            -2.41
  Recovery Factor:         -0.30
""")
