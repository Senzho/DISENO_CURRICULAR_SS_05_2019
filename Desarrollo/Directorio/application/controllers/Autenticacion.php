<?php

class Autenticacion extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('Usuario');
        $this->load->model('Modelo_Usuario', 'modelo_usuario');
    }

    public function principal() {
        $this->load->view('autenticacion/login');
    }

    public function iniciar_sesion() {
        $nick = $this->input->post('nick');
        $contraseña = $this->input->post('contraseña');
        $usuario = new Usuario();
        $usuario->set_i_usuario(new Modelo_Usuario());
        $usuario_existe = $usuario->existe($nick, $contraseña);
        $usuario = $usuario->obtener_por_credenciales($nick, $contraseña);
    }
}