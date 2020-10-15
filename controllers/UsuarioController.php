<?php
require_once 'models/ModeloUsuario.php';
require_once 'models/ModeloRoles.php';
require_once("controllers/EncryptacionController.php"); //cambio


class usuarioController
{
    public function listado(){
        
        $mostrar = new UsuarioModelo();//Instancia de la clase Modelo
        $mostrarrol = new ModeloRol(); //Instancia de la clase rol
        $mostrarrol  = $mostrarrol->mostrar(); //array para los roles
        $mostrarobj  = $mostrar->mostrar(); //array para los usuarios
        require_once("views/components/Usuarios/usuario.php");
    }


  /*   public function registro(){
        require_once("views/components/Usuarios/registro.php");
    } */

    public function guardar(){

        if(isset($_POST)){


            $validacion = Utils::NotScript("Usuario");

            if ($validacion){

                $form = $_POST;

                //Validación de cada uno de los input
                $nombre_usuario = isset($form['nombre_usuario'])?$form['nombre_usuario']:"";
                $correo = isset($form['correo']) ? $form['correo']:"";
                $id_rol = isset($form['rol']) ? $form['rol']:"";
                $laboratorio = isset($form['laboratorio'])?$form['laboratorio']:"";
                $password = isset($form['password'])?$form['password']:"";
    
                
                $password = passwordEncrypt::encryption($password); // cambio 1
                
                $usuario = new UsuarioModelo();
                $usuario->setNombre_usuario($nombre_usuario);
                $usuario->setCorreo($correo);
                $usuario->setId_rol($id_rol);
                $usuario->setLaboratorio($laboratorio);
                $usuario->setPassword($password);
                $guardar = $usuario->save();
    
                /* var_dump($usuario);
                var_dump($guardar); */
                if ($guardar) {
                    $_SESSION['register'] = "complete";
                    
                }else{
                    $_SESSION['register'] = "failed";
                
                }    

            }else{

                $_SESSION['register'] = "failed";

            }
            
        }else{
            $_SESSION['register'] = "failed";
        }
        Utils::loadAction("usuario/listado");#redireccionamiento a la pagina principal del crud despues de un !isset($_POST)
    }
    
    
    
    
    
    public function editar(){

        if(isset($_POST)){


            $validacion = Utils::NotScript("Usuario");


            if ($validacion){

                $form = $_POST;

                //Validación de cada uno de los input
                $nombre_usuario = isset($form['nombre_usuario'])?$form['nombre_usuario']:"";
                $correo = isset($form['correo']) ? $form['correo']:"";
                $id_rol = isset($form['id_rol']) ? $form['id_rol']:"";
                $laboratorio = isset($form['laboratorio'])?$form['laboratorio']:"";
                //$password = isset($form['password'])?$form['password']:"";
                $id_usuario = isset($form['id_usuario'])?$form['id_usuario']:"";
    
                $usuario = new UsuarioModelo();
                $usuario->setNombre_usuario($nombre_usuario);
                $usuario->setCorreo($correo);
                $usuario->setId_rol($id_rol);
                $usuario->setLaboratorio($laboratorio);
                $usuario->setId_usuario($id_usuario);
                //$usuario->setPassword($password);
                $guardar = $usuario->update();
    
                /* var_dump($usuario);
                var_dump($guardar); */
                if ($guardar) {
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
        Utils::loadAction("usuario/listado");#redireccionamiento a la pagina principal del crud despues de un !isset($_POST)

    }






    public function eliminar(){

        if (isset($_POST)) {
            
            $form = $_POST;

            $id_usuario = isset($form["id_usuario"])?$form["id_usuario"]:"";
            $usuario = new UsuarioModelo();
            $usuario->setId_usuario($id_usuario);
            $delete = $usuario->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            }else
            {
                $_SESSION['delete'] = 'failed';
            }
        }else {
            $_SESSION['delete'] = 'failed';
        }
        Utils::loadAction("usuario/listado"); #redireccionamiento a la pagina principal del crud despues de un !isset($_POST)
    }

    public function recuperar(){#mthodo para reestablecer la contraseña 

        if(isset($_POST)){
            $form = $_POST;
            //Validación de cada uno de los input
            $id_usuario = isset($form['id_usuario']) ? $form['id_usuario']:"";
            $usuario = new UsuarioModelo();
            $usuario->setId_usuario($id_usuario);
            $recuperar = $usuario->recuperarpwd();
            if ($recuperar) {
                $_SESSION['update'] = "complete";
            }else{
                $_SESSION['update'] = "failed";
            }
        }else{
            $_SESSION['update'] = "failed";
        }
        Utils::loadAction("usuario/listado");#redireccionamiento a la pagina principal del crud despues de un !isset($_POST)
    }
}