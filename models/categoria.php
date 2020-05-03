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

    public function getCategorias() {
            /* METODO GETCATEGORIAS, NOS RETORNARA TODAS LAS CATEGORIAS LISTA DENTRO
    DE LA BASE DE DATOS */
        $categorias=$this->db->query('SELECT * FROM categorias ORDER BY id DESC;');
        return $categorias;
    }

    public function getOne(){
            /* ESTE METODO LOS PERMITIRA VER QUE CATEGORIA VAMOS A MODIFICAR Y LO MOSTRAREMOS EN EL 
        FORMULARIO DE views/categoria/crear.php EN LA PARTE DE EDICION DE CATEGORIA 
    */
        $categorias = $this ->db->query("SELECT * FROM categorias WHERE id={$this->getId()}");
        return $categorias->fetch_object(); //devuelvo un objeto ya utilizable
    }

    public function save(){
            /* ESTE METODO LOS PERMITIRA GUARDAR UNA CATEGORIA  EN EL 
        FORMULARIO DE views/categoria/crear.php EN LA PARTE DE CREACION DE CATEGORIA 
    */
        $sql = "INSERT INTO categorias VALUES (NULL,'{$this->getNombre()}') ";
        $save = $this ->db->query($sql);

        $result = false;
        if($save){
            $result=true;
        }
        return $result;
    }


    public function edit(){
            /* ESTE METODO LOS PERMITIRA EDITAR UNA CATEGORIA  EN EL 
        FORMULARIO DE views/categoria/crear.php EN LA PARTE DE CREACION DE CATEGORIA 
    */
		$sql = "UPDATE categorias SET nombre='{$this->getNombre()}'";
		$sql .= " WHERE id={$this->id};";
		$save = $this->db->query($sql);
        
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }

    public function delete(){
           /* ESTE METODO LOS PERMITIRA ELIMINAR UN CATEGORIA  EN EL 
        FORMULARIO DE views/categoria/index.php EN LA PARTE DE CREACION DE CATEGORIA 
    */
        $sql = "DELETE FROM categorias WHERE id={$this->getId()}";
        $delete = $this->db->query($sql);
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
    }
}
?>