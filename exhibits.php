<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>MFAH</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <header class="myheader">
    <div class="row">
      <a href="index.php">
        <button type="button">
          <img src="/img/MFAHlogo.png" height="100" alt="logo">
        </button>
      </a>
      <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

		<?php
		
if (isset($_SESSION['email'])) {
  $link_text = 'My Account';
  $link_href = 'visitor.php';
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
    <body>
        <?php
            $servername = "34.30.147.150";
            $username = "root";
            $password = "Gocoogs15!";
            $dbname = "museum";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //$conn->close();
        ?>
        <h1>Exhibits & Artworks</h1>
        <?php
            $sql = "SELECT * FROM EXHIBITS";
            $result = $conn->query($sql);
            $e = $result->fetch_all(MYSQLI_ASSOC);
            if (count($e) > 0)                {
                foreach ($e as $e)
                {
                    echo '<h2>' .$e["Name"]. '</h2>';
                    echo '<p>' .$e["Description"]. '</p>';
                    echo 'Located at ' .$e["Location"]. 'From ' .$e["Start_Date"]. 'to ' .$e["End_Date"]. '<br>';
                    echo '<div class="grid-container">';

                    $eID = $e["Exhibit_ID"];
                    $sql = "SELECT * FROM ARTWORKS WHERE ARTWORKS.Exhibit_ID = $eID";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            echo '<div class="grid-item"><img src></div>"';
                            echo '<div class="grid-item">' .$row["Creator_Name"].'<br>' .$row["Name"].'<br>' .$row["Creation_Date"].'<br>' .$row["Description"].'<br>' .$row["Date_of_display"].'<br>' .$row["Artwork_ID"]. '</div>';
                        }
                    }
                    else
                    {
                        echo "0 results";
                    }
                    echo '</div>';
                }
            } 
            else 
            {
                 echo "0 results";
            }
        ?> 
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
