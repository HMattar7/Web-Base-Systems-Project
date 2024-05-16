<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = "";
$dbname = "games4less"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 123;

// Query to get order ID for the user
$sql = "SELECT order_id FROM `order` WHERE user_id = $user_id";
$result = $conn->query($sql);
$order_id = $result->fetch_assoc()['order_id'];

// Query to get products in the user's cart
$sql = "SELECT p.*, oi.quantity FROM `product` p 
        JOIN order_item oi ON p.product_id = oi.product_id 
        WHERE oi.order_id = $order_id";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="cart-styles.css" type="text/css" rel="stylesheet"/>
    <link href="Product-Pages-styles.css" type="text/css" rel="stylesheet"/>
    <?php include 'head.php'; ?>
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
                if ($result->num_rows > 0) {
                    $index = 1;
                    while($row = $result->fetch_assoc()) {
                        $subtotal = $row["price"] * $row["quantity"];
                        echo "<tr data-product-id='" . $row["product_id"] . "' data-order-id='" . $order_id . "'>";
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
                        echo "<input type='number' value='" . $row["quantity"] . "' class='quantity-input'>";
                        echo "<div class='quantity-controls'>";
                        echo "<button class='quantity-up'><img src='images/up.svg' alt='Up'></button>";
                        echo "<button class='quantity-down'><img src='images/down.svg' alt='Down'></button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</td>";
                        echo "<td class='item-price'>$" . $row["price"] . "</td>";
                        echo "<td class='item-subtotal'>$" . number_format($subtotal, 2) . "</td>";
                        echo "</tr>";
                        $index++;
                    }
                } else {
                    echo "<tr><td colspan='5'>No games found</td></tr>";
                }
                ?>
            </tbody>
        </table>

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

    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <p>Are you sure you want to delete this item?</p>
            <button id="confirmYes">Yes</button>
            <button id="confirmNo">No</button>
        </div>
    </div>

    <hr class="horizontal-divider">
    <?php include 'footer.php'; ?>

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
const productId = container.closest('tr').getAttribute('data-product-id');
const orderId = container.closest('tr').getAttribute('data-order-id');

quantityUp.addEventListener('click', function() {
    quantityInput.value = parseInt(quantityInput.value) + 1;
    updateItemSubtotal(quantityInput, priceElement, subtotalElement);
    updateCartItemQuantity(productId, orderId, quantityInput.value);
});

quantityDown.addEventListener('click', function() {
    if (parseInt(quantityInput.value) > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
        updateItemSubtotal(quantityInput, priceElement, subtotalElement);
        updateCartItemQuantity(productId, orderId, quantityInput.value);
    }
});

quantityInput.addEventListener('input', function() {
    if (parseInt(this.value) <= 0 || isNaN(parseInt(this.value))) {
        this.value = 1;
    }
    updateItemSubtotal(quantityInput, priceElement, subtotalElement);
    updateCartItemQuantity(productId, orderId, this.value);
});
}

function attachDeleteEvents(button) {
button.addEventListener('click', function() {
    modal.style.display = 'block';
    currentItemToDelete = this.closest('tr');
});
}

function updateCartItemQuantity(productId, orderId, quantity) {
const formData = new FormData();
formData.append('product_id', productId);
formData.append('order_id', orderId);
formData.append('quantity', quantity);

fetch('update_cart.php', {
    method: 'POST',
    body: formData
})
.then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.text();
})
.then(data => {
    console.log(data);
})
.catch(error => {
    console.error('There was an error updating the cart:', error);
});
}

deleteButtons.forEach(attachDeleteEvents);

confirmYesBtn.addEventListener('click', function() {
if (currentItemToDelete) {
    const productId = currentItemToDelete.getAttribute('data-product-id');
    const orderId = currentItemToDelete.getAttribute('data-order-id');

    const priceOfDeletedItem = parseFloat(currentItemToDelete.querySelector('.item-subtotal').textContent.replace('$', ''));
    currentItemToDelete.remove();
    subtotalElement.textContent = '$' + (parseFloat(subtotalElement.textContent.replace('$', '')) - priceOfDeletedItem).toFixed(2);
    updateTotalPrice();
    deleteCartItem(productId, orderId);
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

document.addEventListener('DOMContentLoaded', function() {
const checkoutButton = document.getElementById('checkoutButton');
checkoutButton.addEventListener('click', function() {
window.location.href = 'checkout.php';
});
});

function deleteCartItem(productId, orderId) {
const formData = new FormData();
formData.append('product_id', productId);
formData.append('order_id', orderId);

fetch('delete_item.php', {
method: 'POST',
body: formData
})
.then(response => {
if (!response.ok) {
    throw new Error('Network response was not ok');
}
return response.text();
})
.then(data => {
console.log(data);
})
.catch(error => {
console.error('There was an error deleting the item:', error);
});
}
</script>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
