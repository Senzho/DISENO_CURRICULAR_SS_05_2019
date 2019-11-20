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
        <button class="" type="submit" id="">Listo</button>
    </nav>
    <div>
        <h2>Alta de involucrados</h2>
        <button class="" type="button" id="">Documentos</button>
    </div>
    <div>
        <h3>Comisión</h3>
        <div>
            <?php
                if (isset($colaboradores)) {
                    foreach ($colaboradores as $colaborador) {
                        $this->load->view('Bloques/colaborador', array('colaborador' => $colaborador));
                    }
                }
            ?>
        </div>
    </div>
    <div>
        <div>
            <label>Añadir</label>
            <?php echo form_open('Colaboradores/buscar/', array('id'=>'', 'class'=>''))?>
                <?php echo form_hidden('id_programa', $programa_educativo->get_id());?>
                <input type="text" placeholder="Ingresa palabras clave" name="busqueda" value="<?php echo set_value('busqueda');?>"/>
                <button type="submit">Buscar</button>
            </form>
        </div>
        <div>
            <?php
                if (isset($usuarios)) {
                    foreach ($usuarios as $usuario) {
                        $this->load->view('Bloques/usuario_colaboradores', array('usuario' => $usuario, 'programa_educativo' => $programa_educativo));
                    }
                }
            ?>
        </div>
    </div>
    <label><?php echo $mensaje;?></label>
</body>
</html>