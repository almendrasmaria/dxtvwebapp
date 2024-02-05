<?php

    $servername = "localhost"; // Nombre del servidor de la base de datos. 
    $username = "root"; // Nombre de usuario de la base de datos. 
    $password = ""; // Contraseña de la base de datos. Dejar en blanco si no hay contraseña configurada.
    $database = "dxtvdb"; // Nombre de la base de datos a la que te estás conectando.

    // Creamos la conexión a la base de datos utilizando la clase mysqli.
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificamos si hay errores en la conexión.
    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }
?>
