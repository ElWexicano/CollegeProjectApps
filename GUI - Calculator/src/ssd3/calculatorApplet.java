package ssd3;

import java.applet.Applet;

/**
 * This is how the GUI Calculator can be used as a java applet
 * @author Shane Doyle - 20012081
 * @date 20 Feabh 2011
 */
public class calculatorApplet extends Applet
{

    MemoryCalculator myCalculator = new MemoryCalculator();

    /**
     * The Applet start
     */
    public void init()
    {
        add(myCalculator);
    }

    



}