<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
</head>
<body>
    <div>
        <h1>Iniciar Sesión</h1>
        <?php echo form_open('Autenticacion/iniciar_sesion',array('id'=>'', 'class'=>''))?>
            <label for="nick" class="">Usuario</label>
            <input type="text" id="" class="" placeholder="Usuario" required="" autofocus="" name="nick">
            <label for="contraseña" class="nly">Contraseña</label>
            <input type="password" id="" class="" placeholder="Contraseña" required="" name="contraseña">
            <button class="" type="submit" id="">Ingresar</button>
        </form>
        <a href="">¿Olvidaste tu contraseña?</a>
    </div>
    <div>
        <label><?php echo $mensaje;?></label>
    </div>
</body>
</html>