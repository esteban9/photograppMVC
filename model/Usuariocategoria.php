<?php
class Usuariocategoria extends EntidadBase {

    private $id_usuario;
    private $id_categoria;
    public function __construct($adapter) {
        $table = "usuariocategoria";
        parent::__construct($table, $adapter);
    }
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_categoria() {
        return $this->id_categoria;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

public function save(){
    echo $query = "INSERT INTO usuariocategoria (id_usuario, id_categoria)
                VALUES('" . $this->id_usuario . "',
                    '" . $this->id_categoria . "');";
     $save = $this->db()->query($query);
        
        //$this->db()->error;
        if(!$save && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $save;
    }
    public function modify() {
      
        $query="UPDATE usuariocategoria SET id_usuario='$this->id_usuario', id_categoria='$this->id_categoria"
                . "WHERE id_usuario='$this->id_usuario'";
        $modify= $this->db()->query($query);
        if(!$modify && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $modify;
       
    }
}

