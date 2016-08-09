<?php

class PublicidadController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }
     public function admin() {

        //Creamos el objeto usuario
        $publicidad = new Publicidad($this->adapter);

        //Conseguimos todos los usuarios
        $allpub = $publicidad->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("Publicidad/admin", array("allpub" => $allpub));
    }

    public function visualizar(){
         if (isset($_GET["id_publicidad"])) {
            $id_publicidad = (int) $_GET["id_publicidad"];
             $FK_id_usuario= (int) $_GET["FK_id_usuario"];           
            $FK_id_administrador= (int) $_GET["FK_id_administrador"];
           
            $publicidades = new Publicidad($this->adapter);
            $publicidad = $publicidades->getById($id_publicidad,"id_publicidad");
            
            $usuario= new Usuario($this->adapter);
            $allus = $usuario->getById($FK_id_usuario,"id_usuario");
            
            $administrador= new Administrador($this->adapter);
            $alladmin = $administrador->getById($FK_id_administrador,"id_administrador");
            
           
            
            $this->view("Publicidad/view", array(
                "publicidad"=>$publicidad,
                "allus"=>$allus,
                "alladmin"=>$alladmin 
            ));
            
        } 
    }
    
    
    public function crearPublicidad() {
    
        if (isset($_POST["estado"])) {
          
            $estado = isset($_POST["estado"]) ? $_POST["estado"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $ruta_foto = isset($_POST["foto"]) ? $_POST["foto"] : "";
            //$fecha_registro = isset($_POST["fecha_registro "]) ? $_POST["fecha_registro "] : "";
            $fecha_inicio  = isset($_POST["fecha_inicio"]) ? $_POST["fecha_inicio"] : "";
            $fecha_fin = isset($_POST["fecha_fin"]) ? $_POST["fecha_fin"] : "";
            $FK_id_usuario = isset($_POST["FK_id_usuario"]) ? $_POST["FK_id_usuario"] : "";
            $FK_id_administrador = isset($_SESSION['id_administrador']) ? $_SESSION['id_administrador'] : "";
            $nombre_archivo = $_FILES["foto"]["name"];
            $tipo_archivo = $_FILES["foto"]["type"];
            $tamano_archivo = $_FILES["foto"]["size"];
          
           if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg o .png<br><li>se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $ruta_foto = "Uploads/Publicidad/Publicidad_foto_" . $nombre_archivo;
                
                
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_foto)) {
                    echo "El archivo ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
            echo $_SESSION['id_administrador'];
            $publicidad = new Publicidad($this->adapter);
            
            $publicidad->setEstado($estado);
             $publicidad->setNombre($nombre);
            $publicidad->setRuta_foto($ruta_foto);
            $publicidad->setFecha_registro(DATE("y-m-d h:m:s"));
            //$publicidad->setFecha_registro($fecha_registro);
            $publicidad->setFecha_inicio($fecha_inicio);
            $publicidad->setFecha_fin($fecha_fin);
            $publicidad->setFK_id_usuario($FK_id_usuario);
            $publicidad->setFK_id_administrador($FK_id_administrador);
            $save = $publicidad->save();
           print_r($save);
           // $this->redirect("publicidad", "admin");
    }else {
        $usuario = new Usuario($this->adapter);
        $usuarios = $usuario->getAll("id_usuario");
        $admin = new Administrador($this->adapter);
        $administrador= $admin->getAll("id_administrador");
        
        $this->view("Publicidad/crear", array("usuario"=>$usuarios, "admin"=>$administrador));
    }
    }
     public function modificarPublicidad() {
        if (isset($_GET["id_publicidad"])) {
            $id_publicidad = (int) $_GET["id_publicidad"];

            $publicidades = new Publicidad($this->adapter);
            $publicidad = $publicidades->getById($id_publicidad, "id_publicidad");
            
            $usuario= new Usuario($this->adapter);
            $usuario=$usuario->getAll("id_usuario"); 
            
            $adiministrador= new Administrador($this->adapter);
            $admin =$adiministrador->getAll("id_administrador"); 
            
            
            
            $this->view("Publicidad/modificar", array(
                "publicidad" => $publicidad,
                "usuario"=>$usuario,
                "admin" => $admin
                
            ));
        }
        
    }
    
    public function actualizarPublicidad(){
      
              
         if (isset($_POST["id_publicidad"])) {
           $id_publicidad = isset($_POST["id_publicidad"]) ? $_POST["id_publicidad"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $estado = isset($_POST["estado"]) ? $_POST["estado"] : "";
            $ruta_foto = isset($_POST["ruta_foto"]) ? $_POST["ruta_foto"] : "";
           // $fecha_registro = isset($_POST["fecha_registro "]) ? $_POST["fecha_registro "] : "";
            $fecha_inicio  = isset($_POST["fecha_inicio"]) ? $_POST["fecha_inicio"] : "";
            $fecha_fin = isset($_POST["fecha_fin"]) ? $_POST["fecha_fin"] : "";
            $FK_id_usuario = isset($_POST["FK_id_usuario"]) ? $_POST["FK_id_usuario"] : "";
            $FK_id_administrador = isset($_POST["FK_id_administrador"]) ? $_POST["FK_id_administrador"] : "";
            $nombre_archivo = $_FILES["ruta_foto"]["name"];
            $tipo_archivo = $_FILES["ruta_foto"]["type"];
            $tamano_archivo = $_FILES["ruta_foto"]["size"];
          
           if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg o .png<br><li>se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $ruta_foto = "Uploads/Publicidad/Publicidad_foto_" . $nombre_archivo;
                
                
                if (move_uploaded_file($_FILES["ruta_foto"]["tmp_name"], $ruta_foto)) {
                    echo "El archivo ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
            $publicidad = new Publicidad($this->adapter);
            $publicidad->setId_publicidad($id_publicidad);
            $publicidad->setEstado($estado);
           $publicidad->setNombre($nombre);
            $publicidad->setRuta_foto($ruta_foto);
            $publicidad->setFecha_registro(DATE("y-m-d h:i:s"));
            $publicidad->setFecha_inicio($fecha_inicio);
            $publicidad->setFecha_fin($fecha_fin);
            $publicidad->setFK_id_usuario($FK_id_usuario);
            $publicidad->setFK_id_administrador($FK_id_administrador);
            
            $modify=$publicidad->modify();
          
            $this->redirect("publicidad", "admin");
           
            
        }
      
        $this->view("Publicidad/modificar", array());
    }
       public function borrar() {
        if (isset($_GET["id_publicidad"])) {
            $id_publicidad = (int) $_GET["id_publicidad"];

            $pub = new Publicidad($this->adapter);
            $pub->deleteById("id_publicidad",$id_publicidad);
           print_r(array());
            //return $art;
            //r_print(deleteById($id_articulos));
            $this->redirect("publicidad", "admin");
        }
       
        
    }
}

?>
