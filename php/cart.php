<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    
    <link href="cart-styles.css" type="text/css" rel="stylesheet"/>
    <link href="Product-Pages-styles.css" type="text/css" rel="stylesheet"/>
    <?php include 'head.php'; ?>

    <!-- Your CSS styles -->
    <style>
          .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px;
        }

        .modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%; 
}


        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body class="flex-container-column background-color">
    <?php include 'header.php'; ?>
    
    <hr class="horizontal-divider">
    <?php include 'navbar.php'; ?>
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root"; // Change this to your database username
    $password = "";
    $dbname = "games4less"; // Change this to your database name
    $db_link = mysqli_connect("localhost:3306",$username, $password);
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



    $user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 123;
    ?>
    <div class="small-container cart-page">
        <table class="item-table">
            <caption>Your Cart</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT order_id  FROM `order` WHERE `user_id` = $user_id AND `order_status` = 'Waiting'";
                    $result = $conn->query($sql);
                    $order_id = intval(mysqli_fetch_array($result)[0]);

                    $sql = "SELECT product_id FROM order_item where order_id = $order_id";
                    $result = $conn->query($sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $product_id = $row['product_id'];

                        $sql_product = "SELECT * FROM `product` WHERE product_id = $product_id";
                        $result_product = $conn->query($sql_product);

                        // Check if there are any products in the database
                        if ($result_product->num_rows > 0) {
                            // Output data of each row
                            $index = 0;
                            while ($row_product = $result_product->fetch_assoc()) {

                                echo "<tr>";
                                echo "<td>" . $index . "</td>";
                                echo "<td>";
                                echo "<div class='cart-info'>";
                                echo "<div>";
                                echo "<p>" . $row_product["title"] . "</p>";
                                echo "<small>Price: $" . $row_product["price"] . "</small><br>";
                                echo "<form action='add_to_cart.php' method='post'>";
                                echo "<input type='hidden' name='delete_item' value='delete_item'>";
                                echo "<input type='hidden' name='product_id' value='" . $row_product["product_id"] . "'>";
                                echo "<button type='submit' name='delete_item' class='delete-button'><img src='images/delete.svg' alt='Delete'></button>";
                                echo "</form>";
                                echo "</div>";
                                echo "</div>";
                                echo "</td>";
                                echo "<td>";
                                echo "<div class='quantity-container'>";
                                echo "<input type='number' value='1' class='quantity-input'>";
                                echo "<div class='quantity-controls'>";
                                echo "<button class='quantity-up'><img src='images/up.svg' alt='Up'></button>";
                                echo "<button class='quantity-down'><img src='images/down.svg' alt='Down'></button>";
                                echo "</div>";
                                echo "</div>";
                                echo "</td>";
                                echo "<td class='item-price'>$" . $row_product["price"] . "</td>";
                                echo "<td class='item-subtotal'>$" . $row_product["price"] . "</td>";
                                echo "</tr>";
                                $index++;
                            }
                        } else {
                            echo "<tr><td colspan='5'>No products found</td></tr>";
                        }
                    }
                    mysqli_close($db_link);
                ?>
            </tbody>
        </table>

        <!-- Your total price section -->
        <div class="total-price">
        <table>
            <tr>
                <td>Subtotal</td>
                <td class="subtotal">$0.00</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td class="tax">$0.00</td>
            </tr>
            <tr>
                <td>Total</td>
                <td class="total">$0.00</td>
            </tr>
            <tr>
                <td colspan="2" class="checkout-button">
                    <button id="checkoutButton" class="checkout-button" type="button">Checkout</button>
                </td>
            </tr>
        </table>
        </div>
    </div>

    <!-- Your confirmation modal -->
    <div id="confirmationModal" class="modal">
    <div class="modal-content">
        <p>Are you sure you want to delete this item?</p>
        <button id="confirmYes">Yes</button>
        <button id="confirmNo">No</button>
    </div>
    </div>

    <hr class="horizontal-divider">
    <?php include 'footer.php'; ?>

    <!-- Your JavaScript code -->
    <script>
       



       document.addEventListener('DOMContentLoaded', function() {
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const itemPrices = document.querySelectorAll('.item-price');
        const itemSubtotals = document.querySelectorAll('.item-subtotal');
        const subtotalElement = document.querySelector('.subtotal');
        const taxElement = document.querySelector('.tax');
        const totalElement = document.querySelector('.total');
        const modal = document.getElementById('confirmationModal');
        const confirmYesBtn = document.getElementById('confirmYes');
        const confirmNoBtn = document.getElementById('confirmNo');

        let currentItemToDelete; 

        function updateTotalPrice() {
            let subtotal = 0;
            itemSubtotals.forEach((subtotalElement, index) => {
                subtotal += parseFloat(subtotalElement.textContent.replace('$', ''));
               
                const rowNumber = index + 1;
                subtotalElement.closest('tr').querySelector('td:first-child').textContent = rowNumber;
            });

            const taxRate = 0.15;
            const tax = subtotal * taxRate;

            const total = subtotal + tax;

            subtotalElement.textContent = '$' + subtotal.toFixed(2);
            taxElement.textContent = '$' + tax.toFixed(2);
            totalElement.textContent = '$' + total.toFixed(2);
        }

        function updateItemSubtotal(input, priceElement, subtotalElement) {
            const price = parseFloat(priceElement.textContent.replace('$', ''));
            const subtotal = price * input.value;
            subtotalElement.textContent = '$' + subtotal.toFixed(2);
            updateTotalPrice();
        }

        function attachQuantityEvents(container) {
            const quantityInput = container.querySelector('.quantity-input');
            const quantityUp = container.querySelector('.quantity-up');
            const quantityDown = container.querySelector('.quantity-down');
            const priceElement = container.closest('tr').querySelector('.item-price');
            const subtotalElement = container.closest('tr').querySelector('.item-subtotal');

            quantityUp.addEventListener('click', function() {
                quantityInput.value = parseInt(quantityInput.value) + 1;
                updateItemSubtotal(quantityInput, priceElement, subtotalElement);
            });

            quantityDown.addEventListener('click', function() {
                if (parseInt(quantityInput.value) > 1) {
                    quantityInput.value = parseInt(quantityInput.value) - 1;
                    updateItemSubtotal(quantityInput, priceElement, subtotalElement);
                }
            });

            quantityInput.addEventListener('input', function() {
                if (parseInt(this.value) <= 0 || isNaN(parseInt(this.value))) {
                    this.value = 1;
                }
                updateItemSubtotal(quantityInput, priceElement, subtotalElement);
            });
        }

        function attachDeleteEvents(button) {
            button.addEventListener('click', function() {
                modal.style.display = 'block'; 
                currentItemToDelete = this.closest('tr');
            });
        }

        deleteButtons.forEach(attachDeleteEvents);

        confirmYesBtn.addEventListener('click', function() {
    if (currentItemToDelete) {
        const priceOfDeletedItem = parseFloat(currentItemToDelete.querySelector('.item-subtotal').textContent.replace('$', ''));
        currentItemToDelete.remove(); 
       
        subtotalElement.textContent = '$' + (parseFloat(subtotalElement.textContent.replace('$', '')) - priceOfDeletedItem).toFixed(2);
        updateTotalPrice(); 
    }
    modal.style.display = 'none'; 
    checkCartEmpty(); 
});


        confirmNoBtn.addEventListener('click', function() {
            modal.style.display = 'none'; 
        });

    
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        const quantityContainers = document.querySelectorAll('.quantity-container');
        quantityContainers.forEach(attachQuantityEvents);

        updateTotalPrice();
    });  


    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Other JavaScript code here...

        // Checkout button event listener
        const checkoutButton = document.getElementById('checkoutButton');
        checkoutButton.addEventListener('click', function() {
            // Redirect to checkout.php
            window.location.href = 'checkout.php';
        });
    });
</script>


</body>
</html>



<?php
// Close database connection
$conn->close();
?>