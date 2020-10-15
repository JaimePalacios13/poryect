<?php
    
require_once("configuration/parameters.php");
require_once("helpers/utils.php");
?>
<style>
.campo span {
    /* position: absolute;
      right: 13px;
      top: 0px;
      cursor: pointer; */
}
</style>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Grupo Guardado</title>
    <link rel="icon" type="image/png" href="<?=base_url?>views/assets/img/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url?>views/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url?>views/assets/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="w5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"
        rel="stylesheet" />
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="row">
            <div class="col-md-6 m-auto">
                <img src="<?=base_url?>views/assets/img/logo.png" class="img-fluid" alt="Logo empresarial">
            </div>
        </div>
        <div class="login-logo mt-2 font-weight-bold">
            <a href="<?=base_url?>" class="text-dark font-weight-bold" style="text-decoration:none;">Inicio de Sesion</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"></p>

                <form action="<?=base_url?>login/validar" class="needs-validation" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Correo Electronico"
                            id="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control password" name="password" placeholder="Contraseña"
                            id="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-fw fa-eye password-icon show-password"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-12">
                            <button type="submit" name="login" value="iniciar_sesion" class="btn btn-primary btn-block"
                                id="Login">Iniciar sesion</button>
                        </div>
                    </div>
                </form>
                <!-- <p class="mb-1 mt-3">
                    <a href="forgot-password.html">Olvide mi contraseña</a>
                </p> -->
            </div>
            <div class="row">

                <div class="col-xl-11 m-auto text-center">

                </div>
            </div>
            <!-- /.login-card-body -->
        </div>

        <!-- EL ALERT DE RESPUESTA DE AJAX -->
        <div class="row mt-3">
            <div class="col-xl-12">
                <div class="alert alert-ligth text-center">
                    <small>
                        Desarrollado por Developing Soft <br> Derechos Reservados, Grupo Guardado 2020 &copy;
                    </small>
                </div>
            </div>
        </div>

    </div>
    <!-- /.login-box -->

    <script>
    window.addEventListener("load", function() {

        // icono para mostrar contraseña
        showPassword = document.querySelector('.show-password');
        showPassword.addEventListener('click', () => {

            // elementos input de tipo clave
            password = document.querySelector('.password');


            if (password.type === "text") {
                password.type = "password"
                showPassword.classList.remove('fa-eye-slash');
            } else {
                password.type = "text"
                showPassword.classList.toggle("fa-eye-slash");
            }

        })

    });
    </script>


    <script src="<?=base_url?>views/assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?=base_url?>views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url?>views/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="<?=base_url?>views/assets/js/adminlte.js"></script>
    <script src="<?=base_url?>views/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="<?=base_url?>views/assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?=base_url?>views/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="<?=base_url?>views/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="<?=base_url?>assets/js/pages/dashboard2.js"></script>

</body>

</html>

