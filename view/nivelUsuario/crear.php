
<div class="panel panel-default">
    <div class="panel-heading">Nivel de Usuario / Crear</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <a href="#" class="list-group-item active">Acciones</a>
        <a href="<?php echo $helper->url("nivelUsuario", "admin"); ?>" class="list-group-item">Lista de los Niveles del Usuario</a>
    </div></div>
<form id="formID" action="<?php echo $helper->url("nivelUsuario", "crearNivel"); ?>" method="post" enctype="multipart/form-data">
   
        <div  class="col-xs-6">
            <h2>Nuevo Nivel Usuario</h2>
            <hr>
            <label>Nombre: </label>
            <input type="text" name="nombre" data-validation-placeholder="Campo obligatorio" class="form-control validate[required, custom[onlyLetterSp]] text-input"/><br>
            <label>Descripcion: </label>
            <input type="textarea" name="descripcion" class="form-control"/><br>
            <label for="foto">Seleccione una Foto</label>
            <form enctype="multipart/form-data">                        

                <div class="form-group">
                    <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any">
                </div>
            </form>
            <!--                        <label>Foto:</label>
                                    <input type="text" name="foto" enctype="multipart/form-data" class="form-control"/><br>-->
            <input type="submit" value="Crear" class="btn btn-primary"/><br><br>
            
        </div>
    </form>
