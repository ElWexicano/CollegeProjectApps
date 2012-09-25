package ssd3;

/**
 *
 * @author Shane Doyle
 * @id 20012081
 * @course Software Systems Development Year 3
 * @date 19-01-2011
 */
import javax.swing.JFrame;

public class LabelTest
{
   public static void main( String args[] )
   {
      upDownApp labelFrame = new upDownApp();
      labelFrame.setDefaultCloseOperation( JFrame.EXIT_ON_CLOSE );
      labelFrame.setSize( 275, 180 ); 
      labelFrame.setVisible( true );
   } 
}
