<?php

  include 'conexion_db.php';
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Consulta SQL para verificar las credenciales del usuario.
    $query = "SELECT * FROM users_table WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    // Verifica si se encontró un usuario con las credenciales proporcionadas.
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $_SESSION['id'] = $row['id'];
      $_SESSION['type_user'] = $row['type_user'];

      // Redirige según el tipo de usuario
      header("Location: user_dashboard.php");

    } else {
      // Si no se encuentra un usuario con las credenciales, establece un mensaje de error.
      $error = "Nombre de usuario o contraseña incorrectos.";
    }
  }

  include ("include/header.php") 
?>


<!-- Contenedor principal -->
<div class="container w-75">
  <div class="row">
    <!-- Tarjeta de inicio de sesión -->
    <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
      <!-- Imagen izquierda (visible en pantallas medianas y más grandes) -->
      <div class="img-left d-none d-md-flex"></div>
      <!-- Contenido de la tarjeta -->
      <div class="card-body my-4">
        <!-- Título -->
        <h4 class="title text-center mt-4">
          INICIAR SESIÓN
        </h4>
        <!-- Formulario de inicio de sesión -->
        <form class="form-box px-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <!-- Campos de entrada y botón de envío -->
          <div class="form-input">
            <span><i class="fa-solid fa-user"></i></span>
            <input type="username" name="username" class="form-control" placeholder="Nombre de Usuario" tabindex="10"
              required autofocus>
          </div>
          <div class="form-input">
            <span><i class="fa fa-key"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
          </div>
          <div class="mb-3">
            <input type="submit" value="Acceder" name="login-button"
              class="btn btn-outline-primary login-button">
          </div>
        </form>
        <?php
        if (isset($error)) {
          echo "<div class='alert alert-danger'> Acceso Denegado </div>";
        } ?>
      </div>
    </div>  
  </div>
</div>

<?php include ("include/footer.php") ?> 