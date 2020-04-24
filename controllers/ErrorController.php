<?php 
/* 
    ESTO MOSTRARA UN ERROR CADA QUE EL USUARIO QUIERA INGRESAR UNA DIRECCION
    NO EXISTE A LA URL
*/
class errorController{
    public function index(){
        echo "<h1>La pagina que buscas no existe</h1>";
    }
}

?>