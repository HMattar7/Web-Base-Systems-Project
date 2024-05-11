<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    
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
        <tr>
            <td>1</td>
            <td>
                <div class="cart-info">
                    <img src="images/gtav.jpg" alt="gta v">
                    <div>
                        <p>Grand Theft Auto V</p>
                        <small>Price: $59.99</small>
                        <br>
                        <button class="delete-button"><img src="images/delete.svg" alt="Delete"></button>
                    </div>
                </div>
            </td>
            <td>
                <div class="quantity-container">
                    <input type="number" value="1" class="quantity-input">
                    <div class="quantity-controls">
                        <button class="quantity-up"><img src="images/up.svg" alt="Up"></button>
                        <button class="quantity-down"><img src="images/down.svg" alt="Down"></button>
                    </div>
                </div>
            </td>
            <td class="item-price">$59.99</td>
            <td class="item-subtotal">$59.99</td>
        </tr>

        <tr>
            <td>2</td>
            <td>
                <div class="cart-info">
                    <img src="images/gtaiv.jpg" alt="gta v">
                    <div>
                        <p>Grand Theft Auto IV</p>
                        <small>Price: $49.99</small>
                        <br>
                        <button class="delete-button"><img src="images/delete.svg" alt="Delete"></button>
                    </div>
                </div>
            </td>
            <td>
                <div class="quantity-container">
                    <input type="number" value="1" class="quantity-input">
                    <div class="quantity-controls">
                        <button class="quantity-up"><img src="images/up.svg" alt="Up"></button>
                        <button class="quantity-down"><img src="images/down.svg" alt="Down"></button>
                    </div>
                </div>
            </td>
            <td class="item-price">$49.99</td>
            <td class="item-subtotal">$49.99</td>
        </tr>

        <tr>
            <td>3</td>
            <td>
                <div class="cart-info">
                    <img src="images/gtasa.jpg" alt="gta v">
                    <div>
                        <p>Grand Theft Auto IV</p>
                        <small>Price: $19.99</small>
                        <br>
                        <button class="delete-button"><img src="images/delete.svg" alt="Delete"></button>
                    </div>
                </div>
            </td>
            <td>
                <div class="quantity-container">
                    <input type="number" value="1" class="quantity-input">
                    <div class="quantity-controls">
                        <button class="quantity-up"><img src="images/up.svg" alt="Up"></button>
                        <button class="quantity-down"><img src="images/down.svg" alt="Down"></button>
                    </div>
                </div>
            </td>
            <td class="item-price">$19.99</td>
            <td class="item-subtotal">$19.99</td>
        </tr>
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
                    <button class="checkout-button" type="button">Checkout</button>
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

</body>
</html>
