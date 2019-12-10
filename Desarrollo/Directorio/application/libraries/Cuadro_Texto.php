<?php
require_once(APPPATH.'libraries/Elemento.php');

class Cuadro_Texto extends Elemento {
    private $id;
    private $instruccion;

    public function __construct() {

    }

    public function set_id($id) {
        $this->id = $id;
    }
    public function get_id() {
        return $this->id;
    }
    public function set_instruccion($instruccion) {
        $this->instruccion = $instruccion;
    }
    public function get_instruccion() {
        return $this->instruccion;
    }
}