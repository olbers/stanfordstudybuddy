package edu.stanford.cs247;

import android.app.Activity;
import android.content.Context;
import android.os.Bundle;
import android.telephony.TelephonyManager;
import android.webkit.*;


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
        
        TelephonyManager tManager = (TelephonyManager)this.getSystemService(Context.TELEPHONY_SERVICE);
        String uid = tManager.getDeviceId();

        WebView webview = new WebView(this);
        
        webview.setWebViewClient(new WebViewClient());
        webview.getSettings().setJavaScriptEnabled(true);
        webview.setVerticalScrollBarEnabled(false);
        webview.loadUrl("http://cs247.anantbhardwaj.com/index.php?login_id="+uid+"&browser=android");
        //webview.loadUrl("http://cathysoft.net/studybuddy/web/");
        setContentView(webview);
        
    }
}