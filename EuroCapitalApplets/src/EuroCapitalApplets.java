import java.awt.*;
import java.util.*;

import javax.swing.*;

public class EuroCapitalApplets extends JApplet{
	
	String[] cityname = new String[20];
	HashMap<String,Point> h=new HashMap<String,Point>();
	boolean linked;
	
	public void init(){
		
		String input = getParameter("citiestomark");
		String input1 = getParameter("linkcities");
		cityname = input.split(",");
		linked = Boolean.parseBoolean(input1);
		
		h.put("Dublin", new Point(145,225));
		h.put("Lisbon", new Point(74,413));
		h.put("Athens", new Point(400,458));
		h.put("Istanbul", new Point(462,420));
		h.put("Berlin", new Point(293,255));
		h.put("Reykavik", new Point(46,86));
		h.put("London", new Point(194,262));
		h.put("Paris", new Point(197,308));
		h.put("Rome", new Point(300,412));
		h.put("Moscow", new Point(494,165));
		h.put("Palma", new Point(191,428));
		h.put("Venice", new Point(293,358));
		h.put("Kiev", new Point(450,291));
		h.put("Edinburgh", new Point(190,202));
		h.put("Izmir", new Point(462,458));
		h.put("Riga", new Point(397,203));
		h.put("Warsaw", new Point(364,259));
		h.put("Madrid", new Point(124,395));
		h.put("Oslo", new Point(291,171));
		h.put("Stockholm", new Point(339,176));
		h.put("Minsk", new Point(431,235));
		h.put("Amsterdam", new Point(246,254));
		h.put("Brussels", new Point(229,280));
		h.put("Copenhagen", new Point(302,223));
		h.put("Monaco", new Point(234,383));
		
	}
public void paint(Graphics g) {
	
Image europe = Toolkit.getDefaultToolkit().getImage(getClass().getResource("europe.jpg"));
g.drawImage(europe, 0, 0, this);

Font bold = new Font("Calibri",Font.BOLD,16);
g.setFont(bold);
g.setColor(Color.blue);

int tx=0;
int ty=0;

//This is where we set the start of the line to the co-ordinates of the first city//
Point startpoint=h.get(cityname[0]);
tx=startpoint.x;
ty=startpoint.y;

for (int i=0;i<cityname.length;i++)
{
if(h.containsKey(cityname[i]))
{
	
	Point p=h.get(cityname[i]);
	g.drawString(cityname[i],p.x+10,p.y+10);
	g.fillOval(p.x, p.y, 7, 7);
	if (linked==true)
	{
	g.setColor(Color.red);
	g.drawLine(p.x, p.y, tx, ty);
	tx=p.x;
	ty=p.y;
	}
	g.setColor(Color.blue);
}

}


}

}
