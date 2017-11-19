<!-- PHP block to test the connection from the page to the database: The message "TEST: Connected to DB server succesfully should appear at the very top of the webpage if the connection test is successful" -->
<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ellisken-db","cqs3Ii2O8xoRdNVI","ellisken-db");
if($mysqli->connect_errno){
  echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
  }
  echo "TEST: Connected to DB server successfully!";
?>

<!DOCTYPE html>
<html>

<!--The head of our HTML file includes the CSS style sheet --> 
<head>

    <title>E-commerce and Philanthropy Platform (DEMO)</title>

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

        p li{
            text-style: italic;
            text-align: left;
            text-size: 20px;
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

    </style>

</head>
<!-- webpage content goes in the body -->
<body>

<div id="page">
    <h1>E-commerce and Philanthropy: Home</h1>

    <!--Note: This is a stock photo, not an actual logo we made -->
    <div id="image_logo"></div>
    
    <!--This is the main navigation bar for the site -->
    <nav>
        <ul>
            <li><a href="/home">Home</a></li>
            <li><a href="/settings">Account Settings</a></li>
            <li><a href="/donationHistory">Donation History</a></li>
            <li><a href="/search">Search</a></li>
            <!-- The actual number of notifications will be loaded from the database. 2 is just included for testing look and feel -->
            <li><a href="/notifications"><b>Notifications (2)</b></a></li>

        </ul>
    </nav>


    <div class="content">
    
    <!--USER_NAME will be loaded from the "Donation_Profile" table -->
    <h2>Welcome, USER_NAME</h2>
        <p>           
    </div>
   
   <div class="user_timeline">
    <ul>
        <!--This section will need code included to retrieve donation history data from the "Donation_History" table -->
   
	<h3>RECENT DONATIONS:</h3>
		<table class="grid" id="RecentDonations">
			<caption><b>Donated Items</b></caption>
			<tr>
				<th>Organization</th>
                <th>Order Date</th>
                <th>Items</th>
                <th>Donor</th>
			</tr>

<!-- The following block of PHP code selects the sevent most recent donations and displays them in a table by descending date order -->
<?php
$stmt = $mysqli->prepare("SELECT organization.username, don_order. order_date, item.description, donor.username FROM donor INNER JOIN don_order ON donor.id = don_order.don_id INNER JOIN item ON don_order.id = item.order_id INNER JOIN organization ON don_order.org_id = organization.id
ORDER BY order_date desc LIMIT 7");

$stmt->execute();

$stmt->bind_result($org, $orddate, $item, $donor);

while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $org . "\n</td>\n<td>\n" . $orddate . "\n</td>\n<td>\n" . $item . "\n</td>\n<td>\n" . $donor . "\n</td>\n</tr>";
}
$stmt->close();
?>

		</table>
   

        <!--This section will need PHP statement included to retrieve message notifications from the "Donor_Profile" table, similar to the above table -->

<?php
//Place holder for code to select recent messages and display in table
?>
   <h3>NEW MESSAGES:</h3>
		<table class="grid" id="NewMessages">
			<caption><b>Notifications</b></caption>
			<tr>
            <th>Message Date</th>
				<th>From</th>
                <th>Message</th>
        
			</tr>
			</table>
       </div>

<!-- Credits -->
<footer>
    For CS 361 Project group 10: Mark Buckner, Kendra Ellis, Jonathan Gamble, Edwin Rubio, and Stuart Sandifer.
</footer>
</body>

</html>
