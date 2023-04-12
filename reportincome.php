<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Taylor Rogers">
        <meta name="description" content ="This is a report for income. It sums the income columns and echoes the result.">
        <link rel="icon" href="museumImageURL.png" type="image/x-icon">
        <link rel="stylesheet" href="donations.css" type="text/css">
        <title>Report 1 (Income)</title>
    </head>
<body>
<div class = "ReportIncome">
	<?php
    if (session_status() == PHP_SESSION_NONE) {
        ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../sessions'));
        session_start();  
      }
    if (isset($_SESSION['email'])) {
        $link_text = 'My Account';
        $link_href = 'manager.php';
      } else {
        $link_text = 'Login';
        $link_href = 'loginp.php';
      }
	include 'header.php';

	$con = mysqli_connect('34.30.147.150', 'Taylor', 'thenumber1','museum');


	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
	}

	
	$sql = "SELECT SUM(Income_from_gift_shop) FROM GIFT_SHOP";
	
	$rs = mysqli_query($con, $sql);

    if (!$rs) {
        die("Query Giftshop failed: " . mysqli_error($con));
    }
    

    $row1 = mysqli_fetch_assoc($rs);

    $sumgift = $row1['SUM(Income_from_gift_shop)'];

    echo "Total Gross Gift Shop Income: $";

    echo $sumgift;

    echo '.00';
    echo "</br>";  
	
    $sql = "SELECT SUM(Income_from_donations) FROM DONATIONS";
	
	$rs = mysqli_query($con, $sql);

    if (!$rs) {
        die("Query Donations failed: " . mysqli_error($con));
    }
    

    $row2 = mysqli_fetch_assoc($rs);

    $sumdonations = $row2['SUM(Income_from_donations)'];

    echo "Total Gross Donations Income: $";

    echo $sumdonations;

    echo '.00';
    echo "</br>";  

    $sql = "SELECT SUM(Income_from_restaurant) FROM RESTAURANT";
	
	$rs = mysqli_query($con, $sql);

    if (!$rs) {
        die("Query Restaurant failed: " . mysqli_error($con));
    }
    

    $row3 = mysqli_fetch_assoc($rs);

    echo "Total Gross Restaurant Income: $";

    $sumrestaurant = $row3['SUM(Income_from_restaurant)'];

    echo $sumrestaurant;

    echo '.00';
    echo "</br>";  

    $sql = "SELECT SUM(Income_from_parking_per_week) FROM PARKING";
	
	$rs = mysqli_query($con, $sql);

    if (!$rs) {
        die("Query Parking failed: " . mysqli_error($con));
    }
    

    $row4 = mysqli_fetch_assoc($rs);

    $sumparking = $row4['SUM(Income_from_parking_per_week)'];

    echo "Total Gross Parking Income: $";

    echo $sumparking;

    echo '.00';
    echo "</br>";  

    $sumtotal = $sumgift + $sumdonations + $sumrestaurant + $sumparking;

    echo "Gross Income: $";

    echo $sumtotal;

    echo ".00";
	
	mysqli_close($con);
	?>
</div>
</body>
</html>