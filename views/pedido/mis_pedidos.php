<!--FORMULARIO QUE PERMITIRA MOSTRAR INFORMACION DETALLE SOBRE LOS PEDIDOS QUE 
    NOS HAN LLEGADO
-->
<?php if(isset($gestion)): ?>
<h1>Gestion de Pedidos</h1>
<?php else: ?>
<h1>Mis Pedidos</h1>
<?php endif ?>
<table>
    <tr>
        <th>N° Pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php while($ped = $pedidos->fetch_object()):?>
    <tr>
        <td>
            <a href="<?=base_url?>pedido/detalle&id=<?= $ped->id ?>"><?= $ped->id?></a>
        </td>
        <td>
            <?= $ped->coste?> cop
        </td>
        <td>
            <?= $ped->fecha?>
        </td>
        <td>
            <?= Utils::showStatus($ped->estado)?>
        </td>
    </tr>
    <?php endwhile; ?>

</table>