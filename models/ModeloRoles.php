<?php
class ModeloRol
{
    private $rol;
    private $id;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }
    public function getRol(){
        return $this->rol;
    }

    public function setRol($rol){
        $this->rol = $rol;
    }
    public function getIdrol(){
        return $this->id;
    }

    public function setIdrol($id){
        $this->id = $id;
    }

    public function mostrar(){
        try{
            $conexion = $this->db;
            $query="SELECT id_rol,rol FROM roles";
            $prepare = $conexion->prepare($query);
            $prepare->execute();

            $resultadorol = $prepare->fetchAll();
            return $resultadorol;


        }catch(PDOException $x){
            echo "Error: ".$x->getMessage()." <br>";
        }
    }

    public function delete(){
        $conectar = $this->db;
        $sql="DELETE FROM roles where id_rol = :id_rol";
        $id_rol = $this->getRol();
        $prepare = $conectar->prepare($sql);
        $prepare->bindParam(":id_rol",$id_rol, PDO::PARAM_STR);
        $prepare->execute();

        $resultado = false;
        if ($prepare) {
            $resultado=true;
        }
        return $resultado;
    }

    public function save(){
            $conectar = $this->db;
            $consulta = "INSERT INTO roles(rol) VALUES(:rol)";
            $rol = $this->getRol();
            $prepare = $conectar->prepare($consulta); //guardamos la consulta
            $prepare->bindParam(":rol", $rol, PDO::PARAM_STR);
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
            $consulta = "UPDATE roles SET rol = :rol WHERE id_rol = :id_rol";
            $rol = $this->getRol();
            $id_rol= $this->getIdrol();
            $prepare = $conectar->prepare($consulta);
            
            $prepare->bindParam(":rol", $rol, PDO::PARAM_STR);
            $prepare->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
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