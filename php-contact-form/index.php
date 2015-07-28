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

    if ($_POST['name']!="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { 
        $error.="<br />Please enter a valid email address"
    } 

    if ($error) {

      $result='<div class="alert alert-danger"><strong>There were error(s) in the form:</strong>'.$error.'</div>';

    }

    


  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP email form</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8"
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  <style>

    .emailForm {
      border:1px solid gray;
      border-radius:10px;
      margin-top:20px;
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

    <div class="container">

      <div class="row">

        <div class="col-md-6 col-md-offset-3 emailForm">

          <h1>My email form</h1>

          <?php echo $result; ?>

          <p class="lead">Please get in touch - I'll get back to you as soon as I can.</lead>

          <form method="post" id="myForm">

            <div class="form-group">

              <label for="name">Your Name</label>
              <input type="text" name="name" class="form-control" placeholder="Your Name"/>

            </div>

            <div class="form-group">

              <label for="email">Your Email</label>
              <input type="email" name="email" class="form-control" placeholder="Your Email"/>

            </div>

            <div class="form-group">

              <label for="comment">Your Comment</label>
              <textarea class="form-control" name="comment"></textarea> 

            </div>

            <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit" />

          </form>

      </div>

    </div>



<!-- ========== SCRIPTS ========= -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>