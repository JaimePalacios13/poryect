<?php
Class UsuarioModelo {
    
    
    private $id_usuario;
    private $nombre_usuario;
    private $correo;
    private $password;
    private $id_rol;
    private $laboratorio;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }
	public function getId_usuario(){
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    public function getNombre_usuario(){
        return $this->nombre_usuario;
    }

    public function setNombre_usuario($nombre_usuario){
        $this->nombre_usuario = $nombre_usuario;//$this->db->real_escape_string($nombre_usuario);
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo = $correo; // $this->db->real_escape_string($correo);
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;//password_hash($this->db->real_escape_string($password),PASSWORD_BCRYPT,['cost' => 4]);
    }

    public function getId_rol(){
        return $this->id_rol;
    }

    public function setId_rol($id_rol){
        $this->id_rol = $id_rol;
    }

    public function getLaboratorio(){
        return $this->laboratorio;
    }

    public function setLaboratorio($laboratorio){
        $this->laboratorio = $laboratorio;//$this->db->real_escape_string($laboratorio);
    }


    public function update(){

        try{


            $conectar = $this->db;

            $consulta = "UPDATE usuarios 
                            SET 
                            nombre_usuario = :nombre_usuario,
                            id_rol = :id_rol,
                            correo = :correo,
                            laboratorio = :laboratorio
                        WHERE id_usuario = :id_usuario";


            $nombre_usuario = $this->getNombre_usuario();
            $correo = $this->getCorreo();
            $id_rol = $this->getId_rol();
            $laboratorio = $this->getLaboratorio();
            $id_usuario = $this->getId_usuario();

            $prepare = $conectar->prepare($consulta);
            
            $prepare->bindParam(":nombre_usuario", $nombre_usuario, PDO::PARAM_STR);
            $prepare->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
            $prepare->bindParam(":correo", $correo, PDO::PARAM_STR);
            $prepare->bindParam(":laboratorio", $laboratorio, PDO::PARAM_STR);
            $prepare->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
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





    public function save(){
        
        
        /* $sql="INSERT INTO usuarios(nombre_usuario, correo, password, id_rol, laboratorio) 
        VALUES('{$this->getNombre_usuario()}','{$this->getCorreo()}','{$this->getPassword()}',{$this->getId_rol()},'{$this->getLaboratorio()}')";
        
        
        $save = $this->db->query($sql); */

        try{

            $conectar = $this->db;

             
    
            $nombre_usuario = $this->getNombre_usuario();
            $correo = $this->getCorreo();
            $password = $this->getPassword();
            $id_rol = $this->getId_rol();
            $laboratorio = $this->getLaboratorio();

            /* VERIFICAREMOS SI HAY UN GMAIL YA INGRESADO, PARA ELLO VERIFICAREMOS EN LA BD CON LO SIGUIENTE */
            
            $consulta = "SELECT * FROM usuarios WHERE correo = :email";
            $prepare = $conectar->prepare($consulta);
            $prepare->bindParam(":email", $correo, PDO::PARAM_STR);
            $prepare->execute();
            $num = $prepare->rowCount();
            if ($num > 0) {
                
                $resultado = false;

            }else {
                
                $consulta = "INSERT INTO usuarios 
                                            (nombre_usuario, 
                                            id_rol, 
                                            correo, 
                                            password, 
                                            laboratorio)
                                    VALUES(:nombre_usuario, 
                                            :id_rol, 
                                            :correo, 
                                            :password, 
                                            :laboratorio)";
                $prepare = $conectar->prepare($consulta); //guardamos la consulta

                $prepare->bindParam(":nombre_usuario", $nombre_usuario, PDO::PARAM_STR);
                $prepare->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
                $prepare->bindParam(":correo", $correo, PDO::PARAM_STR);
                $prepare->bindParam(":password", $password, PDO::PARAM_STR);
                $prepare->bindParam(":laboratorio", $laboratorio, PDO::PARAM_STR);
                $prepare->execute();
                //Ejecución de la consulta
                $resultado = false;
                if ($prepare){
                    $resultado = true;
                    /* return $resultado; */
        
                }

            }

            
            
        }catch(PDOException $x){
            echo "Error: ".$x->getMessage()." <br>";
        }
        
            return $resultado;
    }


    public function mostrar(){
        $conectar = $this->db;
        /* $sql="SELECT u.nombre_usuario, u.correo, u.laboratorio, r.rol FROM usuarios as u inner join roles as r 
        on u.id_rol=r.id_rol"; */
        $sql="SELECT u.id_usuario,u.nombre_usuario, u.correo, u.laboratorio, r.rol, r.id_rol as id_rol FROM usuarios as u inner join roles as r 
        on u.id_rol=r.id_rol ";//ORDER BY  id_usuario DESC
        $prepare = $conectar->prepare($sql);
        $prepare ->execute();

        $resultado = $prepare->fetchAll();
        return $resultado;
    }

    public function delete(){
        $conectar = $this->db;
        $sql="DELETE FROM usuarios where id_usuario = :id_usuario";
        $id_usuario = $this->getId_usuario();
        $prepare = $conectar->prepare($sql);
        $prepare->bindParam(":id_usuario",$id_usuario, PDO::PARAM_STR);
        $prepare->execute();

        $resultado = false;
        if ($prepare) {
            $resultado=true;
        }
        return $resultado;
    }

    public function recuperarpwd(){
        $conectar = $this->db;
        $sql="UPDATE usuarios SET 
        password = :pwd
        WHERE id_usuario = :id_usuario";

        $id_usuario = $this->getId_usuario();
        $pwd = 'Guardado2020';#contraseña para reestablecer 
        $password = passwordEncrypt::encryption($pwd);#encriptado de la contraseña Guardado2020
        $prepare = $conectar->prepare($sql);
        $prepare->bindParam(":id_usuario",$id_usuario,PDO::PARAM_INT);
        $prepare->bindParam(":pwd",$password,PDO::PARAM_STR);
        $prepare->execute();

        $resultado = false;
        if ($prepare) {
            $resultado=true;
        }
        return $resultado;
        
    }

}