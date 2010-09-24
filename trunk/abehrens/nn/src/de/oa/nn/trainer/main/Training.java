/**
 * 
 */
package de.oa.nn.trainer.main;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.SortedSet;

import de.oa.nn.trainer.interfaces.ILongTradingStrategy;
import de.oa.nn.trainer.interfaces.ITradingStrategy;
import de.oa.nn.trainer.network.TestSetProducer;
import de.oa.nn.trainer.strategy.LongMovementStrategy;
import de.oa.nn.trainer.strategy.ShortMovementStrategy;
import de.oa.system.Bar;
import de.oa.system.ESignalType;
import de.oa.system.Signal;

/**
 * @author abehrens
 * 
 */
public class Training {

  final String stock;
  final SortedSet<Bar> bars;

  /**
   * 
   */
  public Training(final String stock, final SortedSet<Bar> bars) {
    if (stock == null || bars == null) {
      throw new IllegalArgumentException("arguments must not be null");
    }
    this.stock = stock;
    this.bars = bars;

  }

  public void execute() {
    strategyTest();
    // new BarPrinterConsole().print(this.bars, 0);
  }

  public void strategyTest() {
    final Bar list[] = new Bar[bars.size()];
    bars.toArray(list);
    int lDays = 0;
    double lProfit = 0;
    int sDays = 0;
    double sProfit = 0;

    // iterate over entire history and setup a resultlist of signals
    final ArrayList<Signal> resultList = new ArrayList<Signal>();
    for (int i = 0; i < list.length - 1; ++i) {
      // create some temp. variables;
      final Bar known[] = new Bar[i];
      System.arraycopy(list, 0, known, 0, i);
      if (known.length < 1)
        continue;
      final Signal currDaySignal = new Signal(list[i], ESignalType.DO_NOTHING);
      resultList.add(currDaySignal);

      // check for each day different strategies
      // System.out.println("");
      final ArrayList<ITradingStrategy> strategyList = new ArrayList<ITradingStrategy>();
      strategyList.add(new LongMovementStrategy(false));
      strategyList.add(new ShortMovementStrategy(false));

      for (final ITradingStrategy strategy : strategyList) {
        strategy.initialize(known);
        strategy.setStart(known, known.length - 1);
        testSingleStrategy(strategy, list, i);

        if (strategy.wasSuccessFull()) {
          currDaySignal.setProfit(strategy.getProfit());
          if (strategy instanceof ILongTradingStrategy) {
            lDays += strategy.getSuccessFullDays();
            lProfit += strategy.getProfit();
            currDaySignal.setSignalType(ESignalType.GO_LONG);
          } else {
            sDays += strategy.getSuccessFullDays();
            sProfit += strategy.getProfit();
            currDaySignal.setSignalType(ESignalType.GO_SHORT);
          }
        }
      }
    }

    try {
      new CsvWriter().write(resultList, new File("/tmp/test.csv"));
    } catch (final IOException e) {
      System.err.println("Error while writing to test.csv: " + e.getLocalizedMessage());
      e.printStackTrace();
    }

    System.out.println("Testrange: " + list.length + " days.");
    System.out.println("Long  Strategy was successfull on " + lDays + " with " + lProfit + " profit");
    System.out.println("Short Strategy was successfull on " + sDays + " with " + sProfit + " profit");
    for (final Signal s : resultList) {
      // System.out.println(s.toString());
    }

    final String filename = "/tmp/testset.csv";
    TestSetProducer producer = new TestSetProducer(20, filename);
    try {
      producer.write(resultList);
    } catch (IOException e) {
      System.err.println("Cannot write testset to " + filename + ": " + e.getLocalizedMessage());
    }
    // MLP mlp = new MLP(5);
    // mlp.training(resultList);
    // mlp.testing(resultList);

  }

  public void testSingleStrategy(final ITradingStrategy s, final Bar list[], int startDay) {
    for (int j = startDay + 1; j < list.length; ++j) {
      if (!s.onBarUpdate(list, j))
        break;
    }
    return;
  }

}
