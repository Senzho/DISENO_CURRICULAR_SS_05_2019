<?php
interface_exists('I_Usuario', FALSE) OR require_once(APPPATH.'libraries/I_Usuario.php');
require_once(APPPATH.'libraries/Clase_Usuario.php');

class Modelo_Usuario extends CI_Model implements I_Usuario {
    private $diseño_db;
    private $siu_db;

    private function obtener_clase($clase) {
        $clase_usuario;
        if ($clase == 1) {
            $clase_usuario = Clase_Usuario::COLABORADOR;
        } else if ($clase == 2) {
            $clase_usuario = Clase_Usuario::COORDINADOR_COMISION;
        } else if ($clase == 3) {
            $clase_usuario = Clase_Usuario::ASESOR_CURRICULAR;
        } else if ($clase == 4) {
            $clase_usuario = Clase_Usuario::JEFE_DDC;
        } else if ($clase == 5) {
            $clase_usuario = Clase_Usuario::DIRECTOR_AREA_ACADEMICA;
        } else if ($clase == 6) {
            $clase_usuario = Clase_Usuario::SOLICITANTE;
        } else {
            $clase_usuario = Clase_Usuario::OBSERVADOR_PARTICULAR;
        }
        return $clase_usuario;
    }

    public function __construct(){
        $this->diseño_db = $this->load->database('diseñoCurricular', TRUE);
        $this->siu_db = $this->load->database('siu', TRUE);
        $this->load->library('Usuario');
    }
    
    public function existe($nombre_usuario, $contraseña) {
        $consulta = $this->diseño_db->get_where('usuario', array('usuario_nick' => $nombre_usuario, 'usuario_contraseña' => $contraseña));
        $existe = ($consulta->num_rows() === 1) ? TRUE : FALSE;
        return $existe;
    }
    public function obtener_por_credenciales($nombre_usuario, $contraseña) {
        $consulta_diseño = $this->diseño_db->get_where('usuario', array('usuario_nick' => $nombre_usuario, 'usuario_contraseña' => $contraseña));
        $usuario = new Usuario();
        $usuario->set_id($consulta_diseño->row()->usuario_id);
        $usuario->set_nombre_usuario($nombre_usuario);
        $usuario->set_clase_usuario($this->obtener_clase($consulta_diseño->row()->usuario_clase));
        $consulta_siu = $this->siu_db->get_where('personal', array('numeroPersonal' => $consulta_diseño->row()->usuario_siu_id));
        $usuario->set_cargo($consulta_siu->row()->cargo);
        $usuario->set_correo($consulta_siu->row()->correo);
        $usuario->set_nombre($consulta_siu->row()->nombre);
        $usuario->set_region($consulta_siu->row()->region);
        return $usuario;
    }
}