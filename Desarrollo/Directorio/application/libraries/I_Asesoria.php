<?php
interface I_Asesoria {
    public function registrar($asesoria);
    public function obtener_solicitudes_pendientes();
    public function establecer_estado($id, $estado);
}