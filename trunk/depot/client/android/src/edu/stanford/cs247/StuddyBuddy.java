package edu.stanford.cs247;

import android.app.Activity;
import android.os.Bundle;
import android.widget.TextView;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.MalformedURLException;
import java.net.URL;

/**
 * 
 * @author Anant Bhardwaj
 * @date: 2/15/2011
 * 
 * Basic boilerplate code.
 *
 */

public class StuddyBuddy extends Activity {
    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
        String content="";
        try{
            URL url = new URL ("http://stanford.edu/~anantb/cgi-bin/test.php?name=Anant");           
            //url.openConnection();
            
            InputStream in = url.openStream();            
            InputStreamReader inReader = new InputStreamReader(in);            
            BufferedReader br = new BufferedReader(inReader);
            String j;
            while((j = br.readLine())!=null)  {
                content=content+j;

            }
        }catch(MalformedURLException mle) {
            content = mle.getMessage();
        }catch(Exception e){
            content = e.getMessage();
        }
        TextView tv = new TextView(this);
        tv.setText(content);
        setContentView(tv);
    }
}