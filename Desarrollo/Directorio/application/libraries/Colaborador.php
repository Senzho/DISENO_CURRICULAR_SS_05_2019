<?php
require_once(APPPATH.'libraries/Usuario.php');

class Colaborador extends Usuario {
    private $puesto;

    private $i_colaborador;

    public function __construct() {
        parent::__construct();
    }

    public function set_puesto($puesto) {
        $this->puesto = $puesto;
    }
    public function get_puesto() {
        return $this->puesto;
    }

    public function get_nombre_puesto() {
        $nombre;
        switch ($this->puesto) {
            case 2:
                $nombre = 'Coordinador de la comisión';
            break;
            case 3:
                $nombre = 'Asesor curricular';
            break;
            case 4:
                $nombre = 'Coordinador estatal';
            break;
            case 5:
                $nombre = 'Coordinador regional';
            break;
            default:
                $nombre = 'Miembro de la comisión';
            break;
        }
        return $nombre;
    }
    public function set_i_colaborador($i_colaborador) {
        $this->i_colaborador = $i_colaborador;
    }

    public function registrar($id_programa) {
        return $this->i_colaborador->registrar_colaborador($this, $id_programa);
    }
    public function eliminar($id_programa) {
        return $this->i_colaborador->eliminar_colaborador($this->id, $id_programa);
    }
    public function obtener_por_programa($id_programa) {
        return $this->i_colaborador->obtener_colaboradores_programa($id_programa);
    }
    public function obtener_asesor_programa($id_programa) {
        return $this->i_colaborador->obtener_asesor_programa($id_programa);
    }
}