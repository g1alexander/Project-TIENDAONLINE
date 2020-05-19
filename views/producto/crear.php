<!--ENN LOS H1 EN LOS IF Y ENDIF; LAS CONDICIONES NOS PERMITIRA SABER A QUE FORMULARIO 
QUERRA ACCEDER EL ADMINISTRADOR ESTE FORMULARIO ES REUTILIZABLE 
YA QUE NOS PERMITE CREAR Y EDITAR LAS PRODUCTOS
LA VARIABLE $pro y $edit  NOS PERMITIRA SABER SI ENTRA A EDICION O NO
controllers/ProductoController.php
-->
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>EDICION DE PRODUCTO '<?=$pro->nombre?>'</h1>
    <?php $url_action= base_url."producto/save&id=".$pro->id ?>
<?php else: ?>
    <h1>CREAR PRODUCTOS</h1>
    <?php $url_action= base_url."producto/save" ?>
<?php endif; ?>
<div class="form_container">
<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
<!-- ES IMPORTANTE INGRESAR EL enctype PARA PODER SUBIR LAS IMAGENES (permite enviar ficheros)-->
<label id="product-crear" for="nombre">Nombre</label>
<!-- IMPRIMIR UNA TERNARIA PARA MOSTRAR LOS CAMPOS DE EDICION -->
<input type="text" id="producto-registro" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ""; ?>">

<label id="product-crear" for="descripcion">Descripcion</label>
<textarea id="producto-registro" name="descripcion"<?= isset($pro) && is_object($pro) ? $pro->descripcion : ""; ?>></textarea>

<label id="product-crear" for="precio">Precio</label>
<input type="text" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->precio : ""; ?>" id="producto-registro"> 

<label id="product-crear" for="stock">Stock</label>
<input type="number"  id="producto-registro" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : ""; ?>">

<label id="product-crear" for="categoria">Categoria</label>
<?php $categorias = Utils::showCategorias(); ?>
<select name="categoria" id="producto-registro">
<?php while($cat = $categorias->fetch_object()): ?>
    <option value="<?=$cat->id?>"<?= isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ""; ?>><?= $cat ->nombre ?>
    </option>  
<?php endwhile; ?>
</select>

<label id="product-crear" for="imagen">Imagen</label>
<?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
   <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb"> 
<?php endif; ?>
<input type="file" id="producto-registro" name="imagen"> <br>

<input type="submit" id="buton--registro" value="guardar">

</form>
</div>
