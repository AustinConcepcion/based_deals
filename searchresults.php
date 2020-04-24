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
                    //turn the items into the format of elements
                    //the pip
                    //then the product name
                    //then the product link
                    //then the product description
                    //then the product category
                    //then the product price
                    //make sure the product link is uses something like product.php?pid=45823448
                  ?>
                  <tr>
                    <td>45823448</td>
                    <td><a href="product.php">Yankee Candle Large Jar Candle Midsummer's Night</a></td>
                    <td><a href="https://www.amazon.com/Yankee-Candle-Large-Midsummers-Night/dp/B000ORX6WI?ref_=s9_apbd_otopr_hd_bw_bFfU7&pf_rd_r=8Y2EKDBWDJWXW6AYYYG2&pf_rd_p=da763f1a-9ede-52e6-96df-4cedd103038c&pf_rd_s=merchandised-search-11&pf_rd_t=BROWSE&pf_rd_i=3734391">https://www.amazon.com/Yankee-Candle-Large-Midsummers-Night/dp/B000ORX6WI?ref_=s9_apbd_otopr_hd_bw_bFfU7&pf_rd_r=8Y2EKDBWDJWXW6AYYYG2&pf_rd_p=da763f1a-9ede-52e6-96df-4cedd103038c&pf_rd_s=merchandised-search-11&pf_rd_t=BROWSE&pf_rd_i=3734391</a></td>
                    <td>Houseware</td>
                    <td>$20.99</td>
                  </tr>
                  <tr>
                    <td>36789452</td>
                    <td><a href="product.php">Bath & Body Works, Aromatherapy Stress Relief 3-Wick Candle, Eucalyptus Spearmint</a></td>
                    <td><a href="https://www.amazon.com/Bath-Body-Works-Aromatherapy-Eucalyptus/dp/B005O91CUE?ref_=s9_apbd_orecs_hd_bw_bFfU7&pf_rd_r=8Y2EKDBWDJWXW6AYYYG2&pf_rd_p=45006a34-893c-50bd-a0bc-274f77518114&pf_rd_s=merchandised-search-11&pf_rd_t=BROWSE&pf_rd_i=3734391">https://www.amazon.com/Bath-Body-Works-Aromatherapy-Eucalyptus/dp/B005O91CUE?ref_=s9_apbd_orecs_hd_bw_bFfU7&pf_rd_r=8Y2EKDBWDJWXW6AYYYG2&pf_rd_p=45006a34-893c-50bd-a0bc-274f77518114&pf_rd_s=merchandised-search-11&pf_rd_t=BROWSE&pf_rd_i=3734391</a></td>
                    <td>Houseware</td>
                    <td>$30.47</td>
                  </tr>
                  <tr>
                    <td>63214786</td>
                    <td><a href="https://www.amazon.com/Bath-Body-Works-Mahogany-Intensity/dp/B01M7TTA2S?ref_=s9_apbd_orecs_hd_bw_bFfU7&pf_rd_r=8Y2EKDBWDJWXW6AYYYG2&pf_rd_p=45006a34-893c-50bd-a0bc-274f77518114&pf_rd_s=merchandised-search-11&pf_rd_t=BROWSE&pf_rd_i=3734391">Bath & Body Works White Barn 3-Wick Candle in Mahogany Teakwood High Intensity</a></td>
                    <td><a href="https://www.amazon.com/Bath-Body-Works-Mahogany-Intensity/dp/B01M7TTA2S?ref_=s9_apbd_orecs_hd_bw_bFfU7&pf_rd_r=8Y2EKDBWDJWXW6AYYYG2&pf_rd_p=45006a34-893c-50bd-a0bc-274f77518114&pf_rd_s=merchandised-search-11&pf_rd_t=BROWSE&pf_rd_i=3734391">https://www.amazon.com/Bath-Body-Works-Mahogany-Intensity/dp/B01M7TTA2S?ref_=s9_apbd_orecs_hd_bw_bFfU7&pf_rd_r=8Y2EKDBWDJWXW6AYYYG2&pf_rd_p=45006a34-893c-50bd-a0bc-274f77518114&pf_rd_s=merchandised-search-11&pf_rd_t=BROWSE&pf_rd_i=3734391</a></td>
                    <td>Houseware</td>
                    <td>$33.79</td>
                  </tr>
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
