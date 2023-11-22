<?php

    // We define the variables for the connection to the database.
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "mydb"; 

    // We create the connection to the database using the mysqli class.
    $conn = new mysqli($servername, $username, $password, $database);
?>  