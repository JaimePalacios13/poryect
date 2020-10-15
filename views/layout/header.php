<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Grupo Guardado</title>


    <link rel="icon" type="image/png" href="<?=base_url?>views/assets/img/logo.ico">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?=base_url?>views/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?=base_url?>views/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url?>views/assets/css/adminlte.min.css">

    <!-- Style origin -->
    <link rel="stylesheet" href="<?=base_url?>views/assets/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="w5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <!--Data table-->
    <link rel="stylesheet" type="text/css" href="<?=base_url?>views/assets/plugins/Datatables/datatables.min.css" />
    <script type="text/javascript" src="<?=base_url?>views/assets/plugins/Datatables/datatables.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script> -->
    <style type="text/css">
    .fa-bell {
        color: #FFFFFF;
        background: #dd4b39;
        padding: 0.2em 0.4em;
    }

    .fa-bell {
        border-radius: 60%;
        margin: 0.15em;

    }

    .fa-bell {
        animation: pulse 1s ease infinite;
        /* transition: transform 0.2s; */
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a href="<?=base_url?>Perfil/VerDatos" class="nav-link">
                        <span class="text-dark font-weight-bold"> Te damos la bienvenida: </span><span
                            class="text-muted font-italic"><?=$_SESSION["email"];?></span>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="<?=base_url?>bandeja/entrada">
                        <i class="far fa-bell"></i>
                        <?php 
                        $rol= $_SESSION["id_rol"];
                        if ($rol!=3) {
                            $notificacion = $notificaciones->notificaciones();

                            if ($notificacion > 0) {
                                
                                ?>

                        <a href="<?=base_url?>bandeja/entrada"
                            class="badge badge-danger navbar-badge font-weight-bold text-white">
                            <?=$notificacion?>
                        </a>
                        <?php
                            }
                        }
                        ?>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-cog"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="<?=base_url?>Perfil/VerDatos" class="dropdown-item dropdown-footer"><i
                                class="fas fa-id-card"></i> Ver perfil</a>
                        <a href="<?=base_url?>Perfil/Pwd" class="dropdown-item dropdown-footer"><i
                                class="fas fa-key"></i> Cambiar contraseña</a>
                        <a href="<?=base_url?>login/salir" class="dropdown-item dropdown-footer"><i
                                class="fas fa-sign-out-alt"></i> Cerrar sesion</a>
                    </div>
                </li>


            </ul>
        </nav>