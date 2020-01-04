<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/estilo.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/asesor.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/menu.js"></script>
</head>
<body class="cuerpo">
    <?php
        $this->load->view('Bloques/titulo', array('titulo' => $programa_educativo->get_nombre(), 'boton_listo' => TRUE));
    ?>
    <div class="opciones centradoVerticalPadre">
        <h2 class="titulo2 inline">Asignación de asesor curricular</h2>
        <img src="<?php echo base_url() . 'iconos/archivero.svg';?>" class="botonImagen tab"></img>
    </div>
    <div class="panelGrande">
        <div class="izquierdo">
            <h3 class="titulo3">Asesor curricular</h3>
            <div class="lista scrollY">
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
                    <div id="cuadroBusqueda" class="campoBusqueda centradoVerticalPadre">
                        <input type="text" placeholder="Ingresa palabras clave" name="busqueda" value="<?php echo set_value('busqueda');?>" class="campoLimpio"/>
                        <input type="image" alt="submit" value="Buscar" src="<?php echo base_url() . 'iconos/lupa.svg';?>" class="botonImagen"/>
                    </div>
                </form>
            </div>
            <div class="lista scrollY">
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
    <?php
        $this->load->view('Bloques/menu_principal', array('clase' => $usuario_sesion->get_clase_usuario()));
    ?>
</body>
</html>