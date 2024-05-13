<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $servername = "localhost:3306";
  $username = "root";
  $password = "";
  $dbname = "games4less";
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $firstName = mysqli_real_escape_string($conn, $_POST['fname']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone-num']);
  $country = mysqli_real_escape_string($conn, $_POST['country']);
  $password = mysqli_real_escape_string($conn, $_PASSWORD['password']);
  $shippingAddress = mysqli_real_escape_string($conn, $_POST['shipping']);

  $sql = "INSERT INTO user (username, first_name, last_name, email, phone_number, country, password, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($conn, $sql);

  mysqli_stmt_bind_param($stmt, "ssssssss", $username, $firstName, $lastName, $email, $phone, $country, $password, $shippingAddress);

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="icon" type="image/x-icon" href="./images/Logo.svg">
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
            <h2 class="named-header">Edit Profile Information</h2>
            <div>
                <form class="flex-container-column" action="../php/manage-profile-information.php" method="post">
                    <div class="flex-container-row">
                        <div class="content-box">
                            <h2>Username:</h2>
                            <input class="text disabled-text-input" class="text disabled-text-input" type="text" name="uname" id="username" placeholder="Your username will be public" maxlength="25">
                        </div>
                        <div class="content-box">
                            <h2>Name:</h2>
                            <input class="text disabled-text-input" type="text" name="fname" id="fname" placeholder="First name" maxlength="15">
                            <input class="text disabled-text-input" type="text" name="lname" id="lname" placeholder="Last name" maxlength="15">
                        </div>
                        <div class="content-box">
                            <h2>Email Address:</h2>
                            <input class="text disabled-text-input" type="email" name="email" id="email" placeholder="123@domain.com">
                        </div>
                    </div>
                    <div class="flex-container-row">
                        <div class="content-box">
                            <h2>Phone number:</h2>
                            <input class="text disabled-text-input" type="number" name="phone-num" id="phone-num" placeholder="123-456-7890" maxlength="10">
                        </div>
                        <div class="content-box">
                            <h2>Country:</h2>
                            <input class="text disabled-text-input" type="country" name="country" id="country" placeholder="eg. USA">
                        </div>
                    </div>
                    <div class="flex-container-row">
                        <div class="content-box">
                            <h2>Password:</h2>
                            <input class="text disabled-text-input" type="password" name="password" id="password" placeholder="**********" maxlength="30">
                        </div>
                        <div class="content-box">
                            <h2>Shipping Address:</h2>
                            <input class="text disabled-text-input" type="text" name="shipping" id="shipping" placeholder="" maxlength="50">
                        </div>
                    </div>
                    <br>
                    <div class="flex-container-space-between">
                      <h2>Your information has been updated!</h2>                
                  </div>
                </form>
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