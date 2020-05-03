<?php 
require_once 'models/producto.php';
class productoController{
   // session_start();
    public function index(){
       //renderizando contenido
       require_once 'views/producto/destacados.php';
    }

    public function gestion(){
        /* ESTE METODO NOS PERMITIRA MOSTRAR TODOS LOS PRODUCTOS CON LOS QUE CONTAMOS
        Y NOS LOS MOSTRARA EN views/producto/gestion.php
        */
        Utils::isAdmin();
        $productos = new Producto();
        $productos = $productos->getAll(); //models/producto.php

        require_once 'views/producto/gestion.php';
    }

    public function crear(){
         /* ESTE METODO NOS PERMITIRA VER EL FORMULARIO DE REGISTRO DE LOS PRODUCTOS 
           views/producto/crear.php
        */
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public function save(){
        /* METODO QUE NOS PERMITIRA GUARDAR Y EDITAR PRODUCTOS */
		Utils::isAdmin();
		if(isset($_POST)){ //COMPROBAMOS QUE NOS LLEGUE LOS DATOS POR POST[]
           
            /* COMPROBAMOS QUE NOS LLEGUEN LOS DATOS DEL FORMULARIO Y LOS GUARDAMOS
                views/producto/crear.php
            */
		 	$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$precio = isset($_POST['precio']) ? $_POST['precio'] : false;
			$stock = isset($_POST['stock']) ? $_POST['stock'] : false;
			$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
			//$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
            
            if($nombre && $descripcion && $precio && $stock && $categoria){
                /* COMPROBAMOS QUE NOS LLEGUEN LOS DATOS Y CREAMOS EL OBJETO $producto */
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);
                /*guardamos la imagen
                
                -GUARDAMOS LA IMAGEN QUE NOS LLEGA DEL FORMULARIO EN $file
                -GUARDAMOS EL NOMBRE EN $filesname
                -GUARDAMOS EL TIPO DE EXTENSION DE LA IMAGEN
                */
                if(isset($_FILES['imagen'])){
                $file =$_FILES['imagen']; //nombre del formulario
                $filesname = $file['name'];
                $mimetype = $file['type'];

                    if($mimetype == 'image/jpg' || $mimetype == 'image/png'|| $mimetype == 'image/jpeg'|| $mimetype == 'image/gif'){
                   //SOLO GUARDAREMOS 4 TIPOS DE EXTENSION PARA IMAGENES
                    if(!is_dir('uploads/images')){ //SI NO TENEMOS ESTE DIRECTORIO EN EL PROYECTO
                        mkdir('uploads/images',0777,true);//ACA LO CREAREMOS
                    }
                        move_uploaded_file($file['tmp_name'],'uploads/images/'.$filesname); 
                        //GUARDAREMOS LA IMAGEN EN EL DIRECTORIO
                        $producto->setImagen($filesname); //GUARDAREMOS EN LA BASE DE DATOS
                    
                    }
                }
                if(isset($_GET['id'])){
                    /* SI DENTRAMOS POR MEDIO DE GET[] ENTRAREMOS A MODIFICAR LA PRODUCTO */
                    $id = $_GET['id']; //ID QUE NOS LLEGA, ASI SE SABRA QUE PRODUCTO MODIFICAREMOS
                    $producto -> setId($id);
                    $save = $producto->edit(); //METODO PARA MODIFICAR PRODUCTO models/producto.php
                }else{
                    $save = $producto->save();
                } 
                if($save){
                    /* SI TODO ESTA CORRECTO CREARA UNA SECCION, SI NO MOSTRARA UNA SECCION ERRONEA */
                    $_SESSION['producto'] = "complete";
                }else{
                    $_SESSION['producto'] = "failed";
                }
            }else{
                $_SESSION['producto'] = "failed";
            }
	    }else{
            $_SESSION['producto'] = "failed";
        }
    header('Location:'.base_url."producto/gestion");
    }

    public function editar(){
         /* METODO QUE UTILIZAMOS EN EL FORMULARIO views/producto/crear.php */
        Utils::isAdmin();
        if(isset($_GET['id'])){
            /*PARA MOSTRAR EL PRODUCTO QUE VAMOS A MODIIFICAR NECESITAMOS 
            SABER QUE NOS LLEGUE LA id DE ESE PRODUCTO
            */
        $id= $_GET['id'];
        $edit = true; //ESTO NOS SERVIRA PARA REUTILIZAR EL FORMULARIO DE CREACION DE PRODUCTO
        $producto = new Producto();
        $producto->setId($id);
        $pro = $producto->getOne();//METODO QUE NOS MOSTRARA EL PRODUCTO QUE VAMOS A MODIFICAR
        //models/producto.php
        require_once 'views/producto/crear.php';
        }else{
            header('Location:'.base_url.'producto/gestion');
        }
    }

    public function eliminar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            /*PARA ELIMINAR LA PRODUCTO QUE VAMOS A MODIIFICAR NECESITAMOS 
            SABER QUE NOS LLEGUE LA id DE ESA CATEGORIA
            */
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $delete = $producto->delete(); /* METODO QUE NOS PERMITIRA ELIMINAR ESA CATEGORIA
            DE LA BASE DE DATOS models/producto.php
            */
            if($delete){
                $_SESSION['delete'] = "complete";
            }else{
                $_SESSION['delete'] = "failed";
            }
        }else{
            $_SESSION['delete'] = "failed";
        }
        header('Location:'.base_url.'producto/gestion');
    }

}
?>