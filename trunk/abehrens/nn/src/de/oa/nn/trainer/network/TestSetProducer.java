package de.oa.nn.trainer.network;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;

import de.oa.system.Bar;
import de.oa.system.Signal;

public class TestSetProducer {
  final int numOfBars;
  final String filename;

  public TestSetProducer(final int numOfBars, final String filename) {
    this.numOfBars = numOfBars;
    this.filename = filename;
  }

  public void write(ArrayList<Signal> resultList) throws IOException {

    // open output file
    final File outputFile = new File(filename);
    final FileWriter fileWriter;
    final BufferedWriter outputBuffer;
    fileWriter = new FileWriter(outputFile);
    outputBuffer = new BufferedWriter(fileWriter);

    // get normalisation range
    double minValue = 99999999999.;
    for (final Signal s : resultList) {
      final Bar b = s.getBar();
      if (b.getLow() < minValue)
        minValue = b.getLow();
    }
    minValue += 0.01;// avoid division by 0;

    double maxValue = -9999999999.;
    for (final Signal s : resultList) {
      final Bar b = s.getBar();
      if (b.getHigh() - minValue > maxValue)
        maxValue = b.getHigh() - minValue;
    }
    minValue=0;
    maxValue=1;

    // sort signals to table
    // for (int i = 0; i < resultList.size() - numOfBars - new Double(resultList.size() * 0.8).intValue();i++)
    // {
    for (int i = 0; i < resultList.size() - numOfBars; i++) {
      // ignore DO_NOTHING samples
      // if (resultList.get(i + numOfBars).getSignalType() == ESignalType.DO_NOTHING) {
      // i++;
      // continue;
      // }

      // write numOfBars * Signals
      int j = i;
      for (; j < (i + numOfBars); j++) {
        final Signal sig = resultList.get(j);
        final StringBuilder builder = new StringBuilder();
        final Bar bar = sig.getBar();
        builder.append((bar.getOpen() - minValue) / maxValue);
        builder.append(' ');
        builder.append((bar.getLow() - minValue) / maxValue);
        builder.append(' ');
        builder.append((bar.getHigh() - minValue) / maxValue);
        builder.append(' ');
        builder.append((bar.getClose() - minValue) / maxValue);
        builder.append(' ');
        outputBuffer.write(builder.toString());
        builder.append(' ');
      }
      switch (resultList.get(j).getSignalType()) {
      case GO_LONG:
        outputBuffer.write("1");
        break;
      case GO_SHORT:
        outputBuffer.write("-1");
        break;
      default:
        outputBuffer.write("0");
      }
      outputBuffer.newLine();
    }

    // close file after writing
    outputBuffer.close();
    fileWriter.close();

  }

}
