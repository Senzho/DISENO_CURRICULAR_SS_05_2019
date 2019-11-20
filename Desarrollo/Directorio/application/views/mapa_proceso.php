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
        <a href="<?php echo base_url() . 'index.php/Asesor/seleccion/' . $programa_educativo->get_id();?>"><ul>Establecer asesor curricular</ul></a>
        <ul>Establecer colaboradores</ul>
    </li>
    </div>
</body>
</html>