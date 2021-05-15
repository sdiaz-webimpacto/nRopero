<?php
$datosPref = mysqli_query($con, "SELECT nombre, dia, inicio FROM matClases WHERE nombre != '' AND nombre != 
'espera' ORDER BY nombre, inicio");