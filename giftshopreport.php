<!DOCTYPE html>
<html>
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
        <table>
            <tr>
                <th rowspan="4">Giftshop Report</th>
            </tr>
            <?php
                $sql = "SELECT * FROM GIFT_SHOP";
                $result = $conn->query($sql);
                $totalincome = 0;
    
                if ($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        $amount = $row['Product_amt'];
                        $itemcost = $row['Item_Cost'];
                        $income = $row['Income_from_gift_shop'];
                        $amountsold = $income / $itemcost;
                        $amounttotal = $amount + ($amountsold);
                        $totalincome = $totalincome + $income; 
                        
                        echo 
                        '
                        <tr>
                            <th>Product</th>
                            <td>' .$row["Product_name"]. '<td>
                            <th>Price</th>
                            <td>$' .$row["Item_Cost"]. '</td>    
                        </tr>
                        <tr>
                            <th>Product ID</th>
                            <td>' .$row["Item_ID"]. '<td>
                            <th>Total Amount</th>
                            <td>' .$amounttotal. '</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <th>Amount Sold</th>
                            <td>' .$amountsold. '</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <th>Income From Item</th>
                            <td>$' .$row["Income_from_gift_shop"]. '</td>
                        </tr>
                        ';

                        echo
                        '
                        <tr>
                            <td>Total Income: ' .$totalincome. '</td>
                        </tr>
                        ';
                    }
                }
            ?>
        </table>    
    </body>
</html>