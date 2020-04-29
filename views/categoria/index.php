<h1>GESTIONAR CATEGORIAS</h1>
<link rel="stylesheet" href="./assets/css/style.css"/>
<a href="<?=base_url ?>categoria/crear" class="button">Crear Nueva</a>
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
        </tr>
    <?php endwhile; ?>
</table>
