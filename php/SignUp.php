<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    
    <link href="Sign-Pages-styles.css" type="text/css" rel="stylesheet"/>
    <?php include 'head.php'; ?>

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
                <input class="Button" type="Password" name="Password" placeholder="Password*">
            </div>
        </section>
        
        <section class="Container">
            <div class="Buttons">
                <h2 class="right-margin"></h2>
                <input class="Button" type="FName" name="FName" placeholder="First Name">
            </div>
        </section>
        
        <section class="Container">
            <div class="Buttons">
                <h2 class="right-margin"></h2>
                <input class="Button" type="LName" name="LName" placeholder="Last Name">
            </div>
        </section>
        
        <section class="Container">
            <div class="Buttons">
                <h2 class="right-margin"></h2>
                <input class="Button" type="PhoneNumber" name="PhoneNumber" placeholder="Phone Number*">
            </div>
        </section>
        
        <section class="Container">
            <div class="Buttons">
                <h2 class="right-margin"></h2>
                <input class="Button" type="Country" name="Country" placeholder="Country">
            </div>
        </section>

        <div class="flex-container-row">
            <nav class="default flex-container-space-between navbar large-font">
                <a href="placholder">Sign Up</a>
            </nav>
        </div>

        <label for=""><a href="Sign in.html" class="title2">Click to Login.</a></label>

    </section>


    <hr class="horizontal-divider">
    <?php include 'footer.php'; ?>
    
</body>
</html>