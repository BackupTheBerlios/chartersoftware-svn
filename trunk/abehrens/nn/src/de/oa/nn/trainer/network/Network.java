package de.oa.nn.trainer.network;

import org.neuroph.nnet.MultiLayerPerceptron;
import org.neuroph.util.TransferFunctionType;

public class Network {
  final MultiLayerPerceptron myMlPerceptron;

  public Network() {
    myMlPerceptron = new MultiLayerPerceptron(TransferFunctionType.TANH, 2, 3, 1);
  }
}
