<?php

  if ($_POST["submit"]) {


    if (!$_POST["name"]) {

      $error="<br />Please enter your name.";

    } 

    if (!$_POST["email"]) {

      $error.="<br />Please enter your email address.";
    }

    if (!$_POST["comment"]) {

      $error.="<br />Please enter your comment.";
    }

    if ($_POST['email']!="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { 
        $error.="<br />Please enter a valid email address";
    }

    if ($error) {

      $result='<div class="alert alert-danger"><strong>There were error(s) in the form:</strong>'.$error.'</div>';

    } else {

      if (mail("jennifergapay@gmail.com", "Comment from website", "Name: ".$_POST['name']."

        Email: ".$_POST['email']."

        Comment: ".$_POST['comment'])) {

          $result='<div class="alert alert-success"><strong>Thank You.</strong> I\'ll get back to you as soon as I can!</div>';

      } else {

          $result='<div class="alert alert-danger">Sorry, there was an error sending your message.  Please let me know <a href="http://jennifergapay.com/#get-in-touch">here</a>.</div>';

      }

    }

  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHP email form | Jennifer's Sandbox</title>
  <link href="../css/bootstrap.css" rel="stylesheet">
  <link href="../css/custom.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>

  <style>

    .emailForm {
      border:1px solid gray;
      border-radius:10px;
      margin-top:20px;
      margin-bottom:20px;
    }

    #myForm {
      margin:0 auto;
      width: 80%;
    }

    .textarea {
      height:120px;
    }

    form {
      padding-bottom:20px;
    }

  </style>
</head>
<body>

<!-- =============== NAVBAR ===================-->

  <div class="navbar navbar-default">
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
          <li class="active"><a href="http://jennifergapay.com/sandbox">sandbox</a></li>
          <li><a href="http://jennifergapay.com/#skills">skills</a></li>
          <li><a href="http://jennifergapay.com/#explore">explore</a></li>
          <li><a href="http://jennifergapay.com/#get-in-touch">get in touch</a></li>
        </ul>
      </div>
    </div>
  </div>

<!-- =============== HEADER ===================-->

  <div class="page-header text-center">
    <h1>A PHP contact form <small></br>A little experiment with PHP.</small> <a class="btn btn-default" href="https://github.com/jgypsygrrl/Sandbox/tree/master/php-contact-form" target="_blank" role="button">View Code &raquo;</a></h1>
  </div>

  <!-- container wrapper --> 

  <div class="container">

    <div class="row">

      <div class="col-md-6 col-md-offset-3 emailForm">

        <h1>Say Hello!</h1>

        <?php echo $result; ?>

        <p class="lead">Please get in touch - I'll get back to you as soon as I can.</lead>

        <form method="post" id="myForm">

          <div class="form-group">

              <label for="name">Your Name</label>
              <input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $_POST['name']; ?>"/>

          </div>

          <div class="form-group">

              <label for="email">Your Email</label>
              <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $_POST['email']; ?>"/>

          </div>

          <div class="form-group">

              <label for="comment">Your Comment</label>
              <textarea class="form-control" name="comment" ><?php echo $_POST['comment']; ?></textarea> 

          </div>

          <input type="submit" name="submit" class="btn btn-default btn-lg" value="Submit" />

        </form>

    </div>

  </div>



<!-- ========== SCRIPTS ========= -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>