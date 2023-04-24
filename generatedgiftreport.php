<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Taylor Rogers">
        <meta name="description" content ="This is a report for gift shop. It produces a table that displays how much each item sold and how much Income was generated over a time span.">
        <link rel="icon" href="museumImageURL.png" type="image/x-icon">
        <link rel="stylesheet" href="giftshopreport.css" type="text/css">
        <title>Report 2 (GiftShop)</title>
    </head>
<body>
<div class = "giftshoptable">
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

    $con = mysqli_connect('34.30.147.150', 'Taylor', 'thenumber1','museum');


	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
	}


    $item_query = "SELECT Product_name, Item_Cost FROM GIFT_SHOP";
    $item_result = mysqli_query($con, $item_query);

    $purchases_query = "SELECT Product_name, COUNT(*) as num_purchases, SUM(ItemIncome) as total_income FROM GIFTSHOPPURCHASES 
    WHERE Purchasedate >= '$startdate' AND Purchasedate <= '$enddate' GROUP BY Product_name";
    $purchases_result = mysqli_query($con, $purchases_query);
    $purchases = array();
    while ($row = mysqli_fetch_assoc($purchases_result)) {
        $purchases[$row['Product_name']] = array('num_purchases' => $row['num_purchases'], 'total_income' => $row['total_income']);
            }
    echo '<table>';
    echo '<tr><th>Product Name</th><th>Cost</th><th>Number of Purchases From ' . $startdate . ' to ' . $enddate . '</th><th>Total Income From Item</th></tr>';

    while ($row = mysqli_fetch_assoc($item_result)) {
        $item_name = $row['Product_name'];
        $cost = $row['Item_Cost'];
        $num_purchases = isset($purchases[$item_name]['num_purchases']) ? $purchases[$item_name]['num_purchases'] : 0; //return 0 if no purchases
        $total_income = isset($purchases[$item_name]['total_income']) ? $purchases[$item_name]['total_income'] : 0; //return 0 if no income

        echo "<tr><td>$item_name</td><td>$cost</td><td>$num_purchases</td><td>$total_income</td></tr>";
    }

    echo '</table>';

    ?>