<?php
session_start(); // Start the session

// Check if the form is submitted
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
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Set parameter and execute
    $username = $_POST["Username"];
    $stmt->execute();

    // Store result
    $result = $stmt->get_result();

    // Check if username exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($_POST["Password"], $row["password"])) {
            $_SESSION["user_id"] = $row["user_id"];
            echo "<script>alert('Login successful!');</script>";
            echo "<script>window.location.href = 'home.php';</script>";
            exit;
        } else {
            
            echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
    } else {
        // Username does not exist
        echo "<script>alert('Username not found. Please try again.');</script>";
        echo "<script>window.location.href = 'SignIn.php';</script>";
    }
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    
    <link href="Sign-Pages-styles.css" type="text/css" rel="stylesheet"/>
    <?php include 'head.php'; ?>

    <style>
        .login-button {
            background-color: #4CAF50; /* Light green */
            color: white;
            border-radius: 10px;
            padding: 15px 40px; 
            border: none;
            cursor: pointer;
            font-size: 18px; 
        }

        .login-button:hover {
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
        
        <a href="home.php" style="text-decoration: none;" class="site-logo">
            <img src="images/Logo.svg" alt="Logo">
            <h1 class="text">Games4Less</h1>
        </a>
        
        </section>
    </header>
    <hr class="horizontal-divider">


    <section class="Latest-offers" style="width: 400px;; height: 400px;">
       
        <h1 class="title">Welcome Back</h1>
        <h2 class="title2"></h2>

        <form name="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <section class="Container">
                <div class="Buttons">
                    <h2 class="right-margin"></h2>
                    <input class="Button" type="text" name="Username" placeholder="Username">
                </div>
            </section>

            <section class="Container">
                <div class="Buttons">
                    <h2 class="right-margin"></h2>
                    <input class="Button" type="password" name="Password" placeholder="Password">
                </div>
            </section>
            
            
            <h4 style="align-items: center; text-align: center" ><input type="checkbox" id="rememberme" name="rememberme" value="Remember Me">Remember Me</h4>        

            <div class="flex-container-row centered">
                <button type="submit" class="login-button">Login</button>
            </div>
        </form>

        <label for=""><a href="SignUp.php" class="title2">Click to Sign up.</a></label>
        

    </section>

    <hr class="horizontal-divider">

    <?php include 'footer.php'; ?>
    
</body>
</html>