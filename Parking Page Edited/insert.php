<?php
$servername = "34.30.147.150";
$username = "Yahya";
$password = "Yizzy34";
$dbname = "museum";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$zone = $_POST['zone-select'];
$hours = $_POST['hours-input'];

// Insert user input into the database
$sql = "INSERT INTO PARKING (Zone, PHours, Price, Passes_given_per_day, Income_from_parking_per_week, capacity)
        VALUES ('$zone', '$hours:00:00', 20, 0, 0, 0)";

$rs = mysqli_query($con, $sql);
if (!$rs) {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
} else {
  echo "Contact Records Inserted";
}

mysqli_close($con);
?>
