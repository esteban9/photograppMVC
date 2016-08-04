<script type="text/javascript">
    $(function () {
        $("#fecha_nac").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>
<div class="panel panel-default">
    <div class="panel-heading">Usuario / Crear</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <a href="#" class="list-group-item active">Acciones</a>
        <a href="<?php echo $helper->url("usuarios", "admin"); ?>" class="list-group-item">Lista de usuarios</a>
    </div></div>
<form id="formID"action="<?php echo $helper->url("usuarios", "crearUsuario"); ?>" method="post">
 
        <div  class="col-xs-6">
            <h2>Nuevo Usuario</h2>
            <hr>
            <label >Nombre del Usuario:</label>
            <input type="text" name="nombre" data-validation-placeholder="Campo obligatorio" class="form-control validate[required, custom[onlyLetterSp]] text-input"/><br>
            <label>Apellidos: </label>
            <input type="text" name="apellidos" data-validation-placeholder="Campo obligatorio" class="form-control validate[required, custom[onlyLetterSp]] text-input"/><br>
            <label>Fecha de nacimiento: </label>
            <input type="text" name="fecha_nacimiento" id="fecha_nac" class="form-control"/><br>

            <label>Genero: </label><br>
            <input type="radio" name="generos" value="Masculino" data-validation-placeholder="Campo obligatorio" class=" validate[required] text-input"/>
            Masculino 
            <br>
            <input type="radio" name="generos" value="Femenino" data-validation-placeholder="Campo obligatorio" class=" validate[required] text-input"/>         
            Femenino<br><br>  
            <label>Telefono:</label>
            <input type="text" name="telefono" class="form-control validate[custom[onlyNumberSp]] "/><br>
            <label>Correo: </label>
            <input type="text" name="correo"  data-validation-placeholder="Campo obligatorio" class="form-control validate[required, custom[email]] text-input "/><br>
            <label>Contraseña: </label>
            <input type="password" name="contrasenna" id="contrasenna" class="form-control validate[required, minSize[8]] text-input"/><br>
            <label>Confirmar contraseña: </label>
            <input type="password" name="Confcontrasenna" class="form-control validate[required, equals[contrasenna]] text-input"/><br>
            <label>Nivel de usuario: </label> 

            <select name="FK_id_nivelUsuario" id="administrador" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input"/><br>
            <option value="">Seleccione una opcion</option>>
            <?php
            if ($nivel != "") {
                foreach ($nivel as $niv) {
                    echo "<option value='$niv->id_nivelUsuario'>$niv->nombre</option>";
                }
            }
            ?>
            </select><br>
            <label>Categorías de interes: </label><br>
            <?php
            if ($categoria != "") {
                foreach ($categoria as $cat) {
                    echo "<input name='FK_id_categoria[]' type='checkbox'  value='$cat->id_categoria'>$cat->nombre</input>";
                    echo "<br>";
                }
            }
            ?>
            <br>
            <input type="submit" value="Crear" class="btn btn-primary"/><br><br>
          
        </div>
      </form>
  








