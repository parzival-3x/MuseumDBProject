<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets | The Museum of Fine Arts, Houston</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

	$con = mysqli_connect('34.30.147.150', 'Yahya', 'Yizzy34','museum');


	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
	} 
	
	
	$date = $_POST['date'];
	$time = $_POST['time'];
    $datetime = $date . ' ' . $time;
	$type = $_POST['type'];
	$price = $_POST['hidden-price'];
	$incomeTicket = $price * 0.1;

	
	$sql = "INSERT INTO `TICKETS` (DateGiven, type, price, Discount, IncludeAudio IncomeTicket) VALUES ('$datetime', '$type', '$price', 0, 0, '$incomeTicket')";
	
	$rs = mysqli_query($con, $sql);
	
	if (!$rs) {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	} else {
		echo "Ticket purchased successfully!";
	}
	
	mysqli_close($con);
	?>
</body>
</html>