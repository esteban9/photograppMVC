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
    <div class="panel-heading">Concurso / Editar</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <?php if ($concurso) {
            ?>    
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#administrador > option[value="<?php echo $concurso->FK_id_administrador; ?>"]').attr('selected', 'selected');
                    $('#categoria > option[value="<?php echo $concurso->FK_id_categoria; ?>"]').attr('selected', 'selected');

                });
            </script>
            <a href="#" class="list-group-item active">Acciones</a>
            <a href="<?php echo $helper->url("concurso", "crearConcurso"); ?>" class="list-group-item">Agregar concurso</a>
            <a href="<?php echo $helper->url("concurso", "visualizar"); ?>&id_concurso=<?php echo $concurso->id_concurso; ?>&FK_id_administrador=<?php echo $concurso->FK_id_administrador; ?>&FK_id_categoria=<?php echo $concurso->FK_id_categoria; ?>" class="list-group-item">Ver detalles</a>
            <a href="<?php echo $helper->url("concurso", "admin"); ?>" class="list-group-item">Lista de concursos</a>
        </div></div>
    <form id="formID" action="<?php echo $helper->url("concurso", "actualizarConcurso"); ?>" method="post" enctype="multipart/form-data">

        <div  class="col-xs-6">
            <h2>Actualizar Concurso</h2>
            <hr>
            <label>Nombre: </label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $concurso->nombre ?>"/>
            <br>
            <label>Estado: </label><br>
            <input type="radio" name="estado" value="activo" class=" validate[required] text-input"/>Activo
            <input type="radio" name="estado" value="inactivo" class=" validate[required] text-input"/>Inactivo
            <br><br>
            <label> Descripcion: </label> 
            <input type="textarea" name="descripcion" class="form-control" value="<?php echo $concurso->descripcion ?>"/>
            <br>
            <label for="foto">Seleccione una Foto</label>
            <form enctype="multipart/form-data">                        

                <div class="form-group">
                    <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any">
                </div>
            </form>
            <input type="text" name="foto" disabled="false" class="form-control" value="<?php echo $concurso->foto ?>"/>
            <br>
            <label> Peso limite: </label>
            <input type="text" name="peso_limite_foto" class="form-control" value="<?php echo $concurso->peso_limite_foto ?>"/>
            <!--                            <label> Fecha registro: </label>
                                        <input type="date" name="fechaRe" class="form-control" value="<//?php echo $concurso->fecha_registro ?>"/>-->
            <br>
            <label>Fecha inicio: </label>
            <input type="text" name="fecha_inicio" id="fecha_inicio" class="form-control" value="<?php echo $concurso->fecha_inicio ?>"/>
            <br>
            <label>Fecha fin: </label>
            <input type="text" name="fecha_fin" id="fecha_fin" class="form-control" value="<?php echo $concurso->fecha_fin ?>"/>

            <br>
            <label> Administrador:</label>
            <select name="FK_id_administrador" id="administrador" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input">
                <option  value="">Seleccione un administrador</option>
                <?php
                if ($alladmin != "") {
                    foreach ($alladmin as $item) {
                        echo "<option value='$item->id_administrador'>$item->nombre</option>";
                    }
                }
                ?>
            </select>                     
            <br>
            <label> Categoria: </label>
            <select name="FK_id_categoria" id="categoria"  data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input">
                <option  value="">Seleccione una categoria</option>
                <?php
                if ($allcat != "") {
                    foreach ($allcat as $item) {
                        echo "<option value='$item->id_categoria'>$item->nombre</option>";
                    }
                }
                ?>

            </select>
            <br>
            <label>Nivel de usuario: </label><br>
            <?php
            if ($nivel != "") {
                foreach ($nivel as $niv) {
                    echo "<input type='checkbox' name='FK_id_nivel' value='$niv->id_nivelUsuario'>$niv->nombre</input>";
                    echo"<br>";
                }
            }
            ?>
            <input type="hidden" name="id_concurso" value="<?php echo $concurso->id_concurso ?>"/>
            <br>
            <input type="submit"  value="Actualizar" class="btn btn-primary"/><br><br>
        <?php }
        ?>

    </div>

</form>


