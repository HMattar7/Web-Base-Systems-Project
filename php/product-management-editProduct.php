
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
        <h2>Edit Product</h2>


        <form method="post">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">product_id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_id" value="">
                </div>
            </div>
             
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">title</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Lname" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">paragraph</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">category_id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">genre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">release_date</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Lname" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">platform</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">discount</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Lname" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">image_url_1</label>
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
                    <input type="text" class="form-control" name="phone" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">type_of_product</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="">
                </div>
            </div>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="product-management.html" role="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>