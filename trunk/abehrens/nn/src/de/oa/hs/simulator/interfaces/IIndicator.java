package de.oa.hs.simulator.interfaces;

import java.util.ArrayList;

import de.oa.system.Bar;

/**
 * An indicator calculates something
 * @author abehrens
 *
 */
public interface IIndicator {
  
  /**
   * bars = history of all bars. Last bar = today
   * @param bars
   * @return 
   */
  abstract public void initialize(ArrayList<Bar> bars);
  /**
   * Last bar = today
   * @param bars
   * @return 
   */
  abstract public double onUpdateBar(ArrayList<Bar> bars);

}
