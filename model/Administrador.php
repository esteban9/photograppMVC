<?php

class Administrador extends EntidadBase {

    private $id_administrador;
    private $nombre;
    private $contrasenna;
    private $correo;
    private $fk_id_tipo_usuario;
    

    public function __construct($adapter) {
        $table = "administrador";
        parent::__construct($table, $adapter);
    } 

    function getId_administrador() {
        return $this->id_administrador;
    }
  function getFk_id_tipo() {
        return $this->fk_id_tipo_usuario;
    }
    function getNombre() {
        return $this->nombre;
    }

    function getContrasenna() {
        return $this->contrasenna;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setId_administrador($id_administrador) {
        $this->id_administrador = $id_administrador;
    }
      function setFk_id_tipo($fk_id_tipo_usuario) {
        $this->fk_id_tipo_usuario = $fk_id_tipo_usuario;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setcontrasenna($contrasenna) {
        $this->contrasenna = $contrasenna;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }
        public function save() {
        $query = "INSERT INTO administrador (nombre,contrasenna, correo)
                VALUES( '" . $this->nombre . "',
                        '" . $this->contrasenna . "',
                        '" .$this ->correo. "');";
        $save = $this->db()->query($query);
        //$this->db()->error;
        if(!$save && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $save;
    }
    public function modify() {
  
        $query="UPDATE administrador SET nombre='$this->nombre', contrasenna='$this->contrasenna', correo='$this->correo' "
                . "WHERE id_administrador='$this->id_administrador'";
        $modify= $this->db()->query($query);
        
        if(!$modify && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $modify;
               

    }
public function delete(){
    $query="DELETE FROM administrador WHERE id='$this->id_administrador'";
    $admin=  $this->db()->query($query);
    return $admin;
}
public function consultar(){
    $query = $this->db()->query("SELECT * FROM administrador WHERE correo='$this->correo'");
}
public function validarLogin() {
    $resultSet=null;
    $query = $this->db()->query("SELECT * FROM administrador WHERE correo='$this->correo'");
   // echo "hi"."<br>";
    if ($row = $query->fetch_object()) {
        /*Se compara la contraseña ingresada por el ususario en el formulario de loguin la que se encuentra
         *almacenada en la base de datos
          */
          //echo "hi2"."<br>";
          $contra = $this->contrasenna;
           $hash = $row->contrasenna;
           
            //echo $contra."<br>";
             // echo $hash."<br>";
              //if (password_verify($contra, $hash))
               
        if ($contra==$hash) {
              //echo "hi3"."<br>";o;
        $_SESSION['fk_id_tipo_usuario']= $row->fk_id_tipo_usuario;
         echo $this->fk_id_tipo_usuario;
        $_SESSION['correo'] = $row->correo;
        $_SESSION['nombre']=$row->nombre;
        $_SESSION['id_administrador']=$row->id_administrador;
        //Establecer tiempo de inicio de sesion
        $_SESSION["timeout"] = time();
        session_regenerate_id();
        return true;
        }
      
    }
    return false;
         
}
}

?>