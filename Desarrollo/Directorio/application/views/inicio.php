<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <?php
        if ($clase_usuario == Clase_Usuario::SOLICITANTE) {
            echo "<link href='" . base_url() . "css/popup.css' rel='stylesheet' type='text/css'>";
            echo "<script type='text/javascript' src='" . base_url() . "js/jquery-3.4.1.js' ></script>";
            echo "<script type='text/javascript' src='" . base_url() . "js/Asesoria.js' ></script>";
        }
        if ($clase_usuario == Clase_Usuario::JEFE_DDC) {
            echo "<link href='" . base_url() . "css/modal.css' rel='stylesheet' type='text/css'>";
            echo "<script type='text/javascript' src='" . base_url() . "js/jquery-3.4.1.js' ></script>";
            echo "<script type='text/javascript' src='" . base_url() . "js/Modal.js' ></script>";
        }
    ?>
</head>
<body>
    <nav>
        <!-- Formulario para poder cerrar sesión con el botón (temporal) -->
        <?php echo form_open('Autenticacion/cerrar_sesion',array('id'=>'', 'class'=>''))?>
            <button class="" type="submit" id="">Menú (cerrar sesión)</button>
        </form>
        <h1>Proyectos curriculares</h1>
    </nav>
    <div>
        <button class="" type="button" id="">Nuevo programa</button>
        <?php
            if ($clase_usuario == Clase_Usuario::JEFE_DDC) {
                echo "<button id='abrir_solicitudes' type='button'>Solicitudes</button>";
            }
        ?>
    </div>
    <div>
        <?php echo form_open('Inicio/principal',array('id'=>'', 'class'=>''))?>
            <select name="areaAcademica">
                <option value="Económico - administrativa" <?php echo set_select('areaAcademica', 'Económico - administrativa'); ?>>Económico - administrativa</option>
                <option value="todo" <?php echo set_select('areaAcademica', 'todo', TRUE); ?>>Todas</option>
            </select>
            <select name="region">
                <option value="Xalapa" <?php echo set_select('region', 'Xalapa'); ?>>Xalapa</option>
                <option value="Orizaba" <?php echo set_select('region', 'Orizaba'); ?>>Orizaba</option>
                <option value="todo" <?php echo set_select('region', 'todo', TRUE); ?>>Todas</option>
            </select>
            <select name="sede">
                <option value="Xalapa" <?php echo set_select('sede', 'Xalapa'); ?>>Xalapa</option>
                <option value="todo" <?php echo set_select('sede', 'todo', TRUE); ?>>Todas</option>
            </select>
            <select name="sistema">
                <option value="Escolarizado" <?php echo set_select('sistema', 'Escolarizado'); ?>>Escolarizado</option>
                <option value="Abierto" <?php echo set_select('sistema', 'Abierto'); ?>>Abierto</option>
                <option value="todo" <?php echo set_select('sistema', 'todo', TRUE); ?>>Todos</option>
            </select>
            <select name="trabajo">
                <option value="Actualización" <?php echo set_select('trabajo', 'Actualización'); ?>>Actualización</option>
                <option value="todo" <?php echo set_select('trabajo', 'todo', TRUE); ?>>Todos</option>
            </select>
            <button class="" type="submit" id="">Buscar</button>
        </form>
    </div>
    <div>
        <?php
            foreach ($programas_educativos as $programa_educativo) {
                echo "<div id='" . $programa_educativo->get_id() . "' class='bloque_programa'><label>" . $programa_educativo->get_nombre() . "</label></div>";
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
                default:
                    $contenido = 'Ocurrió un error inesperado';
                break;
            }
            echo('<label>' . $contenido . '</label>');
        }
        if ($clase_usuario == Clase_Usuario::JEFE_DDC) {
            echo "<div id='myModal' class='modal'><div class='modal-content'><div id='espacio_modal'>";
            echo "</div></div></div>";
        }
    ?>
</body>
</html>