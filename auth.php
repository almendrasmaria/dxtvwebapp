<?php
    session_start();

    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit();
    }
    // The user is authenticated, can access the page
?>