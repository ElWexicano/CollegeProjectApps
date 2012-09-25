import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public class Window{
	
	private JTextArea text = new JTextArea();
	private JButton button = new JButton("Click Me");
	
	public Window(){
		JFrame frame = new JFrame();
		
		frame.setVisible(true);
		frame.setSize(400,400);
		frame.setTitle("Window");
		frame.getContentPane().setLayout(new FlowLayout());
		frame.getContentPane().setBackground(Color.green);
		
		frame.getContentPane().add(text);
		frame.getContentPane().add(button);
		
	}
	
	public void main(String[] args){
		Window mywindow = new Window();
	}
}