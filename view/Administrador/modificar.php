<div class="panel panel-default">
    <div class="panel-heading">Administrador / Editar</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <a href="" class="list-group-item active">Acciones</a>
        <?php if ($administrador) {
            ?>   
            <a href="<?php echo $helper->url("administrador", "crearAdministrador"); ?>" class="list-group-item">Agregar administrador</a>
            <a href="<?php echo $helper->url("administrador", "visualizar"); ?>&id_administrador=<?php echo $administrador->id_administrador; ?>" class="list-group-item">Ver detalles</a>
            <a href="<?php echo $helper->url("administrador", "admin"); ?>" class="list-group-item">Lista de administradores</a>
        </div></div>
    <form id="formID" action="<?php echo $helper->url("administrador", "actualizarAdministrador"); ?>" method="post" >

        <div  class="col-xs-6">
            <h2>Actualizar Administrador</h2>

            <hr>
            <label>Nombre: </label>
            <input type="text" name="nombre" value="<?php echo $administrador->nombre ?>" data-validation-placeholder="Campo obligatorio" class="form-control validate[required, custom[onlyLetterSp]] text-input"/><br>
            <label>Contraseña: </label>
            <input type="password" name="contrasenna" id="contrasenna" value="<?php echo $administrador->contrasenna ?>" class="form-control validate[required, minSize[8]] text-input"/><br>
            <label>Confirmar contraseña: </label>
            <input type="password" name="Confcontrasenna" value="<?php echo $administrador->contrasenna ?>" class="form-control validate[required, equals[contrasenna]] text-input"/><br>
            <label>Correo: </label>
            <input type="text" name="correo" value="<?php echo $administrador->correo ?>" class="form-control validate[required, custom[email]] text-input "/><br>
            <input type="hidden" name="id_administrador" value="<?php echo $administrador->id_administrador ?>" />
            <input type="submit"  value="Actualizar" class="btn btn-primary"/><br><br>
        <?php }
        ?>

    </div>
</form>




