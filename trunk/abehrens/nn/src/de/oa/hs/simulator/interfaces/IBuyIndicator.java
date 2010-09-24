package de.oa.hs.simulator.interfaces;

import java.util.ArrayList;

import de.oa.system.Bar;

/**
 * An buy indicator tells about buy signals
 * @author abehrens
 *
 */
public interface IBuyIndicator {
  
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
  abstract public ESignal onUpdateBar(ArrayList<Bar> bars);

}
