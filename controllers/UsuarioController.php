<?php 

require_once 'models/usuario.php';

class usuarioController{
    public function index(){
        echo "controlador usuarios, accion index";
    }
    public function registro(){
        require_once 'views/usuario/registro.php';
    }

    
    /* ESTE METODO NOS REGISTRA LOS USUARIOS A LA BASE DE DATOS */

    public function save(){
        /* RECIBIMOS EL FORMULARIO DE REGISTRO DE LA CARPETA "views/usuario/registro.php" */
        if(isset($_POST)){
            /* COMPROBAMOS QUE NOS LLEGUEN VALORES DEL FORMULARIO */
            $nombre = isset($_POST['nombre']) ? $_POST['nombre']: false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos']: false;
            $email = isset($_POST['email']) ? $_POST['email']: false;
            $password = isset($_POST['password']) ? $_POST['password']: false;

            if($nombre &&$apellidos&&$email && $password){
                $usuario = new Usuario();
                $usuario -> setNombre($nombre);
                $usuario -> setApellidos($apellidos);
                $usuario -> setEmail($email);
                $usuario -> setPassword($password);
                $save = $usuario ->save();
                if($save){
                    $_SESSION['register'] = "complete";
                }else{
                    $_SESSION['register'] = "failed";
                }
            }else{
                $_SESSION['register'] = "failed";
            }
        } else{
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url.'usuario/registro');
    }

    public function login(){
        if(isset($_POST)){
            /* IDENTIFICAMOS AL USUARIO
                CONSULTA A LA BASE DE DATOS
            */
            $usuario = new Usuario();
            $usuario -> setEmail($_POST['email']);
            $usuario -> setPassword($_POST['password']);
            $identity = $usuario -> login(); //METODO QUE ESTA EN 'models/usuario.php'

            /* UTILIZAMOS LAS SECCIONES PARA MANTENER AL USUARIO IDENTIFICADO */
           if($identity &&is_object($identity)){ 
               $_SESSION ['identity'] = $identity; //CREAMOS UNA SECCION PARA EL USUARIO QUE INGRESE

                /* EN LA CONDICION LE PONEMOS 'rol' PORQUE ASI ES COMO LE PUSIMOS EN LA BASE DE DATOS*/

               if($identity->rol == 'admin'){ //SI EL USUARIO ES ADMINISTRADOR, CREAMOS UNA SECCION PARA ÉL
                   $_SESSION['admin'] = true;
               }
           }else{
               $_SESSION ['error/login'] = 'Identificacion fallida';
           }
            //CREAMOS UNA SECCION
        }
        header ('Location:'.base_url);
    }

    public function logout(){
        /* CERRAMOS LA SECCION ATRAVES DE ESTE METODO QUE ES LLAMADO DESDE
            views/layouts/sidebar.php --- boton 'cerrar sesion'
        */
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        header('Location:'.base_url);
    }

}

?>