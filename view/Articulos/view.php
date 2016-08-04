<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("articulos", "borrar"); ?>&id_articulos=<?php echo $articulo->id_articulos; ?>";
</script>

<div class="panel panel-default">
    <div class="panel-heading">Artículos / Visualizar</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <?php
        if ($articulo) {
            ?>
            <a href="#" class="list-group-item active">Acciones</a>
            <a href="<?php echo $helper->url("articulos", "crearArticulos"); ?>" class="list-group-item">Agregar artículo</a>
            <a href="<?php echo $helper->url("articulos", "modificarArticulos"); ?>&id_articulos=<?php echo $articulo->id_articulos; ?>" class="list-group-item">Actualizar artículo</a>
            <a href="" id="iditem-<?php echo $art->id_articulos; ?>" class="list-group-item btnEliminarItem" data-toggle="modal" data-target="#myModal">Eliminar artículo</a>
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
            <a href="<?php echo $helper->url("articulos", "admin"); ?>" class="list-group-item">Lista de artículos</a>
        </div></div> 
    <div class="col-md-10">          
        <table class="table table-striped">       

            <h2>Artículo</h2>
            <hr>
            <trbody>
                <tr>
                    <th>Id del Articulo</th>
                    <td><?php echo $articulo->id_articulos; ?></td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td><?php echo $articulo->nombre; ?></td>
                </tr> 
                <tr>
                    <th>Descripción</th>
                    <td><?php echo $articulo->descripcion; ?></td>
                </tr>

                <tr>

                    <?php
                    if ($admin) {
                        ?>

                        <th>Administrador</th>


                        <td>  <?php echo $admin->nombre; ?></td>
                        <?php
                    }
                    ?>


                </tr>
                </tr>
                </tbody>
        </table>  

    <?php }
    ?>
</div>




