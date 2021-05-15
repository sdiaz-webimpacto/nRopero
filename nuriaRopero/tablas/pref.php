<table class="lista">
    <tr>
        <th>Alumn@</th>
        <th>Alta</th>
        <th>Telefono</th>
        <th>eMail</th>
        <th>Disciplina</th>
        <th>Disciplina 2</th>
        <th>Disciplina 3</th>
    </tr>
    <?php
        WHILE($rPref = mysqli_fetch_array($pref)) {
            echo "<tr>";

            echo "<td>".$rPref['nombre']." ".$rPref['apellidos']."</td>";
            echo "<td>".$rPref['alta']."</td>";
            echo "<td>".$rPref['telefono']."</td>";
            echo "<td>".$rPref['email']."</td>";
            echo "<td>".$rPref['disciplina']."</td>";
            echo "<td>".$rPref['disciplina2']."</td>";
            echo "<td>".$rPref['disciplina3']."</td>";

            echo "</tr>";
        }
        mysqli_free_result($pref);
    ?>
</table>