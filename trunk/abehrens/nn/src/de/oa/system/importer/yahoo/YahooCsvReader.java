package de.oa.system.importer.yahoo;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.text.ParseException;
import java.util.SortedSet;

import de.oa.system.Bar;

public class YahooCsvReader extends YahooReader {
  public YahooCsvReader() {
    super();
  }

  @Override
  public SortedSet<Bar> read(String name) throws IOException, ParseException {
    return read(new File(name));
  }

  public SortedSet<Bar> read(File file) throws IOException, ParseException {
    final FileReader myFile = new FileReader(file);
    final BufferedReader buff = new BufferedReader(myFile);
    return read(buff);
  }

}
