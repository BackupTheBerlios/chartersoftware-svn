package de.oa.nn.trainer.main;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.text.ParseException;
import java.util.SortedSet;

import de.oa.system.Bar;

public class YahooCsvReader extends YahooReader {
  YahooCsvReader() {
    super();
  }

  public SortedSet<Bar> read(final File file) throws IOException, ParseException {
    final FileReader myFile = new FileReader(file);
    final BufferedReader buff = new BufferedReader(myFile);
    return read(buff);
  }
}
