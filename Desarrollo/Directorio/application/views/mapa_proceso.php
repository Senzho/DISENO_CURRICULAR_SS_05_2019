<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head></head>
<body>
    <nav>
        <button class="" type="button" id="">Menú</button>
        <h1><?php echo $programa_educativo->get_nombre();?></h1>
        <button class="" type="button" id="">Listo</button>
    </nav>
    <div>
    <li>
        <?php
            if ($clase_usuario == Clase_Usuario::JEFE_DDC) {
                echo "<a href='" . base_url() . "index.php/Asesor/seleccion/" . $programa_educativo->get_id() . "'>";
                echo "<ul>Establecer asesor curricular</ul></a>";
            } else {
                echo "<ul>Establecer asesor curricular</ul>";
            }
            if ($clase_usuario == Clase_Usuario::ASESOR_CURRICULAR) {
                echo "<ul>Establecer colaboradores</ul>";
            }
        ?>
        <a href="<?php echo base_url() . 'index.php/Colaboradores/seleccion/' . $programa_educativo->get_id();?>"><ul>Establecer colaboradores</ul></a>
    </li>
    </div>
</body>
</html>