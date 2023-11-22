<?php 

    include("conexion_db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id']; 
        $query = "SELECT * FROM my_table WHERE id= $id";
        $results = mysqli_query($conn, $query); 

        if(mysqli_num_rows($results) == 1) {
            $new_page = mysqli_fetch_array($results); 
            $view = $new_page['view'];
            $name = $new_page['name']; 
            $hashtag = $new_page['hashtag'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id']; 
        $view= $_POST['view'];
        $name = $_POST['name'];
        $hashtag = $_POST['hashtag'];
        $query = "UPDATE my_table set view = '$view', name = '$name', hashtag = '$hashtag' WHERE id=$id";
        mysqli_query($conn, $query);
        header('Location: index.php');
      }
?> 

<?php include ("include/header.php") ?> 

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
    <div class = "container p-4">
        <div class= "row">
            <div class= "col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="update.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group mb-3">
                            <input type="text" name="view" value="<?php echo $view; ?>" 
                            class= "form-control" placeholder="Update View">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="name" value="<?php echo $name; ?>" 
                            class= "form-control" placeholder="Update Name">
                        </div>
                        <div class="form-group mb-3">
                        <input type="text" name="hashtag" value="<?php echo $hashtag; ?>" 
                            class= "form-control" placeholder="Update Hashtag">
                        </div>
                        <button class="btn btn-outline-primary" name = "update" > 
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include ("include/footer.php") ?> 