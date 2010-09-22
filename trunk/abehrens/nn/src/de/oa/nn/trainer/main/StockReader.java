package de.oa.nn.trainer.main;

import java.io.BufferedReader;
import java.io.IOException;
import java.text.ParseException;
import java.util.SortedSet;

import de.oa.system.Bar;

public abstract interface StockReader {

  abstract public SortedSet<Bar> read(final BufferedReader buff) throws IOException, ParseException;
  abstract public SortedSet<Bar> read(final String name) throws IOException, ParseException;
}
