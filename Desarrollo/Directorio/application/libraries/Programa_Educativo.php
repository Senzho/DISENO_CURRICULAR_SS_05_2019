<?php

class Programa_Educativo {
    private $id;
    private $nombre;
    private $area_academica;
    private $region;
    private $sistema;

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
    public function set_area_academica($area_academica) {
        $this->area_academica = $area_academica;
    }
    public function get_area_academica() {
        return $this->area_academica;
    }
    public function set_region($region) {
        $this->region = $region;
    }
    public function get_region() {
        return $this->region;
    }
    public function set_sistema($sistema) {
        $this->sistema = $sistema;
    }
    public function get_sistema() {
        return $this->sistema;
    }

    /*
        $filtros, arreglo de filtros requeridos:
            ...('area' => 'todo', 'region' => 'xalapa', 'sistema' =>
             'todo', 'trabajo' => 'actualizacion')
    */
    public function obtener_por_permiso($usuario, $filtros) {
        
    }
}