<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <?php include 'head.php'; ?>

    <link href="account-management-styles.css" type="text/css" rel="stylesheet"/>
    
</head>
<body class="flex-container-column background-color">
    <?php include 'header.php'; ?>
    

    <hr class="horizontal-divider">


    <section class="default flex-container-row text">
        <section class="default text">
            <div class="account-header">
                <h2 class="name-header">Account management</h2>
            </div>
            <div class="content-box bottom-margin">
                <div class="flex-container-row clicked-on">
                    <h2><a class="clicked-on" href="./profile-overview.html">Profile</a></h2>
                </div>
                <div class="flex-container-row clicked-on">
                    <h2><a class="clicked-on" href="./manage-profile-information.html">Edit Profile Information</a></h2>
                </div>
                <div class="flex-container-row clicked-on">
                    <h2><a class="clicked-on" href="./order-history.html">Order History</a></h2>
                </div>
            </div>
              
        </section>
        <section class="default general-box text flex-container-column content-box ">
            <h2 class="named-header">Edit Profile Information</h2>
            <div>
                <form class="flex-container-column" action="" method="post">
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
                    <div class="content-box">
                        <h2>Password:</h2>
                        <input class="text disabled-text-input" type="password" name="password" id="password" placeholder="**********" maxlength="30">
                    </div>
                    <br>
                    <div class="flex-container-space-between">
                        <button id="save" class="buttons">Save</button>
                        <button id="clear" class="buttons">Clear</button>
                    </div>
                    
                </form>
            </div>
        </section>
    </section>


    <hr class="horizontal-divider">
    
    <?php include 'footer.php'; ?>
    
</body>
</html>