<?php
$con = mysqli_connect('34.30.147.150', 'root', 'Gocoogs15!','museum');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['updateArtwork'])){
    $artworkID = $_POST['Artwork_ID'];
    $exhibit = $_POST['Exhibit_ID'];
    if(str_starts_with($exhibit,"'")&& str_ends_with($exhibit,"'")){
      $exhibit = substr($exhibit,1,-1);
    }
    $description = $_POST['Description'];
    $creationDate = $_POST['Creation_Date'];
    //Date of display linked to exhibit date
    $creatorName = $_POST['Creator_Name'];
    $artworkName = $_POST['Name'];
    $target_dir = "artworks/";
    $target_file = $target_dir . basename($_FILES["Picture"]["name"]);
    $uploadOk = 1;
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded. Artwork not added";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["Picture"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["Picture"]["name"])). " has been uploaded.";
      $startday = "SELECT Start_Date, Exhibit_ID from EXHIBITS where Name ='$exhibit'";
      $list = mysqli_query($con, $startday);
      $tempday = $list->fetch_assoc();
      $firstday = $tempday['Start_Date'];
      $idnum = $tempday['Exhibit_ID'];
      $target_file = "/".$target_file;
      $artworkinsert = "INSERT into ARTWORKS VALUES('$artworkID', '$idnum', '$description', '$creationDate', '$firstday', '$creatorName', '$artworkName', '$target_file')";
      $sendit = mysqli_query($con,$artworkinsert);//NEED EXHIBIT ID
      if(!$sendit){
        echo "Artwork query error: ". mysqli_error($con);
      }
      else{
        echo "sucessfully sent!";
      }
    } else {
      echo "Sorry, there was an error uploading your file. Artwork not added";
    }
  }
    //make sure file_uploads = On in the php.ini file
    //https://www.w3schools.com/php/php_file_upload.asp
}
if(isset($_POST['updateCalendar'])){
    $eventname = $_POST['Event_Name'];
    $time = $_POST['Time_Stamp'];
    $date = $_POST['Date_of_Event'];
    $place = $_POST['Location_of_Event'];
    $calendarinsert = "INSERT INTO CALENDAR VALUES('$eventname', '$time', '$date', '$place')";
    $sendit = mysqli_query($con,$calendarinsert);
    if(!$sendit){
      echo "Calendar query error: ". mysqli_error($con);
    }
    else{
      echo "sucessfully sent!";
    }
}
if(isset($_POST['deleteCalendar'])){
  $nametodelete = $_POST['Event_Name'];
  $deletecom = "DELETE FROM CALENDAR WHERE Event_Name = '$nametodelete'";
  $gone = mysqli_query($con,$deletecom);
  if(!$gone){
    echo "Calendar deletion error: ". mysqli_error($con);
  }
  else{
    echo "successfully gone";
  }
}
if(isset($_POST['updateExhibits'])){
    $id = $_POST['Exhibit_ID'];
    $about = $_POST['Description'];
    $startday = $_POST['Start_Date'];
    $endday = $_POST['End_Date'];
    $building = $_POST['Location'];
    $exhibitname = $_POST['Name'];
    $numArtworks = $_POST['Number_of_artworks'];
    $numvisits = $_POST['Number_of_visits'];
    $exhibitinsert = "INSERT INTO EXHIBITS VALUES('$id', '$about', '$startday', '$endday', '$building', '$exhibitname', '$numArtworks', '$numvisits')";
    $sentit = mysqli_query($con, $exhibitinsert);
    if(!$sentit){
      echo "Exhibit query error: ". mysqli_error($con);
    }
    else{
      echo "sucessfully sent!";
    }
}
if(isset($_POST['updateGiftShop'])){
    $amount = $_POST['Product_amt'];
    $giftname = $_POST['Product_name'];
    $cost = $_POST['Item_Cost'];
    //copy paste
    $target_dir = "gifticons/";
    $target_file = $target_dir . basename($_FILES["Picture"]["name"]);
    $uploadOk = 1;
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        //sleep(3);
        //header("Location: manager.php");
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded. Item not added";
        //sleep(3);
        //header("Location: manager.php");
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["Picture"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["Picture"]["name"])). " has been uploaded.";
      $giftshopinsert = "INSERT INTO GIFT_SHOP(Product_amt, Product_name, Item_Cost) VALUES('$amount', '$giftname', '$cost')";
      $sendit = mysqli_query($con, $giftshopinsert);
      if(!$sendit){
        echo "Exhibit query error: ". mysqli_error($con);
      }
      else{
        echo "sucessfully sent!";
      }
      //sleep(3);
      //header("Location: manager.php");
    }
    }
    //end copy paste
}
if(isset($_POST['updateMovies'])){
    $moviename = $_POST['MovName'];
    $about = $_POST['Description'];
    $language = $_POST['Language'];
    $director = $_POST['Director'];
    $year = $_POST['Year'];
    $length = $_POST['Runtime'];
    //poster goes here
    $price = $_POST['price'];
    //copy paste
    $target_dir = "posters/";
    $target_file = $target_dir . basename($_FILES["Poster"]["name"]);
    $uploadOk = 1;
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded. Movie not added";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["Picture"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["Picture"]["name"])). " has been uploaded.";
      $postername = basename($_FILES["Poster"]["name"]);
      if(str_contains($postername, ".")){
        $postername = substr($postername, 0, -4);
      }
      $movieinsert = "INSERT INTO MOVIES VALUES('$moviename', '$about', '$language', '$director', 
      '$year', '$length', '$postername', '$price')";
      $sendit = mysqli_query($con, $movieinsert);
      if(!$sendit){
        echo "Exhibit query error: ". mysqli_error($con);
      }
      else{
        echo "sucessfully sent!";
      }
    }
    //insert showtimes here
    }
  }

  if(isset($_POST['updateSubscriptions'])){
    $memname = $_POST['memname'];
    $expdate = $_POST['expdate'];
    $memstatus = $_POST['memstatus'];
    $mememail = $_POST['mememail'];
    $calendarinsert = "INSERT INTO SUBSCRIPTIONS (expiration_date, member_name, subscription_status, email)
    VALUES('$expdate', '$memname', '$memstatus', '$mememail')";
    $sendit = mysqli_query($con,$calendarinsert);
    if(!$sendit){
      echo "Calendar query error: ". mysqli_error($con);
    }
    else{
      echo "sucessfully sent!";
    }
}
if(isset($_POST['deleteSubscriptions'])){
  $idtodelete = $_POST['memid'];
  $deletecom = "DELETE FROM SUBSCRIPTIONS WHERE member_id = '$idtodelete'";
  $gone = mysqli_query($con,$deletecom);
  if(!$gone){
    echo "subscription deletion error: ". mysqli_error($con);
  }
  else{
    echo "successfully gone";
  }
}
?>