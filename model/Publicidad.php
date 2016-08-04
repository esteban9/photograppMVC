<?php

class Publicidad extends EntidadBase {

    private $id_publicidad;
  
    private $estado;
    private $nombre;
    private $ruta_foto;
    private $fecha_registro;
    private $fecha_inicio;
    private $fecha_fin;
    private $FK_id_usuario;
    private $FK_id_administrador;

    public function __construct($adapter) {
        $table = "publicidad";
        parent::__construct($table, $adapter);
    }

    function getId_publicidad() {
        return $this->id_publicidad;
    }
     function getNombre() {
        return $this->nombre;
    }


    function  getFecha_fin(){
        return $this->fecha_fin;
    }
                function getEstado() {
        return $this->estado;
    }

    function getRuta_foto() {
        return $this->ruta_foto;
    }

    function getFecha_registro() {
        return $this->fecha_registro;
    }

    function getFecha_inicio() {
        return $this->fecha_inicio;
    }



    function getFK_id_usuario() {
        return $this->FK_id_usuario;
    }

    function getFK_id_administrador() {
        return $this->FK_id_administrador;
    }

    function setId_publicidad($id_publicidad) {
        $this->id_publicidad = $id_publicidad;
    }

  

    function setEstado($estado) {
        $this->estado = $estado;
    }
     function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setRuta_foto($ruta_foto) {
        $this->ruta_foto = $ruta_foto;
    }

    function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    function setFecha_inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }



    function setFK_id_usuario($FK_id_usuario) {
        $this->FK_id_usuario = $FK_id_usuario;
    }

    function setFK_id_administrador($FK_id_administrador) {
        $this->FK_id_administrador = $FK_id_administrador;
    }
    function setFecha_fin($fecha_fin){
        $this->fecha_fin=$fecha_fin;
    }

    public function save() {
     echo    $query = "INSERT INTO publicidad (estado,nombre ,ruta_foto, fecha_registro, fecha_inicio,fecha_fin ,FK_id_usuario, FK_id_administrador)
                VALUES('" . $this->estado . "',
                     '" . $this->nombre . "',
                        '" . $this->ruta_foto . "',
                            '" . $this->fecha_registro . "',
                                '" . $this->fecha_inicio . "',
                                     '" . $this->fecha_fin . "',
                                        '" . $this->FK_id_usuario . "',
                                               '" . $this->FK_id_administrador . "');";
        $save = $this->db()->query($query);
       
        //$this->db()->error;
        if (!$save && DEBUG) {
            echo "Error en la base de datos: " . $this->db()->error;
        }
        return $save;
    }

    public function modify() {

        $query = "UPDATE publicidad SET nombre='$this->nombre',estado='$this->estado', ruta_foto='$this->ruta_foto', fecha_registro='$this->fecha_registro', fecha_inicio='$this->fecha_inicio',  FK_id_usuario='$this->FK_id_usuario', FK_id_administrador='$this->FK_id_administrador' "
                . "WHERE id_publicidad='$this->id_publicidad'";
        $modify = $this->db()->query($query);
        if (!$modify && DEBUG) {
            echo "Error en la base de datos: " . $this->db()->error;
        }
        return $modify;
    }

}
