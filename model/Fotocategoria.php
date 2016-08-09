<?php

class Fotocategoria extends EntidadBase {

    private $id_foto;
    private $id_categoria;
    public function __construct($adapter) {
        $table = "fotocategoria";
        parent::__construct($table, $adapter);
    }
    function getId_foto() {
        return $this->id_foto;
    }

    function getId_categoria() {
        return $this->id_categoria;
    }

    function setId_foto($id_foto) {
        $this->id_foto = $id_foto;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }
public function save(){
    echo $query = "INSERT INTO fotocategoria (id_foto, id_categoria)
                VALUES('" . $this->id_foto . "',
                    '" . $this->id_categoria . "');";
     $save = $this->db()->query($query);
        
        //$this->db()->error;
        if(!$save && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $save;
    }

}
