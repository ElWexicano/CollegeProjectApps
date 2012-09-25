package ssd3;

/**
 * Is a Calculator class with the additional fields and methods, specifically memory that can be stored, recalled or cleared using the SM, RM and MC buttons.
 * @author Shane Doyle - 20012081
 * @date 20 Feabh 2011
 */

public class MemoryCalculator extends Calculator
{
    private double memory = 0.0;

    public MemoryCalculator()
    {
        addButton("RM");
        addButton("SM");
        addButton("MC");
    }

    /**
     * This is where the SM, RM, MC button events are handled or the super class onClick() method is invoked for any other button as default.
     * @param c - charachter
     */
    public void onClick(char c)
    {
        switch(c)
        {
            // Clear Memory
            case 'C':
                setAccumulator(0.0);
                setOperand(0.0);
                updateDisplay(getAccumulator()+"");
                break;
            // Recall Memory
            case 'R':
                setAccumulator(memory);
                updateDisplay(getAccumulator()+"");
                break;
            // Store Memory
            case 'S':
                memory = getAccumulator();
                break;
            // Memory Calculator
            case 'M':
                memory = 0.0;
                break;
                
            default : super.onClick(c);
        }
    }
}
