<?php
interface_exists('I_Paso', FALSE) OR require_once(APPPATH.'libraries/I_Paso.php');
require_once(APPPATH.'libraries/Tipo_Elemento.php');

class Modelo_Paso extends CI_Model implements I_Paso {
    private $diseño_db;

    private function obtener_objeto_paso($fila) {
        $paso = new Paso();
        $paso->set_id($fila->paso_id);
        $paso->set_nombre($fila->paso_nombre);
        $paso->set_fecha_registro($fila->paso_fecha_registro);
        return $paso;
    }
    private function obtener_objeto_elemento($fila) {
        $elemento = new Elemento();
        if ($fila->elemento_tipo == Tipo_Elemento::CUADRO_TEXTO) {
            $elemento = new Cuadro_Texto();
            $cuadro = $this->obtener_cuadro_texto($fila->elemento_id);
            $elemento->set_instruccion($cuadro->cuadro_instruccion);
        }
        $elemento->set_id($fila->elemento_id);
        $elemento->set_nombre($fila->elemento_nombre);
        $elemento->set_fecha_registro($fila->elemento_fecha_registro);
        $elemento->set_tipo($fila->elemento_tipo);
        return $elemento;
    }
    private function obtener_cuadro_texto($id_elemento) {
        $consulta = $this->diseño_db->get_where('cuadroTexto', array('cuadro_elemento' => $id_elemento));
        return $consulta->row();
    }

    public function __construct(){
        $this->diseño_db = $this->load->database('diseñoCurricular', TRUE);
        $this->load->library('Paso');
        $this->load->library('Elemento');
        $this->load->library('Cuadro_Texto');
    }

    public function obtener_paso($id_paso) {
        $paso;
        $consulta = $this->diseño_db->get_where('paso', array('paso_id' => $id_paso));
        if ($consulta->num_rows() > 0) {
            $paso = $this->obtener_objeto_paso($consulta->row());
        }
        return $paso;
    }
    public function obtener_pasos() {
        $pasos = array();
        $consulta = $this->diseño_db->get('paso');
        foreach ($consulta->result() as $fila) {
            array_push($pasos, $this->obtener_objeto_paso($fila));
        }
        return $pasos;
    }
    public function obtener_elementos($id_paso) {
        $elementos = array();
        $consulta = $this->diseño_db->get_where('elemento', array('elemento_paso' => $id_paso));
        foreach ($consulta->result() as $fila) {
            array_push($elementos, $this->obtener_objeto_elemento($fila));
        }
        return $elementos;
    }
}