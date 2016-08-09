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
    <div class="panel-heading">Publicidad / Crear</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <a href="#" class="list-group-item active">Acciones</a>
        <a href="<?php echo $helper->url("publicidad", "admin"); ?>" class="list-group-item">Lista de publicidades</a>
    </div></div>
<form id="formID"action="<?php echo $helper->url("publicidad", "crearPublicidad"); ?>" method="post" enctype="multipart/form-data">
    <div  class="col-xs-6">
        <h2>Nueva Publicidad</h2>
        <hr>
        <label>Nombre:</label> 
        <input type="text" name="nombre" class="form-control"/><br>
        <label for="foto">Seleccione una Foto</label>
        <form enctype="multipart/form-data">                        

            <div class="form-group">
                <input name="foto" type="file" class="file" multiple=true data-preview-file-type="any">
            </div>
        </form><br>


        <label>Estado: </label>
        <input type="radio" name="estado" value="Activo" data-validation-placeholder="Campo obligatorio" class=" validate[required] text-input"/>Activo
        <input type="radio" name="estado" value="Inactivo" data-validation-placeholder="Campo obligatorio" class=" validate[required] text-input"/>Inactivo<br>
        <br>              
        <!--                        <label>Fecha registro</label> 
                                <input type="date" name="fecha_registro" placeholder="AA-MM-DD" class="form-control"/><br>-->
        <label>Fecha inicio:</label> 
        <input type="text" name="fecha_inicio" id="fecha_inicio" class="form-control"/><br>
        <label>Fecha fin:</label> 
        <input type="text" name="fecha_fin" id="fecha_fin" class="form-control"/><br>
        <label>Usuario: </label> 

        <select name="FK_id_usuario" id="usuario" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input"/><br>
        <option value="">Seleccione una opcion</option>
        <?php
        if ($usuario != "") {
            foreach ($usuario as $usu) {
                echo "<option value='$usu->id_usuario'>$usu->nombre</option>";
            }
        }
        ?>
       
        <!--<label>Administrador: </label>--> 
        <input name="id_administrador" id="administrador" type="hidden"/><br>
        <!--<option value="">Seleccione una opcion</option>>-->
        <?php
     
                            if (isset($_SESSION['id_administrador'])) {
                              $_SESSION['id_administrador'];
                               
                            }
                            ?>
       
        <input type="submit" value="Crear" class="btn btn-primary"/><br><br>
    </div>
</form>







