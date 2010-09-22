package de.oa.nn.trainer.network;

import java.util.ArrayList;

import org.neuroph.nnet.MultiLayerPerceptron;
import org.neuroph.util.TransferFunctionType;

import de.oa.system.Signal;

public class Network {
  final MultiLayerPerceptron myMlPerceptron;

  public Network() {
    myMlPerceptron = new MultiLayerPerceptron(TransferFunctionType.TANH, 40, 400, 400, 3);
  }

  public void training(ArrayList<Signal> resultList) {

  }
}
