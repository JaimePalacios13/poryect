<?php

require_once 'models/ModeloObservaciones.php';
require_once 'models/ModeloEstados.php';
class observacionesController
{
    public function listado(){
        $mostrarobs = new ModeloObservacion(); //Instancia de la clase rol
        $mostrarestado = new ModeloEstado(); //Instancia de la clase rol
        $mostrarestado  = $mostrarestado->mostrar(); //array para los roles
        $mostrarobs  = $mostrarobs->mostrar(); //array para los roles
        require_once("views/components/observaciones/observaciones.php");
    }
    

    public function eliminar(){

        if (isset($_POST)) {
            
            $form = $_POST;
            $id = isset($form["id_observacion"])?$form["id_observacion"]:"";
            $modeloobs = new ModeloObservacion();
            $modeloobs->setIdobservacion($id);
            $delete = $modeloobs->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
                Utils::loadAction("observaciones/listado");
            }else
            {
                $_SESSION['delete'] = 'failed';
                Utils::loadAction("observaciones/listado");
            }
        }else {
            $_SESSION['delete'] = 'failed';
            Utils::loadAction("observaciones/listado");
        }
        Utils::loadAction("observaciones/listado");
    }

    public function guardar(){




        if(isset($_POST)){

            $validacion = Utils::NotScript("Observaciones");


            if ($validacion){
                $form = $_POST;
                //Validación de cada uno de los input
                $observacion = isset($form['observacion'])?$form['observacion']:"";
                $id = isset($form['idestado'])?$form['idestado']:"";
                
                $obs = new ModeloObservacion();
                $obs->setObservacion($observacion);
                $obs->setIdestado($id);
                $guardar = $obs->save();
                if ($guardar) {
                    $_SESSION['register'] = "complete";
                    Utils::loadAction("observaciones/listado");
                }else{
                    $_SESSION['register'] = "failed";
                    Utils::loadAction("observaciones/listado");
                }
                }else{
                    $_SESSION['register'] = "failed";
                }
    
            }else{
                $_SESSION['register'] = "failed";
            }

        Utils::loadAction("observaciones/listado");
    }

    public function editar(){

        if(isset($_POST)){

            $validacion = Utils::NotScript("Observaciones");

            if ($validacion){


                $form = $_POST;
                //Validación de cada uno de los input
                $observacion = isset($form['observacion'])?$form['observacion']:"";
                $idestado = isset($form['idestado'])?$form['idestado']:"";
                $id = isset($form['id_observacion'])?$form['id_observacion']:"";
                $modeloobs = new ModeloObservacion();
                $modeloobs->setObservacion($observacion);
                $modeloobs->setIdestado($idestado);
                $modeloobs->setIdobservacion($id);
                $guardar = $modeloobs->update();
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
        Utils::loadAction("observaciones/listado");#redireccionamiento a la pagina principal del crud despues de un !isset($_POST)

    }
}          