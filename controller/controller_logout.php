<?php 

    session_start(); 
    session_destroy(); 

    // Redirigir al usuario a la página de inicio de sesión
    header("location: ../login.php");
    exit();

?>