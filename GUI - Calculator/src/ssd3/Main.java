package ssd3;

import java.awt.FlowLayout;
import javax.swing.JFrame;

/**
 * This is how the GUI Calculator can be used as Java Application
 * @author Shane Doyle - 20012081
 * @date 20 Feabh 2011
 */
public class Main extends JFrame
{
    // Creating an instance of the Memory Calculator
    MemoryCalculator myCalculator = new MemoryCalculator();

    /**
     * Creating the application and adding the calculator to the JFrame.
     */
    public Main()
    {
        setVisible(true);
        setSize(200,200);
        setTitle("Calculator Application");
        add(myCalculator);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    }

    /**
     * The application start
     */
    public static void main( String args[] )
    {
        Main myApp = new Main();
    }
}
