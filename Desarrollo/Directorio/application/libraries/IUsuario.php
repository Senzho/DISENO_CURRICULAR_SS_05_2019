<?php
interface I_Usuario {
    public function existe($nombre_usuario, $contraseña);
    public function obtener_por_credenciales($nombre_usuario, $contraseña);
}