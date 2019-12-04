<?php
interface_exists('I_Programa_Educativo', FALSE) OR require_once(APPPATH.'libraries/I_Programa_Educativo.php');

class Modelo_Programa_Educativo extends CI_Model implements I_Programa_Educativo {
    private $siu_db;
    private $diseño_db;
    
    private function obtener_where_desde_filtros($filtros) {
        $arreglo_where = array();
        foreach ($filtros as $clave => $valor) {
            if ($valor != 'todo' && $valor != '') {
                $arreglo_where += [$clave => $valor];
            }
        }
        return $arreglo_where;
    }
    private function obtener_objeto($fila) {
        $programa_educativo = new Programa_Educativo();
        $programa_educativo->set_id($fila->nrc);
        $programa_educativo->set_area_academica($fila->areaAcademica);
        $programa_educativo->set_nombre($fila->nombre);
        $programa_educativo->set_region($fila->region);
        $programa_educativo->set_sistema($fila->sistema);
        return $programa_educativo;
    }

    public function __construct(){
        $this->load->library('Programa_Educativo');
        $this->siu_db = $this->load->database('siu', TRUE);
        $this->diseño_db = $this->load->database('diseñoCurricular', TRUE);
    }
    
    public function obtener_de_colaborador($id_usuario, $filtros) {
        $programas_educativos = array();
        $consulta = $this->siu_db->get_where('programaEducativo', $this->obtener_where_desde_filtros($filtros));
        foreach ($consulta->result() as $fila) {
            $programa_educativo = $this->obtener_objeto($fila);
            $consulta_diseño = $this->diseño_db->get_where('colaborador', array('colaborador_usuario_id' => $id_usuario, 'colaborador_programa_id' => $programa_educativo->get_id()));
            if ($consulta_diseño->num_rows() == 1) {
                array_push($programas_educativos, $programa_educativo);
            }
        }
        return $programas_educativos;
    }
    public function obtener_todos($filtros) {
        $programas_educativos = array();
        $consulta = $this->siu_db->get_where('programaEducativo', $this->obtener_where_desde_filtros($filtros));
        foreach ($consulta->result() as $fila) {
            $programa_educativo = $this->obtener_objeto($fila);
            array_push($programas_educativos, $programa_educativo);
        }
        return $programas_educativos;
    }
    public function obtener_de_solicitante($region, $filtros) {
        $programas_educativos = array();
        $arreglo_where = $this->obtener_where_desde_filtros($filtros);
        $arreglo_where['region'] = $region;
        $consulta = $this->siu_db->get_where('programaEducativo', $arreglo_where);
        foreach ($consulta->result() as $fila) {
            $programa_educativo = $this->obtener_objeto($fila);
            array_push($programas_educativos, $programa_educativo);
        }
        return $programas_educativos;
    }
    public function obtener_programa_educativo($id) {
        $programa_educativo = new Programa_Educativo();
        $programa_educativo->set_id('');
        $consulta = $this->siu_db->get_where('programaEducativo', array('nrc' => $id));
        if ($consulta->num_rows() == 1) {
            $programa_educativo = $this->obtener_objeto($consulta->row());
        }
        return $programa_educativo;
    }
    public function tiene_asesoria_activa($id_programa) {
        $consulta = $this->diseño_db->get_where('asesoria', array('asesoria_programa_id' => $id_programa, 'asesoria_estado' => '4'));
        return $consulta->num_rows() > 0;
    }
}