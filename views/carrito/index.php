<h1>Carrito de la compra</h1>
<!--FORMULARIO QUE NOS PERMITIRA VISUALIZAR EL CARRITO DE COMPRAS-->
<table>
    <tr>
        <th>imagen</th>
        <th>nombre</th>
        <th>precio</th>
        <th>unidades</th>
    </tr>
    <?php foreach ($carrito as $indice => $elemento):
        $producto = $elemento['producto'];
        ?>
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
            <?=$elemento['unidades']?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
<br>

<div class="total-carrito">
<?php $stats = Utils::statsCarrito(); ?>
<h3>Precio Total: <?=$stats['total']?></h3>
<a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer Pedido</a>
</div>