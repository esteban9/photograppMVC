
<div class="panel panel-default">
    <div class="panel-heading">Administrador / Editar</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <?php if ($fotos) {
            ?> 
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#concurso > option[value="<?php echo $fotos->FK_id_concurso; ?>"]').attr('selected', 'selected');
                    $('#usuario > option[value="<?php echo $fotos->FK_id_usuario; ?>"]').attr('selected', 'selected');
                });
            </script>
            <a href="" class="list-group-item active">Acciones</a>
            <a href="<?php echo $helper->url("fotos", "crearFotos"); ?>" class="list-group-item">Agregar foto</a>
            <a href="<?php echo $helper->url("fotos", "visualizar"); ?>&id_foto=<?php echo $fotos->id_foto; ?>&FK_id_concurso=<?php echo $fotos->FK_id_concurso; ?>" class="list-group-item">Ver detalles</a>
            <a href="<?php echo $helper->url("fotos", "admin"); ?>" class="list-group-item">Lista de fotos</a>
        </div></div>
    <form id="formID" action="<?php echo $helper->url("fotos", "actualizarFotos"); ?>" method="post" enctype="multipart/form-data">

        <div  class="col-xs-6">
            <h2>Actualizar Foto</h2>

            <hr>
            <label>Nombre: </label>
            <input type="text" name="nombre" value="<?php echo $fotos->nombre ?>" class="form-control"/><br>
            <label>Estado: </label>
            <input type="radio" name="estado" value="Activo" data-validation-placeholder="Campo obligatorio" class="validate[required] text-input"/>Activo
            <input type="radio" name="estado" value="Inactivo"  data-validation-placeholder="Campo obligatorio" class="validate[required] text-input"/>Inactivo<br>
            <br>

            <label for="foto">Seleccione una Foto</label>
            <form enctype="multipart/form-data">                        

                <div class="form-group">
                    <input name="foto" type="file" value="<?php echo $fotos->foto ?>" class="file" multiple=true data-preview-file-type="any">
                </div>
            </form>
            <input type="text" disabled="false" value="<?php echo $fotos->foto ?>" class="form-control"/><br>

            <input type="hidden" name="id_foto" value="<?php echo $fotos->id_foto ?>" class="form-control"/><br>

            <label> Concurso:</label>
            <select name="FK_id_concurso" id="concurso" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input ">
                <option  value="">Seleccione un concurso</option>
                <?php
                if ($allcon != "") {
                    foreach ($allcon as $item) {
                        echo "<option value='$item->id_concurso'>$item->nombre</option>";
                    }
                }
                ?>
            </select>
            <br>
        <label>Categoria: </label><br>
        <?php
        if ($allcat != "") {
            foreach ($allcat as $cat) {
                echo "<input type='checkbox' name='FK_id_categoria' value='$cat->id_categoria'>$cat->nombre</input>";
                echo "<br>";
            }
        }
        ?>
        <br>
         <label> Concurso:</label>
            <select name="FK_id_usuario" id="usuario" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input ">
                <option  value="">Seleccione un concurso</option>
                <?php
                if ($allusu != "") {
                    foreach ($allusu as $usu) {
                        echo "<option value='$usu->id_usuario'>$usu->nombre</option>";
                    }
                }
                ?>
            </select>
            <br>
            <input type="submit"  value="Actualizar" class="btn btn-primary"/><br><br>
        <?php }
        ?>
    </div>
</form>


