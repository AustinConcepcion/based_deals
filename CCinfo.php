<!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Enter Information</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<script src="https://kit.fontawesome.com/cc50dd9b64.js" crossorigin="anonymous"></script>
		<style>
		tr:nth-child(even){
			background-color: #dddddd;
		}
		</style>

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
	<!---->
	<body style="background-color:#E9E9E9;">
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
	<h1 style="float: left;">Enter Customer Information</h1>
		<form action="<?php echo 'api/UpdateUser.php?pid='.$_GET['pid']; ?>" method="post">
		<div style="float: left; border: 1px; width: 100%;">
			<div>
				<input type="text" id="fName" name="fname" placeholder="First Name" style="width: 20%">
				<input type="text" id="lName" name="lname" placeholder="Last Name" style="width: 20%">
			</div>
			<div>
				<input type="text" id="Address" name="address" placeholder="Address" style="width: 50%">
				</div>
			<div>
				<input type="text" id="Address2" name="address2" placeholder="Address 2(P.O box, suite no., apt no.)" style="width: 50%">
			</div>
			<div>
				<input type="text" id="City" name="city" placeholder="City" style="width: 15%">
				<input type="text" id="zCode" name="zipcode" placeholder="Zip Code" style="width: 15%;">
				<input type="text" id="state" name="state" placeholder="State" style="width: 8%">
			</div>
			<div>
				<input type="text" id="ccNo" name="ccnumber" placeholder="Credit Card Number" style="width: 25%">
			</div>
			<div>
				<input type="text" id="expDate" name="expiration" placeholder="Exp Date (mm/yyyy)" style="width: 15%">
				<input type="text" id="cvv" name="cvv" placeholder="CVV" style="width: 8%;">
			</div>
			<div>
			Purchase
			</div>
			<div>
				<input type="submit" name="" value="Submit" id="addSave" class="button-primary">
				<button id="addCancel" class="button-primary" type="add" onclick="javascript:history.back()">Cancel</button>
			</div>
		</form>
		</div>
	</body>
</html>
