<!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Store Management System</title>
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

		<!--Creates search bar-->
		<!--By entering either an item number, or item name in the search bar, it will check the table to see if we have it-->
		<img src="images/basedaltar.png" alt="Based Altar" style="width: 26%;">
		<div class="SearchBar" style="float:right;width:70%">

			<input type="text" id="Search"  placeholder="Search: Enter Item Number or Item Name" name="Search" style=" border: 1px solid gray; width:50%;">
			<button type="submit" class="button-primary" onclick="searchFunc()" style="border: 1px solid grey;">
				<i class="fas fa-search"></i>
			</button>
		</div>

		 <h1 class="hero-heading" style="padding-top:200px;"><center>Store Management System Page</center></h4>


		<div>
			<div>
			<p id="addItemTitle" style="display:none" ><b>Add Item</b></p>
			<!--<button id="discButt1" style="display:none" onclick="addPolicy()" >Set Discount Policy</button>-->
			</div>
			<!--By pressing this button, we open up the add item feature-->
			<!--We input everything in the "addInfo" div-->
			<div id="addButton" class="Add">
					<button onclick="addOption()">
						<i class="fas fa-plus"></i>
					</button>
					<!--<button id="discButt2" onclick="addPolicy()" >Set Discount Policy</button>-->
			</div>
		</div>

		<!--appears when the add button is pressed-->
		<!--Enter item information and saves it into a table-->
		<div id="addInfo"  style="display:none; padding: 40px;">
			<p><b>Add Item</b></p>
			<div style="float: left; border: 1px; width: 100%;" class="wrap">
			<input type="text" id="ItemName" placeholder="Item Name" style="width: 20%">
			<input type="text" id="Description" placeholder="Description" style="width: 67%">
			<input type="text" id="Price" placeholder="Price" style="width: 6%">
			<input type="text" id="Category" placeholder="Category" style="width: 15%">
			</div>
			<button id="addSave" class="button-primary" type="add" onclick="tableAdd()">Save</button>
			<button id="addCancel" class="button-primary" type="add" onclick="cancelAdd()">Cancel</button>
		</div>

		<!--When pressed, it will allow you to edit the discount policy, or add one if one hasn't been added-
		<div id="Policy" style="display:none; padding: 10px;">
				<input type="number" id="percentage" min="0" max="100" placeholder="Discount %" style="width: 15%; float: left;">
				<button type="submit" id="setDiscount" onclick="savePolicy()" style="float:left">Save</button>
				<button id="cancelDiscount" onclick="cancelPolicy()" style="float:left">Cancel</button>
		</div>-->

		<!--------------------------------------ACTIVE ITEMS------------------------------------------->

			<h3 class="hero-heading"><center><u>Active Items</u></center></h2>
<div class="wrap">
		<table align="center" id="itemOnTable" class="u-nearfull-width">
			<thead>
				<tr>
					<th>Item Name</th>
					<th width="50%">Description</th>
					<th>Price</th>
					<th>Category</th>
				</tr>
			</thead>
			<tr>
				<td>Yankee Candle Large Jar Candle Midsummer's Night</td>
				<td>Smells good, but don't eat it</td>
				<td>20.99</td>
				<td>Houseware</td>
				<td><button type="button" class="button-primary u-nearfull-width" onclick="tableRemove()">Remove</button></td>
				<td><button type="button" class="button-primary u-nearfull-width" onclick="editItem()">Edit</button></td>
			</tr>
			<tr>
				<td>Bath & Body Works, Aromatherapy Stress Relief 3-Wick Candle, Eucalyptus Spearmint</td>
				<td>Smells good, but don't eat it</td>
				<td>30.47</td>
				<td>Houseware</td>
				<td><button type="button" class="button-primary u-nearfull-width" onclick="tableRemove()">Remove</button></td>
				<td><button type="button" class="button-primary u-nearfull-width" onclick="editItem()">Edit</button></td>
			</tr>
			<tr>
				<td>Bath & Body Works White Barn 3-Wick Candle in Mahogany Teakwood High Intensity</td>
				<td>Smells good, but don't eat it</td>
				<td>34.79</td>
				<td>Houseware</td>
				<td><button type="button" class="button-primary u-nearfull-width" onclick="tableRemove()">Remove</button></td>
				<td><button type="button" class="button-primary u-nearfull-width" onclick="editItem()">Edit</button></td>
			</tr>
		</table>
</div>
		<!--------------------------------------ACTIVE ORDERS------------------------------------------->

		<h3 class="hero-heading" style="padding-top: 20px"><center><u>Active Orders</u></center></h2>
<div class="wrap">
		<table align="center" id="curOrders" class="u-nearfull-width">
			<thead>
				<tr>
					<th>Group Code</th>
					<th>Item Name</th>
					<th>Price</th>
					<th>Category</th>
				</tr>
			</thead>
		</table>
</div>
		<!--------------------------------------INACTIVE ORDERS------------------------------------------->

			<h3 class="hero-heading" style="padding-top: 20px"><center><u>Inactive Items</u></center></h2>
<div class="wrap">
		<table align="center" id="itemOffTable" class="u-nearfull-width">
			<thead>
				<tr>
					<th>#</th>
					<th>Item Name</th>
					<th width="50%">Description</th>
					<th>Price</th>
					<th>Category</th>
				</tr>
				<tr>

				</tr>

			</thead>
		</table>
</div>
		<!--------------------------------------PAST ORDERS------------------------------------------->

		<h3 class="hero-heading" style="padding-top: 20px"><center><u>Past Orders</u></center></h2>
<div class="wrap">
		<table align="center" id="hisOrder" class="u-nearfull-width">
			<thead>
				<tr>
					<th>Group Code</th>
					<th>Item Name</th>
					<th>Price</th>
					<th>Category</th>
				</tr>
			</thead>
		</table>
</div>
		<!--------------------------------------PRINT ORDER------------------------------------------->

		<div  align="center">
			<input type="text" id="Search"  placeholder="Enter Group Discount Code" name="Search" style=" border: 1px solid gray;">
			<button type="submit" class="button-primary" onclick="" style="border: 1px solid grey;">
				Print Order
			</button>
		</div>



<!---------------------------------------------------Script-------------------------------------------------------------------------->
		<script>
			var onCount = 4; //counts rows in the active items table
			var offCount = 1; //counts rows in the inactive items table
			var hisCount = 2; //counts rows in order history table
			var editRow = onCount;
			var editNam, editDes, editPric, editCate;


			function addOrder(){

			}

			function searchFunc(){
				var searchVal = document.getElementById("Search").value;
				var table = document.getElementById("itemOnTable");
				var found = false;

				if (searchVal === ""){ //makes sure the user can't search if field is left blank
					alert("Please enter something to search for");
				}
				else{
					if (table.rows.length === 1){ //returns no results if there are no items in the table
						alert("No result");
					}
					else {
						for (var i = 1; i<table.rows.length;i++){ //checks each row to find the item. If item isn't found, it will give alert
							if (searchVal === table.rows[i].cells[0].innerHTML ){
								alert("Item Name: "+table.rows[i].cells[0].innerHTML+
									"\nDescription: "+table.rows[i].cells[1].innerHTML+ "\nPrice: $"+table.rows[i].cells[2].innerHTML+ "\nCategory: "
								      +table.rows[i].cells[3].innerHTML);
								found = true;
							}
						}
						if (found===false){
							alert("No result");
						}
					}
				}
			}

			function addOption() {//displays the fields from the AddInfo section

				var addInfo = document.getElementById("addInfo");
				var addButton = document.getElementById("addButton");
				//var discButt1 = document.getElementById("discButt1");
				//var policy = document.getElementById("Policy");
				addInfo.style.display = "block";
				addButton.style.display = "None";

				/*if (policy.style.display != "inline")//checks if the discount policy field is visible
				{
					discButt1.style.display = "inline"; //if it's not, show the discount policy button
				}(*/
			}

			function continueAdd() {//alerts the user they saved an item and if they want to close the add item fields or not
			if (!(confirm("Saved! Press OK to continue adding items, or cancel to stop."))){
					cancelAdd();
				}
			}

			function cancelAdd() {//hides all of the add item fields and shows the add item button again
				//these variables are assigned the fields in the addItem section
				var option = document.getElementById("addInfo");
				var addButton = document.getElementById("addButton");
				var addItemTitle = document.getElementById("addItemTitle");
				//var discButt1 = document.getElementById("discButt1");
				//var discButt2 = document.getElementById("discButt2");
				//var policy = document.getElementById("Policy");
				option.style.display = "none";
				addButton.style.display = "block";
				addItemTitle.style.display = "none";
				//discButt1.style.display = "none";
				document.getElementById("ItemName").value = "";
				document.getElementById("Description").value = "";
				document.getElementById("Price").value = "";
				document.getElementById("Description").value = "";
				document.getElementById("Category").value = "";
				/*if (policy.style.display==="none") //checks if the discount policy field is visible
				{
					discButt2.style.display="inline";//if it's not, show the discount policy button
				}*/
			}

			function tableAdd() {//adds item and other data to the table
				//these variables are assigned the values in the fields in the addItem section
				var iName = document.getElementById("ItemName").value;
				var iDesc = document.getElementById("Description").value;
				var iPrice = document.getElementById("Price").value;
				var iCat = document.getElementById("Category").value;
				var table = document.getElementById("itemOnTable");
				var offTable = document.getElementById("itemOffTable");



				if (iName === ''||iDesc === ''||iPrice === '' || iCat === '') {//makes sure user doesn't leave anything blank
					alert("Please fill in all blanks (percentage field is optional)");
				}
				else{
					var tF = false


					if (tF===false){//adds data from each field into the table
						var row = table.insertRow(onCount);
						var namCell = row.insertCell(0);
						var desCell = row.insertCell(1);
						var priCell = row.insertCell(2);
						var catCell = row.insertCell(3);
						var delCell = row.insertCell(4);
						var ediCell = row.insertCell(5);
						namCell.innerHTML = iName;
						desCell.innerHTML = iDesc;
						priCell.innerHTML = iPrice;
						catCell.innerHTML = iCat;
						delCell.innerHTML = '<button type="button" class="button-primary u-nearfull-width" onclick="tableRemove()">Remove</button>';
						ediCell.innerHTML = '<button type="button" class="button-primary u-nearfull-width" onclick="editItem()">Edit</button>';
						onCount++;
						continueAdd();
						//resets each field to blank
						document.getElementById("ItemName").value = "";
						document.getElementById("Description").value = "";
						document.getElementById("Price").value = "";
						document.getElementById("Category").value = "";
					}
				}

			}

			//removes data from active items table and adds it to inactive items remove
			function tableRemove() {
				var oldTable = document.getElementById("itemOnTable");
				var newTable = document.getElementById("itemOffTable");

				var td = event.target.parentNode;
				var tr = td.parentNode;
				oldTable.rows[tr.rowIndex].deleteCell(5);
				tr.parentNode.removeChild(tr);
				onCount--;//subtracts counter for number of items in the table

				//adds removed active item to inactive item table
				newRow = newTable.insertRow(offCount);
				newRow.innerHTML = tr.innerHTML;

				//changes remove button to a delete button for when they want to permanently remove item
				newTable.rows[offCount].cells[3].innerHTML = '<button type="button" class="button-primary u-nearfull-width" onclick="permRemove()">Delete</button>';
				//Adds new button to return from inactive to active item
				newTable.rows[offCount].cells[4].innerHTML = '<button type="button" class="button-primary u-nearfull-width" onclick="reAdd()">Return</button>';
				offCount++;//adds to counter for items on inactive items list
			}

			//permanently deltes item
			function permRemove() {

				if (confirm("Are you sure you want to delete this item? Press OK to delete or Cancel otherwise")){
					var td = event.target.parentNode;
					var tr = td.parentNode;
					tr.parentNode.removeChild(tr);
					offCount--;
				}
			}

			function reAdd(){
				var oldTable = document.getElementById("itemOnTable");
				var newTable = document.getElementById("itemOffTable");

				var td = event.target.parentNode;
				var tr = td.parentNode;
				tr.parentNode.removeChild(tr);
				offCount--;//subtracts counter for number of items in the inactive table

				//adds inactive item back to active item table
				newRow = oldTable.insertRow(onCount);
				newRow.innerHTML = tr.innerHTML;
				oldTable.rows[onCount].insertCell(3);
				//changes delete button back to remove button, brings back edit button, and brings back cell for discount policy
				oldTable.rows[onCount].cells[3].innerHTML = '0';
				oldTable.rows[onCount].cells[4].innerHTML = '<button type="button" class="button-primary u-nearfull-width" onclick="tableRemove()">Remove</button>';
				//Removes newer button that return from inactive to active item
				oldTable.rows[onCount].cells[5].innerHTML ='<button type="button" class="button-primary u-nearfull-width" onclick="editItem()">Edit</button>';
				onCount++;//adds to counter for items on inactive items list
			}

			function editItem(){
				var table = document.getElementById("itemOnTable");
				var td = event.target.parentNode;
				var tr = td.parentNode;
				editRow = tr.rowIndex;
				editNam = table.rows[editRow].cells[0].innerHTML;
				editDes = table.rows[editRow].cells[1].innerHTML;
				editPric = table.rows[editRow].cells[2].innerHTML;
				editCate = table.rows[editRow].cells[3].innerHTML;

				table.rows[editRow].cells[0].innerHTML = '<input type="text" id="editName" placeholder="Item Name" value="'+editNam+'">';
				table.rows[editRow].cells[1].innerHTML = '<input type="text" id="editDesc" placeholder="Description" value="'+editDes+'">';
				table.rows[editRow].cells[2].innerHTML = '<input type="text" id="editPrice" placeholder="Price" value="'+editPric+'">';
				table.rows[editRow].cells[3].innerHTML = '<input type="text" id="editCat" placeholder="Category" value="'+editCate+'">';
				table.rows[editRow].cells[4].innerHTML = '<button id="editSave" class="button-primary u-nearfull-width" type="add" onclick="saveEdit()">Save</button>';
				table.rows[editRow].cells[5].innerHTML = '<button id="editCancel" class="button-primary u-nearfull-width" type="add" onclick="cancelEdit()">Cancel</button>';
			}

			function saveEdit(){
				var table = document.getElementById("itemOnTable");
				var offTable = document.getElementById("itemOffTable");
				var iName = document.getElementById("editName").value;
				var iDesc = document.getElementById("editDesc").value;
				var iPrice = document.getElementById("editPrice").value;
				var iCat = document.getElementById("editCat").value;


				if (iName === ''||iDesc === ''||iPrice === '' || iCat === '') {//makes sure user doesn't leave anything blank
					alert("Please fill in all blanks!");
				}
				else{
					var tF = false
					if (tF===false){//adds data from each field into the table
						table.rows[editRow].cells[0].innerHTML = iName;
						table.rows[editRow].cells[1].innerHTML = iDesc;
						table.rows[editRow].cells[2].innerHTML = iPrice;
						table.rows[editRow].cells[3].innerHTML = iCat;
						table.rows[editRow].cells[4].innerHTML = '<button type="button" class="button-primary u-nearfull-width" onclick="tableRemove()">Remove</button>';
						table.rows[editRow].cells[5].innerHTML = '<button type="button" class="button-primary u-nearfull-width" onclick="editItem()">Edit</button>';

						alert("Edits have been saved!");
					}
				}
			}
			function cancelEdit(){
				var table = document.getElementById("itemOnTable");
				table.rows[editRow].cells[0].innerHTML = editNam;
				table.rows[editRow].cells[1].innerHTML = editDes;
				table.rows[editRow].cells[2].innerHTML = editPric;
				table.rows[editRow].cells[3].innerHTML = editCate;
				table.rows[editRow].cells[4].innerHTML = '<button type="button" class="button-primary u-nearfull-width" onclick="tableRemove()">Remove</button>';
				table.rows[editRow].cells[5].innerHTML = '<button type="button" class="button-primary u-nearfull-width" onclick="editItem()">Edit</button>';
			}
		</script>
	</body>
</html>
