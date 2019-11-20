<?php
interface_exists('I_Colaborador', FALSE) OR require_once(APPPATH.'libraries/I_Colaborador.php');
require_once(APPPATH.'libraries/Puesto_Colaborador.php');

class Modelo_Colaborador extends CI_Model implements I_Colaborador {
    private $diseño_db;
    private $siu_db;

    private function obtener_objeto($fila_colaborador, $fila_siu) {
        if ($fila_colaborador->colaborador_puesto == Puesto_Colaborador::COORDINADOR_REGIONAL) {
            $consulta_region = $this->diseño_db->get_where('coordinador_region', array());
            $colaborador = new Coordinador_Regional();
            $colaborador->set_region_coordinacion($consulta_region->row()->col_reg_region);
        } else {
            $colaborador = new Colaborador();
        }
        $colaborador->set_id($fila_colaborador->usuario_id);
        $colaborador->set_nombre_usuario($fila_colaborador->usuario_nick);
        $colaborador->set_clase_usuario($fila_colaborador->usuario_clase);
        $colaborador->set_cargo($fila_siu->cargo);
        $colaborador->set_correo($fila_siu->correo);
        $colaborador->set_nombre($fila_siu->nombre);
        $colaborador->set_region($fila_siu->region);
        $colaborador->set_puesto($fila_colaborador->colaborador_puesto);
        return $colaborador;
    }

    public function __construct(){
        $this->diseño_db = $this->load->database('diseñoCurricular', TRUE);
        $this->siu_db = $this->load->database('siu', TRUE);
        $this->load->library('Colaborador');
        $this->load->library('Coordinador_regional');
    }
    
    public function registrar_colaborador($colaborador, $id_programa) {
        $arreglo = array('colaborador_puesto' => $colaborador->get_puesto(), 'colaborador_programa_id' => $id_programa, 'colaborador_usuario_id' => $colaborador->get_id());
        return $this->diseño_db->insert('colaborador', $arreglo);
    }
    public function eliminar_colaborador($id_colaborador, $id_programa) {
        $arreglo = array('colaborador_usuario_id' => $id_colaborador, 'colaborador_programa_id' => $id_programa);
        return $this->diseño_db->delete('colaborador', $arreglo);
    }
    public function obtener_colaboradores_programa($id_programa) {
        $this->diseño_db->select('*');
        $this->diseño_db->from('usuario, colaborador');
        $this->diseño_db->where('colaborador_programa_id', $id_programa);
        $this->diseño_db->where('usuario_id = colaborador_usuario_id');
        $this->diseño_db->where('colaborador_programa_id', $id_programa);
        $consulta = $this->diseño_db->get();
        $colaboradores = array();
        foreach ($consulta->result() as $fila) {
            $consulta_siu = $this->siu_db->get_where('personal', array('numeroPersonal' => $fila->usuario_siu_id));
            $colaborador = $this->obtener_objeto($fila, $consulta_siu->row());
            array_push($colaboradores, $colaborador);
        }
        return $colaboradores;
    }
    public function obtener_asesor_programa($id_programa) {
        $this->diseño_db->select('*');
        $this->diseño_db->from('usuario, colaborador');
        $this->diseño_db->where('colaborador_programa_id', $id_programa);
        $this->diseño_db->where('colaborador_puesto', Puesto_Colaborador::ASESOR_CURRICULAR);
        $this->diseño_db->where('usuario_id = colaborador_usuario_id');
        $consulta = $this->diseño_db->get();
        $colaborador = NULL;
        if ($consulta->num_rows() > 0) {
            $fila = $consulta->row();
            $consulta_siu = $this->siu_db->get_where('personal', array('numeroPersonal' => $fila->usuario_siu_id));
            $colaborador = $this->obtener_objeto($fila, $consulta_siu->row());
        }
        return $colaborador;
    }
}