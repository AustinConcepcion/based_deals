<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Login - Based Altar</title>
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
        <li class="mob">//Name//</i></li>
      </ul>
    </div>
  <!-- End NavBar -->

      <!-- Primary Page Layout
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->

      <div class="section hero">
        <div class="container">
          <div class="row">
            <div class="one-half column">
              <h4 class="hero-heading">Login</h4>
              <form action="api/VerifyUser.php" method="post">
                <input id="input-email" name="email" type="email" placeholder="Email*" class="u-nearfull-width" required>
                <input id="input-password" name="password" type="password" placeholder="Password*" class="u-nearfull-width" required>
                <input id="input-submit" type="submit" name="" class="button-primary u-nearfull-width" value="Login">
                <label>
                  <input id="input-remember" type="checkbox" checked="checked" name="remember"> Remember me
                </label>
              </form>
            </div>
            <div class="one-half column u-full-width">
              <img src="images/basedaltar.png" width="100%">
            </div>
          </div>
        </div>
      </div>

      <div class="section get-register">
        <div class="container">
          <h3 class="section-heading">Don't have an account?</h3>
          <p class="section-description">Register to create or join groups!</p>
          <a class="button button-primary" href="register.php">Register</a>
        </div>
      </div>

      <div class="section get-help">
        <div class="container">
          <h3 class="section-heading">Want to know more?</h3>
          <p class="section-description">Check out our most commonly asked questions!</p>
          <a class="button button-primary" href="faq.php">FAQ</a>
        </div>
      </div>

    <!--  <div class="section categories">
        <div class="container">
          <h3 class="section-heading">This is the bottom lol</h3>
          <p class="section-description">Social Media buttons or some shit can go here?</p>
          <div class="row">
            <div class="one-half column category">
              <img class="u-max-full-width" src="images/placeholder.png">
            </div>
            <div class="one-half column category">
              <img class="u-max-full-width" src="images/placeholder.png">
            </div>
          </div>
        </div>
      </div> -->




    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
      </body>
    </html>
