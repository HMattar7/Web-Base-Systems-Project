<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse products</title>
    
    <link href="Product-Pages-styles.css" type="text/css" rel="stylesheet"/>
    <link href="browse-products-styles.css" type="text/css" rel="stylesheet"/>
    <?php include 'head.php'; ?>

</head>

<body class="flex-container-column background-color">
    <?php include 'header.php'; ?>
    
    <?php
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $formIdentifier = $_POST["formIdentifier"];
                if ($formIdentifier === "Sort By") {
                    $_SESSION["sortOption"] = $_POST["sortOption"];
                    $sortOption = $_POST["sortOption"];
                }elseif ($formIdentifier === "Genra") {
                    $_SESSION["genraOption"] = $_POST["genraOption"];
                    $genraOption = $_POST["genraOption"];
                }elseif ($formIdentifier === "PriceRange") {
                    $_SESSION["From"] = $_POST["From"];
                    $FromOption = is_numeric($_POST["From"]) ? $_POST["From"] : "From";
                    $_SESSION["To"] = $_POST["To"];
                    $ToOption = is_numeric($_POST["To"]) ? $_POST["To"] : "To";
                }elseif ($formIdentifier === "Platform") {
                    if(isset($_POST["platform"])){
                        $_SESSION["platform"] = $_POST["platform"];
                        $platformOptions = $_POST["platform"];
                    }
                }elseif ($formIdentifier === "Type") {
                    if(isset($_POST["Type"])){
                        $_SESSION["Type"] = $_POST["Type"];
                        $typeOptions = $_POST["Type"];
                    }
                }elseif ($formIdentifier === "Region") {
                    if(isset($_POST["Region"])){
                        $_SESSION["Region"] = $_POST["Region"];
                        $regionOptions = $_POST["Region"];
                    }
                }elseif ($formIdentifier === "search-form") {
                    $search_value = $_POST["search-value"];
                    $search_query = "SELECT * FROM product WHERE title LIKE '%$search_value%'";
                }
                
                else {
                    $sortOption = isset($_SESSION['sortOption']) ? $_SESSION["sortOption"] : "alphabetical";
                    $genraOption = isset($_SESSION["genraOption"]) ? $_SESSION["genraOption"] : "All";
                    $FromOption = isset($_SESSION["From"]) ? $_SESSION["From"] : "From";
                    $ToOption = isset($_SESSION["To"]) ? $_SESSION["To"] : "To";
                    $platformOptions = isset($_SESSION["platform"]) ? $_SESSION["platform"] : "";
                    $typeOptions = isset($_SESSION["Type"]) ? $_SESSION["Type"] : "";
                    $regionOptions = isset($_SESSION["Region"]) ? $_SESSION["Region"] : "";
                } 
            }
            
            $sortOption = isset($_SESSION['sortOption']) ? $_SESSION["sortOption"] : "alphabetical";
            $genraOption = isset($_SESSION["genraOption"]) ? $_SESSION["genraOption"] : "All";
            $FromOption = isset($_SESSION["From"]) ? $_SESSION["From"] : "From";
            $ToOption = isset($_SESSION["To"]) ? $_SESSION["To"] : "To";
            $platformOptions = isset($_SESSION["platform"]) ? $_SESSION["platform"] : "";
            $typeOptions = isset($_SESSION["Type"]) ? $_SESSION["Type"] : "";
            $regionOptions = isset($_SESSION["Region"]) ? $_SESSION["Region"] : "";

            if (isset($_GET["Navbar"])){
                $Navbar_Option = $_GET["Navbar"];
    
                if (isset($_GET["MaxPrice"])){
                    $ToOption = $_GET["MaxPrice"];
                    $platformOptions = array($_GET["Platform"]);
                } 
                if (isset($_GET["Platform"])) {
                    $platformOptions = array($_GET["Platform"]);
                }
                if (isset($_GET["Genra"])) {
                    $genraOption = $_GET["Genra"];
                }
            }

        } catch (Exception $e) {
            ///
        }
        
    ?>

    <hr class="horizontal-divider">
    <?php include 'navbar.php'; ?>
    <?php
            if(isset($_GET['page-nr'])){
                $page = $_GET['page-nr'];
            }
            else{
                $page = 1;
            }
    ?>
    <section class="content-area">
        
        <section class=" text side-panel side-flex-container-column">
            <div class="flex-container-row allinments" >
                <img class="background-layout" src="images/hamburger-svgrepo-com.svg" id="cardslayout" onclick="ProductLayout(this)" alt="cards" width="32" height="32">
                <img src="images/grid-svgrepo-com.svg" id="gridlayout" onclick="ProductLayout(this)" alt="grid" width="32" height="32">
            </div>
            <div class="select-option">
              <h1>Sort By</h1>
                <div class="flex-container-column">
                    <form action="BrowseProducts.php" method="POST" id="Sort By">
                        <select name="sortOption" onchange="SortForm()">
                        <option class="text" disabled selected><?php echo $sortOption; ?></option>
                        <option class="text" value="alphabetical">alphabetical</option>
                        <option class="text" value="Release Date">Release Date</option>
                        <option class="text" value="Lowest Price">Lowest Price</option>
                        <option class="text" value="Highest Price">Highest Price</option>
                        </select>
                        <input type="hidden" name="formIdentifier" value="Sort By">
                    </form>
                </div>
                <?php
                if ($sortOption == "alphabetical") {
                    $sort_query = "ORDER BY `title` ASC";
                }elseif ($sortOption == "Release Date") {
                    $sort_query = "AND `release_date` IS NOT NULL ORDER BY `release_date` DESC";
                }elseif ($sortOption == "Lowest Price") {
                    $sort_query = "ORDER BY `price` ASC";
                }elseif ($sortOption == "Highest Price") {
                    $sort_query = "ORDER BY `price` DESC";
                }
                ?>
            </label>
            </div>
            <div class="">
                <h1>Genra</h1>
                <div class="flex-container-column">
                    <form action="BrowseProducts.php" method="POST" id="Genra">
                        <select name="genraOption" onchange="GenraForm()">
                        <option class="text" disabled selected><?php echo $genraOption; ?></option>
                        <option class="text">All</option>
                        <?php
                            $sql_name = "root";
                            $sql_pass = "";
                            $db_link = mysqli_connect("localhost:3306",$sql_name, $sql_pass);
                            mysqli_select_db($db_link,"games4less");
                            $select_query = "SELECT DISTINCT `genre` FROM `product`";
                            $result_query = mysqli_query($db_link, $select_query);
                            while ($row = mysqli_fetch_assoc($result_query)) {
                                echo "<option class='text'>" . $row['genre'] . "</option>";
                            }
                            mysqli_close($db_link);
                        ?>
                        </select>
                        <input type="hidden" name="formIdentifier" value="Genra">
                    </form>
                </div>
            </div>
            <div class="price-range">
                <h1>Price Range</h1>
                <div class="flex-container-space-between">
                    <form action="BrowseProducts.php" method="POST" id="PriceRange" class="flex-container-column" onsubmit="return validateForm()">
                    <div>
                        <?php
                        if (!is_numeric($FromOption)) {
                            echo "<input class='price-text-area' placeholder='From' type='number' name='From' >";
                        }else{
                            echo "<input class='price-text-area' placeholder='$FromOption' type='number' name='From' >";
                        }
                        if (!is_numeric($ToOption)) {
                            echo "<input class='price-text-area' placeholder='To' type='number' name='To' >";
                        }else{
                            echo "<input class='price-text-area' placeholder='$ToOption' type='number' name='To' >";
                        }
                        if (is_numeric($FromOption) && !is_numeric($ToOption)) {
                            $PriceRange_query = "AND `price` >= '$FromOption'";
                        }elseif (!is_numeric($FromOption) && is_numeric($ToOption)) {
                            $PriceRange_query = "AND `price` <= '$ToOption'";
                        }elseif (is_numeric($FromOption) && is_numeric($ToOption)) {
                            $PriceRange_query = "AND `price` BETWEEN '$FromOption' AND '$ToOption'";
                        }elseif (!is_numeric($FromOption) && !is_numeric($ToOption)){
                            $PriceRange_query = "";
                        }

                        ?>
                    </div>
                    <div>
                        <input type="submit" class="submit-button" value="submit" onclick="validateRange()">
                        <input type="hidden" name="formIdentifier" value="PriceRange">
                    </div>
                    </form>
                </div>
            </div>
            <div class="">
                <h1>Platform</h1>
                <form action="BrowseProducts.php" method="POST" id="Platform">
                <?php
                $sql_name = "root";
                $sql_pass = "";
                $db_link = mysqli_connect("localhost:3306",$sql_name, $sql_pass);
                mysqli_select_db($db_link,"games4less");
                $select_query = "SELECT DISTINCT `platform` FROM `product`";
                $result_query = mysqli_query($db_link, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    if (!empty($platformOptions) && in_array($row['platform'], $platformOptions)) {
                        if ($row["platform"] != "") {
                            echo "<div class='flex-container'>
                            <div class='flex-item'>
                            <div class='checkbox-label'>
                                <input type='checkbox' name='platform[]' value='" . $row['platform'] . "' id='checkbox1' checked >
                                <label class='checkbox_label'>" . $row['platform'] . "</label>
                            </div>";
                        }
                    }else{
                        if ($row["platform"] != "") {
                            echo "<div class='flex-container'>
                            <div class='flex-item'>
                            <div class='checkbox-label'>
                                <input type='checkbox' name='platform[]' value='" . $row['platform'] . "' id='checkbox1'>
                                <label class='checkbox_label'>" . $row['platform'] . "</label>
                            </div>";
                        }
                    }
                }
                mysqli_close($db_link);
                if (isset($platformOptions) && is_array($platformOptions)) {
                    if (count($platformOptions) == 1) {
                        $platform_query ="AND `platform` = '$platformOptions[0]'";
                    }else if (count($platformOptions) > 1) {
                        $platform_query = "AND `platform` IN ('" . implode("','", $platformOptions) . "')";
                    }
                }else{
                    $platform_query = "";
                }
                
                ?>
                <input type="submit" class="submit-button" value="submit" >
                <input type="hidden" name="formIdentifier" value="Platform">        
                </form>

                <!-- <div class='flex-container'>
                    <div class='flex-item'>
                      <div class='checkbox-label'>
                        <input type='checkbox' id='checkbox1'>
                        <label for='checkbox1'>PC</label>
                      </div> -->
            </div>
            <div class="">
                <h1>Type</h1>
                <div class="flex-container">
                    <form action="BrowseProducts.php" method="POST" id="Type">
                    <?php
                    $sql_name = "root";
                    $sql_pass = "";
                    $db_link = mysqli_connect("localhost:3306",$sql_name, $sql_pass);
                    mysqli_select_db($db_link,"games4less");
                    $select_query = "SELECT DISTINCT `type_of_product` FROM `product`";
                    $result_query = mysqli_query($db_link, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        if (!empty($typeOptions) && in_array($row['type_of_product'], $typeOptions)) {
                            if ($row["type_of_product"] != "") {
                                echo "<div class='flex-container'>
                                <div class='flex-item'>
                                <div class='checkbox-label'>
                                    <input type='checkbox' name='Type[]' value='" . $row['type_of_product'] . "' id='checkbox2' checked >
                                    <label class='checkbox_label'>" . $row['type_of_product'] . "</label>
                                </div>";
                            }
                        }else{
                            if ($row["type_of_product"] != "") {
                                echo "<div class='flex-container'>
                                <div class='flex-item'>
                                <div class='checkbox-label'>
                                    <input type='checkbox' name='Type[]' value='" . $row['type_of_product'] . "' id='checkbox2'>
                                    <label class='checkbox_label'>" . $row['type_of_product'] . "</label>
                                </div>";
                            }
                        }
                    }
                    mysqli_close($db_link);
                    if (isset($typeOptions) && is_array($typeOptions)) {
                        if (count($typeOptions) == 1) {
                            $type_query ="AND `type_of_product` = '$typeOptions[0]'";
                        }else if (count($typeOptions) > 1) {
                            $type_query = "AND `type_of_product` IN ('" . implode("','", $typeOptions) . "')";
                        }
                    }else{
                        $type_query = "";
                    }
                    ?>
                    <input type="submit" class="submit-button" value="submit" >
                    <input type="hidden" name="formIdentifier" value="Type">
                    </form>   
                    <!-- <div class="flex-item">
                      <div class="checkbox-label">
                        <input type="checkbox" id="checkbox1">
                        <label for="checkbox1">Key</label>
                      </div>
                    </div> -->
                  </div>
            </div>
            <div class="">
                <h1>Region</h1>
                <div class="flex-container">
                    <form action="BrowseProducts.php" method="POST" id="Region">
                    <?php
                    $sql_name = "root";
                    $sql_pass = "";
                    $db_link = mysqli_connect("localhost:3306",$sql_name, $sql_pass);
                    mysqli_select_db($db_link,"games4less");
                    $select_query = "SELECT DISTINCT `region` FROM `product`";
                    $result_query = mysqli_query($db_link, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        if (!empty($regionOptions) && in_array($row['region'], $regionOptions)) {
                            if ($row["region"] != "") {
                                echo "<div class='flex-container'>
                                <div class='flex-item'>
                                <div class='checkbox-label'>
                                    <input type='checkbox' name='Region[]' value='" . $row['region'] . "' id='checkbox3' checked >
                                    <label class='checkbox_label'>" . $row['region'] . "</label>
                                </div>";
                            }
                        }else{
                            if ($row["region"] != "") {
                                echo "<div class='flex-container'>
                                <div class='flex-item'>
                                <div class='checkbox-label'>
                                    <input type='checkbox' name='Region[]' value='" . $row['region'] . "' id='checkbox3'>
                                    <label class='checkbox_label'>" . $row['region'] . "</label>
                                </div>";
                            }
                        }
                    }
                    mysqli_close($db_link);
                    if (isset($regionOptions) && is_array($regionOptions)) {
                        if (count($regionOptions) == 1) {
                            $region_query ="AND `region` = '$regionOptions[0]'";
                        }else if (count($regionOptions) > 1) {
                            $region_query = "AND `region` IN ('" . implode("','", $regionOptions) . "')";
                        }
                    }else{
                        $region_query = "";
                    }
                    ?>
                    <input type="submit" class="submit-button" value="submit" >
                    <input type="hidden" name="formIdentifier" value="Region">
                    </form>   
                    <!-- <div class="flex-item">
                      <div class="checkbox-label">
                        <input type="checkbox" id="checkbox1">
                        <label for="checkbox1">Global</label>
                      </div>
                    </div> -->
                  </div>
            </div>
        </section>
        
        <section class="default text content ">
            <ul class="" id="layoutcards">
                <?php
                $sql_name = "root";
                $sql_pass = "";
                $db_link = mysqli_connect("localhost:3306",$sql_name, $sql_pass);
                mysqli_select_db($db_link,"games4less");
                //query for selecting data
                $genra_query = ($genraOption == "All") ? null : "AND `genre` = '$genraOption'";
                //query ends
                $lower_limit = abs($page-1) * 8;
                if (isset($search_query) && !empty($search_query)) {
                    $select_query = $search_query;
                }else {
                    $select_query = "SELECT * FROM `product` WHERE 1=1 $genra_query $platform_query $type_query $region_query $PriceRange_query $sort_query LIMIT $lower_limit, 8";
                }
                $result_query = mysqli_query($db_link, $select_query);
                while ($row = mysqli_fetch_array($result_query)) {
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


                    if (file_exists('./games_images/' . $image_url_1 . '.avif')){
                        $imagePath = './games_images/' . $image_url_1 . '.avif';
                    }elseif (file_exists('./games_images/' . $image_url_1 . '.jpg')){
                        $imagePath = './games_images/' . $image_url_1 . '.jpg';
                    }elseif (file_exists('./games_images/' . $image_url_1 . '.png')){
                        $imagePath = './games_images/' . $image_url_1 . '.png';
                    }else{
                        $imagePath ="https://placehold.co/600x400/png";
                    }

                    echo "
                        <li class=''>
                            <a href='ProductPages.php?id=$product_id' class='product-link round-border'>
                                <img class='product-image' src='$imagePath' alt='$title'>
                                <div class='product-info'>
                                    <h1 class='product-name text'>$title</h1>
                                    <div class='product-details text'>
                                        <h2>Platform: $platform</h2>
                                        <h2>Version: $region</h2>
                                        <h2>Type: $type_of_product</h2>
                                        <h2>Release date: $release_date</h2>
                                    </div>
                                </div>
                                <h1 class='product-price text'>$$price</h1>
                            </a>
                        </li>
                        ";
                }
                mysqli_close($db_link);
                ?> 
            </ul>
            <ul class="flex-container-row-wrap HideLayout" id="layoutgrid">
                <?php
                    $sql_name = "root";
                    $sql_pass = "";
                    $db_link = mysqli_connect("localhost:3306",$sql_name, $sql_pass);
                    mysqli_select_db($db_link,"games4less");
                    $lower_limit = ($page - 1) * 16;
                    if (isset($search_query) && !empty($search_query)) {
                        $select_query = $search_query;
                    }
                    else {
                        $select_query = "SELECT * FROM `product` WHERE 1=1 $genra_query $platform_query $type_query $region_query $PriceRange_query $sort_query LIMIT $lower_limit, 16";
                    }
                    $result_query = mysqli_query($db_link, $select_query);
                    $url = "ProductPages.php";
                    while ($row = mysqli_fetch_array($result_query)) {
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

                        if (file_exists('./games_images/' . $image_url_1 . '.avif')){
                            $imagePath = './games_images/' . $image_url_1 . '.avif';
                        }elseif (file_exists('./games_images/' . $image_url_1 . '.jpg')){
                            $imagePath = './games_images/' . $image_url_1 . '.jpg';
                        }elseif (file_exists('./games_images/' . $image_url_1 . '.png')){
                            $imagePath = './games_images/' . $image_url_1 . '.png';
                        }elseif (file_exists('./games_images/' . $image_url_1)){
                            $imagePath = './games_images/' . $image_url_1;
                        }else{
                            $imagePath ="https://placehold.co/600x400/png";
                        }
                        
                        
                        echo "
                            <li class='' onclick=\"sendGetRequest('$url', '$product_id')\">
                            <div class='card' style=''>
                                <div class='icon'>
                                    <h3>$title</h3>
                                    <img class='secondary-image round-border image-fix' src='$imagePath' alt='$title'></img>
                                </div>
                                <div class='product-details text'>
                                    <h2>Platform:$platform </h2>
                                    <h2> Version:$region </h2>
                                    <h2> Type:$type_of_product </h2>
                                    <h2> Release date:$release_date</h2>
                                </div>
                                <h1 class='product-price text'>$$price</h1>
                            </div>
                        </li>
                            ";
                    }
                    mysqli_close($db_link);
                ?>
            </ul>
        </section>
    </section>
    <section>
        <div class="pagination">
            <?php 
            $save_url = $_SERVER["REQUEST_URI"];
            if (substr_count($_SERVER["REQUEST_URI"],"?")) {
                if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
                    ?> <a href="<?php echo $save_url?>&page-nr=<?php echo $_GET['page-nr'] - 1 ?>" class="pagination-item">Previous</a> <?php
                }else{
                    ?> <a class="pagination-item" >Previous</a>	<?php
                }
            }else{
                if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
                    ?> <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>" class="pagination-item">Previous</a> <?php
                }else{
                    ?> <a class="pagination-item" >Previous</a>	<?php
                }
            }
            
            ?>
            <?php 
            if (substr_count($_SERVER["REQUEST_URI"],"?")) {
                if(isset($_GET['page-nr'])){
                    if($_GET['page-nr'] >= 100){
                        ?> <a class="pagination-item" >Next</a> <?php
                    }else{
                        ?> <a href="<?php echo $save_url?>&page-nr=<?php echo $_GET['page-nr'] + 1 ?>" class="pagination-item">Next</a> <?php
                    }
                }else{
                    ?> <a href="<?php echo $save_url?>&page-nr=2">Next</a> <?php
                }
            }else{
                if(isset($_GET['page-nr'])){
                    if($_GET['page-nr'] >= 100){
                        ?> <a class="pagination-item" >Next</a> <?php
                    }else{
                        ?> <a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>" class="pagination-item">Next</a> <?php
                    }
                }else{
                    ?> <a href="?page-nr=2">Next</a> <?php
                }
            }
            
            ?>
            
        </div>
    </section>
    <hr class="horizontal-divider">
    <?php include 'footer.php'; ?>
    
</body>
</html>