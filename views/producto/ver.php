<?php if (isset($pro)) : ?>
    <!--COMPROBAMOS QUE EXISTA $pro en el controlador 
controllers/productoController.php
-->
    <h1><?= $pro->nombre ?></h1>
    <!--NOS PERIMITIRA MOSTAR LA ESPECIFICACION Y DESCRIPCION DE UN PRODUCTO
-->
    <div id="detalle-producto">
        <div class="imagen">
            <?php if ($pro->imagen != null) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" />
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" />
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="descripcion"><?= $pro->descripcion ?></p>
            <p class="precio"><?= $pro->precio  ?> cop</p> <br>
            <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
        </div>
    </div>

<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif; ?>