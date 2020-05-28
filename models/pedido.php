<?php 


class Pedido{
    private $id;
    private $usuario_id;
    private $departamento;
    private $municipio;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

    public function __construct(){
        $this ->db =  Database::connect(); //accedemos a la base de datos
    }
    
    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function getMunicipio() {
        return $this->municipio;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setDepartamento($departamento) {
        $this->departamento = $this->db->real_escape_string($departamento);
    }

    function setMunicipio($municipio) {
        $this->municipio = $this->db->real_escape_string($municipio);
    }

    function setDireccion($direccion) {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setCoste($coste) {
        $this->coste = $coste;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    
    public function getAll(){
    /* METODO getAll(), NOS RETORNARA TODAS LAS PRODUCTOS LISTADOS DENTRO
    DE LA BASE DE DATOS
    */
        $productos = $this ->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;
    }



    public function getOne(){
    /* ESTE METODO LOS PERMITIRA VER LISTAR UN PRODUCTO EN ESPECIFICO 
    */
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id={$this->getId()}");
        return $producto->fetch_object(); //devuelvo un objeto ya utilizable
    }

    public function getOneByUser(){
        /* BUSCARA UN PEDIDO POR USUARIO
        */
        $sql = "SELECT p.id, p.coste FROM pedidos p "
                //."INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
                ."WHERE p.usuario_id={$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";
        $pedido = $this ->db->query($sql);  
        return $pedido->fetch_object(); //devuelvo un objeto ya utilizable
    }

    
    public function getAllByUser(){
        /* BUSCARA TODOS LOS PEDIDOS DEL USUARIO
        */
        $sql = "SELECT p.* FROM pedidos p "
                ."WHERE p.usuario_id={$this->getUsuario_id()} ORDER BY id DESC";
        $pedido = $this ->db->query($sql);  
        return $pedido; //devuelvo un objeto ya utilizable
    }

    public function getProductosByPedido($id){
    /* este metodo sacara todos los productos que yo tenga o que existan 
        dentro la tabla de lineas_pedidos
        cuyo id es el que le pasaremos por parametro*/
        
      /*  $sql = "SELECT * FROM productos WHERE id IN "
                ."(SELECT producto_id FROM lineas_pedidos WHERE pedido_id={$id})";*/

        $sql = "SELECT pr.*, lp.unidades FROM productos pr "
                ."INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
                ."WHERE lp.pedido_id={$id}";        
        $productos = $this ->db->query($sql);  
        return $productos;
    }

    public function save(){
        /* ESTE METODO LOS PERMITIRA GUARDAR UN PEDIDO  EN EL 
        FORMULARIO DE views/pedido/confirmado.php EN LA PARTE DE Formulario de pedido 
    */
		$sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_id()}, '{$this->getDepartamento()}', '{$this->getMunicipio()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirmado', CURDATE(), CURTIME())";
        $save = $this->db->query($sql);
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }
    
    public function save_linea(){
        //sacar el id del ultimo registro que se ha insertado
        $sql = "SELECT LAST_INSERT_ID() AS 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;
        foreach ($_SESSION['carrito'] as $elemento){
            //INSERTAMOS LA id del pedido, producto y sus unidades, ESTO LO HACEMOS EN
            //SIMULTANEO CON LA INSERCION DEL PEDIDO 
           // views/pedido/confirmado.php
            $producto = $elemento['producto'];
            $insert = "INSERT INTO lineas_pedidos VALUES (null, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
            $save = $this->db->query($insert);
        }     
        $result = false;
		if($save){
			$result = true;
		}
		return $result;
    }

    public function edit(){
        /* ESTE METODO LOS PERMITIRA EDITAR EL ESTADO DEL PRODUCTO EN EL 
            FORMULARIO DE views/pedido/detalle.php EN LA PARTE DE DETALLE DEL PEDIDO
        */
            $sql = "UPDATE pedidos SET estado='{$this->getEstado()}' ";
            $sql .= " WHERE id={$this->getId()};";
            $save = $this->db->query($sql);
            
            $result = false;
            if($save){
                $result = true;
            }
            return $result;
        }
        public function userPedido($id){
            /* ESTE METODO NOS PERMITIRA SABER QUE USUARIO HIZO UN PEDIDO 
                Y LO MOSTRAREMOS EN views/pedido/detalle.php
            */
        $usuario = $this->db->query("SELECT * FROM pedidos INNER JOIN usuarios ON pedidos.usuario_id = usuarios.id WHERE pedidos.id={$id}");
            return $usuario->fetch_object();      
        } 
}
?>