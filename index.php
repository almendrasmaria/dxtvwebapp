<?php
    include "auth.php"; 
    include("conexion_db.php"); 
    include("include/header.php"); 
?>

<?php include("conexion_db.php") ?>

<?php include("include/header.php") ?>


    <nav class="navbar fixed-top bg-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand" > 
                <img src="images/deportvlogo.png" alt="Logo" width="130" height="auto">
            </a>
            <a href="controller/controller_logout.php" class="btn btn-outline-primary logout-button" > Cerrar sesión 
                <i class="bi bi-box-arrow-right"></i>
            </a>
        </div>
    </nav>

    <div class="container p-4 container-table">
        <div class="row custom-row">
            <div class="col-md-6">
                <a href="create.php" class="btn btn-outline-primary mb-3 ">Crear Nuevo
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
            <div class="col-md-6">
                <form class="d-flex aling-items-center mb-3" method="POST">
                    <!-- Campo de búsqueda -->
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar" name="view"
                        id="view" />
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
            <div class= "col-md-12 custom-table" > 
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-fixed">
                                <tr>
                                    <th>Categoria</th>
                                    <th>Nombre</th>
                                    <th>Hashtags</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                                try {
                                    $search = ''; 

                                    /* If the $_SERVER is equal to POST, the value is saved in the initialized variable
                                    previously and if not the empty value is passed to the query */
                                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $search = $_POST["view"]; 
                                    }
                                    // Prepare the SQL query to search for data that matches the search term 
                                    $query = "SELECT * FROM my_table WHERE view LIKE '%$search%'"; 
                                    $result = mysqli_query($conn, $query); 

                                    while($row = mysqli_fetch_array($result)) {
                                        echo "<tr>
                                                <td>" . $row['view'] . "</td>
                                                <td>" . $row['name'] . "</td>
                                                <td>" . $row['hashtag'] . "</td>
                                                <td>" . $row['created_at'] . "</td>
                                                <td>
                                                    <!-- Enlace para actualizar/editar un registro -->
                                                    <a href='update.php?id= " . $row['id'] . "' class='btn btn-outline-secondary'>
                                                        <i class='fa-regular fa-pen-to-square'></i> <!-- Icono de lápiz para editar-->
                                                    </a>
                                                    <!-- Enlace para eliminar un registro -->
                                                    <a href='delete.php?id= " . $row['id'] . "' class='btn btn-outline-danger'>
                                                        <i class='far fa-trash-alt'></i> <!-- Icono de papelera para eliminar -->
                                                    </a>
                                                </td>
                                            </tr>";
                                    }
                                } catch (Exception $e) {
                                    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php include("include/footer.php") ?>

