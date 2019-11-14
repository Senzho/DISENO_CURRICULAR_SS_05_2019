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

    public function principal() {
        if ($this->session->userdata('id')) {
            $programa_educativo = new Programa_Educativo();
            $programa_educativo->set_i_programa_educativo(new Modelo_Programa_Educativo());
            $usuario = new Usuario();
            $usuario->set_id($this->session->userdata('id'));
            $usuario->set_clase_usuario($this->session->userdata('clase'));
            $usuario->set_region($this->session->userdata('region'));
            $programas_educativos = $programa_educativo->obtener_por_permiso($usuario, $this->obtener_filtros_input());
            $this->load->view('inicio', array('programas_educativos' => $programas_educativos));
        } else {
            redirect('Autenticacion/principal', 'location');
        }
    }

    
}