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
            $id_admin = isset($_SESSION["id_administrador"]) ? $_SESSION["id_administrador"] : "";
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
            $concurso->setFK_id_administrador($id_admin);
            $concurso->setFK_id_categoria($id_categoria);
            $concurso->setFK_id_nivelUsuario($id_nivel);
            $newIDConcurso = $concurso->save();
            
             $concurso_nivelusuario = new Concurso_nivelusuario($this->adapter);
            $count = count($id_nivel);
            if($newIDConcurso){
            for ($i = 0; $i < $count; $i++) {
            
                $concurso_nivelusuario->setId_nivelUsuario($id_nivel[$i]);
                $concurso_nivelusuario->setId_concurso($newIDConcurso);
                $save2= $concurso_nivelusuario->save();
                }
            }
            
            
           // print_r($newIDConcurso);
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
            $id_admin = isset($_SESSION["id_administrador"]) ? $_SESSION["id_administrador"] : "";
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
            
            
              $concurso_nivelusuario = new Concurso_nivelusuario($this->adapter);
            $count = count($id_nivel);
            if($newIDConcurso){
            for ($i = 0; $i < $count; $i++) {
            
                $concurso_nivelusuario->setId_nivelUsuario($id_nivel[$i]);
                $concurso_nivelusuario->setId_concurso($newIDConcurso);
                $save2= $concurso_nivelusuario->save();
                }
            }
            
           $this->redirect("concurso", "admin");
           
            
        }
      
        $this->view("Concurso/modificar", array());
    }
        public function borrar() {
        if (isset($_GET["id_concurso"])) {
            $id_concurso = (int) $_GET["id_concurso"];

            $con = new Concurso($this->adapter);
         $error=   $con->deleteById("id_concurso",$id_concurso);
           if($error==0){
                                                                                                                        
                 $this->redirect("concurso", "admin");
             
            }
            
                else {
                      echo "No se pudo eliminar";
                      $this->redirect("concurso", "admin", $error);
                      
                    
                        //$this->db()->message;  
                    //$this->view("Administrador/admin");
                   
            }
        }
       
        
    }
    public function concursopdf() {
                           
        require_once 'dompdf/dompdf_config.inc.php';
        $con = new Concurso($this->adapter);
        $allCon = $con->getAll();
    

        $codigoHTML ='
<!DOCTYPE html>
<header>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte pdf</title>

<center><img src="Photograpp2.png" width="450" height="80" /></center>
<br>
<br>

</header>
<body>

<p><center>Todos los registros de la tabla Categoria</center></p>
<br>
<br>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE LA TABLA ADMINISTRADOR</strong></CENTER></td>
  </tr>
  <tr bgcolor="blue">
    <td><strong>ID CONCURSO</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>ESTADO</strong></td>
    <td><strong>DESCRIPCION</strong></td>
    <td><strong>FOTO</strong></td>
    <td><strong>PESO LIMITE</strong></td>
    <td><strong>FECHA REGISTRO</strong></td>
    <td><strong>FECHA INICIO</strong></td>
    <td><strong>FECHA FIN</strong></td>
    <td><strong>FK ID ADMINISTARDOR</strong></td>
    <td><strong>FK ID CATEGORIA</strong></td>
    <td><strong>FK ID NIVEL USUARIO</strong></td>
    
  </tr>


  <footer class="col-lg-12">
            <hr>
            Photograpp - Copyright © 2016        </footer>';


    foreach ($allCon as $con) { 


     $codigoHTML.='
                        <tr>
                            <td>'.$con->id_concurso.'</td>
                            <td>'.$con->nombre.'</td>
                            <td>'.$con->estado.'</td>
                            <td>'.$con->descripcion.'</td>
                            <td>'.$con->foto.'</td>
                            <td>'.$con->peso_limite_foto.'</td>
                            <td>'.$con->fecha_registro.'</td>
                            <td>'.$con->fecha_inicio.'</td>
                            <td>'.$con->fecha_fin.'</td>
                            <td>'.$con->FK_id_administrador.'</td>
                            <td>'.$con->FK_id_categoria.'</td>
                            <td>'.$con->FK_is_nivelUsuario.'</td>
                           
            </tr>';
	
}
$codigoHTML.='
</table>
</body>
</html>';

$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("concursopdf.pdf");

            }
    }

