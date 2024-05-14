<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    
    <link href="checkout-styles.css" type="text/css" rel="stylesheet"/>
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



    $sql = "SELECT order_id FROM `order` where user_id = $user_id AND order_status = 'Waiting'";
    $result = $conn->query($sql);
    $order_id = mysqli_fetch_array($result)[0];


    $sql = "SELECT total_price FROM `order` where order_id =$order_id";
    $result = $conn->query($sql);









    if (isset($_POST["checkout_button"])){

        $sql = "UPDATE `order` SET `order_status` = 'Done' where order_id =$order_id";
        $result = $conn->query($sql);
        echo "<script>window.location.href = 'home.php';</script>";
    }







    ?>
    <div class="small-container cart-page">






    <style>
    .payment-options {
        margin-bottom: 20px;
    }

    .payment-method {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .payment-method label {
        margin-left: 10px;
        font-size: 16px; /* Adjust as needed */
        font-weight: bold;
    }
</style>





    <div class="payment-container">
    <div class="payment-options">
        <h2>Select Payment Method:</h2>
        <div class="payment-method">
            <input type="radio" name="payment_method" id="mastercard" value="mastercard">
            <label for="mastercard"><img src="images/mastercard.svg" alt="Mastercard" style="width: 40px; height: 40px;"></label>
            <label for="mastercard" class="text">Mastercard</label>
        </div>
        <div class="payment-method">
            <input type="radio" name="payment_method" id="paypal" value="paypal">
            <label for="paypal"><img src="images/paypal.svg" alt="PayPal" style="width: 40px; height: 40px;"></label>
            <label for="paypal" class="text">PayPal</label>
        </div>
        <div class="payment-method">
            <input type="radio" name="payment_method" id="mada" value="mada">
            <label for="mada"><img src="images/mada.svg" alt="Mada" style="width: 40px; height: 40px;"></label>
            <label for="mada" class="text">Mada</label>
        </div>
    </div>
    <div id="mastercardFields" class="payment-fields">
    <!-- Fields for Mastercard -->
    <label for="card_number" class="text">Card Number:</label>
    <input type="text" name="card_number" id="card_number_mastercard" placeholder="1234 5678 9012 3456">
    <br>
    <label for="expiry_date" class="text">Expiry Date:</label>
    <input type="text" name="expiry_date" id="expiry_date_mastercard" placeholder="MM/YY">
    <br>
    <label for="cvv" class="text">CVV:</label>
    <input type="text" name="cvv" id="cvv_mastercard" placeholder="123">
</div>

    <div id="paypalFields" class="payment-fields">
        <!-- Fields for PayPal -->
        <label for="email" class="text">Email:</label>
        <input type="email" name="email" id="email_paypal" placeholder="example@example.com"><br>
        <label for="password" class="text">Password:</label>
        <input type="password" name="password" id="password_paypal" placeholder="********">
    </div>

    <div id="madaFields" class="payment-fields">
    <!-- Fields for Mada -->
    <label for="mada_card_number" class="text">Card Number:</label>
    <input type="text" name="mada_card_number" id="mada_card_number" placeholder="1234 5678 9012 3456">
    <br>
    <label for="mada_expiry_date" class="text">Expiry Date:</label>
    <input type="text" name="mada_expiry_date" id="mada_expiry_date" placeholder="MM/YY">
    <br>
    <label for="mada_cvv" class="text">CVV:</label>
    <input type="text" name="mada_cvv" id="mada_cvv" placeholder="123">
</div>

</div>






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
                // Check if there are any games in the database
                if ($result->num_rows > 0) {
                    // Output data of each row
                    $index = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $index . "</td>";
                        echo "<td>";
                        echo "<div class='cart-info'>";
                        echo "<div>";
                        echo "<p>" . $row["title"] . "</p>";
                        echo "<small>Price: $" . $row["price"] . "</small><br>";
                        echo "<button class='delete-button'><img src='images/delete.svg' alt='Delete'></button>";
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
                        echo "<td class='item-price'>$" . $row["total_price"] . "</td>";
                        echo "<td class='item-subtotal'>$" . $row["total_price"] . "</td>";
                        echo "</tr>";
                        $index++;
                    }
                } else {
                    echo "<tr><td colspan='5'>No games found</td></tr>";
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
                
                <button name="checkout_1button" id="checkoutBtn" class="checkout-button" type="submit">Checkout</button>
                </td>
                
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


    <div id="confirmationModal" class="modal">
    <div class="modal-content">
        <p>Are you sure you want to delete this item?</p>
        <button id="confirmYes">Yes</button>
        <button id="confirmNo">No</button>
    </div>
</div>



<?php include 'footer.php'; ?>




<div id="errorModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="errorMessage"></p>
    </div>
</div>

<div id="requiredFieldsModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Please Fill In All Required Fields</h2>
        <p>Please make sure to fill in all required fields before proceeding.</p>
    </div>
</div>



<div id="successModal" class="modal">
    <div class="modal-content">
        <h2>Order Successful!</h2>
        <p>Your order has been successfully placed.</p>
        <form action="checkout.php" method="post"><button name="checkout_button" id="closeSuccessModalBtn" class="close">Go to home page</button></form>
        
    </div>
</div>





    <!-- Your JavaScript code -->
    <script>
       
       document.addEventListener('DOMContentLoaded', function() {
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const itemPrices = document.querySelectorAll('.item-price');
        const itemSubtotals = document.querySelectorAll('.item-subtotal');
        const subtotalElement = document.querySelector('.subtotal');
        const taxElement = document.querySelector('.tax');
        const totalElement = document.querySelector('.total');
        const deleteButtons = document.querySelectorAll('.delete-button');
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
        const paymentOptions = document.querySelectorAll('input[name="payment_method"]');
        const paymentFields = document.querySelectorAll('.payment-fields');

        paymentOptions.forEach(option => {
            option.addEventListener('change', () => {
                const selectedOption = document.querySelector('input[name="payment_method"]:checked').value;
                paymentFields.forEach(field => {
                    field.classList.remove('visible');
                });
                document.getElementById(selectedOption + 'Fields').classList.add('visible');
            });
        });
    });
</script>





<script>document.addEventListener('DOMContentLoaded', function() {
    const checkoutBtn = document.getElementById('checkoutBtn');
    const successModal = document.getElementById('successModal');
    const requiredFieldsModal = document.getElementById('requiredFieldsModal');
    const closeModalButtons = document.querySelectorAll('.close');

    checkoutBtn.addEventListener('click', function(event) {
        // Validate fields before attempting checkout
        const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');
        if (!selectedPaymentMethod) {
            requiredFieldsModal.style.display = 'block'; // Show modal for required fields
            return; // Exit the function if payment method is not selected
        }

        const paymentMethod = selectedPaymentMethod.value;
        const fieldsValid = validateFields(paymentMethod);
        if (!fieldsValid) {
            requiredFieldsModal.style.display = 'block'; // Show modal for required fields
            return; // Exit the function if fields are not valid
        }

        // If all validations pass, show the success modal
        event.preventDefault(); // Prevent form submission
        successModal.style.display = 'block'; // Show the success modal
    });

    closeModalButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            requiredFieldsModal.style.display = 'none'; // Close the required fields modal
            successModal.style.display = 'none'; // Close the success modal
        });
    });

    // Function to validate fields based on the selected payment method
    function validateFields(paymentMethod) {
        switch(paymentMethod) {
            case 'mastercard':
                return validateMastercardFields();
            case 'paypal':
                return validatePaypalFields();
            case 'mada':
                return validateMadaFields();
            default:
                return false; // If payment method is not recognized, return false
        }
    }

    // Functions for field validation
    function validateMastercardFields() {
        var cardNumber = document.getElementById('card_number_mastercard').value;
        var expiryDate = document.getElementById('expiry_date_mastercard').value;
        var cvv = document.getElementById('cvv_mastercard').value;
        return cardNumber && expiryDate && cvv; // Return true if all fields are filled
    }

    function validatePaypalFields() {
        var email = document.getElementById('email_paypal').value;
        var password = document.getElementById('password_paypal').value;
        return email && password; // Return true if both email and password are filled
    }

    function validateMadaFields() {
        var madaCardNumber = document.getElementById('mada_card_number').value;
        var madaExpiryDate = document.getElementById('mada_expiry_date').value;
        var madaCvv = document.getElementById('mada_cvv').value;
        return madaCardNumber && madaExpiryDate && madaCvv; // Return true if all fields are filled
    }
});
</script>

<script>document.addEventListener('DOMContentLoaded', function() {
    const checkoutBtn = document.getElementById('checkoutBtn');
    const requiredFieldsModal = document.getElementById('requiredFieldsModal');
    const closeModalButtons = document.querySelectorAll('.close');

    checkoutBtn.addEventListener('click', function(event) {
        // Validate fields before attempting checkout
        const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');
        if (!selectedPaymentMethod) {
            requiredFieldsModal.style.display = 'block'; // Show modal for required fields
            return; // Exit the function if payment method is not selected
        }

        const paymentMethod = selectedPaymentMethod.value;
        const fieldsValid = validateFields(paymentMethod);
        if (!fieldsValid) {
            requiredFieldsModal.style.display = 'block'; // Show modal for required fields
            return; // Exit the function if fields are not valid
        }

        // If all validations pass, proceed with checkout
        event.preventDefault(); // Prevent form submission
        // Your code to proceed with checkout goes here...
    });

    closeModalButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            requiredFieldsModal.style.display = 'none'; // Close the required fields modal
        });
    });

    // Function to validate fields based on the selected payment method
    function validateFields(paymentMethod) {
        // Your validation logic goes here...
    }
});
</script>

<script>document.addEventListener('DOMContentLoaded', function() {
    const cardNumberInput = document.getElementById('card_number_mastercard');
    const expiryDateInput = document.getElementById('expiry_date_mastercard');
    const cvvInput = document.getElementById('cvv_mastercard');

    // Add event listeners for input validation
    cardNumberInput.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, ''); // Allow only digits
        if (this.value.length > 16) {
            this.value = this.value.slice(0, 16); // Limit length to 16 digits
        }
    });

    expiryDateInput.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, ''); // Allow only digits
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4); // Limit length to 4 characters
        }
    });

    cvvInput.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, ''); // Allow only digits
        if (this.value.length > 3) {
            this.value = this.value.slice(0, 3); // Limit length to 3 digits
        }
    });
});
</script>


<script>document.addEventListener('DOMContentLoaded', function() {
    const madaCardNumberInput = document.getElementById('mada_card_number');
    const madaExpiryDateInput = document.getElementById('mada_expiry_date');
    const madaCvvInput = document.getElementById('mada_cvv');

    // Add event listeners for input validation
    madaCardNumberInput.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, ''); // Allow only digits
        if (this.value.length > 16) {
            this.value = this.value.slice(0, 16); // Limit length to 16 digits
        }
    });

    madaExpiryDateInput.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, ''); // Allow only digits
        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4); // Limit length to 4 characters
        }
    });

    madaCvvInput.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, ''); // Allow only digits
        if (this.value.length > 3) {
            this.value = this.value.slice(0, 3); // Limit length to 3 digits
        }
    });
});

    </script>

<script>document.addEventListener('DOMContentLoaded', function() {
    const checkoutBtn = document.getElementById('checkoutBtn');
    const successModal = document.getElementById('successModal');
    const requiredFieldsModal = document.getElementById('requiredFieldsModal');
    const closeModalButtons = document.querySelectorAll('.close');
    const closeSuccessModalBtn = document.getElementById('closeSuccessModalBtn');

    checkoutBtn.addEventListener('click', function(event) {
        // Validate fields before attempting checkout
        const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');
        if (!selectedPaymentMethod) {
            requiredFieldsModal.style.display = 'block'; // Show modal for required fields
            return; // Exit the function if payment method is not selected
        }

        const paymentMethod = selectedPaymentMethod.value;
        const fieldsValid = validateFields(paymentMethod);
        if (!fieldsValid) {
            requiredFieldsModal.style.display = 'block'; // Show modal for required fields
            return; // Exit the function if fields are not valid
        }

        // If all validations pass, show the success modal
        event.preventDefault(); // Prevent form submission
        successModal.style.display = 'block'; // Show the success modal
    });

    closeModalButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            requiredFieldsModal.style.display = 'none'; // Close the required fields modal
            successModal.style.display = 'none'; // Close the success modal
        });
    });

    // Redirect to home.php when the close button in the success modal is clicked
    closeSuccessModalBtn.addEventListener('click', function() {
        window.location.href = 'home.php'; // Redirect to home.php
    });

    // Function to validate fields based on the selected payment method
    function validateFields(paymentMethod) {
        switch(paymentMethod) {
            case 'mastercard':
                return validateMastercardFields();
            case 'paypal':
                return validatePaypalFields();
            case 'mada':
                return validateMadaFields();
            default:
                return false; // If payment method is not recognized, return false
        }
    }

    // Functions for field validation
    function validateMastercardFields() {
        var cardNumber = document.getElementById('card_number_mastercard').value;
        var expiryDate = document.getElementById('expiry_date_mastercard').value;
        var cvv = document.getElementById('cvv_mastercard').value;
        return cardNumber && expiryDate && cvv; // Return true if all fields are filled
    }

    function validatePaypalFields() {
        var email = document.getElementById('email_paypal').value;
        var password = document.getElementById('password_paypal').value;
        return email && password; // Return true if both email and password are filled
    }

    function validateMadaFields() {
        var madaCardNumber = document.getElementById('mada_card_number').value;
        var madaExpiryDate = document.getElementById('mada_expiry_date').value;
        var madaCvv = document.getElementById('mada_cvv').value;
        return madaCardNumber && madaExpiryDate && madaCvv; // Return true if all fields are filled
    }
});
</script>


<script>document.addEventListener('DOMContentLoaded', function() {
    const checkoutBtn = document.getElementById('checkoutBtn');
    const successModal = document.getElementById('successModal');
    const requiredFieldsModal = document.getElementById('requiredFieldsModal');
    const closeModalButtons = document.querySelectorAll('.close');
    const closeSuccessModalBtn = document.getElementById('closeSuccessModalBtn');

    checkoutBtn.addEventListener('click', function(event) {
        // Validate if a payment method is selected
        const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');
        if (!selectedPaymentMethod) {
            requiredFieldsModal.style.display = 'block'; // Show modal for required fields
            return; // Exit the function if payment method is not selected
        }

        const paymentMethod = selectedPaymentMethod.value;
        const fieldsValid = validateFields(paymentMethod);
        if (!fieldsValid) {
            requiredFieldsModal.style.display = 'block'; // Show modal for required fields
            return; // Exit the function if fields are not valid
        }

        // If all validations pass, show the success modal
        event.preventDefault(); // Prevent form submission
        successModal.style.display = 'block'; // Show the success modal
    });

    closeModalButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            requiredFieldsModal.style.display = 'none'; // Close the required fields modal
            successModal.style.display = 'none'; // Close the success modal
        });
    });

    // Redirect to home.php when the close button in the success modal is clicked
    closeSuccessModalBtn.addEventListener('click', function() {
        window.location.href = 'home.php'; // Redirect to home.php
    });

    // Function to validate fields based on the selected payment method
    function validateFields(paymentMethod) {
        switch(paymentMethod) {
            case 'mastercard':
                return validateMastercardFields();
            case 'paypal':
                return validatePaypalFields();
            case 'mada':
                return validateMadaFields();
            default:
                return false; // If payment method is not recognized, return false
        }
    }

    // Functions for field validation
    function validateMastercardFields() {
        var cardNumber = document.getElementById('card_number_mastercard').value;
        var expiryDate = document.getElementById('expiry_date_mastercard').value;
        var cvv = document.getElementById('cvv_mastercard').value;
        return cardNumber && expiryDate && cvv; // Return true if all fields are filled
    }

    function validatePaypalFields() {
        var email = document.getElementById('email_paypal').value;
        var password = document.getElementById('password_paypal').value;
        return email && password; // Return true if both email and password are filled
    }

    function validateMadaFields() {
        var madaCardNumber = document.getElementById('mada_card_number').value;
        var madaExpiryDate = document.getElementById('mada_expiry_date').value;
        var madaCvv = document.getElementById('mada_cvv').value;
        return madaCardNumber && madaExpiryDate && madaCvv; // Return true if all fields are filled
    }
});
</script>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>