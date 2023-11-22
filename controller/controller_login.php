<?php
    
    include("conexion_db.php");

    if (isset($_POST["login-button"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        // Consultar la base de datos
        $query = "SELECT * FROM users_table WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                session_start();
                $_SESSION["user_id"] = $row["id"];        
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'> Acceso denegado </div>";
            }
            mysqli_free_result($result);
        } else {
            $error_message = "Error en la consulta: " . mysqli_error($conn);
        }
    }

?>