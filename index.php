<?php 
session_start();
require_once 'autoload.php'; //cargados para tener acceso a todos los controladores, objetos y clases
require_once 'config/db.php'; //cargamos la base de datos
require_once 'config/parametros.php'; //cargamos las constantes
require_once 'helpers/utils.php'; //cargamos las utilidades
require_once 'views/layouts/header.php'; //encabezado de la pagina
require_once 'views/layouts/sidebar.php'; //barra de navegacion

function error_pagina(){
    $error = new errorController();
    $error ->index();
}

if(isset($_GET['controller'])){ //comprovamos que me llegue los controladores por la url
    $nombre_controlador = $_GET['controller'].'Controller';  //si llega creo una variable
} else if(!isset($_GET['controller']) && !isset($_GET['action'])){
    /* en este if cargamos el controlador por defecto 
            y lo hacemos llamando las constantes que estan en "config/parametros.php"
            */
    $nombre_controlador = controller_default;
}
else{
    error_pagina();
    //termino la ejecucion si no es asi
    exit();
}

if(class_exists ($nombre_controlador)){ //combruebo que exista el controlador
    $controlador = new $nombre_controlador(); //creo un nuevo objeto
    if(isset($_GET['action']) && method_exists($controlador,$_GET['action'])){ //combruebo que me llega la accion y 
        //que el metodo exista dentro del controlador
        $action = $_GET ['action'];
        $controlador->$action(); //si es asi invoco ese metodo
    }
    else if(!isset($_GET['controller']) && !isset($_GET['action'])){ 
        /* en este if cargamos la pagina por defecto http://localhost/Project-TIENDAONLINE/
            ya que si no lo hacemos marcara que la pagina no existe 
            y lo hacemos llamando las constantes que estan en "config/parametros.php"
            */
       $action_default =  action_default;
        $controlador->$action_default();
    }    
    else {
        error_pagina();
    } 
}else{
    error_pagina();
}
require_once 'views/layouts/footer.php'; //pie de pagina

?>