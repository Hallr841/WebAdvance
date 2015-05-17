<?php
session_start();

if( isset( $_SESSION["valid"] ) )
   if( 1 == $_SESSION["valid"] )
      header( "Location:shop.php" );

if( !isset( $_GET['action'] ) ) {
   $_GET['action'] = "register";
   header( "Location: ./index2.php?action=". $_GET['action'] );
}

include "includes/main.php";

if( isset( $_GET['action'] ) )
   if( "login" == $_GET['action'] ) {
      $action_value = "login.php";
      $subheading = $button_value = "Login";
   }
   else
      if( "register" == $_GET['action'] ) {
         $action_value = "register.php";
         $subheading = $button_value = "Register";
      }
?>
<!DOCTYPE HTML>
<html>
   <head>
      <meta charset="utf-8">
      <title>log</title>
      <link rel="stylesheet" href="../css/style.css">
   </head>
   <body>
      <header>
         <h1><a class=logo href="#"><p>TheShop</p></a></h1>
         <p><?php echo $subheading ?></p>
      </header>
      <form action="<?php echo $action_value; ?>" method="post">
         <p><input type="text" name="username" placeholder="username" required autofocus></p>
         <p><input type="password" name="password" placeholder="password" required></p>
         <p><input type="hidden" name="submitted" value="1"></p>
         <p><input type="submit" value="<?php echo $button_value; ?>"></p>
      </form>
      <p>Would you like to <a href="./index2.php?action=register">register</a> or <a href="./index2.php?action=login">login?</a></p>
   </body>
</html>
