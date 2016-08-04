
<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <head>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/jquery-ui.css"/>
        <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/template.css" type="text/css"/>
        <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>




        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script src="js/fileinput.js" type="text/javascript"></script>
        <script src="js/languajes/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>



        <script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/script.js" type="text/javascript" charset="utf-8"></script>





        <title>Photograpp</title>
    </head>
    <body>
        <!-- Start your code here -->
 
       

        <nav role="navigation" class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Photograpp</a>
            </div>

 
             
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
             
                    
                                     <?php 
if(isset($_SESSION['fk_id_tipo_usuario']) && $_SESSION['fk_id_tipo_usuario'] == 1){
   
?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Administrador<b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo $helper->url("administrador", "crearAdministrador"); ?>">Crear Administrador</a></li>
                            <li><a href="<?php echo $helper->url("administrador", "admin"); ?>">Listar Administrador</a></li>
                             
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Usuario<b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo $helper->url("usuarios", "crearUsuario"); ?>">Crear Usuario</a></li>
                            <li><a href="<?php echo $helper->url("usuarios", "admin"); ?>">Listar Usuario</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Artículos<b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo $helper->url("articulos", "crearArticulos"); ?>">Crear Articulo</a></li>
                            <li><a href="<?php echo $helper->url("articulos", "admin"); ?>">Listar Articulo</a></li>
                        </ul>
                    </li>
                     
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Fotos<b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo $helper->url("fotos", "crearFotos"); ?>">Crear Foto</a></li>
                            <li><a href="<?php echo $helper->url("fotos", "admin"); ?>">Listar Foto</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Publicidad<b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo $helper->url("publicidad", "crearPublicidad"); ?>">Crear Publicidad</a></li>
                            <li><a href="<?php echo $helper->url("publicidad", "admin"); ?>">Listar Publicidad</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Concurso<b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo $helper->url("concurso", "crearConcurso"); ?>">Crear Concurso</a></li>
                            <li><a href="<?php echo $helper->url("concurso", "admin"); ?>">Listar Concurso</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Categoría<b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo $helper->url("categoria", "crearCategoria"); ?>">Crear Categoría</a></li>
                            <li><a href="<?php echo $helper->url("categoria", "admin"); ?>">Listar Categoría</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Nivel de Usuario<b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo $helper->url("nivelUsuario", "crearNivel"); ?>">Crear Nivel de Usuario</a></li>
                            <li><a href="<?php echo $helper->url("nivelUsuario", "admin"); ?>">Listar Nivel de Usuario</a></li>
                        </ul>
                    </li>
                    <li role="menu" class="dropdown">
                        <a class="" href="<?php echo $helper->url("login", "logout"); ?>">
                            Salir
                            <?php
                            if (isset($_SESSION['nombre'])) {
                                echo "(". $_SESSION['nombre']. ")";
                               
                            }
                            ?>
                             </li>
                            
                </ul>
                <?php } else {
                   // echo "No se creo la sesion"."<br>";
                    
                }?>
            </div>
             
        </nav>
       
        <div class="container">
        </div>
    </body>
</html>
<div class="container">
    <?php require_once 'view/' . $vista . '.php'; ?>
</div>

<!--<footer class="col-lg-12">
    <hr/>
    Photograpp - Copyright &copy; //<?php echo date("Y"); ?>
</footer>-->
</body>
</html>
