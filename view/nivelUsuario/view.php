<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("nivelUsuario", "borrar") . "&id_nivelUsuario="; ?>";
</script>
        <div class="panel panel-default">
            <div class="panel-heading">Nivel de usuario / Visualizar</div>
        </div>
        <div class="list-group">
            <div class="col-md-2">
                <?php
                if ($nivel) {
                    ?> 
                    <a href="#" class="list-group-item active">Acciones</a>
                    <a href="<?php echo $helper->url("nivelUsuario", "crearNivel"); ?>" class="list-group-item">Agregar nivel de usuario</a>
                    <a href="<?php echo $helper->url("nivelUsuario", "modificarNivel"); ?>&id_nivelUsuario=<?php echo $nivel->id_nivelUsuario; ?>" class="list-group-item">Actualizar nivel deusuario</a>
                    <a href="" id="iditem-<?php echo $niv->id_nivelUsuario; ?>" class="list-group-item btnEliminarItem" data-toggle="modal" data-target="#myModal">Eliminar nivel de usuario</a>
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
                    <a href="<?php echo $helper->url("nivelUsuario", "admin"); ?>" class="list-group-item">Lista de niveles de usuarios</a>
                </div></div> 
            <div class="col-md-10">          
                <table class="table table-striped">
                    <h2>Nivel Usuario</h2>
                    <hr>

                    <trbody>
                        <tr>
                            <th>Id  del nivel usuario</th>
                            <td><?php echo $nivel->id_nivelUsuario; ?></td>
                        </tr>
                        <tr>
                            <th>Nombre </th>
                            <td><?php echo $nivel->nombre; ?></td>
                        </tr>
                        <tr>
                            <th>Descripcion</th>
                            <td><?php echo $nivel->descripcion; ?> </td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td> <img src="<?php echo $nivel->foto; ?> " width="300px">
                                </td>
                        </tr>

                    </trbody>
                <?php } ?>
            </table>
        </div>
        
