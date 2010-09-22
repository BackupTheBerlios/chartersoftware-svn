package de.oa.nn.trainer.interfaces;

import de.oa.system.Bar;

public abstract class IBuyStrategy extends IStrategy {
  abstract public double getStopBuyPrice();

  abstract public boolean isStopBuyTouched(final Bar bar);

  abstract public void setStopBuy(final Bar bar);
}
