<table class="lista">
    <tr>
        <th>Fecha</th>
        <th>Importe</th>
        <th>Cliente</th>
        <th>metodo</th>
    </tr>
    <?php
        WHILE($rPref = mysqli_fetch_array($pref)) {
            echo "<tr>";
            echo "<td>".$rPref['fecha']."</td>";
            echo "<td>".$rPref['importe']."</td>";
            echo "<td>".$rPref['nombre']." ".$rPref['apellidos']."</td>";
            echo "<td>".$rPref['metodo']."</td>";

            echo "</tr>";
        }
        mysqli_free_result($pref);
    ?>
</table>