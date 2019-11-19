<?php

class Proceso extends CI_Controller {
    private function mostrar_vista_mapa($id_programa) {
        $programa_educativo = new Programa_Educativo();
        $programa_educativo->set_id($id_programa);
        $programa_educativo->set_i_programa_educativo(new Modelo_Programa_educativo());
        $programa_educativo = $programa_educativo->obtener_programa_educativo();
        $this->load->view('mapa_proceso', array('programa_educativo' => $programa_educativo));
    }

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('Usuario');
        $this->load->library('Programa_Educativo');
        $this->load->model('Modelo_Programa_Educativo', 'modelo_programa');
    }

    public function mapa($id_programa) {
        if ($this->session->userdata('usuario')) {
            $this->mostrar_vista_mapa($id_programa);
        } else {
            redirect('Autenticacion/principal', 'location');
        }
    }
}