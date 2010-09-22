package de.oa.nn.trainer.interfaces;

import de.oa.system.Bar;

public abstract class IStrategy {
  private boolean hasBeenInitialized;

  public IStrategy() {
    super();
    hasBeenInitialized = false;
  }

  public void initialize(final Bar[] bars) {
    // test params
    if (bars == null)
      throw new IllegalArgumentException("bad parameters");

    hasBeenInitialized = true;
  }

  public boolean isInitialized() {
    return hasBeenInitialized;
  }

  abstract public boolean onBarUpdate(final Bar[] bars, int current);

  // simly throws exception in case that method didn't get correct params
  protected void testOnBarUpdateParameters(final Bar[] bars, int current) {
    // test params
    if (bars == null || current > bars.length && current < 0)
      throw new IllegalArgumentException("bad parameters");
  }

}
