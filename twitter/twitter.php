<?php

  session_start();

  include("twitteroauth/twitteroauth.php");

  $apikey="*******************";
  $apisecret="*******************************";
  $accesstoken="*****************************";
  $accesssecret="*************************";

  $connection = new TwitterOAuth($apikey, $apisecret, $accesstoken, $accesssecret);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>twitterAPI</title>
  <link href="../css/bootstrap.css" rel="stylesheet">
  <link href="../css/custom.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
</head>
<body>

<!-- =============== NAVBAR ===================-->

  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a href="http://jennifergapay.com/" class="navbar-brand">home</a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="http://jennifergapay.com/#projects">projects</a></li>
          <li class="active"><a href="http://jennifergapay.com/sandblog">sandblog</a></li>
          <li><a href="http://jennifergapay.com/#skills">skills</a></li>
          <li><a href="http://jennifergapay.com/#explore">explore</a></li>
          <li><a href="http://jennifergapay.com/#get-in-touch">get in touch</a></li>
        </ul>
      </div>
    </div>
  </div>

<!-- =============== HEADER ===================-->
  <div class="page-header text-center">
    <h1>twitterFilter - A little experiment with twitter API.</br>
     <small>This filters your feed and will only show tweets with over 20 favorites.</small> <a class="btn btn-default" href="https://github.com/jgypsygrrl/Sandbox/tree/master/js-fingers" target="blank" role="button">View Code &raquo;</a></h1>
  </div>
  <!-- end header -->

  <!-- body container -->
  <div class="container">

    <div class="col-md-6 col-md-offset-3">

      <?php
       
        $response = 
        $connection->get("https://api.twitter.com/1.1/statuses/home_timeline.json?count=50");


        foreach ($response as $tweet) {

        $favorites=$tweet->favorite_count;

          if ($favorites>=20)  {

            $embed =
            $connection->get("https://api.twitter.com/1.1/statuses/oembed.json?id=".$tweet->id);

            echo $embed->html;
          }

        }

      ?>

    </div>

  </div> 

  <!--end body-->

  <!--scripts-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>