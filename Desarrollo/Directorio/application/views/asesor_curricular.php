<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/estilo.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/asesor.css" rel="stylesheet" type="text/css">
</head>
<body class="cuerpo">
    <?php
        $this->load->view('Bloques/titulo', array('titulo' => $programa_educativo->get_nombre()));
    ?>
    <!--boton-->
    <div class="opciones centradoVerticalPadre">
        <h2 class="titulo2 inline">Asignación de asesor curricular</h2>
        <img src="<?php echo base_url() . 'iconos/archivero.svg';?>" class="botonImagen tab"></img>
    </div>
    <div class="panelGrande">
        <div class="izquierdo">
            <h3 class="titulo3">Asesor curricular</h3>
            <div>
                <?php
                    if (isset($asesor)) {
                        $this->load->view('Bloques/asesor', array('asesor' => $asesor));
                    }
                ?>
            </div>
        </div>
        <div class="derecho">
            <div>
                <label class="titulo3">Seleccionar</label>
                <?php echo form_open('Asesor/buscar/', array('id'=>'', 'class'=>'inline'))?>
                    <?php echo form_hidden('id_programa', $programa_educativo->get_id());?>
                    <input type="text" placeholder="Ingresa palabras clave" name="busqueda" value="<?php echo set_value('busqueda');?>"/>
                    <button type="submit">Buscar</button>
                </form>
            </div>
            <div>
                <?php
                    if (isset($usuarios)) {
                        foreach ($usuarios as $usuario) {
                            $this->load->view('Bloques/usuario_asesor', array('usuario' => $usuario, 'programa_educativo' => $programa_educativo));
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <label><?php echo $mensaje;?></label>
</body>
</html>