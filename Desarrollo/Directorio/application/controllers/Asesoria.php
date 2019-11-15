<?php

class Asesoria extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('Programa_Educativo');
        $this->load->model('Modelo_Programa_Educativo', 'modelo_programa_educativo');
    }

    public function solicitud($programa_educativo_id) {
        $programa_educativo = new Programa_Educativo();
        $programa_educativo->set_id($programa_educativo_id);
        $programa_educativo->set_i_programa_educativo(new Modelo_Programa_educativo());
        $programa_educativo = $programa_educativo->obtener_programa_educativo();
        $this->load->view('solicitar_asesoria', array('programa_educativo' => $programa_educativo));
    }

    public function registrar() {
        $tipo = $this->input->post('tipo');
        $id_programa = $this->input->post('id');
    }
}