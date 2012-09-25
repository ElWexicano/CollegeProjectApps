/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package ssd3;

/**
 *
 * @author Shane
 * @date 19-01-2011
 * 
 */
public class Counter
{
	int count = 0;
        
	public Counter(int count)
        {
            this.count = count;
	}

	public int getCount()
        {
            return count;
	}

	public void setCount(int count)
        {
            this.count = count;
	}

	public int increment()
        {
            return ++count;
        }

	public int decrement()
        {
            return --count;
        }

        public void reset()
        {
            this.count = 1;
        }

        public int stepUp(int value)
        {
            int i;
            
            for( i = 1; i <= value ; i++ )
            {

                count = (count % 10 == 0)? 1 : ++count;

//                if( count % 10 == 0 )
//                {
//                    count = 1;
//                }
//                else
//                {
//                    count++;
//                }
            }
            
            return count;
        }
}