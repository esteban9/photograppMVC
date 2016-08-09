<?php
class Concurso_nivelusuario extends EntidadBase {

    private $id_concurso;
    private $id_nivelUsuario;
    public function __construct($adapter) {
        $table = "concurso_nivelusuario";
        parent::__construct($table, $adapter);
    }
    function getId_concurso() {
        return $this->id_concurso;
    }

    function getId_nivelUsuario() {
        return $this->id_nivelUsuario;
    }

    function setId_concurso($id_concurso) {
        $this->id_concurso = $id_concurso;
    }

    function setId_nivelUsuario($id_nivelUsuario) {
        $this->id_nivelUsuario = $id_nivelUsuario;
    }
public function save(){
    echo $query = "INSERT INTO concurso_nivelusuario(id_concurso, id_nivelUsuario)
                VALUES('" . $this->id_concurso . "',
                    '" . $this->id_nivelUsuario . "');";
     $save = $this->db()->query($query);
        
        //$this->db()->error;
        if(!$save && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $save;
    }

}



