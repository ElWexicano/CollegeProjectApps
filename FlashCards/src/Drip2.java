import java.awt.*;
import javax.swing.*;
import java.util.Random;

public class Drip2 implements Runnable{
private int xpos, delay;
private Component comp;
private Thread t=new Thread(this);

public Drip2(int x, Component c, int s) {
xpos=x;
comp=c;
delay=s;
}

public void start() {
t.start();
}

public void run() {

int ypos=0;
Graphics g=comp.getGraphics();
g.setColor(Color.green);

while(ypos<comp.getHeight())
{
g.fillOval(xpos,ypos,15,15);
ypos=ypos+2;

try {
Thread.sleep(delay);  // or t.sleep(delay);
} catch(InterruptedException e) {}
}

}


public static void main(String[] args) {

JFrame f=new JFrame("Drip Test");
f.setSize(600,500);
f.setVisible(true);

Drip2 x=new Drip2(300,f.getContentPane(),100);
Drip2 p=new Drip2(450,f.getContentPane(),150);
x.start();
p.start();

Random rand=new Random();


}

}