<?php if(isset($pro)): ?> <!--COMPROBAMOS QUE EXISTA $pro en el controlador 
controllers/productoController.php
-->
<h1><?=$pro->nombre?></h1>
<!--NOS PERIMITIRA MOSTAR LA ESPECIFICACION Y DESCRIPCION DE UN PRODUCTO
-->
    <?php if($pro->imagen != null): ?>
        <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" />
    <?php else: ?>
        <img src="<?=base_url?>assets/img/camiseta.png" />
    <?php endif; ?>
    <p><?= $pro->descripcion ?></p>
    <p><?= $pro->precio ?></p>
    <a href="#" class="button">Comprar</a>

<?php else: ?>
<h1>El producto no existe</h1>
<?php endif; ?>