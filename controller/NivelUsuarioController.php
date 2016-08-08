<?php

class NivelUsuarioController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }
    public function admin() {

        //Creamos el objeto usuario
        $nivelUsuario = new nivelUsuario($this->adapter);

        //Conseguimos todos los usuarios
        $allni = $nivelUsuario->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("nivelUsuario/admin", array("allni" => $allni));
    }
    
  public function visualizar(){
         if (isset($_GET["id_nivelUsuario"])) {
            $id_nivelUsuario = (int) $_GET["id_nivelUsuario"];
            
            $nivelUsuario = new nivelUsuario($this->adapter);
            $nivel = $nivelUsuario->getById($id_nivelUsuario,"id_nivelUsuario");
            
            $this->view("nivelusuario/view", array(
                "nivel"=>$nivel
            ));
            
        } 
    }
    
    
    public function crearNivel() {
        if (isset($_POST["nombre"])) {
           $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
           $des = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
           $ruta_foto = isset($_POST["foto"]) ? $_POST["foto"] : "";
            
            $nombre_archivo = $_FILES["foto"]["name"];
            $tipo_archivo = $_FILES["foto"]["type"];
            $tamano_archivo = $_FILES["foto"]["size"];
          echo $nombre_archivo;
           if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg o .png<br><li>se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $ruta_foto = "Uploads/nivelUsuario/NivelUsuario_foto_" . $nombre_archivo;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_foto)) {
                    echo "El archivo ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
            $nivelUsuario = new nivelUsuario($this->adapter);
            $nivelUsuario->setNombre($nombre);
            $nivelUsuario->setDescripcion($des);
            $nivelUsuario->setFoto($ruta_foto);
            $save = $nivelUsuario->save();
            $this->redirect("nivelusuario", "admin");
        }
        $this->view("nivelusuario/crear", array());
    }
     public function modificarNivel() {
        if (isset($_GET["id_nivelUsuario"])) {
            $id_nivelUsuario = (int) $_GET["id_nivelUsuario"];

            $nivelUsu = new nivelUsuario($this->adapter);
            $nivel = $nivelUsu->getById($id_nivelUsuario, "id_nivelUsuario");
            
            $this->view("nivelUsuario/modificar", array(
                "nivel" => $nivel
            ));
        }
        
    }
    
    public function actualizarNivel(){
      
              
        if (isset($_POST["nombre"])) {
            $id_nivelUsuario = isset($_POST["id_nivelUsuario"]) ? $_POST["id_nivelUsuario"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $des = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $ruta_foto = isset($_POST["foto"]) ? $_POST["foto"] : "";
            $nombre_archivo = $_FILES["foto"]["name"];
            $tipo_archivo = $_FILES["foto"]["type"];
            $tamano_archivo = $_FILES["foto"]["size"];
          echo $nombre_archivo;
           if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg o .png<br><li>se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $ruta_foto = "Uploads/nivelUsuario/NivelUsuario_foto_" . $nombre_archivo;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_foto)) {
                    echo "El archivo ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
            $nivelUsuario = new nivelUsuario($this->adapter);
            $nivelUsuario->setId_nivelUsuario($id_nivelUsuario);
            $nivelUsuario->setNombre($nombre);
            $nivelUsuario->setDescripcion($des);
            $nivelUsuario->setFoto($ruta_foto);
            
            $modify=$nivelUsuario->modify();
       
            $this->redirect("nivelUsuario", "admin");
           
            
        }
      
        $this->view("nivelUsuario/modificar", array());
    }
       public function borrar() {
        if (isset($_GET["id_nivelUsuario"])) {
            $id_nivelUsuario = (int) $_GET["id_nivelUsuario"];

            $niv = new nivelUsuario($this->adapter);
          $error=  $niv->deleteById("id_nivelUsuario",$id_nivelUsuario);
            if($error==0){
                                                                                                                        
                 $this->redirect("nivelUsuario", "admin");
             
            }
            
                else {
                      echo "No se pudo eliminar";
                      $this->redirect("nivelUsuario", "admin", $error);
                      
                    
                        //$this->db()->message;  
                    //$this->view("Administrador/admin");
                   
            }
        }
       
        
    }
    }


