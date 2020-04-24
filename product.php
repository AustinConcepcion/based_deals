<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Product Title</title>
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
            <div class="one-half column product-image">
              <img class="u-max-full-width" src="
              <?php
                include './api/includes/db.inc.php';
                $image = 'images/placeholder.png';
                $productname = '';
                $price = 0.0;
                $description = '';
                $sql = 'SELECT * FROM product WHERE pid = ?';
                $stmt = mysqli_stmt_init($conn);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    $pid = htmlspecialchars($_GET['pid'], ENT_QUOTES);
                    mysqli_stmt_bind_param($stmt, 'i', $pid);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        //echo var_dump($row).'<br>';
                        if (1 == $row[6]) {
                            $productname = $row[0];
                            $price = $row[1];
                            $description = $row[3];
                            $image = $row[2];
                        }
                    }
                    echo $image;
                }
              ?>">

            </div>
            <div class="one-half column">
              <h4 class="product heading">
                <?php
                  echo $productname;
                ?> </h4>
              <p class="product-description">
                <?php
                  echo $description.'-'.$price;
                ?>
                //This product is a product. It has a desicrption!//
              </p>
              <input type="button" name="" class="button-primary u-half-width" 
              <?php
                //checked if they are login and if so then discplay cc information.
              ?>onclick="window.location.href = 'CCinfo.php';" value="Buy This">
          </div>
        </div>
      </div>
      </div>



      <div class="section categories">
        <div class="container">
          <h3 class="section-heading">Related Products</h3>
          <p class="section-description">From Category: //category// </p>
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
