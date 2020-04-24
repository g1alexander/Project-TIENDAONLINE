<?php 
/*
CREAMOS UN MODELO DE LA ENTIDAD DE USUSARIO
(UNA ENTIDAD QUE REPRESENTA UN REGISTRO DE LA BASE DE DATOS) 
LO CUAL REPRESENTARA UN USUARIO

- MEZCLAMOS LOS MODELOS DE CONSULTAS
 */

class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;

    public function __construct(){
        $this ->db =  Database::connect(); //accedemos a la base de datos
    }

    function getId(){
        return $this->id;
    }
    
    function getNombre(){
        return $this->nombre; 
    }
    function getApellidos(){
        return $this->apellidos;
    }
    function getEmail(){
        return $this->email;
    }
    function getPassword(){
        return $this->password; 
        //encriptamos la contraseña del usuario
    }
    function getRol(){
        return $this->rol;
    }
    function getImagen(){
        return $this->imagen;
    }

    function setId($id){
        $this ->id = $id;
    }
    /* ESCAPAMOS LOS DATOS DEL FORMULARIO ES PARA QUE LA INFORMACION NO SEA SUSCEPTIBLE A 
        MANIPULACIONES
    */
    function setNombre($nombre){
        $this ->nombre = $this->db->real_escape_string($nombre);
    }
    function setApellidos($apellidos){
        $this ->apellidos = $this->db->real_escape_string($apellidos);
    }
    function setEmail($email){
        $this ->email = $this->db->real_escape_string($email);
    }
    function setPassword($password){
        $this ->password = password_hash($this->db->real_escape_string($password),PASSWORD_BCRYPT,['cost' =>4]);
    }
    function setRol($rol){
        $this ->rol = $rol;
    }
    function setImagen($imagen){
        $this ->imagen = $imagen;
    }
    public function save(){
        $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}',
        '{$this->getPassword()}','user',null)";
        $save = $this ->db->query($sql);

        $result = false;
        if($save){
            $result=true;
        }
        return $result;
    }

}

?>