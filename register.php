<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>BasedDeals</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Scripts
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/hashes.js"></script>

    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="../../dist/images/favicon.png">

  </head>
  <body>

    <!-- Begin NavBar -->
    <script>
    $(document).ready(function() {

		    $(".fa-search").click(function() {
		       $(".search-box").toggle();
		       $("input[type='text']").focus();
		     });

 		});
    </script>

    <div class="nav-bar">
      <ul>
        <li><a href="landing.php">based altar</a></li>
        <li class="mob"><a href="searchresults.php">products</a></li>
        <li class="mob"><a href="grouppage.php">groups</a></li>
        <li class="mob"><a href="SMSpage.php">SMS</a></li>

        <li class="active">
          <i class="fa fa-search" aria-hidden="true"></i>
          <div class="search-box">
            <input type="text" placeholder="Search . . ."/>
            <input type="button" value="Search"/>
          </div>
        </li>
        <li class="mob"><?php
            echo 'User ';
            if (!empty($_COOKIE['username'])) {
                echo $_COOKIE['username'];
            }
          ?></i></li>
      </ul>
    </div>
  <!-- End NavBar -->

      <!-- Primary Page Layout
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->

      <div class="section hero">
        <div class="container">
          <div class="row">
            <div class="one-half column">
              <h4 class="hero-heading">Register</h4>
              <form action="api/CreateUser.php" method="post">
                <h6 class="value-heading">Name</h6>
                <input id="input-name" name="name" type="text" placeholder="April Ludgate" class="u-nearfull-width" required>
                <h6 class="value-heading">Email</h6>
                <input id="input-email" name="email" type="email" placeholder="bloodorphan@p&r.gov" class="u-nearfull-width" required>
                <h6 class="value-heading">Password</h6>
                <input id="input-password" name="password" type="password" placeholder="At least 8 characters" class="u-nearfull-width" required>
                <h6 class="value-heading">Re-enter password</h6>
                <input id="input-rpassword" name="rpassword" type="password" placeholder="Must match above" class="u-nearfull-width" required>
                <label class="shopkeeper">
                  <input id="input-shopkeeper" name="shopkeeper" type="checkbox">
                  <span class="label-body">Are you a shopkeeper?</span>
                </label>
                <input type="submit" name="submit" class="button-primary u-nearfull-width" value="Create your account">

              </form>
            </div>
            <div class="one-half column logo">
              <img src="images/basedaltar.png" width="100%">
            </div>
          </div>
        </div>
      </div>

      <div class="section hero">
        <div class="container">
          <div class="row">
          </div>
        </div>
      </div>

      <div class="section get-register">
        <div class="container">
          <h3 class="section-heading">Already have an account?</h3>
          <a class="button button-primary" href="login.php">Login</a>
        </div>
      </div>

      <div class="section get-help">
        <div class="container">
          <h3 class="section-heading">Want to know more?</h3>
          <p class="section-description">Check out our most commonly asked questions!</p>
          <a class="button button-primary" href="faq.php">FAQ</a>
        </div>
      </div>




    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
      </body>
    </html>
