<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Taylor Rogers">
        <meta name="description" content ="This queries the giftshop in sql and displays the table, dynamically showing images for each item.">
        <link rel="icon" href="museumImageURL.png" type="image/x-icon">
        <link rel="stylesheet" href="giftshop.css" type="text/css">
        <title>Gift Shop Page</title>
    </head>
    <body>
        <?php include 'header.php'; ?>  
        <main>
            <div class="giftshoptable">
                <?php 
                    $conn = mysqli_connect('34.30.147.150', 'Taylor', 'thenumber1','museum');

                    $result = mysqli_query($conn, "SELECT * FROM GIFT_SHOP");
                    $rows = "";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $rows .= "<tr>";
                        $rows .= "<td>" . $row["Item_ID"] . "</td>";
                        $rows .= "<td><img src ='gifticons/" . $row["Product_name"] . ".png'></td>";
                        $rows .= "<td>" . $row["Product_name"] . "</td>";
                        $rows .= "<td>" . $row["Product_amt"] . "</td>";
                        $rows .= "<td>" . "$" . $row["Item_Cost"] . ".00" . "</td>";
                        $rows .= "<td><form method='post'><input type='hidden' name='item_id' value='" . $row["Item_ID"] . "'><input type='submit' name='purchase' value='Purchase'></form></td>";
                        $rows .= "</tr>";
                    }

                    $table = "<table><thead><tr><th>Item ID</th><th>Image</th><th>Product Name</th><th>Product Amount</th><th>Item Cost</th><th>Purchase</th></tr></thead><tbody>" . $rows . "</tbody></table>";

                    print($table);

                    if(isset($_POST['purchase'])) {
                        $item_id = $_POST['item_id'];
                        $query = "UPDATE GIFT_SHOP SET Product_amt = Product_amt - 1 WHERE Item_ID = $item_id";
                        mysqli_query($conn, $query);
                        $query = "SELECT * FROM GIFT_SHOP WHERE Item_ID = $item_id";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        $item_cost = $row['Item_Cost'];
                        $income = $row['Income_from_gift_shop'];
                        $new_income = $item_cost + $income;
                        $query = "UPDATE GIFT_SHOP SET Income_from_gift_shop = $new_income WHERE Item_ID = $item_id";
                        mysqli_query($conn, $query);
                    }

                    mysqli_close($conn);
                    ?>
            </div>
        </main>
    </body>

    

</html>