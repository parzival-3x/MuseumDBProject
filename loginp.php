<?php
if (session_status() == PHP_SESSION_NONE) {
  ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../sessions'));
  session_start(); 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
.body {
	background: #fff;
	display: flex;
	
	align-items: center;
	height: 100vh;
	flex-direction: column;
}


.form {
	width: 500px;
	border: 2px solid #ccc;
	padding: 30px;
	background: #fff;
	border-radius: 15px;
}

.h2 {
	text-align: center;
	margin-bottom: 40px;
}

.input {
	display: block;
	border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 5px;
}
.label {
	color: #000;
	font-size: 18px;
	padding: 10px;
}

.button {
	float: right;
	padding: 10px 15px;
	color: #000;
	border-radius: 5px;
	margin-right: 10px;
	border: none;
}
.button:hover{
	opacity: .7;
}
.error {
   background: #F2DEDE;
   color: #000;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
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
                  <a class="nav-link" href="Contact Us Page/index.html">Contact us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="visitus.php">Visit us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Parking Page/index.php">Parking Pass</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="loginp.php">Login</a>
                </li>
            </ul>
            </div>
        </nav>
        </div>
    </div>
</header>

     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Email</label>
     	<input type="text" name="uname" placeholder="example@gmail.com"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder=""><br>

     	<button type="submit">Login</button>
     </form>
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