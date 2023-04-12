<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['email']))

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Hours spent based on age</title>
	  <style>
      able {
        border-collapse: collapse;
        width: 100%;
        font-family: Arial, sans-serif;
        margin-bottom: 20px;
      }
      
      th, td {
        text-align: left;
        padding: 8px;
        border: 1px solid #ddd;
      }
      
      th {
        background-color: #4CAF50;
        color: white;
      }
      
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      
      tr:hover {
        background-color: #ddd;
      }
   
		.myheader {
  background-color: #dc4a38;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 20px;
}

.row {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.navbar {
  display: flex;
  align-items: center;
}

.navbar-nav {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

.navbar-nav li {
  margin-left: 20px;
}

.navbar-nav li:first-child {
  margin-left: 0;
}

.navbar-nav a {
  color: #000;
  text-decoration: none;
  font-weight: bold;
  font-size: 16px;
  transition: color 0.3s ease;
}

.navbar-nav a:hover {
  color: #fff;
}

.logo {
  display: flex;
  align-items: center;
}

.logo img {
  height: 60px;
  margin-right: 10px;
}


</style>
</head>
<body>
<header class="myheader">
    <div class="row">
        <a href="index.php">
        <button type="button">
            <img src="/img/MFAHlogo.png" height="100" alt="logo">
        </button>
        </a>
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
?>

        <div class="column">
        <nav class="navbar">
            <div class="help" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Tickets</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Exhibits</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Calendar</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="movies.php">Films</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Tours</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Gift Shop</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Donations</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Restaraunt</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contact us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="visitus.php">Visit us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo $link_href; ?>"><?php echo $link_text; ?></a>
                </li>
            </ul>
            </div>
        </nav>
        </div>
    </div>
</header>	
<style>
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 50px;
			font-size: 20px;
		}

		label {
			margin-bottom: 10px;
			text-align: center;
		}

		input {
			padding: 10px;
			margin-bottom: 20px;
			width: 300px;
			border-radius: 5px;
			border: 1px solid gray;
			font-size: 18px;
			text-align: center;
		}

		button {
			padding: 10px;
			background-color: blue;
			color: white;
			font-size: 20px;
			border-radius: 5px;
			border: none;
			cursor: pointer;
			transition: background-color 0.3s;
		}

		button:hover {
			background-color: darkblue;
		}

		.message {
			font-size: 20px;
			margin-top: 20px;
			text-align: center;
		}
		.input[type="checkbox"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  width: 20px;
  height: 20px;
  border: 2px solid #ccc;
  border-radius: 3px;
  outline: none;
  cursor: pointer;
  transition: border-color 0.3s ease;
}

.input[type="checkbox"]:checked {
  border-color: #dc4a38;
  background-color: #dc4a38;
}

	</style>
	<?php

	 
	//<?php 
	$sql = "SELECT Age, AVG(Hours_spent_in_museum) AS avg_timespent FROM VISITORS GROUP BY FLOOR(age/5)";
	$result = $conn->query($sql);

	// Display data in a table
	echo "<table>";
	echo "<tr><th>Age Range</th><th>Average Time Spent</th></tr>";
	while($row = $result->fetch_assoc()) {
	$age_range = ($row["Age"]/5)*5 . " - " . (($row["Age"]/5)*5 + 4);
	$avg_timespent = $row["avg_timespent"];
	echo "<tr><td>$age_range</td><td>$avg_timespent</td></tr>";
	}
	echo "</table>";
	?>
</body>
</html>

