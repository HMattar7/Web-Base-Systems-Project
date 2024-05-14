<?php
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 123; 

    $sql_name = "root";
    $sql_pass = "";
    $db_link = mysqli_connect("localhost:3306",$sql_name, $sql_pass);
    mysqli_select_db($db_link,"games4less");
    $select_query = "SELECT order_id FROM `order` WHERE user_id = $user_id";
    $result_query = mysqli_query($db_link, $select_query);
    if (mysqli_num_rows($result_query) > 0){
        $order_id = mysqli_fetch_array($result_query)[0];
        $insert_query = "INSERT INTO `order_item`(`order_id`, `product_id`, `quantity`, `price`) VALUES ($order_id,$product_id,$quantity,$price)";
        $result_query = mysqli_query($db_link, $insert_query);

        $sum_query = "SELECT SUM(price) AS total_price FROM order_item WHERE order_id = $order_id";
        $sum_result = mysqli_query($db_link, $sum_query);
        $row = mysqli_fetch_assoc($sum_result);
        $total_price = $row['total_price'];

        $update_query = "UPDATE `order` SET `total_price` = $total_price WHERE order_id = $order_id";
        $update_result = mysqli_query($db_link, $update_query);
    }else{
        $insert_query = "INSERT INTO `order`(`user_id`, `date_placed`, `order_status`, `total_price`) VALUES ($user_id, '" . date('Y-m-d') . "', 'Waiting', $price)";
        $result_query = mysqli_query($db_link, $insert_query);

        $select_query = "SELECT order_id FROM `order` WHERE user_id = $user_id";
        $result_query = mysqli_query($db_link, $select_query);
        $order_id = mysqli_fetch_array($result_query)[0];
        $insert_query = "INSERT INTO `order_item`(`order_id`, `product_id`, `quantity`, `price`) VALUES ($order_id,$product_id,$quantity,$price)";
        $result_query = mysqli_query($db_link, $insert_query);
    }
}
mysqli_close($db_link);
header("Location: cart.php");
?>