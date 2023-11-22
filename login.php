<?php include("include/header.php"); ?>

    <div class="container w-75">
        <div class="row">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                <div class="img-left d-none d-md-flex"></div>
                <div class="card-body my-4">
                    <h4 class="title text-center mt-4">
                        INICIAR SESIÓN
                    </h4>
                    <form class="form-box px-3" method="POST" action = "login.php" >
                        <div class="form-input">
                            <span><i class="fa-solid fa-user"></i></span>
                            <input type="username" name="username" class="form-control" placeholder="Nombre de Usuario" tabindex="10" required autofocus>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name = "login-button"class="btn btn-outline-primary login-button"> Acceder </button>
                            
                            <?php
                                include("controller/controller_login.php");
                            ?> 
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include("include/footer.php"); ?>