<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "games4less";

//create connection
$connection = new mysqli($servername ,$username , $password, $database);

if($connection->connect_error){
    die("connection failed: " . $connection->connect_error);
}



$product_id="";
$title="";
$paragraph="";
$category_id="";
$genre="";
$release_date="";
$platform="";
$price="";
$discount="";
$quantity="";
$image_url_1="";
$image_url_2="";
$image_url_3="";
$region="";
$type_of_product="";

$errorMessage = "";
$successMessage = "";

if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {

    $title=$_POST["title"]; 
    $paragraph=$_POST["paragraph"]; 
    $category_id=$_POST["category_id"]; 
    $genre=$_POST["genre"]; 
    $release_date=$_POST["release_date"]; 
    $platform=$_POST["platform"]; 
    $price=$_POST["price"]; 
    $discount=$_POST["discount"]; 
    $quantity=$_POST["quantity"]; 
    $image_url_1=$_POST["image_url_1"]; 
    $image_url_2=$_POST["image_url_2"]; 
    $image_url_3=$_POST["image_url_3"]; 
    $region=$_POST["region"]; 
    $type_of_product=$_POST["type_of_product"]; 


    do{
        if ( empty($title) || empty($image_url_1) || empty($category_id) || empty($price) || empty($quantity) ){
        $errorMessage = "Title,  category_id, image_url_1, price and quantity fields are required";
        break;
        }

        // add new client to database
        $sql = "INSERT INTO product (title, paragraph, category_id, genre, release_date, platform, price, discount, quantity, image_url_1, image_url_2, image_url_3, region, type_of_product)" . "VALUES ('$title', '$paragraph', '$category_id', '$genre', '$release_date', '$platform', '$price', '$discount', '$quantity', '$image_url_1', '$image_url_2', '$image_url_3', '$region', '$type_of_product')";
        $result = $connection->query($sql);

        if (!$result){
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $product_id="";
        $title="";
        $paragraph="";
        $category_id="";
        $genre="";
        $release_date="";
        $platform="";
        $price="";
        $discount="";
        $quantity="";
        $image_url_1="";
        $image_url_2="";
        $image_url_3="";
        $region="";
        $type_of_product="";

        $successMessage = "Client added correctly";

        header("location: /php/product-management.php");
        exit;

    }while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title></title> <link href="product-management.css" type="text/css" rel="stylesheet"/>
    
</head>

<body class="flex-container-column background-color">
    <div class="container my-5">
        <h2>New Product</h2>

        <?php
            if(!empty($errorMessage)){
                echo 
                "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='close'></button>
                </div>
                ";
            }
        ?>


        <form method="post">

             
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">title<span style="color: red">*</span></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="title" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">paragraph</label>
                <div class="col-sm-6">
                     <textarea class="form-control" name="paragraph" id="paragraph" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">category_id<span style="color: red">*</span></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="category_id" value="1">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">genre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="genre" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">release_date</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="release_date" value="YYYY/MM/DD">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">platform</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="platform" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">price<span style="color: red">*</span></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" value="$">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">discount</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="discount" value="NULL">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">quantity<span style="color: red">*</span></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="quantity" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">image_url_1<span style="color: red">*</span></label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="image_url_1" accept="image/*" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">image_url_2</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="image_url_2" accept="image/*" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">image_url_3</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="image_url_3" accept="image/*" value="">
                </div>
            </div>

            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">region</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="region" value="GLOBAL">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">type_of_product</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="type_of_product" value="Key">
                </div>
            </div>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="product-management.php" role="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>