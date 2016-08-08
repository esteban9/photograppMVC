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
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th> 
                <th>Fecha Inicio</th>
                <th></th> 
            </tr>

            <?php
            if (isset($allconc)) {
                foreach ($allconc as $concurso) {
                    ?>
                    <tr>
                        <td><?php echo $concurso->nombre; ?></td>
                        <td><?php echo $concurso->descripcion; ?></td>
                        <td><?php echo $concurso->fecha_inicio; ?></td>
                        <td><a href="<?php echo $helper->url("concurso", "visualizar"); ?>&id_concurso=<?php echo $concurso->id_concurso; ?>&FK_id_administrador=<?php echo $concurso->FK_id_administrador;?>&FK_id_categoria=<?php echo $concurso->FK_id_categoria;?>&FK_id_nivelUsuario=<?php echo $concurso->FK_id_nivelUsuario;?>" class="btn btn-primary"><input type=image src="images/lupa.png" width="15px" height="15px"></a>
                            <a href="<?php echo $helper->url("concurso", "modificarconcurso"); ?>&id_concurso=<?php echo $concurso->id_concurso; ?>" class="btn btn-primary"><input type=image src="images/lapiz.png" width="15px" height="15px"</a>
                            <a href="#" id="iditem-<?php echo $concurso->id_concurso; ?>" class="btn btn-primary btnEliminarItem" data-toggle="modal" data-target="#myModal">
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
                 <?php   if(isset($_GET['error']) && $_GET['error'] != 0){
                           switch($_GET['error']){
                               case 1451: 
                                   echo "No se elimino el registro";
                                   break;
                             
                           }
               }
                          
                      ?>
    </div>
</div>



