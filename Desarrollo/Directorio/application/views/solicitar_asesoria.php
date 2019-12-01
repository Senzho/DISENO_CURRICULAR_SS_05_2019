<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/estilo.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/solicitud.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/Solicitud.js"></script>
</head>
<body class="cuerpo">
    <?php echo form_open('Solicitud/registrar',array('id'=>'', 'class'=>''))?>
        <?php echo form_hidden('tipo', 'diseño'); ?>
        <?php echo form_hidden('id', $programa_educativo->get_id()); ?>
        <?php
            $this->load->view('Bloques/titulo', array('titulo' => $programa_educativo->get_nombre(), 'boton_listo' => TRUE));
        ?>
    </form>
    <div class="opciones centradoVerticalPadre">
        <h2 class="titulo2 inline">Solicitud de asesoría</h2>
        <img src="<?php echo base_url() . 'iconos/archivero.svg';?>" class="botonImagen tab"></img>
    </div>
    <div class="panelGrande">
        <div class="izquierdo">
            <div class="tipo" name="diseño">
                <label>Diseño</label>
            </div>
            <div class="tipo" name="actualizacion">
                <label>Actualización</label>
            </div>
        </div>
        <div class="derecho">
            <p id="pDiseño">El diseño de un plan de estudios significa...</p>
            <p id="pActualizacion">La actualización de un plan de estudios significa...</p>
        </div>
    </div>
</body>
</html>