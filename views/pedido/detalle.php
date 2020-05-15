<!--FORMULARIO DE PEDIDO EN EL CUAL PODREMOS VISUALIZAR EL ESTADO
LOS DATOS DE DIRECCION, VALOR DEL PEDIDO Y LOS DATOS DEL PRODUCTO
controllers/PedidoController.php

metodo detalle y estado
-->
<h1>Detalle del pedido</h1>

<?php if(isset($pedido)): ?>
    <?php if(isset($_SESSION['admin'])): ?>
        <h3>Cambiar estado de pedido</h3>
        <form action="<?=base_url?>pedido/estado" method="POST">
        <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
        <select name="estado">
            <option value="confirmado" <?= $pedido->estado =="confirmado" ? 'selected' : ''?>>Pendiende</option>
            <option value="preparacion" <?= $pedido->estado =="preparacion" ? 'selected' : ''?>>En Preparacion</option>
            <option value="listo_envio" <?= $pedido->estado =="listo_envio" ? 'selected' : ''?>>Preparado para enviar</option>
            <option value="enviado" <?= $pedido->estado =="enviado" ? 'selected' : ''?>>Enviado</option>
        </select>
        <input type="submit" value="Cambiar estado">
        </form><br>
    <?php endif; ?>
    <h3>Direccion de envio:</h3>

    Departamento: <?= $pedido->departamento?> <br>
    Municipio: <?= $pedido->municipio?> <br>
    Direccion: <?= $pedido->direccion?> <br>
    <br>
    <h3>Datos del pedido:</h3>
    Estado: <?= Utils::showStatus($pedido->estado)?><br>
    Numero de pedido: <?= $pedido->id?> <br>
    Total a pagar: <?= $pedido->coste?> cop<br><br>
    <h3>Productos: </h3> <br>
    <!--MOSTRAREMOS LOS PRODUCTOS-->
    <table>
    <tr>
        <th>imagen</th>
        <th>nombre</th>
        <th>precio</th>
        <th>unidades</th>
    </tr>
    <?php while($producto = $productos->fetch_object()): ?>
        <tr>
            <td>
            <?php if ($producto->imagen != null) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>"  class="img_carrito"/>
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito"/>
            <?php endif; ?>
            </td>
            <td>
            <a href="<?=base_url?>/producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
            
            </td>
            <td>
            <?=$producto->precio?> cop
            </td>
            <td>
            <?=$producto->unidades?>
            </td>
        </tr>
    <?php endwhile;?>
    </table>
<?php endif; ?>