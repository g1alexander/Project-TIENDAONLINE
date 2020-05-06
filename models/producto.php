<?php 


class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;

    public function __construct(){
        $this ->db =  Database::connect(); //accedemos a la base de datos
    }

    function getId() {
        return $this->id;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getOferta() {
        return $this->oferta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setOferta($oferta) {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getAll(){
         /* METODO getAll(), NOS RETORNARA TODAS LAS PRODUCTOS LISTADOS DENTRO
    DE LA BASE DE DATOS
    views/producto/gestion.php
    */
        $productos = $this ->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }

    public function getAllCategoria(){
        /* METODO QUE NOS PERMITE EL PRODUCTO ESPECIFICO DE UNA CATEGORIA 
         controllers/categoriaController.php
        */
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p "
        . "INNER JOIN categorias c ON c.id = p.categoria_id "
        . "WHERE p.categoria_id = {$this->getCategoria_id()} "
        . "ORDER BY id DESC";
        $productos = $this->db->query($sql);
       return $productos;
   }

    public function getRandom($limit){
        /* HAREMOS APARECER PRODUCTOS ALETORIOS ATRAVES DE ESTE METODO CON UN LIMITE Y LO USAMOS
        controllers/productoController.php
        */
        $producto = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $producto;
    }

    public function getOne(){
         /* ESTE METODO LOS PERMITIRA VER QUE PRODUCTO VAMOS A MODIFICAR Y LO MOSTRAREMOS EN EL 
        FORMULARIO DE views/producto/crear.php EN LA PARTE DE EDICION DE PRODUCTO 
    */
        $productos = $this ->db->query("SELECT * FROM productos WHERE id={$this->getId()}");
        return $productos->fetch_object(); //devuelvo un objeto ya utilizable
    }

    public function save(){
        /* ESTE METODO LOS PERMITIRA GUARDAR UNA PRODUCTO  EN EL 
        FORMULARIO DE views/producto/crear.php EN LA PARTE DE CREACION DE PRODUCTO 
    */
		$sql = "INSERT INTO productos VALUES(NULL, {$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, null, CURDATE(), '{$this->getImagen()}')";
		$save = $this->db->query($sql);
        
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }
    

    public function edit(){
    /* ESTE METODO LOS PERMITIRA EDITAR UN PRODUCTO  EN EL 
        FORMULARIO DE views/producto/crear.php EN LA PARTE DE CREACION DE PRODUCTO 
    */
		$sql = "UPDATE productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()}, categoria_id={$this->getCategoria_id()}  ";
		
		if($this->getImagen() != null){
			$sql .= ", imagen='{$this->getImagen()}'";
		}
		
		$sql .= " WHERE id={$this->id};";
		$save = $this->db->query($sql);
        
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }

    public function delete(){
            /* ESTE METODO LOS PERMITIRA ELIMINAR UN PRODUCTO  EN EL 
        FORMULARIO DE views/producto/gestion.php 
    */
        $sql = "DELETE FROM productos WHERE id={$this->getId()}";
        $delete = $this->db->query($sql);
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
    }

}
?>