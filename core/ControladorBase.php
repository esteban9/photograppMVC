<?php
//Comienzo de la sesion
session_start();
class ControladorBase {

    protected $layout='/cms_layout'; 
    public function __construct() {
        require_once 'Conectar.php';
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';

        //Incluir todos los modelos
        foreach (glob("model/*.php") as $file) {
            require_once $file;
        }
        /*Validar que el tiempo de incatividad del usuario no supere el tiempo definido en la variable global
         * TIEMPO_INACTIVIDAD
         */
        if(isset($_SESSION["timeout"])) {
            $tiempoSesion = time() - $_SESSION["timeout"];
            if($tiempoSesion > (TIEMPO_INACTIVIDAD * 60)) {
                session_destroy();
                $this->redirect("Login", "logout");
                
            } else {
                //Establecer nuevamente el tiempo de inicio de la sesion
            }$_SESSION["timeout"] = time();
        }
    }


    //Plugins y funcionalidades

    public function view($vista, $datos = null) {
        if ($datos) {
            foreach ($datos as $id_assoc => $valor) {
                ${$id_assoc} = $valor;
            }
        }
        require_once 'core/AyudaVistas.php';
        $helper = new AyudaVistas();

        //require_once 'view/' . $vista . '.php';
        require_once 'view/layouts'.$this->layout. '.php';
    }

    public function redirect($controlador = CONTROLADOR_DEFECTO, $accion = ACCION_DEFECTO, $error=0) {
        header("Location:index.php?controller=" . $controlador . "&action=" . $accion. "&error=". $error);
    }
      //Métodos para los controladores
public function validateSession($tipo = array()){
    if(!isset($_SESSION['fk_id_tipo_usuario'])) {
        $this->redirect("Login/login");
    } else {
        if(!in_array($_SESSION['fk_id_tipo_usuario'], $tipo)) {
            $this->redirect("Login", "error&msg=1");
        }
    }
}
  
}

?>