<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/Solicitud.js"></script>
</head>
<body>
    <nav>
        <button class="" type="button" id="">Menú</button>
        <h1><?php echo $programa_educativo->get_nombre();?></h1>
        <?php echo form_open('Asesoria/registrar',array('id'=>'', 'class'=>''))?>
            <?php echo form_hidden('tipo', 'diseño'); ?>
            <?php echo form_hidden('id', $programa_educativo->get_id()); ?>
            <button class="" type="submit" id="">Listo</button>
        </form>
    </nav>
    <div>
        <h2>Solicitud de asesoría</h2>
        <button class="" type="button" id="">Documentos</button>
    </div>
    <div>
        <div>
            <div class="tipo" name="diseño">
                <label>Diseño</label>
            </div>
            <div class="tipo" name="actualizacion">
                <label>Actualización</label>
            </div>
        </div>
        <div>
            <p id="pDiseño">El diseño de un plan de estudios significa...</p>
            <p id="pActualizacion">La actualización de un plan de estudios significa...</p>
        </div>
    </div>
</body>
</html>