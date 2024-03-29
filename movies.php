<?php
if (session_status() == PHP_SESSION_NONE) {
  ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../sessions'));
  session_start();  
}		
if (isset($_SESSION['email'])) {
  $link_text = 'My Account';
  $link_href = (str_contains($_SESSION['email'], '@mfah.org') ? 'manager.php': 'visitor.php');
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
    <title>Films</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" href="/img/museumImageURL.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/82d9567c4f.js" crossorigin="anonymous"></script>
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
                <a class="nav-link" href="Contact Us Page/index.html">Contact us</a>
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
  <body>
    <div class="imgdiv">
      <h1>
          Now playing at the Brown Auditorium Theater
      </h1>
    </div>
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
      $listsql = "SELECT DISTINCT MovName FROM SORT_TIME";
      $list = $conn->query($listsql);
      if ($list->num_rows > 0) {
        // output data of each row
        $array = array();
        while($title = $list->fetch_assoc()){
          $array[] = $title["MovName"];
        }
        for ($i = 0; $i < count($array); $i++){
          $temp = $array[$i];
          $sql = "SELECT MOVIES.MovName, MOVIES.Description as about, MOVIES.Language as lang, Director, 
          MOVIES.Year as yr, Runtime, Poster, price, MOVIE_TIMES.Day as filmday, 
          MOVIE_TIMES.Time as filmtime 
          FROM MOVIES, MOVIE_TIMES
          WHERE MOVIES.MovName = MOVIE_TIMES.MovName AND MOVIES.MovName = ?
          ORDER BY filmday";
          $result = $conn->execute_query($sql,[$temp]);
          $row = $result->fetch_assoc();
          ?>
          <div class="row">
            <?php echo '<div><img src="/posters/'.$row["Poster"].'" alt="'.$row["Poster"].'"style="height:400px"></div>'; ?>
            <div>
            <?php 
              echo '<h2>'.$row["MovName"].' </h2>';
              if($row["Director"]!=NULL){echo '<h4>Directed by '.$row["Director"].'</h4>';}
              echo '<h4>('.$row["yr"];
              if($row["Runtime"]!=NULL){echo ', '.$row["Runtime"].' minutes';}
              if($row["lang"]!=NULL){echo ', in '.$row["lang"];}
              echo ')</h4>';
              echo '<p>'.$row["about"].'</p>';
              do{
                echo '<h3>'.date('l\, F j\, Y',strtotime($row["filmday"])).'</h3>';
                ?>
                <a class="ticketbutn" href="#"><i class="fa-solid fa-ticket-simple"></i> <?php echo date('g A',strtotime($row["filmtime"]));?> </a>
                <?php
              }while($row = $result->fetch_assoc());
            ?>
            </div>
          </div>
          <?php
      }
      } else {
        echo "0 results";
      }
      ?>
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