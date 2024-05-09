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
    </header>

    <hr class="horizontal-divider">
    <?php include 'navbar.php'; ?>
    <section class="content-area">
        
        <section class=" text side-panel flex-container-column">
            <div class="page-name">
                <h1 class="page-name">page name</h1>
            </div>
            <div class="flex-container-row allinments" >
                <img src="images/hamburger-svgrepo-com.svg" id="cardslayout" onclick="ProductLayout(this)" alt="cards" width="32" height="32">
                <img src="images/grid-svgrepo-com.svg" id="gridlayout" onclick="ProductLayout(this)" alt="grid" width="32" height="32">
            </div>
            <div class="select-option">
              <h1>Sort By</h1>
                <div class="flex-container-column">
                  <select name="Sort By">
                    <option class="text" selected>Best Match</option>
                    <option class="text">Release Date</option>
                    <option class="text">Lowest Price</option>
                    <option class="text">Highest Price</option>
                </select>
                </div>
                
            </label>
            </div>
            <div class="">
                <h1>Genra</h1>
                <div class="flex-container-column">
                    <div class="flex-container-space-between">
                        <button class="text-button text">
                            FPS
                        </button>
                        <label>999</label>
                    </div>
                    <div class="flex-container-space-between">
                        <button class="text-button text">
                            Action
                        </button>
                        <label>999</label>
                    </div>
                    <div class="flex-container-space-between">
                        <button class="text-button text">
                            RPG
                        </button>
                        <label>999</label>
                    </div>
                    <div class="flex-container-space-between">
                        <button class="text-button text">
                            Open-Word
                        </button>
                        <label>999</label>
                    </div>
                </div>
            </div>
            <div class="price-range">
                <h1>Price Range</h1>
                <div class="flex-container-space-between">
                    <input class="price-text-area" placeholder="From" type="text">
                    <input class="price-text-area" placeholder="To" type="text">
                </div>
            </div>
            <div class="">
                <h1>Platform</h1>
                <div class="flex-container">
                    <div class="flex-item">
                      <div class="checkbox-label">
                        <input type="checkbox" id="checkbox1">
                        <label for="checkbox1">PC</label>
                      </div>
                    </div>
                    <div class="flex-item">
                      <div class="checkbox-label">
                        <input type="checkbox" id="checkbox2">
                        <label for="checkbox2">Xbox</label>
                      </div>
                    </div>
                    <div class="flex-item">
                      <div class="checkbox-label">
                        <input type="checkbox" id="checkbox3">
                        <label for="checkbox3">Playstation</label>
                      </div>
                    </div>
                    <div class="flex-item">
                      <div class="checkbox-label">
                        <input type="checkbox" id="checkbox4">
                        <label for="checkbox4">Switch</label>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="">
                <h1>Type</h1>
                <div class="flex-container">
                    <div class="flex-item">
                      <div class="checkbox-label">
                        <input type="checkbox" id="checkbox1">
                        <label for="checkbox1">Key</label>
                      </div>
                    </div>
                    <div class="flex-item">
                      <div class="checkbox-label">
                        <input type="checkbox" id="checkbox2">
                        <label for="checkbox2">Account</label>
                      </div>
                    </div>
                    <div class="flex-item">
                      <div class="checkbox-label">
                        <input type="checkbox" id="checkbox3">
                        <label for="checkbox3">Gift</label>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="">
                <h1>Version</h1>
                <div class="flex-container">
                    <div class="flex-item">
                      <div class="checkbox-label">
                        <input type="checkbox" id="checkbox1">
                        <label for="checkbox1">Global</label>
                      </div>
                    </div>
                    <div class="flex-item">
                      <div class="checkbox-label">
                        <input type="checkbox" id="checkbox2">
                        <label for="checkbox2">Saudi Arabia</label>
                      </div>
                    </div>
                    <div class="flex-item">
                      <div class="checkbox-label">
                        <input type="checkbox" id="checkbox3">
                        <label for="checkbox3">Argentina</label>
                      </div>
                    </div>
                    <div class="flex-item">
                      <div class="checkbox-label">
                        <input type="checkbox" id="checkbox4">
                        <label for="checkbox4">USA</label>
                      </div>
                    </div>
                  </div>
            </div>
        </section>
        <section class="default text content ">
            <ul class="" id="layoutcards">
                <li class="">
                    <a href="placeholder" class="product-link round-border">
                        <img class="product-image" src="https://placehold.co/600x400/png" alt="Product image">
                        <div class="product-info">
                            <h1 class="product-name text">name</h1>
                        <div class="product-details text">
                            <h2>platform: </h2>
                            <h2>Version: </h2>
                            <h2>type: </h2>
                            <h2>Release date: </h2>
                        </div>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </a>
                </li>
                <li>
                    <a href="placeholder" class="product-link round-border">
                        <img class="product-image" src="https://placehold.co/600x400/png" alt="Product image">
                        <div class="product-info">
                            <h1 class="product-name text">name</h1>
                        <div class="product-details text">
                            <h2>platform: </h2>
                            <h2>Version: </h2>
                            <h2>type: </h2>
                            <h2>Release date: </h2>
                        </div>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </a>
                </li>
                <li>
                    <a href="placeholder" class="product-link round-border">
                        <img class="product-image" src="https://placehold.co/600x400/png" alt="Product image">
                        <div class="product-info">
                            <h1 class="product-name text">name</h1>
                        <div class="product-details text">
                            <h2>platform: </h2>
                            <h2>Version: </h2>
                            <h2>type: </h2>
                            <h2>Release date: </h2>
                        </div>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </a>
                </li>
                <li>
                    <a href="placeholder" class="product-link round-border">
                        <img class="product-image" src="https://placehold.co/600x400/png" alt="Product image">
                        <div class="product-info">
                            <h1 class="product-name text">name</h1>
                        <div class="product-details text">
                            <h2>platform: </h2>
                            <h2>Version: </h2>
                            <h2>type: </h2>
                            <h2>Release date: </h2>
                        </div>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </a>
                </li>
                <li>
                    <a href="placeholder" class="product-link round-border">
                        <img class="product-image" src="https://placehold.co/600x400/png" alt="Product image">
                        <div class="product-info">
                            <h1 class="product-name text">name</h1>
                        <div class="product-details text">
                            <h2>platform: </h2>
                            <h2>Version: </h2>
                            <h2>type: </h2>
                            <h2>Release date: </h2>
                        </div>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </a>
                </li>
                <li>
                    <a href="placeholder" class="product-link round-border">
                        <img class="product-image" src="https://placehold.co/600x400/png" alt="Product image">
                        <div class="product-info">
                            <h1 class="product-name text">name</h1>
                        <div class="product-details text">
                            <h2>platform: </h2>
                            <h2>Version: </h2>
                            <h2>type: </h2>
                            <h2>Release date: </h2>
                        </div>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </a>
                </li>
                <li>
                    <a href="placeholder" class="product-link round-border">
                        <img class="product-image" src="https://placehold.co/600x400/png" alt="Product image">
                        <div class="product-info">
                            <h1 class="product-name text">name</h1>
                        <div class="product-details text">
                            <h2>platform: </h2>
                            <h2>Version: </h2>
                            <h2>type: </h2>
                            <h2>Release date: </h2>
                        </div>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </a>
                </li>
            </ul>
            <ul class="flex-container-row-wrap HideLayout" id="layoutgrid">
                <li class="">
                    <div class="card" style="">
                        <div class="icon">
                            <h3>Game Title</h3>
                            <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                        </div>
                        <div class="product-details text flex-container-row-wrap">
                            <h2>platform- </h2>
                            <h2>Version- </h2>
                            <h2>type- </h2>
                            <h2>Release date </h2>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </div>
                </li>
                <li class="">
                    <div class="card" style="">
                        <div class="icon">
                            <h3>Game Title</h3>
                            <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                        </div>
                        <div class="product-details text flex-container-row-wrap">
                            <h2>platform- </h2>
                            <h2>Version- </h2>
                            <h2>type- </h2>
                            <h2>Release date </h2>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </div>
                </li>
                <li class="">
                    <div class="card" style="">
                        <div class="icon">
                            <h3>Game Title</h3>
                            <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                        </div>
                        <div class="product-details text flex-container-row-wrap">
                            <h2>platform- </h2>
                            <h2>Version- </h2>
                            <h2>type- </h2>
                            <h2>Release date </h2>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </div>
                </li>
                <li class="">
                    <div class="card" style="">
                        <div class="icon">
                            <h3>Game Title</h3>
                            <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                        </div>
                        <div class="product-details text flex-container-row-wrap">
                            <h2>platform- </h2>
                            <h2>Version- </h2>
                            <h2>type- </h2>
                            <h2>Release date </h2>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </div>
                </li>
                <li class="">
                    <div class="card" style="">
                        <div class="icon">
                            <h3>Game Title</h3>
                            <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                        </div>
                        <div class="product-details text flex-container-row-wrap">
                            <h2>platform- </h2>
                            <h2>Version- </h2>
                            <h2>type- </h2>
                            <h2>Release date </h2>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </div>
                </li>
                <li class="">
                    <div class="card" style="">
                        <div class="icon">
                            <h3>Game Title</h3>
                            <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                        </div>
                        <div class="product-details text flex-container-row-wrap">
                            <h2>platform- </h2>
                            <h2>Version- </h2>
                            <h2>type- </h2>
                            <h2>Release date </h2>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </div>
                </li>
                <li class="">
                    <div class="card" style="">
                        <div class="icon">
                            <h3>Game Title</h3>
                            <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                        </div>
                        <div class="product-details text flex-container-row-wrap">
                            <h2>platform- </h2>
                            <h2>Version- </h2>
                            <h2>type- </h2>
                            <h2>Release date </h2>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </div>
                </li>
                <li class="">
                    <div class="card" style="">
                        <div class="icon">
                            <h3>Game Title</h3>
                            <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                        </div>
                        <div class="product-details text flex-container-row-wrap">
                            <h2>platform- </h2>
                            <h2>Version- </h2>
                            <h2>type- </h2>
                            <h2>Release date </h2>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </div>
                </li>
                <li class="">
                    <div class="card" style="">
                        <div class="icon">
                            <h3>Game Title</h3>
                            <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                        </div>
                        <div class="product-details text flex-container-row-wrap">
                            <h2>platform- </h2>
                            <h2>Version- </h2>
                            <h2>type- </h2>
                            <h2>Release date </h2>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </div>
                </li>
                <li class="">
                    <div class="card" style="">
                        <div class="icon">
                            <h3>Game Title</h3>
                            <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                        </div>
                        <div class="product-details text flex-container-row-wrap">
                            <h2>platform- </h2>
                            <h2>Version- </h2>
                            <h2>type- </h2>
                            <h2>Release date </h2>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </div>
                </li>
                <li class="">
                    <div class="card" style="">
                        <div class="icon">
                            <h3>Game Title</h3>
                            <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                        </div>
                        <div class="product-details text flex-container-row-wrap">
                            <h2>platform- </h2>
                            <h2>Version- </h2>
                            <h2>type- </h2>
                            <h2>Release date </h2>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </div>
                </li>
                <li class="">
                    <div class="card" style="">
                        <div class="icon">
                            <h3>Game Title</h3>
                            <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                        </div>
                        <div class="product-details text flex-container-row-wrap">
                            <h2>platform- </h2>
                            <h2>Version- </h2>
                            <h2>type- </h2>
                            <h2>Release date </h2>
                        </div>
                        <h1 class="product-price text">$70.00</h1>
                    </div>
                </li>
            </ul>
        </section>
    </section>
    <hr class="horizontal-divider">
    <?php include 'footer.php'; ?>
    
</body>
</html>