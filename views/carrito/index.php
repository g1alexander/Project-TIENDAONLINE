<h1>CARRITO DE COMPRAS</h1>
<!--FORMULARIO QUE NOS PERMITIRA VISUALIZAR EL CARRITO DE COMPRAS-->
<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
<table>
    <tr>
        <th>IMAGEN</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>UNIDADES</th>
        <th>ELIMINAR</th>
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
            <?=$producto->precio?> cop
            </td>
            <td>
            <?=$elemento['unidades']?>
            <div class="updown-unidades">
                <a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="button">+</a>
                <a href="<?=base_url?>carrito/down&index=<?=$indice?>"class="button">-</a>
            </div>
            </td>
            <td>
            <a href="<?=base_url?>carrito/remove&index=<?=$indice?>" class="button button-carrito button-red">Quitar</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
<br>
<div class="delete-carrito">
<a href="<?=base_url?>carrito/delete" class="button button-delete button-red">Vaciar Carrito</a>
</div>
<div class="total-carrito">
<?php $stats = Utils::statsCarrito(); ?>
<h3>Precio Total: <?=$stats['total']?></h3>
<a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer Pedido</a>
</div>
<?php else: ?>
<h3>No hay productos en el carrito</h3>
<?php endif; ?>