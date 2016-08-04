<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("articulos", "borrar") . "&id_articulos="; ?>";
</script>
<div class="containeradmin">
    <div class="panel panel-default">
        <div class="panel-heading">Artículos / Listar</div>
    </div>
    <a href="crear.php"></a>
    <div class="list-group">
        <div class="col-md-2">
            <a href="#" class="list-group-item active">Acciones </a>
            <a href="<?php echo $helper->url("articulos", "crearArticulos"); ?>" class="list-group-item">Agregar Artículo</a>
        </div>    
    </div>   
    <div class="col-md-10">
        <table class="table table-striped">
            <h2>Lista de Artículos</h2>
            <hr>

            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th></th>
            </tr>
            <?php
            if (isset($allart)) {
                foreach ($allart as $art) {
                    ?>
                    <tr>
                        <td> <?php echo $art->nombre; ?> </td>
                        <td> <?php echo $art->descripcion; ?> </td>
                        <td> <a href="<?php echo $helper->url("articulos", "visualizar"); ?>&id_articulos=<?php echo $art->id_articulos; ?>&FK_id_administrador=<?php echo $art->FK_id_administrador;?>" class="btn btn-primary"><input type=image src="images/lupa.png" width="15px" height="15px"</a>
                            <a href="<?php echo $helper->url("articulos", "modificarArticulos"); ?>&id_articulos=<?php echo $art->id_articulos; ?>" class="btn btn-primary"><input type=image src="images/lapiz.png" width="15px" height="15px"></a>
                            <a href="#" id="iditem-<?php echo $art->id_articulos; ?>" class="btn btn-primary btnEliminarItem" data-toggle="modal" data-target="#myModal">
                                <input type=image src="images/x.png" width="15px" height="15px"
                            </a>
                        </td>
                    </tr>
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
                    <?php
                }
            } else {
                ?>
                <tr><td colspan="3">No hay registros</td></tr>

                <?php
            }
            ?> 
    </div>
</div>



