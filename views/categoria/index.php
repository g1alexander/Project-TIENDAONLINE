<h1>GESTIONAR CATEGORIAS</h1>
<link rel="stylesheet" href="./assets/css/style.css"/>
<!-- CREAMOS UN BOTON EL CUAL NOS PERMITIRA CREAR UNA CATEGOARIA 
    ESTE NOS ENVIARA AL FORMULARIO views/categoria/crear.php
 -->
<a href="<?=base_url ?>categoria/crear" class="button button-small">Crear Nueva</a>
<table>
    <tr>
        <th>id</th>
        <th>nombre</th>
    </tr>
    <?php while($cat=$categorias->fetch_object()): ?>
        <tr>
            <td>
                <?=$cat->id; ?>
            </td>
            <td>
                <?=$cat->nombre; ?>
            </td>
            <td>
            <a href="<?=base_url?>categoria/editar&id=<?=$cat->id?>" class="button button-gestion">Editar</a>
            </td>
            <td>
            <a href="<?=base_url?>categoria/eliminar&id=<?=$cat->id?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
