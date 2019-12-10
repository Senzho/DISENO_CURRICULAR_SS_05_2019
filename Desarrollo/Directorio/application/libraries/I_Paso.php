<?php
interface I_Paso {
    public function obtener_paso($id_paso);
    public function obtener_pasos();
    public function obtener_elementos($id_paso);
}