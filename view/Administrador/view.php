<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("administrador", "borrar") . "&id_administrador="; ?>";
</script>
<div class="panel panel-default">
    <div class="panel-heading">Administrador / Visualizar</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <?php
        if ($administrador) {
            ?>
            <a href="#" class="list-group-item active">Acciones</a>
            <a href="<?php echo $helper->url("administrador", "crearAdministrador"); ?>" class="list-group-item">Agregar administador</a>
            <a href="<?php echo $helper->url("administrador", "modificarAdministrador"); ?>&id_administrador=<?php echo $administrador->id_administrador; ?>" class="list-group-item">Actualizar administrador</a>
            <a href="" id="iditem-<?php echo $administrador->id_administrador; ?>" class="list-group-item btnEliminarItem" data-toggle="modal" data-target="#myModal">Eliminar administrador</a>
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
            <a href="<?php echo $helper->url("administrador", "admin"); ?>" class="list-group-item">Lista de administradores</a>
        </div></div> 
    <div class="col-md-10">          
        <table class="table table-striped">
            <h2>Administrador</h2>

            <hr>
            <tr>
                <th>Id del Administrador</th>
                <td> <?php echo $administrador->id_administrador; ?></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td> <?php echo $administrador->nombre; ?> </td>
            </tr>
            <tr>
                <th>Correo</th>
                <td><?php echo $administrador->correo; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
