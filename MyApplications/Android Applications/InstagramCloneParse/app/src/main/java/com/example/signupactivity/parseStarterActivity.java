package com.example.signupactivity;

import android.app.Application;

import com.parse.Parse;

public class parseStarterActivity extends Application {
    @Override
    public void onCreate() {
        super.onCreate();

        Parse.setLogLevel(Parse.LOG_LEVEL_DEBUG);
        Parse.initialize(new Parse.Configuration.Builder(this)
                .applicationId("x9cP6reoBUfpb7qNP1gmIB824B9ZBTBpGUoiiVtL")
                .clientKey("9ROEFbtxqK1fzZCgzUQ4kBg38fZRXTDTqTtU5ZN5")
                .server("https://parseapi.back4app.com/")
                .build()




        );
    }
}
