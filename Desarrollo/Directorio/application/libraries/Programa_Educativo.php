<?php
require_once(APPPATH.'libraries/Clase_Usuario.php');

class Programa_Educativo {
    private $id;
    private $nombre;
    private $area_academica;
    private $region;
    private $sistema;

    private $i_programa_educativo;

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

    public function set_i_programa_educativo($i_programa_educativo) {
        $this->i_programa_educativo = $i_programa_educativo;
    }

    /*
        $filtros, arreglo de filtros requeridos:
            ...('area' => 'todo', 'region' => 'xalapa', 'sistema' =>
             'todo', 'trabajo' => 'actualizacion')
    */
    public function obtener_por_permiso($usuario, $filtros) {
        $programas_educativos;
        $clase_usuario = $usuario->get_clase_usuario();
        if ($clase_usuario === Clase_Usuario::COLABORADOR || $clase_usuario === Clase_Usuario::COORDINADOR_COMISION || $clase_usuario === Clase_Usuario::ASESOR_CURRICULAR) {
            $programas_educativos = $this->i_programa_educativo->obtener_de_colaborador($usuario->get_id(), $filtros);
        } else if ($clase_usuario === Clase_Usuario::JEFE_DDC || $clase_usuario === Clase_Usuario::DIRECTOR_AREA_ACADEMICA || $clase_usuario === Clase_Usuario::OBSERVADOR_PARTICULAR) {
            $programas_educativos = $this->i_programa_educativo->obtener_todos($filtros);
        } else {
            $programas_educativos = $this->i_programa_educativo->obtener_de_solicitante($usuario->get_region(), $filtros);
        }
        return $programas_educativos;
    }
    public function obtener_programa_educativo() {
        return $this->i_programa_educativo->obtener_programa_educativo($this->get_id());
    }
    public function tiene_asesoria_activa() {
        return $this->i_programa_educativo->tiene_asesoria_activa($this->id);
    }
}