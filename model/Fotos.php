<?php
class Fotos extends EntidadBase {

    private $id_foto;
    private $nombre;
 
    private $estado;
    private $foto;
    private $FK_id_concurso;
    private $FK_id_categoria;
    

    public function __construct($adapter) {
        $table = "fotos";
        parent::__construct($table, $adapter);
    }
   
    function getId_fotos() {
        return $this->id_foto;
    }

    function getNombre() {
        return $this->nombre;
    }

 

    function getEstado() {
        return $this->estado;
    }

    function getFoto() {
        return $this->foto;
    }

    function getFK_id_concurso() {
        return $this->FK_id_concurso;
    }
    
    function getFK_id_categoria() {
        return $this->FK_id_categoria;
    }

    function setId_fotos($id_fotos) {
        $this->id_foto = $id_fotos;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

 

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setFK_id_concurso($FK_id_concurso) {
        $this->FK_id_concurso = $FK_id_concurso;
    }
    
    function setFK_id_categoria($FK_id_categoria) {
        $this->FK_id_categoria = $FK_id_categoria;
    }

public function save() {
        $query = "INSERT INTO fotos (nombre,estado,foto,FK_id_concurso, FK_id_categoria)
                VALUES( '" . $this->nombre . "',
                       
                        '" .$this ->estado. "',
                        '" .$this ->foto. "',
                        '" .$this ->FK_id_concurso. "',
                        '" .$this ->FK_id_categoria. "'
                            

                        );";
        $save = $this->db()->query($query);
        //$this->db()->error;
        if(!$save && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $save;
    }

     public function modify() {
       
       echo $query="UPDATE fotos SET nombre='$this->nombre', foto='$this->foto', estado='$this->estado', FK_id_concurso='$this->FK_id_concurso', FK_id_categoria='$this->FK_id_concurso' "
               . "WHERE id_foto='$this->id_foto'";
        $modify= $this->db()->query($query);
        if(!$modify && DEBUG){
            echo "Error en la base de datos: ".$this->db()->error;
        }
        return $modify;
       
    }
}
    ?>