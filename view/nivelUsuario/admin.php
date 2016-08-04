<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("nivelUsuario", "borrar") . "&id_nivelUsuario="; ?>";
</script>
<div class="containeradmin">
    <div class="panel panel-default">
        <div class="panel-heading">Nivel de Usuario / Listar</div>
    </div>
    <div class="list-group">
        <div class="col-md-2">
            <a href="#" class="list-group-item active">Acciones </a>
            <a href="<?php echo $helper->url("nivelUsuario", "CrearNivel"); ?>" class="list-group-item">Agregar nivel de usuario</a>
        </div>    
    </div>
    <div class="col-md-10">
        <table class="table table-striped">
            <h2>Lista de Niveles de usuario</h2>
            <hr>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th></th>   
            </tr>

            <?php
            if (isset($allni)) {
                foreach ($allni as $niv) {
                    ?>
                    <tr>
                        <td><?php echo $niv->nombre; ?></td>
                        <td><?php echo $niv->descripcion; ?></td>
                        <td><a href="<?php echo $helper->url("nivelUsuario", "visualizar"); ?>&id_nivelUsuario=<?php echo $niv->id_nivelUsuario; ?>" class="btn btn-primary"><input type=image src="images/lupa.png" width="15px" height="15px"></a>
                            <a href="<?php echo $helper->url("nivelUsuario", "modificarNivel"); ?>&id_nivelUsuario=<?php echo $niv->id_nivelUsuario; ?>" class="btn btn-primary"><input type=image src="images/lapiz.png" width="15px" height="15px"</a>
                            <a href="#" id="iditem-<?php echo $niv->id_nivelUsuario; ?>" class="btn btn-primary btnEliminarItem" data-toggle="modal" data-target="#myModal">
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
        </table>
    </div>
</div>
</div>



