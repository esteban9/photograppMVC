<?php

class CategoriaController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }
    public function admin() {

        //Creamos el objeto usuario
        $categoria = new Categoria($this->adapter);

        //Conseguimos todos los usuarios
        $allcat = $categoria->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("Categoria/admin", array("allcat" => $allcat));
    }
    
  public function visualizar(){
         if (isset($_GET["id_categoria"])) {
            $id_categoria = (int) $_GET["id_categoria"];
            
            $categoria = new Categoria($this->adapter);
            $categoria = $categoria->getById($id_categoria,"id_categoria");
            
            $this->view("Categoria/view", array(
                "categoria"=>$categoria
            ));
            
        } 
    }
    
    
    public function crearCategoria() {
        if (isset($_POST["nombre"])) {
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $des = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $ruta_foto = isset($_POST["foto"]) ? $_POST["foto"] : "";
           $nombre_archivo = $_FILES["foto"]["name"];
            $tipo_archivo = $_FILES["foto"]["type"];
            $tamano_archivo = $_FILES["foto"]["size"];
          
           if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 3000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg o .png<br><li>se permiten archivos de 3M máximo.</td></tr></table>";
            } else {
                $ruta_foto = "Uploads/Categoria/Categoria_foto_" . $nombre_archivo;
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_foto)) {
                    echo "El archivo ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }
            $categoria = new Categoria($this->adapter);
            $categoria->setNombre($nombre);
            $categoria->setDescripcion($des);
            $categoria->setFoto($ruta_foto);
            $save = $categoria->save();
           // print_r($save);
            $this->redirect("categoria", "admin");
        }
        $this->view("Categoria/crear", array());
    }

     public function modificarCategoria() {
        if (isset($_GET["id_categoria"])) {
            $id_categoria = (int) $_GET["id_categoria"];

            $categoria = new Categoria($this->adapter);
            $categoria = $categoria->getById($id_categoria, "id_categoria");
            
            $this->view("Categoria/modificar", array(
                "categoria" => $categoria
            ));
        }
        
    }
    
    public function actualizarCategoria(){
      
              
        if (isset($_POST["nombre"])) {
            $id_categoria = isset($_POST["id_categoria"]) ? $_POST["id_categoria"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $des = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
            $foto = isset($_POST["foto"]) ? $_POST["foto"] : "";
            $categoria = new Categoria($this->adapter); 
            $categoria ->setId_categoria($id_categoria);
            $categoria->setNombre($nombre);
            $categoria->setDescripcion($des);
            $categoria ->setFoto($foto);
            
            $modify=$categoria->modify();
            
            $this->redirect("categoria", "admin");
           
            
        }
      
        $this->view("Categoria/modificar", array());
    }
       public function borrar() {
        if (isset($_GET["id_categoria"])) {
            $id_categoria = (int) $_GET["id_categoria"];

            $cat = new Categoria($this->adapter);
           $error= $cat->deleteById("id_categoria",$id_categoria);
              if($error==0){
                                                                                                                        
                 $this->redirect("categoria", "admin");
             
            }
            
                else {
                      echo "No se pudo eliminar";
                      $this->redirect("categoria", "admin", $error);
                      
                    
                        //$this->db()->message;  
                    //$this->view("Administrador/admin");
                   
            }
        }
       
        
    }
       public function categoriapdf() {
                           
        require_once 'dompdf/dompdf_config.inc.php';
        $cat = new Categoria($this->adapter);
        $allCat = $cat->getAll();
    

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
    <td><strong>ID CATEGORIA</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>DESCRIPCIÓN</strong></td>
    <td><strong>FOTO</strong></td>
    
  </tr>


  <footer class="col-lg-12">
            <hr>
            Photograpp - Copyright © 2016        </footer>';


    foreach ($allCat as $cat) { 


     $codigoHTML.='
                        <tr>
                            <td>'.$cat->id_categoria.'</td>
                            <td>'.$cat->nombre.'</td>
                            <td>'.$cat->descripcion.'</td>
                            <td>'.$cat->foto.'</td>
                           
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
$dompdf->stream("categoriapdf.pdf");

            }
    }
