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
                  <a class="nav-link" href="Tickets Page/index.php">Tickets</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="exhibits.php">Exhibits</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="calendar.php">Calendar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="movies.php">Films</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Tours Page/Tours/index.html">Tours</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="giftshop.php">Gift Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="donations.php">Donations</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="restaurants.php">Restaraunt</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Contact Us Page/index.html ">Contact us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="visitus.php">Visit us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Parking Page/index.php">Parking Pass</a>
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
// Default selected dates (if none provided)
$selected_date1 = date('Y-m-d');
$selected_date2 = date('Y-m-d');

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get selected dates from form data
    $selected_date1 = $_POST['selected_date1'];
    $selected_date2 = $_POST['selected_date2'];
}

// Construct the SQL query
$sql = "SELECT FLOOR(v.Age/5)*5 AS Age_range, AVG(v.Hours_spent_in_museum) AS avg_timespent
        FROM VISITORS v
        JOIN TICKETS t ON v.Email = t.VEmail
        WHERE t.DateGiven >= '$selected_date1'
        AND NOT EXISTS (
            SELECT 1
            FROM TICKETS t2
            WHERE t2.VEmail = v.Email
            AND t2.DateGiven < '$selected_date1'
        )
        AND EXISTS (
            SELECT 1
            FROM TICKETS t3
            WHERE t3.VEmail = v.Email
            AND t3.DateGiven < '$selected_date2'
        )
        GROUP BY Age_range";

$result = $conn->query($sql);

// Display data in a table
echo "<form method='post'>";
echo "<label for='selected_date1'>Select a start date:</label>";
echo "<input type='date' id='selected_date1' name='selected_date1' value='$selected_date1'>";
echo "<br>";
echo "<label for='selected_date2'>Select an end date:</label>";
echo "<input type='date' id='selected_date2' name='selected_date2' value='$selected_date2'>";
echo "<br>";
echo "<button type='submit'>Update</button>";
echo "</form>";

echo "<table>";
echo "<tr><th>Age Range</th><th>Average Time Spent</th></tr>";
while($row = $result->fetch_assoc()) {
    $age_range_start = $row["Age_range"];
    $age_range_end = $age_range_start + 4;
    $avg_timespent = $row["avg_timespent"];
    echo "<tr><td>$age_range_start - $age_range_end</td><td>$avg_timespent</td></tr>";
}
echo "</table>";
?>
</body>
</html>

