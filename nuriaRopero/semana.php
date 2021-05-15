<?php
session_start()
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maternity-fitness App</title>
    <link href="css/estilo.css" rel="stylesheet" media="">
    <link rel="icon" href="img/favicon.png">
    <?php if (isset($_SESSION['usuario'])) {echo "";} else {echo "<meta http-equiv='refresh' content='0,URL=index.html'>";}?>
    <!--color: ff0d90-->
</head>
<body>
    <?php
    include("partes/header.php");
    ?>
    <?php
        $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
        $archivoActual = $_SERVER['PHP_SELF'];
        mysqli_query($con, "DROP TABLE matSemActual");
        mysqli_query($con, "DROP TABLE matSemActualAlumnos");
        $pasarSemana = mysqli_query($con, "CREATE TABLE matSemActual AS SELECT * FROM matSemUno");
        mysqli_query($con, "CREATE TABLE matSemActualAlumnos AS SELECT * FROM matSemUnoAlumnos");
        mysqli_query($con, "DROP TABLE matSemUno");
        mysqli_query($con, "DROP TABLE matSemUnoAlumnos");
        mysqli_query($con, "CREATE TABLE matSemUno AS SELECT * FROM matClases");
        mysqli_query($con, "CREATE TABLE matSemUnoAlumnos AS SELECT * FROM matClientes");
        $buscarEmbarazo = mysqli_query($con, "SELECT * FROM matClientes WHERE semanas != '0' AND semanas < '40'");
        mysqli_query($con, "UPDATE matSemActualAlumnos set semanas = '(semanas + 1)' WHERE semanas != '0' AND semanas < '40'");
        mysqli_query($con, "UPDATE matSemUnoAlumnos set semanas = '(semanas + 1)' WHERE semanas != '0' AND semanas < '40'");

        while($embarazo = mysqli_fetch_array($buscarEmbarazo)) {
            $semana = ($embarazo['semanas'] + '1');
            echo $semana;
            mysqli_query($con, "UPDATE matClientes SET semanas = '$semana' WHERE id = '$embarazo[id]'");
        }
    ?>
    <main>
    <?php 
    if($_GET['salir']) {
        session_destroy();
        header("refresh:0;url='".$archivoActual);
    }
    echo $_SESSION['nombre']." | ";echo "<a href='".$archivoActual."?salir=1'>SALIR</a>"; ?>
        <div id="lienzo">
           <?php
                if($pasarSemana) {
                    echo "<h2 class='exito'>Se han actualizado las clases: La semana proxima 
                    ha pasado a ser la actual y se ha creado una semana próxima según los criterios de la MATRIZ</h2><br>";
                    mysqli_query($con, "UPDATE matClientes set bono = (bono - '2') WHERE disciplina = 'Personal2' || 
                    disciplina2 = 'Personal2' || disciplina3 = 'Personal2'");
                    mysqli_query($con, "UPDATE matClientes set bono = (bono - '1') WHERE disciplina = 'Personal1' || 
                    disciplina2 = 'Personal1' || disciplina3 = 'Personal1'");
                } else {
                    echo "<h2 class='fracaso'>Ha ocurrido un error y no se ha podido actualizar la seman. Contacte con
                    su equipo técnico.</h2><br>";
                }
           ?>
           <a href="clases.php"><img src="img/atras.png" class="volver">
        </div>
    </main>
    <?php 
        mysqli_close($con);
    ?>
</body>
</html>