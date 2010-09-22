package de.oa.nn.trainer.interfaces;

import de.oa.nn.trainer.strategy.RiskManagement;

public abstract class ILongTradingStrategy extends ITradingStrategy {
  public ILongTradingStrategy(IStopStrategy stopStrategy, IBuyStrategy buyStrategy, boolean printDebugMessages) {
    super(stopStrategy, buyStrategy, printDebugMessages);
  }

  @Override
  public void recalculateProfit() {
    final IStopStrategy stopStrategy = getStopStrategy();
    final IBuyStrategy buyStrategy = getBuyStrategy();
    final double amount = getAmount();
    final double difference = stopStrategy.getStopLossPrice() - buyStrategy.getStopBuyPrice();
    final double profit = difference * amount * RiskManagement.getLeverage();
    setProfit(profit);
  }

}
