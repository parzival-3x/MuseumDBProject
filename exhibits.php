<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>MFAH</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <header class="myheader">
        <div class="row">
            <a href="index.php">
                <button type="button">
                    <img src="/img/MFAHlogo.png" height="100" alt="logo">
                </button>
            </a>
        </div>
    </header>
    <body>
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
            //$conn->close();
        ?>
        <h1>Exhibits & Artworks</h1>
        <?php
            $sql = "SELECT * FROM EXHIBITS";
            $result = $conn->query($sql);
            $e = $result->fetch_all(MYSQLI_ASSOC);
            if (count($e) > 0)                {
                foreach ($e as $e)
                {
                    echo '<h2>' .$e["Name"]. '</h2>';
                    echo '<p>' .$e["Description"]. '</p>';
                    echo 'Located at ' .$e["Location"]. 'From ' .$e["Start_Date"]. 'to ' .$e["End_Date"]. '<br>';
                    echo '<div class="grid-container">';

                    $eID = $e["Exhibit_ID"];
                    $sql = "SELECT * FROM ARTWORKS WHERE ARTWORKS.Exhibit_ID = $eID";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            echo '<div class="grid-item"><img src></div>"';
                            echo '<div class="grid-item">' .$row["Creator_Name"].'<br>' .$row["Name"].'<br>' .$row["Creation_Date"].'<br>' .$row["Description"].'<br>' .$row["Date_of_display"].'<br>' .$row["Artwork_ID"]. '</div>';
                        }
                    }
                    else
                    {
                        echo "0 results";
                    }
                    echo '</div>';
                }
            } 
            else 
            {
                 echo "0 results";
            }
        ?>   
    </body>
</html>
