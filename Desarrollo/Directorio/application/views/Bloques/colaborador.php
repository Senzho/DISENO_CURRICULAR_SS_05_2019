<div class="usuario">
    <div class="centradoVerticalPadre">
        <label class="dato"><?php echo $colaborador->get_nombre();?></label>
        <div id="contenedorOpciones" class="inline derecha">
            <div id="hijoContenedor" class="hijo centradoVerticalPadre">
                <a href="#" class="popover-test" title="<?php echo $colaborador->get_cargo() . ' - ' . $colaborador->get_region();?>"><img src="<?php echo base_url() . 'iconos/silla.svg';?>" class="botonImagen tab"></img></a>
                <img src="<?php echo base_url() . 'iconos/eliminar.svg';?>" class="botonImagen tab"></img>
            </div>
        </div>
    </div>
    <div>
        <label class="dato"><?php echo $colaborador->get_correo();?></label>
        <label class="dato derecha"><?php echo $colaborador->get_region();?></label>
    </div>
</div>