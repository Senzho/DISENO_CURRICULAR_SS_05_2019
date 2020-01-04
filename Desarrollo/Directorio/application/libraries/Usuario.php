<?php
class Usuario {
    private $id;
    private $nombre_usuario;
    private $contraseña;
    private $nombre;
    private $correo;
    private $cargo;
    private $region;
    private $clase_usuario;
    private $numero_personal;

    private $i_usuario;

    public function __construct() {
        
    }

    public function set_id($id) {
        $this->id = $id;
    }
    public function get_id() {
        return $this->id;
    }
    public function set_nombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }
    public function get_nombre_usuario() {
        return $this->nombre_usuario;
    }
    public function set_contraseña($contraseña) {
        $this->contraseña = $contraseña;
    }
    public function get_contraseña() {
        return $this->contraseña;
    }
    public function set_nombre($nombre) {
        $this->nombre = $nombre;
    }
    public function get_nombre() {
        return $this->nombre;
    }
    public function set_correo($correo) {
        $this->correo = $correo;
    }
    public function get_correo() {
        return $this->correo;
    }
    public function set_cargo($cargo) {
        $this->cargo = $cargo;
    }
    public function get_cargo() {
        return $this->cargo;
    }
    public function set_region($region) {
        $this->region = $region;
    }
    public function get_region() {
        return $this->region;
    }
    public function set_clase_usuario($clase_usuario) {
        $this->clase_usuario = $clase_usuario;
    }
    public function get_clase_usuario() {
        return $this->clase_usuario;
    }
    public function set_numero_personal($numero_personal) {
        $this->numero_personal = $numero_personal;
    }
    public function get_numero_personal() {
        return $this->numero_personal;
    }

    public function set_i_usuario($i_usuario) {
        $this->i_usuario = $i_usuario;
    }

    public function existe($nombre_usuario, $contraseña) {
        return $this->i_usuario->existe($nombre_usuario, $contraseña);
    }
    public function obtener_por_credenciales($nombre_usuario, $contraseña) {
        return $this->i_usuario->obtener_por_credenciales($nombre_usuario, $contraseña);
    }
    public function obtener_por_clave($clave) {
        return $this->i_usuario->obtener_por_clave($clave);
    }
    public function obtener_por_id($id) {
        return $this->i_usuario->obtener_por_id($id);
    }
    public function obtener_todos() {
        return $this->i_usuario->obtener_todos();
    }
    public function registrar($numero_personal) {
        return $this->i_usuario->registrar($this, $numero_personal);
    }
    public function modificar($numero_personal, $numero_personal_original) {
        return $this->i_usuario->modificar($this, $numero_personal, $numero_personal_original);
    }
}