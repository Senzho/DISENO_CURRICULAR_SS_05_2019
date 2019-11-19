<?php
interface_exists('I_Asesoria', FALSE) OR require_once(APPPATH.'libraries/I_Asesoria.php');

class Modelo_Asesoria extends CI_Model implements I_Asesoria {
    private $siu_db;

    private function obtener_arreglo($asesoria) {
        $arreglo = array();
        $arreglo['asesoria_estado'] = $asesoria->get_estado();
        $arreglo['asesoria_tipo'] = $asesoria->get_tipo();
        $arreglo['asesoria_fecha_solicitud'] = $asesoria->get_fecha_solicitud();
        $arreglo['asesoria_usuario_id'] = $asesoria->get_usuario()->get_id();
        $arreglo['asesoria_programa_id'] = $asesoria->get_programa_educativo()->get_id();
        return $arreglo;
    }
    public function __construct(){
        $this->siu_db = $this->load->database('diseñoCurricular', TRUE);
        $this->load->library('Asesoria');
        $this->load->model('Modelo_Programa_Educativo', 'modelo_programa');
        $this->load->model('Modelo_Usuario', 'modelo_usuario');
    }
    
    public function registrar($asesoria) {
        $arreglo = $this->obtener_arreglo($asesoria);
        return $this->siu_db->insert('asesoria', $arreglo);
    }
    public function obtener_solicitudes_pendientes() {
        $solicitudes = array();
        $this->siu_db->select('*');
        $this->siu_db->from('asesoria');
        $this->siu_db->where('asesoria_estado', 1);
        $this->siu_db->or_where('asesoria_estado', 3);
        $consulta = $this->siu_db->get();
        foreach ($consulta->result() as $fila) {
            $asesoria = new Asesoria();
            $asesoria->set_estado($fila->asesoria_estado);
            $asesoria->set_fecha_solicitud($fila->asesoria_fecha_solicitud);
            $asesoria->set_id($fila->asesoria_id);
            $asesoria->set_tipo($fila->asesoria_tipo);
            $asesoria->set_programa_educativo($this->modelo_programa->obtener_programa_educativo($fila->asesoria_programa_id));
            $asesoria->set_usuario($this->modelo_usuario->obtener_por_id($fila->asesoria_usuario_id));
            array_push($solicitudes, $asesoria);
        }
        return $solicitudes;
    }
    public function establecer_estado($id, $estado) {
        $arreglo = array('asesoria_estado' => $estado);
        $this->siu_db->where('asesoria_id', $id);
        return $this->siu_db->update('asesoria', $arreglo);
    }
}