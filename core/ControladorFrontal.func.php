<?php
//FUNCIONES PARA EL CONTROLADOR FRONTAL

function cargarControlador($controller){
    $controlador=ucwords($controller).'Controller';
    $strFileController='controller/'.$controlador.'.php';
    
    if(!is_file($strFileController)){
        $strFileController='controller/'.ucwords(CONTROLADOR_DEFECTO).'Controller.php'; 
        $controlador=  ucwords(CONTROLADOR_DEFECTO).'Controller';
    }
    
    require_once $strFileController;
    $controllerObj=new $controlador();
    return $controllerObj;
}

function cargarAccion($controllerObj,$action){
    $accion=$action;
    if(method_exists($controllerObj, $action)) {
          $controllerObj->$accion();
    } else {
        require_once 'controller/LoginController.php';
        $loginController = new LoginController();
        $loginController->error(2);
    }
  
}

function lanzarAccion($controllerObj){
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
        cargarAccion($controllerObj, $_GET["action"]);
    }else{
        cargarAccion($controllerObj, ACCION_DEFECTO.'&msg=2');
    }
}

?>
