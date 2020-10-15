<?php

require_once 'models/ModeloEstados.php';
class estadosController
{
    public function listado(){
        $mostrarestado = new ModeloEstado(); //Instancia de la clase estado
        $mostrarestado  = $mostrarestado->mostrar(); //array para los estados
        require_once("views/components/Estados/estados.php");
    }
    

    public function eliminar(){

        if (isset($_POST)) {
            /* var_dump($_POST); */
            $form = $_POST;
            $id = isset($form["id"])?$form["id"]:"";
            $estado = new ModeloEstado();
            $estado->setIdestado($id);
            $delete = $estado->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
                Utils::loadAction("estados/listado");
            }else
            {
                $_SESSION['delete'] = 'failed';
                Utils::loadAction("estados/listado");
            }
        }else {
            $_SESSION['delete'] = 'failed';
            Utils::loadAction("estados/listado");
        }
        Utils::loadAction("estados/listado");
    }

    public function guardar(){


        $validacion = Utils::NotScript("Estado");

        if ($validacion){
            
            if(isset($_POST)){
                $form = $_POST;
                /* var_dump($_POST); */
                //Validación de cada uno de los input
                $estados = isset($form['estado'])?$form['estado']:"";
                $estado = new ModeloEstado();
                $estado->setEstado($estados);
                $guardar = $estado->save();
                if ($guardar) {
                    $_SESSION['register'] = "complete";
                    Utils::loadAction("estados/listado");
                }else{
                    $_SESSION['register'] = "failed";
                    Utils::loadAction("estados/listado");
                }
            }else{
                $_SESSION['register'] = "failed";
            }    

        }else{
            $_SESSION['register'] = "failed";
        }

        Utils::loadAction("estados/listado");
    }

    public function editar(){

        $validacion = Utils::NotScript("Estado");

        if ($validacion){

            if(isset($_POST)){
                $form = $_POST;
                //Validación de cada uno de los input
                $estados = isset($form['estado'])?$form['estado']:"";
                $idestado = isset($form['id'])?$form['id']:"";
                $estado = new ModeloEstado();
                $estado->setEstado($estados);
                $estado->setIdestado($idestado);
                $guardar = $estado->update();
                if ($guardar) {
                    $_SESSION['update'] = "complete";
                    Utils::loadAction("estados/listado");
                }else{
                    $_SESSION['update'] = "failed";
                    Utils::loadAction("estados/listado");
                }
                
            }else{
                $_SESSION['update'] = "failed";
            }
        }else{
            $_SESSION['update'] = "failed";
        }

        Utils::loadAction("estados/listado");#redireccionamiento a la pagina principal del crud despues de un !isset($_POST)

    }
}          