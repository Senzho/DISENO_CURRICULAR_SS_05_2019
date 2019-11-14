<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
</head>
<body>
    <nav>
        <button class="" type="button" id="">Menú</button>
        <h1>Proyectos curriculares</h1>
    </nav>
    <div>
        <button class="" type="button" id="">Nuevo programa</button>
        <button class="" type="button" id="">Solicitudes</button>
    </div>
    <div>
        <?php echo form_open('Inicio/principal',array('id'=>'', 'class'=>''))?>
            <select name="areaAcademica">
                <option value="Económico - administrativa">Económico - administrativa</option>
                <option value="todo" selected>Todas</option>
            </select>
            <select name="region">
                <option value="Xalapa">Xalapa</option>
                <option value="Orizaba">Orizaba</option>
                <option value="todo" selected>Todas</option>
            </select>
            <select name="sede">
                <option value="Xalapa">Xalapa</option>
                <option value="todo" selected>Todas</option>
            </select>
            <select name="sistema">
                <option value="Escolarizado">Escolarizado</option>
                <option value="Abierto">Abierto</option>
                <option value="todo" selected>Todos</option>
            </select>
            <select name="trabajo">
                <option value="Actualización">Actualización</option>
                <option value="todo" selected>Todos</option>
            </select>
            <button class="" type="submit" id="">Buscar</button>
        </form>
    </div>
    <div>
        <?php
            foreach ($programas_educativos as $programa_educativo) {
                echo '<div><label>' . $programa_educativo->get_nombre() . '</label></div>';
            }
        ?>
    </div>
</body>
</html>