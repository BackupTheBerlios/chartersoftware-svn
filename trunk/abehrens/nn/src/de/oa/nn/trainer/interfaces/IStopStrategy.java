package de.oa.nn.trainer.interfaces;

import de.oa.system.Bar;

public abstract class IStopStrategy extends IStrategy {
  abstract public double getStopLossPrice();

  abstract public boolean isStopLossTouched(final Bar bar);

  abstract public void setStopLoss(final Bar bar);
}
