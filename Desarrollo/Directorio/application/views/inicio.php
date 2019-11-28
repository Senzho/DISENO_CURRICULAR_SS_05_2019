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
    <?php
        if ($clase_usuario == Clase_Usuario::SOLICITANTE) {
            echo "<link href='" . base_url() . "css/popup.css' rel='stylesheet' type='text/css'>";
            echo "<script type='text/javascript' src='" . base_url() . "js/Asesoria.js' ></script>";
        }
        if ($clase_usuario == Clase_Usuario::JEFE_DDC) {
            
        }
    ?>
</head>
<body class="cuerpo">
    <nav class="nav centradoVerticalPadre">
        <!-- Formulario para poder cerrar sesión con el botón (temporal) -->
        <?php echo form_open('Autenticacion/cerrar_sesion',array('id'=>'', 'class'=>''))?>
            <button class="" type="submit" id="">Menú (cerrar sesión)</button>
        </form>
        <h1 class="titulo1 textoNegro">Proyectos curriculares</h1>
    </nav>
    <div class="opciones">
        <div class="inline" id="contenedorBoton">
            <div class="boton centradoVerticalPadre">
                <label class="textoBoton centro">Nuevo programa</label>
                <img src="<?php echo base_url() . 'iconos/mas.svg';?>" class="botonImagen"></img>
            </div>
        </div>
        <?php
            if ($clase_usuario == Clase_Usuario::JEFE_DDC) {
                echo "<button id='abrir_solicitudes' type='button' data-toggle='modal' data-target='#exampleModalCenter'>Solicitudes</button>";
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
    <div class="scrollGrid">
        <?php
            $modelo_programa = new Modelo_Programa_Educativo();
            foreach ($programas_educativos as $programa_educativo) {
                $programa_educativo->set_i_programa_educativo($modelo_programa);
                $asesoria_activa = $programa_educativo->tiene_asesoria_activa();
                echo $asesoria_activa ? "<a href='" . base_url() . "index.php/Proceso/mapa/" . $programa_educativo->get_id() . "'>" : "";
                echo "<div class='inline programa' id='" . $programa_educativo->get_id() . "'><label>" . $programa_educativo->get_nombre() . "</label></div>";
                echo $asesoria_activa ? "</a>" : "";
            }
        ?>
    </div>
    <?php
        if ($clase_usuario == Clase_Usuario::SOLICITANTE) {
            echo "<div id='menuProgramaEducativo' class='popup'>";
            echo "<a href='" . base_url() . "index.php/Solicitud/solicitud/' class='popuptext' id='myPopup'>Solicitar asesoría</a>";
            echo "</div>";
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
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Solicitudes de asesoría</h5>
                </div>
                <div class="modal-body">
                    <?php
                        if (isset($solicitudes)) {
                            foreach ($solicitudes as $solicitud) {
                                $usuario = $solicitud->get_usuario();
                                $programa_educativo = $solicitud->get_programa_educativo();
                                $tipo = $solicitud->get_tipo() == 0 ? 'Diseño' : 'Actualización';
                                echo "<div id='" . $solicitud->get_id() . "' class='bloque_asesoria'><label>" . $programa_educativo->get_nombre() . " - " . $tipo . "</label>";
                                echo "<label>" . $usuario->get_nombre() . "</label><button type'button'>Puesto</button>";
                                echo "<label>" . $usuario->get_correo() . "</label>";
                                echo "<button type='button'>Documento</button>";
                                echo "<a href='" . base_url() . "index.php/Solicitud/aprobar/" . $solicitud->get_id() . "'><button id='boton_aprobar' name='" . $solicitud->get_id() . "' type='button'>Aprobar</button></a>";
                                echo "<button type='button'>Cancelar</button></div>";
                            }
                        }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal">Listo</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>