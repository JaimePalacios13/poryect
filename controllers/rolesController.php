<?php

require_once 'models/ModeloRoles.php';
class rolesController
{
    public function listado(){
        $mostrarrol = new ModeloRol(); //Instancia de la clase rol
        $mostrarrol  = $mostrarrol->mostrar(); //array para los roles
        require_once("views/components/Roles/roles.php");
    }
    

    public function eliminar(){

        if (isset($_POST)) {
            
            $form = $_POST;
            $rol = isset($form["rol"])?$form["rol"]:"";
            $rolesmodelo = new ModeloRol();
            $rolesmodelo->setRol($rol);
            $delete = $rolesmodelo->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
                Utils::loadAction("roles/listado");
            }else
            {
                $_SESSION['delete'] = 'failed';
                Utils::loadAction("roles/listado");
            }
        }else {
            $_SESSION['delete'] = 'failed';
            Utils::loadAction("roles/listado");
        }
        Utils::loadAction("roles/listado");
    }

    public function guardar(){


        if(isset($_POST)){


            
            $validacion = Utils::NotScript("Roles");

            if ($validacion){

                $form = $_POST;
                /* var_dump($_POST); */
                //Validación de cada uno de los input
                $roles = isset($form['rol'])?$form['rol']:"";
                $rol = new ModeloRol();
                $rol->setRol($roles);
                $guardar = $rol->save();
                if ($guardar) {
                    $_SESSION['register'] = "complete";
                    Utils::loadAction("roles/listado");
                }else{
                    $_SESSION['register'] = "failed";
                    Utils::loadAction("roles/listado");
                }

            }else{
                $_SESSION['register'] = "failed";
            }

        }else{
            $_SESSION['register'] = "failed";
        }
        Utils::loadAction("roles/listado");
    }

    public function editar(){



        if(isset($_POST)){


            $validacion = Utils::NotScript("Roles");

            if ($validacion){


                $form = $_POST;
                //Validación de cada uno de los input
                $rol = isset($form['rol'])?$form['rol']:"";
                $id = isset($form['id'])?$form['id']:"";
                $modrol = new ModeloRol();
                $modrol->setRol($rol);
                $modrol->setIdrol($id);
                $guardar = $modrol->update();
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
        Utils::loadAction("roles/listado");#redireccionamiento a la pagina principal del crud despues de un !isset($_POST)

    }
}          