
<div class="panel panel-default">
    <div class="panel-heading">Nivel de Usuario / Crear</div>
</div>
<div class="list-group">
    <div class="col-md-2">

        <?php if ($nivel) {
            ?> 
        
            <a href="#" class="list-group-item active">Acciones</a>
            <a href="<?php echo $helper->url("nivelUsuario", "crearNivel"); ?>" class="list-group-item">Agregar nivel de usuario</a>
            <a href="<?php echo $helper->url("nivelUsuario", "visualizar"); ?>&id_nivelUsuario=<?php echo $nivel->id_nivelUsuario; ?>" class="list-group-item">Ver detalles</a>
            <a href="<?php echo $helper->url("nivelUsuario", "admin"); ?>" class="list-group-item">Lista de niveles de usuario</a>
        </div></div>
    <form action="<?php echo $helper->url("nivelUsuario", "actualizarNivel"); ?>" method="post" enctype="multipart/form-data">

            <div  class="col-xs-6">
                <h2>Nivel Usuario</h2>
                <hr>
                <label>Nombre: </label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $nivel->nombre ?>" data-validation-placeholder="Campo obligatorio" class="form-control validate[required, custom[onlyLetterSp]] text-input"/><br>
                <label>Descripcion: </label>
                <input type="textarea" name="descripcion" class="form-control" value="<?php echo $nivel->descripcion ?>"/><br>
                <label for="foto">Seleccione una Foto</label>
            <form enctype="multipart/form-data">                        

                <div class="form-group">
                    <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any">
                </div>
            </form>
                <input type="text" disabled="false" enctype="multipart/form-data" class="form-control" value="<?php echo $nivel->foto ?>"/><br>
                <input type="hidden" name="id_nivelUsuario" enctype="multipart/form-data" class="form-control" value="<?php echo $nivel->id_nivelUsuario ?>"/>
                <input type="submit" value="Actualizar" class="btn btn-primary"/><br><br>
            <?php }
            ?>
                    </div>
            </form>
    
 

