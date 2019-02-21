package com.example.currencyconvert;

import androidx.appcompat.app.AppCompatActivity;

import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

import org.json.JSONObject;
import org.w3c.dom.Text;

import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class MainActivity extends AppCompatActivity {
    TextView tryText;
    TextView cadText;
    TextView usdText;
    TextView jpyText;
    TextView chfText;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        tryText = findViewById(R.id.tryText);
        cadText = findViewById(R.id.cadText);
        usdText = findViewById(R.id.usdText);
        jpyText = findViewById(R.id.jpyText);
        chfText = findViewById(R.id.chfText);



    }

    public void getRates(View view){

        DownloadData downloadData = new DownloadData();
        try{
            String url ="http://data.fixer.io/api/latest?access_key=fbd76bfcb5f17069032e5ba32f0354c6&format=1";
            downloadData.execute(url);
        }
        catch (Exception e){

        }
    }

    private class DownloadData extends AsyncTask<String,Void,String>{
        @Override
        protected String doInBackground(final String... strings) {

            String results = "";
            URL url;

            HttpURLConnection httpURLConnection;
            try {
                url = new URL(strings[0]);
                httpURLConnection = (HttpURLConnection)url.openConnection();
                InputStream inputStream = httpURLConnection.getInputStream();
                InputStreamReader inputStreamReader = new InputStreamReader(inputStream);

                int data = inputStream.read();
                while (data > 0){

                    char character =(char)data;
                    results += character;
                    data = inputStreamReader.read();

                }

            }catch (Exception e){
                return null;


            }
            return results;


        }

        @Override
        protected void onPostExecute(final String s) {




            super.onPostExecute(s);

            //System.out.println("alınan data : " + s);
            try{
                JSONObject jsonObject = new JSONObject(s);
                String base = jsonObject.getString("base");
               //   System.out.println("base : "  + base);
                String rates = jsonObject.getString("rates");
                //System.out.println("rates : " + rates);

                JSONObject jsonObject1 = new JSONObject(rates);
                String turksihLira = jsonObject1.getString("TRY");
                tryText.setText("TRY: "+ turksihLira);

                JSONObject jsonObject2 = new JSONObject(rates);
                String cad = jsonObject2.getString("CAD");
                cadText.setText("CAD: "+ cad);

                JSONObject jsonObject3 = new JSONObject(rates);
                String chf = jsonObject3.getString("CHF");
                chfText.setText("CHF: "+ chf);

                JSONObject jsonObject4 = new JSONObject(rates);
                String jpy = jsonObject4.getString("JPY");
                jpyText.setText("JPY: "+ jpy);

                JSONObject jsonObject5 = new JSONObject(rates);
                String usd = jsonObject5.getString("USD");
                usdText.setText("USD: "+ usd);


            }
            catch (Exception e){

            }




        }
    }
}
