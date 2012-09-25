import java.awt.*;

import javax.swing.*;

import java.awt.event.ActionEvent;

import java.awt.event.ActionListener;

import java.awt.Dimension;

import java.awt.Graphics;

import java.util.Random;

public class AnimatedFish extends JPanel

{

private final int ANIMATION_DELAY = 50;

private int hMove;

private int vMove;

private int hDirection;

protected ImageIcon fish;

private Timer fishTimer;

private static Random rand = new Random();

private class FishListener implements ActionListener

{

public void actionPerformed(ActionEvent actionevent)

{

//changes the direction of the fish when it reaches the ends

hMove += hDirection * 5;

if(hMove >= (getWidth()-100) || hMove < 0)

{

hDirection = -hDirection;

}

repaint();

}

final AnimatedFish listener;

private FishListener()

{

super();

listener = AnimatedFish.this;

}

}

// constructor that controls the speed, starting direction, position of the fish

// and also starts the animation going.

public AnimatedFish()

{

hDirection = 1;

hMove = 0;

fishTimer = new Timer(ANIMATION_DELAY, new FishListener()); //test is animation_delay

fishTimer.start();

}

public void paintComponent( Graphics g )

{

super.paintComponent(g);

// changes the picture so the fish is going traveling the corrrect way

if (hDirection > 0)

{

fish = new ImageIcon("cockroach.gif");

}

else

{

fish = new ImageIcon("cockroach.gif");

}

//this displays the fish and give the fish its position

fish.paintIcon(this, g, hMove, 0);

}

}