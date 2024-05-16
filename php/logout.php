<?php
session_start();

if (isset($_POST['logout'])) {

    session_unset();
    session_destroy();

    echo "<script>window.location.href = 'home.php';</script>";
    exit();
}
?>