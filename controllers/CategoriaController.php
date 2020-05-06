<?php 
require_once 'models/categoria.php';
require_once 'models/producto.php';
class categoriaController{
    /*  METODO QUE LISTARA Y ASI PODRA MOSTRAR AL ADMINISTRADOR LAS CATEGORIAS QUE SE TIENEN */
    public function index(){
        Utils::isAdmin(); //ESTO IDENTIFICARA QUE SEA UN ADMINISTRADOR, YA QUE ESE ROL SE EL UNICO QUE 
        //PODRA VER, AGREGAR Y MODIFICAR LAS CATEGORIAS
        $categoria = new Categoria();
        $categorias=$categoria->getCategorias();
        require_once 'views/categoria/index.php';
    }

    public function crear(){
           /*  METODO QUE NOS MOSTRARA AL ADMINISTRADOR EL FORMULARIO DE CREAR UNA NUEVA CATEGORIA */
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function ver(){
        /* METODO QUE NOS PERMITE PODER VISUALIZAR LOS PRODUCTOS DE UNA
            CATEGORIA EN ESPECIFICO Y LO HACEMOS ATRAVES DE LOS 
            models/producto.php
            models/categoria.php
        */
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            //conseguir categoria
            $categoria  = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();
            //coneguir producto
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategoria();
        }
        require_once 'views/categoria/ver.php';
    }


    public function save(){
         /* METODO QUE RECIBE LOS DATOS DEL FORMULARIO views/categoria/crear.php 
       Y EL QUE EJECUTA EL METODO DEL models/categoria.php PARA GUARDAR UNA NUEVA CATEGORIA
    */
        Utils::isAdmin();
        if(isset($_POST) && isset($_POST['nombre'])){
             /* GUARDAREMOS CATEGORIAS */
            $categoria= new Categoria();
            $categoria->setNombre($_POST['nombre']); 

            /* ESTE IF NOS PERMITIRA REUTILIZAR ESTE METODO save() YA QUE LOGRAREMOS IDENTIFICAR
               SI NOS LLEGA POR $_GET[''] ESTO LO HACEMOS ATRAVES DE LOS DATOS QUE LLEGAN EL FORMULARIO
               views/categoria/crear.php 
            */
            if(isset($_GET['id'])){
                /* SI DENTRAMOS POR MEDIO DE GET[] ENTRAREMOS A MODIFICAR LA CATEGORIA */
                $id = $_GET['id']; //ID QUE NOS LLEGA, ASI SE SABRA QUE CATEGORIA MODIFICAREMOS
                $categoria -> setId($id); //
                $save = $categoria->edit(); //METODO PARA MODIFICAR CATEGORIA models/categoria.php
            }else{
                $categoria->save(); //METODO PARA GUARDAR CATEGORIA models/categoria.php
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
        header('Location:'.base_url.'categoria/index');
    }


    public function editar(){
        /* METODO QUE UTILIZAMOS EN EL FORMULARIO views/categoria/crear.php */
        Utils::isAdmin(); //PARA REALIZAR CAMBIOS TIENE QUE SER ADMINISTRADOR
        if(isset($_GET['id'])){ /*PARA MOSTRAR LA CATEGORIA QUE VAMOS A MODIIFICAR NECESITAMOS 
            SABER QUE NOS LLEGUE LA id DE ESA CATEGORIA
            */
        $id= $_GET['id'];
        $edit = true; //ESTO NOS SERVIRA PARA REUTILIZAR EL FORMULARIO DE CREACION DE CATEGORIA
        $categoria = new Categoria(); //OBJETO
        $categoria->setId($id);
        $cat = $categoria->getOne(); //METODO QUE NOS MOSTRARA LA CATEGORIA QUE VAMOS A MODIFICAR
        //models/categoria.php
        require_once 'views/categoria/crear.php';
        }else{
            header('Location:'.base_url.'categoria/index');
        }
    }

    public function eliminar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){/*PARA ELIMINAR LA CTEGORIA QUE VAMOS A MODIIFICAR NECESITAMOS 
            SABER QUE NOS LLEGUE LA id DE ESA CATEGORIA
            */
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $delete = $categoria->delete(); /* METODO QUE NOS PERMITIRA ELIMINAR ESA CATEGORIA
            DE LA BASE DE DATOS models/categoria.php
            */
            if($delete){
                $_SESSION['delete'] = "complete";
            }else{
                $_SESSION['delete'] = "failed";
            }
        }else{
            $_SESSION['delete'] = "failed";
        }
        header('Location:'.base_url.'categoria/index');
    }

}

?>