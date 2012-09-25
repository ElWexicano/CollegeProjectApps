import java.awt.*;
import javax.swing.*;
public class USElection extends JApplet {
private int dvotes, rvotes, dpercent, rpercent;
public void init() {
//Convert string parameters to integers
dvotes=Integer.parseInt(getParameter("demototal"));
rvotes=Integer.parseInt(getParameter("reptotal"));
dpercent=dvotes/((dvotes+rvotes)/100);
rpercent=rvotes/((dvotes+rvotes)/100);
}
public void paint(Graphics g) {
g.drawString("Democrats",20,30);
g.drawString("Republicans",20,80);
g.drawString(dpercent+"%",100+dpercent*2+10,30);
g.drawString(rpercent+"%",100+rpercent*2+10,80);
g.setColor(Color.blue);
g.fillRect(100,10,dpercent*2,30);
g.setColor(Color.red);
g.fillRect(100,60,rpercent*2,30);
}
}