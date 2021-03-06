package de.oa.nn.trainer.strategy;

import de.oa.nn.trainer.interfaces.IBuyStrategy;
import de.oa.system.Bar;

public class LongMovementBuyStrategy extends IBuyStrategy {
  private double stopBuy;

  public LongMovementBuyStrategy() {
    super();
    stopBuy = 0;
  }

  @Override
  public double getStopBuyPrice() {
    return stopBuy;
  }

  @Override
  public void initialize(Bar[] bars) {
    super.initialize(bars);
  }

  @Override
  public boolean isStopBuyTouched(Bar bar) {
    return bar.getHigh() > stopBuy;
  }

  @Override
  public boolean onBarUpdate(Bar[] bars, int current) {
    return isStopBuyTouched(bars[current]);
  }

  @Override
  public void setStopBuy(Bar bar) {
    stopBuy = bar.getHigh() + 0.01;
  }

}
