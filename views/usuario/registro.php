<h1>REGISTRARSE</h1>
<!-- 

    FORMULARIO DE REGISTRO DEL USUARIO, ESTO REDICIONARA A LA CARPETA DE "controllers/UsuarioController.php"

-->
<?php 

/*
    SI NOS REGISTRA LOS USUARIOS CORRECTAMENTE, NOS CREARÁ UNA SECCION AQUI
*/

if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    
    <strong class="alert_green">REGISTRO COMPLETADO CORRECTAMENTE</strong><br>

<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    
    <strong class="alert_red">REGISTRO FALLIDO, INTRODUCE BIEN LOS DATOS</strong><br>

    <?php endif;?>
    
<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method ="POST"> <!--ESTO APUNTA A LA URL PERSONALIZADA QUE HICIMOS-->

<input type="text" id="form-registroo" name="nombre" placeholder="Nombre" required/><br>

<input type="text" id="form-registroo" name="apellidos" placeholder="Apellidos" required/><br>

<input type="email" id="form-registroo" name="email" placeholder="Email" required/><br>

<input type="password" id="form-registroo" name="password" placeholder="Contraseña" required/><br>

<input type="submit" id="buton-form-registro" value="REGISTRARSE"/>

</form>
