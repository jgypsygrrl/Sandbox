<?php

  session_start();

  include("twitteroauth/twitteroauth.php");

  $apikey="*******************";
  $apisecret="*******************************";
  $accesstoken="*****************************";
  $accesssecret="*************************";

  $connection = new TwitterOAuth($apikey, $apisecret, $accesstoken, $accesssecret);

//Grab 50 tweets with a favorite count of 2 or more.

    $response = 
    $connection->get("https://api.twitter.com/1.1/statuses/home_timeline.json?count=50");


    foreach ($response as $tweet) {

    $favorites=$tweet->favorite_count;

      if ($favorites>=2)  {

        $embed =
        $connection->get("https://api.twitter.com/1.1/statuses/oembed.json?id=".$tweet->id);

        echo $embed->html;
      }

    }


//POST a tweet 
  //$response = $connection->post("https://api.twitter.com/1.1/statuses/update.json", array("status" =>"Testing an API"));

  //print_r($response);

//===================== //

//GETS latest tweets from a user
   //$tweets = 

  //$connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=kellabyte&count=10");

  //foreach($tweets as $tweet) {
    //echo $tweet->text;
    //echo "<br />";

?>