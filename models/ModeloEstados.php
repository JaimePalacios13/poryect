<?php
class ModeloEstado
{
    private $estado;
    private $id;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }
    public function getIdestado(){
        return $this->id;
    }

    public function setIdestado($id){
        $this->id = $id;
    }

    public function mostrar(){
        try{
            $conexion = $this->db;
            $query="SELECT id_estado,estado FROM estado";
            $prepare = $conexion->prepare($query);
            $prepare->execute();

            $resultadoestados = $prepare->fetchAll();
            return $resultadoestados;


        }catch(PDOException $x){
            echo "Error: ".$x->getMessage()." <br>";
        }
    }

    public function delete(){
        $conectar = $this->db;
        $sql="DELETE FROM estado where id_estado = :id_estado";
        $id_estado = $this->getIdestado();
        $prepare = $conectar->prepare($sql);
        $prepare->bindParam(":id_estado",$id_estado, PDO::PARAM_STR);
        $prepare->execute();

        $resultado = false;
        if ($prepare) {
            $resultado=true;
        }
        return $resultado;
    }

    public function save(){
            $conectar = $this->db;
            $consulta = "INSERT INTO estado(estado) VALUES(:estado)";
            $estado = $this->getEstado();
            $prepare = $conectar->prepare($consulta); //guardamos la consulta
            $prepare->bindParam(":estado", $estado, PDO::PARAM_STR);
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
            $consulta = "UPDATE estado SET estado = :estado WHERE id_estado = :id_estado";
            $estado = $this->getEstado();
            $id_estado= $this->getIdestado();
            $prepare = $conectar->prepare($consulta);
            
            $prepare->bindParam(":estado", $estado, PDO::PARAM_STR);
            $prepare->bindParam(":id_estado", $id_estado, PDO::PARAM_INT);
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

}
?>