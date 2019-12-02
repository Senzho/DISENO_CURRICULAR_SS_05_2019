<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/estilo.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/menu.js"></script>
</head>
<body>
    <?php
        $this->load->view('Bloques/titulo', array('titulo' => $programa_educativo->get_nombre(), 'boton_listo' => TRUE));
    ?>
    <div class="opciones centradoVerticalPadre">
        <h2 class="titulo2 inline">Mapa</h2>
    </div>
    <div class="panelGrande">
        <li>
            <?php
                if ($clase_usuario == Clase_Usuario::JEFE_DDC) {
                    echo "<a href='" . base_url() . "index.php/Asesor/seleccion/" . $programa_educativo->get_id() . "'>";
                    echo "<ul>Establecer asesor curricular</ul></a>";
                } else {
                    echo "<ul>Establecer asesor curricular</ul>";
                }
                if ($clase_usuario == Clase_Usuario::ASESOR_CURRICULAR) {
                    echo "<a href='" . base_url() . "index.php/Colaboradores/seleccion/" . $programa_educativo->get_id() . "'>";
                    echo "<ul>Establecer colaboradores</ul></a>";
                } else {
                    echo "<ul>Establecer colaboradores</ul>";
                }
            ?>
        </li>
    </div>
    <?php
        $this->load->view('Bloques/menu_principal');
    ?>
</body>
</html>