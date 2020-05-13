<!--CUANDO LLENAMOS EL FORMULARIO DE PEDIDO 
views/pedido/hecer.php ESTE SE REDICEONARA AL CONTROLADOR 
controllers/pedidoController.php y si esta todo bien y guarda a la base de datos
DESDE EL EL CONTROLADOR NOS MOSTRARA ESTE FORMULARIO
-->
<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
<h1>Tu pedido se ha confirmado</h1>
<p>
    Tu pedido ha sido guardado con exito, una vez que realices la transferencia bancaria
    a la cuenta 927-494-03462 con el coste del pedido será procesado y enviado.
</p>
<br>
<?php if(isset($pedido)): ?>
<h3>Datos del pedido:</h3>

    Numero de pedido: <?= $pedido->id?> <br>
    Total a pagar: <?= $pedido->coste?> <br>
    Productos: 
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
                <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>"  class="img_carrito" height="80"/>
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" he/>
            <?php endif; ?>
            </td>
            <td>
            <a href="<?=base_url?>/producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
            
            </td>
            <td>
            <?=$producto->precio?>
            </td>
            <td>
            <?=$producto->unidades?>
            </td>
        </tr>
    <?php endwhile;?>
    </table>
<?php endif; ?>
<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'failed'): ?>
<h1>Hubo una falla en tu pedido</h1>
<?php endif; ?>