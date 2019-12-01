<div class="usuario">
    <div class="centradoVerticalPadre">
        <label class="dato"><?php echo $usuario->get_nombre();?></label>
        <div id="contenedorOpciones" class="inline derecha">
            <div id="hijoContenedor" class="hijo centradoVerticalPadre">
                <img src="<?php echo base_url() . 'iconos/carga.svg';?>" class="botonImagen"></img>
                <div id="contenedorFormulario" class="inline">
                    <?php echo form_open('Asesor/asignar/', array('id'=>'', 'class'=>'centradoVerticalPadre'))?>
                        <?php echo form_hidden('id_programa', $programa_educativo->get_id());?>
                        <?php echo form_hidden('id_usuario', $usuario->get_id());?>
                        <input type="image" alt="submit" value="Seleccionar" src="<?php echo base_url() . 'iconos/check.svg';?>" class="botonImagen tab"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <label class="dato"><?php echo $usuario->get_correo();?></label>
        <label class="dato derecha"><?php echo $usuario->get_region();?></label>
    </div>
</div>