<h1>REGISTRARSE</h1>
<!-- 

    FORMULARIO DE REGISTRO DEL USUARIO, ESTO REDICIONARA A LA CARPETA DE "controllers/UsuarioController.php"

-->
<?php 

/*
    SI NOS REGISTRA LOS USUARIOS CORRECTAMENTE, NOS CREARÁ UNA SECCION AQUI
*/

if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    
    <strong class="alert_green">REGISTRO COMPLETADO CORRECTAMENTE</strong>

<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    
    <strong class="alert_red">REGISTRO FALLIDO, INTRODUCE BIEN LOS DATOS</strong>

    <?php endif;?>
    
<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method ="POST"> <!--ESTO APUNTA A LA URL PERSONALIZADA QUE HICIMOS-->
<label for="nombre">Nombre</label>
<input type="text" name="nombre" required/>

<label for="apellidos">Apellidos</label>
<input type="text" name="apellidos" required/>

<label for="email">Email</label>
<input type="email" name="email" required/>

<label for="password">Contraseña</label>
<input type="password" name="password" required/>

<input type="submit" value="REGISTRARSE"/>

</form>
