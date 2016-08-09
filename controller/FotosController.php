<?php

class FotosController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }
    public function admin() {

        //Creamos el objeto usuario
        $fotos = new Fotos($this->adapter);

        //Conseguimos todos los usuarios
        $allfot = $fotos->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("Fotos/admin", array("allfot" => $allfot));

    }
    
  public function visualizar(){
         if (isset($_GET["id_foto"])) {
            $id_fotos = (int) $_GET["id_foto"];
            $FK_id_concurso= (int) $_GET["FK_id_concurso"];
         //   $FK_id_categoria= (int) $_GET["FK_id_categoria"];
            $FK_id_usuario= (int) $_GET["FK_id_usuario"];
            

            $fotos = new Fotos($this->adapter);
            $fotos = $fotos->getById($id_fotos,"id_foto");
            
            
            $concurso= new Concurso($this->adapter);
            $con = $concurso->getById($FK_id_concurso,"id_concurso");
            
            /*$categoria= new Categoria($this->adapter);
            $allcat = $categoria->getById($FK_id_categoria,"id_categoria");*/
            
               $usuario= new Usuario($this->adapter);
            $allusu = $usuario->getById($FK_id_usuario,"id_usuario");
            
            $this->view("Fotos/view", array(
                "fotos"=>$fotos,
                /*"allcat"=>$allcat,*/
                "con"=>$con,
                "allusu"=>$allusu
                
                   
            ));
            
        } 
    }
    
    
    public function crearFotos() {
        if (isset($_POST["nombre"])) {
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
           // $ruta_foto2 = isset($_POST["ruta_foto"]) ? $_POST["ruta_foto"] : "";
            $estado = isset($_POST["estado"]) ? $_POST["estado"] : "";
            $ruta_foto = isset($_POST["foto"]) ? $_POST["foto"] : "";
            $id_concurso = isset($_POST["FK_id_concurso"]) ? $_POST["FK_id_concurso"] : "";
            $id_categoria = isset($_POST["FK_id_categoria"]) ? $_POST["FK_id_categoria"] : "";
            $id_usuario=isset($_POST["FK_id_usuario"]) ? $_POST["FK_id_usuario"] : "";
           $nombre_archivo = $_FILES["foto"]["name"];
            $tipo_archivo = $_FILES["foto"]["type"];
            $tamano_archivo = $_FILES["foto"]["size"];
            
          
           if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg o .png<br><li>se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $ruta_foto = "Uploads/Foto/Foto_foto_" . $nombre_archivo;
                // $ruta_foto2 = "Uploads/Foto/Foto_foto_" . $nombre_archivo;
                
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_foto)) {
                    echo "El archivo ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
            $fotos = new Fotos($this->adapter);
            $fotos->setNombre($nombre);
            //$fotos->setRuta_foto($ruta_foto2);
            $fotos->setEstado($estado);
            $fotos->setFoto($ruta_foto);
            $fotos->setFK_id_concurso($id_concurso);
            $fotos->setFK_id_usuario($id_usuario);
            $newIDFoto = $fotos->save();
            
            $fotocategoria = new Fotocategoria($this->adapter);
            $count = count($id_categoria);
            if($newIDFoto){
            for ($i = 0; $i < $count; $i++) {
               echo $id_categoria[$i];
                $fotocategoria->setId_categoria($id_categoria[$i]);
                $fotocategoria->setId_foto($newIDFoto);
                $save2= $fotocategoria->save();
                }
            }
            //print_r($newIDFoto);
          $this->redirect("fotos", "admin");
            
        }else{
            $concurso= new Concurso($this->adapter);
            $allcon=$concurso->getAll("id_concurso");
            
            $categoria= new Categoria($this->adapter);
            $allcat=$categoria->getAll("id_categoria");
            
            $usuario=new Usuario($this->adapter);
            $allusu=$usuario->getAll("id_usuario");
           
        $this->view("Fotos/crear", array("allcon"=>$allcon, "allcat"=>$allcat, "allusu"=>$allusu));
        
     }   
    }

     public function modificarFotos() {
        if (isset($_GET["id_foto"])) {
            $id_fotos = (int) $_GET["id_foto"];

            $fotos = new Fotos($this->adapter);
            $fotos = $fotos->getById($id_fotos, "id_foto");

            $concurso= new Concurso($this->adapter);
            $allcon = $concurso->getAll("id_concurso");
            
            $categoria= new Categoria($this->adapter);
            $allcat =$categoria->getAll("id_categoria"); 
            
            $usuario=new Usuario($this->adapter);
            $allusu=$usuario->getAll("id_usuario");
            
            $this->view("Fotos/modificar", array(
                "fotos" => $fotos,
                "allcat" => $allcat,
                "allcon" => $allcon,
                "allusu"=>$allusu
            ));
            
           
        }
        
    }
    
    public function actualizarFotos(){
      
              
        if (isset($_POST["nombre"])) {
            $id_fotos = isset($_POST["id_foto"]) ? $_POST["id_foto"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            //$ruta = isset($_POST["ruta_foto"]) ? $_POST["ruta_foto"] : "";
            $estado = isset($_POST["estado"]) ? $_POST["estado"] : "";
            $ruta_foto = isset($_POST["foto"]) ? $_POST["foto"] : "";
            $id_concurso = isset($_POST["FK_id_concurso"]) ? $_POST["FK_id_concurso"] : "";
            $id_categoria = isset($_POST["FK_id_categoria"]) ? $_POST["FK_id_categoria"] : "";
            $id_usuario = isset($_POST["FK_id_usuario"]) ? $_POST["FK_id_usuario"] : "";
            $nombre_archivo = $_FILES["foto"]["name"];
            $tipo_archivo = $_FILES["foto"]["type"];
            $tamano_archivo = $_FILES["foto"]["size"];
          
           if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg o .png<br><li>se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $ruta_foto = "Uploads/Foto/Foto_foto_" . $nombre_archivo;
                // $ruta_foto2 = "Uploads/Foto/Foto_foto_" . $nombre_archivo;
                
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_foto)) {
                    echo "El archivo ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
            $fotos = new Fotos($this->adapter);
            $fotos->setId_fotos($id_fotos);
            $fotos->setNombre($nombre);
            //$fotos->setRuta_foto($ruta);
            $fotos->setEstado($estado);
            $fotos->setFoto($ruta_foto);
            $fotos->setFK_id_concurso($id_concurso);
            $fotos->setFK_id_usuario($id_usuario);

            $modify=$fotos->modify();
            //print_r($modify);
          $this->redirect("fotos", "admin");
           
            
        }
      
        $this->view("Fotos/modificar", array());
    }
       public function borrar() {
        if (isset($_GET["id_foto"])) {
            $id_fotos = (int) $_GET["id_foto"];

            $fot = new Fotos($this->adapter);
            $fot->deleteById("id_foto",$id_fotos);
            print_r(array());
            //return $art;
            //r_print(deleteById($id_articulos));
            $this->redirect("fotos", "admin");
        }
       
        
    }
    }
