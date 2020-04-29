<?php 
/*
CREAMOS UN MODELO DE LA ENTIDAD DE CATEGORIA
(UNA ENTIDAD QUE REPRESENTA UN REGISTRO DE LA BASE DE DATOS) 
LO CUAL REGISTRARA UN CATEGORIA

- MEZCLAMOS LOS MODELOS DE CONSULTAS
 */

class Categoria{
    private $id;
    private $nombre;
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

    function setId($id){
        $this ->id = $id;
    }

    function setNombre($nombre){
        $this ->nombre = $this->db->real_escape_string($nombre);;
    }

    /* METODO GETCATEGORIAS, NOS RETORNARA TODAS LAS CATEGORIAS LISTA DENTRO
    DE LA BASE DE DATOS */
    public function getCategorias() {
        $categorias=$this->db->query('SELECT * FROM categorias ORDER BY id DESC;');
        return $categorias;
    }

    public function save(){
        $sql = "INSERT INTO categorias VALUES (NULL,'{$this->getNombre()}') ";
        $save = $this ->db->query($sql);

        $result = false;
        if($save){
            $result=true;
        }
        return $result;
    }
}
?>