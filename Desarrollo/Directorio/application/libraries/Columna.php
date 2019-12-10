<?php
class Columna {
    private $id;
    private $nombre;

    public function __construct() {

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
}