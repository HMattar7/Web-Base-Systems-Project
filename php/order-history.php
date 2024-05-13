<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="icon" type="image/x-icon" href="images/Logo.svg">
    <link href="account-management-styles.css" type="text/css" rel="stylesheet"/>
    <link href="general.css" type="text/css" rel="stylesheet"/>

</head>
<body class="flex-container-column background-color">
    <header class="default header">
        <section class="head flex-container-space-between">
            <section class="header-icons">
                <a href="profile.html" class="box round-border header-icons svg-contaior">
                    <img class="svg-image" src="images/circle.svg" alt="circle">
                    <img class="svg-image-overlay" src="images/person.svg" alt="person">
                </a>

            </section>
            <section class="header-icons">
                <div class="box round-border header-icons">
                    <a href="settings" class="text lungs-currencies">AR/SR</a>
                </div>
                
            </section>
            <section class="header-icons">
                <a href="cart.html" class="box round-border header-icons svg-contaior">
                    <img class="svg-image" src="images/circle.svg" alt="circle">
                    <img class="svg-image-overlay" src="images/cart.svg" alt="cart">
                </a>
                
            </section>
        <div class="vertical-divider"></div>
        <a href="home.html" style="text-decoration: none;" class="site-logo">
            <img src="images/Logo.svg" alt="Logo">
            <h1 class="text">Games4Less</h1>

        </a>
        <div class="vertical-divider"></div>
    </header>

    <hr class="horizontal-divider">

    
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
                    <h2><a class="clicked-on" href="../Html/manage-profile-information.html">Edit Profile Information</a></h2>
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
 
$sql = "SELECT o.order_id, o.date_placed, o.total_price
        FROM order o
        WHERE o.user_id = " . $_SESSION['user_id'] . "
        ORDER BY o.order_id DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table>
          <tr>
            <th>Order ID</th>
            <th>Date Placed</th>
            <th>Total Price</th>
          </tr>";

  while($row = $result->fetch_assoc()) {
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

$conn->close();
?>
                
            </div>
        </section>
    </section>


    <hr class="horizontal-divider">


    <footer class="default flex-container-space-between text">
        <section class="footer">
            <a class="text text-center" href="placholder">About us</a>
            <a class="text text-center" href="placholder">User Terms & Condition</a>
            <a class="text text-center" href="placholder">Support</a>
        </section>
        <div class="vertical-divider"></div>
        <section class="outside-links">
            <a class="" href="placholder"><img class="outside-links-image" src="images/youtube.svg" alt="youtube Link" width="auto"></a>
            <a class="" href="placholder"><img class="outside-links-image" src="images/Twitter.svg" alt="Twitter Link" width="auto"></a>
            <a class="" href="placholder"><img class="outside-links-image" src="images/linkedin.svg" alt="linkedin Link" width="auto"></a>
            <a class="" href="placholder"><img class="outside-links-image" src="images/tiktok.svg" alt="tiktok Link" width="auto"></a>
            <a class="" href="placholder"><img class="outside-links-image" src="images/instagram.svg" alt="instagram Link" width="auto"></a>

        </section>
    </footer>
 
</body>
</html>
