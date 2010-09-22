package de.oa.nn.trainer.main.yahoo;

import java.io.BufferedReader;
import java.io.IOException;
import java.text.ParseException;
import java.util.SortedSet;
import java.util.TreeSet;

import de.oa.nn.trainer.main.StockReader;
import de.oa.system.Bar;

public abstract class YahooReader implements StockReader{

  public SortedSet<Bar> read(final BufferedReader buff) throws IOException, ParseException {
    final SortedSet<Bar> result = new TreeSet<Bar>();
    int lineCounter = 0;
    while (true) {
      final String line = buff.readLine();
      lineCounter++;
      if (line == null)
        break;

      // skip header line
      if (line.contains("Date,Open")) {
        continue;
      }

      // skip empty lines
      if (line.isEmpty()) {
        continue;
      }
      final String[] sp = line.split(",");
      // yahoo: Date,Open, High,Low,Close,Volume,Adj Close
      // Bar: String time, String open, String close, String low, String high, String volume

      if (sp.length != 7) {
        System.err.println("Line " + lineCounter + " has invalid format");
      }
      final String date = sp[0];
      final String open = sp[1];
      final String high = sp[2];
      final String low = sp[3];
      final String close = sp[4];
      final String volume = sp[5];
      final String adjclose = sp[6];

      final Bar bar = new Bar(date, open, close, low, high, volume, adjclose);
      if (result.contains(bar)) {
        System.err.println("Bar previous exists: " + bar.toString());
      }

      result.add(bar);
    }

    return result;
  }
}
