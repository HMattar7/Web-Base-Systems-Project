<?php
// Start the session
session_start();
?>

<header class="default header">

        <section class="head flex-container-space-between">
            <section class="header-icons">
                <a href="profile-overview.php" class="box round-border header-icons svg-contaior">
                    <img class="svg-image" src="images/circle.svg" alt="circle">
                    <img class="svg-image-overlay" src="images/person.svg" alt="person">
                </a>

            </section>
            <section class="header-icons">
                <div class="box round-border header-icons">
                    <a href="settings" class="text lungs-currencies">AR/SR</a>
                </div>
                
            </section>
            <section class="header-icons">
                <a href="cart.php" class="box round-border header-icons svg-contaior">
                    <img class="svg-image" src="images/circle.svg" alt="circle">
                    <img class="svg-image-overlay" src="images/cart.svg" alt="cart">
                </a>
                
            </section>
        <div class="vertical-divider"></div>
        <a href="home.php" style="text-decoration: none;" class="site-logo">
            <img src="images/Logo.svg" alt="Logo">
            <h1 class="text">Games4Less</h1>

        </a>
        <div class="vertical-divider"></div>
        <section class="search-bar header-icons">
            <form class="flex-container-space-between" method="post"action="BrowseProducts.php" id="search-form">        
                <input class="search-bar" name="search-value" type="search" placeholder="Search" autocomplete="on">
                <button class="default search-button" type="submit">
                    <img class="button-image" src="images/search-icon.svg" alt="search button icon">
                </button>
                <input type="hidden" name="formIdentifier" value="search-form">
            </form>
        </section>
        </section>
    