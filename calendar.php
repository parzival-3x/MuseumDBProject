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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Taylor Rogers">
        <meta name="description" content ="This shows the calendar">
        <link rel="icon" href="img/museumImageURL.png" type="image/x-icon">
        <link rel="stylesheet" href="calendar.css" type="text/css">
        <title>Calendar Page</title>
    </head>
    <body>
        <?php include 'header.php'; ?>  
        <main>
        <div class="calendar">
            <?php
                // connect to the database and retrieve events
                
                $conn = mysqli_connect('34.30.147.150', 'Taylor', 'thenumber1','museum');
                $month = date("m");
                $year = date("Y");

                $sql = "SELECT Date_of_Event, Event_Name, Location_of_Event, Time_Stamp FROM CALENDAR WHERE MONTH(Date_of_Event) = $month AND YEAR(Date_of_Event) = $year";
                $result = mysqli_query($conn, $sql);
                

                $events = array();
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $date = date("j", strtotime($row["Date_of_Event"]));
                        $events[$date] = array(
                            'event' => $row["Event_Name"],
                            'location' => $row["Location_of_Event"],
                            'timestamp' => $row["Time_Stamp"]
                        );
                    }
                }
                //add the month on top ffs
                // Generate calendar HTML
                $calendar = '<table>';
                $calendar .= '<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>';

                $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                $day_of_week = date("w", mktime(0, 0, 0, $month, 1, $year));

                for ($i = 1; $i <= $days_in_month + $day_of_week; $i++) {
                    if ($i % 7 == 1) $calendar .= '<tr>';

                    if ($i > $day_of_week) {
                        $day = $i - $day_of_week;
                        $event = isset($events[$day]['event']) ? $events[$day]['event'] : '';
                        $location = isset($events[$day]['location']) ? $events[$day]['location'] : '';
                        $timestamp = isset($events[$day]['timestamp']) ? $events[$day]['timestamp'] : '';
                
                        $calendar .= '<td class="calendar-day">'.$day.'<br>'.$event.'<br>'.$timestamp.'<br>'.$location.'</td>';
                    } else {
                        $calendar .= '<td class="calendar-day"></td>';
                    }

                    if ($i % 7 == 0) $calendar .= '</tr>';
                }

                $calendar .= '</table>';

                echo $calendar;

                // Close database connection
                mysqli_close($conn);
                ?>
        </div>
        </main>
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
