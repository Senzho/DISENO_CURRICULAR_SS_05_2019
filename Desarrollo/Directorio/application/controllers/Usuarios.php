<?php
require_once(APPPATH.'libraries/Clase_Usuario.php');

class Usuarios extends CI_Controller {
    private function usuario_valido() {
        $valido = FALSE;
        if ($this->session->userdata('usuario')) {
            $usuario = unserialize($this->session->userdata('usuario'));
            $clase_usuario = $usuario->get_clase_usuario();
            if ($clase_usuario == Clase_Usuario::JEFE_DDC || $clase_usuario == Clase_Usuario::DIRECTOR_AREA_ACADEMICA) {
                $valido = TRUE;
            }
        }
        return $valido;
    }
    private function get_usuario_form() {
        $correo = $this->input->post('correo');
        $usuario = new Usuario();
        $usuario->set_cargo($this->input->post('cargo'));
        $usuario->set_clase_usuario($this->input->post('clase'));
        $usuario->set_contraseña($correo);
        $usuario->set_correo($correo);
        $usuario->set_nombre($this->input->post('nombre'));
        $usuario->set_nombre_usuario($correo);
        $usuario->set_region($this->input->post('region'));
        if ($this->input->post('id') != NULL) {
            $usuario->set_id($this->input->post('id'));
        }
        return $usuario;
    }

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('Usuario');
        $this->load->model('Modelo_Usuario', 'modelo_usuario');
    }

    public function lista($id = -1, $mensaje = '') {
        if ($this->usuario_valido()) {
            $usuario = NULL;
            if ($id > -1) {
                $usuario = new Usuario();
                $usuario->set_i_usuario(new Modelo_Usuario());
                $usuario = $usuario->obtener_por_id($id);
            }
            $usuario_lista = new Usuario();
            $usuario_lista->set_i_usuario(new Modelo_Usuario());
            $usuarios = $usuario_lista->obtener_todos();
            $usuario_sesion = unserialize($this->session->userdata('usuario'));
            $this->load->view('usuarios', array('usuario' => $usuario, 'usuarios' => $usuarios, 'mensaje' => $mensaje, 'usuario_sesion' => $usuario_sesion));
        } else {
            redirect('Inicio/principal');
        }
    }
    public function registrar() {
        $usuario = $this->get_usuario_form();
        $usuario->set_i_usuario(new Modelo_Usuario());
        if ($usuario->registrar($this->input->post('numero'))) {
            $this->lista();
        } else {
            $this->lista(-1, 'Lo sentimos, ocurrió un error al registrar el usuario');
        }
    }
    public function modificar() {
        $usuario = $this->get_usuario_form();
        $usuario->set_i_usuario(new Modelo_Usuario());
        if ($usuario->modificar($this->input->post('numero'), $this->input->post('numero_original'))) {
            $this->lista();
        } else {
            $this->lista($usuario->get_id(), 'Lo sentimos, ocurrió un error al actuaizar el usuario');
        }
    }
}