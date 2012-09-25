/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package ssd3;

import junit.framework.TestCase;

/**
 *
 * @author Shane
 */
public class CounterTest extends TestCase
{
    Counter counter1;

    public CounterTest(String name)
    {
        super(name);
    }

    protected void setUp() throws Exception
    {
        counter1 = new Counter(0);
    }

    protected void tearDown() throws Exception
    {
        counter1 = null;
    }

    public void testIncrement()
    {
        int result = counter1.increment();
        assertEquals("1st increment.",1 ,result);
        result = counter1.increment();
        assertEquals("2nd increment.",2, result);
    }

    public void testDecrement()
    {
        int result = counter1.decrement();
        assertEquals("Decrement.",-1, result);
    }

    public void testReset()
    {
        counter1.reset();
        assertEquals(1, counter1.getCount());
    }

    public void testStepUp()
    {
        int result = counter1.increment();
        result = counter1.stepUp(98);
        assertEquals(9, result);
        result = counter1.stepUp(5);
        assertEquals(4, result);
    }

}