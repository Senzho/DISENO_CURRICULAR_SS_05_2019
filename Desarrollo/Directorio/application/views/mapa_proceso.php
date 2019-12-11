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
                $clase_usuario = $usuario->get_clase_usuario();
                foreach ($pasos as $paso) {
                    $nombre = $paso->get_nombre();
                    if ($nombre == 'Establecer asesor curricular') {
                        if ($clase_usuario == Clase_Usuario::JEFE_DDC) {
                            echo "<a href='" . base_url() . "index.php/Asesor/seleccion/" . $programa_educativo->get_id() . "'>";
                            echo "<ul>Establecer asesor curricular</ul></a>";
                        } else {
                            echo "<ul>Establecer asesor curricular</ul>";
                        }
                    } else if ($nombre == 'Establecer colaboradores') {
                        $asesor = new Colaborador();
                        $asesor->set_i_colaborador(new Modelo_Colaborador());
                        $asesor = $asesor->obtener_asesor_programa($programa_educativo->get_id());
                        if ($clase_usuario == Clase_Usuario::COLABORADOR && isset($asesor)) {
                            echo "<a href='" . base_url() . "index.php/Colaboradores/seleccion/" . $programa_educativo->get_id() . "'>";
                            echo "<ul>Establecer colaboradores</ul></a>";
                        } else {
                            echo "<ul>Establecer colaboradores</ul>";
                        }
                    } else {
                        echo "<a href='" . base_url() . "index.php/Proceso/paso/" . $paso->get_id() . '/' . $programa_educativo->get_id() . "'>";
                        echo "<ul>" . $nombre . "</a>";
                    }
                }
            ?>
        </li>
    </div>
    <?php
        $this->load->view('Bloques/menu_principal');
    ?>
</body>
</html>