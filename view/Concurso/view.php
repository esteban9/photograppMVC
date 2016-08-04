<script type="text/javascript">
    var urlDelete = "<?php echo $helper->url("concurso", "borrar") . "&id_concurso="; ?>";
</script>
<div class="panel panel-default">
    <div class="panel-heading">Concurso / Visualizar</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <?php
        if ($concurso) {
            ?>
            <a href="#" class="list-group-item active">Acciones</a>
            <a href="<?php echo $helper->url("concurso", "crearConcurso"); ?>" class="list-group-item">Agregar Concurso</a>
            <a href="<?php echo $helper->url("concurso", "modificarconcurso"); ?>&id_concurso=<?php echo $concurso->id_concurso; ?>"class="list-group-item">Actualizar Concurso</a>
            <a href="" id="iditem-<?php echo $concurso->id_concurso; ?>" class="list-group-item btnEliminarItem" data-toggle="modal" data-target="#myModal">Eliminar Concurso</a>
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
            <a href="<?php echo $helper->url("concurso", "admin"); ?>" class="list-group-item">Lista de Concursos</a>
        </div></div> 
    <div class="col-md-10">          
        <table class="table table-striped">
            <h2>Concurso</h2>
            <hr>

            <tr>
                <th>Id del concurso</th>
                <td><?php echo $concurso->id_concurso; ?></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><?php echo $concurso->nombre; ?></td>
            </tr>
            <tr>
                <th>Estado</th>
                <td><?php echo $concurso->estado; ?></td>
            </tr>
            <tr>
                <th>Descripcion</th>
                <td><?php echo $concurso->descripcion; ?></td>
            </tr>
            <tr>
                <th>Foto</th>
                <td> <img src="<?php echo $concurso->foto; ?>" width="300px">
            </tr>
            <tr>
                <th>peso limite</th>
                <td><?php echo $concurso->peso_limite_foto; ?></td>
            </tr>
            <tr>
                <th>Fecha registro</th>
                <td><?php echo $concurso->fecha_registro; ?></td>
            </tr>
            <tr>
                <th>Fecha inicio</th>
                <td><?php echo $concurso->fecha_inicio; ?></td>
            </tr>
            <tr>
                <th>Fecha fin</th>
                <td><?php echo $concurso->fecha_fin; ?></td>
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
            
                <tr>
                   
        <?php
                if ($allcat) {  
                   
                  ?>
                
                   <th>Categoria</th>
                   
                  
                   <td>  <?php  echo $allcat->nombre;?></td>
               <?php 
                }
                ?>

             
                </tr>
                   <tr>
                   
        <?php
                if ($nivel) {  
                   
                  ?>
                
                   <th>Nivel usuario</th>
                   
                  
                   <td>  <?php  echo $nivel->nombre;?></td>
               <?php 
                }
                ?>
 <?php 
                }
                ?>
             
                </tr>
       

    </table>
</div>

