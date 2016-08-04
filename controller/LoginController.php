<?php

class LoginController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }
public function login(){
  
    if(isset($_POST["correo"]) && $_POST["contrasenna"]){
       // echo "entro"."<br>";
        $correo=isset($_POST["correo"]) ? trim($_POST["correo"]):"";
        $contrasenna=isset($_POST["contrasenna"]) ? trim($_POST["contrasenna"]):"";
       
        
       /* echo $correo."<br>";
        echo $contrasenna."<br>";*/
        if(($correo=="") || ($contrasenna=="")){
           //echo "no"."<br>";
                $this->view("Login/login", array("errores"=>"El usuario o contraseña son incorrectos"
                ));
        }
        
        
        else {
           
            $administrador = new Administrador($this->adapter);
            $administrador->setCorreo($correo);
            $administrador->setcontrasenna($contrasenna);
           
            if($administrador->validarLogin()) {
               
               // $this->view("Administrador/admin");
                $this->redirect("administrador", "admin");
            } else {
                //echo "entro3"."<br>";
                $this->view("Login/login", array(
                    "errores"=>"El usuario o contraseña son incorrectos"
                ));
            }
        } 
            
        
    } else {
        //echo "hola";
        $this->view("Login/login");
    }
}
public function logout(){
    //Destruimos la sesion
    session_destroy();
    $this->redirect("login", "login");
    //$this->view("Login/login");
}
public function error($code = 0){
$codeMessagge=(isset($_GET['msg']) ? $_GET['msg']: $code );
$message = "";
switch($codeMessagge) {
    case 1:
        $message = "No está autorizado para acceder a esta acción";
        break;
    case 2:
        $message = "La acción que intenta cargar no existe";
        break;
    case 3:
        $message = "Error desconocido.";
        break;
}
$this->view("Login/login", array(
    "message"=>$message
));
}
    
}