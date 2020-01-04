<div id="bloqueMenu" class="menu">
    <div class="nav centradoVerticalPadre">
        <img id="menuEnMenu" src="<?php echo base_url() . 'iconos/menu.svg';?>" class="botonImagen"></img>
        <h1 class="titulo1 tab textoBlanco">Menú</h1>
    </div>
    <div class="menuContenido tab">
        <a href="<?php echo base_url() . 'index.php/Inicio/principal';?>">
            <label class="textoBlanco block menuItem">Inicio</label>
        </a>
        <label class="textoBlanco block menuItem">Estadísticas</label>
        <?php
            if ($clase == Clase_Usuario::JEFE_DDC || $clase == Clase_Usuario::DIRECTOR_AREA_ACADEMICA) {
                echo "<a href='" . base_url() ."index.php/Usuarios/lista'>";
                echo "<label class='textoBlanco block menuItem'>Personal académico</label>";
                echo "</a>";
            }
        ?>
        <label class="textoBlanco block menuItem">Proceso</label>
        <label class="textoBlanco block menuItem">Manual de usuario</label>
        <a href="<?php echo base_url() . 'index.php/Autenticacion/cerrar_sesion';?>">
            <label class="textoBlanco block menuItem">Cerrar sesión</label>
        </a>
    </div>
</div>