<?php

    include("conexion_db.php");

    if (isset($_POST['create'])) {
        if (isset($_POST['create'])) {
            $view = $_POST['view'];
            $name = $_POST['name'];
            $hashtag = $_POST['hashtag'];
            $query = "INSERT INTO my_table(view, name, hashtag) VALUES ('$view','$name', '$hashtag')";
            $result = mysqli_query($conn, $query);
            
            if(!$result) {
            die("Query Failed.");
            }
            header('Location: index.php');
        }
    }
?>

<?php 
    include "auth.php"; 
    include ("include/header.php") 
?> 

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
    <div class="container p-4">
        <div class="row">
            <div class= "col-md-4 mx-auto"> 
                <div class="card card-body">
                    <form action="create.php" method = "POST">  
                        <div class="form-group mb-3">
                            <input type="text" name="view" class="form-control" placeholder= "View/Category" autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder= "Name">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="hashtag" class="form-control" placeholder= "Hashtag">
                        </div>
                        <button type="submit" class="btn btn-outline-primary  btn-md mr-2" name= "create">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include ("include/footer.php") ?> 
