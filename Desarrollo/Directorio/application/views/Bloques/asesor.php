<div class="usuario">
    <div class="centradoVerticalPadre espaciado">
        <label class="dato"><?php echo $asesor->get_nombre();?></label>
        <div id="contenedorOpciones">
            <div id="hijoContenedor" class="hijo centradoVerticalPadre">
                <img src="<?php echo base_url() . 'iconos/editar.svg';?>" class="botonImagen"></img>
                <img src="<?php echo base_url() . 'iconos/eliminar.svg';?>" class="botonImagen tab"></img>
            </div>
        </div>
    </div>
    <div class="centradoVerticalPadre espaciado">
        <label class="dato"><?php echo $asesor->get_correo();?></label>
        <label class="dato"><?php echo $asesor->get_region();?></label>
    </div>
</div>