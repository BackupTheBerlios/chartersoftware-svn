package de.oa.nn.trainer.interfaces;

import de.oa.nn.trainer.strategy.RiskManagement;
import de.oa.system.Bar;
import de.oa.system.EStrategyState;

public abstract class ITradingStrategy extends IStrategy {
  private final boolean printDebugMessages;
  private final IStopStrategy stopStrategy;
  private final IBuyStrategy buyStrategy;
  private EStrategyState strategyState;
  private int successFullDays;
  private double usedCapital; // how much money was used for this trade
  private double maxRisk; // how much money was max risk
  private final double mae; // Maximum Adverse Excursion == max risk while trading
  private final double mfe; // Maximum Favorable Excursion == max loss after highest high
  private double profit;
  private int amount; // how much pieces were be bought

  public ITradingStrategy(IStopStrategy stopStrategy, IBuyStrategy buyStrategy, boolean printDebugMessages) {
    super();
    this.printDebugMessages = printDebugMessages;
    this.stopStrategy = stopStrategy;
    this.buyStrategy = buyStrategy;
    strategyState = EStrategyState.UNDEFINED;
    successFullDays = 0;
    usedCapital = 0;
    maxRisk = 0;
    mae = 0;
    mfe = 0;
  }

  /**
   * @return the amount
   */
  public int getAmount() {
    return amount;
  }

  protected void setAmount(final int amount) {
    this.amount = amount;
  }

  /**
   * @return the buyStrategy
   */
  protected IBuyStrategy getBuyStrategy() {
    return buyStrategy;
  }

  /**
   * @return the mae
   */
  public double getMae() {
    return mae;
  }

  /**
   * @return the maxRisk
   */
  public double getMaxRisk() {
    return maxRisk;
  }

  protected void setMaxRisk(final double maxRisk) {
    this.maxRisk = maxRisk;
  }

  /**
   * @return the mfe
   */
  public double getMfe() {
    return mfe;
  }

  /**
   * @return the profit
   */
  public double getProfit() {
    return profit;
  }

  /**
   * @return the stopStrategy
   */
  protected IStopStrategy getStopStrategy() {
    return stopStrategy;
  }

  /**
   * @return the successFullDays
   */
  public int getSuccessFullDays() {
    return successFullDays;
  }

  public double getUsedCapital() {
    return usedCapital;
  }

  protected void setUsedCapital(final double usedCapital) {
    this.usedCapital = usedCapital;
  }

  @Override
  public void initialize(Bar[] bars) {
    super.initialize(bars);
    stopStrategy.initialize(bars);
    buyStrategy.initialize(bars);
    strategyState = EStrategyState.UNDEFINED;
  }

  @Override
  public boolean onBarUpdate(Bar[] bars, int current) {

    // set internal variables
    boolean result = false;
    final Bar bar = bars[current];

    // handle different strategy states ...

    // onBarUpdate should never be called in this state
    if (strategyState == EStrategyState.UNDEFINED) {
      result = false;
    }
    // onBarUpdate should never be called in this state
    if (strategyState == EStrategyState.STOPPED) {
      result = false;
    }

    // Strategy was trying to buy something. Check if it worked...
    if (strategyState == EStrategyState.WAIT_SB) {
      amount = RiskManagement.calculateMaxPositionSize(stopStrategy, buyStrategy);
      maxRisk = RiskManagement.getPositionRisk(stopStrategy, buyStrategy) * amount * RiskManagement.getLeverage();
      usedCapital = buyStrategy.getStopBuyPrice() * amount;

      if (buyStrategy.isStopBuyTouched(bar)) {
        // we bought something
        result = true;
        strategyState = EStrategyState.RUNNING;
      } else {
        // we didnt bought anything
        result = false;
        strategyState = EStrategyState.STOPPED;
      }
    }

    // Strategy has open position and makes progress
    if (strategyState == EStrategyState.RUNNING) {
      successFullDays++;

      if (stopStrategy.isStopLossTouched(bar)) {
        strategyState = EStrategyState.STOPPED;
        result = false;
      } else {
        strategyState = EStrategyState.RUNNING;
        stopStrategy.setStopLoss(bar);
        result = true;
      }
      recalculateProfit();
    }

    if (result == true)
      printDebug("RUN", bar);
    else
      printDebug("STP", bar);

    return result;
  }

  protected void printDebug(final String info, final Bar bar) {
    if (printDebugMessages == false)
      return;
    System.out.println(String.format("LongStrategy-%5s(profit=% 8.2f risk=% 8.2f) at %s", info, new Double(profit),
        new Double(maxRisk), bar));
  }

  abstract public void recalculateProfit();

  /**
   * @param profit
   *          the profit to set
   */
  protected void setProfit(double profit) {
    this.profit = profit;
  }

  /**
   * trade was successfull if profit is three times higher than risk
   * 
   * @return
   */
  public boolean wasSuccessFull() {
    return (profit > 0 && profit >= 2 * maxRisk);
  }

  /**
   * @return the strategyState
   */
  protected EStrategyState getStrategyState() {
    return this.strategyState;
  }

  /**
   * @param strategyState
   *          the strategyState to set
   */
  protected void setStrategyState(EStrategyState strategyState) {
    this.strategyState = strategyState;
  }

  public void setStart(Bar[] bars, int current) {
    final Bar bar = bars[current];
    getStopStrategy().setStopLoss(bar);
    getBuyStrategy().setStopBuy(bar);

    final int am = RiskManagement.calculateMaxPositionSize(getStopStrategy(), getBuyStrategy());
    setAmount(am);

    final double mr = RiskManagement.getPositionRisk(getStopStrategy(), getBuyStrategy()) * amount
        * RiskManagement.getLeverage();
    setMaxRisk(mr);

    double uc = getBuyStrategy().getStopBuyPrice() * amount;
    setUsedCapital(uc);

    printDebug("BUY", bar);
    setStrategyState(EStrategyState.WAIT_SB);
  }

}
