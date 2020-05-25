<?php
require_once 'models/producto.php';
class carritoController
{
    public function index()
    {
        /* MOSTRAMOS EL CARRITO DE COMPRAS */
        if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1){
            $carrito = $_SESSION['carrito'];
        }else{
            $carrito = array();
        }
        require_once 'views/carrito/index.php';
    }
    public function add()
    {
        if (isset($_GET['id'])) {
            /* COMPROBAMOS QUE NOS LLEGA LA id, ASI COMPROBAMOS QUE PRODUCTO
                QUEREMOS AÑADIR AL CARRITO
            */
            $producto_id = $_GET['id'];
        } else {
            /* SI NO EXISTE LA id LO REDIFIRIMOS A LA PAGINA PRINCIPAL */
            header('location:' . base_url);
        }
        if (isset($_SESSION['carrito'])) {
            $contador = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $contador++;
                }
            }
        }
        if (!isset($contador) || $contador == 0) {
            /* Conseguimos el producto que el usuario va agregar al carrito */
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();
            /* Añadimos al carrito */
            if (is_object($producto)) {
                /* GUARDAMOS UN PRODUCTO EN EL ARRAY */
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        header('location:'.base_url.'carrito/index');
    }
    public function remove(){
        /*ESTE METODO NOS PERMITIRA BORRAR UN PRODUCTO DEL CARRITO DE COMPRAS */
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            unset($_SESSION['carrito'] [$index]);
        }
        header('location:' . base_url . 'carrito/index');
    }

    public function up(){
        /*ESTE METODO NOS PERMITIRA BORRAR UN PRODUCTO DEL CARRITO DE COMPRAS */
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'] [$index]['unidades']++;
        }
        header('location:' . base_url . 'carrito/index');
    }
    public function down(){
        /*ESTE METODO NOS PERMITIRA SUMAR O RESTAR UN PRODUCTO DEL CARRITO DE COMPRAS */
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'] [$index]['unidades']--;
            if( $_SESSION['carrito'] [$index]['unidades'] == 0){
                unset($_SESSION['carrito'] [$index]);
            }
        }
        header('location:' . base_url . 'carrito/index');
    }

    public function delete()
    {
        /*ESTE METODO NOS PERMITIRA BORRAR TODO EL CARRITO DE COMPRAS */
        unset($_SESSION['carrito']);
        header('location:' . base_url . 'carrito/index');
    }
}
