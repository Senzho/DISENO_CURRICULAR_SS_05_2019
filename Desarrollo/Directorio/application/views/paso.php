<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/estilo.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/paso.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/menu.js"></script>
</head>
<body>
    <?php
        $this->load->view('Bloques/titulo', array('titulo' => $programa_educativo->get_nombre(), 'boton_listo' => TRUE));
    ?>
    <div class="opciones centradoVerticalPadre">
        <h2 class="titulo2 inline"><?php echo $paso->get_nombre();?></h2>
        <img src="<?php echo base_url() . 'iconos/archivero.svg';?>" class="botonImagen tab"></img>
        <img src="<?php echo base_url() . 'iconos/ayuda.svg';?>" class="botonImagen tab"></img>
        <img src="<?php echo base_url() . 'iconos/comentarios.svg';?>" class="botonImagen tab"></img>
        <img src="<?php echo base_url() . 'iconos/aprobacion.svg';?>" class="botonImagen tab"></img>
    </div>
    <div class="panelGrande scrollY">
        <?php
            foreach ($paso->get_elementos() as $elemento){
                $tipo = $elemento->get_tipo();
                if ($tipo == Tipo_Elemento::CUADRO_TEXTO) {
                    $this->load->view('Bloques/cuadro', array('elemento' => $elemento));
                } else if ($tipo == Tipo_Elemento::TABLA) {
                    $this->load->view('Bloques/tabla', array('elemento' => $elemento));
                }
            }
        ?>
    </div>
    <?php
        $this->load->view('Bloques/menu_principal');
    ?>
</body>
</html>