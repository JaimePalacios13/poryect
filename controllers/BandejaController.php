<?php

/* require_once 'models/ModeloObservaciones.php'; */
require_once 'models/ModeloEstados.php';
require_once ("models/ModeloBandeja.php");
require_once ("models/ModeloObservaciones.php");
class bandejaController
{
    public function entrada(){
        try {
            
            $modeloestado = new ModeloEstado(); //Instancia de la clase rol
            $mostrar  = $modeloestado->mostrar(); //array para los roles
           
            $obj = new ModeloBandeja();
            $info = $obj->consulta();
            session_start();
            $_SESSION["method"] = true;
            $total = $this->contador();
            require_once("views/components/Bandeja/bandeja.php");
            
        } catch (\Throwable $th) {
           
            Utils::loadAction("bandeja/entrada");
        }
    }


    public function contador(){
        try {
            
            if ($_SESSION["method"]==true) {

                $obj = new ModeloBandeja();
                $total = array(
                    "Enviado" => $obj->EstadoEnviado(),
                    "AuthLab" => $obj->EstadoAutorizadoLab(),
                    "AuthDrog" => $obj->EstadoAutorizadoDrog(),
                    "Facturado" => $obj->EstadoFacturado()
                );
                
                return $total;
            }elseif($_SESSION["method"] == false || $_SESSION["method"] == "" || empty($_SESSION["method"])) {
                
                Utils::loadAction("login/salir");
                
            }

        } catch (\Throwable $th) {

            Utils::loadAction("bandeja/entrada");
        }

    }

    public function eliminar(){

        try {
            
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
            
        } catch (\Throwable $th) {
            
            Utils::loadAction("bandeja/entrada");
            
        }

    }

    public function guardar(){
        
        try {
            
            if(isset($_POST)){
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
            Utils::loadAction("observaciones/listado");
            
        } catch (\Throwable $th) {
            
            Utils::loadAction("bandeja/entrada");
        }

    }

    public function editar(){

        try {
            
            if(isset($_POST)){
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
            Utils::loadAction("observaciones/listado");#redireccionamiento a la pagina principal del crud despues de un !isset($_POST)
            
        } catch (\Throwable $th) {
            
            Utils::loadAction("bandeja/entrada");
        }


    }


    /* METODOS PARA MOSTRAR LOS FILTROS DE LAS BANDEJAS DE ENTRADA */

    /* METODO DE ENVIADO */

    /* METODO : AUTORIZACION DEL LABORATORIO */
    public function laboratorio(){
        
        $laboratorio = new ModeloBandeja();
        $mostrarlab = $laboratorio->autorizacionLaboratorio();
        $_SESSION["method"] = true;
        $total = $this->contador();
        require_once("views/components/Bandeja/laboratorio.php");
    }
    /* METODO : AUTORIZACION DE DROGUERIA */
    public function drogueria(){
        
        $laboratorio = new ModeloBandeja();
        $mostrarDrog = $laboratorio->autorizacionDrogueria();
        $_SESSION["method"] = true;
        $total = $this->contador();
        require_once("views/components/Bandeja/drogueria.php");
    }
    /* METODO : FACTURADO */
    public function facturacion(){
        
        $laboratorio = new ModeloBandeja();
        $mostrarFact = $laboratorio->facturacion();
        $_SESSION["method"] = true;
        $total = $this->contador();
        require_once("views/components/Bandeja/facturado.php");
    }




    public function email(){

        if ($_POST){

            $id_pedido = $_POST["pedido"];
            $id = $_POST["id_obs"];
            $mensaje = new ModeloBandeja();
            $mensaje->setId_pedido($id_pedido);
            $mensaje->MessageView();
            $message = $mensaje->consultaPorID();

            $obs = new ModeloObservacion();
            $obs->setIdobservacion($id);
            $mostrar = $obs->observaciones();
            $_SESSION["method"] = true;    
            $total = $this->contador();
            require_once("views/components/Bandeja/emails.php");    
        }else {
            
            Utils::loadAction("bandeja/entrada");
        }

    }
    public function cambio(){

        if(isset($_POST)){
            $form = $_POST;
            $id_obs = isset($form['id_obs'])?$form['id_obs']:"";
            $id_pedido = isset($form['id_pedido'])?$form['id_pedido']:"";
            $mensaje = new ModeloBandeja();
            $mensaje->setIdobs($id_obs);
            $mensaje->setId_pedido($id_pedido);
            $modificar = $mensaje->mod();
            if ($modificar) {
                $_SESSION['register'] = "complete";
                Utils::loadAction("bandeja/entrada");
            }else{
                $_SESSION['register'] = "failed";
                Utils::loadAction("bandeja/entrada");
            }
        }else{
            $_SESSION['register'] = "failed";
        }
        Utils::loadAction("bandeja/entrada");
    }
}          