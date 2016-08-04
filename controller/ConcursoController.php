<?php

class ConcursoController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }
    public function admin() {

        //Creamos el objeto usuario
        $concurso = new Concurso($this->adapter);

        //Conseguimos todos los usuarios
        $allconc = $concurso->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("Concurso/admin", array("allconc" => $allconc));
    }
    
  public function visualizar(){
         if (isset($_GET["id_concurso"])) {
            $id_concurso = (int) $_GET["id_concurso"];
            $FK_id_administrador= (int) $_GET["FK_id_administrador"];
            $FK_id_categoria= (int) $_GET["FK_id_categoria"];
  $FK_id_nivelUsuario= (int) $_GET["FK_id_nivelUsuario"];
            
            $concursos = new Concurso ($this->adapter);
            $concurso = $concursos->getById($id_concurso,"id_concurso");
            
            $administrador= new Administrador($this->adapter);
            $alladmin = $administrador->getById($FK_id_administrador,"id_administrador");
            
            $categoria= new Categoria($this->adapter);
            $allcat = $categoria->getById($FK_id_categoria,"id_categoria");
            
              $nivel= new nivelUsuario($this->adapter);
            $niv=$nivel->getById($FK_id_nivelUsuario,"id_nivelUsuario");
            
            $this->view("Concurso/view", array(
                
                "concurso"=>$concurso,
                "alladmin"=>$alladmin,
                "allcat"=>$allcat,
                "nivel"=>$niv
                
            ));
            
        } 
    }
    
    
    public function crearConcurso() {
        if (isset($_POST["nombre"])) {
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $estado = isset($_POST["estado"]) ? $_POST["estado"] : "";
            $des = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $ruta_foto = isset($_POST["foto"]) ? $_POST["foto"] : "";
            $peso_limite_foto = isset($_POST["peso_limite_foto"]) ? $_POST["peso_limite_foto"] : "";
           //$fecha_registro = isset($_POST["fecha_registro"]) ? $_POST["fecha_registro"] : "";
            $fecha_inicio = isset($_POST["fecha_inicio"]) ? $_POST["fecha_inicio"] : "";
            $fecha_fin = isset($_POST["fecha_fin"]) ? $_POST["fecha_fin"] : "";
            $id_administrador = isset($_POST["FK_id_administrador"]) ? $_POST["FK_id_administrador"] : "";
            $id_categoria = isset($_POST["FK_id_categoria"]) ? $_POST["FK_id_categoria"] : "";
             $id_nivel = isset($_POST["FK_id_nivel"]) ? $_POST["FK_id_nivel"] : "";
           $nombre_archivo = $_FILES["foto"]["name"];
            $tipo_archivo = $_FILES["foto"]["type"];
            $tamano_archivo = $_FILES["foto"]["size"];
          
           if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg o .png<br><li>se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $ruta_foto = "Uploads/Concurso/Concurso_foto_" . $nombre_archivo;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_foto)) {
                    echo "El archivo ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
            $concurso = new Concurso($this->adapter);
            $concurso->setNombre($nombre);
            $concurso->setEstado($estado);
            $concurso->setDescripcion($des);
            $concurso->setFoto($ruta_foto);
             $concurso->setFecha_registro(DATE("Y-m-d H:i:s"));
            $concurso->setFecha_inicio($fecha_inicio);
            $concurso->setFecha_fin($fecha_fin);
            $concurso->setPeso_limite_foto($peso_limite_foto);
            $concurso->setFK_id_administrador($id_administrador);
            $concurso->setFK_id_categoria($id_categoria);
            $concurso->setFK_id_nivelUsuario($id_nivel);
            $save = $concurso->save();
            //print_r($save);
            $this->redirect("Concurso", "admin");
        }
        else{
            $administrador= new Administrador($this->adapter);
            $alladmin=$administrador->getAll("id_administrador");
             $categoria= new Categoria($this->adapter);
            $allcat=$categoria->getAll("id_categoria");
            
            $nivel= new nivelUsuario($this->adapter);
            $niv=$nivel->getAll("id_nivelUsuario");
        $this->view("Concurso/crear", array("alladmin"=>$alladmin, "allcat"=>$allcat, "nivel"=>$niv));
    }
    }
     public function modificarConcurso() {
        if (isset($_GET["id_concurso"])) {
            $id_concurso = (int) $_GET["id_concurso"];

            $concurso = new Concurso($this->adapter);
            $concursos = $concurso->getById($id_concurso, "id_concurso");
            
            $adiministrador= new Administrador($this->adapter);
            $alladmin =$adiministrador->getAll("id_administrador"); 
            
            $categoria= new Categoria($this->adapter);
            $allcat =$categoria->getAll("id_categoria"); 
            
               $nivel= new nivelUsuario($this->adapter);
            $niv=$nivel->getAll("id_nivelUsuario");
            
            $this->view("Concurso/modificar", array(
            "concurso" => $concursos,
            "alladmin" => $alladmin,
            "allcat" => $allcat,
                "nivel"=>$niv
            ));
        }
        
    }
    
    public function actualizarConcurso(){
      
              
        if (isset($_POST["nombre"])) {
            $id_concurso = isset($_POST["id_concurso"]) ? $_POST["id_concurso"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $estado=isset($_POST["estado"])? $_POST["estado"]:"";
            $des = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $ruta_foto=isset($_POST["foto"])? $_POST["foto"]:"";
            $peso_limite_foto=isset($_POST["peso_limite_foto"])? $_POST["peso_limite_foto"]:"";
            //$fecha_registro=isset($_POST["fecha_registro"])? $_POST["fecha_registro"]:"";
            $fecha_inicio=isset($_POST["fecha_inicio"])? $_POST["fecha_inicio"]:"";
            $fecha_fin=isset($_POST["fecha_fin"])? $_POST["fecha_fin"]:"";
            $id_admin = isset($_POST["FK_id_administrador"]) ? $_POST["FK_id_administrador"] : "";
            $id_categoria = isset($_POST["FK_id_categoria"]) ? $_POST["FK_id_categoria"] : "";
            $id_nivel = isset($_POST["FK_id_nivel"]) ? $_POST["FK_id_nivel"] : "";
              $nombre_archivo = $_FILES["foto"]["name"];
            $tipo_archivo = $_FILES["foto"]["type"];
            $tamano_archivo = $_FILES["foto"]["size"];
          
           if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg o .png<br><li>se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $ruta_foto = "Uploads/Concurso/Concurso_foto_" . $nombre_archivo;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_foto)) {
                    echo "El archivo ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
            $concurso = new Concurso($this->adapter); 
            $concurso->setId_concurso($id_concurso);
            $concurso->setNombre($nombre);
            $concurso->setEstado($estado);
            $concurso->setDescripcion($des);
            $concurso->setFoto($ruta_foto);
            $concurso->setFecha_registro(DATE("y-m-d h:m:s"));
            $concurso->setFecha_inicio($fecha_inicio);
            $concurso->setFecha_fin($fecha_fin);
            $concurso->setPeso_limite_foto($peso_limite_foto);
            $concurso->setFK_id_administrador($id_admin);
            $concurso->setFK_id_categoria($id_categoria);
            $concurso->setFK_id_nivelUsuario($id_nivel);
            $modify=$concurso->modify();
            
           $this->redirect("concurso", "admin");
           
            
        }
      
        $this->view("Concurso/modificar", array());
    }
        public function borrar() {
        if (isset($_GET["id_concurso"])) {
            $id_concurso = (int) $_GET["id_concurso"];

            $con = new Concurso($this->adapter);
            $con->deleteById("id_concurso",$id_concurso);
            print_r(array());
            //return $art;
            //r_print(deleteById($id_articulos));
            $this->redirect("concurso", "admin");
        }
       
        
    }
    }

