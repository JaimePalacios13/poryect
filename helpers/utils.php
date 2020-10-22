<?php


class Utils
{
    public static function deleteSession($name){
        
        if (isset($_SESSION[$name])) {
            
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }


    public static function alertNone($action){

        $alert = "<div class='row mt-3'>
                    <div class='col-md-10 m-auto text-center'>
                        <div class='card card-primary shadow-lg'>
                            <div class='card-header'>
                                <h3 class='card-title'><i class='fas fa-clipboard'></i></h3>

                                <div class='card-tools'>
                                <button type='button' class='btn btn-tool' data-card-widget='remove'><i class='fas fa-times'></i>
                                </button>
                                </div>
                            </div>
                            <div class='card-body'>
                                No has realizado ninguna accion sobre los registros
                            </div>
                        </div>
                    </div>
                </div>";

        return $alert;
        
    }

    public static function alertSuccess($action){

        $alert = "<div class='row mt-3'>
                    <div class='col-md-10 m-auto text-center'>
                        <div class='card card-success shadow-lg'>
                            <div class='card-header'>
                                <h3 class='card-title'><i class='far fa-check-circle'></i></h3>

                                <div class='card-tools'>
                                <button type='button' class='btn btn-tool' data-card-widget='remove'><i class='fas fa-times'></i>
                                </button>
                                </div>
                            </div>
                            <div class='card-body'>
                                Datos ".$action." correctamente en los registros
                            </div>
                        </div>
                    </div>
                </div>";

        return $alert;
        
    }

    public static function alertWarning($action){

        $alert = "<div class='row mt-3'>
                    <div class='col-md-10 m-auto text-center'>
                        <div class='card card-warning shadow-lg'>
                            <div class='card-header'>
                                <h3 class='card-title'><i class='fas fa-exclamation-triangle'></i></h3>

                                <div class='card-tools'>
                                <button type='button' class='btn btn-tool' data-card-widget='remove'><i class='fas fa-times'></i>
                                </button>
                                </div>
                            </div>
                            <div class='card-body'>
                                No se han ".$action." los datos en los registros
                            </div>
                        </div>
                    </div>
                </div>";

        return $alert;
        
    }

    public static function alertDanger($action){

        $alert = "<div class='row mt-3'>
                    <div class='col-md-10 m-auto text-center'>
                        <div class='card card-danger shadow-lg'>
                            <div class='card-header'>
                                <h3 class='card-title'><i class='fas fa-exclamation-circle'></i></h3>

                                <div class='card-tools'>
                                <button type='button' class='btn btn-tool' data-card-widget='remove'><i class='fas fa-times'></i>
                                </button>
                                </div>
                            </div>
                            <div class='card-body'>
                                Ocurrio un error al insertar los datos!
                            </div>
                        </div>
                    </div>
                </div>";

        return $alert;
        
    }

    public static function loadAction($url){
        echo"
            <div class='d-flex justify-content-center mt-5 p-5'>
                <div class='spinner-border mt-5' role='status' style='width: 15rem; height: 15rem;'>
                    <span class='sr-only'>Loading...</span>
                </div>
            </div>
            ";
        /* echo"
        <!DOCTYPE html>
        <html lang='en'>
        
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <style type='text/css'>
                body,
        hmtl {
            background:#2C5574;
        }
        
        .pre-loader {
            position: absolute;
            left: 50%;
            top: 50%;
        }
        
        .pre-loader span {
            height: 2em;
            width: 2em;
            background: white;
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            border-radius: 50%;
            animation: wave 1.2s ease-in-out infinite;
        }
        
        .pre-loader span:nth-child(1) {
            left: -4.5em;
            animation-delay: 0s;
        }
        
        .pre-loader span:nth-child(2) {
            left: -1.5em;
            animation-delay: 0.1s;
        }
        
        .pre-loader span:nth-child(3) {
            left: 1.5em;
            animation-delay: 0.2s;
        }
        
        .pre-loader span:nth-child(4) {
            left: 4.5em;
            animation-delay: 0.3s;
        }
        
        @keyframes wave {
            0%,
            75%,
            100% {
                transform: translateY(0) scale(1);
            }
            25% {
                transform: translateY(2.5em);
            }
            50% {
                transform: translateY(-2.5em) scale(1.1);
            }
        }
            </style>
        </head>
        
        <body>
            <div class='pre-loader'>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </body>
        
        </html>
            "; */
        echo "<script> window.location='".base_url."".$url."'; </script>";
    }
    public static function loadActionn($url){
        /* echo"
            <div class='d-flex justify-content-center mt-5 p-5'>
                <div class='spinner-border mt-5' role='status' style='width: 15rem; height: 15rem;'>
                    <span class='sr-only'>Loading...</span>
                </div>
            </div>
            "; */
        echo"
        <!DOCTYPE html>
        <html lang='en'>
        
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <style type='text/css'>
                body,
        hmtl {
            background:#2C5574;
        }
        
        .pre-loader {
            position: absolute;
            left: 50%;
            top: 50%;
        }
        
        .pre-loader span {
            height: 2em;
            width: 2em;
            background: white;
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            border-radius: 50%;
            animation: wave 1.2s ease-in-out infinite;
        }
        
        .pre-loader span:nth-child(1) {
            left: -4.5em;
            animation-delay: 0s;
        }
        
        .pre-loader span:nth-child(2) {
            left: -1.5em;
            animation-delay: 0.1s;
        }
        
        .pre-loader span:nth-child(3) {
            left: 1.5em;
            animation-delay: 0.2s;
        }
        
        .pre-loader span:nth-child(4) {
            left: 4.5em;
            animation-delay: 0.3s;
        }
        
        @keyframes wave {
            0%,
            75%,
            100% {
                transform: translateY(0) scale(1);
            }
            25% {
                transform: translateY(2.5em);
            }
            50% {
                transform: translateY(-2.5em) scale(1.1);
            }
        }
            </style>
        </head>
        
        <body>
            <div class='pre-loader'>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </body>
        
        </html>
            ";
        echo "<script> window.location='".base_url."".$url."'; </script>";
    }



    public static function alertPasswordWarning1(){

        $alert = "<div class='row mt-3'>
                    <div class='col-md-10 m-auto text-center'>
                        <div class='card card-warning shadow-lg'>
                            <div class='card-header'>
                                <h3 class='card-title'><i class='far fa-check-circle'></i></h3>

                                <div class='card-tools'>
                                <button type='button' class='btn btn-tool' data-card-widget='remove'><i class='fas fa-times'></i>
                                </button>
                                </div>
                            </div>
                            <div class='card-body'>
                                Debes ingresar tu contraseña actual correctamente!
                            </div>
                        </div>
                    </div>
                </div>";

        return $alert;
        
    }



    public static function alertPasswordWarning2(){

        $alert = "<div class='row mt-3'>
                    <div class='col-md-10 m-auto text-center'>
                        <div class='card card-warning shadow-lg'>
                            <div class='card-header'>
                                <h3 class='card-title'><i class='far fa-check-circle'></i></h3>

                                <div class='card-tools'>
                                <button type='button' class='btn btn-tool' data-card-widget='remove'><i class='fas fa-times'></i>
                                </button>
                                </div>
                            </div>
                            <div class='card-body'>
                                Error al confirmar tu nueva contraseña!
                            </div>
                        </div>
                    </div>
                </div>";

        return $alert;
        
    }



    public static function getAlert(){

        if (isset($_SESSION['register']) && $_SESSION['register'] == "complete"){
            
            echo Utils::alertSuccess("Insertados");

        }elseif(isset($_SESSION['register']) && $_SESSION['register'] == "failed"){
        
            echo Utils::alertDanger("Insertado");

        }elseif (isset($_SESSION['register']) && $_SESSION['register'] == "warning") {
            
            echo Utils::alertWarning("Insertados");

        }elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == "complete"){

            echo Utils::alertSuccess("Eliminados");
            
        }elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == "failed"){
        
            echo Utils::alertDanger("Eliminados");

        }elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == "warning") {
            
            echo Utils::alertWarning("Eliminados");
        }elseif (isset($_SESSION['update']) && $_SESSION['update'] == "complete"){

            echo Utils::alertSuccess("Actualizados");
            
        }elseif(isset($_SESSION['update']) && $_SESSION['update'] == "failed"){
        
            echo Utils::alertDanger("Actualizados");

        }elseif (isset($_SESSION['update']) && $_SESSION['update'] == "warning") {
            
            echo Utils::alertWarning("Actualizados");
        }elseif(isset($_SESSION['updatew1']) && $_SESSION['updatew1'] == "failed"){
        
            echo Utils::alertPasswordWarning1();

        }elseif (isset($_SESSION['updatew1']) && $_SESSION['updatew1'] == "warning") {
            
            echo Utils::alertPasswordWarning2();
        }
    }



    public static function NotScript($formulario){

        if ($_POST){
            if ($formulario == "Usuario"){
                $Usuario = $_POST['nombre_usuario'];
                if (preg_match('/^[a-z-A-ZáéíóúÁÉÍÓÚÑñ ]{3,20}$/', $Usuario)){
                    $correo = $_POST['correo'];
                    if ( preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $correo)){
                        if (preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚÑñ0-9 ]{3,70}$/', $_POST['laboratorio'])){  

                            //las siguientes condiciones son para definir que proceso se hara (insert o update)

                            if (isset($_POST['id_rol'])){
                                $rol = $_POST['id_rol'];
                            }else{
                                $rol = $_POST['rol'];                                    
                            }
                            
                            if (isset($_POST['password'])){

                                if (preg_match('/^[0-9A-Za-z!@#$%]{8,20}$/', $password)){
                                    $password = $_POST['password'];
                                }else{
                                    return false;
                                }

                            }

                            if (preg_match('/^[0-9]{0,8}$/', $rol)){
                                return true;
                            }
                        }
                    }
                    
                }
            }else if ($formulario == "Estado"){

                if (preg_match('/^[a-z-A-ZáéíóúÁÉÍÓÚÑñ ]{3,40}$/', $_POST['estado'])){

                    return true;

                }

            }else if ($formulario == "Roles"){

                if (preg_match('/^[a-z-A-ZáéíóúÁÉÍÓÚÑñ ]{3,40}$/', $_POST['rol'])){
                    return true;
                }            

            }else if ($formulario == "Observaciones")
            {

                if (preg_match('/^[a-z-A-ZáéíóúÁÉÍÓÚÑñ ]{3,40}$/', $_POST['observacion'])){
                    
                    if (preg_match('/^[0-9]{0,8}$/', $_POST['idestado'])){
                        return true;
                    }
                }
            }
            else if ($formulario == "Pedidos")
            {
                if (preg_match('/^[a-z-A-ZáéíóúÁÉÍÓÚÑñ ]{3,80}$/', $_POST['cliente'])){
                    return true;
                }
            }
        }      
        return false;
    }
    
}