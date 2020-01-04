<?php
require_once(APPPATH.'libraries/Tipo_Elemento.php');

class Proceso extends CI_Controller {
    private function mostrar_vista_mapa($id_programa) {
        $programa_educativo = new Programa_Educativo();
        $programa_educativo->set_id($id_programa);
        $programa_educativo->set_i_programa_educativo(new Modelo_Programa_educativo());
        $programa_educativo = $programa_educativo->obtener_programa_educativo();
        $programa_educativo->set_i_programa_educativo(new Modelo_Programa_educativo());
        if ($programa_educativo->tiene_asesoria_activa()) {
            $usuario = unserialize($this->session->userdata('usuario'));
            $paso = new Paso();
            $paso->set_i_paso(new Modelo_paso());
            $this->load->view('mapa_proceso', array('programa_educativo' => $programa_educativo, 'usuario' => $usuario, 'pasos' => $paso->obtener_pasos()));
        } else {
            redirect('Inicio/principal/3');
        }
    }

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('Usuario');
        $this->load->library('Colaborador');
        $this->load->library('Programa_Educativo');
        $this->load->library('Paso');
        $this->load->library('Elemento');
        $this->load->model('Modelo_Programa_Educativo', 'modelo_programa');
        $this->load->model('Modelo_Colaborador', 'modelo_colaborador');
        $this->load->model('Modelo_Paso', 'modelo_paso');
        $this->load->model('Modelo_Elemento', 'modelo_elemento');
    }

    public function mapa($id_programa) {
        if ($this->session->userdata('usuario')) {
            $this->mostrar_vista_mapa($id_programa);
        } else {
            redirect('Autenticacion/principal', 'location');
        }
    }
    public function paso($id_paso, $id_programa) {
        if ($this->session->userdata('usuario')) {
            $programa_educativo = new Programa_Educativo();
            $programa_educativo->set_id($id_programa);
            $programa_educativo->set_i_programa_educativo(new Modelo_Programa_educativo());
            $programa_educativo = $programa_educativo->obtener_programa_educativo();
            $paso = new Paso();
            $paso->set_i_paso(new Modelo_paso());
            $paso = $paso->obtener_paso($id_paso);
            $paso->set_i_paso(new Modelo_paso());
            foreach ($paso->get_elementos() as $elemento) {
                $elemento->set_i_elemento(new Modelo_Elemento());
                $elemento->get_guias();
                if ($elemento->get_tipo() == Tipo_Elemento::TABLA) {
                    $elemento->get_columnas();
                }
            }
            $usuario_sesion = unserialize($this->session->userdata('usuario'));
            $this->load->view('paso', array('paso' => $paso, 'programa_educativo' => $programa_educativo, 'usuario_sesion' => $usuario_sesion));
        } else {
            redirect('Autenticacion/principal', 'location');
        }
    }
}