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
                <a class="nav-link" href="#">Restaraunt</a>
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
