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
                <a class="nav-link" href="#">Parking Pass</a>
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
  </body>
</html>