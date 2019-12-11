<div>
    <div id="guias" class="tags">
        <?php
            foreach ($elemento->get_guias() as $guia) {
                echo "<div class='tag inline centro'>" . $guia . "</div>";
            }
        ?>
    </div>
    <textarea name="<?php echo $elemento->get_nombre();?>" placeholder="<?php echo $elemento->get_instruccion();?>" class="areaTexto"></textarea>
</div>