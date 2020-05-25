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
        /* ESTE METODO NOS PERMITIRA SACAR EL DETALLE DE PRODUCTO */
        Utils::isIdentity();
        if(isset($_GET['id'])){
            /* COMPROBAMOS QUE NOS LLEGUE LA id DEL PRODUCTO
                views/pedido/gestion.php
            */
            $id = $_GET['id'];
            //sacamos el pedido
            $pedido = new Pedido();
            $pedido ->setId($id);
            $pedido = $pedido->getOne();
            /*SACAR EL usuario del pedido */
                        
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

    public function gestion(){
        /* ESTE METODO LE PERMITIRA AL ADMINISTRADOR PODER VER LA INFORMACION
            DEL PEDIDO QUE ACABA DE REALIZAR EL USUARIO
            
            ESTE METODO ES TANTO COMO PARA gestion COMO PARA mis pedidos
        */
        Utils::isAdmin();
        $gestion = true;
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        require_once 'views/pedido/mis_pedidos.php';
    }

	public function estado(){
        /* ESTE METODO LE PERMITIRA AL admin PODER CAMBIAR EL ESTADO DEL PRODUCTO
            HAY 4 OPCIONES EN UN SELECT
        */
		Utils::isAdmin();
		if(isset($_POST['pedido_id']) && isset($_POST['estado'])){//COMPROBAMOS QUE NOS LLEGUE EL id y estado
			// Recoger datos form
			$id = $_POST['pedido_id'];
			$estado = $_POST['estado'];
			
			// Upadate del pedido
			$pedido = new Pedido();
			$pedido->setId($id);//setear es, indicarle con que objeto de la base de datos vamos a trabajar
			$pedido->setEstado($estado);
			$pedido->edit();
			
			header("Location:".base_url.'pedido/detalle&id='.$id);
		}else{
			header("Location:".base_url);
		}
	}
}

?>