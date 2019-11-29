<div id="<?php $solicitud->get_id();?>" class="bloque_asesoria asesoria centradoVerticalPadre">
    <div id="panel" class="datos inline bordeAsesoria">
        <div id="contenedorPanel" class="opcionesHijo centradoVerticalPadre">
            <div id="datos" class="datos inline">
                <label class="dato"><?php echo $programa_educativo->get_nombre() . " - " . $tipo;?></label>
                <div class="centradoVerticalPadre">
                    <label class="dato"><?php echo $usuario->get_nombre();?></label>
                    <a href="#" class="popover-test" title="<?php echo $usuario->get_cargo() . ' - ' . $usuario->get_region();?>"><img src="<?php echo base_url() . 'iconos/silla.svg';?>" class="botonImagen tab"></img></a>
                </div>
                <label class="dato"><?php echo $usuario->get_correo();?></label>
            </div>
            <div id="documento" class="opcionesAsesoria inline">
                <div id="opcionesHijo" class="opcionesHijo centradoVerticalPadre">
                    <div id="contenedorDocumento" class="centradoHorizontal">
                        <img src="<?php echo base_url() . 'iconos/docx.svg';?>" class="iconoDocumento"></img>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="opciones" class="opcionesAsesoria inline">
        <div id="opcionesHijo" class="opcionesHijo centradoVerticalPadre">
            <div id="contenedorOpciones" class="centradoHorizontal">
                <a href="<?php echo base_url() . 'index.php/Solicitud/aprobar/' . $solicitud->get_id();?>">
                    <img src="<?php echo base_url() . 'iconos/check.svg';?>" class="botonImagen block"></img>
                </a>
                <img src="<?php echo base_url() . 'iconos/cruz.svg';?>" class="botonImagen block"></img>
            </div>
        </div>
    </div>
</div>