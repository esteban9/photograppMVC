<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("usuarios", "borrar") . "&id_usuario="; ?>";
</script>
<div class="containeradmin">
    <title>Photograpp</title>
</head>
<body>
    </head>
<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Usuario / Listar</div>
        </div>
        <div class="list-group">
            <div class="col-md-2">
                <a href="#" class="list-group-item active">Acciones</a>
                <a href="<?php echo $helper->url("usuarios", "crearUsuario"); ?>" class="list-group-item">Agregar usuario</a>
            </div>    
        </div>
        <div class="col-md-10">
            <table class="table table-striped">
                <h2>Lista de Usuarios</h2>
                <hr>

                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th></th>
                </tr>
                <?php
                if (isset($allusu)) {
                    foreach ($allusu as $usuario) {
                        ?>
                        <tr>
                            <td><?php echo $usuario->nombre; ?></td>
                            <td><?php echo $usuario->apellido; ?></td>
                            <td><?php echo $usuario->correo; ?></td>
                            <td>
                                <a href="<?php echo $helper->url("usuarios", "visualizar"); ?>&id_usuario=<?php echo $usuario->id_usuario; ?>&FK_id_nivelUsuario=<?php echo $usuario->FK_id_nivelUsuario; ?>&FK_id_categoria=<?php echo $usuario->FK_id_categoria;?>" class="btn btn-primary"><input type=image src="images/lupa.png" width="15" height="15"></a>
                                <a href="<?php echo $helper->url("usuarios", "modificarUsuarios"); ?>&id_usuario=<?php echo $usuario->id_usuario; ?>" class="btn btn-primary"><input type=image src="images/lapiz.png" width="15" height="15"></button>
                                    <a href="#" id="iditem-<?php echo $usuario->id_usuario; ?>" class="btn btn-primary btnEliminarItem" data-toggle="modal" data-target="#myModal">
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
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr><td colspan="4">No hay registros</td></tr>

                    <?php
                }
                ?>    
            </table>
        </div>
    </div>
</div>


