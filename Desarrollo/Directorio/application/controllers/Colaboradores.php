<?php
require_once(APPPATH.'libraries/Puesto_Colaborador.php');

class Colaboradores extends CI_Controller {
    private function cargar_vista($id_programa, $usuarios, $mensaje = NULL) {
        $programa_educativo = new Programa_Educativo();
        $programa_educativo->set_i_programa_educativo(new Modelo_Programa_Educativo());
        $programa_educativo->set_id($id_programa);
        $programa_educativo = $programa_educativo->obtener_programa_educativo();
        $colaborador = new Colaborador();
        $colaborador->set_i_colaborador(new Modelo_Colaborador());
        $colaboradores = $colaborador->obtener_por_programa($id_programa);
        $this->load->view('colaboradores', array('programa_educativo' => $programa_educativo, 'usuarios' => $usuarios, 'colaboradores' => $colaboradores, 'mensaje' => $mensaje));
    }

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('Programa_Educativo');
        $this->load->library('Usuario');
        $this->load->library('Colaborador');
        $this->load->model('Modelo_Programa_Educativo', 'modelo_programa');
        $this->load->model('Modelo_Usuario', 'modelo_usuario');
        $this->load->model('Modelo_Colaborador', 'modelo_colaborador');
    }

    public function seleccion($id_programa) {
        if ($this->session->userdata('usuario')) {
            $this->cargar_vista($id_programa, null);
        } else {
            redirect('Autenticacion/principal');
        }
    }
    public function buscar() {
        if ($this->session->userdata('usuario')) {
            $id_programa = $this->input->post('id_programa');
            $clave = $this->input->post('busqueda');
            $usuario = new Usuario();
            $usuario->set_i_usuario(new Modelo_Usuario());
            $usuarios = $usuario->obtener_por_clave($clave);
            $this->cargar_vista($id_programa, $usuarios);
        } else {
            redirect('Autenticacion/principal');
        }
    }
    public function agregar() {
        if ($this->session->userdata('usuario')) {
            $id_programa = $this->input->post('id_programa');
            $id_usuario = $this->input->post('id_usuario');
            $asesor = new Colaborador();
            $asesor->set_i_colaborador(new Modelo_Colaborador());
            $asesor->set_id($id_usuario);
            $asesor->set_puesto(Puesto_Colaborador::MIEMBRO_COMISION);
            if ($asesor->registrar($id_programa)) {
                redirect('Colaboradores/seleccion/' . $id_programa);
            } else {
                $this->cargar_vista($id_programa, $usuarios, 'Ocurrió un error al registrar el asesor');
            }
        } else {
            redirect('Autenticacion/principal');
        }
    }
    //Agregar función de eliminar ->
}