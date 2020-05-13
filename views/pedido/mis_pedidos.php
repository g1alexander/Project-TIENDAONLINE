<h1>Mis Pedidos</h1>

<table>
    <tr>
        <th>N° Pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
    </tr>
    <?php while($ped = $pedidos->fetch_object()):?>
        <tr>
            <td>
            <a href="<?=base_url?>pedido/detalle&id="><?= $ped->id?></a>
            </td>
            <td>
            <?= $ped->coste?>
            </td>
            <td>
            <?= $ped->fecha?>
            </td>
        </tr>
    <?php endwhile; ?>

</table>