package de.oa.nn.trainer.main;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;

import de.oa.system.Signal;

public class CsvWriter {
  CsvWriter() {
    super();
  }

  public void write(ArrayList<Signal> list, final File file) throws IOException {
    final FileWriter myFile = new FileWriter(file);
    final BufferedWriter buff = new BufferedWriter(myFile);
    for (final Signal s : list) {
      final StringBuilder builder = new StringBuilder();
      builder.append(s.getBar().getClose());
      builder.append(',');
      builder.append(s.getSignalType());
      buff.write(builder.toString());
      buff.newLine();
    }
    buff.close();
    myFile.close();
  }
}
