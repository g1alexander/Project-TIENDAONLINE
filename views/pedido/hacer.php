<!--views/carrito/index.php CUANDO LE DAMOS HACER PEDIDO SE ABRIRA ESTE FORMULARIO
UNA VEZ LLENAMOS EL FORMULARIO PASARA AL CONTROLADOR
controllers/pedidoController.php

NECESITAREMOS ESTAR LOGEADOS PARA PODER REALIZAR PEDIDOS
-->
<?php if(isset($_SESSION['identity'])): ?>
<h1>HACER PEDIDO</h1>
<p>
<a href="<?=base_url?>carrito/index">Ver los productos y precio del pedido</a>
</p> <br>
<center>
<h3>DIRECCION DE ENVIO</h3>
</center><br>
<form action="<?=base_url?>pedido/add" method="POST">

<input type="text" id="form-registroo" name="departamento" placeholder="Departamento" required><br>

<input type="text" id="form-registroo" name="municipio" placeholder="Municipio" required><br>

<input type="text" id="form-registroo" name="direccion" placeholder="Direccion" required><br>

<input type="submit" id="buton-form-registro" value="Confirmar pedido">
</form>
<?php else: ?>
<h1>Necesitas estar identificado</h1>
<h3>Necesitas estar logeado en la web para realizar tu pedido</h3>
<?php endif; ?>