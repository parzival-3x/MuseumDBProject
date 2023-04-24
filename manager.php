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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>MFAH</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" href="/img/museumImageURL.png" type="image/x-icon">
</head>
  <body>
    <?php include 'header.php'; ?> 
    <h1>Hello, <?php echo $_SESSION['email']; ?></h1>
    <center><h3>Add artwork</h3></center>
    <form action="insert.php" method="post" enctype="multipart/form-data">
      <label for="Artwork_ID">Artwork ID:</label><!--Artwork_ID      | int          | NO -->
      <input type="text" id="Artwork_ID" name="Artwork_ID">
      <label for="Exhibit_ID">Exhibit:</label><!--Exhibit_ID      | int          | YES -->
      <select id="Exhibit_ID" name="Exhibit_ID">
        <option value="">Select one</option>
        <?php
          $list = mysqli_query($conn, "SELECT Name as exhibit from EXHIBITS");
          while($row = $list->fetch_assoc()){
            ?>
              <option value="<?php echo $row['exhibit']; ?>"> <?php echo $row['exhibit'];?> </option>
            <?php
          }
        ?>
      </select>
      <label for="Description">Add a description:</label><!--Description| varchar(100)| YES -->
      <input type="text" id="Description" name="Description">
      <label for="Creation_Date">Select a creation date:</label><!--Creation_Date| date| NO -->
      <input type="date" id="Creation_Date" name="Creation_Date" value="">
      <!-- Date_of_display| date| NO -->
      <label for="Creator_Name">Creator name:</label><!--Creator_Name| varchar(100)| NO -->
      <input type="text" id="Creator_Name" name="Creator_Name">
      <label for="Name">Name of piece:</label><!--Name| varchar(100)| NO -->
      <input type="text" id="Name" name="Name">
      <label for="Picture">Upload a picture of the piece:</label><!--Picture| varchar(100)| NO -->
      <input type="file"name="Picture" id="Picture">
      <button type="submit" name="updateArtwork">Update</button>
    </form>
    <hr>
    <center><h3>Add to calendar</h3></center>
    <form action="insert.php" method="post">
      <label for="Event_Name">Add an event name:</label><!--Event_Name| varchar(100)| NO -->
      <input type="text" id="Event_Name" name="Event_Name">
      <label for="Time_Stamp">Add the event time:</label><!--Time_Stamp| time| NO -->
      <input type="time" id="Time_Stamp" name="Time_Stamp" min="11:00">
      <label for="Date_of_Event">Select the event date:</label><!--Date_of_Event| date| YES -->
      <input type="date" id="Date_of_Event" name="Date_of_Event" value="" min="<?php echo date("Y-m-d");?>">
      <label for="Location_of_Event">List the location:</label><!--Location_of_Event| varchar(100)| NO -->
      <input type="text" id="Location_of_Event" name="Location_of_Event">
      <button type="submit" name="updateCalendar">Update</button>
    </form>
    <hr>
    <center><h3>Remove from calendar</h3></center>
    <form action="insert.php" method="post">
      <label for="Event_Name">Delete an event by giving its name:</label><!--Event_Name| varchar(100)| NO -->
      <input type="text" id="Event_Name" name="Event_Name">
      <button type="submit" name="deleteCalendar">Delete</button>
    </form>
    <hr>
    <center><h3>Add exhibit</h3></center>
    <form action="insert.php" method="post">
      <label for="Exhibit_ID">Exhibit ID:</label><!--Exhibit_ID| int| NO -->
      <input type="number" id="Exhibit_ID" name="Exhibit_ID" min="1" max="100">
      <label for="Description">Describe the exhibit:</label><!--Description| varchar(100)| YES -->
      <input type="text" id="Description" name="Description">
      <label for="Start_Date">Select the start date:</label><!--Start_Date| date| NO -->
      <input type="date" id="Start_Date" name="Start_Date" value="">
      <label for="End_Date">Select the state date:</label><!--End_Date| date| NO -->
      <?php $tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")); ?>
      <input type="date" id="End_Date" name="End_Date" value="" min="<?php echo date("Y-m-d", $tomorrow);?>">
      <label for="Location">Building of exhibit:</label><!--Location| varchar(100)| NO -->
      <input type="text" id="Location" name="Location">
      <label for="Name">Name of exhibit:</label><!--Name| varchar(100)| NO -->
      <input type="text" id="Name" name="Name">
      <label for="Number_of_artworks">Number of artworks:</label><!--Number_of_artworks| int| NO -->
      <input type="number" id="Number_of_artworks" name="Number_of_artworks" min="1">
      <label for="Number_of_visits">Any visits?</label><!--Number_of_visits| int| NO -->
      <input type="number" id="Number_of_visits" name="Number_of_visits" min="1">
      <button type="submit" name="updateExhibits">Update</button>
    </form>
    <hr>
    <center><h3>Add to gift shop</h3></center>
    <form action="insert.php" method="post" enctype="multipart/form-data">
      <!--Item_ID| int| NO| PRI| NULL| auto_increment -->
      <label for="Product_amt">Number of items in stock:</label><!--Product_amt| int| NO -->
      <input type="number" id="Product_amt" name="Product_amt" min="1">
      <label for="Product_name">Item name:</label><!--Product_name| varchar(80)| NO -->
      <input type="text" id="Product_name" name="Product_name">
      <label for="Item_Cost">Item cost:</label><!--Item_Cost| int| NO -->
      <input type="number" id="Item_Cost" name="Item_Cost" min="1">
      <label for="Picture">Upload a picture:</label><!--extranous -->
      <input type="file"name="Picture" id="Picture">
      <button type="submit" name="updateGiftShop">Update</button>
    </form>
    <hr>
    <center><h3>Add movie</h3></center>
    <form action="insert.php" method="post" enctype="multipart/form-data">
      <label for="MovName">Enter movie name:</label><!--MovName| varchar(100)| NO -->
      <input type="text" id="MovName" name="MovName">
      <label for="Description">Description of the film:</label><!--Description| varchar(200)| NO -->
      <input type="text" id="Description" name="Description">
      <label for="Language">Language of the film:</label><!--Language| varchar(75)| YES -->
      <input type="text" id="Language" name="Language">
      <label for="Director">Film director:</label><!--Director| varchar(40)| YES -->
      <input type="text" id="Director" name="Director">
      <label for="Year">Year of release:</label><!--Year| decimal(4,0)| NO -->
      <input type="number" id="Year" name="Year" min="1896" max="9999">
      <label for="Runtime">Runtime:</label><!--Runtime| decimal(3,0)| NO -->
      <input type="number" id="Runtime" name="Runtime" min="40" max="999">
      <label for="Poster">Upload the poster:</label><!--Poster| varchar(100)| NO -->
      <input type="file"name="Poster" id="Poster">
      <label for="price">Ticket price:</label>
      <input type="number" step="0.01" id="price" name="price">
      How many showtimes are there? <input type="number" onkeyup="BuildFormFields(parseInt(this.value, 10));" />
      <div id="FormFields" style="margin: 20px 0px;"></div>
      <button type="submit" name="updateMovies">Update?</button>
    </form>



    <hr>
    <center><h3>Add, edit, and delete subscriptions</h3></center>
    <form action="insert.php" method="post">
      <label for="memname">Add a member name:</label><!--Member Name| varchar(50)| NO -->
      <input type="text" id="memname" name="memname">
      <label for="expdate">Select the expiration date:</label><!--Exp Date| date| YES -->
      <input type="date" id="expdate" name="expdate" value="">
      <input type="radio" id="Active" name="memstatus" value="Active">
      <label for="Active">Active</label><br>
      <input type="radio" id="Expired" name="memstatus" value="Expired">
      <label for="Expired">Expired</label><br>
      <label for="mememail">Set the Email Address</label><!--Recipient Email| varchar(200)| NO -->
      <input type="text" id="mememail" name="mememail">
      <button type="submit" name="updateSubscriptions">Update</button>
    </form>
    <form action="insert.php" method="post">
      <label for="memid">Delete a subscription by giving its id:</label><!--member_id| int| NO -->
      <input type="number" id="memid" name="memid" min="1">
      <button type="submit" name="deleteSubscriptions">Delete</button>
    </form>
    <hr>



    <center><h2>
    <a href="reportincome.php">Make an income report</a><br/>
    <a href="AgeReport.php">Make a visitor report</a><br/>
    <a href="giftshopreport.php">Make a gift shop report</a><br/>
    <a href="alertDisplay.php">Display Alerts</a><br/>
    <a href="subscriptionsDisplay.php">Display Subscriptions</a><br/>
    <a href="emailDisplay.php">Display Emails</a>
    </h2></center>

    <p></p>
    <p></p>
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
    <script type="text/javascript">
        function BuildFormFields($amount) {
          var $container = document.getElementById('FormFields'), $item, $field, $i;
            $container.innerHTML = '';
            for ($i = 1; $i <= $amount; $i++) {
              $item = document.createElement('div');
              $item.style.margin = '3px';
              $field = document.createElement('span');
              $field.innerHTML = 'Showtime '+$i;//the error is here?
              $field.style.marginRight = '10px';
              $item.appendChild($field);
              $field = document.createElement('input');
              $field.name = 'Showtime '+$i;
              $field.type = 'datetime-local';
              $item.appendChild($field);
              $container.appendChild($item);
            }
        }
      </script>
  </body>
</html>