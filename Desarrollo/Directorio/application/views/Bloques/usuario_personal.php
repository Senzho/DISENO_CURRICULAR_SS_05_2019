<div class="usuario">
    <div class="centradoVerticalPadre espaciado">
        <label class="dato"><?php echo $usuario->get_nombre();?></label>
        <div id="contenedorOpciones">
            <div id="hijoContenedor" class="hijo centradoVerticalPadre">
                <div id="contenedorFormulario">
                    <?php echo form_open('Usuarios/lista/' . $usuario->get_id(), array('id'=>'', 'class'=>'centradoVerticalPadre'))?>
                        <input type="image" alt="submit" value="Añadir" src="<?php echo base_url() . 'iconos/editar.svg';?>" class="botonImagen tab"/>
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