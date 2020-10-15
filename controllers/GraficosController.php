<?php

require_once 'models/ModeloGraficos.php';
class graficosController
{
    public function listado(){
        $mostrar = new ModeloGraficos(); //Instancia de la clase rol
        $mostrar  = $mostrar->mostrar(); //array para los roles
        require_once("views/components/Grafico/graficos.php");
    }

}          