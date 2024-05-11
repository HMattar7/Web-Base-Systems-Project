<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product page</title>
    
    <link href="Product-Pages-styles.css" type="text/css" rel="stylesheet"/>
    <?php include 'head.php'; ?>

</head>

<body class="flex-container-column background-color">
    <?php include 'header.php'; ?>
    
    
    <hr class="horizontal-divider">
    <?php include 'navbar.php'; ?>
    <section class="default flex-container-row text">
        <section class="game-images">
            <img class="main-image round-border" src="https://placehold.co/600x400/png" alt="main image"></img>
            <div class="secondary-images">
                <img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image"></img>
                <img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image"></img>
            </div>
        </section>
        <section class="default text">
            <div class="game-name">
                <h2 class="name-header">Game name</h2>
            </div>
            <div class="content-box bottom-margin">
                <div class="flex-container-row">
                    <h2 class="right-margin">Platform:</h2>
                    <h2 >placholder</h2>
                </div>
                <div class="flex-container-row">
                    <h2 class="right-margin">Version::</h2>
                    <h2 >placholder</h2>
                </div>
                <div class="flex-container-row">
                    <h2 class="right-margin">Type::</h2>
                    <h2 >placholder</h2>
                </div>
                <div class="flex-container-row">
                    <h2 class="right-margin">Release Date::</h2>
                    <h2 >placholder</h2>
                </div>
            </div>
            <div class=" paragraph  bottom-margin large-font ">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec luctus maurisLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec luctus maurisLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec luctus maurisLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec luctus maurisLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec luctus mauris. </p>
            </div>
        </section>
        <section class="default price-box text flex-container-column content-box ">
            <h2 class="price-header">$70.99</h2>
            <div class="flex-container-column horizontal-margin buy-buttons">
                <button type="button" class="cart-button horizontal-margin large-font ">Add to Cart</button>
                <button type="button" class="Buy-Now-button horizontal-margin large-font">Buy Now</button>
            </div>
            <h2 class="stock-header">5 in stock</h2>
            

        </section>
    </section>
    <hr class="horizontal-divider">
    <?php include 'footer.php'; ?>

</body>
</html>