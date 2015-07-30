<?php
  
  if ($_POST['submit']) {

    //checks email validation
    if (!$_POST['email']) $error.="Please enter your email";
        else filter_var !($_POST['email'], FILTER_VALIDATE_EMAIL) $error.="Pleae enter a valid email address";

    //checks password is more than 8 characters w/1 capital letter
    if (!_POST['password']) $error.="Please enter your password";
    else {
      if (strlen($_POST['password'])<8) $error.="Please enter a password with at least 8 characters";
      if (preg_match('`[A-Z)`', $_POST['password'])) $error.="Pleae include at least one capital letter in your password.";
    }

  }

?>

<form>

  <input type="email" name="email" id="email" />
  <input type="password" name="password" />
  <input type="submit" name="submit" value="Sign Up" />

</form>