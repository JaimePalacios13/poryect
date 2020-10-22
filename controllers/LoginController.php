<?php
    require_once("models/ModeloLogin.php");
    require_once("controllers/EncryptacionController.php"); //cambio

    class loginController
    {
        public function validar(){
            if ($_POST) {
                
                $form = $_POST;

                $email =  isset($form['email'])?$form['email']:"";
                $password = isset($form["password"])?$form["password"]:"";

                $password = passwordEncrypt::encryption($password);  //cambio 1
                $validar = new ModeloLogin();

                $validar->setEmail($email);
                $validar->setPassword($password);
                
                $session = $validar->buscar();

                if ($session == 1) {
                    $_SESSION["session"] = "validated";
                    $_SESSION["id_usuario"] = $validar->getId_usuario();
                    $_SESSION["id_rol"] = $validar->getId_rol();
                    $_SESSION["nombre_usuario"] = $validar->getNombre_usuario();
                    $_SESSION["email"] = $validar->getEmail();
                    Utils::loadActionn("bandeja/entrada");
                }else {
                    $_SESSION["session"] = "";
                    Utils::loadActionn("");
                }


            }else {
                
                Utils::loadActionn("");
            }
        }

        public function salir(){

            unset($_SESSION["session"]);
            unset($_SESSION["id_usuario"]);
            unset($_SESSION["id_rol"]);
            unset($_SESSION["nombre_usuario"]);
            unset($_SESSION["email"]);
            unset($_SESSION["method"]);
            session_destroy();

            Utils::loadActionn("");
        }
    }
    