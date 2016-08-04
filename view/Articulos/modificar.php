<div class="panel panel-default">
    <div class="panel-heading">Artículos / Editar</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <?php if ($articulo) {
            ?>    
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#administrador > option[value="<?php echo $articulo->FK_id_administrador; ?>"]').attr('selected', 'selected');
                });
            </script>
            <a href="#" class="list-group-item active">Acciones</a>
            <a href="<?php echo $helper->url("articulos", "crearArticulos"); ?>" class="list-group-item">Agregar artículo</a>
            <a href="<?php echo $helper->url("articulos", "visualizar"); ?>&id_articulos=<?php echo $articulo->id_articulos; ?>&FK_id_administrador=<?php echo $articulo->FK_id_administrador; ?>" class="list-group-item">Ver detalles</a>
            <a href="<?php echo $helper->url("articulos", "admin"); ?>" class="list-group-item">Lista de artículos</a>
        </div></div>
    <form id="formID" action="<?php echo $helper->url("articulos", "actualizarArticulo"); ?>" method="post">

        <div  class="col-xs-6">
            <h2>Actualizar Artículo</h2>
            <hr>
            <label>Nombre: </label>
            <input type="text" name="nombre" value="<?php echo $articulo->nombre ?>" data-validation-placeholder="Campo obligatorio" class="form-control validate[required, custom[onlyLetterSp]] text-input"/><br>
            <label>Descripcion: </label>
            <input type="textarea" name="descripcion" value="<?php echo $articulo->descripcion ?>" class="form-control"/><br>
            <label> Administrador:</label>

            <select name="FK_id_administrador" id="administrador" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input"/><br>
            <option value="">Seleccione una opcion</option>>
            <?php
            if ($allAdmin != "") {
                foreach ($allAdmin as $adm) {
                    echo "<option value='$adm->id_administrador'>$adm->nombre</option>";
                }
            }
            ?>
            </select>
            <br>
            <input type="hidden" name="id_articulos" value="<?php echo $articulo->id_articulos ?>" />

            <input type="submit"  value="Actualizar" class="btn btn-primary"/><br><br>


        <?php }
        ?>

    </div>
</form>





