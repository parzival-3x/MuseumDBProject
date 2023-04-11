<?php
if (session_status() == PHP_SESSION_NONE) {
  ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../sessions'));
  //ini_set('session.gc_probability', 1);
  session_start(); 
}
include "db_conn.php";
?>

		<?php
if (isset($_SESSION['email'])) {
  $link_text = 'My Account';
  $link_href = 'manager.php';
} else {
  $link_text = 'Login';
  $link_href = 'loginp.php';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
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
   
		.myheader {/**/
  background-color: #dc4a38;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 20px;
}

.row {/**/
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.navbar {/**/
  display: flex;
  align-items: center;
}

.navbar-nav {/**/
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

.navbar-nav li {/**/
  margin-left: 20px;
}

.navbar-nav li:first-child {/**/
  margin-left: 0;
}

.navbar-nav a {/**/
  color: #000;
  text-decoration: none;
  font-weight: bold;
  font-size: 16px;
  transition: color 0.3s ease;
}

.navbar-nav a:hover {/**/
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
                  <a class="nav-link" href="Parking Page/index.html">Parking Pass</a>
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


     <h1>Hello, <?php echo $_SESSION['email']; ?></h1>
	
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
.social-media {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
footer img {
  width: 30px;
  height: 30px;
  margin: 0 5px;
}

	</style>
	<?php

	 
$email = $_SESSION['email'];
$sql = "SELECT Zip_Code FROM VISITORS WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

// Check if there is a result
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $zip_code = $row["Zip_Code"];
    }
} else {
    echo "0 results";
}
?>
<form action="" method="post">
  <label for="zip_code">Zip Code:</label>
  <input type="text" id="zip_code" name="zip_code" value="<?php echo $zip_code; ?>">
  <button type="submit" name="updatez">Update</button>
</form>
<?php

	 
$email = $_SESSION['email'];
// Query visitors table for visitor with matching email
$sql = "SELECT payment_status FROM VISITORS WHERE email='$email'";
$result = $conn->query($sql);

// Display payment status if visitor found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row["payment_status"] == true) {
        echo "<h1>Payment Status: Good</h1>";
    } else {
        echo "<h1>Payment Status: Bad</h1>";
    }
}

// Query visitors table for visitor with matching email
	$sql = "SELECT payment_status, is_member FROM VISITORS WHERE email='$email'";
	$result = $conn->query($sql);

	// Display payment status and membership checkbox for visitor
	if ($result->num_rows > 0) {
	    $row = $result->fetch_assoc();
	    $payment_status = $row["payment_status"];
	    $is_member = $row["is_member"];
	    echo "<p>Payment Status: ";
	    if ($payment_status == true) {
	        echo "Good</p>";
	    } else {
	        echo "Bad</p>";
	    }
	    echo "<p>Membership: </p>";
	    echo "<form method='post'>";
	    echo "<input type='checkbox' name='is_member' value='1' ";
	    if ($is_member == true) {
	        echo "checked";
	    }
	    echo "> Yes";
	    echo "<input type='checkbox' name='is_member' value='0' ";
	    if ($is_member == false) {
	        echo "checked";
	    }
	    echo "> No";
	    echo "<br>";
	    echo "<input type='submit' name='updatem' value='Update'>";
	    echo "</form>";
	} else {
	    echo "No visitors found with email: $email";
	}

// Check if the form has been submitted
if(isset($_POST['updatez'])) {
    // Get the new zip code value
    $new_zip_code = $_POST['zip_code'];
    
    // Update the zip code in the database
    $sql = "UPDATE visitors SET zip_code='$new_zip_code' WHERE email='$email'";
    if (mysqli_query($conn, $sql)) {
        echo "Zip code updated successfully";
		 $zip_code = $new_zip_code;
			
        // Reset the form to display the new value
        echo '<script>document.getElementById("zip_code").value = "'.$zip_code.'";</script>';
   
    } else {
        echo "Error updating zip code: " . mysqli_error($conn);
    }
}
if(isset($_POST['updatem'])) {

$is_member_new = $_POST["is_member"];
	    $sql = "UPDATE visitors SET is_member='$is_member_new' WHERE email='$email'";
	    if ($conn->query($sql) === TRUE) {
	        echo "Membership updated successfully";
			$is_member=$is_member_new;
	    } else {
	        echo "Error updating membership: " . $conn->error;
	    }
}
	
?>

	 <?php
	 
$email=$_SESSION['email'];
	// Query the database for some rows
	$sql = "SELECT License_Plate, PPDate, PDuration FROM PARKING_PASS WHERE Visitor_Email='$email'";
	$result = $conn->query($sql);

	// Output the rows in an HTML table
	if ($result->num_rows > 0) {
	echo "<table><tr><th>License_Plate number</th><th>ParkingPassDate</th><th>ParkingDuration</th></tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr><td>" . $row["License_Plate"] . "</td><td>" . $row["PPDate"] . "</td><td>" . $row["PDuration"] . "</td></tr>";
	}
	echo "</table>";
	} else {
	echo "0 results";
	}
?>

     <a href="logout.php">Logout</a>
     <hr/>
  <footer>
    <div class="social-media">
      <p>
        Follow us on:
        <a href="https://www.facebook.com/MFAHouston">
          <img src="https://cdn3.iconfinder.com/data/icons/capsocial-round/500/facebook-512.png" alt="Facebook"/></a>
        <a href="https://twitter.com/MFAH">
          <img src="https://cdn3.iconfinder.com/data/icons/capsocial-round/500/twitter-512.png" alt="Twitter"/></a>
        <a href="https://www.instagram.com/mfahouston/">
          <img src="https://cdn3.iconfinder.com/data/icons/capsocial-round/500/instagram-512.png" alt="Instagram"/></a>
        <a href="https://vimeo.com/mfahouston">
          <img src="https://cdn3.iconfinder.com/data/icons/capsocial-round/500/vimeo-512.png" alt="Vimeo"/></a>
      </p>
    </div>
  </footer>
</body>
</html>

