<?php
interface_exists('I_Programa_Educativo', FALSE) OR require_once(APPPATH.'libraries/I_Programa_Educativo.php');

class Modelo_Programa_Educativo extends CI_Model implements I_Programa_Educativo {
    public function __construct(){
        $this->load->library('Programa_Educativo');
    }
    
    
}