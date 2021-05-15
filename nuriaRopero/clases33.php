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
    <main>
    <?php 
    if($_GET['salir']) {
        session_destroy();
        header("refresh:0;url='".$archivoActual);
    }
    $archivoActual = $_SERVER['PHP_SELF'];
    echo $_SESSION['nombre']." | ";echo "<a href='".$archivoActual."?salir=1'>SALIR</a>"; ?>
        <?php
        $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
             $campo = mysqli_query($con, "SELECT * FROM matSemActualAlumnos WHERE id = '$_REQUEST[nuevoNombre]'");
             $rcampo = mysqli_fetch_array($campo);
             if($rcampo['disciplina'] == $_REQUEST['nombreCurso']) {
             if($rcampo['dia1'] == '0') {
                 $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia1 = '$_REQUEST[codigo]' WHERE id = '$_REQUEST[nuevoNombre]'");
             } else if($rcampo['dia2'] == '0') {
                 $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia2 = '$_REQUEST[codigo]' WHERE id = '$_REQUEST[nuevoNombre]'");
             } else if($rcampo['dia3'] == '0') {
                 $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia3 = '$_REQUEST[codigo]' WHERE id = '$_REQUEST[nuevoNombre]'");
             } else if($rcampo['dia4'] == '0') {
                $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia4 = '$_REQUEST[codigo]' WHERE id = '$_REQUEST[nuevoNombre]'");
            } else {echo "<h2 class='fracaso'>El alumno tiene cubiertas todas las clases de su bono.</h2>";}}
            else if($rcampo['disciplina2'] == $_REQUEST['nombreCurso']) {
             if($rcampo['dia5'] == '0') {
                 $borrado=  mysqli_query($con, "UPDATE matSemActualAlumnos set dia5 = '$_REQUEST[codigo]' WHERE id = '$_REQUEST[nuevoNombre]'");
             } else if($rcampo['dia6'] == '0') {
                 $borrado=  mysqli_query($con, "UPDATE matSemActualAlumnos set dia6 = '$_REQUEST[codigo]' WHERE id = '$_REQUEST[nuevoNombre]'");
             } else if($rcampo['dia7'] == '0') {
                 $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia7 = '$_REQUEST[codigo]' WHERE id = '$_REQUEST[nuevoNombre]'");
             } else if($rcampo['dia8'] == '0') {
                $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia8 = '$_REQUEST[codigo]' WHERE id = '$_REQUEST[nuevoNombre]'");
            } else {echo "<h2 class='fracaso'>El alumno tiene cubiertas todas las clases de su bono.</h2>";}}
             else if($rcampo['disciplina3'] == $_REQUEST['nombreCurso']) {
             if($rcampo['dia9'] == '0') {
                 $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia9 = '$_REQUEST[codigo]' WHERE id = '$_REQUEST[nuevoNombre]'");
             } else if($rcampo['dia10'] == '0') {
                 $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia10 = '$_REQUEST[codigo]' WHERE id = '$_REQUEST[nuevoNombre]'");
             } else if($rcampo['dia11'] == '0') {
                 $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia11 = '$_REQUEST[codigo]' WHERE id = '$_REQUEST[nuevoNombre]'");
             } else if($rcampo['dia12'] == '0') {
                $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia12 = '$_REQUEST[codigo]' WHERE id = '$_REQUEST[nuevoNombre]'");
            } else {echo "<h2 class='fracaso'>El alumno tiene cubiertas todas las clases de su bono.</h2>";}}
        if($borrado) {
            echo "<h3 class='exito'>Los datos de la clase se han modificado con éxito.</h3>";
        } else {
            echo "<h3 class='fracaso'>Ha sido imposible realizar la modificación.</h3>"; 
        }
        ?>
            <a href="clases.php?codigo=<?php echo $_REQUEST['codigo'];?>&semana=matSemActual"><img src="img/atras.png" class="volver-fuera">
           
       
    </main>
    <?php
    mysqli_close($con);
    ?>
</body>
</html>