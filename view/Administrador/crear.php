
<div class="panel panel-default">
    <div class="panel-heading">Administrador / Crear</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <a href="#" class="list-group-item active">Acciones</a>
        <a href="<?php echo $helper->url("administrador", "admin"); ?>" class="list-group-item">Lista de administradores</a>
    </div></div>
<form id="formID" action="<?php echo $helper->url("administrador", "crearAdministrador"); ?>" method="post" >
        <div  class="col-xs-6">
            <h2>Nuevo Administrador</h2>
                        <hr>
                        <label>Nombre: </label> 
                        <input type="text" name="nombre" data-validation-placeholder="Campo obligatorio" class="form-control validate[required, custom[onlyLetterSp]] text-input"/><br>
                        <label>Contraseña: </label>
                        <input type="password" name="contrasenna" id="contrasenna" class="form-control validate[required, minSize[8]] text-input"/><br>
                        <label>Confirmar contraseña: </label>
                        <input type="password" name="Confcontrasenna" class="form-control validate[required, minSize[8], equals[contrasenna]] text-input"/><br>
                        <label>Correo: </label>
                        <input type="text" name="correo" data-validation-placeholder="Campo obligatorio" class="form-control validate[required, custom[email]] text-input "/><br>
                        <input type="submit" value="Crear" class="btn btn-primary"/><br><br>
            </form>
        </div>
   






