<?php 
require_once 'models/categoria.php';
class categoriaController{
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias=$categoria->getCategorias();
        require_once 'views/categoria/index.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST) && isset($_POST['nombre'])){
             /* GUARDAREMOS CATEGORIAS */
            $categoria= new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }
        header('Location:'.base_url.'categoria/index');
    }
}

?>