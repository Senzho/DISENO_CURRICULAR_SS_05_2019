<?php
interface I_Programa_Educativo {
    public function obtener_de_colaborador($id_usuario, $filtros);
    public function obtener_todos($filtros);
    public function obtener_de_solicitante($region, $filtros);
    public function obtener_programa_educativo($id);
    public function tiene_asesoria_activa($id_programa);
}