package ssd3;

/**
 *
 * @author Shane Doyle
 * @id 20012081
 * @course Software Systems Development Year 3
 * @date 19-01-2011
 */

import java.awt.FlowLayout;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import javax.swing.JTextField;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.SwingConstants;
import javax.swing.Icon;
import javax.swing.ImageIcon; 
import javax.swing.JOptionPane;

public class fahrenheitFrame extends JFrame implements ActionListener
{
    private JTextField fahrenheitTextBox;
    private JTextField celsiusTextBox;
    private JButton myButton;

    public void actionPerformed( ActionEvent event )
    {
        String celsiusValue, fahrenheitValue;
        int celsius, fahrenheit;
        
        fahrenheitValue = fahrenheitTextBox.getText();
        fahrenheit = Integer.parseInt(fahrenheitValue);
        celsius = (fahrenheit - 32) * 5/9;
        celsiusValue = Double.toString(celsius);
        celsiusTextBox.setText(celsiusValue);
    }

    public fahrenheitFrame()
    {
        super( "Fahrenheit Converter" );
        getContentPane().setLayout( new FlowLayout() );

        fahrenheitTextBox = new JTextField(6);
        fahrenheitTextBox.setText("Fahrenheit");
        getContentPane().add( fahrenheitTextBox );

        celsiusTextBox = new JTextField(6);
        celsiusTextBox.setText("Celsius");
        celsiusTextBox.setEditable(false);
        getContentPane().add(celsiusTextBox);

        //InnerClassException myException = new InnerClassException();
        myButton = new JButton();
        myButton.setText("Enter");
        //myButton.addActionListener(myException);
        myButton.addActionListener(this);
        getContentPane().add( myButton );

        

        
    }

//    private class InnerClassException implements ActionListener
//    {
//        public void actionPerformed( ActionEvent event )
//        {
//            String celsiusValue, fahrenheitValue;
//            int celsius, fahrenheit;
//
//            fahrenheitValue = fahrenheitTextBox.getText();
//            celsiusValue = celsiusTextBox.getText();
//
//            fahrenheit = Integer.parseInt(fahrenheitValue);
//            celsius = (fahrenheit - 32) * 5/9;
//            celsiusValue = Double.toString(celsius);
//            celsiusTextBox.setText(celsiusValue);
//        }
//    }


}