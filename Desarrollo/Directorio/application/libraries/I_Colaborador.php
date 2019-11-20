<?php
interface I_Colaborador {
    public function registrar_colaborador($colaborador, $id_programa);
    public function eliminar_colaborador($id_colaborador, $id_programa);
    public function obtener_colaboradores_programa($id_programa);
    public function obtener_asesor_programa($id_programa);
}