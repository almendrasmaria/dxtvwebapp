<?php
    // Inicia o reanuda la sesión.
    session_start();

    // Verifica si no está establecida la variable de sesión "id" o la variable de sesión "type_user".
    if (!isset($_SESSION["id"]) || !isset($_SESSION['type_user'])) {
        // Si no se cumplen las condiciones anteriores, redirige al usuario a la página de inicio de sesión.
        header("Location: login.php");
        // Finaliza la ejecución del script para evitar que el código siguiente se ejecute.
        exit();
    }
?>
