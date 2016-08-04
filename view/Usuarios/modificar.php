
<div class="panel panel-default">
    <div class="panel-heading">Usuario / Editar</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <a href="#" class="list-group-item active">Acciones</a>
        <a href="<?php echo $helper->url("usuarios", "crearUsuario"); ?>" class="list-group-item">Agregar usuario</a>
        <a href="<?php echo $helper->url("usuarios", "visualizar"); ?>&id_usuario=<?php echo $usuario->id_usuario; ?>&FK_id_nivelUsuario=<?php echo $usuario->FK_id_nivelUsuario; ?>" class="list-group-item">Ver detalles</a>
        <a href="<?php echo $helper->url("usuarios", "admin"); ?>" class="list-group-item">Lista de usuarios</a>
    </div></div>
<form id="formID" action="<?php echo $helper->url("usuarios", "actualizarUsuarios"); ?>" method="post">

    <div  class="col-xs-6">
        <h2>Actualizar Usuario</h2>
        <hr>
        <?php if ($usuario) {
            ?>  
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#nivel > option[value="<?php echo $usuario->FK_id_nivelUsuario; ?>"]').attr('selected', 'selected');
                    $('#FK_id_categoria > checkbox[value="<?php echo $usuario->FK_id_categoria; ?>"]').attr('selected', 'selected');

                });
            </script>
            <label>Nombre: </label>
            <input type="text" name="nombre" value="<?php echo $usuario->nombre ?>" class="form-control"/><br>
            <label> Apellido:  </label>
            <input type="text" name="apellidos" value="<?php echo $usuario->apellido ?>" class="form-control"/><br>
            <label> Genero: </label>
            <input type="text" name="generos" value="<?php echo $usuario->genero ?>" class="form-control" data-validation-placeholder="Campo obligatorio" class=" validate[required] text-input"/><br>
            <label> Telefono: </label>
            <input type="text" name="telefono" value="<?php echo $usuario->telefono ?>" class="form-control validate[custom[onlyNumberSp]] "/><br>
            <label> Correo: </label>
            <input type="text" name="correo" value="<?php echo $usuario->correo ?>" class="form-control validate[required, custom[email]] text-input "/><br>
            <label>Contrasenna: </label>
            <input type="password" name="contrasenna" value="<?php echo $usuario->contrasenna ?>" class="form-control validate[required, minSize[8]] text-input"/><br>
            <label>Confirmar contraseña: </label>
            <input type="password" name="Confcontrasenna" value="<?php echo $usuario->contrasenna ?>" class="form-control validate[required, equals[contrasenna]] text-input"/><br>
            <label>Nivel usuario: </label>
            <!--<input type="text" name="FK_id_nivelUsuario" value="<//?php echo $usuario->FK_id_nivelUsuario ?>" class="form-control"/>-->
            <select name="FK_id_nivelUsuario" id="nivel" class="form-control"/><br>
            <?php
            if ($nivel != "") {


                foreach ($nivel as $niv) {

                    echo "<option value=$niv->id_nivelUsuario>$niv->nombre</option>";
                }
            }
            ?>

            </select><br>
            <label>Categorías de interes: </label><br>
            <?php
            if ($categoria != "") {


                foreach ($categoria as $cat) {

                    echo "<input name='FK_id_categoria' type='checkbox' selected='selected' value=<?php$cat->id_categoria>$cat->nombre</input>";
                    echo "<br>";
                }
            }
            ?>
                                <!--<input name="FK_id_categoria" type="checkbox" selected="selected" value="<?php echo $cat->nombre > $cat->nombre ?>">-->
            <?php
            if (!empty($_POST['FK_id_categoria'])) {
                $FK_id_categoria = $_POST['FK_id_categoria'];
                $CAT = implode('|', $FK_id_categoria);
                $consulta = "SELECT * FROM categoria WHERE nombre REGEXP '" . $CAT . "'";
                echo $consulta;
            }
            ?>
            </select>
            <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario ?>" />
            <br>
            <input type="submit"  value="Actualizar" class="btn btn-primary"/><br><br>
        <?php }
        ?>
    </div>
</form>





