<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Taylor Rogers">
        <meta name="description" content ="This shows for a successful donation">
        <link rel="icon" href="museumImageURL.png" type="image/x-icon">
        <link rel="stylesheet" href="donations.css" type="text/css">
        <title>Donation Insert Page</title>
    </head>
<body>

	<?php
	include 'header.php';

	$con = mysqli_connect('34.30.147.150', 'Taylor', 'thenumber1','museum');


	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$donationamt = $_POST['donationamt'];
	
	$fullName = $firstName . " " . $lastName;
	$sqldate = date("Y-m-d");
	
	$sql = "INSERT INTO `DONATIONS` (Group_Name, Day, Amount, Income_from_donations) VALUES ('$fullName', '$sqldate', '$donationamt', '$donationamt')";
	
	$rs = mysqli_query($con, $sql);
	
	if (!$rs) {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	} else {
		echo "Contact Records Inserted";
	}
	
	mysqli_close($con);
	?>
</body>
</html>