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
    <?php include 'header.php'; ?>
    </header>
    <hr class="horizontal-divider">
    <div class="container my-5">
        <h1>List of Products</h1>
            <a class='btn btn-primary' id ="id1" href='product-management-newProduct.html' role="button">New Product</a>
            <br>
            <table class="table">
            <thead>
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
                    <th colspan="2">Action</th>
                </tr>
            </thead>
        
            <tbody>

                <tr>
                    <td>product_id</td>
                    <td>title</td>
                    <td>paragraph</td>
                    <td>category_id</td>
                    <td>genre</td>
                    <td>release_date</td>
                    <td>platform</td>
                    <td>price</td>
                    <td>discount</td>
                    <td>quantity</td>
                    <td>image_url_1</td>
                    <td>image_url_2</td>
                    <td>image_url_3</td>
                    <td>region</td>
                    <td>type_of_product</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='product-management-editProduct.html'>Edit</a>
                        <a class='btn btn-danger btn-sm' href=''>Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>product_id</td>
                    <td>title</td>
                    <td>paragraph</td>
                    <td>category_id</td>
                    <td>genre</td>
                    <td>release_date</td>
                    <td>platform</td>
                    <td>price</td>
                    <td>discount</td>
                    <td>quantity</td>
                    <td>image_url_1</td>
                    <td>image_url_2</td>
                    <td>image_url_3</td>
                    <td>region</td>
                    <td>type_of_product</td>
                    <td colspan="2">
                        <a class='btn btn-primary btn-sm' href='product-management-editProduct.html'>Edit</a>
                        <a class='btn btn-danger btn-sm' href=''>Delete</a>
                    </td>
                </tr>
             </tbody>
        
            </table>
        </div>  
    <hr class="horizontal-divider">
    <?php include 'footer.php'; ?>
    
</body>
</html>