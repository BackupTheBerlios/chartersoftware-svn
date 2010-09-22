package de.oa.system;

public class Signal {
  private Bar bar;

  private ESignalType signalType;
  double profit;

  /**
   * @param bar
   * @param signalType
   */
  public Signal(Bar bar, ESignalType signalType) {
    super();
    this.bar = bar;
    this.signalType = signalType;
  }

  /**
   * @return the bar
   */
  public Bar getBar() {
    return bar;
  }

  /**
   * @return the profit
   */
  public double getProfit() {
    return profit;
  }

  /**
   * @return the signalType
   */
  public ESignalType getSignalType() {
    return signalType;
  }

  /**
   * @param bar
   *          the bar to set
   */
  public void setBar(Bar bar) {
    this.bar = bar;
  }

  /**
   * @param profit
   *          the profit to set
   */
  public void setProfit(double profit) {
    this.profit = profit;
  }

  /**
   * @param signalType
   *          the signalType to set
   */
  public void setSignalType(ESignalType signalType) {
    this.signalType = signalType;
  }

  /*
   * (non-Javadoc)
   * 
   * @see java.lang.Object#toString()
   */
  @Override
  public String toString() {
    return String.format("Signal %-10s profit=% 8.2f %s", signalType, new Double(profit), bar);
  }

}
