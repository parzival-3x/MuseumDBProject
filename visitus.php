<!DOCTYPE html>
<html>
  <head>

  	<title>Visit Us</title>
	<style>
    iframe {
        margin-top: 20px;
    }
</style>
  <link rel="icon" href="/img/museumImageURL.png" type="image/x-icon">
</head>
<body>
		<style>
      .column{
    margin-top: 58px;
    width: 100%;
}
		.myheader {
  background-color: #dc4a38;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  /*padding: 20px;*/
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

	<h1> This is how to get to the museum  </h1>
	<center>
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21684.200702605034!2d-95.39178666610294!3d29.72784735956567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640bf7f4f901e4b%3A0xb26d37a71c9ca53d!2sThe%20Museum%20of%20Fine%20Arts%2C%20Houston!5e0!3m2!1sen!2sus!4v1679885019831!5m2!1sen!2sus" 
   width="600"
   height="450"
   style="border:10;"
   allowfullscreen=""
   loading="lazy"
   referrerpolicy="no-referrer-when-downgrade">
   </iframe>
   </center>
 </body>
</html>
