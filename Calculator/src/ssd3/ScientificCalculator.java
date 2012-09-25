package ssd3;

/**
 * This is an extra class that is used to update the scientific calculator
 * @author Shane Doyle - 20012081
 * @date 20 Feabh 2011
 *
 */
public class ScientificCalculator extends MemoryCalculator
{
    public ScientificCalculator()
    {
        addButton("Pi");
    }

    public void onClick(char c)
    {
        switch(c)
        {
            case 'p' :
                operation = c;
                operand = accumulator;
                accumulator = 3.14159;
                break;

            default : super.onClick(c);
        }
    }

    public void equal()
    {
        switch(operation)
        {
            // Pi
            case 'p' :
                accumulator = accumulator * operand;
                break;
        }
    }

}
