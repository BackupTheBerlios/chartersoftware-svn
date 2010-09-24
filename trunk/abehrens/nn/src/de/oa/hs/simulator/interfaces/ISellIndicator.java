package de.oa.hs.simulator.interfaces;

import java.util.ArrayList;

import de.oa.system.Bar;

/**
 * An sell indicator gives a hint about closing a position
 * @author abehrens
 *
 */
public interface ISellIndicator {
  
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
