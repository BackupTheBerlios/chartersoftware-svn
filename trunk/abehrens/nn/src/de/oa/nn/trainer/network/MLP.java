package de.oa.nn.trainer.network;

import java.util.ArrayList;

import org.neuroph.core.learning.SupervisedTrainingElement;
import org.neuroph.core.learning.TrainingSet;
import org.neuroph.nnet.MultiLayerPerceptron;
import org.neuroph.util.TransferFunctionType;

import de.oa.nn.trainer.interfaces.INeuralNetwork;
import de.oa.system.Bar;
import de.oa.system.Signal;

public class MLP implements INeuralNetwork {
  final MultiLayerPerceptron network;
  final int numOfBars;

  public MLP(final int numOfBars) {
    this.numOfBars = numOfBars;
    network = new MultiLayerPerceptron(TransferFunctionType.TANH, // transfer function
        numOfBars * 5, // input layer
        numOfBars, // 1st hidden layer
        //numOfBars * 5 * 5, // 2nd hidden layer
        //numOfBars * 5 * 5, // 3th hidden layer
        //numOfBars * 5 * 5, // 4th hidden layer
        1 // output layer
    );
  }

  public void training(ArrayList<Signal> resultList) {
    // setup traing set
    TrainingSet trainingSet = new TrainingSet(numOfBars * 5, 1);
    for (int i = 0; i < resultList.size() - numOfBars - new Double(resultList.size() * 0.8).intValue(); i++) {
      // i is the starting point for a new training element
      // a training element are the now + 40 next bars

      // setup input
      final double[] input = new double[numOfBars * 5]; // enough to store numOfBars bars
      int inputPos = 0;

      // transfer bars to traingelement
      int s = i;
      Signal signal = null;
      for (; s < (i + numOfBars); s++) {
        signal = resultList.get(s);
        final Bar bar = signal.getBar();

        input[inputPos++] = bar.getOpen();
        input[inputPos++] = bar.getLow();
        input[inputPos++] = bar.getHigh();
        input[inputPos++] = bar.getClose();
        input[inputPos++] = bar.getVolume();

      }

      if (signal == null) {
        throw new NullPointerException("signal not initialized");
      }

      // setup output
      final double[] output;
      switch (signal.getSignalType()) {
      case DO_NOTHING:
        output = new double[] { 0 };
        break;
      case GO_LONG:
        output = new double[] { 1 };
        break;
      case GO_SHORT:
        output = new double[] { -1 };
        break;
      default:
        output = new double[] { 0 };
      }

      // add the training element
      trainingSet.addElement(new SupervisedTrainingElement(input, output));
    }

    // lern the traing set
    network.learnInSameThread(trainingSet);
    network.save("/tmp/mySamplePerceptron.nnet");

  }

  public void testing(ArrayList<Signal> resultList) {
  /*
   * NeuralNetwork loadedPerceptron = NeuralNetwork.load("/tmp/mySamplePerceptron.nnet");
   * System.out.println("Testing loaded perceptron"); for (TrainingElement trainingElement :
   * trainingSet.trainingElements()) { neuralNet.setInput(trainingElement.getInput()); neuralNet.calculate();
   * Vector<Double> networkOutput = neuralNet.getOutput();
   * 
   * System.out.print("Input: " + trainingElement.getInput()); System.out.println(" Output: " +
   * networkOutput); }
   */
  }

}
