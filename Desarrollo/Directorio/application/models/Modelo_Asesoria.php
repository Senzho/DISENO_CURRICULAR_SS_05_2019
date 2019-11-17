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
    }
    
    public function registrar($asesoria) {
        $arreglo = $this->obtener_arreglo($asesoria);
        return $this->siu_db->insert('asesoria', $arreglo);
    }
}