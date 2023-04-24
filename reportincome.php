<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Taylor Rogers">
        <meta name="description" content ="This is a report for income. It sums the income columns and echoes the result.">
        <link rel="icon" href="museumImageURL.png" type="image/x-icon">
        <link rel="stylesheet" href="donations.css" type="text/css">
        <title>Report 1 (Income)</title>
    </head>
<body>

<div class = "ReportGiftShop">
	<?php
    if (session_status() == PHP_SESSION_NONE) {
        ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../sessions'));
        session_start();  
      }
    if (isset($_SESSION['email'])) {
        $link_text = 'My Account';
        $link_href = 'manager.php';
      } else {
        $link_text = 'Login';
        $link_href = 'loginp.php';
      }
	include 'header.php';

    ?>


    <div id="Incomereport">
        <form name="Incrpt" method="post" action="generatedincomereport.php">
        
            <fieldset>
            <legend>Income Report</legend>
                <label for="startdate">Start Date:</label>
                <input type="date" id="startdate" name="startdate" required> <br><br>
                <label for="enddate">End Date:</label>
                <input type="date" id="enddate" name="enddate" required>
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>
    
</div>
</body>
</html>