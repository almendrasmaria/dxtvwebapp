<?php

    // Incluye el archivo de conexión a la base de datos. 
    include("conexion_db.php");

    // Verifica si se ha enviado una solicitud POST con el nombre "create".
    if (isset($_POST['create'])) {

        // Si se ha enviado la solicitud, obtiene los datos del formulario.
        if (isset($_POST['create'])) {
            $view = $_POST['view'];
            $name = $_POST['name'];
            $hashtag = $_POST['hashtag'];
            
            // Crea una consulta SQL para insertar los datos en la tabla "my_table".
            $query = "INSERT INTO my_table(view, name, hashtag) VALUES ('$view','$name', '$hashtag')";
            // Ejecuta la consulta SQL en la base de datos.
            $result = mysqli_query($conn, $query);
            
            // Verifica si la consulta SQL se ejecutó con éxito.
            if(!$result) {
            // Si la consulta falla, muestra un mensaje de error y termina el script.
            die("Query Failed.");
            }

            // Redirige al usuario de vuelta a la tabla de inicio.
            header('Location: user_dashboard.php');
        }
    }

    include ("auth.php"); 
    include ("include/header.php") 
?> 

    <div class="container p-4">
        <div class="row">
            <div class= "col-md-4 mx-auto"> <!-- md-4 -->
                <div class="card card-body">
                    <!-- Envía datos al script "create.php" con el método POST -->
                    <form action="create.php" method = "POST">  
                        <!-- Campo "View" --> 
                        <div class="form-group mb-3">
                            <input type="text" name="view" class="form-control" placeholder= "Categoria" autofocus>
                        </div>
                        <!-- Campo "Name" -->
                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder= "Nombre">
                        </div>
                        <!-- Campo "Hashtag" -->
                        <div class="form-group mb-3">
                            <input type="text" name="hashtag" class="form-control" placeholder= "Hashtag">
                        </div>
                        <!-- Boton -->
                        <button type="submit" class="btn btn-outline-primary  btn-md mr-2" name= "create">Agregar</button>
                        <!-- Boton "volver"-->
                        <a href="user_dashboard.php" class="btn btn-outline-primary  btn-md mr-2" >Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include ("include/footer.php") ?> 
