<!-- PHP block to test the connection from the page to the database: The message "TEST: Connected to DB server succesfully should appear at the very top of the webpage if the connection test is successful" -->
<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ellisken-db","cqs3Ii2O8xoRdNVI","ellisken-db");
/*if($mysqli->connect_errno){
  echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
  }
  //Should see the message below at the top of the web page if the connection is working
  echo "TEST: Connected to DB server successfully!";*/
?>
<!DOCTYPE html>
<html>

<!--The head of our HTML file includes the CSS style sheet --> 
<head>

    <title>Donor Home</title>

    <style type="text/css">
       div{
           text-align: center;
       }
        h1, h2 {
            color: #2d8730;
            margin: 10px auto 10px auto;
        }
        h1{
            font-size: 32px;
            max-width: 30%;
            padding: 4px;
            text-shadow: 0px 1px 1px black;
            display: inline;
            border-bottom-color: lightblue;
            border-bottom-width: 2px;
            border-bottom-style: solid;
        }
        h2{
           color: #2d8730;
            font-size: 22px;
            max-width: 30%;
            text-shadow: 0px 1px 1px lightblue;
            display: inline;
            padding: 4px;
        }
        h3{
            color: #2d8730;
            font-size: 18px;
            max-width: 30%;
            display: inline;
        }
        hr { 
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-width: 2px;
            border-color: lightblue;
        }
        a {
            text-decoration: underline;
            color:#db4ce0;
        }
        a:hover{
            color:#f46b53;
        }
        p{
           font-family: Verdana, "Calibri Light", sans-serif;
            font-size: 14px;
            line-height: 150%;
            text-align: left;
        }
        body {
            font-family: arial;
            font-size: 80%;
            width: 100%;
            margin: 0;
            background-color: #e6f6f7;
            text-align: center;
        }
        #page{
            margin: 50px;
            background-color: white;
        }
      
        #image_logo {
            background-image: url(http://cdn.mysitemyway.com/etc-mysitemyway/icons/legacy-previews/icons/green-jelly-icons-business/082207-green-jelly-icon-business-cart5.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            margin-top: 10px;
            height: 160px;
            width: 180px;
            margin: 0 auto;
            display: block;
            
        }
       .content ul{
           text-align: left;
           font-size: 18px;
           text-style: italic;
           font-family: "Cambria Math", Cambria, sans-serif;
       }
       nav {
            display: inline-block;
            text-align:center;
            background-color: lightblue;
            width: 100%;
            background-image: url(http://gift-of-life.org/wp-content/uploads/2014/06/header-background-2.jpg);
            background-repeat: repeat-y;
            background-size: 100%;
            background-position: center;
        }
        nav ul li{
            display: inline-block;
            margin: 5px auto 5px auto;
        }
        nav ul li a {
            display: inline-block;
            padding: 14px;
            background-color: lightgreen;
            color: black;
            box-shadow: 0px 3px 3px #999;
            margin: 5px auto 5px auto;
            font-family: "Trebuchet MS", sans-serif;
            font-size: 14px;
            text-decoration: none;
            text-transform:uppercase;
            border-radius: 20px;
        }
        nav ul li a:hover{
            background-color: steelblue;
        }
        input:hover{
            background-color: steelblue;
        }
        p li{
            text-style: italic;
            text-align: left;
            text-size: 20px;
        }
        input{
            padding: 14px;
            background-color: lightgreen;
            color: black;
            font-family: "Trebuchet MS", sans-serif;
            font-size: 10px;
            text-decoration: none;
            border-radius: 20px;
        }
        .content {
            background-color: white;
            padding: 20px;
            font-size: 12px;
        }
        .user_timeline{
            background-color: white;
            text-size: 40px;
            font: sans-serif;
            color: #5e002d;
        }
        .org_stream{
            overflow: auto;
            max-height: 500px;
            background-color: lightblue;
        }
        table.stream{
            margin: 4px auto 4px auto;
        }
        table.stream td{
            border-width: 1px;
            border-style: solid;
            border-color: lightgreen;
            background-color: white;
            border-spacing: 10px;
            border-collapse: separate;
            padding: 10px;
            font-size: 14px;
            font-family: Verdana, Arial, sans-serif;
        }
        table.stream img{ 
            padding: 10px;
        }
        footer {
            border-bottom: 1px #ccc solid;
            margin: 20px;
            text-align: right;
            text-transform: uppercase;
            color: black;
            background-image: url(http://gift-of-life.org/wp-content/uploads/2014/06/header-background-2.jpg);
            background-repeat: repeat-y;
            background-size: 100%;
            background-position: center;
        }
        table{
            width: 50%;
        }
	   table.grid {
	       font-family: verdana,arial,sans-serif;
	       font-size: 12px;
	       color:#333333;
	       border-width: 1px;
	       border-color: #666666;
	       border-collapse: collapse;
           margin: 4px auto 4px auto;
	    }
	   table.grid th {
	       border-width: 2px;
	       padding: 6px;
	       border-style: solid;
	       border-color: #666666;
	       background-color: #86f4e6;    
	   }
	   table.grid td {
	       border-width: 1px;
	       padding: 4px;
	       border-style: solid;
	       border-color: #666666;
	       background-color: #ffffff;
	       width: 20%;   
	   }
        caption{
            font-size: 10px;
            color: grey;
        }
    #profile-photo{
    background-image: url(https://thumb9.shutterstock.com/display_pic_with_logo/2635591/404348185/stock-photo-earth-day-and-charity-concept-with-green-planet-in-family-volunteer-hands-elements-of-this-image-404348185.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    margin-top: 10px;
    height: 160px;
    width: 180px;
    margin: 0 auto;
    display: block;
    }
    #mission-statement{
    font-style: italic;
    text-size: 10px;
    font-family: Georgia, serif, "Times New Roman";
    border-style: solid;
    border-width: 1px;
    border-color: grey;
    max-width: 50%;
    margin: 0 auto;
    padding: 2px;
    }
    .test-picture{
    max-width: 80%;
    max-height: 80%;
    }
    </style>

</head>
<!-- webpage content goes in the body -->
<body>

<div id="page">
    <h1>E-commerce and Philanthropy: Home</h1>

    <!--Note: This is a stock photo, not an actual logo we made -->
    <div id="image_logo"></div>
    
    <!--This is the main navigation bar for the org home page -->
    <nav>
        <ul>
            <li><a href="index.php">Account Settings</a></li>
            <li><a href=#DonationsHistory>Donation History</a></li>
            <li><a href=#Notifications></b>Notifications (2)</b></a></li>
<!-- The actual number of notifications will be loaded from the database. 2 is just included for testing look and feel -->
        </ul>
    </nav>


    <div class="content">

    <!--DONOR_NAME will be loaded from the database with a PHP statement -->
    <h2>Hello, [DONOR_NAME]!</h2>

    <!-- Profile photo will be loaded from the database with a PHP statement -->
    <div id="profile-photo"></div>           
    </div>
   
   <div class="user_timeline">
    <ul>
        <!--This table displays recent new donations in descending date order. Data is retrieved from the database with PHP below -->
		<table class="grid" id="donations">
		<h3 id="DonationsHistory">DONATION HISTORY:</h3>
		<tr>
                <th>Donation Date</th>
                <th>Items</th>
                <th>Organization Name</th>
		</tr>

<?php
$stmt = $mysqli->prepare("SELECT don_order.order_date, item.description, organization.org_name FROM organization INNER JOIN don_order ON organization.id = don_order.org_id INNER JOIN item ON don_order.id = item.order_id INNER JOIN users ON users.user_id = don_order.user_id WHERE users.user_id = 1");

$stmt->execute();

$stmt->bind_result($orddate, $item, $orgname);

while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $orddate . "\n</td>\n<td>\n" . $item . "\n</td>\n<td>\n" . $orgname . "\n</td>\n</tr>";
}
$stmt->close();
?>

		</table>           
            
<!-- The following block of PHP code selects the seven most recent donations and displays them in a table by descending date order -->
<?php
/*
$stmt = $mysqli->prepare();
$stmt->execute();
$stmt->bind_result();
while($stmt->fetch()){
}
$stmt->close();
*/
?>

		</table>
   

<!--This table displays recent new messages in descending date order. Data is retrieved from the database with PHP below -->
   <h3 id="Notifications">NOTIFICATIONS:</h3>
		<table class="grid" id="NewMessages">
			<tr>
            <th>Message Date</th>
				<th>From</th>
                <th>Message</th>
			</tr>


<!-- The following block of PHP code selects the seven most recent donations and displays them in a table by descending date order -->
<?php
/*
$stmt = $mysqli->prepare();
$stmt->execute();
$stmt->bind_result();
while($stmt->fetch()){
}
$stmt->close();
*/
?>
			</table>
       </div>


<!-- Credits -->
<footer>
    For CS 361 Project group 10: Mark Buckner, Kendra Ellis, Jonathan Gamble, Edwin Rubio, and Stuart Sandifer.
</footer>
</body>

</html>
