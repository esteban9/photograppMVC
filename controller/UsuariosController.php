<?php
require_once 'lib/password.php';
class UsuariosController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }
     public function admin() {

        //Creamos el objeto usuario
        $usuario = new Usuario($this->adapter);

        //Conseguimos todos los usuarios
        $allusu = $usuario->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("Usuarios/admin", array("allusu" => $allusu));
    }

    public function visualizar(){
         if (isset($_GET["id_usuario"])) {
            $id_usuario = (int) $_GET["id_usuario"];
            $FK_id_nivelUsuario= (int) $_GET["FK_id_nivelUsuario"];
            $FK_id_categoria= (int) $_GET["FK_id_categoria"];
            $usuarios = new Usuario($this->adapter);
            $usuario = $usuarios->getById($id_usuario,"id_usuario");
            
            $nivel= new nivelUsuario($this->adapter);
            $ni=$nivel->getById($FK_id_nivelUsuario,"id_nivelUsuario");
            
            $cate= new Categoria($this->adapter);
        $categoria=$cate->getById($FK_id_categoria,"id_categoria");
            $this->view("Usuarios/view", array(
                "usuario"=>$usuario, "nivel"=>$ni,
                "categoria"=>$categoria
            ));
            
        } 
    }
    
    
    public function crearUsuario() {
        $this->validateSession(array(1, 2));
        if (isset($_POST["nombre"])) {
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $apellido = isset($_POST["apellidos"]) ? $_POST["apellidos"] : "";
            $genero = isset($_POST["generos"]) ? $_POST["generos"] : "";
            $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
            $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
            
            $contrasenna = isset($_POST["contrasenna"]) ? $_POST["contrasenna"] : "";
             $fecha_nac = isset($_POST["fecha_nacimiento"]) ? $_POST["fecha_nacimiento"] : "";
            $id_nivel = isset($_POST["FK_id_nivelUsuario"]) ? $_POST["FK_id_nivelUsuario"] : "";
            $id_categoria= isset($_POST["FK_id_categoria"]) ? $_POST["FK_id_categoria"] : "";
                 
            //Creamos un usuario
            $usuarios = new Usuario($this->adapter);
            $usuarios->setNombre($nombre);
            $usuarios->setApellido($apellido);
             $usuarios->setFecha_nac($fecha_nac);
            $usuarios->setGenero($genero);
            $usuarios->setCorreo($correo);
            $usuarios->setTelefono($telefono);
            //$usuarios->setContrasenna($contrasenna);
            $option=['cost'=>12, 'salt'=> 'This is the ADSI project salt'];
            $usuarios->setContrasenna(password_hash($contrasenna, PASSWORD_BCRYPT, $option));
            $usuarios->setFK_id_nivel($id_nivel);
            $usuarios->setFK_id_categoria($id_categoria);
            $save = $usuarios->save();
            $this->redirect("usuarios", "admin");
        }
        else {
            $nivel= new nivelUsuario($this->adapter);
            $nivelUsu = $nivel->getAll("id_nivelUsuario");
       
        
        $cate= new Categoria($this->adapter);
        $categoria=$cate->getAll("id_categoria");
        
         $this->view("Usuarios/crear", array("nivel"=>$nivelUsu, "categoria"=>$categoria));
        
        }
    }
     public function modificarUsuarios() {
        if (isset($_GET["id_usuario"])) {
            $id_usuario = (int) $_GET["id_usuario"];
//$id_nivelUsuario=(int) $_GET["id_nivelUsuario"];
            $usuarios = new Usuario($this->adapter);
            $usuario = $usuarios->getById($id_usuario, "id_usuario");
            
            $nivel=new nivelUsuario($this->adapter);
            $niv=$nivel->getAll("id_nivelUsuario");
            
              $cate= new Categoria($this->adapter);
        $categoria=$cate->getAll("id_categoria");
            $this->view("Usuarios/modificar", array(
                "usuario" => $usuario, "nivel"=>$niv, "categoria"=>$categoria
            ));
        }
        
    }
    
    public function actualizarUsuarios(){
      
              
        if (isset($_POST["nombre"])) {
            $id_usuario = isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $apellido = isset($_POST["apellidos"]) ? $_POST["apellidos"] : "";
            $genero = isset($_POST["generos"]) ? $_POST["generos"] : "";
            $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
            $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
            $contrasenna = isset($_POST["contrasenna"]) ? $_POST["contrasenna"] : "";
            $id_nivel = isset($_POST["FK_id_nivelUsuario"]) ? $_POST["FK_id_nivelUsuario"] : "";
            $id_categoria= isset($_POST["FK_id_categoria"]) ? $_POST["FK_id_categoria"] : "";
            
            $usuarios = new Usuario($this->adapter);
            $usuarios->setIdUsuario($id_usuario);
            $usuarios->setNombre($nombre);
            $usuarios->setApellido($apellido);
            $usuarios->setGenero($genero);
            $usuarios->setCorreo($correo);
            $usuarios->setTelefono($telefono);
            $option=['cost'=>12, 'salt'=> 'This is the ADSI project salt'];
            $usuarios->setContrasenna(password_hash($contrasenna, PASSWORD_BCRYPT, $option));
           // $usuarios->setContrasenna($contrasenna);
            $usuarios->setFK_id_nivel($id_nivel);
            $usuarios->setFK_id_categoria($id_categoria);
            
            $modify=$usuarios->modify();
            //print_r($modify);
           $this->redirect("usuarios", "admin");
           
            
        }
      else{
          $nivel= new nivelUsuario($this->adapter);
            $nivelUsu = $nivel->getAll("id_nivelUsuario");
        $this->view("Usuarios/modificar", array("nivelUsu"=> $nivelUsu));
      }
    }
       public function borrar() {
        if (isset($_GET["id_usuario"])) {
            $id_usuario = (int) $_GET["id_usuario"];

            $usu = new Usuario($this->adapter);
            $usu->deleteById("id_usuario",$id_usuario);
           print_r(array());
            //return $art;
            //r_print(deleteById($id_articulos));
            $this->redirect("usuarios", "admin");
        }
       
        
    }
}

?>