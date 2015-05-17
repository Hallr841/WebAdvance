<?php

/*
file: layout.php
author: ryan hall
*/

$header= <<< HTML
<!doctype html public>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-witdh,maximum-scale=1.0,minimum-scale=1.0, initial scale=1.0"/>
    <title>TheShop</title>
    <script type="text/javascript" src="./js/vendor/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/vendor/animate.css">
    <link rel="stylesheet" type="text/css" href="./css/vendor/reset.css">
    <link rel="stylesheet" type="text/css" href="./css/vendor/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/screen_layout_large.css">
    <link rel="stylesheet" type="text/css" media="(max-width: 825px)" href="../css/mediums.css" />
    <link rel="stylesheet" type="text/css" media="(max-width:500px)" href="../css/small.css" />
        <!--[if lt IE 9]> 
      <script scr="http://html5shiv.googlecode.com/svntrunk/html5.js"></script
    <![endif]-->
  </head>
  <body>
    <div id="wrapper">
      <header>
        <a class=logo href="index.php"></a>
       <ul class=loginandcart>
         <li><a href="index2.php"><a>login</li>
         <li><a href="logout.php">logout</a></li>
         <li><a href="./shop.php?view_cart=1"><a>Cart</li>
       </ul>
      </header>
      <div id="main">
        <div class="shop">


           </div>     
      </div>
      <nav>
        <a href="shop.php">shop</a>
        <a href="about.php">about us</a>
        <a href="contact.php">contact</a>
      </nav>
      <footer>
       screen print shirts by rye guy and web design theshop &copy;

      </footer>
      </div>
     <!-- end #wrapper -->
    <script type="text/javascript" src="./js/script.js"></script>
  </body>
</html>



HTML;
?>