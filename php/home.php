<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="Home-Page-styles.css">
    <?php include 'head.php'; ?>
</head>

<body class="flex-container-column background-color">

    <?php include 'header.php'; ?>

    <hr class="horizontal-divider">

    <?php include 'navbar.php'; ?>

    <section class="Latest-offers" style="width:1100px; height: 400;">
        <h1 class="title">Latest offers</h1>
        <section class="container">
            <div class="slider-wrapper">
                <div class="slider" id="latest-offers-slider">
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
        <section class="cards" id="services">
            <h2 class="title">Bestsellers</h2>
            <div class="content">
                <!-- PHP code for fetching and displaying bestsellers -->
                <?php
                // Database connection parameters
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "games4less";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // SQL query to fetch first 3 game titles and descriptions (for bestsellers)
                $sql = "SELECT title, paragraph FROM product LIMIT 3"; // Assuming your table name is "games_table"
                $result = $conn->query($sql);

                // Check if there are rows in the result
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='card'>";
                        echo "<div class='icon'>";
                        echo "<h3>" . $row["title"] . "</h3>";
                        echo "<a href=''><img class='secondary-image round-border' src='https://placehold.co/600x400/png' alt='secondary image'></a>";
                        echo "</div>";
                        echo "<div class='info'>";
                        echo "<p>" . $row["paragraph"] . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "No games found";
                }

                $conn->close();
                ?>
            </div>
            <a href="#projects" class="main-btn">More</a>
        </section>
    </section>

    <hr class="horizontal-divider" id="Categories">



    <section class="default flex-container-row text">
        <section class="cards" id="random-games">
            <h2 class="title">Random Games</h2>
            <div class="content">
                <!-- PHP code for fetching and displaying random games -->
                <?php
                // Create connection (assuming same database connection parameters)
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // SQL query to fetch 3 random game titles and descriptions
                $sql = "SELECT title, paragraph FROM product ORDER BY RAND() LIMIT 3"; // Assuming your table name is "games_table"
                $result = $conn->query($sql);

                // Check if there are rows in the result
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='card'>";
                        echo "<div class='icon'>";
                        echo "<h3>" . $row["title"] . "</h3>";
                        echo "<a href=''><img class='secondary-image round-border' src='https://placehold.co/600x400/png' alt='secondary image'></a>";
                        echo "</div>";
                        echo "<div class='info'>";
                        echo "<p>" . $row["paragraph"] . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "No games found";
                }

                $conn->close();
                ?>
            </div>
            <a href="#projects" class="main-btn">More</a>
        </section>
    </section>

    <hr class="horizontal-divider">

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
    <hr class="horizontal-divider">
    <?php include 'footer.php'; ?>

    <script>
        // Function to initialize the slider
        function initializeSlider() {
            const slides = document.querySelectorAll('#latest-offers-slider img'); // Select all slide images
            let currentSlide = 0; // Initialize current slide index

            // Function to show a specific slide
            function showSlide(index) {
                slides.forEach((slide) => {
                    slide.style.display = 'none'; // Hide all slides
                });
                slides[index].style.display = 'block'; // Show the selected slide
            }

            // Function to switch to the next slide
            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length; // Increment current slide index
                showSlide(currentSlide); // Show the next slide
            }

            // Automatically switch to the next slide every 3 seconds (adjust as needed)
            setInterval(nextSlide, 3000);

            // Show the initial slide
            showSlide(currentSlide);
        }

        // Call the initializeSlider function when the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', initializeSlider);
    </script>

</body>

</html>
