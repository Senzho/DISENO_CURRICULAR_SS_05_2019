<div>
    <div id="guias" class="tags">
        <?php
            foreach ($elemento->get_guias() as $guia) {
                echo "<div class='tag inline centro'>" . $guia . "</div>";
            }
        ?>
    </div>
    <table id="tabla">
        <?php
            echo "<tr>";
            $ancho = 100 / count($elemento->get_columnas());
            foreach ($elemento->get_columnas() as $columna) {
                echo "<th style='width: " . $ancho . ";'>" . $columna->get_nombre() . "</th>";
            }
            echo "</tr>";
            for ($i = 0; $i < 6; $i ++) {
                echo "<tr>";
                foreach ($elemento->get_columnas() as $columna) {
                    echo "<td style='width: " . $ancho . ";'><input type='text' class='campoTransparente' /></td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</div>