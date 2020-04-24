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
}
?>