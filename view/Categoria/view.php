<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("categoria", "borrar") . "&id_categoria="; ?>";
</script>
<div class="panel panel-default">
    <div class="panel-heading">Categoria / Visualizar</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <?php
        if ($categoria) {
            ?>
            <a href="#" class="list-group-item active">Acciones</a>
            <a href="<?php echo $helper->url("categoria", "crearCategoria"); ?>" class="list-group-item">Agregar Categoría</a>
            <a href="<?php echo $helper->url("categoria", "modificarCategoria"); ?>&id_categoria=<?php echo $categoria->id_categoria; ?>"class="list-group-item">Actualizar Categoría</a>
            <a href="" id="iditem-<?php echo $cat->id_categoria; ?>" class="list-group-item btnEliminarItem" data-toggle="modal" data-target="#myModal">Eliminar Categoría</a>
            <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Eliminar</h4>
                                </div>
                                <div class="modal-body">
                                    <p>¿Está seguro que desea eliminar el registro?</p>
                                </div>
                                <div class="modal-footer">
                                    <a id="btnEliminar">
                                        <button type="button" class="btn btn-default">Eliminar</button>
                                    </a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div></div></div></div>
            <a href="<?php echo $helper->url("categoria", "admin"); ?>" class="list-group-item">Lista de Categorías</a>
        </div></div> 
    <div class="col-md-10">          
        <table class="table table-striped">
            <h2>Categoría</h2>
            <hr>
            <tr>
                <th>Id de la categoría</th>
                <td> <?php echo $categoria->id_categoria; ?></td>
            </tr>
            <tr>
                <th>Nombre</th><!DOCTYPE html>

            <td><?php echo $categoria->nombre; ?>  </td>
            </tr>
            <tr>
                <th>Descripción</th>
                <td><?php echo $categoria->descripcion; ?></td>
            </tr>
            <tr>
                <th>Foto</th>
                 <td> <img src="<?php echo $categoria->foto;?>" width="300px">
            </tr>
            <?php
        }
        ?>

    </table>
</div>



