package de.oa.nn.trainer.interfaces;

import java.util.ArrayList;

import de.oa.system.Signal;

public interface INeuralNetwork {


  public void training(ArrayList<Signal> resultList);
  public void testing(ArrayList<Signal> resultList);
}
