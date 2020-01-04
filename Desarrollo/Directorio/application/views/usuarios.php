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
        $this->load->view('Bloques/titulo', array('titulo' => 'Personal académico', 'boton_listo' => TRUE));
    ?>
    <div class="opciones centradoVerticalPadre">
        <h2 class="titulo2 inline">Registro y actualización de usuarios</h2>
        <img src="<?php echo base_url() . 'iconos/archivero.svg';?>" class="botonImagen tab"></img>
    </div>
    <div class="panelGrande">
        <div class="izquierdo">
            <h3 class="titulo3"><?php echo isset($usuario) ? "Editar" : "Registrar" ;?></h3>
            <div class="lista">
                <?php echo form_open('Usuarios/' . (isset($usuario) ? "modificar" : "registrar"), array('id'=>'', 'class'=>''))?>
                    <?php
                        if (isset($usuario)) {
                            echo form_hidden('id', $usuario->get_id());
                            echo form_hidden('numero_original', $usuario->get_numero_personal());
                        }
                    ?>
                    <input type="text" id="" class="campoTexto block" placeholder="Numero de personal" required="" name="numero" value="<?php if (isset($usuario)) {echo $usuario->get_numero_personal();};?>"/>
                    <input type="text" id="" class="campoTexto block" placeholder="Nombre" required="" name="nombre" value="<?php if (isset($usuario)) {echo $usuario->get_nombre();};?>"/>
                    <input type="text" id="" class="campoTexto block" placeholder="Correo" required="" name="correo" value="<?php if (isset($usuario)) {echo $usuario->get_correo();};?>"/>
                    <input type="text" id="" class="campoTexto block" placeholder="Cargo" required="" name="cargo" value="<?php if (isset($usuario)) {echo $usuario->get_cargo();};?>"/>
                    <input type="text" id="" class="campoTexto block" placeholder="Región" required="" name="region" value="<?php if (isset($usuario)) {echo $usuario->get_region();};?>"/>
                    <select name="clase" class="combo block">
                        <option value="1" <?php if (isset($usuario)) {if ($usuario->get_clase_usuario() == 1) {echo "selected";}};?>>Colaborador</option>
                        <option value="4" <?php if (isset($usuario)) {if ($usuario->get_clase_usuario() == 4) {echo "selected";}};?>>Jefe del Departamento de Desarrollo Curricular</option>
                        <option value="5" <?php if (isset($usuario)) {if ($usuario->get_clase_usuario() == 5) {echo "selected";}};?>>Director del Área Académica</option>
                        <option value="6" <?php if (isset($usuario)) {if ($usuario->get_clase_usuario() == 6) {echo "selected";}};?>>Solicitante</option>
                        <option value="7" <?php if (isset($usuario)) {if ($usuario->get_clase_usuario() == 7) {echo "selected";}};?>>Observador particular</option>
                    </select>
                    <button type='submit' class='boton btnPeq'>Guardar</button>
                </form>
                <label>El correo es asignado como nombre de usuario y contraseña por default</label>
            </div>
        </div>
        <div class="derecho">
            <h3 class="titulo3">Catálogo</h3>
            <div class="lista scrollY">
                <?php
                    if (isset($usuarios)) {
                        foreach ($usuarios as $usuario) {
                            $this->load->view('Bloques/usuario_personal', array('usuario' => $usuario));
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
        $this->load->view('Bloques/menu_principal', array('clase' => $usuario_sesion->get_clase_usuario()));
    ?>
    <label><?php echo $mensaje;?></label>
</body>
</html>