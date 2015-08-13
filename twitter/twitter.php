<?php

  session_start();

  include("twitteroauth/twitteroauth.php");

  $apikey="*******************";
  $apisecret="*******************************";
  $accesstoken="*****************************";
  $accesssecret="*************************";

  $tweets = 
  $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=twitterapi&count=2");

  print_r($tweets);

?>