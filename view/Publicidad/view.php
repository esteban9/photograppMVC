<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("publicidad", "borrar") . "&id_publicidad="; ?>";
</script>
<div class="panel panel-default">
    <div class="panel-heading">Publicidad / Visualizar</div>
</div>
<br>
<br>
<div class="list-group">
    <div class="col-md-2">
        <?php
        if ($publicidad) {
            ?>
            <a href="#" class="list-group-item active">Acciones</a>
            <a href="<?php echo $helper->url("publicidad", "crearPublicidad"); ?>" class="list-group-item">Agregar publicidad</a>
            <a href="<?php echo $helper->url("publicidad", "modificarPublicidad"); ?>&id_publicidad=<?php echo $publicidad->id_publicidad; ?>" class="list-group-item">Actualizar publicidad</a>
            <a href="" id="iditem-<?php echo $pub->id_publicidad; ?>" class="list-group-item btnEliminarItem" data-toggle="modal" data-target="#myModal">Eliminar publicidad</a>
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
            <a href="<?php echo $helper->url("publicidad", "admin"); ?>" class="list-group-item">Lista de publicidades</a>
        </div></div> 
    <div class="col-md-10">          
        <table class="table table-striped">
            <h2>Publicidad</h2>

            <hr>
            <tr>
                <th>Id del la publicidad</th>
                <td> <?php echo $publicidad->id_publicidad; ?></td>
            </tr>
             <tr>
                <th>Nombre del la publicidad</th>
                <td> <?php echo $publicidad->nombre; ?></td>
            </tr>
            <tr>

                <th>Estado</th>
                <td><?php echo $publicidad->estado; ?></td>
            </tr>
            <tr>
                <th>Ruta foto</th>
                <td><?php echo $publicidad->ruta_foto; ?></td>
            </tr>
            <tr>
                <th>Fecha registro</th>
                <td><?php echo $publicidad->fecha_registro; ?></td>
            </tr>
            <tr>
                <th>Fecha inicio</th>
                <td><?php echo $publicidad->fecha_inicio; ?></td>
            </tr>
            <tr>
                <th>Fecha fin</th>
                <td><?php echo $publicidad->fecha_fin; ?></td>
            </tr>
             <tr>
                   
        <?php
                if ($allus) {  
                   
                  ?>
                
                   <th>Usuario</th>
                   
                  
                   <td>  <?php  echo $allus->nombre;?></td>
               <?php 
                }
                ?>

             
                </tr>
             <tr>
                   
        <?php
                if ($alladmin) {  
                   
                  ?>
                
                   <th>Administrador</th>
                   
                  
                   <td>  <?php  echo $alladmin->nombre;?></td>
               <?php 
                }
                ?>

             
                </tr>
            <?php
        }
        ?>
    </table>
</div>



