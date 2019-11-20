<div>
    <div>
        <label><?php echo $usuario->get_nombre();?></label>
        <?php echo form_open('Colaboradores/agregar/', array('id'=>'', 'class'=>''))?>
            <?php echo form_hidden('id_programa', $programa_educativo->get_id());?>
            <?php echo form_hidden('id_usuario', $usuario->get_id());?>
            <button type="submit">Añadir</button>
        </form>
    </div>
    <div>
        <label><?php echo $usuario->get_correo();?></label>
        <label><?php echo $usuario->get_region();?></label>
    </div>
</div>