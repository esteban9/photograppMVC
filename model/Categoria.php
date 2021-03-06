<?php

class Categoria extends EntidadBase {

    private $id_categoria;
    private $nombre;
    private $descripcion;
    private $foto;
    

    public function __construct($adapter) {
        $table = "categoria";
        parent::__construct($table, $adapter);
    }

    public function getId_categoria() {
        return $this->id_categoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    
    public function save() {
        $query = "INSERT INTO categoria (nombre,descripcion,foto)
                VALUES( '" . $this->nombre . "',
                        '" . $this->descripcion . "',
                        '" .$this ->foto. "');";
        $save = $this->db()->query($query);
        $newId=  $this->db()->insert_id;
        if(!$save && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $newId;
    }

     public function modify() {
      
        $query="UPDATE categoria SET nombre='$this->nombre', descripcion='$this->descripcion', foto='$this->foto' "
                . "WHERE id_categoria='$this->id_categoria'";
        $modify= $this->db()->query($query);
        if(!$modify && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $modify;
       
    }
}

?>

