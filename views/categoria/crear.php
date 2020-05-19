<!--ENN LOS H1 EN LOS IF Y ENDIF; LAS CONDICIONES NOS PERMITIRA SABER A QUE FORMULARIO 
QUERRA ACCEDER EL ADMINISTRADOR ESTE FORMULARIO ES REUTILIZABLE 
YA QUE NOS PERMITE CREAR Y EDITAR LAS CATEGORIAS
LA VARIABLE $cat y $edit  NOS PERMITIRA SABER SI ENTRA A EDICION O NO
controllers/CategoriaController.php
-->
<?php if(isset($edit) && isset($cat) && is_object($cat)): ?>
    <h1>EDICION CATAGORIA '<?=$cat->nombre?>'</h1>
    <?php $url_action= base_url."categoria/save&id=".$cat->id ?>
<?php else: ?>
    <h1>CREAR NUEVA CATEGORIA</h1>
    <?php $url_action= base_url."categoria/save" ?>
<?php endif; ?>
<!-- FORMULARIO PARA CREAR UNA NUEVA CATEGORIA EN LA BASE DE DATOS
     ESTO NOS LLEVARA A controllers/categoriaController.php
 -->
<form action="<?=$url_action?>" method="POST">
    <input type="text" id="form-registroo" name="nombre" value="<?= isset($cat) && is_object($cat) ? $cat->nombre : ""; ?>" placeholder="Nombre" required> <br>
    <input type="submit" id="buton-form-registro" value="Guardar">
</form>