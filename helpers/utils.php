<?php 

class Utils{

public static function deleteSession($name){
    /* ESTA FUNCION PERMITIRA ELIMINAR LA SECCION, YA QUE SIN ELLA, ESTA SEGUIRA
        APARECIENDO EN EL FORMULARIO DE REGISTRO DE USURARIO "layouts/usuario/registro.php"
    */
    if(isset($_SESSION[$name])){
        $_SESSION[$name] = null;
        unset($_SESSION[$name]);
    }
    return $name;
}

public static function isAdmin(){
    /* FUNCION QUE NOS PERMITIRA SABER SI EL USUARIO ES UN ADMINISTRADOR O NO
    LA LLAMAREMOS EN DIFERENTES METODOS DE LOS CONTROLADORES
*/
    if(!isset($_SESSION['admin'])){
        header('Location:'.base_url);
    }else{
        return true;
    }
}

public static function isIdentity(){
    /* FUNCION QUE NOS PERMITIRA SABER SI EL USUARIO ESTA IDENTIFICADO O NO,
    LA LLAMAREMOS EN DIFERENTES METODOS DE LOS CONTROLADORES
*/
    if(!isset($_SESSION['identity'])){
        header('Location:'.base_url);
    }else{
        return true;
    }
}

public static function showCategorias(){
    /* FUNCION QUE NOS PERMITIRA LISTAR LAS CATEGORIAS EN EL MENU DEL SITIO WEB 
    views/layouts/header.php
*/
    require_once 'models/categoria.php';
    $categoria = new Categoria();
    $categorias=$categoria->getCategorias();
    return $categorias;
}

public static function statsCarrito(){
    /* ESTE METODO NOS PERMITIRA MOSTRAR LA SESSION CUANDO DEMOS COMPRAR UN PRODUCTO
Y ASI MISMO NOS DARA EL MONTO TOTAL A PAGAR

LO MOSTARMOS EN: views/carrito/index.php  ||  views/layouts/sidebar.php
*/
    $stats = array(
        'count' => 0,
        'total' => 0,
    );
    if(isset($_SESSION['carrito'])){
        $stats['count'] = count($_SESSION['carrito']);

        foreach($_SESSION['carrito'] as $producto){
            $stats['total'] += $producto['precio'] * $producto['unidades'];
        }
    }
    return $stats;
}

public static function showStatus($stats){
    /* ESTE METODO NOS PERMITIRA MOSTRAR EL ESTADO QUE TIENE EL PEDIDO 
LO MOSTARMOS EN: views/pedido/detalle.php
*/
    $value = 'Pendiente';
    if($stats == 'confirmado'){
        $value = 'Pendiente';
    }elseif($stats == 'preparacion'){
        $value = 'En Preparacion';
    }elseif($stats == 'listo_envio'){
        $value = 'Preparado para enviar'; 
    }elseif($stats == 'enviado'){
        $value = 'Enviado';
    }
    return $value;
}

}
?>