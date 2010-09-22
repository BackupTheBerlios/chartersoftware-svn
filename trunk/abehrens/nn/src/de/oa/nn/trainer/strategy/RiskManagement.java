package de.oa.nn.trainer.strategy;

import de.oa.nn.trainer.interfaces.IBuyStrategy;
import de.oa.nn.trainer.interfaces.IStopStrategy;
import de.oa.system.Bar;

public class RiskManagement {
  final static int MAX_RISK = 100;
  final static int MAX_CAPITAL = 1000;
  final static int LEVERAGE = 1;

  public static int calculateCurrentBarResult(final Bar bar) {

    // calculate amount of max risk positions
    double risk = bar.getClose() - bar.getOpen();
    if (risk < 0)
      risk *= -1;
    risk += 0.02; // add 2 cent difference to open/close
    risk += 0.01; // add 1 cent slippage;
    final double mrp = MAX_RISK / risk;
    int maxRiskPos = new Double(mrp).intValue();
    if (maxRiskPos > mrp)
      maxRiskPos -= 1;

    // calc max position size by capital
    final double cap = MAX_CAPITAL / bar.getClose();
    int maxCapPos = new Double(cap).intValue();
    if (maxCapPos > cap)
      maxCapPos -= 1;

    if (maxCapPos < maxRiskPos)
      return maxCapPos;
    return maxRiskPos;
  }

  public static int calculateMaxPositionSize(final IStopStrategy stopStrat, final IBuyStrategy buyStrat) {

    // calculate amount of max risk positions
    double risk = getPositionRisk(stopStrat, buyStrat);
    risk += 0.01; // add 1 cent slippage;
    final double mrp = MAX_RISK / risk;
    int maxRiskPos = new Double(mrp).intValue();
    if (maxRiskPos > mrp)
      maxRiskPos -= 1;

    // calc max position size by capital
    final double cap = MAX_CAPITAL / buyStrat.getStopBuyPrice();
    int maxCapPos = new Double(cap).intValue();
    if (maxCapPos > cap)
      maxCapPos -= 1;

    // maxCapPos = 1;

    if (maxCapPos < maxRiskPos)
      return maxCapPos;
    return maxRiskPos;
  }

  public static int getLeverage() {
    return LEVERAGE;
  }

  public static double getPositionRisk(final IStopStrategy stopStrat, final IBuyStrategy buyStrat) {
    final double sl_price = stopStrat.getStopLossPrice();
    final double sb_price = buyStrat.getStopBuyPrice();
    double risk = sb_price - sl_price;
    if (risk < 0)
      risk *= -1;
    return risk;
  }

}
