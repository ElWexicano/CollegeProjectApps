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

public class randomNumberFrame extends JFrame implements ActionListener
{
    private JLabel randomNumberFrame;
    private JButton myButton;

    public void actionPerformed( ActionEvent event )
    {
        randomNumberFrame.setText(
                                "Magic number ..... "
                                +
                                (int)(Math.random()*100)
                                );
    }

    public randomNumberFrame()
    {
        super( "Random Number" );
        getContentPane().setLayout( new FlowLayout() );

        randomNumberFrame = new JLabel();
        randomNumberFrame.setText("Magic number ..... ");
        getContentPane().add(randomNumberFrame);

        myButton = new JButton();
        myButton.setText("Enter");
        myButton.addActionListener(this);
        getContentPane().add( myButton );
    }

}