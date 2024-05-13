<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product page</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="product-management.css" type="text/css" rel="stylesheet"/>
    <?php include 'head.php'; ?>

</head>

<body class="flex-container-column background-color">
    <header class="default header">
        <section class="head flex-container-space-between" style="margin: 10%;">
        
        <a href="/php/home.php" style="text-decoration: none;" class="site-logo">
            <img src="images/Logo.svg" alt="Logo">
            <h1 class="text">Games4Less</h1>
        </a>
        
        </section>
    </header>
    <hr class="horizontal-divider">
    <div class="container my-5">
        <h1>List of Products</h1>
            <a class='btn btn-primary' id ="id1" href='/php/product-management-newProduct.php' role="button">New Product</a>
            <br>
            <table class="table" id="t1">
            <!-- <thead>
                <tr>
                    <th>product_id</th>
                    <th>title</th>
                    <th>paragraph</th>
                    <th>category_id</th>
                    <th>genre</th>
                    <th>release_date</th>
                    <th>platform</th>
                    <th>price</th>
                    <th>discount</th>
                    <th>quantity</th>
                    <th>image_url_1</th>
                    <th>image_url_2</th>
                    <th>image_url_3</th>
                    <th>region</th>
                    <th>type_of_product</th>
                    <th>Action</th>
                </tr>
            </thead> -->
        
            <tbody>

            <?php
        $servername = "localhost:3306";///edited to 3306 from 3307
        $username = "root";
        $password = "";
        $database = "games4less";

        //create connection
        $connection = new mysqli($servername ,$username , $password, $database);

        if($connection->connect_error){
            die("connection failed: " . $connection->connect_error);
        }

        //write a query
        $sql = "SELECT * FROM product";
        $result = $connection->query($sql);

        if(!$result){
            die("Invalid query: " . $connection->error);
        }

        //read data of each row
        while($row = $result->fetch_assoc()) { 
            echo "            
        <thead>
            <tr>
                <th>" . $row["title"] . "</th>
            </tr>
        </thead>";
        $release_date=$row["release_date"];
        $discount=$row["discount"];
        if ( empty($release_date)){
            $release_date = 'No date';

        }else if (empty($discount)){
            $discount = 'No discount';
        }

            echo "
        <tr>
            <td>" . $row["product_id"] . "</td>
            
            <td>" . $row["paragraph"] . "</td>
            <td>" . $row["category_id"] . "</td>
            <td>" . $row["genre"] . "</td>
            <td>" .  $release_date . "</td>
            <td>" . $row["platform"] . "</td>
            <td>" . $row["price"] . "</td>
            <td>" . $discount . "</td>
            <td>" . $row["quantity"] . "</td>
            <td>" . $row["image_url_1"] . "</td>
            <td>" . $row["image_url_2"] . "</td>
            <td>" . $row["image_url_3"] . "</td>
            <td>" . $row["region"] . "</td>
            <td>" . $row["type_of_product"] . "</td>
            <td id='tdA'>
                <a class='btn btn-primary btn-sm' href='/php/product-management-editProduct.php?product_id=$row[product_id]'>Edit</a>
                <a class='btn btn-danger btn-sm' href='/php/product-management-deleteProduct.php?product_id=$row[product_id]'>Delete</a>
            </td>
        </tr>"; 
        } 
        ?>
             </tbody>
        
            </table>
        </div>  
    <hr class="horizontal-divider">
    <?php include 'footer.php'; ?>
    
</body>
</html>