<?php

class Inicio extends CI_Controller {
    private function obtener_filtros_input() {
        $area_academica = $this->input->post('areaAcademica');
        $region = $this->input->post('region');
        $sistema = $this->input->post('sistema');
        $filtros = array();
        if (isset($area_academica)) {
            $filtros += ['areaAcademica' => $area_academica];
        }
        if (isset($region)) {
            $filtros += ['region' => $region];
        }
        if (isset($sistema)) {
            $filtros += ['sistema' => $sistema];
        }
        return $filtros;
    }

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('Programa_Educativo');
        $this->load->library('Usuario');
        $this->load->model('Modelo_Programa_Educativo', 'modelo_programa_educativo');
    }

    public function principal($mensaje = 0) {
        if ($this->session->userdata('usuario')) {
            $programa_educativo = new Programa_Educativo();
            $programa_educativo->set_i_programa_educativo(new Modelo_Programa_Educativo());
            $usuario = unserialize($this->session->userdata('usuario'));
            $programas_educativos = $programa_educativo->obtener_por_permiso($usuario, $this->obtener_filtros_input());
            $this->load->view('inicio', array('programas_educativos' => $programas_educativos, 'link_asesoria' => 'http://localhost/DisenoCurricular/index.php/Asesoria/solicitud/', 'clase_usuario' => $usuario->get_clase_usuario(), 'mensaje' => $mensaje));
        } else {
            redirect('Autenticacion/principal', 'location');
        }
    }
}