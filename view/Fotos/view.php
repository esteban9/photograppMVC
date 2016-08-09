<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("fotos", "borrar") . "&id_foto="; ?>";
</script>
<div class="panel panel-default">
    <div class="panel-heading">Fotos / Visualizar</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <?php
        if ($fotos) {
            ?>
            <a href="#" class="list-group-item active">Acciones</a>
            <a href="<?php echo $helper->url("fotos", "crearFotos"); ?>" class="list-group-item">Agregar foto</a>
            <a href="<?php echo $helper->url("fotos", "modificarFotos"); ?>&id_foto=<?php echo $fotos->id_foto; ?>" class="list-group-item">Actualizar foto</a>
            <a href="" id="iditem-<?php echo $fotos->id_foto; ?>" class="list-group-item btnEliminarItem" data-toggle="modal" data-target="#myModal">Eliminar foto</a>
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
            <a href="<?php echo $helper->url("fotos", "admin"); ?>" class="list-group-item">Lista de fotos</a>
        </div></div> 
    <div class="col-md-10">          
        <table class="table table-striped">
            <h2>Foto</h2>

            <hr>
            <tr>
                <th>Id de la foto</th>
                <td> <?php echo $fotos->id_foto; ?></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td> <?php echo $fotos->nombre; ?> </td>
            </tr>
           
            <tr>
                <th>Foto</th>
                <td> <img src="<?php echo $fotos->foto;?>" width="300px">
            </tr>
            <tr>
                <th>Estado</th>
                <td><?php echo $fotos->estado; ?></td>
            </tr>

            <tr>
                   
        <?php
                if ($con) {  
                   
                  ?>
                
                   <th>Concurso</th>
                   
                  
                   <td>  <?php  echo $con->nombre;?></td>
               <?php 
                }
                ?>

             
                </tr>
                
                   <tr>
                        <?php
                if ($allusu) {  
                   
                  ?>
                
                   <th>Usuario</th>
                   
                  
                   <td>  <?php  echo $allusu->nombre;?></td>
               <?php 
                }
                ?>

             
                </tr>
                
            <?php
        }
        ?>
    </table>
</div>
