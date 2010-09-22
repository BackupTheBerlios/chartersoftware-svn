package de.oa.nn.trainer.network;

import java.util.Vector;

import org.neuroph.core.NeuralNetwork;
import org.neuroph.core.learning.SupervisedTrainingElement;
import org.neuroph.core.learning.TrainingElement;
import org.neuroph.core.learning.TrainingSet;
import org.neuroph.nnet.MultiLayerPerceptron;
import org.neuroph.util.TransferFunctionType;

public class MLPSample {
  public MLPSample() {
    TrainingSet trainingSet = new TrainingSet();
    trainingSet.addElement(new SupervisedTrainingElement(new double[] { 0, 0 }, new double[] { 0 }));
    trainingSet.addElement(new SupervisedTrainingElement(new double[] { 0, 1 }, new double[] { 1 }));
    trainingSet.addElement(new SupervisedTrainingElement(new double[] { 1, 0 }, new double[] { 1 }));
    trainingSet.addElement(new SupervisedTrainingElement(new double[] { 1, 1 }, new double[] { 0 }));

    // create multi layer perceptron
    MultiLayerPerceptron myMlPerceptron = new MultiLayerPerceptron(TransferFunctionType.TANH, 2, 3, 1);
    // learn the training set
    myMlPerceptron.learnInSameThread(trainingSet);
    // test perceptron
    System.out.println("Testing trained neural network");
    testNeuralNetwork(myMlPerceptron, trainingSet);
    // save trained neural network
    myMlPerceptron.save("myMlPerceptron.nnet");
    // load saved neural network
    NeuralNetwork loadedMlPerceptron = NeuralNetwork.load("myMlPerceptron.nnet");
    // test loaded neural network
    System.out.println("Testing loaded neural network");
    testNeuralNetwork(loadedMlPerceptron, trainingSet);
  }

  public void testNeuralNetwork(NeuralNetwork nnet, TrainingSet tset) {
    for (TrainingElement trainingElement : tset.trainingElements()) {
      nnet.setInput(trainingElement.getInput());
      nnet.calculate();
      Vector<Double> networkOutput = nnet.getOutput();
      System.out.print("Input: " + trainingElement.getInput());
      System.out.println(" Output: " + networkOutput);
    }
  }
}
