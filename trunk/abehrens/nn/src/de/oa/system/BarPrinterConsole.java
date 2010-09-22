package de.oa.system;

import java.util.SortedSet;

public class BarPrinterConsole {
  public BarPrinterConsole() {
  //
  }

  public void print(SortedSet<Bar> list, int max) {
    if (list == null)
      return;
    int i = 1;
    for (final Bar b : list) {
      final StringBuilder builder = new StringBuilder();
      builder.append(b.getTimeAsString()); // 09.06.06 14:00
      builder.append('\t');
      builder.append(b.getWeekdayAsInt()); // 09.06.06 14:00
      builder.append('\t');
      builder.append(b.getWeekdayAsString()); // 09.06.06 14:00
      builder.append('\t');
      builder.append(b.getOpen());
      builder.append('\t');
      builder.append(b.getHigh());
      builder.append('\t');
      builder.append(b.getLow());
      builder.append('\t');
      builder.append(b.getClose());
      System.out.println(builder.toString());
      if (max > 0 && i++ >= max)
        break;
    }
  }

}
