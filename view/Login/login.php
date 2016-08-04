
<html>
    <head>
    </head>
    <body>
       
            <div>
                <h1> <?php echo (isset($errores) && $errores !="") ? $errores : ""; ?></h1>
            </div>
         <form action="<?php echo $helper->url("login", "login"); ?>" method="post">
              <div class="col-md-7">
                   <table class="table table-striped">
            
        <h1>Login</h1>
       <label> Por favor ingrese sus datos de acceso:</label>
       
        <hr>
            <tr>
               
                <th>Nombre usuario * </th>
               <th> <input type="text" name="correo"></th>
              
            </tr>
            <hr>
            <tr>
                
                 <th>Contraseña *   </th>
                 <th>  <input type="password" name="contrasenna"></th>
            
       </tr>
   
        <hr>
        <tr>
             <th> <a href="#">Recuperar Contraseña</a></th>
                <th></th>
        </tr>
        
          <hr>
        <tr>
             <th>   <label>Los campos con * son requeridos</label></th>
                <th></th>
        </tr>
        
          <hr>
        <tr>
             <th>   </th>
                <th><input type="submit" name="enviar" value="Iniciar Sesión"></th>
        </tr>
       
    </body>
    </form>
</html>
