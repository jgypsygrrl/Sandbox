<?php

  session_start();

  //connect to DB
  $link = mysqli_connect("localhost", "*****", "*****", "*****");

// ===== SIGN UP section =====//
  if ($_POST['submit'])=="Sign Up" {

    //checks email validation
    if (!$_POST['email']) $error.="<br />Please enter your email";
        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error.="<br />Please enter a valid email address";

    //checks password is more than 8 characters
    if (!$_POST['password']) $error.="<br />Please enter your password";
    else {
      if (strlen($_POST['password'])<8) $error.="<br />Please enter a password with at least 8 characters";
      if (!preg_match('`[A-Z]`', $_POST['password'])) $error.="<br />Please include at least one capital letter in your password.";
    }
    if ($error) echo "There were error(s) in your signup details:".$error;
    else {
      
      //Checks to see if email is taken
      $query= "SELECT * FROM `users` WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";
        //mysqli_real_escape_string is used to guard against SQL injections

        $result = mysqli_query($link, $query);

        $results = mysqli_num_rows($result);

        if ($results) echo "That email address is already registered.  Do you want to login?";

          else {

            $query = "INSERT INTO `users` (`name`,`email`, `password`) VALUES('".mysqli_real_escape_string($link, $_POST['name'])."','".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."')";

            mysqli_query($link, $query);

            echo "You've been signed up!";

            //Add session
            $_SESSION['id']=mysqli_insert_id($link);

            print_r($_SESSION);

            // Redirect to logged in page

          }
          
    }

  }
// ===== LOGIN section =====
  if ($_POST['submit']=="Log In") {

    $query= "SELECT * FROM `users` WHERE email='".mysqli_real_escape_string($link, $_POST['loginEmail'])."' AND password='".md5(md5($_POST['loginEmail']).$_POST['loginPassword'])."' LIMIT 1";

    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($result);

    print_r($row);

  }

?>

<!-- ===== SIGN IN FORM ===== -->
<form method="post">

  <!-- adding value & php code will remember entered info -->
  <input type="name" name="name" id="name" placeholder="name" value="<?php echo addslashes($_POST['name']); ?>"/>

  <input type="email" name="email" id="email" placeholder="email" value="<?php echo addslashes($_POST['email']); ?>"/>

  <input type="password" name="password" placeholder="password" value="<?php echo addslashes($_POST['password']); ?>"/>

  <input type="submit" name="submit" value="Sign Up" />

</form>

<!--===== LOGIN FORM ===== -->
<form method="post">

  <input type="loginEmail" name="loginEmail" id="loginEmail" placeholder="loginEmail" value="<?php echo addslashes($_POST['loginEmail']); ?>"/>

  <input type="loginPassword" name="loginPassword" placeholder="loginPassword" value="<?php echo addslashes($_POST['loginPassword']); ?>"/>

  <input type="submit" name="submit" value="Log In" />

</form>