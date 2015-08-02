<? include("login.php"); ?>

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

  <input type="loginEmail" name="loginEmail" id="loginEmail" placeholder="your email" value="<?php echo addslashes($_POST['loginEmail']); ?>"/>

  <input type="loginPassword" name="loginPassword" placeholder="your password" value="<?php echo addslashes($_POST['loginPassword']); ?>"/>

  <input type="submit" name="submit" value="Log In" />

</form>