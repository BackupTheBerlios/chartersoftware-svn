package de.oa.nn.trainer.interfaces;

import de.oa.nn.trainer.strategy.RiskManagement;

public abstract class IShortTradingStrategy extends ITradingStrategy {
  public IShortTradingStrategy(IStopStrategy stopStrategy, IBuyStrategy buyStrategy, boolean printDebugMessages) {
    super(stopStrategy, buyStrategy, printDebugMessages);
  }

  @Override
  public void recalculateProfit() {
    final IStopStrategy stopStrategy = getStopStrategy();
    final IBuyStrategy buyStrategy = getBuyStrategy();
    final double amount = getAmount();
    final double difference = buyStrategy.getStopBuyPrice() - stopStrategy.getStopLossPrice();
    final double profit = difference * amount * RiskManagement.getLeverage();
    // System.out.println("SB="+buyStrategy.getStopBuyPrice()+" SL="+stopStrategy.getStopLossPrice());
    setProfit(profit);
  }

}
