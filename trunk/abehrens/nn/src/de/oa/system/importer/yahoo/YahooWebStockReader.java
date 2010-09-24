package de.oa.system.importer.yahoo;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.URL;
import java.text.ParseException;
import java.util.SortedSet;

import de.oa.system.Bar;

public class YahooWebStockReader extends YahooReader {

  public YahooWebStockReader() {
    super();
  }

  public SortedSet<Bar> read(final String stock) throws IOException, ParseException {
    final String surl = "http://download.finance.yahoo.com/d/quotes.csv?s=" + stock + "&f=sl1d1t1c1ohgv&e=.csv";
    final URL url = new URL(surl);
    final InputStream is = url.openStream();
    return read(new BufferedReader(new InputStreamReader(is)));
  }


}
