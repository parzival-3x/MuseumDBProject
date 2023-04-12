<?php
if (session_status() == PHP_SESSION_NONE) {
  ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../sessions'));
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
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>MFAH</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" href="/img/museumImageURL.png" type="image/x-icon">
  </head>
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
      $sql = "SELECT ARTWORKS.Name AS Piece, ARTWORKS.Picture, EXHIBITS.Name FROM ARTWORKS, EXHIBITS WHERE ARTWORKS.Exhibit_ID = EXHIBITS.Exhibit_ID ORDER BY ARTWORKS.Date_of_display DESC LIMIT 3";
      $result = $conn->query($sql);
      //$conn->close();
    ?>
    <!-- Slideshow container -->
    <div class="slideshow-container">
    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
      <div class="imgdiv">
        <?php
          $row = $result->fetch_assoc();
          echo '<img src=" '.$row["Picture"].'" alt="picture1" style="height:250px;"></div>';
          echo '<div class="text">'.$row["Piece"].' from '.$row["Name"].'</div>';
        ?>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <div class="imgdiv">
        <?php
          $row = $result->fetch_assoc();
          echo '<img src=" '.$row["Picture"].'" alt="picture2"style="height:250px;"></div>';
          echo '<div class="text">'.$row["Piece"].' from '.$row["Name"].'</div>';
        ?>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <div class="imgdiv">
        <?php
          $row = $result->fetch_assoc();
          echo '<img src=" '.$row["Picture"].'" alt="picture3"style="height:250px;"></div>';
          echo '<div class="text">'.$row["Piece"].' from '.$row["Name"].'</div>';
        ?>
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <script>
      let slideIndex = 1;
      showSlides(slideIndex);

      // Next/previous controls
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      // Thumbnail image controls
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
      }
    </script>
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
