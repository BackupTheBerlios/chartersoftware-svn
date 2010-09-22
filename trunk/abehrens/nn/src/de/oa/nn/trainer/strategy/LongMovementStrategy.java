package de.oa.nn.trainer.strategy;

import de.oa.nn.trainer.interfaces.ILongTradingStrategy;

public class LongMovementStrategy extends ILongTradingStrategy {

  public LongMovementStrategy(boolean printDebugMessages) {
    super(new LongTrailingStopStrategy(), new LongMovementBuyStrategy(), printDebugMessages);
  }
}
