<nav class="nav centradoVerticalPadre">
    <!-- <a href="" class="centradoVerticalPadre"> -->
        <img id="menu" src="<?php echo base_url() . 'iconos/menu.svg';?>" class="botonImagen"></img>
    <!-- </a> -->
    <h1 class="titulo1 textoNegro tab"><?php echo $titulo;?></h1>
    <?php
        if ($boton_listo) {
            echo "<button type='submit' class='boton btnPeq derecha'>Listo</button>";
        }
    ?>
</nav>