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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Taylor Rogers">
        <meta name="description" content ="This queries the subscriptions table in sql and displays the table.">
        <link rel="icon" href="img/museumImageURL.png" type="image/x-icon">
        <link rel="stylesheet" href="triggerdisplay.css" type="text/css">
        <title>Email Page</title>
    </head>
    <body>
        <?php include 'header.php'; ?>  
        <main>
            <div class="triggertable">
                <?php 
                    $conn = mysqli_connect('34.30.147.150', 'Taylor', 'thenumber1','museum');

                    $result = mysqli_query($conn, "SELECT * FROM SUBSCRIPTIONS");
                    $rows = "";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $rows .= "<tr>";
                        $rows .= "<td>" . $row["member_id"] . "</td>";
                        $rows .= "<td>" . $row["expiration_date"] . "</td>";
                        $rows .= "<td>" . $row["member_name"] . "</td>";
                        $rows .= "<td>" . $row["subscription_status"] . "</td>";
                        $rows .= "<td>" . $row["email"] . "</td>";
                        $rows .= "</tr>";
                    }

                    $table = "<table><thead><tr><th>Member ID</th><th>Expiration Date</th><th>Name</th>
                    <th>Subscription Status</th><th>Email</th></tr></thead><tbody>" . $rows . "</tbody></table>";

                    print($table);

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