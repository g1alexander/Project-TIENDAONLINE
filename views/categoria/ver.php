<?php if(isset($categoria)): ?> 
<!-- COMPROBAMOS QUE EXISTA $categoria EN EL controller/categoriaController.php METODO ver -->
<h1><?=$categoria->nombre?></h1>
<?php if($productos->num_rows == 0): ?> <!--comprobamos que nos llegue parametro mysql-->
<h1>No hay productos para mostrar</h1>
<?php else: ?>
<!--BUCLE QUE NOS MUESTRA EL PRODUCTO-->
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

<?php endif; ?>
<?php else: ?>
<h1>La categoria no existe</h1>
<?php endif; ?>