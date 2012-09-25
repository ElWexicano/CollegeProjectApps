package ssd3;

/**
 * The calculator adds addition, subtraction, multiplication and division calculation to a UserInteraction class which defines the user interface display and keypad.
 * @author Shane Doyle - 20012081
 * @date 20 Feabh 2011
 */

public class Calculator extends UserInterface
{
    public double accumulator = 0.0, operand;
    public char operation;

    /**
     * Adds calculator buttons
     */
    public Calculator()
    {
        /* 1st Row Buttons */
        addButton("1");
        addButton("2");
        addButton("3");
        addButton("+");
        addButton("-");

        /* 2nd Row Buttons */
        addButton("4");
        addButton("5");
        addButton("6");
        addButton("*");
        addButton("/");

        /* 3rd Row Buttons */
        addButton("7");
        addButton("8");
        addButton("9");
        addButton("0");
        addButton("=");

        /* 4th Row Buttons */
        addButton("CR");
    }

    /**
     * Each button click invokes the onClick() method which serves to change the calculator state.
     * @param c - charachter
     */
    public void onClick(char c)
    {
        switch(c)
        {
            case '1':
                accumulator = accumulator * 10 + 1;
                break;
            case '2' :
                accumulator = accumulator * 10 + 2;
                break;
            case '3' :
                accumulator = accumulator * 10 + 3;
                break;
            case '4' :
                accumulator = accumulator * 10 + 4;
                break;
            case '5' :
                accumulator = accumulator * 10 + 5;
                break;
            case '6' :
                accumulator = accumulator * 10 + 6;
                break;
            case '7' :
                accumulator = accumulator * 10 + 7;
                break;
            case '8' :
                accumulator = accumulator * 10 + 8;
                break;
            case '9' :
                accumulator = accumulator * 10 + 9;
                break;
            case '0' :
                accumulator = accumulator * 10 + 0;
                break;
            // Equal
            case '=':
                equal();
                break;
            // Subtraction
            case '-':
                operation = c;
                operand = accumulator;
                accumulator = 0.0;
                break;
            // Addition
            case '+':
                operation = c;
                operand = accumulator;
                accumulator = 0.0;
                break;
            // Division
            case '/':
                operation = c;
                operand = accumulator;
                accumulator = 0.0;
                break;
            // Multiplication
            case '*':
                operation = c;
                operand = accumulator;
                accumulator = 0.0;
                break;
            default: ;
        }
        
        updateDisplay(getAccumulator()+"");
    }

    /**
     * Performs the aritmetic operation entered (+, -, *, /)
     */
    public void equal()
    {
        switch(operation)
        {
            // Addition
            case '+' :
                accumulator = accumulator + operand;
                break;
            // Subtraction
            case '-' :
                accumulator = operand - accumulator;
                break;
            // Multiplication
            case '*' :
                accumulator = accumulator * operand;
                break;
            // Division
            case '/' :
                accumulator = operand / accumulator;
                break;
        }
    }

    /**
     * Returns the value of the accumulator field
     * @return accumulator
     */
    public double getAccumulator()
    {
        return accumulator;
    }

    /**
     * Sets the value of the accumulator field
     * @param acc - double
     */
    public void setAccumulator(double acc)
    {
        accumulator = acc;
    }

    /**
     * Returns the value of the operand field
     * @return operand
     */
    public double getOperand()
    {
        return operand;
    }

    /**
     * Sets the value of the operand field
     * @param newOperand - douuble
     */
    public void setOperand(double newOperand)
    {
        operand = newOperand;
    }

    /**
     * Returns the value of the operation field
     * @return operation
     */
    public char getOperation()
    {
        return operation;
    }

    /**
     * Sets the value of the operation field
     * @param newOperation - charachter
     */
    public void setOperation(char newOperation)
    {
        operation = newOperation;
    }

}