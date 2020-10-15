<?php
class ModeloPedidos
{
    private $usuario;
    private $id_obs;
    private $cliente;
    private $descripcion;
    private $cantidad;
    private $bonificacion;
    private $desclab;
    private $descg;
    private $envio;

    public function __construct(){
        $this->db = Database::connect();
    }
    #variables getters
    public function getUsuario(){return $this->usuario;}
    public function getIdobs(){return $this->id_obs;}
    public function getCliente(){return $this->cliente;}
    public function getDescripcion(){return $this->descripcion;}
    public function getCantidad(){return $this->cantidad;}
    public function getBonificacion(){return $this->bonificacion;}
    public function getDesclab(){return $this->desclab;}
    public function getDescg(){return $this->descg;}
    public function getEnvio(){return $this->envio;}
    #variables setters
    public function setUsuario($usuario){$this->usuario = $usuario;}
    public function setIdobs($id_obs){$this->id_obs = $id_obs;}
    public function setCliente($cliente){$this->cliente = $cliente;}
    public function setDescripcion($descripcion){$this->descripcion = $descripcion;}
    public function setCantidad($cantidad){$this->cantidad = $cantidad;}
    public function setBonificacion($bonificacion){$this->bonificacion = $bonificacion;}
    public function setDesclab($desclab){$this->desclab = $desclab;}
    public function setDescg($descg){$this->descg = $descg;}
    public function setEnvio($envio){$this->envio = $envio;}


    public function mostrar(){
        try{
            $conexion = $this->db;
            $query="SELECT p.id_pedido as id_pedido, 
                        p.id_usuario as id_usuario,
                        u.laboratorio as laboratorio,
                        p.producto as producto,
                        o.observacion as observacion,
                        e.estado as estado,
                        p.cliente as cliente,
                        p.fenvio as envio,
                        p.cantidad as cantidad,
                        p.bonificacion as bonificacion,
                        p.desclab as desclab,
                        p.descguardado as descguardado
                from pedidos as p 
                inner join usuarios as u on
                p.id_usuario=u.id_usuario
                inner join observaciones as o on 
                p.id_obs = o.id_obs
                inner join estado as e on
                o.id_estado = e.id_estado";
            $prepare = $conexion->prepare($query);
            $prepare->execute();

            $mostrarobj = $prepare->fetchAll();
            return $mostrarobj;


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
            $consulta = "INSERT INTO pedidos(id_usuario,id_obs,cliente,fenvio) 
                                    VALUES(:id_usuario,:id_obs,:cliente,:envio)";
            $usuario = $this->getUsuario();
            $id_obs = $this->getIdobs();
            $cliente = $this->getCliente();
            $descripcion = $this->getDescripcion();
            $cantidad = $this->getCantidad();
            $bonificacion = $this->getBonificacion();
            $desclab = $this->getDesclab();
            $descg = $this->getDescg();
            $envio = $this->getEnvio();            
            
            $prepare = $conectar->prepare($consulta); //guardamos la consulta
            $prepare->bindParam(":id_usuario", $usuario, PDO::PARAM_INT);
            $prepare->bindParam(":id_obs", $id_obs, PDO::PARAM_INT);
            $prepare->bindParam(":cliente", $cliente, PDO::PARAM_STR);
            $prepare->bindParam(":envio", $envio, PDO::PARAM_STR);
            $prepare->execute();
            //Ejecución de la consulta
            $resultado = false;
            if ($prepare){
                #VARIABLE PARA CAPTURAR EL ULTIMO DATO INSERTADO
                $captura="SELECT id_pedido from pedidos order by id_pedido desc limit 1;";
                $ejecutar = $conectar->prepare($captura);
                $ejecutar->execute();
                $resultado = $ejecutar->fetchColumn();
                for ($i=0; $i < sizeof($descripcion); $i++) { 

                    $query="INSERT INTO producto(producto,cantidad,bonificacion,desclab,descguardado,id_pedido)
                            VALUES(:producto,:cantidad,:bonificacion,:desclab,:descg,:id_pedido);
                    ";
                    $prepare = $conectar->prepare($query);
                    $prepare->bindParam(":producto",$descripcion[$i], PDO::PARAM_STR);
                    $prepare->bindParam(":cantidad",$cantidad[$i], PDO::PARAM_INT);
                    $prepare->bindParam(":bonificacion",$bonificacion[$i], PDO::PARAM_INT);
                    $prepare->bindParam(":desclab",$desclab[$i],PDO::PARAM_STR);
                    $prepare->bindParam(":descg",$descg[$i], PDO::PARAM_STR);
                    $prepare->bindParam(":id_pedido",$resultado,PDO::PARAM_INT);
                    $prepare->execute();
                }
                $resultado=true;
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