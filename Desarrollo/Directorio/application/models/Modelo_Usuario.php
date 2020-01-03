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
    public function obtener_por_id($id) {
        $consulta_diseño = $this->diseño_db->get_where('usuario', array('usuario_id' => $id));
        $usuario = new Usuario();
        $usuario->set_id($id);
        $usuario->set_nombre_usuario($consulta_diseño->row()->usuario_nick);
        $usuario->set_clase_usuario($this->obtener_clase($consulta_diseño->row()->usuario_clase));
        $usuario->set_contraseña($consulta_diseño->row()->usuario_contraseña);
        $consulta_siu = $this->siu_db->get_where('personal', array('numeroPersonal' => $consulta_diseño->row()->usuario_siu_id));
        $usuario->set_cargo($consulta_siu->row()->cargo);
        $usuario->set_correo($consulta_siu->row()->correo);
        $usuario->set_nombre($consulta_siu->row()->nombre);
        $usuario->set_region($consulta_siu->row()->region);
        return $usuario;
    }
    public function obtener_por_clave($clave) {
        $this->siu_db->select('*');
        $this->siu_db->from('personal');
        $this->siu_db->like('numeroPersonal', $clave);
        $this->siu_db->or_like('nombre', $clave);
        $this->siu_db->or_like('correo', $clave);
        $this->siu_db->or_like('cargo', $clave);
        $this->siu_db->or_like('region', $clave);
        $consulta = $this->siu_db->get();
        $usuarios = array();
        foreach ($consulta->result() as $fila) {
            $usuario = new Usuario();
            $usuario->set_cargo($fila->cargo);
            $usuario->set_correo($fila->correo);
            $usuario->set_nombre($fila->nombre);
            $usuario->set_region($fila->region);
            $consulta_diseño = $this->diseño_db->get_where('usuario', array('usuario_siu_id' => $fila->numeroPersonal));
            $usuario->set_id($consulta_diseño->row()->usuario_id);
            $usuario->set_nombre_usuario($consulta_diseño->row()->usuario_nick);
            $usuario->set_clase_usuario($this->obtener_clase($consulta_diseño->row()->usuario_clase));
            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }
    public function obtener_todos() {
        $usuarios = array();
        $consulta_diseño = $this->diseño_db->get('usuario');
        foreach ($consulta_diseño->result() as $fila) {
            $usuario = new Usuario();
            $usuario->set_id($fila->usuario_id);
            $usuario->set_nombre_usuario($fila->usuario_nick);
            $usuario->set_clase_usuario($this->obtener_clase($fila->usuario_clase));
            $consulta_siu = $this->siu_db->get_where('personal', array('numeroPersonal' => $fila->usuario_siu_id));
            $usuario->set_cargo($consulta_siu->row()->cargo);
            $usuario->set_correo($consulta_siu->row()->correo);
            $usuario->set_nombre($consulta_siu->row()->nombre);
            $usuario->set_region($consulta_siu->row()->region);
            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }
    public function registrar($usuario, $numero_personal) {
        $registrado = FALSE;
        $arreglo_siu = array('numeroPersonal' => $numero_personal, 'nombre' => $usuario->get_nombre(), 'correo' => $usuario->get_correo(), 'cargo' => $usuario->get_cargo(), 'region' => $usuario->get_region());
        $arreglo_diseño = array('usuario_nick' => $usuario->get_nombre_usuario(), 'usuario_contraseña' => $usuario->get_correo(), 'usuario_clase' => $usuario->get_clase_usuario(), 'usuario_siu_id' => $numero_personal);
        if ($this->siu_db->insert('personal', $arreglo_siu)) {
            $registrado = $this->diseño_db->insert('usuario', $arreglo_diseño);
        }
        return $registrado;
    }
    public function modificar($usuario, $numero_personal) {
        $modificado = FALSE;
        $arreglo_siu = array('numeroPersonal' => $numero_personal, 'nombre' => $usuario->get_nombre(), 'correo' => $usuario->get_correo(), 'cargo' => $usuario->get_cargo(), 'region' => $usuario->get_region());
        $arreglo_diseño = array('usuario_nick' => $usuario->get_correo(), 'usuario_contraseña' => $usuario->get_correo(), 'usuario_clase' => $usuario->get_clase_usuario(), 'usuario_siu_id' => $numero_personal);
        $this->siu_db->where('numeroPersonal', $numero_personal);
        if ($this->siu_db->update('personal', $arreglo_siu)) {
            $this->diseño_db->where('usuario_id', $usuario->get_id());
            $modificado = $this->diseño_db->update('usuario', $arreglo_diseño);
        }
        return $modificado;
    }
}