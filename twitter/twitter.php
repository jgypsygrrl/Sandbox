<?php

  session_start();

  include("twitteroauth/twitteroauth.php");

  $apikey="*******************";
  $apisecret="*******************************";
  $accesstoken="*****************************";
  $accesssecret="*************************";

  $connection = new TwitterOAuth($apikey, $apisecret, $accesstoken, $accesssecret);


//POST a tweet 
  $response = $connection->post("https://api.twitter.com/1.1/statuses/update.json", array("status" =>"Testing an API"));

  print_r($response);
  
//GETS latest tweets from a user
   //$tweets = 

  //$connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=kellabyte&count=10");

  //foreach($tweets as $tweet) {
    //echo $tweet->text;
    //echo "<br />";

  }