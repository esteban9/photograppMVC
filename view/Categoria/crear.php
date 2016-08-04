
<div class="panel panel-default">
    <div class="panel-heading">Categoria / Crear</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <a href="#" class="list-group-item active">Acciones</a>
        <a href="<?php echo $helper->url("categoria", "admin"); ?>" class="list-group-item">Lista de categorías</a>
    </div></div>
<form id="formID" action="<?php echo $helper->url("categoria", "crearCategoria"); ?>" method="post" enctype="multipart/form-data">
    
        <div  class="col-xs-6">
            <h2>Nueva Categoría</h2>
            <hr>

            <label>Nombre: </label>
            <input type="text" name="nombre" data-validation-placeholder="Campo obligatorio" class="form-control validate[required, custom[onlyLetterSp]] text-input "/><br>
            <label> Descripcion: </label>
            <input type="textarea" name="descripcion" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input"/><br>
            <label for="foto">Seleccione una Foto</label>
            <form id="formID" enctype="multipart/form-data">  
                <div class="form-group">
                    <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input">
                </div>
                </form>
            <input type="submit" value="Crear" class="btn btn-primary"/><br><br>
        </div>
    </form>

