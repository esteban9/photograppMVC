<?php

class SiteController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }
    public function mostrarConcurso() {

        //Creamos el objeto usuario
        $concurso = new Concurso($this->adapter);

        //Conseguimos todos los usuarios
        $allconc = $concurso->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("site/mostrarConcurso", array("allconc" => $allconc));
    }
    
    public function visualizar(){
         if (isset($_GET["id_concurso"])) {
            $id_concurso = (int) $_GET["id_concurso"];
            
            $concursos = new Concurso ($this->adapter);
            $concurso = $concursos->getById($id_concurso,"id_concurso");
            
            $administrador= new Administrador($this->adapter);
            $alladmin = $administrador->getById($concurso->FK_id_administrador,"id_administrador");
            
            $categoria= new Categoria($this->adapter);
            $allcat = $categoria->getById($concurso->FK_id_categoria,"id_categoria");
            
            $nivel= new nivelUsuario($this->adapter);
            $niv = $nivel->getById($concurso->FK_id_nivelUsuario,"id_nivelUsuario");
            
            
            $this->view("site/concurso", array(
                
                "concurso"=>$concurso,
                "alladmin"=>$alladmin,
               "allcat"=>$allcat,
               "niv"=>$niv
                
            ));
            
        } 
    }
}
?>
