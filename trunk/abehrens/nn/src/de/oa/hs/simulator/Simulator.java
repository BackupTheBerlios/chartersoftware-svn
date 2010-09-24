package de.oa.hs.simulator;

import java.util.SortedSet;

import de.oa.system.Bar;

public class Simulator {
  final SortedSet<Bar> bars;

  public Simulator(final SortedSet<Bar> bars) {
    this.bars = bars;
  }
}
