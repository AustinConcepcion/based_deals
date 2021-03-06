<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Products</title>
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
        
        <li class="mob">
        <?php
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
              <table class="u-full-width">
                <thead>
                  <tr>
                    <th>Product Idea</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    //get all items in an array
                    include './api/includes/db.inc.php';
                    $sql = 'SELECT * FROM product WHERE 1';

                    $stmt = mysqli_stmt_init($conn);
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                            //echo var_dump($row).'<br>';
                            if (1 == $row[6]) {
                                echo '<tr>';
                                echo '<td>'.$row[7].'</td>';
                                echo '<td><a href="product.php?pid='.$row[7].'">'.$row[0].'</a></td>';
                                echo '<td><a href="'.$row[5].'">'.$row[3].'</a></td>';
                                echo '<td>'.$row[4].'</td>';
                                echo '<td>'.$row[1].'</td>';
                                echo '</tr>';
                            }
                        }
                    }
                    //turn the items into the format of elements
                    //the pip
                    //then the product name
                    //then the product link
                    //then the product description
                    //then the product category
                    //then the product price
                    //make sure the product link is uses something like product.php?pid=45823448
                  ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>

      <div class="section hero"></div>

      <div class="section categories">
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
      </div>




    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
      </body>
    </html>
