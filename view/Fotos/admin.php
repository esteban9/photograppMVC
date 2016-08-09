<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("fotos", "borrar") . "&id_foto="; ?>";
</script>
<div class="containeradmin">
    <div class="panel panel-default">
        <div class="panel-heading">Fotos / Listar</div>
    </div>
    <div class="list-group">
        <div class="col-md-2">
            <a href="#" class="list-group-item active">Acciones </a>
            <a href="<?php echo $helper->url("fotos", "crearFotos"); ?>" class="list-group-item">Agregar foto</a>
        </div>    
    </div>

    <div class="col-md-10">
        <table class="table table-striped">
            <h2>Lista de Fotos</h2>
            <hr>
            <tr>
                <th>Nombre</th>
                <th>Foto</th>
                <th></th>   
            </tr>

            <?php
            if (isset($allfot)) {
                foreach ($allfot as $fotos) {
                    ?>

                    <tr>
                        <td><?php echo $fotos->nombre; ?></td>
                       
                        <td><?php echo $fotos->foto; ?></td>
                        <td><a href="<?php echo $helper->url("fotos", "visualizar"); ?>&id_foto=<?php echo $fotos->id_foto; ?>&FK_id_concurso=<?php echo $fotos->FK_id_concurso;?>&FK_id_usuario=<?php echo $fotos->FK_id_usuario;?>" class="btn btn-primary"><input type=image src="images/lupa.png" width="15px" height="15px"></a>
                            <a href="<?php echo $helper->url("fotos", "modificarFotos"); ?>&id_foto=<?php echo $fotos->id_foto; ?>" class="btn btn-primary"><input type=image src="images/lapiz.png" width="15px" height="15px"</a>
                    
                            <a href="#" id="iditem-<?php echo $fotos->id_foto; ?>" class="btn btn-primary btnEliminarItem" data-toggle="modal" data-target="#myModal">
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
                <tr><td colspan="4">No hay registros</td></tr>

                <?php
            }
            ?>        
    </div>
</div>



