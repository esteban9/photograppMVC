<div class="panel panel-default">
    <div class="panel-heading">Artículos / Crear</div>
</div>
<div class="list-group">
    <div class="col-md-2">
        <a href="#" class="list-group-item active">Acciones</a>
        <a href="<?php echo $helper->url("articulos", "admin"); ?>" class="list-group-item">Lista de artículos</a>
    </div></div>    
<form id="formID" action="<?php echo $helper->url("articulos", "crearArticulos"); ?>" method="post">

    <div  class="col-xs-6">
        <h2>Nuevo Artículo</h2>
        <hr> 
        <label >Nombre del Artículo</label>
        <input type="text" name="nombre" data-validation-placeholder="Campo obligatorio" class="form-control validate[required, custom[onlyLetterSp]] text-input"/><br>
        <label>Descripción</label> 
        <input type="textarea" name="descripcion" class="form-control" rows="200" cols="500"/><br>
        <label> Administrador:</label>

        <select name="FK_id_administrador" id="administrador" data-validation-placeholder="Campo obligatorio" class="form-control validate[required] text-input"/><br>
        <option value="">Seleccione una opcion</option>>
        <?php
        print_r($allAdmin);
        if ($allAdmin != "") {
            foreach ($allAdmin as $adm) {
                echo "<option value='$adm->id_administrador'>$adm->nombre</option>";
            }
        }
        ?>
        </select>
        <br>
        <input type="submit" value="Crear" class="btn btn-primary"/><br><br>

    </div>
</form>








