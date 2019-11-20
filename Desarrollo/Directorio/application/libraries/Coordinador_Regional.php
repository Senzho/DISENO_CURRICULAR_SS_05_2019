<?php
require_once(APPPATH.'libraries/Colaborador.php');

class Coordinador_Regional extends Colaborador {
    private $region_coordinacion;

    public function __construct() {
        parent::__construct();
    }

    public function set_region_coordinacion($region_coordinacion) {
        $this->region_coordinacion = $region_coordinacion;
    }
    public function get_region_coordinacion() {
        return $this->region_coordinacion;
    }
}