<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Group Page</title>
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
            <div class="one-half column product-image">
              <img class="u-max-full-width" src="images/placeholder.png">

            </div>
            <div class="one-half column">
                <table class="u-full-width">
                  <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Product Title</td>
                      <td>Number of group members<!--use sql calls on orderform.html--></td>
                    </tr>
                  </tbody>
                  <thead>
                      <tr>
                          <th>Total Cost<!--use sql calls on orderform.html--></th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>

                    </tr>
                  </tbody>
                </table>
                <form action="" method="post">
                  <input id="input-groupId" name="groupId" type="text" placeholder="Group ID" class="u-nearfull-width" required>
                  <input id="input-submit" type="submit" name="submitGroupId" class="button-primary u-nearfull-width" value="Join">
                </form>
            </div>
        </div>
      </div>
      </div>



      <div class="section categories">
        <div class="container">
          <h3 class="section-heading">Groups with similar products</h3>
          <p class="section-description">Groups with items from //category//</p>
          <div class="row">
            <div class="three columns category">
              <img class="u-max-full-width" src="images/placeholder.png">
            </div>
            <div class="three columns category">
              <img class="u-max-full-width" src="images/placeholder.png">
            </div>
            <div class="three columns category">
              <img class="u-max-full-width" src="images/placeholder.png">
            </div>
            <div class="three columns category">
              <img class="u-max-full-width" src="images/placeholder.png">
            </div>
          </div>
        </div>
      </div>




    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
      </body>
    </html>
