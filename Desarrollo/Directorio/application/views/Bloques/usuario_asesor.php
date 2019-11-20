<div>
    <div>
        <label><?php echo $usuario->get_nombre();?></label>
        <button type="button">Carga</button>
        <?php echo form_open('Asesor/asignar/', array('id'=>'', 'class'=>''))?>
            <?php echo form_hidden('id_programa', $programa_educativo->get_id());?>
            <?php echo form_hidden('id_usuario', $usuario->get_id());?>
            <button type="submit">Seleccionar</button>
        </form>
    </div>
    <div>
        <label><?php echo $usuario->get_correo();?></label>
        <label><?php echo $usuario->get_region();?></label>
    </div>
</div>