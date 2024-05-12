<?php
if( isset($_GET["product_id"])){
    $product_id = $_GET["product_id"];

    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $database = "games4less";
    
    //create connection
    $connection = new mysqli($servername ,$username , $password, $database);
    
    if($connection->connect_error){
        die("connection failed: " . $connection->connect_error);
    }

    $sql = "DELETE FROM product WHERE product_id=$product_id";
    $connection->query($sql);




}
   header("location: /php/product-management.php");
    exit;
?>