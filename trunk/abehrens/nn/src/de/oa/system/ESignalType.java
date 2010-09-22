package de.oa.system;

public enum ESignalType {
  GO_LONG(0), GO_SHORT(1), DO_NOTHING(2);

  private int id;

  ESignalType(final int id) {
    this.id = id;

  }

  public int getId() {
    return id;
  }

}
