/**
 * 
 */
package de.oa.nn.trainer.main;

import java.io.IOException;
import java.util.SortedSet;
import java.util.TreeSet;

import org.apache.commons.cli.CommandLine;
import org.apache.commons.cli.CommandLineParser;
import org.apache.commons.cli.HelpFormatter;
import org.apache.commons.cli.Option;
import org.apache.commons.cli.OptionBuilder;
import org.apache.commons.cli.Options;
import org.apache.commons.cli.ParseException;
import org.apache.commons.cli.PosixParser;

import de.oa.nn.trainer.main.yahoo.YahooCsvReader;
import de.oa.system.Bar;

/**
 * @author abehrens
 * 
 */
public class Trainer {

  public Trainer() {
  //
  }

  /**
   * @param args
   * @throws ParseException
   */
  @SuppressWarnings("static-access")
  public static void main(String[] args) {

    // setup command line options
    final Options options = new Options();
    final Option verbose = new Option("verbose", "be extra verbose");
    final Option help = new Option("help", "print help text");
    final Option stock = OptionBuilder.withArgName("filename").hasArg().withDescription("Filename to yahoo csv file")
        .create("stockfile");
    final Option name = OptionBuilder.withArgName("stockname").hasArg().withDescription("Name of Stock").create(
        "stockname");
    final Option dax = OptionBuilder.withArgName("filename").hasArg().withDescription("Filename to yahoo csv file")
        .create("dax");
    options.addOption(verbose);
    options.addOption(stock);
    options.addOption(name);
    options.addOption(dax);
    options.addOption(help);

    final CommandLineParser parser = new PosixParser();
    final CommandLine cmd;
    try {
      cmd = parser.parse(options, args);
      if (cmd.hasOption("help") || !cmd.hasOption("stockname") || !cmd.hasOption("stockfile")) {
        final HelpFormatter formatter = new HelpFormatter();
        formatter.printHelp("Trainer", options);
        return;
      }
    } catch (final ParseException exp) {
      final HelpFormatter formatter = new HelpFormatter();
      formatter.printHelp("Trainer", options);
      return;
    }

    final Trainer trainer = new Trainer();
    trainer.executeTraining(cmd.getOptionValue("stockname"), cmd.getOptionValue("stockfile"));
  }

  public void executeTraining(final String stockname, final String stockfile) {
    final SortedSet<Bar> list = readCsvYahoo(stockfile);
    final Training training = new Training(stockname, list);
    training.execute();
  }

  public SortedSet<Bar> readCsvYahoo(final String stockfile) {
    final StockReader reader = new YahooCsvReader();
    try {
      return reader.read(stockfile);
    } catch (IOException e) {
      System.err.println("IOException: " + e.getLocalizedMessage());
      e.printStackTrace();
      return new TreeSet<Bar>();
    } catch (java.text.ParseException e) {
      System.err.println("ParseException: " + e.getLocalizedMessage());
      e.printStackTrace();
      return new TreeSet<Bar>();
    }
  }

}
