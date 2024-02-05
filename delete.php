<?php 
    include("conexion_db.php");

    // Verifica si se ha pasado un parámetro 'id' a través de la URL.
    if (isset($_GET['id'])) {
        // Captura el valor del parámetro 'id' en la variable $id
        $id = $_GET['id'];

        // Construye una consulta SQL para eliminar una fila en la tabla 'my_table' donde 'id' coincida con $id.
        $query = "DELETE FROM my_table WHERE id = $id";

        // Ejecuta la consulta SQL en la conexión a la base de datos y almacena el resultado en $result.
        $result = mysqli_query($conn, $query); 

        if ($result) {
            // Redirige al usuario al índice después de la eliminación.
            header("Location: user_dashboard.php");
            exit(); // Asegura que el script se detenga después de la redirección.
        } else {
            die("Query Failed.");
        }
    }
?>
