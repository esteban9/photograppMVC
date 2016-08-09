<?php

class Concurso extends EntidadBase {

    private $id_concurso;
    private $nombre;
    private $estado;
    private $descripcion;
    private $foto;
    private $peso_limite_foto;
    private $fecha_registro;
    private $fecha_inicio;
    private $fecha_fin;
    private $FK_id_administrador;
    private $FK_id_categoria;
    private $FK_id_nivelUsuario;

    public function __construct($adapter) {
        $table = "concurso";
        parent::__construct($table, $adapter);
    }

    function getId_concurso() {
        return $this->id_concurso;
    }
      function getFK_id_nivel() {
        return $this->FK_id_nivelUsuario;
    }
    function getFecha_fin(){
        return $this->fecha_fin;
    }
    function getNombre() {
        return $this->nombre;
    }

    function getEstado() {
        return $this->estado;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFoto() {
        return $this->foto;
    }

    function getPeso_limite_foto() {
        return $this->peso_limite_foto;
    }

    function getFecha_registro() {
        return $this->fecha_registro;
    }

    function getFecha_inicio() {
        return $this->fecha_inicio;
    }


    function getFK_id_administrador() {
        return $this->FK_id_administrador;
    }

    function getFK_id_categoria() {
        return $this->FK_id_categoria;
    }

    function setId_concurso($id_concurso) {
        $this->id_concurso = $id_concurso;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setPeso_limite_foto($peso_limite_foto) {
        $this->peso_limite_foto = $peso_limite_foto;
    }

    function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    function setFecha_inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    function setFK_id_administrador($FK_id_administrador) {
        $this->FK_id_administrador = $FK_id_administrador;
    }

     function setFK_id_nivelUsuario($FK_id_nivelUsuario) {
        $this->FK_id_nivelUsuario = $FK_id_nivelUsuario;
    }
    function setFK_id_categoria($FK_id_categoria) {
        $this->FK_id_categoria = $FK_id_categoria;
    }
    function  setFecha_fin($fecha_fin){
        $this->fecha_fin=$fecha_fin;
    }

    public function save() {
        $query = "INSERT INTO concurso (nombre,estado,descripcion,foto,peso_limite_foto,fecha_registro,fecha_inicio, fecha_fin,FK_id_administrador, FK_id_categoria)
                VALUES('" . $this->nombre . "',
                       '" . $this->estado . "',
                       '" . $this->descripcion . "',
                       '" . $this->foto . "',
                       '" . $this->peso_limite_foto . "',
                       '" . $this->fecha_registro . "',
                       '" . $this->fecha_inicio . "',
                       '" . $this->fecha_fin . "',
                       '" . $this->FK_id_administrador . "',
                       '" . $this->FK_id_categoria . "');";
        $save = $this->db()->query($query);
        $newID = $this->db()->insert_id;


        if (!$save && DEBUG) {
            echo "Error en la base de datos: " . $this->db()->error;
        }
        return $newID;
    }

    public function modify() {
     
     $query = "UPDATE concurso SET nombre='$this->nombre', estado='$this->estado', descripcion='$this->descripcion', foto='$this->foto',
                peso_limite_foto='$this->peso_limite_foto',fecha_registro='$this->fecha_registro',fecha_inicio='$this->fecha_inicio', fecha_fin='$this->fecha_fin', FK_id_administrador='$this->FK_id_administrador', FK_id_categoria='$this->FK_id_categoria', FK_id_nivelUsuario=''$this->FK_id_nivelUsuario "
                . "WHERE id_concurso='$this->id_concurso'";
        $modify = $this->db()->query($query);
        if (!$modify && DEBUG) {
            echo "Error en la base de datos: " . $this->db()->error;
        }
        return $modify;
    }

    public function delete() {
        $query = "DELETE FROM concurso WHERE id_concurso='$this->id_concurso'";
        $con = $this->db()->query($query);
        return $con;
    }

}
?>

