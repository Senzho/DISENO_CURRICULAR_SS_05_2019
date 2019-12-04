<nav class="nav centradoVerticalPadre espaciado">
    <div class="centradoVerticalPadre">
        <img id="menu" src="<?php echo base_url() . 'iconos/menu.svg';?>" class="botonImagen"></img>
        <h1 class="titulo1 textoNegro tab"><?php echo $titulo;?></h1>
    </div>
    <?php
        if ($boton_listo) {
            echo "<button type='submit' class='boton btnPeq'>Listo</button>";
        }
    ?>
</nav>