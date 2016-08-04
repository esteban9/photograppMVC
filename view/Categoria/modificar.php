
<div class="panel panel-default">
    <div class="panel-heading">Categoria / Editar</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <?php if ($categoria) {
            ?> 
            <a href="#" class="list-group-item active">Acciones</a>
            <a href="<?php echo $helper->url("categoria", "crearCategoria"); ?>" class="list-group-item">Agregar categoria</a>
            <a href="<?php echo $helper->url("categoria", "visualizar"); ?>&id_categoria=<?php echo $categoria->id_categoria; ?>" class="list-group-item">Ver detalles</a>
            <a href="<?php echo $helper->url("categoria", "admin"); ?>" class="list-group-item">Lista de categorias</a>
        </div></div>
    <form id="formID" action="<?php echo $helper->url("categoria", "actualizarCategoria"); ?>" method="post" >
  
            <div  class="col-xs-6">
                <h2>Actualizar Categoría</h2>

                <hr>
                <label> Nombre: </label>
                <input type="text" name="nombre" value="<?php echo $categoria->nombre ?>" class="form-control validate[required, custom[onlyLetterSp]] text-input "/><br>
                <label>Descripcion: </label>
                <input type="textarea" name="descripcion" value="<?php echo $categoria->descripcion ?>" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input"/><br>
                 <label for="foto">Seleccione una Foto</label>
            <form enctype="multipart/form-data">                        

                <div class="form-group">
                    <input name="foto" type="file" class="file" value="<?php echo $categoria->foto ?>" multiple=true data-preview-file-type="any">
                </div>
            </form>
                
                <input type="hidden" name="id_categoria" value="<?php echo $categoria->id_categoria ?>" />
                <input type="submit"  value="Actualizar" class="btn btn-primary"/><br><br>


            <?php }
            ?>
            </form>
        </div>
  
