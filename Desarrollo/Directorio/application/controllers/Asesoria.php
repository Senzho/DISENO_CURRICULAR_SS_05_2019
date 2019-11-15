<?php

class Asesoria extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function solicitud($programa_educativo_id) {
        //1. Obtener el programa educativo.
        //2. Mostrar la vista de solicitud.
    }

    public function registrar() {
        
    }
}