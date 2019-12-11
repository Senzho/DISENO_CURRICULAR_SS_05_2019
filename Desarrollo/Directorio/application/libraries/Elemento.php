<?php
class Elemento {
    private $id;
    private $nombre;
    private $fecha_registro;
    private $tipo;
    private $guias = array();
    private $columnas = array();

    private $i_elemento;

    private function obtener_guias() {
        return $this->i_elemento->obtener_guias($this->get_id());
    }
    private function obtener_columnas() {
        return $this->i_elemento->obtener_columnas($this->get_id());
    }

    public function __construct() {
        $this->guias = array();
        $this->columnas = array();
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
    public function set_tipo($tipo) {
        $this->tipo = $tipo;
    }
    public function get_tipo() {
        return $this->tipo;
    }
    public function get_guias() {
        if (count($this->guias) == 0) {
            $this->guias = $this->obtener_guias();
        }
        return $this->guias;
    }
    public function get_columnas() {
        if (count($this->columnas) == 0) {
            $this->columnas = $this->obtener_columnas();
        }
        return $this->columnas;
    }

    public function set_i_elemento($i_elemento) {
        $this->i_elemento = $i_elemento;
    }
}