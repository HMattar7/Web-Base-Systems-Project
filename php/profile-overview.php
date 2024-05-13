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

$sql = "SELECT username, email, first_name, last_name, phone_number, country, shipping_address 
FROM user 
WHERE user_id = $user_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $username = $row["username"];
  $email = $row["email"];
  $fname = $row["first_name"];
  $lname = $row["last_name"];
  $phone_number = $row["phone_number"];
  $country = $row["country"];
  $shipping_address = $row["shipping_address"];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Overview</title>
    <link rel="icon" type="image/x-icon" href="./images/Logo.svg">
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
                    <h2><a class="clicked-on" href="../Html/manage-profile-information.html">Edit Profile Information</a></h2>
                </div>
                <div class="flex-container-row clicked-on">
                    <h2><a class="clicked-on" href="./order-history.php">Order History</a></h2>
                </div>
            </div>
              
        </section>
        <section class="default general-box text flex-container-column content-box ">
            <h2 class="named-header">Profile Overview</h2>
            <form class="flex-container-column" action="" method="post">
                <div class="flex-container-row">
                    <div class="content-box">
                        <h2>Username:</h2>
                        <input type="text" name="username" id="username"  disabled class="text disabled-text-input" placeholder="placeholder" value="<?php echo $username; ?>">
                    </div>
                    <div class="content-box">
                        <h2>Name:</h2>
                        <input type="text" class="text disabled-text-input" placeholder="placeholder"name="fname" id="fname"  disabled value="<?php echo $fname; ?>">
                        <input type="text" class="text disabled-text-input" placeholder="placeholder"name="lname" id="lname"  disabled value="<?php echo $lname; ?>">
                    </div>
                    <div class="content-box">
                        <h2>Email Address:</h2>
                        <input type="text" class="text disabled-text-input" placeholder="placeholder"name="email" id="email"  disabled value="<?php echo $email; ?>">
                    </div>
                </div>
                <div class="flex-container-row">
                    <div class="content-box">
                        <h2>Phone number:</h2>
                        <input type="text" class="text disabled-text-input" placeholder="placeholder"name="phone-num" id="phone-num"  disabled value="<?php echo $phone_number; ?>">
                    </div>
                    <div class="content-box">
                        <h2>Country:</h2>
                        <input type="text" class="text disabled-text-input" placeholder="placeholder"name="country" id="country"  disabled value="<?php echo $country; ?>">
                    </div>
                </div>
                <div class="flex-container-row">
                    <div class="content-box">
                        <h2>Password:</h2>
                        <input type="text" class="text disabled-text-input" placeholder="********" name="password" id="password"  disabled >
                    </div>
                    <div class="content-box">
                        <h2>Shipping Address:</h2>
                        <input type="text" class="text disabled-text-input" placeholder="placeholder"name="shipping" id="shipping"  disabled value="<?php echo $shipping_address; ?>">
                    </div>
                </div>
                <br>
            </form>
        </section>
    </section>


    <hr class="horizontal-divider">
    
    <?php include 'footer.php'; ?>
    
</body>
</html>