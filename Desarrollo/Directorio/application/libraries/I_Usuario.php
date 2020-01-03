<?php
interface I_Usuario {
    public function existe($nombre_usuario, $contraseña);
    public function obtener_por_credenciales($nombre_usuario, $contraseña);
    public function obtener_por_id($id);
    public function obtener_por_clave($clave);
    public function obtener_todos();
    public function registrar($usuario, $numero_personal);
    public function modificar($usuario, $numero_personal);
}