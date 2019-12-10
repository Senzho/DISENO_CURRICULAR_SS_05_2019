<?php
class Paso {
    private $id;
    private $nombre;
    private $fecha_registro;
    private $elementos;

    private $i_paso;

    private function obtener_elementos() {
        return $this->i_paso->obtener_elementos($this->id);
    }

    public function __construct() {
        $this->elementos = array();
    }

    public function set_id($id) {
        $this->id = $id;
    }
    public function get_id() {
        return $this->id;
    }
    public function set_nombre($nombre) {
        $this->nombre = $nombre;
    }
    public function get_nombre() {
        return $this->nombre;
    }
    public function set_fecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }
    public function get_fecha_registro() {
        return $this->fecha_registro;
    }
    public function get_elementos() {
        if (count($this->elementos) == 0) {
            $this->elementos = $this->obtener_elementos();
        }
        return $this->elementos;
    }
    
    public function set_i_paso($i_paso) {
        $this->i_paso = $i_paso;
    }

    public function obtener_paso($id_paso) {
        return $this->i_paso->obtener_paso($id_paso);
    }
}