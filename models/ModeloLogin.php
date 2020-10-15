<?php

    class ModeloLogin
    {
        private $id_usuario;
        private $nombre_usuario;
        private $email;
        private $password;
        private $id_rol;
        private $db;
        
        public function __construct(){

            $this->db = Database::connect();
        }

        

        public function getId_usuario()
        {
            return $this->id_usuario;
        }

        public function setId_usuario($id_usuario)
        {
            $this->id_usuario = $id_usuario;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getId_rol()
        {
            return $this->id_rol;
        }

        public function setId_rol($id_rol)
        {
            $this->id_rol = $id_rol;
        }

        public function getNombre_usuario()
        {
            return $this->nombre_usuario;
        }

        public function setNombre_usuario($nombre_usuario)
        {
            $this->nombre_usuario = $nombre_usuario;
        }

        public function buscar(){

            try{
    
                $conectar = $this->db;

                $email = $this->getEmail();
                $password = $this->getPassword();
                
                $consulta = "SELECT * FROM usuarios WHERE correo = :email";
                $prepare = $conectar->prepare($consulta);
                $prepare->bindParam(":email", $email, PDO::PARAM_STR);
                $prepare->execute();
                $prepare->rowCount();

                if ($prepare>0) {
                    
                    
                    $encontrado = 0;

                    while($row = $prepare->fetch(PDO::FETCH_ASSOC)){
                        
                        
                        if ($password == $row['password'] && $email == $row['correo']) {
                            $this->setId_usuario($row["id_usuario"]);
                            $this->setId_rol($row["id_rol"]);
                            $this->setNombre_usuario($row["nombre_usuario"]);
                            $encontrado = 1;
                            return $encontrado;   
                        }
                            
                    }

                }else {

                    header("Location: index.php");
                    
                }
                
                
                
                
                Database::closeConnect($conectar);
                
    
            }catch (Exception $e) {
    
                echo "Hubo un problema en la conexión: " . $e->getMessage();
    
            }
    
        }
        
        public function ValidarSesion(){
            if (isset($_COOKIE["acceso"])) {
                
                if ($_COOKIE["acceso"] != "grupoGuardado" ) {
                    header("location:index.php");
                }
            }else {
                header("location:index.php");
            }
    
        }
    
        public function Salir(){
            setcookie("acceso","grupoGuardado", time()-3600);
            setcookie("nombre",$row['nombre_usuario'], time()-3600);
            setcookie("id",$row['id_usuario'], time()-3600);
            setcookie("correo",$row['correo'], time()-3600);
            setcookie("rol",$row['rol'], time()+3600);
            header("location:index.php");
        }

    }
    