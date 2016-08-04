<?php

class  nivelUsuario extends EntidadBase {

    private $id_nivelUsuario;
    private $nombre;
    private $descripcion;
    private $foto;
    

    public function __construct($adapter) {
        $table = "nivelusuario";
        parent::__construct($table, $adapter);
    } 

    public function getId_nivelUsuario() {
        return $this->id_articulos;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getFoto(){
        return $this->foto;
    }
  

    public function setId_nivelUsuario($id_nivelUsuario) {
        $this->id_nivelUsuario = $id_nivelUsuario;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
  public function setFoto($foto){
     $this->foto = $foto;

    }
    public function save() {
        $query = "INSERT INTO nivelusuario (nombre,descripcion, foto)
                VALUES( '" . $this->nombre . "',
                        '" . $this->descripcion . "',
                        '" .$this ->foto. "');";
        $save = $this->db()->query($query);
        //$this->db()->error;
        if(!$save && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $save;
    }
    public function modify() {
       
        $query="UPDATE nivelusuario SET nombre='$this->nombre', descripcion='$this->descripcion', foto='$this->foto' WHERE id_nivelUsuario='$this->id_nivelUsuario'";
        $modify= $this->db()->query($query);
        if(!$modify && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $modify;
       
    }
public function delete(){
    $query="DELETE FROM nivelusuario WHERE id='$this->id_nivelUsuario'";
    $art=  $this->db()->query($query);
    return $art;
}

}

?>
