package de.oa.nn.trainer.strategy;

import de.oa.nn.trainer.interfaces.IShortTradingStrategy;

public class ShortMovementStrategy extends IShortTradingStrategy {

  public ShortMovementStrategy(boolean printDebugMessages) {
    super(new ShortTrailingStopStrategy(), new ShortMovementBuyStrategy(), printDebugMessages);
  }
}
