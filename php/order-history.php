<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    
    <link href="account-management-styles.css" type="text/css" rel="stylesheet"/>
    <?php include 'head.php'; ?>

</head>
<body class="flex-container-column background-color">
    <?php include 'header.php'; ?>
    

    <hr class="horizontal-divider">
    <?php include 'navbar.php'; ?>
    
    <section class="default flex-container-row text">
        <section class="default text">
            <div class="account-header">
                <h2 class="name-header">Account management</h2>
            </div>
            <div class="content-box bottom-margin">
                <div class="flex-container-row clicked-on">
                    <h2><a class="clicked-on" href="./profile-overview.php">Profile</a></h2>
                </div>
                <div class="flex-container-row clicked-on">
                    <h2><a class="clicked-on" href="manage-profile-information.html">Edit Profile Information</a></h2>
                </div>
                <div class="flex-container-row clicked-on">
                    <h2><a class="clicked-on" href="./order-history.php">Order History</a></h2>
                </div>
            </div>
            
        </section>
        <section class="default general-box text flex-container-column content-box ">
            <h2 class="named-header">Order History</h2>
            <div class="flex-container-column horizontal-margin">
                <h2>Your Order History will appear here</h2>

                <?php

                $servername = "localhost:3306";
                $username = "root";
                $password = "";
                $dbname = "games4less";
                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                $user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 123; 
                $sql_name = "root";
                $sql_pass = "";
                $db_link = mysqli_connect("localhost:3306",$sql_name, $sql_pass);
                mysqli_select_db($db_link,"games4less");
                $sql = "SELECT * FROM `order` WHERE user_id = $user_id AND order_status = 'Done' ORDER BY date_placed DESC";
                $result_query = mysqli_query($db_link, $sql);
                try{
                    if (isset($result_query) &&$result_query->num_rows > 0) {
                        echo "<table>
                                <tr>
                                <th>Order ID</th>
                                <th>Date Placed</th>
                                <th>Total Price</th>
                                </tr>";
                    
                        while($row = mysqli_fetch_assoc($result_query)) {
                        $order_id = $row["order_id"];
                        $date_placed = $row["date_placed"];
                        $total_price = $row["total_price"];
                    
                        echo "<tr>
                                <td>$order_id</td>
                                <td>$date_placed</td>
                                <td>$total_price</td>
                                </tr>";
                        }
                    
                        echo "</table>";
                    } else {
                        echo "No orders found in your history.";
                    }
                } catch(Exception $e) {
                    echo "No orders found in your history.";
                }




                $conn->close();
                ?>
                
            </div>
        </section>
    </section>


    <hr class="horizontal-divider">

    <?php include 'footer.php'; ?>
 
</body>
</html>
