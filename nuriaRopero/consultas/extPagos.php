<?php
$pref = mysqli_query($con, "SELECT fecha, importe, nombre, apellidos, metodo FROM matPagos WHERE fecha BETWEEN '$desde' AND '$hasta' order by fecha");