<?php 

    include("conexion_db.php");

    // Verificar si se ha proporcionado un ID en la URL
    if(isset($_GET['id'])) {
         // Obtener el ID de la URL
        $id = $_GET['id']; 

         // Consultar la base de datos para obtener la entrada correspondiente al ID
        $query = "SELECT * FROM my_table WHERE id= $id";
        $results = mysqli_query($conn, $query); 

         // Verificar si se encontró una sola fila en los resultados
        if(mysqli_num_rows($results) == 1) {
            $new_page = mysqli_fetch_array($results); 
            $view = $new_page['view'];
            $name = $new_page['name']; 
            $hashtag = $new_page['hashtag'];
        }
    }
    // Verificar si se ha enviado el formulario de actualización
    if (isset($_POST['update'])) {
        // Obtener el ID de la URL nuevamente
        $id = $_GET['id'];

        // Obtener los datos del formulario
        $view= $_POST['view'];
        $name = $_POST['name'];
        $hashtag = $_POST['hashtag'];

        // Actualizar la entrada en la base de datos utilizando una consulta SQL
        $query = "UPDATE my_table set view = '$view', name = '$name', hashtag = '$hashtag' WHERE id=$id";
        mysqli_query($conn, $query);

        header('Location: user_dashboard.php');
    }
    
?> 

<?php 
    include ("auth.php"); // Comprobación de autenticación
    include ("include/header.php");
?> 

    <div class = "container p-4">
        <div class= "row">
            <div class= "col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="update_user.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group mb-3">
                            <input type="text" name="view" value="<?php echo $view; ?>" 
                            class= "form-control" placeholder="Update View" readonly >
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="name" value="<?php echo $name; ?>" 
                            class= "form-control" placeholder="Update Name">
                        </div>
                        <div class="form-group mb-3">
                        <input type="text" name="hashtag" value="<?php echo $hashtag; ?>" 
                            class= "form-control" placeholder="Update Hashtag">
                        </div>
                        <button class="btn btn-outline-primary" name = "update"> Actualizar</button>
                        <a href="user_dashboard.php" class="btn btn-outline-primary">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include ("include/footer.php") ?> 