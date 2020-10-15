<?php

/* require_once 'models/ModeloObservaciones.php';
require_once 'models/ModeloEstados.php'; */
require_once 'models/ModeloPedidos.php';
class pedidosController
{
    public function nuevo(){
        require_once("views/components/Pedidos/pedidos.php");
    }
    public function listado(){
        
        $mostrar = new ModeloPedidos();//Instancia de la clase Modelo
        $mostrarobj  = $mostrar->mostrar(); //array para los usuarios
        require_once("views/components/Progreso/progreso.php");
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


            $validacion = Utils::NotScript("Pedidos");
            if ($validacion){


                $form = $_POST;
                //Validación de cada uno de los input
    
                #tabla pedidos
                $usuario = isset($form['usuario'])?$form['usuario']:"";
                $id_obs = isset($form['id_obs'])?$form['id_obs']:"";
                $cliente = isset($form['cliente'])?$form['cliente']:"";
                $envio = isset($form['envio'])?$form['envio']:"";
    
                #tabla producto
                $descripcion = isset($form['producto'])?$form['producto']:"";
                $cantidad = isset($form['cantidad'])?$form['cantidad']:"";
                $bonificacion = isset($form['bonificacion'])?$form['bonificacion']:"";
                $desclab = isset($form['desclab'])?$form['desclab']:"";
                $descg = isset($form['descguardado'])?$form['descguardado']:"";
                
                #tabla pedidos
                $obj = new ModeloPedidos();
                $obj->setUsuario($usuario);
                $obj->setIdobs($id_obs);
                $obj->setCliente($cliente);
                $obj->setEnvio($envio);
    
                #tabla producto 
                $obj->setDescripcion($descripcion);
                $obj->setCantidad($cantidad);
                $obj->setBonificacion($bonificacion);
                $obj->setDesclab($desclab);
                $obj->setDescg($descg);
    
    
                $guardar = $obj->save();
                if ($guardar) {
                    $_SESSION['register'] = "complete";
                    Utils::loadAction("pedidos/nuevo");
                }else{
                    $_SESSION['register'] = "failed";
                    Utils::loadAction("pedidos/nuevo");
                }
            }else{
                $_SESSION['register'] = "failed";
            }

        }else{
            $_SESSION['register'] = "failed";
        }
        Utils::loadAction("pedidos/nuevo");
    }

    public function editar(){

        if(isset($_POST)){

            $validacion = Utils::NotScript("Pedidos");

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