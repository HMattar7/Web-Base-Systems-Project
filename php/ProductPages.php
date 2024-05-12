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
        <?php
                if(isset($_GET['id'])){
                    $product_id = $_GET['id'];
                }
                else{
                    // $page = 1;
                }

                $sql_name = "root";
                $sql_pass = "";
                $db_link = mysqli_connect("localhost:3306",$sql_name, $sql_pass);
                mysqli_select_db($db_link,"games4less");
                $select_query = "SELECT * FROM product WHERE product_id = $product_id";
                $result_query = mysqli_query($db_link, $select_query);
                $row = mysqli_fetch_array($result_query);
                ///
                $product_id = $row['product_id'];
                $category_id = $row['category_id'];
                $title = $row['title'];
                $paragraph = $row['paragraph'];
                $genre = $row['genre'];
                $release_date = $row['release_date'];
                $platform = $row['platform'];
                $price = $row['price'];
                $discount = $row['discount'];
                $quantity = $row['quantity'];
                $image_url_1 = $row['image_url_1'];
                $image_url_2 = $row['image_url_2'];
                $image_url_3 = $row['image_url_3'];
                $region = $row['region'];
                $type_of_product = $row['type_of_product'];

                $imagePath1 = './games_images/' . $image_url_1 . '.avif';
                $imagePath2 = './games_images/' . $image_url_2 . '.avif';
                $imagePath3 = './games_images/' . $image_url_3 . '.avif';
                if (!file_exists('./games_images/' . $image_url_1 . '.avif')) { $imagePath1 ="https://placehold.co/600x400/png"; }
                if (!file_exists('./games_images/' . $image_url_2 . '.avif')) { $imagePath2 ="https://placehold.co/600x400/png"; }
                if (!file_exists('./games_images/' . $image_url_3 . '.avif')) { $imagePath3 ="https://placehold.co/600x400/png"; }



                echo "<section class='game-images'>
                <img class='main-image round-border' src='$imagePath1' alt='main image'></img>
                <div class='secondary-images'>
                    <img class='secondary-image round-border' src='$imagePath2' alt='secondary image'></img>
                    <img class='secondary-image round-border' src='$imagePath3' alt='secondary image'></img>
                </div>
            </section>
            <section class='default text'>
                <div class='game-name'>
                    <h2 class='name-header'>$title</h2>
                </div>
                <div class='content-box bottom-margin'>
                    <div class='flex-container-row'>
                        <h2 class='right-margin'>Platform:</h2>
                        <h2 >$platform</h2>
                    </div>
                    <div class='flex-container-row'>
                        <h2 class='right-margin'>Version:</h2>
                        <h2 >$region</h2>
                    </div>
                    <div class='flex-container-row'>
                        <h2 class='right-margin'>Type:</h2>
                        <h2 >$type_of_product</h2>
                    </div>
                    <div class='flex-container-row'>
                        <h2 class='right-margin'>Release Date:</h2>
                        <h2 >$release_date</h2>
                    </div>
                </div>
                <div class=' paragraph  bottom-margin large-font '>
                    <p>$paragraph</p>
                </div>
            </section>
            <section class='default price-box text flex-container-column content-box '>
                <h2 class='price-header'>$$price</h2>
                <div class='flex-container-column horizontal-margin buy-buttons'>
                    <button type='button' class='cart-button horizontal-margin large-font '>Add to Cart</button>
                    <button type='button' class='Buy-Now-button horizontal-margin large-font'>Buy Now</button>
                </div>
                <h2 class='stock-header'>$quantity in stock</h2>"
        ?>
        
            

        </section>
    </section>
    <hr class="horizontal-divider">
    <?php include 'footer.php'; ?>

</body>
</html>