<?php 
require_once 'models/pedido.php';
class pedidoController{
    public function hacer(){
        require_once 'views/pedido/hacer.php';
    }

    public function add(){
        /* METODO QUE NOS PERMITARA GUARDAR EL PEDIDO */
        if(isset($_SESSION['identity'])){
            /* PARA GUARDAR DEBE ESTAR IDENTIFICADO */
            $usuario_id = $_SESSION['identity']->id; //que usuario hizo el pedido
            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : false;
            $municipio = isset($_POST['municipio']) ? $_POST['municipio'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = Utils::statsCarrito(); //total a pagar en el pedido
            //helpers/utils.php
            $coste = $stats['total'];
            //guardar datos a la data base
            if($departamento&&$municipio&&$direccion){
                $pedido = new Pedido();
                $pedido -> setUsuario_id($usuario_id);
                $pedido ->setDepartamento($departamento);
                $pedido ->setMunicipio($municipio);
                $pedido ->setDireccion($direccion);
                $pedido -> setCoste($coste);
                $save = $pedido ->save(); //guardara en la tabla pedido
                //guardar linea de pedido
                $save_lineas = $pedido ->save_linea(); //guardara en lineas_pedidos
                if($save && $save_lineas){
                    $_SESSION['pedido'] = "complete";
                }else{
                    $_SESSION['pedido'] = "failed";
                }
            }else{
                $_SESSION['pedido'] = "failed";
            }
            header('Location:'.base_url.'pedido/confirmado');

        }else{
            //redirijo
            header('Location:'.base_url);
        }
    }
    public function confirmado(){
        /* IDENTIFICAREMOS QUE EL USUARIO ESTE LOGEADO, SI LO ESTA SACAMOS SU id */
        if(isset($_SESSION['identity'])){
            $identity = $_SESSION['identity'];
            //sacamos el pedido
            $pedido = new Pedido();
            $pedido ->setUsuario_id($identity->id);
            $pedido = $pedido->getOneByUser();
            /*YA SABEMOS QUE $pedido->id TIENE EL id DEL PEDIDO CONFIRMADO
                Y SE SABE PORQUE getOneByUser EN LA CONSULTA SE DICE QUE SAQUE EL ULTIMO
            */
            $pedido_producto = new Pedido();
            $productos = $pedido_producto->getProductosByPedido($pedido->id);
        }
        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos(){
        Utils::isIdentity(); //IDENTIFICAMOS SI ESTA LOGEADO, SI NO ES ASI
        //NO PODRA ACCEDER A ESTA URL
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();
        /* SACO LOS PEDIDOS DEL USUARIO LO CUAL LO MOSTRAREMOS EN 
            views/pedido/mis_pedidos.php
        */
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllByUser();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle(){
        Utils::isIdentity();
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            //sacamos el pedido
            $pedido = new Pedido();
            $pedido ->setId($id);
            $pedido = $pedido->getOne();
            /*SACAR EL id DEL PRODUCTO
             */
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);

            require_once 'views/pedido/detalle.php';
        }
        else{
            header('Location'.base_url.'pedido/mis_pedidos');
        }
    }
}

?>