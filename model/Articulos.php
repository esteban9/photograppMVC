<?php

class Articulos extends EntidadBase {

    private $id_articulos;
    private $nombre;
    private $descripcion;
    private $FK_id_administrador;
    

    public function __construct($adapter) {
        $table = "articulos";
        parent::__construct($table, $adapter);
    } 

    public function getId_articulos() {
        return $this->id_articulos;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getFK_id_administracion(){
        return $this->FK_id_administrador;
    }
  

    public function setId_articulos($id_articulos) {
        $this->id_articulos = $id_articulos;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
  public function setFK_id_administrador($FK_id_administrador){
     $this->FK_id_administrador = $FK_id_administrador;

    }
    public function save() {
        $query = "INSERT INTO articulos (nombre,descripcion, FK_id_administrador)
                VALUES('" . $this->nombre . "',
                        '" . $this->descripcion . "',
                        '" .$this ->FK_id_administrador. "');";
        $save = $this->db()->query($query);
        //$newId=  $this->db()->insert_id;
        //$this->db()->error;
        if(!$save && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $save;
    }
    public function modify() {
       
        $query="UPDATE articulos SET nombre='$this->nombre', descripcion='$this->descripcion', FK_id_administrador='$this->FK_id_administrador' "
                . "WHERE id_articulos='$this->id_articulos'";
        $modify= $this->db()->query($query);
        if(!$modify && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $modify;
       
    }

}

?>

