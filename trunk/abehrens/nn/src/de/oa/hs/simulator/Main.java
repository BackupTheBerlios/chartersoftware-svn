package de.oa.hs.simulator;

import org.apache.commons.cli.CommandLine;
import org.apache.commons.cli.CommandLineParser;
import org.apache.commons.cli.HelpFormatter;
import org.apache.commons.cli.Option;
import org.apache.commons.cli.OptionBuilder;
import org.apache.commons.cli.Options;
import org.apache.commons.cli.ParseException;
import org.apache.commons.cli.PosixParser;

public class Main {

  /**
   * @param args
   */
  @SuppressWarnings("static-access")
  public static void main(String[] args) {

    // setup command line options
    final Options options = new Options();
    final Option help = new Option("help", "print help text");
    final Option path = OptionBuilder.withArgName("path").hasArg().withDescription("pathname for stock files").create(
        "path");
    final Option threads = OptionBuilder.withArgName("threads").hasArg().withDescription(
        "max amount of threads. Default is single threaded.").create("threads");
    options.addOption(path);
    options.addOption(help);
    options.addOption(threads);

    final CommandLineParser parser = new PosixParser();
    final CommandLine cmd;
    try {
      cmd = parser.parse(options, args);
      if (cmd.hasOption(help.getArgName()) || !cmd.hasOption(path.getArgName())) {
        final HelpFormatter formatter = new HelpFormatter();
        formatter.printHelp("Simulator", options);
        return;
      }
    } catch (final ParseException exp) {
      final HelpFormatter formatter = new HelpFormatter();
      formatter.printHelp("Simulator", options);
      return;
    }

    int maxThreads = 2;
    if (cmd.hasOption(threads.getArgName())) {
      String s = cmd.getOptionValue(threads.getArgName());
      maxThreads = Integer.parseInt(s);
    }

    new SimulationStarter(cmd.getOptionValue(path.getArgName()), maxThreads).simulate();
  }

}
