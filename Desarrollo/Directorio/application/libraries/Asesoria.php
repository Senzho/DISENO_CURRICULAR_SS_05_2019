<?php
class Asesoria {
    private $id;
    private $estado;
    private $tipo;
    private $fecha_solicitud;
    private $fecha_inicio;
    private $fecha_fin;
    private $usuario;
    private $programa_educativo;
    
    private $i_asesoria;

    public function __construct() {

    }

    public function set_id($id) {
        $this->id = $id;
    }
    public function get_id() {
        return $this->id;
    }
    public function set_estado($estado) {
        $this->estado = $estado;
    }
    public function get_estado() {
        return $this->estado;
    }
    public function set_tipo($tipo) {
        $this->tipo = $tipo;
    }
    public function get_tipo() {
        return $this->tipo;
    }
    public function set_fecha_solicitud($fecha_solicitud) {
        $this->fecha_solicitud = $fecha_solicitud;
    }
    public function get_fecha_solicitud() {
        return $this->fecha_solicitud;
    }
    public function set_fecha_inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }
    public function get_fecha_inicio() {
        return $this->fecha_inicio;
    }
    public function set_fecha_fin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }
    public function get_fecha_fin() {
        return $this->fecha_fin;
    }
    public function set_usuario($usuario) {
        $this->usuario = $usuario;
    }
    public function get_usuario() {
        return $this->usuario;
    }
    public function set_programa_educativo($programa_educativo) {
        $this->programa_educativo = $programa_educativo;
    }
    public function get_programa_educativo() {
        return $this->programa_educativo;
    }

    public function set_i_asesoria($i_asesoria) {
        $this->i_asesoria = $i_asesoria;
    }

    public function registrar_solicitud() {
        $this->i_asesoria->registrar($this);
    }
}