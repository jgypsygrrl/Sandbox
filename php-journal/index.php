<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>phpJournal </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <? include("login.php"); ?>
  <link rel="stylesheet" href="css/custom.css" >
</head>
<body data-spy="scroll" data-target=".navbar-collapse">
  
<!-- ========== start NAVBAR ========== -->

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        
        <div class="navbar-header">       
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a href="#" class="navbar-brand">myJournal</a>
        </div>
 
        <!--- start SIGNIN right justified -->       
        <div class="collapse navbar-collapse">
          <form class="navbar-form navbar-right" method="post">
            <div class="form-group">
              <input type="email" name="loginEmail" placeholder="Email" class="form-control" value="<?php echo addslashes($_POST['loginEmail']); ?>"/>
            </div>
            <div class="form-group">
              <input type="password" name="loginPassword" placeholder="Password" class="form-control" value="<?php echo addslashes($_POST['loginPassword']); ?>" />
            </div>
            <input type="submit" name="submit"class="btn-sample" value="Log In" />
          </form>
        </div>
      </div>
    </div>

<!-- ========== end NAV ========== -->

    <div class="container contentContainer topContainer" id="home">

      <div class="col-md-6 col-md-offset-3" id="topRow">

        

        <!-- ===== SIGN IN FORM ===== -->

        <h1 class="marginTop">myJournal</h1>

        <p class="lead">Your own digital Journal</p>

        <?php

          if ($error) {

            echo '<div class="alert alert-danger">'.addslashes($error).'</div>';

          }

          if ($message) {

            echo '<div class="alert alert-success">'.addslashes($message).'</div>';

          }

        ?>

        <p class="bold marginTop">Interested? Sign up below!</p>

          <form class="marginTop" method="post">

            <!-- SIGN UP -->

            <div class = "form-group">
              <input type="name" name="name" class="form-control" placeholder="Name" value="<?php echo addslashes($_POST['name']); ?>" />
            </div>
            
            <div class = "form-group">
              <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo addslashes($_POST['email']); ?>"/>
            </div>

            <div class = "form-group">
              <input type="password" name="password" class="form-control" placeholder="Add password" value="<?php echo addslashes($_POST['password']); ?>"/>
            </div>

            <input type="submit" class="btn btn-sample btn-lg marginTop" name="submit" value="Sign Up"  />

            <p id="viewCode"><a href="https://github.com/jgypsygrrl/Sandbox/tree/master/php-journal" target"_blank">View Code on Github</a> </p>

          </form>
        
      </div>

    </div>

<!-- ========== start SCRIPTS ========== -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  <!-- ========== adjust image height for top container ========== -->
  <script>
    //changed to min-height adjust to smaller devices
    $(".contentContainer").css("min-height",$(window).height());
  </script>

</body>
</html>



