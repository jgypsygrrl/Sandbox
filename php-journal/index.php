<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>phpJournal | Jennifer's Sandbox</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <? include("login.php"); ?>
  <style>


  .navbar-brand {
    font-size: 1.8em;
  }

  .topContainer {
    background-image:url("./images/topImage.jpg");
    height:400px;
    width:100%;
    background-size:cover;
  }

  #topRow {
    margin-top:125px;
    text-align: center;
  }

  #topRow h1 {
    font-size:300%;
  }

  .bold {
    font-weight:bold;
  }

  .marginTop {
    margin-top:30px;
  }


  </style>
  
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
        
        <div class="collapse navbar-collapse">
          <!--- start SIGNIN right justified -->
          <form class="navbar-form navbar-right" method="post">
            <div class="form-group">
              <input type="email" name="loginEmail" placeholder="Email" class="form-control" value="<?php echo addslashes($_POST['loginEmail']); ?>"/>
            </div>
            <div class="form-group">
              <input type="password" name="loginPassword" placeholder="Password" class="form-control" value="<?php echo addslashes($_POST['loginPassword']); ?>" />
            </div>
            <input type="submit" name="submit"class="btn-success" value="Log In" />
          </form>
        </div>
      </div>
    </div>

<!-- ========== start HOME ========== -->

    <div class="container contentContainer topContainer" id="home">

      <div class="col-md-6 col-md-offset-3" id="topRow">

        

        <!-- ===== SIGN IN FORM ===== -->

        <h1 class="marginTop">myJournal</h1>

        <p class="lead">Your own private Journal</p>

        <p class="bold marginTop">Interested in writing your own? Sign up below!</p>

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

            <input type="submit" class="btn btn-success btn-lg marginTop" name="submit" value="Sign Up"  />

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



