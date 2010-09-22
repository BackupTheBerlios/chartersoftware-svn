package de.oa.nn.trainer.strategy;

import de.oa.nn.trainer.interfaces.IStopStrategy;
import de.oa.system.Bar;

public class LongTrailingStopStrategy extends IStopStrategy {

  double stopLoss;

  public LongTrailingStopStrategy() {
    stopLoss = 0;
  }

  @Override
  public double getStopLossPrice() {
    return stopLoss;
  }

  @Override
  public void initialize(Bar[] bars) {
    super.initialize(bars);
  }

  @Override
  public boolean isStopLossTouched(Bar bar) {
    return bar.getLow() <= stopLoss;
  }

  @Override
  public boolean onBarUpdate(Bar[] bars, int current) {
    // handle stopp loss stuff
    final Bar bar = bars[current];
    final boolean result = isStopLossTouched(bar);
    setStopLoss(bar);

    // bye bye
    return result;
  }

  @Override
  public void setStopLoss(Bar bar) {
    stopLoss = bar.getLow() - 0.01;
  }

}
