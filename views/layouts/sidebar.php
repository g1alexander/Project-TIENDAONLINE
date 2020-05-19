<!-- BARRA LATERAL -->
<aside class="lateral">
	<div id="login" class="block_aside">
		<h3>Mi carrito</h3>
		<ul>
			<?php ob_start(); $stats = Utils::statsCarrito(); ?>
			<li><a href="<?=base_url?>carrito/index">Productos (<?=$stats['count']?>)</a></li>
			<li><a href="<?=base_url?>carrito/index">Total: <?=$stats['total']?> cop</a></li>
			<li><a href="<?=base_url?>carrito/index">Ver el carrito</a></li>
		</ul>
	</div>
    <div id="login" class="block_aside">
		<?php if(!isset($_SESSION['identity'])): 
			ob_start();?>
        <h3>Entrar a la web</h3>
        <form action="<?=base_url?>usuario/login" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" />
            <label for="password">Contraseña</label>
            <input type="password" name="password" />
            <input type="submit" value="Enviar" />
        </form>
        <?php else:?>
        <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellido?></h3>
		<?php endif;?>

        <ul>
			<?php if(isset($_SESSION['admin'])):
				ob_start();?>
            <li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
            <li><a href="<?=base_url?>producto/gestion">Gestionar productos</a></li>
            <li><a href="<?=base_url?>pedido/gestion">Gestionar pedidos</a></li>
            <?php endif;?>

            <?php if(isset($_SESSION['identity'])): 
				ob_start();?>
            <li><a href="<?=base_url?>pedido/mis_pedidos">Mis pedidos</a></li>
            <li><a href="<?=base_url?>usuario/logout">Cerrar sesión</a></li>
            <?php else:?>
            <li><a href="<?=base_url?>usuario/registro">Registrate aqui</a></li>
            <?php endif;?>
        </ul>
    </div>

</aside>
<!-- CONTENIDO CENTRAL -->
<div class="central">