<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("publicidad", "borrar") . "&id_publicidad="; ?>";
</script>
<div class="containeradmin">
    <div class="panel panel-default">
        <div class="panel-heading">Publicidad / Listar</div>
    </div>
    <br>
    <br>
    <div class="list-group">
        <div class="col-md-2">
            <a href="#" class="list-group-item active">Acciones </a>
            <a href="<?php echo $helper->url("publicidad", "crearPublicidad"); ?>" class="list-group-item">Agregar publicidades</a>
        </div>    
    </div>

    <div class="col-md-10">
        <table class="table table-striped">
            <h2>Lista de Publicidad</h2>
            <hr>
            <tr>

                <th>Estado</th>
                <th>Fecha Inicio</th> 
                <th>Fecha Fin</th> 
                <th></th> 
            </tr>

            <?php
            if (isset($allpub)) {
                foreach ($allpub as $pub) {
                    ?>

                    <tr>

                        <td><?php echo $pub->estado; ?></td>
                        <td><?php echo $pub->fecha_inicio; ?></td>
                        <td><?php echo $pub->fecha_fin; ?></td>
                        <td><a href="<?php echo $helper->url("publicidad", "visualizar"); ?>&id_publicidad=<?php echo $pub->id_publicidad; ?>&FK_id_usuario=<?php echo $pub->FK_id_usuario;?>&FK_id_administrador=<?php echo $pub->FK_id_administrador;?>" class="btn btn-primary"><input type=image src="images/lupa.png" width="15px" height="15px"></a>
                            <a href="<?php echo $helper->url("publicidad", "modificarPublicidad"); ?>&id_publicidad=<?php echo $pub->id_publicidad; ?>" class="btn btn-primary"><input type=image src="images/lapiz.png" width="15px" height="15px"</a>
                            <a href="#" id="iditem-<?php echo $pub->id_publicidad; ?>" class="btn btn-primary btnEliminarItem" data-toggle="modal" data-target="#myModal">
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
                <tr><td colspan="10">No hay registros</td></tr>

                <?php
            }
            ?>        
    </div>
</div>






