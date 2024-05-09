<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="Home-Page-styles.css">
    <?php include 'head.php'; ?>
</head>


<?php include 'header.php'; ?>
<nav class="navigation navbar">
        <a href="Browse products.html">Browse</a> 
        <a href="#Categories">Categories</a>
        <a href="#footer">Contact</a>  
        </nav>
</header>

<hr class="horizontal-divider">

<body class="flex-container-column background-color">

    <?php include 'navbar.php'; ?>
    

    <section class="Latest-offers" style="width:1100px; height: 400;">
        <h1 class="title">Latest offers</h1>

        <section class="container">
            <div class="slider-wrapper">
                <div class="slider">
                    <img id="slide-1" src="images/super-weekend-discount-sale-promo-special-ad-design-template-8534c64327a8a8a2a5e7ad15f12a340b_screen.jpg" alt="3D rendering of an imaginary orange planet in space" />
                    <img id="slide-2" src="images/eid-mega-sale-facebook-cover-video-design-template-b6102fd2ef7acd2ff3b67a20a6d55911_screen.jpg" alt="3D rendering of an imaginary green planet in space" />
                    <img id="slide-3" src="images/eid-retail.jpg" alt="3D rendering of an imaginary blue planet in space" />
                </div>
                <div class="slider-nav">
                    <a href="#slide-1"></a>
                    <a href="#slide-2"></a>
                    <a href="#slide-3"></a>
                </div>
            </div>
        </section>
    </section>

    <hr class="horizontal-divider">


   
    <section class="default flex-container-row text">
        
        <section class="cards" id="services" > 
            <h2 class="title">Bestsellers</h2>

            <div class="content">

                <div class="card" >
                    <div class="icon">
                        <h3>Game Title</h3>
                        <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                    </div>
                    <div class="info">
                        <p>description...............</p>
                    </div>
                </div>

                <div class="card" >
                    <div class="icon">
                        <h3>Game Title</h3>
                        <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                    </div>
                    <div class="info">
                        <p>description...............</p>
                    </div>
                </div>

                <div class="card" >
                    <div class="icon">
                        <h3>Game Title</h3>
                        <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                    </div>
                    <div class="info">
                        <p>description...............</p>
                    </div>
                </div>
                
            </div>

            <a href="#projects" class="main-btn">More</a>
        
        </section>
    </section>
<br><br>
    <section class="default flex-container-row text">
        
        <section class="cards" id="services" > 
            <h2 class="title">Random Games</h2>

            <div class="content">

                <div class="card" >
                    <div class="icon">
                        <h3>Game Title</h3>
                        <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                    </div>
                    <div class="info">
                        <p>description...............</p>
                    </div>
                </div>

                <div class="card" >
                    <div class="icon">
                        <h3>Game Title</h3>
                        <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                    </div>
                    <div class="info">
                        <p>description...............</p>
                    </div>
                </div>

                <div class="card" >
                    <div class="icon">
                        <h3>Game Title</h3>
                        <a href=""><img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image" style="margin-top: 8%; margin-bottom: 8%;"></img></a>
                    </div>
                    <div class="info">
                        <p>description...............</p>
                    </div>
                </div>
                
            </div>

            <a href="#projects" class="main-btn">More</a>
        
        </section>
    </section>

    <hr class="horizontal-divider" id="Categories">
    
    <section class="default flex-container-row text">
    
    <section class="Categories-box">
        <section>       
         <h2 class="title">Categories</h2>
        <img class="main-image round-border" src="https://placehold.co/600x400/png" alt="main image"></img>
        </section>

        <div class="secondary-images">
            <img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image"></img>
            <img class="secondary-image round-border" src="https://placehold.co/600x400/png" alt="secondary image"></img>
        </div>
    </section>
</section>
</body>

<hr class="horizontal-divider">

<?php include 'footer.php'; ?>

</html>
