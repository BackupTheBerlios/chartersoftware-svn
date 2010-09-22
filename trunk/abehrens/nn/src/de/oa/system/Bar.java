package de.oa.system;

import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.GregorianCalendar;

public class Bar implements Comparable<Bar> {
  final private static SimpleDateFormat dateFormatter = new SimpleDateFormat("yyyy-MM-dd");
  final private static DateFormat formatterDay = new SimpleDateFormat("E");
  final private static DateFormat formatterDate = new SimpleDateFormat("ddMMyyyy-HHmmss");

  private Calendar time;
  private double open;
  private double close;
  private double adjclose;
  private double low;
  private double high;
  private int volume;

  public Bar(String time, String open, String close, String low, String high, String volume, String adjclose)
      throws ParseException {
    this.time = new GregorianCalendar();
    this.time.setTime(dateFormatter.parse(time));
    this.open = Double.parseDouble(open);
    this.close = Double.parseDouble(close);
    this.adjclose = Double.parseDouble(adjclose);
    this.low = Double.parseDouble(low);
    this.high = Double.parseDouble(high);
    this.volume = Integer.parseInt(volume);
  }

  @Override
  public int compareTo(Bar that) {
    final int BEFORE = -1;
    final int EQUAL = 0;
    final int AFTER = 1;

    // this optimization is usually worthwhile, and can
    // always be added
    if (this == that)
      return EQUAL;

    if (time.before(that.time))
      return BEFORE;
    if (time.after(that.time))
      return AFTER;
    return EQUAL;
  }

  /*
   * (non-Javadoc)
   * 
   * @see java.lang.Object#equals(java.lang.Object)
   */
  @Override
  public boolean equals(Object obj) {
    if (this == obj)
      return true;
    if (obj == null)
      return false;
    if (getClass() != obj.getClass())
      return false;
    final Bar other = (Bar) obj;
    if (time == null) {
      if (other.time != null)
        return false;
    } else
      if (!time.equals(other.time))
        return false;
    return true;
  }

  /**
   * @return the adjclose
   */
  public double getAdjclose() {
    return adjclose;
  }

  /**
   * @return the close
   */
  public double getClose() {
    return close;
  }

  /**
   * @return the high
   */
  public double getHigh() {
    return high;
  }

  /**
   * @return the low
   */
  public double getLow() {
    return low;
  }

  /**
   * @return the open
   */
  public double getOpen() {
    return open;
  }

  /**
   * @return the time
   */
  public Calendar getTime() {
    return time;
  }

  public String getTimeAsString() {
    return formatterDate.format(getTime().getTime());
  }

  /**
   * @return the volume
   */
  public int getVolume() {
    return volume;
  }

  public int getWeekdayAsInt() {
    return time.get(Calendar.DAY_OF_WEEK);
  }

  public String getWeekdayAsString() {
    return formatterDay.format(getTime().getTime());
  }

  /*
   * (non-Javadoc)
   * 
   * @see java.lang.Object#hashCode()
   */
  @Override
  public int hashCode() {
    final int prime = 31;
    int result = 1;
    result = prime * result + ((time == null) ? 0 : time.hashCode());
    return result;
  }

  /**
   * @param adjclose
   *          the adjclose to set
   */
  public void setAdjclose(double adjclose) {
    this.adjclose = adjclose;
  }

  /**
   * @param close
   *          the close to set
   */
  public void setClose(double close) {
    this.close = close;
  }

  /**
   * @param high
   *          the high to set
   */
  public void setHigh(double high) {
    this.high = high;
  }

  /**
   * @param low
   *          the low to set
   */
  public void setLow(double low) {
    this.low = low;
  }

  /**
   * @param open
   *          the open to set
   */
  public void setOpen(double open) {
    this.open = open;
  }

  /**
   * @param time
   *          the time to set
   */
  public void setTime(Calendar time) {
    this.time = time;
  }

  /**
   * @param volume
   *          the volume to set
   */
  public void setVolume(int volume) {
    this.volume = volume;
  }

  /*
   * (non-Javadoc)
   * 
   * @see java.lang.Object#toString()
   */
  @Override
  public String toString() {
    final StringBuilder builder = new StringBuilder();
    builder.append("Bar<");
    builder.append(getTimeAsString());
    builder.append("> [");

    builder.append("open=");
    builder.append(open);

    builder.append('\t');
    builder.append("low=");
    builder.append(low);

    builder.append('\t');
    builder.append("high=");
    builder.append(high);

    builder.append('\t');
    builder.append("close=");
    builder.append(close);

    builder.append(']');
    return builder.toString();
  }

}
