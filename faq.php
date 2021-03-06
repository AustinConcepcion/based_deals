<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>FAQ - Based Altar</title>
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
        <li class="mob"><?php
            echo 'User ';
            if (!empty($_COOKIE['username'])) {
                echo $_COOKIE['username'];
            } else {
                echo 'not logged in';
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
          <h3 class="hero-heading">COP4710 Project</h3>
          <h5>A website by:</h5>
        </div>
        <div class="one-half column u-full-width">
          <ul>
            <li> Pedro Bautista </li>
            <li> Enelson Castro </li>
            <li> Justtin Cortes </li>
            <li> Austin Concepcion </li>
          </ul>
        </div>
      </div>
      <div class="row" style="text-align: center">
        <p> This website is used to buy items in bulk off of Amazon for discounts. </p>
        <p> It allows groups of people to pool their orders together for maximum savings. </p>
        <p> It is only a proof of concept and cannot actually be used to buy anything. </p>
        <p> Maybe one day? :) </p>
      </div>
    </div>
  </div>


  <div class="section values">
    <div class="container">
      <div class="row">
        <div class="one-half column value">
          <h2 class="value-multiplier">Amazon</h2>
          <h5 class="value-heading">Bulk Orders</h5>
          <p class="value-description">Order in bulk from Amazon for significant savings!</p>
        </div>
        <div class="one-half column value">
          <h2 class="value-multiplier">33%</h2>
          <h5 class="value-heading">Possible Discount</h5>
          <p class="value-description">The more friends who buy in, the higher your discount!</p>
        </div>
      </div>
    </div>
  </div>

  <div class="section get-help">
    <div class="container">
      <h3 class="section-heading">Meet the team!</h3>
      <div class="row">
        <div class="one-half column category">
          <img class="u-max-full-width" src="images/pedro.jpg">
          <h4>Pedro</h4>
        </div>
        <div class="one-half column category">
          <img class="u-max-full-width" src="images/enelson.jpg">
          <h4> Enelson </h4>
        </div>
      </div>
      <div class="row">
        <div class="one-half column category">
          <img class="u-max-full-width" src="images/Justtin.jpg">
          <h4> Justtin </h4>
        </div>
        <div class="one-half column category">
          <img class="u-max-full-width" src="images/austin.jpg">
          <h4> Austin </h4>
        </div>
      </div>
      <div class="row">
        <div>
          <img class="u-max-full-width" src="https://media1.fdncms.com/orlando/imager/u/original/2438321/maxresdefault.jpg">
          <h2> LIL B BASED GOD BABY</h2>
        </div>
      </div>
    </div>
  </div>








<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
