package de.oa.hs.simulator;

import java.io.File;
import java.io.IOException;
import java.text.ParseException;
import java.util.ArrayList;
import java.util.SortedSet;

import de.oa.system.Bar;
import de.oa.system.importer.yahoo.YahooCsvReader;

public class SimulationStarter {
  private final String path;
  private final int maxThreads;

  public SimulationStarter(final String path, final int maxThreads) {
    this.path = path;
    this.maxThreads = maxThreads;
  }

  public ArrayList<File> listFilesInPath() {
    final ArrayList<File> result = new ArrayList<File>();
    final File dir = new File(path);
    for (File file : dir.listFiles()) {
      if (!file.getName().endsWith(".csv"))
        continue;
      if (!file.isFile())
        continue;
      if (!file.canRead())
        continue;
      result.add(file);
    }
    return result;
  }

  public void simulate() {
    final YahooCsvReader yahooReader = new YahooCsvReader();
    for (final File file : listFilesInPath()) {
      try {
        final SortedSet<Bar> bars = yahooReader.read(file);
      } catch (IOException e) {
        e.printStackTrace();
      } catch (ParseException e) {
        e.printStackTrace();
      }
    }

  }
}
