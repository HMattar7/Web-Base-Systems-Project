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
            <h2 class="named-header">Order History</h2>
            <div class="flex-container-column horizontal-margin">
                <h2>Your Order History will appear here</h2>
                <style>#order-history-table th {padding-right: 20px;}</style>
                    <table class="content-box general-header" id="order-history-table">
                      <tr>
                        <th>Order Number</th>
                        <th>Date</th>
                        <th>Items</th>
                        <th>Total</th>
                      </tr>
                    </table>
            </div>
        </section>
    </section>


    <hr class="horizontal-divider">


    <?php include 'footer.php'; ?>
 
</body>
</html>