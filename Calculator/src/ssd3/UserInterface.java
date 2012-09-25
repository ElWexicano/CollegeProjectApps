package ssd3;

import java.awt.*;
import java.awt.event.*;

/**
 * Used to create an interface with buttons that have actionListeners connected to them
 * @author shane doyle - 20012081
 * @date 20 Feabh 2011
 **/
abstract class UserInterface extends Panel
{
    /**
     * An event handle for button clicks
     */
    private class buttonHandler implements ActionListener
    {
        public void actionPerformed(ActionEvent e)
        {
            onClick(e.getActionCommand().charAt(0));
        }
    }

    private TextField display;
    private Panel keypad;

    /**
     * Constructor that defines the user interface display and keypad
     */
    public UserInterface()
    {
        this.setLayout(new BorderLayout());
        display = new TextField(0);
        this.add("North", display);

        keypad = new Panel();
        keypad.setLayout(new GridLayout(4,5));
        this.add("Center",keypad);
    }

    /**
     * An unimplemented method necessary to satisfy the definition of the ButtonHandler inner-class
     * @param c - First Charachter
     */
    public void onClick( char c ){}

    /**
     * Constructs a button, adds the button to the keypad and connects the button to the button handler.
     * @param s - label String
     */
    public void addButton( String s )
    {
        Button b = new Button(s);
        keypad.add( b );
        b.addActionListener( new buttonHandler() );
    }

    /**
     * Updates display to the String s parameter
     * @param s - display parameter
     */
    public void updateDisplay( String s )
    {
        display.setText(s);
    }

}