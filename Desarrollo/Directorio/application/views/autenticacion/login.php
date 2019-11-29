<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <link href="<?php echo base_url();?>css/estilo.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/login.css" rel="stylesheet" type="text/css">
</head>
<body class="cuerpo">
    <div id="pagina" class="pagina centradoVerticalPadre">
        <div id="bloqueLogin" class="bloque centradoHorizontal centradoVerticalPadre">
            <div id="bloqueFormulario" class="centradoHorizontal">
                <h1 class="titulo1 textoBlanco centro">Iniciar sesión</h1>
                <?php echo form_open('Autenticacion/iniciar_sesion',array('id'=>'', 'class'=>''))?>
                    <input type="text" id="" class="campoTexto block centradoHorizontal" placeholder="Usuario" required="" autofocus="" name="nick">
                    <input type="password" id="" class="campoTexto block centradoHorizontal" placeholder="Contraseña" required="" name="contraseña">
                    <button class="boton btnMed block centradoHorizontal" type="submit" id="">Ingresar</button>
                </form>
                <a href="" class="block centro">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </div>
    <div>
        <label><?php echo $mensaje;?></label>
    </div>
</body>
</html>