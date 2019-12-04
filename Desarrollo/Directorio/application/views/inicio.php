<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/estilo.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/inicio.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/menu.js"></script>
    <?php
        if ($clase_usuario == Clase_Usuario::SOLICITANTE) {
            echo "<link href='" . base_url() . "css/popup.css' rel='stylesheet' type='text/css'>";
            echo "<script type='text/javascript' src='" . base_url() . "js/Asesoria.js' ></script>";
        }
    ?>
</head>
<body class="cuerpo">
    <?php
        $this->load->view('Bloques/titulo', array('titulo' => 'Proyectos curriculares', 'boton_listo' => FALSE));
    ?>
    <div class="opciones centradoVerticalPadre">
        <div class="inline" id="contenedorBoton">
            <div class="boton btnMed centradoVerticalPadre">
                <label class="textoBoton centro">Nuevo programa</label>
                <img src="<?php echo base_url() . 'iconos/mas.svg';?>" class="botonImagen"></img>
            </div>
        </div>
        <?php
            if ($clase_usuario == Clase_Usuario::JEFE_DDC) {
                echo "<img src='" . base_url() . "iconos/carta.svg' class='botonImagen tab' data-toggle='modal' data-target='#exampleModalCenter'></img>";
            }
        ?>
    </div>
    <div class="filtros">
        <?php echo form_open('Inicio/principal',array('id'=>'', 'class'=>''))?>
            <select name="areaAcademica" class="combo">
                <option value="Económico - administrativa" <?php echo set_select('areaAcademica', 'Económico - administrativa'); ?>>Económico - administrativa</option>
                <option value="todo" <?php echo set_select('areaAcademica', 'todo', TRUE); ?>>Todas</option>
            </select>
            <select name="region" class="combo">
                <option value="Xalapa" <?php echo set_select('region', 'Xalapa'); ?>>Xalapa</option>
                <option value="Orizaba" <?php echo set_select('region', 'Orizaba'); ?>>Orizaba</option>
                <option value="todo" <?php echo set_select('region', 'todo', TRUE); ?>>Todas</option>
            </select>
            <select name="sede" class="combo">
                <option value="Xalapa" <?php echo set_select('sede', 'Xalapa'); ?>>Xalapa</option>
                <option value="todo" <?php echo set_select('sede', 'todo', TRUE); ?>>Todas</option>
            </select>
            <select name="sistema" class="combo">
                <option value="Escolarizado" <?php echo set_select('sistema', 'Escolarizado'); ?>>Escolarizado</option>
                <option value="Abierto" <?php echo set_select('sistema', 'Abierto'); ?>>Abierto</option>
                <option value="todo" <?php echo set_select('sistema', 'todo', TRUE); ?>>Todos</option>
            </select>
            <select name="trabajo" class="combo">
                <option value="Actualización" <?php echo set_select('trabajo', 'Actualización'); ?>>Actualización</option>
                <option value="todo" <?php echo set_select('trabajo', 'todo', TRUE); ?>>Todos</option>
            </select>
            <button class="" type="submit" id="">Buscar</button>
        </form>
    </div>
    <div class="panelMediano scrollY">
        <?php
            $modelo_programa = new Modelo_Programa_Educativo();
            foreach ($programas_educativos as $programa_educativo) {
                $programa_educativo->set_i_programa_educativo($modelo_programa);
                $asesoria_activa = $programa_educativo->tiene_asesoria_activa();
                echo $asesoria_activa ? "<a href='" . base_url() . "index.php/Proceso/mapa/" . $programa_educativo->get_id() . "'>" : "";
                $this->load->view("Bloques/programa_educativo", array('programa_educativo' => $programa_educativo));
                echo $asesoria_activa ? "</a>" : "";
            }
        ?>
    </div>
    <?php
        if ($clase_usuario == Clase_Usuario::SOLICITANTE) {
            $this->load->view('Bloques/menu_solicitante');
        }
        if ($mensaje > 0) {
            $contenido;
            switch($mensaje) {
                case 1:
                    $contenido = 'Lo sentimos, el programa educativo tiene un proceso de asesoría activo';
                break;
                case 2:
                    $contenido = 'Ocurrió un error al aprobar la solicitud';
                break;
                case 3:
                    $contenido = 'Lo sentimos, el programa educativo no se encuentra en proceso de asesoría';
                break;
                default:
                    $contenido = 'Ocurrió un error inesperado';
                break;
            }
            echo('<label>' . $contenido . '</label>');
        }
    ?>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: #212121;">
                <div class="modal-header">
                    <h5 class="modal-title textoBlanco" id="exampleModalLongTitle">Solicitudes de asesoría</h5>
                </div>
                <div class="modal-body">
                    <?php
                        if (isset($solicitudes)) {
                            foreach ($solicitudes as $solicitud) {
                                $usuario = $solicitud->get_usuario();
                                $programa_educativo = $solicitud->get_programa_educativo();
                                $tipo = $solicitud->get_tipo() == 0 ? 'Diseño' : 'Actualización';
                                $this->load->view('Bloques/solicitud', array('solicitud' => $solicitud, 'usuario' => $usuario, 'programa_educativo' => $programa_educativo, 'tipo' => $tipo));
                            }
                        }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="boton btnPeq">Listo</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        $this->load->view('Bloques/menu_principal');
    ?>
</body>
</html>