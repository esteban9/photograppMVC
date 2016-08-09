<div class="panel panel-default">
    <div class="panel-heading">Fotos / Crear</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <a href="#" class="list-group-item active">Acciones</a>
        <a href="<?php echo $helper->url("fotos", "admin"); ?>" class="list-group-item">Lista de fotos</a>
    </div></div>
<form id="formID" action="<?php echo $helper->url("fotos", "crearFotos"); ?>" method="post" enctype="multipart/form-data" >
    <div  class="col-xs-6">
        <h2>Nueva Foto</h2>
        <hr>
        <label>Nombre:</label> 
        <input type="text" name="nombre" data-validation-placeholder="Campo obligatorio" class="form-control validate[required, custom[onlyLetterSp]] text-input "/><br>

        <label for="foto">Seleccione una Foto</label>
        <form enctype="multipart/form-data">                        

            <div class="form-group">
                <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any">
            </div>
        </form>
        <label>Estado: </label>
        <input type="radio" name="estado" value="Activo" data-validation-placeholder="Campo obligatorio" class="validate[required] text-input"/>Activo
        <input type="radio" name="estado" value="Inactivo"  data-validation-placeholder="Campo obligatorio" class="validate[required] text-input"/>Inactivo<br>
        <br>
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
                echo "<input type='checkbox' name='FK_id_categoria[]' value='$cat->id_categoria'>$cat->nombre</input>";
                echo "<br>";
            }
        }
        ?>
        <br>
        <label>Usuario: </label><br>
         <select name="FK_id_usuario" id="concurso" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input ">
            <option  value="">Seleccione un concurso</option>
         <?php
      
        if ($allusu != "") {
            foreach ($allusu as $usu) {
                echo "<option value='$usu->id_usuario'>$usu->nombre</option>";
            }
        }
        ?>
        </select>
        <input type="submit" value="Crear" class="btn btn-primary"/><br><br>

    </div>
</form>
