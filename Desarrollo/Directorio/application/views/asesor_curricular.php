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
        <h2>Asignación de asesor curricular</h2>
        <button class="" type="button" id="">Documentos</button>
    </div>
    <div>
        <h3>Asesor curricular</h3>
        <div>
            <?php
                if (isset($asesor)) {
                    $this->load->view('Bloques/bloque_asesor', array('asesor' => $asesor));
                }
            ?>
        </div>
    </div>
    <div>
        <div>
            <label>Seleccionar</label>
            <?php echo form_open('Asesor/buscar/', array('id'=>'', 'class'=>''))?>
                <?php echo form_hidden('id_programa', $programa_educativo->get_id());?>
                <input type="text" placeholder="Ingresa palabras clave" name="busqueda" value="<?php echo set_value('busqueda');?>"/>
                <button type="submit">Buscar</button>
            </form>
        </div>
        <div>
            <?php
                if (isset($usuarios)) {
                    foreach ($usuarios as $usuario) {
                        $this->load->view('Bloques/bloque_usuario', array('usuario' => $usuario, 'programa_educativo' => $programa_educativo));
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>