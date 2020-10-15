<?php
class ModeloGraficos{
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }
    public function mostrar(){
        try{
            $conexion = $this->db;
            $query="SELECT e.estado,count(p.id_pedido) as cantidad
            from pedidos as p
            inner join observaciones as o on
            p.id_obs = o.id_obs
            inner join estado as e on
            o.id_estado = e.id_estado
            group by e.estado";
            $prepare = $conexion->prepare($query);
            $prepare->execute();

            $res = $prepare->fetchAll();
            return $res;


        }catch(PDOException $x){
            echo "Error: ".$x->getMessage()." <br>";
        }
    }
}

?>