<?php
include("conexion_db.php"); // Incluye el archivo de conexión a la base de datos
include("include/header.php"); // Incluye el archivo de encabezado de la página
include("auth.php"); // Verifica si el usuario está autenticado

// Comprueba el tipo de usuario
$is_admin = ($_SESSION['type_user'] == 'admin');
?>
<div class="container p-4 container-table">
  <div class="row custom-row">
    <div class="col-md-6">
      <!-- Botón para crear un nuevo dato -->
      <a href="create.php" class="btn btn-primary mb-3 ">Nuevo
        <i class="fa-solid fa-plus"></i>
      </a>
      <!-- Boton para descargar un archivo CSV-->
      <a href="export.php" class="btn btn-success btn-download mb-3">Exportar
        <i class="bi bi-file-spreadsheet"></i>
      </a>
      <!-- Boton para cerrar la sesion-->
      <a href="controller/controller_logout.php" class="btn btn-danger logout-button"> Salir
        <i class="bi bi-box-arrow-right"></i>
      </a>
    </div>
    <div class="col-md-6">
      <!-- Formulario de búsqueda -->
      <form class="d-flex aling-items-center mb-3" method="POST">
        <!-- Campo de búsqueda -->
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar" name="view" id="view" />
        <!-- Botón de búsqueda -->
        <button class="btn btn-outline-primary" type="submit">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>
    <div class="col-md-12 custom-table">
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
            if ($is_admin) {
              // Mostrar datos adicionales para usuarios administradores
              try {
                // Inicializamos la variable para que la query no tire error
                $search = '';

                /* Si el $_SERVER es igual a POST, se guarda el valor en la variable incializada 
                anteriormente y si no a la query se le pasa el valor vacio */
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $search = $_POST["view"];
                }
                // Prepara la consulta SQL para buscar datos que coincidan con el termino de búsqueda
                $query = "SELECT * FROM my_table WHERE view LIKE '%$search%'";

                // Ejecuta la consulta en la base de datos
                $result = mysqli_query($conn, $query);

                // Muestra los resultados de la busqueda
                while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>
                            <td>" . $row['view'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['hashtag'] . "</td>
                            <td>" . $row['created_at'] . "</td>
                            <td>
                                <!-- Enlace para actualizar/editar un registro -->
                                <a href='update_admin.php?id= " . $row['id'] . "' class='btn btn-outline-secondary'>
                                    <i class='fa-regular fa-pen-to-square'></i> <!-- Icono de lápiz para editar-->
                                </a>
                                <!-- Enlace para eliminar un registro -->
                                <a href='delete.php?id= " . $row['id'] . "' class='btn btn-outline-dark'>
                                    <i class='far fa-trash-alt'></i> <!-- Icono de papelera para eliminar -->
                                </a>
                            </td>
                          </tr>";
                }
              } catch (Exception $e) {
                // Capturamos y manejamos excepciones si ocurren
                echo 'Excepción capturada: ', $e->getMessage(), "\n";
              }
            } else {
              try {
                // Inicializamos la variable para que la query no tire error
                $search = '';

                /* Si el $_SERVER es igual a POST, se guarda el valor en la variable incializada 
                anteriormente y si no a la query se le pasa el valor vacio */
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $search = $_POST["view"];
                }
                // Prepara la consulta SQL para buscar datos que coincidan con el termino de búsqueda
                $query = "SELECT * FROM my_table WHERE view LIKE '%$search%'";

                // Ejecuta la consulta en la base de datos
                $result = mysqli_query($conn, $query);

                // Muestra los resultados de la busqueda
                while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>
                            <td>" . $row['view'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['hashtag'] . "</td>
                            <td>" . $row['created_at'] . "</td>
                            <td>
                                <!-- Enlace para actualizar/editar un registro -->
                                <a href='update_user.php?id= " . $row['id'] . "' class='btn btn-outline-secondary'>
                                    <i class='fa-regular fa-pen-to-square'></i> <!-- Icono de lápiz para editar-->
                                </a>
                            </td>
                          </tr>";
                }
              } catch (Exception $e) {
                // Capturamos y manejamos excepciones si ocurren
                echo 'Excepción capturada: ', $e->getMessage(), "\n";
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include("include/footer.php") ?>