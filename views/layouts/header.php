<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FASHION STORE</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css" />
    <link rel="icon" href="assets/img/camiseta.ico">
</head>

<body>
    <div id="container">
        <!-- CABECERA-->
        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta Logo" /> <!-- 
                    SI NO COLOCAMOS LA URL EL SISTEMA DE ARCHIVOS INTERPRETA QUE SON DIRECTORIOS EN LUGAR DE 
                    UNA URL 
                -->
                <a href="<?=base_url?>">
                    FASHION STORE
                </a>
            </div>
        </header>
        <!-- MENU -->
        <?php $categorias = Utils::showCategorias(); ?>
        <!-- EMPEZAMOS LLAMANDO AL METODO ESTATICO showCategorias() QUE ESTA EN helpers/utils.php
        EL CUAL NOS PERMITIRA MOSTRAR LAS CATEGORIAS QUE TENEMOS EN LA BASE DE DATOS PARA MOSTARLO
        EN EL MENU DEL SITIO
        -->

        <nav id="menu">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <?php while($cat = $categorias->fetch_object()): ?>
                <!-- LISTAMOS TODOS LOS OBJETOS QUE ESTAN EN LA BASE DE DATOS Y LOS ALMACENAMOS
                    EN LA $cat PARA LUEGO MOSTARLOS-->
                <li>
                    <a href="#"><?= $cat ->nombre ?></a>
                </li>
                <?php endwhile; ?>
            </ul>
        </nav>

        <div id="content">