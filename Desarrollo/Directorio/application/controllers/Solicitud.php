<?php
require_once(APPPATH.'libraries/Estado_Asesoria.php');

class Solicitud extends CI_Controller {
    private function obtener_programa_educativo($id) {
        $this->load->model('Modelo_Programa_Educativo', 'modelo_programa_educativo');
        $programa_educativo = new Programa_Educativo();
        $programa_educativo->set_id($id);
        $programa_educativo->set_i_programa_educativo(new Modelo_Programa_educativo());
        $programa_educativo = $programa_educativo->obtener_programa_educativo();
        return $programa_educativo;
    }

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('Programa_Educativo');
        $this->load->library('Asesoria');
        $this->load->library('Usuario');
    }

    public function solicitud($programa_educativo_id) {
        if ($this->session->userdata('usuario')) {
            $programa_educativo = $this->obtener_programa_educativo($programa_educativo_id);
            $programa_educativo->set_i_programa_educativo(new Modelo_Programa_educativo());
            if (!$programa_educativo->tiene_asesoria_activa()) {
                $this->load->view('solicitar_asesoria', array('programa_educativo' => $programa_educativo));
            } else {
                redirect('Inicio/principal/1');
            }
        } else{
            redirect('Autenticacion/principal', 'location');
        }
    }

    public function registrar() {
        if ($this->session->userdata('usuario')) {
            $tipo = $this->input->post('tipo');
            $id_programa = $this->input->post('id');
            $usuario = unserialize($this->session->userdata('usuario'));
            $programa_educativo = $this->obtener_programa_educativo($id_programa);
            $asesoria = new Asesoria();
            $asesoria->set_estado(Estado_Asesoria::SOLICITADA);
            $asesoria->set_tipo($tipo == 'diseño' ? 0 : 1);
            $asesoria->set_fecha_solicitud(date('Y-m-d'));
            $asesoria->set_usuario($usuario);
            $asesoria->set_programa_educativo($programa_educativo);
            $this->load->model('Modelo_Asesoria', 'modelo_asesoria');
            $asesoria->set_i_asesoria(new Modelo_Asesoria());
            echo $asesoria->registrar_solicitud() ? 'si' : 'no';
        } else{
            redirect('Autenticacion/principal', 'location');
        }
    }
}