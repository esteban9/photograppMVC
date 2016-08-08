<?php

class Usuario extends EntidadBase {

    private $id_usuario;
    private $nombre;
    private $apellido;
    private $correo;
    private $telefono;
    private $fecha_nac;
    private $genero;
    private $contrasenna;
    private $FK_id_nivelUsuario;
    private $FK_id_categoria;
    private $fk_id_tipo_usuarios;
    public function __construct($adapter) {
        $table = "usuario";
        parent::__construct($table, $adapter);
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }
public function getFechaNac() {
        return $this->fecha_nac;
    }
    public function getFK_id_categoria() {
        return $this->FK_id_categoria;
    }
    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function getCorreo() {
        return $this->correo;
    }
     public function setFecha_nac($fecha_nac) {
       $this->fecha_nac=$fecha_nac;
    }


    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getContrasenna() {
        return $this->contrasenna;
    }

    public function setContrasenna($contrasenna) {
        $this->contrasenna = $contrasenna;
    }
    public function setGenero($genero){
        $this->genero=$genero;
    }
    public function getGenero(){
        return $this->genero;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }
      public function setFk_id_tipo_usuario($fk_id_tipo){
        $this->fk_id_tipo_usuarios=$fk_id_tipo;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setFK_id_nivel($FK_id_nivel){
        $this->FK_id_nivelUsuario=$FK_id_nivel;
    }
     public function setFK_id_categoria($FK_id_categoria){
        $this->FK_id_categoria=$FK_id_categoria;
    }
    public function getFK_id_nivel(){
        return $this->FK_id_nivelUsuario;
    }
     public function getFk_id_tipo_usuario(){
        return $this->fk_id_tipo_usuarios;
    }
public function save() {
       echo $query = "INSERT INTO usuario (nombre, apellido,fecha_nacimiento , genero, correo, telefono, contrasenna, FK_id_nivelUsuario)
                VALUES('" . $this->nombre . "',
                        '" . $this->apellido . "',
                               '" . $this->fecha_nac . "',
                            '" . $this->genero . "',
                                '" . $this->correo . "',
                                    '" . $this->telefono . "',
                                        '" . $this->contrasenna . "',
                                              '" .$this ->FK_id_nivelUsuario . "');";
                                                    
        $save = $this->db()->query($query);
        $newId=  $this->db()->insert_id;
        //$this->db()->error;
        if(!$save && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $newId;
    }
    public function modify() {
       
        $query="UPDATE usuario SET nombre='$this->nombre', apellido='$this->apellido', genero='$this->genero', correo='$this->correo', telefono='$this->telefono', contrasenna='$this->contrasenna', FK_id_nivelUsuario='$this->FK_id_nivelUsuario', FK_id_categoria='$this->FK_id_categoria' "
                . "WHERE id_usuario='$this->id_usuario'";
        $modify= $this->db()->query($query);
        if(!$modify && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $modify;
       
    }
    public function validarLogin() {
    $resultSet=null;
    $query = $this->db()->query("SELECT * FROM usuario WHERE correo='$this->correo'");
   // echo "hi"."<br>";
    if ($row = $query->fetch_object()) {
        /*Se compara la contraseña ingresada por el ususario en el formulario de loguin la que se encuentra
         *almacenada en la base de datos
          */
          //echo "hi2"."<br>";
          $contra = $this->contrasenna;
           $hash = $row->contrasenna;
           
            echo $contra."<br>";
             echo $hash."<br>";
              //if (password_verify($contra, $hash))
              
        if ($contra==$hash) {
              //echo "hi3"."<br>";
        $_SESSION['fk_id_tipo_usuario']= $row->fk_id_tipo_usuario;
        echo $this->fk_id_tipo_usuario;
        $_SESSION['correo'] = $row->correo;
        //Establecer tiempo de inicio de sesion
        $_SESSION["timeout"] = time();
        session_regenerate_id();
        return true;
        }
         echo "Contraseñas mal"."<br>";
    }
    return false;
         
}
}

?>