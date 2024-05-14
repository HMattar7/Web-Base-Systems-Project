<?php
session_start(); // Start the session


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "Games4Less"; 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // Prepare and bind parameters
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);

    // Set parameters and execute
    $username = $_POST["Username"];
    $email = $_POST["Email"];

    $stmt->execute();

    // Store result
    $result = $stmt->get_result();

    // Check if username or email already exists
    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        if ($row["username"] === $username) {
            echo "<script>alert('Username already exists. Please choose a different username.');</script>";
            echo "<script>window.location.href = 'SignUp.php';</script>";
        } elseif ($row["email"] === $email) {
            echo "<script>alert('Email already exists. Please choose a different email.');</script>";
            echo "<script>window.location.href = 'SignUp.php';</script>";
        }
    } else {
        // Hash the password
        $hashed_password = password_hash($_POST["Password"], PASSWORD_DEFAULT);

        // Prepare and bind parameters
        $stmt = $conn->prepare("INSERT INTO user (username, email, password, first_name, last_name, phone_number, country) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $username, $email, $hashed_password, $first_name, $last_name, $phone_number, $country);

        // Set parameters and execute
        $username = $_POST["Username"];
        $email = $_POST["Email"];
        $first_name = $_POST["FName"];
        $last_name = $_POST["LName"];
        $phone_number = $_POST["PhoneNumber"];
        $country = $_POST["Country"];

        $stmt->execute();

        echo "<script>alert('Signup successful! You will now be redirected.');</script>";
        echo "<script>window.location.href = 'SignIn.php';</script>";

        // Store user data in session variables and set cookies
        $_SESSION["username"] = $username;
        setcookie("username", $username, time() + (86400 * 30), "/"); // Cookie expires after 30 days
        

        $stmt->close();
        $conn->close(); 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    
    <link href="Sign-Pages-styles.css" type="text/css" rel="stylesheet"/>
    <?php include 'head.php'; ?>

    <style>
        .signup-button {
            background-color: #4CAF50; /* Light green */
            color: white;
            border-radius: 10px;
            padding: 15px 40px; 
            border: none;
            cursor: pointer;
            font-size: 18px; 
        }

        .signup-button:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>

</head>
<body class="flex-container-column background-color" style="font-family: arial">
    <header class="default header">
        <section class="head flex-container-space-between" style="margin: 10%;">
        <a href="home.html" style="text-decoration: none;" class="site-logo">
            <img src="images/Logo.svg" alt="Logo">
            <h1 class="text">Games4Less</h1>
        </a>
        </section>
    </header>

    <hr class="horizontal-divider">

    <section class="Latest-offers" style="width: 400px;; height: 600px;">
       
        <h1 class="title">Welcome</h1>
        <h2 class="title2"></h2>

        <form name="signupForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <section class="Container">
                <div class="Buttons">
                    <h2 class="right-margin"></h2>
                    <input class="Button" type="text" name="Email" placeholder="Email*">
                </div>
            </section>

            <section class="Container">
                <div class="Buttons">
                    <h2 class="right-margin"></h2>
                    <input class="Button" type="text" name="Username" placeholder="Username*">
                </div>
            </section>

            <section class="Container">
                <div class="Buttons">
                    <h2 class="right-margin"></h2>
                    <input class="Button" type="password" name="Password" placeholder="Password*">
                </div>
            </section>
            
            <section class="Container">
                <div class="Buttons">
                    <h2 class="right-margin"></h2>
                    <input class="Button" type="text" name="FName" placeholder="First Name">
                </div>
            </section>
            
            <section class="Container">
                <div class="Buttons">
                    <h2 class="right-margin"></h2>
                    <input class="Button" type="text" name="LName" placeholder="Last Name">
                </div>
            </section>
            
            <section class="Container">
                <div class="Buttons">
                    <h2 class="right-margin"></h2>
                    <input class="Button" type="text" name="PhoneNumber" placeholder="Phone Number*">
                </div>
            </section>
            
            <section class="Container">
                <div class="Buttons">
                    <h2 class="right-margin"></h2>
                    <input class="Button" type="text" name="Country" placeholder="Country">
                </div>
            </section>

            <div class="flex-container-row centered">
                <button type="submit" class="signup-button">Sign Up</button>
            </div>
        </form>

        <label for=""><a href="SignIn.php" class="title2">Click to Login.</a></label>

    </section>

    <hr class="horizontal-divider">
    <?php include 'footer.php'; ?>
    
</body>
</html>
