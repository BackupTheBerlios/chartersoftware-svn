package de.oa.hs.simulator;

import java.util.SortedSet;

import de.oa.system.Bar;

public class Simulator {
  final SortedSet<Bar> bars;
  final String stockname;

  public Simulator(final String stockname, final SortedSet<Bar> bars) {
    this.stockname = stockname;
    this.bars = bars;
  }
  
  protected void initialize() {
    
  }
  
  public void simulate(){
    initialize();
    //
  }
  
}
