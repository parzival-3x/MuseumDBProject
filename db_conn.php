<?php

$sname= "34.30.147.150";
$unmae= "Arvin";
$password = "Rwin#3470";

$db_name = "museum";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
