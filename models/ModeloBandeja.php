<?php

    class ModeloBandeja
    {

        private $db;
        private $id_pedido;
        private $notificaciones;
        private $id_obs;
        public function __construct(){
            $this->db = Database::connect();
        }

        public function getId_pedido()
        {
                return $this->id_pedido;
        }

        public function setId_pedido($id_pedido)
        {
                $this->id_pedido = $id_pedido;

                return $this;
        }

        public function getNotificaciones()
        {
                return $this->notificaciones;
        }
        public function setNotificaciones($notificaciones)
        {
                $this->notificaciones = $notificaciones;
        }
        public function getIdobs(){
            return $this->id_obs;
        }
        public function setIdobs($id_obs){
            $this->id_obs = $id_obs;
        }

        public function autorizacionLaboratorio(){

            try {
                $conexion = $this->db;
                $estado = "AUTORIZACION DEL LABORATORIO";
                $id_usuario = $_SESSION["id_usuario"];
                $rol = $_SESSION["id_rol"];
                if ($rol ==3 ) {
                $consulta = "SELECT p.id_pedido as pedido, 
                            p.cliente as cliente, 
                            p.fenvio as envio,
                            p.id_obs as id_obs,
                            p.id_usuario as id_usuario,  
                            u.nombre_usuario as usuario,
                            u.laboratorio as laboratorio, 
                            o.observacion as observacion,
                            e.estado as estado,
                            prod.producto as producto,
                            prod.cantidad as cantidad,
                            prod.bonificacion as bonificacion,
                            prod.desclab as desclab, 
                            prod.descguardado as descguardado, 
                            p.leido as leido 
                            FROM pedidos as p
                            inner join usuarios as u 
                                on p.id_usuario = u.id_usuario
                            inner join observaciones as o 
                                on p.id_obs = o.id_obs
                            inner join estado as e 
                                on o.id_estado = e.id_estado
                            inner join producto as prod 
                                on prod.id_pedido = p.id_pedido
                                WHERE e.estado = :estado and p.id_usuario = :id_usuario
                            GROUP BY p.id_pedido
                            order by envio desc
                            ";

                $prepare = $conexion->prepare($consulta);
                $prepare->bindParam(":estado",$estado, PDO::PARAM_STR);
                $prepare->bindParam(":id_usuario",$id_usuario, PDO::PARAM_INT);
                $prepare->execute();
                $resultado = $prepare->fetchAll();
                
                return $resultado;
                
                }else{
                $consulta = "SELECT p.id_pedido as pedido, 
                            p.cliente as cliente, 
                            p.fenvio as envio,
                            p.id_obs as id_obs,
                            p.id_usuario as id_usuario,
                            p.visto_x as visto,  
                            u.nombre_usuario as usuario,
                            u.laboratorio as laboratorio, 
                            o.observacion as observacion,
                            e.estado as estado,
                            prod.producto as producto,
                            prod.cantidad as cantidad,
                            prod.bonificacion as bonificacion,
                            prod.desclab as desclab, 
                            prod.descguardado as descguardado, 
                            p.leido as leido 
                            FROM pedidos as p
                            inner join usuarios as u 
                                on p.id_usuario = u.id_usuario
                            inner join observaciones as o 
                                on p.id_obs = o.id_obs
                            inner join estado as e 
                                on o.id_estado = e.id_estado
                            inner join producto as prod 
                                on prod.id_pedido = p.id_pedido
                                WHERE e.estado = :estado
                            GROUP BY p.id_pedido
                            order by envio desc
                            ";
                        
                $prepare = $conexion->prepare($consulta);
                $prepare->bindParam(":estado",$estado, PDO::PARAM_STR);
                $prepare->execute();
                $resultado = $prepare->fetchAll();
                
                return $resultado;
                }

            }catch(PDOException $x){

                echo "Error: ".$x->getMessage()." <br>";

            }

        }


        public function autorizacionDrogueria(){
            $conexion = $this->db;
            $estado = "AUTORIZACION DE DROGUERIA";
            $id_usuario = $_SESSION["id_usuario"];
            $rol = $_SESSION["id_rol"];
            
            try {
            if ($rol == 3) {
                $consulta = "SELECT p.id_pedido as pedido, 
                                    p.cliente as cliente, 
                                    p.fenvio as envio,
                                    p.id_obs as id_obs,
                                    p.id_usuario as id_usuario,  
                                    u.nombre_usuario as usuario,
                                    u.laboratorio as laboratorio, 
                                    o.observacion as observacion,
                                    e.estado as estado,
                                    prod.producto as producto,
                                    prod.cantidad as cantidad,
                                    prod.bonificacion as bonificacion,
                                    prod.desclab as desclab, 
                                    prod.descguardado as descguardado, 
                                    p.leido as leido 
                                    FROM pedidos as p
                                    inner join usuarios as u 
                                    on p.id_usuario = u.id_usuario
                                    inner join observaciones as o 
                                    on p.id_obs = o.id_obs
                                    inner join estado as e 
                                    on o.id_estado = e.id_estado
                                    inner join producto as prod 
                                    on prod.id_pedido = p.id_pedido
                                    WHERE e.estado = :estado and p.id_usuario = :id_usuario
                            GROUP BY p.id_pedido
                            order by envio desc
                            ";
                        
                $prepare = $conexion->prepare($consulta);
                $prepare->bindParam(":estado",$estado, PDO::PARAM_STR);
                $prepare->bindParam(":id_usuario",$id_usuario, PDO::PARAM_INT);
                $prepare->execute();
                $resultado = $prepare->fetchAll();
                
                return $resultado;
                
            }else{
                $consulta = "SELECT p.id_pedido as pedido, 
                                    p.cliente as cliente, 
                                    p.fenvio as envio,
                                    p.id_obs as id_obs,
                                    p.id_usuario as id_usuario,
                                    p.visto_x as visto,  
                                    u.nombre_usuario as usuario,
                                    u.laboratorio as laboratorio, 
                                    o.observacion as observacion,
                                    e.estado as estado,
                                    prod.producto as producto,
                                    prod.cantidad as cantidad,
                                    prod.bonificacion as bonificacion,
                                    prod.desclab as desclab, 
                                    prod.descguardado as descguardado, 
                                    p.leido as leido 
                                    FROM pedidos as p
                                    inner join usuarios as u 
                                    on p.id_usuario = u.id_usuario
                                    inner join observaciones as o 
                                    on p.id_obs = o.id_obs
                                    inner join estado as e 
                                    on o.id_estado = e.id_estado
                                    inner join producto as prod 
                                    on prod.id_pedido = p.id_pedido
                                    WHERE e.estado = :estado 
                            GROUP BY p.id_pedido
                            order by envio desc
                            ";
                        
                $prepare = $conexion->prepare($consulta);
                $prepare->bindParam(":estado",$estado, PDO::PARAM_STR);
                $prepare->execute();
                $resultado = $prepare->fetchAll();
                
                return $resultado;
            }

            }catch(PDOException $x){

                echo "Error: ".$x->getMessage()." <br>";

            }
        }

        public function facturacion(){
            try {
            $conexion = $this->db;
            $estado = "FACTURADO";
            $id_usuario = $_SESSION["id_usuario"];
            $rol = $_SESSION["id_rol"];
                if ($rol == 3) {
                $consulta = "SELECT p.id_pedido as pedido, 
                                    p.cliente as cliente, 
                                    p.fenvio as envio,
                                    p.id_obs as id_obs,
                                    p.id_usuario as id_usuario,  
                                    u.nombre_usuario as usuario,
                                    u.laboratorio as laboratorio, 
                                    o.observacion as observacion,
                                    e.estado as estado,
                                    prod.producto as producto,
                                    prod.cantidad as cantidad,
                                    prod.bonificacion as bonificacion,
                                    prod.desclab as desclab, 
                                    prod.descguardado as descguardado, 
                                    p.leido as leido 
                            FROM pedidos as p
                                        inner join usuarios as u 
                                            on p.id_usuario = u.id_usuario
                                        inner join observaciones as o 
                                            on p.id_obs = o.id_obs
                                        inner join estado as e 
                                            on o.id_estado = e.id_estado
                                        inner join producto as prod 
                                            on prod.id_pedido = p.id_pedido
                                    WHERE e.estado = :estado and p.id_usuario = :id_usuario
                            GROUP BY p.id_pedido
                            order by envio desc
                            ";
                        
                $prepare = $conexion->prepare($consulta);
                $prepare->bindParam(":estado",$estado, PDO::PARAM_STR);
                $prepare->bindParam(":id_usuario",$id_usuario, PDO::PARAM_INT);
                $prepare->execute();
                $resultado = $prepare->fetchAll();
                
                return $resultado;
                }else{
                $consulta = "SELECT p.id_pedido as pedido, 
                                    p.cliente as cliente, 
                                    p.fenvio as envio,
                                    p.id_obs as id_obs,
                                    p.id_usuario as id_usuario,
                                    p.visto_x as visto,  
                                    u.nombre_usuario as usuario,
                                    u.laboratorio as laboratorio, 
                                    o.observacion as observacion,
                                    e.estado as estado,
                                    prod.producto as producto,
                                    prod.cantidad as cantidad,
                                    prod.bonificacion as bonificacion,
                                    prod.desclab as desclab, 
                                    prod.descguardado as descguardado, 
                                    p.leido as leido 
                                    FROM pedidos as p
                                        inner join usuarios as u 
                                            on p.id_usuario = u.id_usuario
                                        inner join observaciones as o 
                                            on p.id_obs = o.id_obs
                                        inner join estado as e 
                                            on o.id_estado = e.id_estado
                                        inner join producto as prod 
                                            on prod.id_pedido = p.id_pedido
                                    WHERE e.estado = :estado
                            GROUP BY p.id_pedido
                            order by envio desc
                            ";
                        
                $prepare = $conexion->prepare($consulta);
                $prepare->bindParam(":estado",$estado, PDO::PARAM_STR);
                $prepare->execute();
                $resultado = $prepare->fetchAll();
                
                return $resultado;
                }

            }catch(PDOException $x){

                echo "Error: ".$x->getMessage()." <br>";

            }
        }

        // método 1
        public function consulta(){#trae todos los enviados


			try{

				$conectar = $this->db;
                $estado = "ENVIADO";
                $id_usuario = $_SESSION["id_usuario"];
                $rol = $_SESSION["id_rol"];
                if ($rol !=3) {#condicion para seleccionar los mensajes generales cuando el idrol sea distinto de visitador se le cargara al admin y a facturacion todos los mensajes
                $consulta = "SELECT p.id_pedido as pedido, 
                                            p.cliente as cliente, 
                                            p.fenvio as envio,
                                            p.id_obs as id_obs,
                                            p.id_usuario as id_usuario,
                                            p.visto_x as visto,  
                                            u.nombre_usuario as usuario,
                                            u.laboratorio as laboratorio, 
                                            o.observacion as observacion,
                                            e.estado as estado,
                                            prod.producto as producto,
                                            prod.cantidad as cantidad,
                                            prod.bonificacion as bonificacion,
                                            prod.desclab as desclab, 
                                            prod.descguardado as descguardado, 
                                            p.leido as leido 
                                            FROM pedidos as p 
                                            inner join usuarios as u on 
                                            p.id_usuario = u.id_usuario 
                                            inner join observaciones as o on 
                                            p.id_obs = o.id_obs 
                                            inner join estado as e on 
                                            o.id_estado = e.id_estado 
                                            inner join producto as prod 
                                            on prod.id_pedido = p.id_pedido 
                                            WHERE e.estado = :estado 
                                            GROUP BY p.id_pedido
                                            order by envio desc";
                $prepare = $conectar->prepare($consulta);
                $prepare->bindParam(":estado",$estado, PDO::PARAM_STR);
                
                $prepare->execute();
                $informacion = $prepare->fetchAll();
                return $informacion;

                }else{#pero si es visitador se le cargaran solo los que el a mandado 
                $consulta = "SELECT p.id_pedido as pedido, 
                                            p.cliente as cliente, 
                                            p.fenvio as envio,
                                            p.id_obs as id_obs,
                                            p.id_usuario as id_usuario,  
                                            u.nombre_usuario as usuario,
                                            u.laboratorio as laboratorio, 
                                            o.observacion as observacion,
                                            e.estado as estado,
                                            prod.producto as producto,
                                            prod.cantidad as cantidad,
                                            prod.bonificacion as bonificacion,
                                            prod.desclab as desclab, 
                                            prod.descguardado as descguardado, 
                                            p.leido as leido 
                                            FROM pedidos as p 
                                            inner join usuarios as u on 
                                            p.id_usuario = u.id_usuario 
                                            inner join observaciones as o on 
                                            p.id_obs = o.id_obs 
                                            inner join estado as e on 
                                            o.id_estado = e.id_estado 
                                            inner join producto as prod 
                                            on prod.id_pedido = p.id_pedido 
                                            WHERE e.estado = :estado and p.id_usuario = :id_usuario
                                            GROUP BY p.id_pedido
                                            order by envio desc";
                $prepare = $conectar->prepare($consulta);
                $prepare->bindParam(":estado",$estado, PDO::PARAM_STR);
                $prepare->bindParam(":id_usuario",$id_usuario, PDO::PARAM_INT);
                $prepare->execute();
                $informacion = $prepare->fetchAll();
                return $informacion;
                }



			}catch(PDOException $x){

				echo "Error ".$x->getMessage();
			}


		}

        // método 2
		public function MessageView(){

			try{

                $conectar = $this->db;
				
                if ($_SESSION["id_rol"] == 2){
                    

                    $query = "UPDATE pedidos set leido = :leido, visto_x = :vistoX where id_pedido = :id_pedido and leido=0";
                    $prepare = $conectar->prepare($query);
    
                    $leido = 1;
                    $id_pedido = $this->getId_pedido();
                    $visto = $_SESSION["nombre_usuario"]; // usuario que ha leido     
        
                    $prepare->bindParam(":leido", $leido, PDO::PARAM_INT);
                    $prepare->bindParam(":id_pedido", $id_pedido, PDO::PARAM_INT);
                    $prepare->bindParam(":vistoX", $visto, PDO::PARAM_STR);
                    $prepare = $prepare->execute();
                }

			}catch(PDOException $x){

				echo "Error ".$x->getMessage();

			}


        }
        

        public function notificaciones(){
            try{

				$conectar = $this->db;

				$consulta = "SELECT 	
                                    p.id_pedido as pedido, 
                                    p.cliente as cliente, 
                                    p.fenvio as envio, 
                                    u.nombre_usuario as usuario, 
                                    u.laboratorio as laboratorio, 
                                    o.observacion as observacion, 
                                    e.estado as estado,
                                    prod.producto as producto,
                                    prod.cantidad as cantidad,
                                    prod.bonificacion as bonificacion,
                                    prod.desclab as desclab,
                                    prod.descguardado as descguardado,
                                    p.leido as leido
                            FROM    pedidos as p
                                inner join usuarios as u 
                                    on p.id_usuario = u.id_usuario
                                inner join observaciones as o 
                                    on p.id_obs = o.id_obs
                                inner join estado as e 
                                    on o.id_estado = e.id_estado
                                inner join producto as prod 
                                    on prod.id_pedido = p.id_pedido
                            WHERE leido = 0
                            GROUP BY p.id_pedido ";

				$prepare = $conectar->prepare($consulta);
                $prepare->execute();
                $notificaciones = $prepare->rowCount();
                $this->setNotificaciones($notificaciones);

				
				return $notificaciones;



			}catch(PDOException $x){

				echo "Error ".$x->getMessage();
			}
        }
    


        //nueva consulta ---- 
        public function consultaPorID(){


			try{

				$conectar = $this->db;

				$consulta = "SELECT p.id_pedido as pedido, 
									p.cliente as cliente, 
									p.fenvio as envio,
                                    p.id_obs as id_obs,  
									u.nombre_usuario as usuario,
                                    u.correo as correo,
									u.laboratorio as laboratorio, 
									o.observacion as observacion,
									e.estado as estado,
                                    e.id_estado as id_estado, 
									prod.producto as producto,
									prod.cantidad as cantidad,
									prod.bonificacion as bonificacion,
									prod.desclab as desclab, 
									prod.descguardado as descguardado, 
                                    p.leido as leido 
                                    FROM pedidos as p 
                                    inner join usuarios as u on 
                                    p.id_usuario = u.id_usuario 
                                    inner join observaciones as o 
				on p.id_obs = o.id_obs inner join estado as e 
				on o.id_estado = e.id_estado inner join producto as prod 
				on prod.id_pedido = p.id_pedido where p.id_pedido = :id_pedido";

				$prepare = $conectar->prepare($consulta);

				$id_pedido = $this->getId_pedido();
				$prepare->bindParam(":id_pedido", $id_pedido, PDO::PARAM_INT);
				$prepare->execute();
				$informacion = $prepare->fetchAll();
				return $informacion;


			}catch(PDOException $x){

				echo "Error ".$x->getMessage();
			}


		}

        public function mod(){

        try{
            $conectar = $this->db;
            $consulta = "UPDATE pedidos SET id_obs = :id_obs WHERE id_pedido = :id_pedido";
            $id_pedido = $this->getId_pedido();
            $id_obs = $this->getIdobs();
            $prepare = $conectar->prepare($consulta);
            
            $prepare->bindParam(":id_pedido", $id_pedido, PDO::PARAM_STR);
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



    //Métodos para contar los dierentes estados de los pedidos


    public function EstadoEnviado(){
        try{

            $conectar = $this->db;

            $rol = $_SESSION["id_rol"];

            if ($rol == 3){

                            $consulta = "SELECT 	
                            p.id_pedido as pedido, 
                            p.cliente as cliente, 
                            p.fenvio as envio, 
                            u.nombre_usuario as usuario, 
                            u.laboratorio as laboratorio, 
                            o.observacion as observacion, 
                            e.estado as estado,
                            prod.producto as producto,
                            prod.cantidad as cantidad,
                            prod.bonificacion as bonificacion,
                            prod.desclab as desclab,
                            prod.descguardado as descguardado,
                            p.leido as leido
                    FROM    pedidos as p
                        inner join usuarios as u 
                            on p.id_usuario = u.id_usuario
                        inner join observaciones as o 
                            on p.id_obs = o.id_obs
                        inner join estado as e 
                            on o.id_estado = e.id_estado
                        inner join producto as prod 
                            on prod.id_pedido = p.id_pedido
                    WHERE e.estado = 'Enviado' and u.id_usuario = :id_usuario
                    GROUP BY p.id_pedido ";

            $id_usuario = $_SESSION["id_usuario"];
            $prepare = $conectar->prepare($consulta);
            $prepare->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
            $prepare->execute();
            $totalEnviados = $prepare->rowCount();

            return $totalEnviados;

            }else{

                                $consulta = "SELECT 	
                                p.id_pedido as pedido, 
                                p.cliente as cliente, 
                                p.fenvio as envio, 
                                u.nombre_usuario as usuario, 
                                u.laboratorio as laboratorio, 
                                o.observacion as observacion, 
                                e.estado as estado,
                                prod.producto as producto,
                                prod.cantidad as cantidad,
                                prod.bonificacion as bonificacion,
                                prod.desclab as desclab,
                                prod.descguardado as descguardado,
                                p.leido as leido
                        FROM    pedidos as p
                            inner join usuarios as u 
                                on p.id_usuario = u.id_usuario
                            inner join observaciones as o 
                                on p.id_obs = o.id_obs
                            inner join estado as e 
                                on o.id_estado = e.id_estado
                            inner join producto as prod 
                                on prod.id_pedido = p.id_pedido
                        WHERE e.estado = 'Enviado'
                        GROUP BY p.id_pedido ";

                $prepare = $conectar->prepare($consulta);
                $prepare->execute();
                $totalEnviados = $prepare->rowCount();

                return $totalEnviados;
            }

        }catch(PDOException $x){

            echo "Error ".$x->getMessage();
        }
    }



    // 

    public function EstadoAutorizadoLab(){
        try{

            $conectar = $this->db;

            $rol = $_SESSION["id_rol"];



            if ($rol == 3){
                

                                $consulta = "SELECT 	
                                p.id_pedido as pedido, 
                                p.cliente as cliente, 
                                p.fenvio as envio, 
                                u.nombre_usuario as usuario, 
                                u.laboratorio as laboratorio, 
                                o.observacion as observacion, 
                                e.estado as estado,
                                prod.producto as producto,
                                prod.cantidad as cantidad,
                                prod.bonificacion as bonificacion,
                                prod.desclab as desclab,
                                prod.descguardado as descguardado,
                                p.leido as leido
                        FROM    pedidos as p
                            inner join usuarios as u 
                                on p.id_usuario = u.id_usuario
                            inner join observaciones as o 
                                on p.id_obs = o.id_obs
                            inner join estado as e 
                                on o.id_estado = e.id_estado
                            inner join producto as prod 
                                on prod.id_pedido = p.id_pedido
                        WHERE e.estado = 'AUTORIZACION DEL LABORATORIO' and u.id_usuario = :id_usuario
                        GROUP BY p.id_pedido ";

                $id_usuario = $_SESSION["id_usuario"];
                $prepare = $conectar->prepare($consulta);
                $prepare->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
                $prepare->execute();

                $total = $prepare->rowCount();

                return $total;

            }else{

                                $consulta = "SELECT 	
                                p.id_pedido as pedido, 
                                p.cliente as cliente, 
                                p.fenvio as envio, 
                                u.nombre_usuario as usuario, 
                                u.laboratorio as laboratorio, 
                                o.observacion as observacion, 
                                e.estado as estado,
                                prod.producto as producto,
                                prod.cantidad as cantidad,
                                prod.bonificacion as bonificacion,
                                prod.desclab as desclab,
                                prod.descguardado as descguardado,
                                p.leido as leido
                        FROM    pedidos as p
                            inner join usuarios as u 
                                on p.id_usuario = u.id_usuario
                            inner join observaciones as o 
                                on p.id_obs = o.id_obs
                            inner join estado as e 
                                on o.id_estado = e.id_estado
                            inner join producto as prod 
                                on prod.id_pedido = p.id_pedido
                        WHERE e.estado = 'AUTORIZACION DEL LABORATORIO'
                        GROUP BY p.id_pedido ";

                $prepare = $conectar->prepare($consulta);
                $prepare->execute();

                $total = $prepare->rowCount();

                return $total;

            }            

        }catch(PDOException $x){

            echo "Error ".$x->getMessage();
        }
    }


    public function EstadoAutorizadoDrog(){
        try{

            $conectar = $this->db;

            $rol = $_SESSION["id_rol"];

            if ($rol == 3){
                                $consulta = "SELECT 	
                                p.id_pedido as pedido, 
                                p.cliente as cliente, 
                                p.fenvio as envio, 
                                u.nombre_usuario as usuario, 
                                u.laboratorio as laboratorio, 
                                o.observacion as observacion, 
                                e.estado as estado,
                                prod.producto as producto,
                                prod.cantidad as cantidad,
                                prod.bonificacion as bonificacion,
                                prod.desclab as desclab,
                                prod.descguardado as descguardado,
                                p.leido as leido
                        FROM    pedidos as p
                            inner join usuarios as u 
                                on p.id_usuario = u.id_usuario
                            inner join observaciones as o 
                                on p.id_obs = o.id_obs
                            inner join estado as e 
                                on o.id_estado = e.id_estado
                            inner join producto as prod 
                                on prod.id_pedido = p.id_pedido
                        WHERE e.estado = 'AUTORIZACION DE DROGUERIA' and u.id_usuario = :id_usuario
                        GROUP BY p.id_pedido ";

                $id_usuario = $_SESSION["id_usuario"];
                $prepare = $conectar->prepare($consulta);
                $prepare->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
                $prepare->execute();

                $total = $prepare->rowCount();

                return $total;
            }else{
                                $consulta = "SELECT 	
                                p.id_pedido as pedido, 
                                p.cliente as cliente, 
                                p.fenvio as envio, 
                                u.nombre_usuario as usuario, 
                                u.laboratorio as laboratorio, 
                                o.observacion as observacion, 
                                e.estado as estado,
                                prod.producto as producto,
                                prod.cantidad as cantidad,
                                prod.bonificacion as bonificacion,
                                prod.desclab as desclab,
                                prod.descguardado as descguardado,
                                p.leido as leido
                        FROM    pedidos as p
                            inner join usuarios as u 
                                on p.id_usuario = u.id_usuario
                            inner join observaciones as o 
                                on p.id_obs = o.id_obs
                            inner join estado as e 
                                on o.id_estado = e.id_estado
                            inner join producto as prod 
                                on prod.id_pedido = p.id_pedido
                        WHERE e.estado = 'AUTORIZACION DE DROGUERIA'
                        GROUP BY p.id_pedido ";

                $prepare = $conectar->prepare($consulta);
                $prepare->execute();

                $total = $prepare->rowCount();

                return $total;
            }

        }catch(PDOException $x){

            echo "Error ".$x->getMessage();
        }
    }


    public function EstadoFacturado(){
        try{

            $conectar = $this->db;

            $rol = $_SESSION["id_rol"];


            if ($rol == 3){

                                $consulta = "SELECT 	
                                p.id_pedido as pedido, 
                                p.cliente as cliente, 
                                p.fenvio as envio, 
                                u.nombre_usuario as usuario, 
                                u.laboratorio as laboratorio, 
                                o.observacion as observacion, 
                                e.estado as estado,
                                prod.producto as producto,
                                prod.cantidad as cantidad,
                                prod.bonificacion as bonificacion,
                                prod.desclab as desclab,
                                prod.descguardado as descguardado,
                                p.leido as leido
                        FROM    pedidos as p
                            inner join usuarios as u 
                                on p.id_usuario = u.id_usuario
                            inner join observaciones as o 
                                on p.id_obs = o.id_obs
                            inner join estado as e 
                                on o.id_estado = e.id_estado
                            inner join producto as prod 
                                on prod.id_pedido = p.id_pedido
                        WHERE e.estado = 'FACTURADO' and u.id_usuario = :id_usuario
                        GROUP BY p.id_pedido ";

                $id_usuario = $_SESSION["id_usuario"];
                $prepare = $conectar->prepare($consulta);
                $prepare->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
                $prepare->execute();
                $total = $prepare->rowCount();

                return $total;
            }else{

                            $consulta = "SELECT 	
                            p.id_pedido as pedido, 
                            p.cliente as cliente, 
                            p.fenvio as envio, 
                            u.nombre_usuario as usuario, 
                            u.laboratorio as laboratorio, 
                            o.observacion as observacion, 
                            e.estado as estado,
                            prod.producto as producto,
                            prod.cantidad as cantidad,
                            prod.bonificacion as bonificacion,
                            prod.desclab as desclab,
                            prod.descguardado as descguardado,
                            p.leido as leido
                    FROM    pedidos as p
                        inner join usuarios as u 
                            on p.id_usuario = u.id_usuario
                        inner join observaciones as o 
                            on p.id_obs = o.id_obs
                        inner join estado as e 
                            on o.id_estado = e.id_estado
                        inner join producto as prod 
                            on prod.id_pedido = p.id_pedido
                    WHERE e.estado = 'FACTURADO'
                    GROUP BY p.id_pedido ";

            $prepare = $conectar->prepare($consulta);
            $prepare->execute();
            $total = $prepare->rowCount();

            return $total;

            }

        }catch(PDOException $x){

            echo "Error ".$x->getMessage();
        }
    }

}