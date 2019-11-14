<?php

class Autenticacion extends CI_Controller {
    private function mostrar_vista_principal($mensaje = '') {
        $this->load->view('autenticacion/login', array('mensaje' => $mensaje));
    }

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
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
        } else {
            $this->mostrar_vista_principal('El usuario y/o contraseña no coinciden');
        }
    }
}