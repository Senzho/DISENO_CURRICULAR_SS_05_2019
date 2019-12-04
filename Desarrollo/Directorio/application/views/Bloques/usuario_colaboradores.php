<div class="usuario">
    <div class="centradoVerticalPadre espaciado">
        <label class="dato"><?php echo $usuario->get_nombre();?></label>
        <div id="contenedorOpciones">
            <div id="hijoContenedor" class="hijo centradoVerticalPadre">
                <div id="contenedorFormulario">
                    <?php echo form_open('Colaboradores/agregar/', array('id'=>'', 'class'=>'centradoVerticalPadre'))?>
                        <?php echo form_hidden('id_programa', $programa_educativo->get_id());?>
                        <?php echo form_hidden('id_usuario', $usuario->get_id());?>
                        <input type="image" alt="submit" value="Añadir" src="<?php echo base_url() . 'iconos/check.svg';?>" class="botonImagen tab"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="centradoVerticalPadre espaciado">
        <label class="dato"><?php echo $usuario->get_correo();?></label>
        <label class="dato"><?php echo $usuario->get_region();?></label>
    </div>
</div>