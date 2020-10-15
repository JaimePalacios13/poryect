<?php

require_once("models/ModeloPerfil.php");
require_once("controllers/EncryptacionController.php"); //cambio


class PerfilController{


    public function VerDatos(){

        $obj = new userModelo();
        $row = $obj->MostrarDatos();

        require_once("views/components/Perfil/Perfil.php");
    }

    public function Pwd(){

        $obj = new userModelo();
        require_once("views/components/Perfil/CambiarContrasenia.php");
    }

    public function UpdatePassword(){
        

        if (isset($_POST))
        {

            $form = $_POST;

            $pwd_current = isset($form['pwd']) ? $form['pwd'] : "";
            $pwd1 = isset($form['pwd1']) ? $form['pwd1'] : "";
            $pwd2 = isset($form['pwd2']) ? $form['pwd2'] : "";

            $pwd_current  = passwordEncrypt::encryption($pwd_current); // cambio 1

            $obj = new userModelo();
            $passwordActual = $obj->BuscarContrasenia();
            
            //validar contraseña de la base de datos

            if ($pwd_current == $passwordActual['password'] ){

                if($pwd1 == $pwd2){

                    
                    $pwd2 = passwordEncrypt::encryption($pwd2);// cambio 2

                    $obj->setPassword($pwd2);
                    $resultado = $obj->UpdatePassword();

                    if ($resultado){

                        $_SESSION['update'] = "complete";
                        session_destroy();
                    }

                }else{

                    $_SESSION['updatew1'] = "warning";

                }

            }else{
                $_SESSION['updatew1'] = "failed";
            }


        }

        Utils::loadAction("Perfil/Pwd");

    }


    public function Update(){


        if(isset($_POST)){


            $form = $_POST;

            //Validación de cada uno de los input
            $nombre_usuario = isset($form['nombre_usuario'])?$form['nombre_usuario']:"";
            $correo = isset($form['correo']) ? $form['correo']:"";
            //$id_rol = isset($form['id_rol']) ? $form['id_rol']:"";
            
            //$laboratorio = isset($form['laboratorio'])?$form['laboratorio']:"";
            //$password = isset($form['password'])?$form['password']:"";
            
            
            //$id_usuario = isset($form['id_usuario'])?$form['id_usuario']:"";


            if (!empty($nombre_usuario) && !empty($correo)){

                $usuario = new userModelo();
                $usuario->setNombre_usuario($nombre_usuario);
                $usuario->setCorreo($correo);
                //$usuario->setId_rol($id_rol);
                //$usuario->setLaboratorio($laboratorio);
                                //$usuario->setId_usuario($id_usuario);
                //$usuario->setPassword($password);
                
                $_SESSION["nombre_usuario"] = $usuario->getNombre_usuario();
                $_SESSION["email"] = $usuario->getCorreo();

                $update = $usuario->ModificarDatos();

                if ($update) {
                    $_SESSION['update'] = "complete";
                    
                }else{
                    $_SESSION['update'] = "failed";
                    
                }
            }else{
                $_SESSION['update'] = "failed";
            }
            
        }else{
            $_SESSION['update'] = "failed";
        }
        Utils::loadAction("Perfil/VerDatos");

    }


}


///