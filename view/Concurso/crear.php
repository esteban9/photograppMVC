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
    <div class="panel-heading">Concurso / Crear</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <a href="#" class="list-group-item active">Acciones</a>
        <a href="<?php echo $helper->url("concurso", "admin"); ?>" class="list-group-item">Lista de concursos</a>
    </div></div>
<form id="formID" action="<?php echo $helper->url("concurso", "crearConcurso"); ?>" method="post" enctype="multipart/form-data">

    <div  class="col-xs-6">
        <h2>Nuevo Concurso</h2>
        <hr>
        <label>Nombre: </label>
        <input type="text" name="nombre" data-validation-placeholder="Campo obligatorio" class="form-control validate[required, custom[onlyLetterSp]] text-input"/><br>
        <label>Estado: </label><br>
        <input type="radio" name="estado" value="Activo" class=" validate[required] text-input"/>Activo
        <input type="radio" name="estado" value="Inactivo" class=" validate[required] text-input"/>Inactivo<br>
        <br>
        <label>Descripcion: </label>
        <input type="textarea" name="descripcion" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input"/><br>
        <label for="foto">Seleccione una Foto</label>
        <form enctype="multipart/form-data">                        

            <div class="form-group">
                <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any">
            </div>
        </form>
        <label>Peso limite:</label>
        <input type="text" name="peso_limite" class="form-control"/><br>
        <!--                        <label>Fecha registro:</label>
                                <input type="text" name="fecha_registro" id="fecha_registro" class="form-control"/><br>-->
        <label>Fecha inicio: </label>
        <input type="text" name="fecha_inicio" id="fecha_inicio" class="form-control"/><br>
        <label>Fecha fin: </label>
        <input type="text" name="fecha_fin" id="fecha_fin" class="form-control"/><br>
       
       
            <?php
     
                            if (isset($_SESSION['id_administrador'])) {
                              $_SESSION['id_administrador'];
                               
                            }
                            ?>
        <br>
        <label>Categoria: </label>
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
                echo "<input type='checkbox' name='FK_id_nivel[]' value='$niv->id_nivelUsuario'>$niv->nombre</input>";
                echo "<br>";
            }
        }
        ?>
        <br>
        <input type="submit" value="Crear" class="btn btn-primary"/><br><br>

    </div>
</form>






