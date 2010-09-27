package de.oa.yahooloader;

import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;
import java.util.Calendar;
import java.util.GregorianCalendar;

public class Main {

  /**
   * @param args
   */
  public static void main(String[] args) {
    String[] values = { "^GDAXI", // DAX
        "ADS.DE",// Adidas,
        "ALV.DE", // Allian
        "BAS.DE",// basf
        "BAYN.DE",// bayer
        "BEI.DE",// beiersdorf
        "BMW.DE",// bmw
        "CBK.DE",// Commerzbank
        "DAI.DE",// Daimler
        "DB1.DE",// Deutsche Börse
        "DBK.DE",// Dt. bank
    };

    final Calendar start = new GregorianCalendar(2000, 01, 01);
    final Calendar end = new GregorianCalendar();
    final String targetPath = "/home/abehrens/hg/release_2010_10/eclipse/nn/test/yahoocsv";
    for (String s : values) {
      try {
        loadYahooCsvFiles(s, start, end, targetPath);
      } catch (MalformedURLException e) {
        System.err.println("Bad URL:" + e.getLocalizedMessage());
        e.printStackTrace();
      } catch (IOException e) {
        System.err.println("IO-Exception:" + e.getLocalizedMessage());
        e.printStackTrace();
      }
    }

  }

  private static void loadYahooCsvFiles(final String value, final Calendar start, final Calendar end,
      final String filepath) throws IOException {
    String s = "&a=" + start.get(Calendar.MONTH) + "&b=" + start.get(Calendar.DAY_OF_MONTH) + "&c="
        + start.get(Calendar.YEAR);
    String e = "&d=" + end.get(Calendar.MONTH) + "&e=" + end.get(Calendar.DAY_OF_MONTH) + "&f="
        + end.get(Calendar.YEAR);
    String v = "?s=" + value;
    // http://ichart.yahoo.com/table.csv?s=%5EGDAXI&a=11&b=31&c=1990&d=08&e=27&f=2010&g=d&ignore=.csv
    final URL url = new URL("http://ichart.yahoo.com/table.csv" + v + s + e + "&g=d&ignore=.csv");

    // open output file
    final File file = new File(filepath + "/" + value + ".csv");
    if (file.exists() && !file.delete()) {
      throw new IOException("Cannot delete file <" + file.getCanonicalPath() + ">");
    }
    if (!file.createNewFile()) {
      throw new IOException("Cannot create file <" + file.getCanonicalPath() + ">");
    }

    
    //open input
    //HttpGet httpget = new HttpGet("http://www.google.com/"); 

    URLConnection con = url.openConnection(); 
    
    // write to is to os;
    InputStream is = url.openStream();
    OutputStream os = new FileOutputStream(file);
    byte buffer[] = new byte[20000];
    while (is.read(buffer) > -1) {
      os.write(buffer);
    }

    // close streams
    os.close();
    is.close();

  }
}
