<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("concurso", "borrar") . "&id_concurso="; ?>";
</script>
<div class="panel panel-default">
    <div class="panel-heading">Concurso / Crear</div>
</div>
<div class="containeradmin">
    <div class="list-group">
        <div class="col-md-2">
            <a href="#" class="list-group-item active">Acciones </a>
            <a href="<?php echo $helper->url("concurso", "crearConcurso"); ?>" class="list-group-item">Agregar concurso</a>
        </div>    
    </div>
    <div class="col-md-10">
        <table class="table table-striped">
            <h2>Lista de Concursos</h2>
            <hr>
         

            <?php
            if (isset($allconc)) {
                foreach ($allconc as $concurso) {
                    ?>
                    <tr>
                        <td><?php echo "Nombre: ". $concurso->nombre; ?></td>
                        <td><?php echo "Descripción: ". $concurso->descripcion; ?></td>
                    <div>
                        <td> </td></div>
                        <td><a href="<?php echo $helper->url("site", "visualizar"); ?>&id_concurso=<?php echo $concurso->id_concurso; ?>" ><img src="<?php echo $concurso->foto; ?>?>&FK_id_administrador=<?php echo $concurso->FK_id_administrador;?>&FK_id_categoria=<?php echo $concurso->FK_id_categoria;?>&FK_id_nivelUsuario=<?php echo $concurso->FK_id_nivelUsuario;?>" width="300px"></a>
                           
                            
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





