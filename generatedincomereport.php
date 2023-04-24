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
    
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $startdatetime = date('Y-m-d H:i:s', strtotime($startdate)); //for tickets, which uses datetime
    $enddatetime = date('Y-m-d H:i:s', strtotime($enddate)); //for tickets, which uses datetime
    //ALSO FIX CREATED AT IN EMAILDISPLAY

	$con = mysqli_connect('34.30.147.150', 'Taylor', 'thenumber1','museum');


	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
	}

	
	$sql = "SELECT IFNULL(SUM(ItemIncome),0) AS total_gifts FROM GIFTSHOPPURCHASES WHERE Purchasedate >= '$startdate' and Purchasedate <= '$enddate'";
	
	$rs = mysqli_query($con, $sql);

    if (!$rs) {
        die("Query Giftshop failed: " . mysqli_error($con));
    }
    

    $row1 = mysqli_fetch_assoc($rs);

    $sumgift = $row1['total_gifts'];
    $sumgift_formatted = number_format($sumgift, 2, '.', '');

    echo "Total Gross Gift Shop Income: $";
    echo $sumgift_formatted;

    echo "</br>";  
	
	$sql = "SELECT IFNULL(SUM(Income_from_donations), 0) AS total_donations FROM DONATIONS WHERE Day >= '$startdate' and Day <= '$enddate'";

	$rs = mysqli_query($con, $sql);

    if (!$rs) {
        die("Query Donations failed: " . mysqli_error($con));
    }
    

    $row2 = mysqli_fetch_assoc($rs);

    $sumdonations = $row2['total_donations'];
    $sumdonations_formatted = number_format($sumdonations, 2, '.', '');

    echo "Total Gross Donations Income: $";
    echo $sumdonations_formatted;
    
    echo "</br>";  

    $sql = "SELECT IFNULL(SUM(Income_from_restaurant), 0) AS total_restaurant FROM RESTAURANT WHERE date >= '$startdate' and date <= '$enddate'";
	
	$rs = mysqli_query($con, $sql);

    if (!$rs) {
        die("Query Restaurant failed: " . mysqli_error($con));
    }
    

    $row3 = mysqli_fetch_assoc($rs);

    $sumrestaurant = $row3['total_restaurant'];
    $sumrestaurant_formatted = number_format($sumrestaurant, 2, '.', '');

    echo "Total Gross Restaurant Income: $";
    echo $sumrestaurant_formatted;

    echo "</br>";  

    $sql = "SELECT SUM(Income_from_parking_per_week) FROM PARKING";
	
	$rs = mysqli_query($con, $sql);

    if (!$rs) {
        die("Query Parking failed: " . mysqli_error($con));
    }
    

    $row4 = mysqli_fetch_assoc($rs);

    $sumparking = $row4['SUM(Income_from_parking_per_week)'];
    $dayselapsed = (strtotime($enddate) - strtotime($startdate)) / (60 * 60 * 24);
    $totalsumparking = ($dayselapsed / 7) * $sumparking;
    $totalsumparking_formatted = number_format($totalsumparking, 2, '.', '');

    echo "Total Gross Parking Income: $";
    echo $totalsumparking_formatted;

    echo "</br>";  


    $sql = "SELECT IFNULL(SUM(IncomeTicket), 0) AS total_tickets FROM TICKETS WHERE DateGiven >= '$startdatetime' and DateGiven <= '$enddatetime'";
	
	$rs = mysqli_query($con, $sql);

    if (!$rs) {
        die("Query Restaurant failed: " . mysqli_error($con));
    }
    

    $row5 = mysqli_fetch_assoc($rs);

    $sumtickets = $row5['total_tickets'];
    $sumtickets_formatted = number_format($sumtickets, 2, '.', '');

    echo "Total Gross Tickets Income: $";
    echo $sumtickets_formatted;

    echo "</br>";  

    $sumtotal = $sumgift_formatted + $sumdonations_formatted + $sumrestaurant_formatted + $totalsumparking_formatted + $sumtickets_formatted;

    echo "Gross Income: $";

    echo $sumtotal;


	
	mysqli_close($con);
	?>
</div>
</body>
</html>