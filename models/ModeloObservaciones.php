<?php
class ModeloObservacion
{
    private $observacion;
    private $id;
    private $idestado;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }
    #get&set observaciones
    public function getObservacion(){
        return $this->observacion;
    }

    public function setObservacion($observacion){
        $this->observacion = $observacion;
    }
    #get&set idObservaciones
    public function getIdobservacion(){
        return $this->id;
    }

    public function setIdobservacion($id){
        $this->id = $id;
    }
    #get&set IDestado
    public function getIdestado(){
        return $this->idestado;
    }

    public function setIdestado($idestado){
        $this->idestado = $idestado;
    }

    public function mostrar(){
        try{
            $conexion = $this->db;
            $query="SELECT o.id_obs,o.observacion as observaciones,a.id_estado, a.estado as estado FROM observaciones as o
            inner join estado as a
            on o.id_estado=a.id_estado
            ";
            $prepare = $conexion->prepare($query);
            $prepare->execute();

            $resultadoobs = $prepare->fetchAll();
            return $resultadoobs;


        }catch(PDOException $x){
            echo "Error: ".$x->getMessage()." <br>";
        }
    }

    public function delete(){
        $conectar = $this->db;
        $sql="DELETE FROM observaciones where id_obs = :id_obs";
        $id_obs = $this->getIdobservacion();
        $prepare = $conectar->prepare($sql);
        $prepare->bindParam(":id_obs",$id_obs, PDO::PARAM_STR);
        $prepare->execute();

        $resultado = false;
        if ($prepare) {
            $resultado=true;
        }
        return $resultado;
    }

    public function save(){
            $conectar = $this->db;
            $consulta = "INSERT INTO observaciones(observacion,id_estado) 
            VALUES(:observacion,:id)";
            $obs = $this->getObservacion();
            $id  = $this->getIdestado();
            $prepare = $conectar->prepare($consulta); //guardamos la consulta
            $prepare->bindParam(":observacion", $obs, PDO::PARAM_STR);
            $prepare->bindParam(":id", $id, PDO::PARAM_INT);
            $prepare->execute();
            //Ejecución de la consulta
            $resultado = false;
            if ($prepare){
                $resultado = true;    
            }        
            return $resultado;
    }

    public function update(){

        try{
            $conectar = $this->db;
            $consulta = "UPDATE observaciones SET observacion = :observacion, id_estado= :id_estado WHERE id_obs = :id_obs";
            $obs = $this->getObservacion();
            $id_estado  = $this->getIdestado();
            $id_obs  = $this->getIdobservacion();
            $prepare = $conectar->prepare($consulta);
            
            $prepare->bindParam(":observacion", $obs, PDO::PARAM_STR);
            $prepare->bindParam(":id_estado", $id_estado, PDO::PARAM_INT);
            $prepare->bindParam(":id_obs", $id_obs, PDO::PARAM_INT);
            $prepare->execute();

            $resultado = false;
            if ($prepare){
                $resultado = true;
                return $resultado;
            }
            
        }catch(PDOException $x){

            echo "Error :".$x->getMessage();

        }


    }
    #Metodo que trae las observaciones
    public function observaciones(){


        try{

            $conectar = $this->db;
            
            $consulta = "SELECT o.id_obs,o.observacion
            FROM observaciones as o
            inner join estado as e on
            o.id_estado = e.id_estado
            where o.id_estado = :id_obs";
            $id_obs = $this->getIdobservacion();
            $id_obs = $id_obs + 1;
            if ($id_obs !=1) {
                $prepare = $conectar->prepare($consulta);
            $prepare->bindParam(":id_obs", $id_obs, PDO::PARAM_INT);
            $prepare->execute();
            $mostrar = $prepare->fetchAll();
            return $mostrar;
            }
            
        }catch(PDOException $x){

            echo "Error ".$x->getMessage();
        }


    }

}
?>