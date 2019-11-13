<?php
interface_exists('IUsuario', FALSE) OR require_once(APPPATH.'libraries/IUsuario.php');
require_once(APPPATH.'libraries/Clase_Usuario.php');

class Modelo_Usuario extends CI_Model implements I_Usuario {
    private function obtener_clase($clase) {
        $clase_usuario;
        if ($clase === 1) {
            $clase_usuario = ClaseUsuario::COLABORADOR;
        } else if ($clase === 2) {
            $clase_usuario = ClaseUsuario::COORDINADOR_COMISION;
        } else if ($clase === 3) {
            $clase_usuario = ClaseUsuario::ASESOR_CURRICULAR;
        } else if ($clase === 4) {
            $clase_usuario = ClaseUsuario::JEFE_DDC;
        } else if ($clase === 5) {
            $clase_usuario = ClaseUsuario::DIRECTOR_AREA_ACADEMICA;
        } else if ($clase === 6) {
            $clase_usuario = ClaseUsuario::SOLICITANTE;
        } else {
            $clase_usuario = ClaseUsuario::OBSERVADOR_PARTICULAR;
        }
        return $clase_usuario;
    }

    public function __construct(){
        $this->load->library('Usuario');
    }
    
    public function existe($nombre_usuario, $contraseña) {
        $this->load->database('diseñoCurricular');
        $consulta = $this->db->get_where('usuario', array('usuario_nick' => $nombreUsuario, 'usuario_contraseña' => $contraseña));
        $existe = ($consulta->num_rows() === 1) ? TRUE : FALSE;
        return $existe;
    }
    public function obtener_por_credenciales($nombre_usuario, $contraseña) {
        $this->load->database('diseñoCurricular');
        $consulta_diseño = $this->db->get_where('usuario', array('usuario_nick' => $nombreUsuario, 'usuario_contraseña' => $contraseña));
        $usuario = new Usuario();
        $usuario->set_id($consulta_diseño->row()->usuario_id);
        $usuario->set_nombre_usuario($nombre_usuario);
        $usuario->set_clase_usuario($this->obtener_clase($consulta_diseño->row()->usuario_clase));
        $this->load->database('siu');
        $consulta_siu = $this->db->get_where('personal', array('numeroPersonal' => $consulta_diseño->row()->usuario_siu_id));
        $usuario->set_cargo($consulta_siu->row()->cargo);
        $usuario->set_correo($consulta_siu->row()->correo);
        $usuario->set_nombre($consulta_siu->row()->nombre);
        $usuario->set_region($consulta_siu->row()->region);
        return $usuario;
    }
}