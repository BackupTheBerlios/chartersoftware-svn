package de.oa.hs.simulator.interfaces;

/**
 * holds information about Sell/Buy potential values would be GoLong, GoShort, CloseLong, CloseShort, Hold,
 * Ignore
 * 
 * @author abehrens
 * 
 */
public enum ESignal {
  GO_LONG(0), GO_SHORT(1), CLOSE_LONG(2), CLOSE_SHORT(3), HOLD(4), IGNORE(5);
  final int value;

  ESignal(int v) {
    this.value = v;
  }

  public int getValue() {
    return this.value;
  }

}
