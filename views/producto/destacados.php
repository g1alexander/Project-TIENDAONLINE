<h1>ALGUNOS DE NUESTROS PRODUCTOS</h1>
<!--BUCLE QUE NOS PERMITIRA MOSTRAR LOS 6 PRODUCTOS ALEATORIOS 
controllers/productoController.php
-->
<?php while($product = $productos->fetch_object()): ?>
<div class="product">
<?php if($product->imagen != null): ?>
<a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
    <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
    <?php else: ?>
        <img src="<?=base_url?>assets/img/camiseta.png" />
<?php endif; ?>   
    <h2><?=$product->nombre?></h2>
</a>
    <p><?= $product->precio ?> cop</p>
    <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
</div>
<?php endwhile; ?>