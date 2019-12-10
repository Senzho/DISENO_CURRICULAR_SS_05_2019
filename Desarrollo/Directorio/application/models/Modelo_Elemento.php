<?php
interface_exists('I_Elemento', FALSE) OR require_once(APPPATH.'libraries/I_Elemento.php');

class Modelo_Elemento extends CI_Model implements I_Elemento {
    private $diseño_db;

    public function __construct(){
        $this->diseño_db = $this->load->database('diseñoCurricular', TRUE);
        $this->load->library('Columna');
    }

    public function obtener_guias($id_elemento) {
        $guias = array();
        $consulta = $this->diseño_db->get_where('guia', array('guia_elemento' => $id_elemento));
        foreach ($consulta->result() as $fila) {
            array_push($guias, $fila->guia_contenido);
        }
        return $guias;
    }
    public function obtener_columnas($id_elemento) {
        $columnas = array();
        $conuslta = $this->diseño_db->get_where('columna', array('columna_elemento' => $id_elemento));
        foreach ($consulta->result() as $fila) {
            $columna = new Columna();
            $columna->set_id($fila->columna_id);
            $columna->set_nombre($fila->columna_nombre);
            array_push($columnas, $columna);
        }
        return $columnas;
    }
}