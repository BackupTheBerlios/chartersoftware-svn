/**
 * 
 */
package de.oa.nn.trainer.main;

import java.io.File;
import java.io.IOException;
import java.util.SortedSet;

import org.apache.commons.cli.CommandLine;
import org.apache.commons.cli.CommandLineParser;
import org.apache.commons.cli.HelpFormatter;
import org.apache.commons.cli.Option;
import org.apache.commons.cli.OptionBuilder;
import org.apache.commons.cli.Options;
import org.apache.commons.cli.ParseException;
import org.apache.commons.cli.PosixParser;

import de.oa.system.Bar;

/**
 * @author abehrens
 * 
 */
public class Trainer {

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
        .create("stock");
    final Option name = OptionBuilder.withArgName("stockname").hasArg().withDescription("Name of Stock").create("name");
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
      if (cmd.hasOption("help") || !cmd.hasOption("name") || !cmd.hasOption("stock")) {
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
    trainer.executeTraining(cmd.getOptionValue("name"), cmd.getOptionValue("stock"));
  }

  /**
   * 
   */
  public Trainer() {
  //
  }

  public void executeTraining(final String stockname, final String filename) {
    final File file = new File(filename);
    if (!file.canRead()) {
      System.err.println("Cannot read from file " + filename);
      return;
    }

    try {
      final SortedSet<Bar> list = readCsvYahoo(file);
      final Training training = new Training(stockname, list);
      training.execute();

    } catch (final IOException e) {
      System.err.println("Cannot Read from file <" + filename + ">");
    } catch (final java.text.ParseException e) {
      System.err.println("File <" + filename + "> has broken format");
    }
  }

  public SortedSet<Bar> readCsvYahoo(final File file) throws IOException, java.text.ParseException {
    final YahooCsvReader reader = new YahooCsvReader();
    return reader.read(file);
  }

}
