<?
interface IUsuario {
    public function existe($nombreUsuario, $contraseña);
    public function obtenerPorCredenciales($nombreUsuario, $contraseña);
}