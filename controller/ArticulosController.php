<?php

class ArticulosController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }
    public function admin() {

        //Creamos el objeto usuario
        $articulos = new Articulos($this->adapter);

        //Conseguimos todos los usuarios
        $allart = $articulos->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("Articulos/admin", array("allart" => $allart));
    }
    
  public function visualizar(){
         if (isset($_GET["id_articulos"])) {
            $id_articulos = (int) $_GET["id_articulos"];
            $FK_id_administrador= (int) $_GET["FK_id_administrador"];
            $articulos = new Articulos($this->adapter);
            $articulo = $articulos->getById($id_articulos,"id_articulos");
             $administrador= new Administrador($this->adapter);
            $admin = $administrador->getById($FK_id_administrador,"id_administrador");
            $this->view("Articulos/view", array(
                "articulo"=>$articulo,
                 "admin" => $admin
            ));
            
        } 
    }
    
    public function crearArticulos() {
        if (isset($_POST["nombre"])) {
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $des = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $id_admin = isset($_POST["FK_id_administrador"]) ? $_POST["FK_id_administrador"] : "";
            //Creamos un usuario
            $articulos = new Articulos($this->adapter);
            $articulos->setNombre($nombre);
            $articulos->setDescripcion($des);
            $articulos->setFK_id_administrador($id_admin);
            
            
            $save = $articulos->save();
            $this->redirect("articulos", "admin");
        }
        else {
            $administrador= new Administrador($this->adapter);
            $alladmin = $administrador->getAll("id_administrador");
           
            $this->view("Articulos/crear", array("allAdmin" => $alladmin));
        }
    }
     public function modificarArticulos() {
        if (isset($_GET["id_articulos"])) {
            $id_articulos = (int) $_GET["id_articulos"];

            $articulos = new Articulos($this->adapter);
            $articulo = $articulos->getById($id_articulos, "id_articulos");
            
            $administrador= new Administrador($this->adapter);
            $alladmin = $administrador->getAll("id_administrador");
            $this->view("Articulos/modificar", array(
                "articulo" => $articulo, 
                "allAdmin" => $alladmin
            ));
        }
        
    }
    
    public function actualizarArticulo(){
      
              
        if (isset($_POST["nombre"])) {
            $id_articulos = isset($_POST["id_articulos"]) ? $_POST["id_articulos"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $des = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $FK_id_administrador = isset($_POST["FK_id_administrador"]) ? $_POST["FK_id_administrador"] : "";
            $articulos = new Articulos($this->adapter); 
            $articulos->setNombre($nombre);
            $articulos->setDescripcion($des);
            $articulos->setId_articulos($id_articulos);
            $articulos->setFK_id_administrador($FK_id_administrador);
            
            $modify=$articulos->modify();
            
            $this->redirect("articulos", "admin");
           
            
        }
      
        $this->view("Articulos/modificar", array());
    }
       public function borrar() {
        if (isset($_GET["id_articulos"])) {
            $id_articulos = (int) $_GET["id_articulos"];

            $art = new Articulos($this->adapter);
            $art->deleteById("id_articulos",$id_articulos);
            print_r(array());
            //return $art;
            //r_print(deleteById($id_articulos));
            $this->redirect("articulos", "admin");
        }
       
        
    }
    }
