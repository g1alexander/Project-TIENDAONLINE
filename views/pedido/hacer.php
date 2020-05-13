<!--views/carrito/index.php CUANDO LE DAMOS HACER PEDIDO SE ABRIRA ESTE FORMULARIO
UNA VEZ LLENAMOS EL FORMULARIO PASARA AL CONTROLADOR
controllers/pedidoController.php

NECESITAREMOS ESTAR LOGEADOS PARA PODER REALIZAR PEDIDOS
-->
<?php if(isset($_SESSION['identity'])): ?>
<h1>Hacer pedido</h1>
<p>
<a href="<?=base_url?>carrito/index">Ver los productos y precio del pedido</a>
</p> <br>
<h3>Direccion para el envio</h3>
<form action="<?=base_url?>pedido/add" method="POST">

<label for="departamento">Departamento</label>
<input type="text" name="departamento" required>

<label for="municipio">municipio</label>
<input type="text" name="municipio" required>

<label for="direccion">direccion</label>
<input type="text" name="direccion" required>

<input type="submit" value="Confirmar pedido">
</form>
<?php else: ?>
<h1>Necesitas estar identificado</h1>
<h3>Necesitas estar logeado en la web para realizar tu pedido</h3>
<?php endif; ?>