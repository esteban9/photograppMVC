<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("usuarios", "borrar") . "&id_usuario="; ?>";
</script>
<div class="panel panel-default">
    <div class="panel-heading">Usuario / Visualizar</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <a href="#" class="list-group-item active">Acciones</a>
        <a href="<?php echo $helper->url("usuarios", "crearUsuarios"); ?>" class="list-group-item">Agregar usuario</a>
        <a href="<?php echo $helper->url("usuarios", "modificarUsuarios"); ?>&id_usuario=<?php echo $usuario->id_usuario; ?>" class="list-group-item">Actualizar usuario</a>
        <a href="" id="iditem-<?php echo $usuario->id_usuario; ?>" class="list-group-item btnEliminarItem" data-toggle="modal" data-target="#myModal">Eliminar usuario</a>
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
        <a href="<?php echo $helper->url("usuarios", "admin"); ?>" class="list-group-item">Lista de usuarios</a>
    </div></div> 
<div class="col-md-10">          
    <table class="table table-striped">
        <h2>Usuario</h2>
        <hr>
        <tr>
            <th>Id  del Usuario</th>
            <td><?php echo $usuario->id_usuario; ?></td>
        </tr>
        <tr>
            <th>Nombre del Usuario</th>
            <td><?php echo $usuario->nombre; ?></td>
        </tr>
        <tr>
            <th>Apellido</th>
            <td><?php echo $usuario->apellido; ?> </td>
        </tr>
        <tr>
            <th>Fecha de Nacimiento</th>
            <td><?php echo $usuario->fecha_nacimiento; ?></td>
        </tr>
        <tr>
            <th>Correo</th>
            <td><?php echo $usuario->correo; ?></td>
        </tr>
        <tr>
            <th>Genero</th>
            <td><?php echo $usuario->genero; ?></td>
        </tr>
        <tr>
            <th>Telefono</th>
            <td><?php echo $usuario->telefono; ?></td>
        </tr>
        <tr>
            <?php
            if ($nivel) {
                ?>
                <th>Nivel de Usuario</th>
                <td> <?php echo $nivel->nombre; ?> </td>
                <?php
            }
            ?>
        </tr>
        <tr>
            <?php
            if ($categoria) {
                ?>
                <th>Categoria de interes</th>
                <td> <?php echo $categoria->nombre; ?> </td>
                <?php
            }
            ?>
        </tr>
    </table>
</div>

