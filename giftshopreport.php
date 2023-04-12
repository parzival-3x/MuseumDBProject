<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="reportstyle.css">
    </head>
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
        <table style="width:100%">
            <tr>
                <?php
                    echo '<th colspan="4", style="background-color:#c9dbf7">Giftshop Report '.date("F Y").'</th>';
                ?>
                
            </tr>
            <?php
                $sql = "SELECT * FROM GIFT_SHOP";
                $result = $conn->query($sql);
                $totalincome = 0;
                $Products =  array();
    
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

                        $Products[$row['Product_name']] = $amountsold;

                        echo 
                        '
                        <tr>
                            <th>Product</th>
                            <td>' .$row["Product_name"]. '</td>
                            <th>Price</th>
                            <td>$' .$row["Item_Cost"]. '</td>    
                        </tr>
                        <tr>
                            <th>Product ID</th>
                            <td>' .$row["Item_ID"]. '</td>
                            <th>Total Amount</th>
                            <td>' .$amounttotal. '</td>
                        </tr>
                        <tr>
                            <td rowspan="2", colspan="2"></td>
                            <th>Amount Sold</th>
                            <td>' .$amountsold. '</td>
                        </tr>   
                        <tr>
                            <th style="background-color:#f0f0f0">Income From Item</th>
                            <td style="background-color:#f0f0f0">$' .$row["Income_from_gift_shop"]. '</td>
                        </tr>
                        ';
                    }

                    echo
                    '
                    <tr>
                        <th colspan="3", style="background-color:#a4c3f3">Total Income</th>
                        <td style="background-color:#a4c3f3">$' .$totalincome. '</td>
                    </tr>
                    ';
                }

                echo '<tr><th colspan="3">Top 3 Best Selling Items</th>';
                arsort($Products);
                $name = array_keys($Products);
                $i = 0;
                foreach($Products as $name => $amount)
                {
                    if ($i == 0)
                    {
                        echo '<td>1. ' .$name. ' (' .$amount. ' Items Sold)</td></tr>';
                    }
                    else if ($i == 1)
                    {
                        echo '<tr><td colspan="3", rowspan="2"></td>';
                        echo '<td>2. ' .$name. ' (' .$amount. ' Items Sold)</td></tr>';
                    }
                    else
                    {
                        echo '<tr><td>3. ' .$name. ' (' .$amount. ' Items Sold)</td></tr>';
                        break;
                    }
                    ++$i;
                }

                echo '<tr><th colspan="3">Top 3 Worst Selling Items</th>';
                krsort($Products);
                $name = array_keys($Products);
                $i = 0;
                foreach($Products as $name => $amount)
                {
                    if ($i == 0)
                    {
                        echo '<td>1. ' .$name. ' (' .$amount. ' Items Sold)</td></tr>';
                    }
                    else if ($i == 1)
                    {
                        echo '<tr><td colspan="3", rowspan="2"></td>';
                        echo '<td>2. ' .$name. ' (' .$amount. ' Items Sold)</td></tr>';
                    }
                    else
                    {
                        echo '<tr><td>3. ' .$name. ' (' .$amount. ' Items Sold)</td></tr>';
                        break;
                    }
                    ++$i;
                }
            ?>
        </table>    
    </body>
</html>