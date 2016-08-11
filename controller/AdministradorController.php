<?php
require_once 'lib/password.php';
class AdministradorController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }
    public function admin() {
//$this->validateSession(array(1, 2));
        //Creamos el objeto usuario
        $administrador = new Administrador($this->adapter);

        //Conseguimos todos los usuarios
        $alladmin = $administrador->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("Administrador/admin", array("alladmin" => $alladmin));
    }
    
  public function visualizar(){
         if (isset($_GET["id_administrador"])) {
            $id_administrador = (int) $_GET["id_administrador"];
            
            $administrador = new Administrador($this->adapter);
            $administrador = $administrador->getById($id_administrador,"id_administrador");
            
            $this->view("Administrador/view", array(
                "administrador"=>$administrador
            ));
            
        } 
    }
    
    
    public function crearAdministrador() {
        $this->validateSession(array(1, 2));
        if (isset($_POST["nombre"])) {
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $contra = isset($_POST["contrasenna"]) ? $_POST["contrasenna"] : "";
            $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
            $id_tipo_usuario=1;
        
            //Creamos un usuario
            $administrador = new Administrador($this->adapter);
            $administrador->setNombre($nombre);
 $option=['cost'=>12, 'salt'=> 'This is the ADSI project salt'];
            $administrador->setcontrasenna(password_hash($contra, PASSWORD_BCRYPT, $option));
            $administrador->setCorreo($correo);
            $administrador->setFk_id_tipo($id_tipo_usuario);
            $save = $administrador->save();
            $this->redirect("administrador", "admin");
        }
        $this->view("Administrador/crear", array());
    }
     public function modificarAdministrador() {
        if (isset($_GET["id_administrador"])) {
            $id_administrador = (int) $_GET["id_administrador"];

            $administradores = new Administrador($this->adapter);
            $administrador = $administradores->getById($id_administrador, "id_administrador");
            
            $this->view("Administrador/modificar", array(
                "administrador" => $administrador
            ));
        }
        
    }
    
    public function actualizarAdministrador(){                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
      
              
        if (isset($_POST["nombre"])) {
            $id_administrador = isset($_POST["id_administrador"]) ? $_POST["id_administrador"] : "";
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $contra = isset($_POST["contrasenna"]) ? $_POST["contrasenna"] : "";
            $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
            $administrador = new Administrador($this->adapter); 
            $administrador->setId_administrador($id_administrador);
            $administrador->setNombre($nombre);
            $option=['cost'=>12, 'salt'=> 'This is the ADSI project salt'];
            $administrador->setcontrasenna(password_hash($contra, PASSWORD_BCRYPT, $option));
            $administrador->setcorreo($correo);
            
            $modify=$administrador->modify();
            
            $this->redirect("administrador", "admin");
           
            
        }
      
        $this->view("Administrador/modificar", array());
    }
       public function borrar() {
        if (isset($_GET["id_administrador"])) {
            $id_administrador = (int) $_GET["id_administrador"];

            $admin = new Administrador($this->adapter);
           $error=$admin->deleteById("id_administrador",$id_administrador);
                 
        
           if($error==0){
                                                                                                                        
                 $this->redirect("administrador", "admin");
             
            }
            
                else {
                      echo "No se pudo eliminar";
                      $this->redirect("administrador", "admin", $error);
                      
                    
                        //$this->db()->message;  
                    //$this->view("Administrador/admin");
                   
            }
               

            
        }
       
        
    }
     public function administradorpdf(){
                           
        require_once 'dompdf/dompdf_config.inc.php';
        $admins = new Administrador($this->adapter);
        $allAdmin = $admins->getAll();
    

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

<p><center>Todos los registros de la tabla Adminisrador</center></p>
<br>
<br>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE LA TABLA ADMINISTRADOR</strong></CENTER></td>
  </tr>
  <tr bgcolor="blue">
    <td><strong>ID ADMINISTRADOR</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>CONTRASENNA</strong></td>
    <td><strong>CORREO</strong></td>
    <td><strong>FK_ID_TIPO_USUARIO</strong></td>
  </tr>


  <footer class="col-lg-12">
            <hr>
            Photograpp - Copyright © 2016        </footer>';


    foreach ($allAdmin as $admins) { 


     $codigoHTML.='
                        <tr>
                            <td>'. $admins->id_administrador. '<td>
                            <td>'. $admins->nombre.'<td>
                            <td>'. $admins->contrasenna.'<td>
                            <td>'. $admins->correo.'<td>
                            <td>'. $admins->fk_id_tipo_usuario.'<td>
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
$dompdf->stream("administradorpdf.pdf");
            }
}

        ?>
        
      

    

