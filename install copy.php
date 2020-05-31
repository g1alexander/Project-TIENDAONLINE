<?php
    if(isset($_POST['host'])){
        //escribir en el archivo config las variables de conexion
        $file = fopen("config/config.php", "w");

        fwrite($file,"<?php" . PHP_EOL);
        fwrite($file, "define('HOST', '" . $_POST['host'] . "');" . PHP_EOL);
        fwrite($file, "define('USER', '" . $_POST['user'] . "');" . PHP_EOL);
        fwrite($file, "define('PASSWORD', '" . $_POST['password'] . "');" . PHP_EOL);
        fwrite($file, "define('DB', '" . $_POST['database'] . "');" . PHP_EOL);
        fwrite($file, "?>");

fclose($file);

echo "creando el archivo de conexion";

//importando la base de datos
$sql = file_get_contents('database/tienda_online.sql');

include('config/db.php');

if(Database::getConnection()->multi_query($sql)){
//si es true se ejecuta la importacion correctamente
unlink('install.php');
//var_dump($sql);
header('Location: index.php');
}else{
echo "<br>no se a podido importar la base de datos, verifique los errores";
}
die;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FASHION STORE</title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <div id="container">
        <!-- CABECERA-->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="Camiseta Logo" />
                <a href="index.php">
                    FASHION STORE
                </a>
            </div>
        </header>
        <!-- MENU -->
        <nav class="menu">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
            </ul>
        </nav>
        <div id="content">
            <!-- BARRA LATERAL -->
            <aside class="lateral">
                <div id="login" class="block_aside">
                    <h3>Bienvenido al Sistema</h3>
                </div>

            </aside>
        <!-- CONTENIDO CENTRAL -->
        <div class="central">
            <h1>Establezca su conexion MySQL</h1>
            <form action="install.php" method="post" class="form-conexion">
                <div class="form_container">
                    <p>

                        <input type="text" name="host" placeholder="Host" id="producto-registro"  required>
                    </p><br>

                    <input type="text" name="user" placeholder="Usuario DB" id="producto-registro"  required>
                    <p><br>

                        <input type="text" name="password" placeholder="Contraseña DB" id="producto-registro" >
                    </p><br>
                    <input type="text" name="database" placeholder="database" id="producto-registro"  required>
                    <p><br>
                        <input type="submit" value="Crear Tablas" id="buton--registro"><br>
                </div>
            </form>

        </div>

    </div>


    <!-- PIE DE PAGINA -->
    <footer id="footer">
        <p>Desarrollado por @g1alexander, @BRABDO145, @Andree-Zzz, @katerine2020 (GibHub) &copy; <?= date('Y')?></p>
    </footer>
    </div>
</body>

</html>