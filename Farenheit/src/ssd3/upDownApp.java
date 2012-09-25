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

public class upDownApp extends JFrame implements ActionListener
{
    private JLabel myLabel;
    private JButton incrementButton;
    private JButton decrementButton;
    int numericValue;

    // Centralised Event Approach
    public void actionPerformed( ActionEvent event )
    {
        String command = event.getActionCommand();

        numericValue += ( command.equals("Increment") ) ? 1 : -1;
        
        myLabel.setText(""+numericValue);
    }

    public upDownApp()
    {
        super( "Up and Down App" );
        getContentPane().setLayout( new FlowLayout() );

//        InnerClassException myException = new InnerClassException();

        incrementButton = new JButton();
        incrementButton.setText("Increment");
        incrementButton.addActionListener(this);
        getContentPane().add( incrementButton );
//        incrementButton.addActionListener(myException);

        //Anonymous Action Listener
//        incrementButton.addActionListener(new ActionListener()
//        {
//            public void actionPerformed(ActionEvent event)
//            {
//                numericValue += -1;
//                myLabel.setText(""+numericValue);
//            }
//        });

        decrementButton = new JButton();
        decrementButton.setText("Decrement");
        decrementButton.addActionListener(this);
        getContentPane().add( decrementButton );
//        decrementButton.addActionListener(myException);

        //Anonymous Action Listener
//        decrementButton.addActionListener(new ActionListener()
//        {
//            public void actionPerformed(ActionEvent event)
//            {
//                numericValue += -1;
//                myLabel.setText(""+numericValue);
//            }
//        });


        numericValue = 0;

        myLabel = new JLabel();
        myLabel.setText(""+numericValue);
        getContentPane().add(myLabel);
    }
    
    //Inner Class Approach
//    private class InnerClassException implements ActionListener
//    {
//        public void actionPerformed( ActionEvent event )
//        {
//            String command = event.getActionCommand();
//
//            numericValue += ( command.equals("Increment") ) ? 1 : -1;
//
//            myLabel.setText(""+numericValue);
//        }
//    }
    
}