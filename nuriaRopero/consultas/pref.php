<?php
$pref = mysqli_query($con, "SELECT nombre, apellidos, telefono, email, disciplina, disciplina2, disciplina3, alta 
FROM matClientes WHERE alta BETWEEN '$desde' AND '$hasta' order by alta");