<?php 

class userModelo{
    
    private $nombre_usuario;
    private $correo;
    private $password;
    private $rol;
    private $laboratorio;
    private $id_rol;
    private $mensaje;
    private $db;
    private $close;

    //ESTABLECER CONEXIÖN
    public function __Construct(){
        $this->db  = Database::connect();
    }


/*     public function BuscarCorreo(){

        // Si el resultado de este método es  mayor a cero no se puede actualizar

        try{

            $conexion = $this->db;

            $consulta = "SELECT count(*) from usuarios where correo = :email and id_usuario != :id_usuario";
            $prepare = $conexion->prepare($consulta);

            //llamar a las cookies

            $id_usuario =  $_SESSION["id_usuario"];
            $correo = $this->getCorreo();

            $prepare->bindParam(":email", $correo , PDO::PARAM_STR);
            $prepare->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);

            $prepare->execute();
            $resultado = $prepare->fetchAll();

        }catch(PDOException $x){

            echo "Error: ".$x->getMessage();

        }

        return $resultado;
    } */


    public function BuscarContrasenia(){


        try{

            $conectar = $this->db;
        
            $id_usuario = $_SESSION["id_usuario"];
            $consulta = "SELECT U.password AS password FROM usuarios U  WHERE id_usuario = :id_usuario";
            $prepare = $conectar->prepare($consulta);
            $prepare->bindParam(":id_usuario", $id_usuario,PDO::PARAM_INT);
            $prepare->execute();
    
            $verificarPwd= $prepare->fetch(PDO::FETCH_ASSOC);

            return $verificarPwd;    

        }catch(PDOException $x){

            echo "Error".$x->getMessage();

        }


    }


    public function UpdatePassword(){


        try{

            $conectar = $this->db;

            $consulta = "UPDATE usuarios U 
                            set U.password = :pwd
                            where U.id_usuario = :id_usuario";

            $prepare = $conectar->prepare($consulta);

            $password = $this->getPassword();
            $idUsuario = $_SESSION["id_usuario"];//$this->getId();

            $prepare->bindParam(":pwd", $password, PDO::PARAM_STR);
            $prepare->bindParam(":id_usuario",$idUsuario, PDO::PARAM_INT);

            $resultado = false;

            if ($prepare->execute()){

                $resultado = true;
            }


        }catch(PDOException $x){

            echo "Error".$x->getMessage();

        }

        return $resultado;

    }



 

    public function ModificarDatos(){

        try{

            //llamar la conexion
            $conectar = $this->db;

            $consulta = "UPDATE usuarios U 
                            set U.nombre_usuario = :nombre_usuario
                            where U.id_usuario = :id_usuario"; 

            $prepare = $conectar->prepare($consulta);

            
            //$correo = $this->getCorreo();
            $nombre_usuario = $this->getNombre_usuario();


            $idUsuario = $_SESSION["id_usuario"];//$this->getId();
            $prepare->bindParam(":id_usuario",$idUsuario, PDO::PARAM_INT);
            //$prepare->bindParam(":correo", $correo, PDO::PARAM_STR);
            $prepare->bindParam(":nombre_usuario", $nombre_usuario, PDO::PARAM_STR);

            $resultado = false;

            if ($prepare->execute()){

                $resultado = true;
            }

        }catch(PDOException $x){
            echo "Error: ".$x->getMessage()." <br>";
        }

        return $resultado;
    }



    // LLENAR LOS INPUT DEL FORMULARIO

    public function MostrarDatos(){
        
        try{

            $conectar = $this->db;
            $consulta = "SELECT U.id_usuario as id_usuario, U.nombre_usuario as nombre_usuario, U.correo as correo,
                            U.password as pwd , U.id_rol as id_rol, U.laboratorio as laboratorio, R.rol as rol 
                    from usuarios U Inner join roles R
                    on U.id_usuario = :id_usuario
                    where R.id_rol = :id_rol ";


/*             echo $idUser = $this->getId();
            echo $idRol = $this->getRol();

            var_dump($idUser);
            var_dump($idRol);

            die() */;

            $idUser = $_SESSION["id_usuario"];
            $idRol = $_SESSION["id_rol"];

            $prepare = $conectar->prepare($consulta);
            $prepare->bindParam(":id_usuario",$idUser,PDO::PARAM_INT);
            $prepare->bindParam(":id_rol",$idRol,PDO::PARAM_INT);
            $prepare->execute();

            $row = $prepare->fetch(PDO::FETCH_ASSOC);

            return $row;

        }catch(PDOException $x){
            echo "Error: ".$x->getMessage()." <br>";
        }


    }





    /**
     * Get the value of nombre_usuario
     */ 
    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * Set the value of nombre_usuario
     *
     * @return  self
     */ 
    public function setNombre_usuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;

        return $this;
    }





    

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of laboratorio
     */ 
    public function getLaboratorio()
    {
        return $this->laboratorio;
    }

    /**
     * Set the value of laboratorio
     *
     * @return  self
     */ 
    public function setLaboratorio($laboratorio)
    {
        $this->laboratorio = $laboratorio;

        return $this;
    }

    /**
     * Get the value of id_rol
     */ 
    public function getId_rol()
    {
        return $this->id_rol;
    }

    /**
     * Set the value of id_rol
     *
     * @return  self
     */ 
    public function setId_rol($id_rol)
    {
        $this->id_rol = $id_rol;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}

//modelo perfil - perfil controller - vistas del perfil (2)- header - alertas