<?php
interface_exists('I_Programa_Educativo', FALSE) OR require_once(APPPATH.'libraries/I_Programa_Educativo.php');

class Modelo_Programa_Educativo extends CI_Model implements I_Programa_Educativo {
    private function obtener_where_desde_filtros($filtros) {
        $arreglo_where = array();
        foreach ($filtros as $clave => $valor) {
            if ($valor != 'todo' && $valor != '') {
                $arreglo_where += [$clave => $valor];
            }
        }
        return $arreglo_where;
    }

    public function __construct(){
        $this->load->library('Programa_Educativo');
    }
    
    public function obtener_de_colaborador($id_usuario, $filtros) {

    }
    public function obtener_todos($filtros) {
        $this->load->database('siu');
        $programas_educativos = array();
        $consulta = $this->db->get_where('programaEducativo', $this->obtener_where_desde_filtros($filtros));
        foreach ($consulta->result() as $fila) {
            $programa_educativo = new Programa_Educativo();
            $programa_educativo->set_id($fila->nrc);
            $programa_educativo->set_area_academica($fila->areaAcademica);
            $programa_educativo->set_nombre($fila->nombre);
            $programa_educativo->set_region($fila->region);
            $programa_educativo->set_sistema($fila->sistema);
            array_push($programas_educativos, $programa_educativo);
        }
        return $programas_educativos;
    }
    public function obtener_de_solicitante($region, $filtros) {

    }
}