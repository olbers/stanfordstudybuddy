package edu.stanford.cs247;

import android.app.Activity;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.webkit.*;
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
        //setContentView(R.layout.main);
        //String content="";
        
       
        /*
        try{
            URL url = new URL ("http://cathysoft.net/studybuddy/test.php?name=Anant%20Bhardwaj");           
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
        }*/
        WebView webview = new WebView(this);
        
        webview.setWebViewClient(new WebViewClient());
        webview.getSettings().setJavaScriptEnabled(true);
        webview.loadUrl("http://cathysoft.net/studybuddy/web/");
        
       
        setContentView(webview);
        
    }
}