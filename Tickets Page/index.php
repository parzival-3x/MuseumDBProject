<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets | The Museum of Fine Arts, Houston</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if (isset($_SESSION['email'])) {
  $link_text = 'My Account';
  $link_href = 'visitor.php';
} else {
  $link_text = 'Login';
  $link_href = 'loginp.php';
} 
?>
  <header class="myheader">
    <div class="row">
        <a href="../index.php">
        <button type="button">
            <img src="/img/MFAHlogo.png" height="110" alt="logo">
        </button>
        </a>

        <div class="column">
        <nav class="navbar">
            <div class="help" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Tickets</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../exhibits.php">Exhibits</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../calendar.php">Calendar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../movies.php">Films</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../Tours Page/Tours/index.html">Tours</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../giftshop.php">Gift Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../donations.php">Donations</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../restaurants.php">Restaraunt</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.html">Contact us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../visitus.php">Visit us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../Parking Page/index.html">Parking Pass</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../loginp.php">Log in</a>
                </li>
            </ul>
            </div>
        </nav>
        </div>
    </div>
</header>
<main>
  <h1>Tickets</h1>
    <section class="intro">
        <p><strong>No Need to Pay General Admission If . . .&nbsp;</strong></p>
        <p>&bull; You are visiting on a Thursday, when general admission is free for everyone, courtesy of Shell Oil Company.&nbsp;<em>Ticketed exhibitions are separate from general admission and remain ticketed on Thursdays</em>.</p>
        <p>&bull; You are age 12 or younger. This age group receives free general admission every day.</p>
    </section>
    <section class="tour-options">
        <h2>Museum Admissions</h2>
        <p><em>General admission includes the MFAH collections and selected exhibitions.</em></p>
    <!-- Begin Grid Row -->
    <div class="row">
    <div class="col-sm-6 pl-2 pr-8 ">
    <div class="container-fluid">
    <p><strong>Visit</strong><br />$19 Adult (19+)<br />$16 Senior (65+)<br />$12 Youth (13&ndash;18)<br />$FREE Child (12 &amp; younger)</p>
    </div>
    </div>
    </div>
    <!-- Begin Grid Row -->
    </section>
    <h1>Ticket Purchase</h1>
    <form id="ticket-form" method="post" action="ticketinsert.php">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      <br>
      <label for="type">Type:</label>
      <input type="text" id="type" name="type" value="General" readonly>
      <br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <br>
      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required>
      <br>
      <label for="time">Time:</label>
      <select id="time" name="time" required>
        <option value="" disabled selected>Select a time</option>
        <option value="11:00">11:00 AM</option>
        <option value="12:00">12:00 PM</option>
        <option value="13:00">1:00 PM</option>
        <option value="14:00">2:00 PM</option>
        <option value="15:00">3:00 PM</option>
        <option value="16:00">4:00 PM</option>
        <option value="17:00">5:00 PM</option>
        <option value="18:00">6:00 PM</option>
        <option value="19:00">7:00 PM</option>
      </select>
      <br>
      <fieldset>
        <legend>Ticket Types:</legend>
        <div class="ticket_type">
          <label for="adult-ticket">Adult ($19):</label>
          <input type="number" id="adult-ticket" name="adult-ticket" min="0" max="10" value="0">
        </div>
        <div class="ticket_type">
          <label for="senior-ticket">Senior ($16):</label>
          <input type="number" id="senior-ticket" name="senior-ticket" min="0" max="10" value="0">
        </div>
        <div class="ticket_type">
          <label for="youth-ticket">Youth ($12):</label>
          <input type="number" id="youth-ticket" name="youth-ticket" min="0" max="10" value="0">
        </div>
        <div class="ticket_type">
          <label for="child-ticket">Child ($FREE):</label>
          <input type="number" id="child-ticket" name="child-ticket" min="0" max="10" value="0">
        </div>
      </fieldset>
      <br>
      <label for="total-price">Total Price:</label>
      <span id="total-price"></span>
      <input type="hidden" id="hidden-price" name="price">
      <br>
      <button type="submit">Purchase</button>
    </form>
    <p><strong>Museum Hours:</strong> Open Wednesday through Sunday, 11:00 AM to 8:00 PM. Closed on Monday and Tuesday.</p>
    <div id="purchase-message" class="purchase-message" style="display:none;">Tickets have been purchased successfully!</div>
    <script src="script.js"></script>
</main>
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
      <p>Copyright &copy; 2023, The Museum of Fine Arts Houston. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
