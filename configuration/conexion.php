<?php

class Database 
{

    //CONEXION PDO

    public static function connect(){

        $host = "den1.mysql3.gear.host";
        $db = "appserverpedidos";
        $user = "appserverpedidos";
        $password = "Zn6C!W4A-X3R";

        try{

            $db = new PDO('mysql:host='.$host.';dbname='.$db.'', $user, $password );

        }catch(PDOException $x){

            echo "Error: ".$x->getMessage();
        }

        return $db;
    }

    static function closeConnect(&$conectar){
        $conectar=null;
    }

}       

