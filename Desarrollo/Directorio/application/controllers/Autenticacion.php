<?php

class Autenticacion extends CI_Controller {
    private function mostrar_vista_principal($mensaje = '') {
        $this->load->view('autenticacion/login', array('mensaje' => $mensaje));
    }

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('Usuario');
        $this->load->model('Modelo_Usuario', 'modelo_usuario');
    }

    public function principal() {
        $this->mostrar_vista_principal();
    }

    public function iniciar_sesion() {
        $nick = $this->input->post('nick');
        $contraseña = $this->input->post('contraseña');
        $usuario = new Usuario();
        $usuario->set_i_usuario(new Modelo_Usuario());
        $usuario_existe = $usuario->existe($nick, $contraseña);
        if ($usuario_existe) {
            $usuario = $usuario->obtener_por_credenciales($nick, $contraseña);
            $this->session->set_userdata('id', $usuario->get_id());
            $this->session->set_userdata('nombre', $usuario->get_nombre());
            $this->session->set_userdata('correo', $usuario->get_correo());
            $this->session->set_userdata('region', $usuario->get_region());
            $this->session->set_userdata('clase', $usuario->get_clase_usuario());
            redirect('Inicio/principal', 'location');
        } else {
            $this->mostrar_vista_principal('El usuario y/o contraseña no coinciden');
        }
    }
}