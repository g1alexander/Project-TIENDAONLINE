<?php 

require_once 'autoload.php'; //cargados para tener acceso a todos los controladores, objetos y clases
require_once 'views/layouts/header.php';
require_once 'views/layouts/sidebar.php';

if(isset($_GET['controller'])){ //comprovamos que me llegue los controladores por la url
    $nombre_controlador = $_GET['controller'].'Controller';  //si llega creo una variable
} else{
    echo"la pagina que busca no existe"; //termino la ejecucion si no es asi
    exit();
}

if(class_exists ($nombre_controlador)){ //combruebo que exista el controlador
    $controlador = new $nombre_controlador(); //creo un nuevo objeto
    if(isset($_GET['action']) && method_exists($controlador,$_GET['action'])){ //combruebo que me llega la accion y 
        //que el metodo exista dentro del controlador
        $action = $_GET ['action'];
        $controlador->$action(); //si es asi invoco ese metodo
    } else {
        echo "la pagina que buscas no existe";
    } 
}else{
    echo "la pagina que buscas no existe";
}
require_once 'views/layouts/footer.php';

?>