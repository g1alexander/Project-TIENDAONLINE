<!-- BARRA LATERAL -->
<aside id="lateral">
    <div id="login" class="block_aside">
    <?php if(!isset($_SESSION['identity'])): ?>
        <h3>ENTRAR A LA WEB</h3>
        <form action="<?=base_url?>usuario/login" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" />
            <label for="password">Contraseña</label>
            <input type="password" name="password" />
            <input type="submit" value="Enviar">
        </form>
    <?php else: ?>
    <!-- 'nombre' Y 'apellido' SON LOS NOMBRES QUE ESTAN EN LA TABLA DE LA BASE DE DATOS 
    
        CON ESTO MOSTRAREMOS EL NOMBRE Y APELLIDO DEL USUARIO QUE INGRESO AL SITIO WEB
    -->

    <h3><?= $_SESSION['identity'] ->nombre?> <?= $_SESSION['identity'] ->apellido?></h3>
    <?php endif; ?>
        <ul>

            <!-- LAS CONDICIONES SON PARA IDENTICAR QUE ROL TIENE EL USUARIO QUE INGRESO-->

            <?php if(isset($_SESSION['admin'])): ?>
                <li><a href="#">Gestionar categorias</a></li>
                <li><a href="#">Gestionar productos</a></li>
                <li><a href="#">Gestionar pedidos</a></li>
            <?php endif; ?>

            <!-- LLAMAMOS AL METODO "logout" DEL CONTROLADOR USUARIO PARA CERRAR LA SECCION-->
            <?php if(isset( $_SESSION['identity'])): ?>
                <li><a href="#">Mis pedidos</a></li>
                <li><a href="<?=base_url?>usuario/logout">Cerrar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </div>

</aside>
<!-- CONTENIDO CENTRAL -->
<div id="central">