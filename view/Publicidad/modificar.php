<script>
            $(function () {
               
                $("#fecha_inicio").datepicker({
                    dateFormat: "yy-mm-dd",
                     
                    minDate: GetTodayDate(),
                    //minDate: 0
                    onSelect: function (dateText, inst) {
                        $('#fecha_fin').val("");
                        $('#fecha_fin').datepicker("option", "minDate", new Date(dateText));
                    }                    
                });
                
                $("#fecha_fin").datepicker({
                    dateFormat: "yy-mm-dd"
                });
            });
            function GetTodayDate() {
                var tdate = new Date();
                var dd = tdate.getDate(); //yields day
                var MM = tdate.getMonth(); //yields month
                var yyyy = tdate.getFullYear(); //yields year
                var today = yyyy + "-" + (MM + 1) + "-" + dd;

                return today;
            }
        </script>
<div class="panel panel-default">
    <div class="panel-heading">Publicidad / Editar</div>
</div>
<br>
<br>
<div class="list-group">
    <div class="col-md-2">
        <?php if ($publicidad) {
            ?>  
        <script type="text/javascript">
            $(document).ready(function(){  
                $('#usuario > option[value="<?php echo $publicidad->FK_id_usuario; ?>"]').attr('selected', 'selected');
                $('#administrador > option[value="<?php echo $publicidad->FK_id_administrador; ?>"]').attr('selected', 'selected');

            });
        </script>
            <a href="#" class="list-group-item active">Acciones</a>
            <a href="<?php echo $helper->url("publicidad", "crearPublicidad"); ?>" class="list-group-item">Agregar publicidad</a>
            <a href="<?php echo $helper->url("publicidad", "visualizar"); ?>&id_publicidad=<?php echo $publicidad->id_publicidad; ?>&FK_id_usuario=<?php echo $publicidad->FK_id_usuario;?>&FK_id_administrador=<?php echo $publicidad->FK_id_administrador;?>" class="list-group-item">Ver detalles</a>
            <a href="<?php echo $helper->url("publicidad", "admin"); ?>" class="list-group-item">Lista de publicidades</a>
        </div></div>
    <form id="formID" action="<?php echo $helper->url("publicidad", "actualizarPublicidad"); ?>" method="post" enctype="multipart/form-data">
     
            <div  class="col-xs-6">
                <h2>Actualizar Publicidad</h2>

                <hr>
               <label>Nombre:</label> 
            <input type="text" name="nombre" class="form-control" value="<?php echo $publicidad->nombre  ?>"><br>
                 <label for="foto">Seleccione una Foto</label>
            <form enctype="multipart/form-data">                        

                <div class="form-group">
                    <input name="ruta_foto" type="file" class="file" multiple=true data-preview-file-type="any">
                </div>
            </form>
                 <input name="ruta_foto" value="<?php echo $publicidad->ruta_foto ?>" class="form-control">
                <label>Estado: </label>
                <input type="radio" name="estado" value="Activo" data-validation-placeholder="Campo obligatorio" class=" validate[required] text-input">Activo
                <input type="radio" name="estado" value="Inactivo" data-validation-placeholder="Campo obligatorio" class=" validate[required] text-input">Inactivo<br>
                <br>           
                
                Fecha inicio: 
                <input type="text" name="fecha_inicio" id="fecha_inicio" placeholder="AA-MM-DD" value="<?php echo $publicidad->fecha_inicio ?>" class="form-control"/>
                fecha fin: 
                <input type="text" name="fecha_fin" id="fecha_fin" placeholder="AA-MM-DD" value="<?php echo $publicidad->fecha_fin ?>" class="form-control"/>
                <label>Usuario: </label> 

            <select name="FK_id_usuario" id="usuario" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input"/><br>
            <option value="">Seleccione una opcion</option>>
            <?php
            if ($usuario != "") {
                foreach ($usuario as $usu) {
                    echo "<option value='$usu->id_usuario'>$usu->nombre</option>";
                }
            }
            ?>
            </select>

            <label>Administrador: </label> 
            <select name="FK_id_administrador" id="administrador" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input"/><br>
            <option value="">Seleccione una opcion</option>>
            <?php
            if ($admin != "") {
                foreach ($admin as $adm) {
                    echo "<option value='$adm->id_administrador'>$adm->nombre</option>";
                }
            }
            ?>
            </select>
                <input type="hidden" name="id_publicidad" value="<?php echo $publicidad->id_publicidad ?>" />
                <br><br><input type="submit"  value="Actualizar" class="btn btn-primary"/><br><br>


            <?php }
            ?>
                </div>
            </form>



