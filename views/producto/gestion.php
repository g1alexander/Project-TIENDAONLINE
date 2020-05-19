<h1>GESTION DE PRODUCTOS</h1>

<link rel="stylesheet" href="./assets/css/style.css"/>
<!-- CREAMOS UN BOTON EL CUAL NOS PERMITIRA CREAR UNA CATEGOARIA 
    ESTE NOS ENVIARA AL FORMULARIO views/categoria/crear.php
 -->
<a href="<?=base_url ?>producto/crear" class="button button-small">Crear Producto</a>
<!-- ESTA ES LA SECCION PARA LA CREACION DE UN PRODUCTO-->
<?php if(isset($_SESSION['producto'])&& $_SESSION['producto'] == 'complete'):?>
<strong class="alert_green">El producto se guardo exitosamente</strong>
<?php elseif(isset($_SESSION['producto'])&& $_SESSION['producto'] != 'complete'):?>
<strong class="alert_red">Hubo un error en el registro del producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto');?>
<!-- ESTA ES LA SECCION PARA LA ELIMINACION DE UN PRODUCTO-->
<?php if(isset($_SESSION['delete'])&& $_SESSION['delete'] == 'complete'):?>
<strong class="alert_green">El elimino el producto exitosamente</strong>
<?php elseif(isset($_SESSION['delete'])&& $_SESSION['delete'] != 'complete'):?>
<strong class="alert_red">Hubo un error en la eliminacion del producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete');?>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
    </tr>
    <?php while($pro=$productos->fetch_object()): ?> <!-- ARRAY DE OBJETOS! -->
        <tr>
            <td>
                <?=$pro->id; ?>
            </td>
            <td>
                <?=$pro->nombre; ?>
            </td>
            <td>
                <?=$pro->precio;?> cop
            </td>
            <td>
                <?=$pro->stock; ?>
            </td>
            <td>
            <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
            </td>
            <td>
            <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>