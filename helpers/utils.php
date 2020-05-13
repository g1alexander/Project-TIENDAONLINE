<?php 

class Utils{
    /* ESTA FUNCION PERMITIRA ELIMINAR LA SECCION, YA QUE SIN ELLA, ESTA SEGUIRA
        APARECIENDO EN EL FORMULARIO DE REGISTRO DE USURARIO "layouts/usuario/registro.php"
    */
public static function deleteSession($name){
    if(isset($_SESSION[$name])){
        $_SESSION[$name] = null;
        unset($_SESSION[$name]);
    }
    return $name;
}

/* FUNCION QUE NOS PERMITIRA SABER SI EL USUARIO ES UN ADMINISTRADOR O NO
    LA LLAMAREMOS EN DIFERENTES METODOS DE LOS CONTROLADORES
*/
public static function isAdmin(){
    if(!isset($_SESSION['admin'])){
        header('Location:'.base_url);
    }else{
        return true;
    }
}

/* FUNCION QUE NOS PERMITIRA SABER SI EL USUARIO ESTA IDENTIFICADO O NO,
    LA LLAMAREMOS EN DIFERENTES METODOS DE LOS CONTROLADORES
*/
public static function isIdentity(){
    if(!isset($_SESSION['identity'])){
        header('Location:'.base_url);
    }else{
        return true;
    }
}

/* FUNCION QUE NOS PERMITIRA LISTAR LAS CATEGORIAS EN EL MENU DEL SITIO WEB 
    views/layouts/header.php
*/
public static function showCategorias(){
    require_once 'models/categoria.php';
    $categoria = new Categoria();
    $categorias=$categoria->getCategorias();
    return $categorias;
}

/* ESTE METODO NOS PERMITIRA MOSTRAR LA SESSION CUANDO DEMOS COMPRAR UN PRODUCTO
Y ASI MISMO NOS DARA EL MONTO TOTAL A PAGAR

LO MOSTARMOS EN: views/carrito/index.php  ||  views/layouts/sidebar.php
*/
public static function statsCarrito(){
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

}
?>