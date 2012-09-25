import java.awt.*;
import java.awt.event.*;
import java.awt.image.BufferedImage;
import javax.swing.*;

public class Paint {
	
	   public Paint() {
	       JFrame frame = new JFrame("Paint");
		   
	       JPanel pane = new JPanel(new BorderLayout());
	       pane.add(dp, BorderLayout.CENTER);
	       pane.add(getButtonPanel(), BorderLayout.SOUTH);
	       frame.add(pane);
	       frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	       frame.setSize(676,580);
	       frame.setVisible(true);
	   }	
	
	   class DrawingPanel extends JPanel {

	       private Graphics g1;
	       private BufferedImage img;
	       private Color color;
	       
	       public DrawingPanel(int width, int height) {
	           super();
	           img = new BufferedImage(width, height, BufferedImage.TYPE_INT_ARGB);
	           g1 = img.createGraphics();
	           g1.setColor(Color.WHITE); 
	           g1.fillRect(0, 0, width, height); 
	           setPreferredSize(new Dimension(width, height));
	           MyMouseListener ml = new MyMouseListener(); // Creating the mouse listener
	           this.addMouseListener(ml);
	           this.addMouseMotionListener(ml);
	       }
	       public void paint(Graphics g) {
	    	   Image imageOutline = Toolkit.getDefaultToolkit().getImage("paint_outline.gif");
	           g.drawImage(img, 0, 0, null);
	           g.drawImage(imageOutline, 0, 0, null);
	       }
	       public void setColor(Color color) {
	           this.color = color;
	       }
	       ////////////////
	   	    public void clear() {
			g1.setColor(Color.white);
			g1.fillRect(0, 0, getWidth(), getHeight());
			repaint();
		    }
	       ////////////////////////////
	      class MyMouseListener extends MouseAdapter {
	           private int x1, y1;
	           public void mousePressed(MouseEvent e) {
	               x1 = e.getX();
	               y1 = e.getY();
	           }
	           public void mouseDragged(MouseEvent e) {
	               g1.setColor(color);
	               g1.fillOval(x1,y1,10,10);
	               x1 = e.getX();
	               y1 = e.getY();
	               repaint();
	           }
	       }
	   }
	   
	   //Creates a JPanel called dp
	   DrawingPanel dp = new DrawingPanel(666,485);
   
   public JPanel getButtonPanel() {
	   //Creating the panel for my buttons
       final JButton[] buttons = new JButton[7];
       final JButton resetbutton = new JButton("Reset");
       
       JPanel buttonPanel = new JPanel();
       buttonPanel.setLayout(new GridLayout(2,4));
       
       //Adding buttons into my JPanel buttonpanel
       for (int i = 0;i<7;i++){buttonPanel.add(buttons[i]=new JButton(""+(1+i)));}
       buttonPanel.add(resetbutton);

       //Adding the action listeners to my buttons
      for (int i = 0;i<buttons.length;i++) {buttons[i].addActionListener(new ActionListener() {

		public void actionPerformed(ActionEvent event) {
			if(event.getSource()==buttons[0]) dp.setColor(Color.red);
			if(event.getSource()==buttons[1]) dp.setColor(Color.yellow);
			if(event.getSource()==buttons[2]) dp.setColor(Color.green);
			if(event.getSource()==buttons[3]) dp.setColor(Color.blue);
			if(event.getSource()==buttons[4]) dp.setColor(Color.orange);
			if(event.getSource()==buttons[5]) dp.setColor(Color.cyan);
			if(event.getSource()==buttons[6]) dp.setColor(Color.black);
		}});}
      
      resetbutton.addActionListener(new ActionListener(){
    	  public void actionPerformed(ActionEvent event){
    		  if(event.getSource()==resetbutton) dp.clear();
    		  
    	  }
      });
      
      //Setting the background colour of my Buttons
      for (int i = 0;i<buttons.length;i++) {buttons[i].setForeground(Color.white);}
      
  		buttons[0].setBackground(Color.red);
  		buttons[1].setBackground(Color.yellow);
  		buttons[2].setBackground(Color.green);
  		buttons[3].setBackground(Color.blue);
  		buttons[4].setBackground(Color.orange);
  		buttons[5].setBackground(Color.cyan);
  		buttons[6].setBackground(Color.black);
  		
        resetbutton.setBackground(Color.white);
        resetbutton.setForeground(Color.black);
        
       //returning my button panel 
       return buttonPanel;
   }
   
   public static void main(String[] args) {
	   Paint run = new Paint();
   }
}