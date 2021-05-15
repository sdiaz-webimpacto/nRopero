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
<?php
    include("partes/header.php");
    ?>
<body>
<?php
    $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
    $preguntas = mysqli_query($con, "UPDATE matPreguntas set p18 = '$_REQUEST[p18]',
                                                            p19 = '$_REQUEST[p19]',
                                                            p20 = '$_REQUEST[p20]',
                                                            bienvenida = '$_REQUEST[bienvenida]'");
?>
<main>
    <?php 
    if($_GET['salir']) {
        session_destroy();
        header("refresh:0;url='".$archivoActual);
    }
    $archivoActual = $_SERVER['PHP_SELF'];
    echo $_SESSION['nombre']." | ";echo "<a href='".$archivoActual."?salir=1'>SALIR</a>"; ?>
<div id="lienzo" style="background-image:url('img/logo.png'); background-repeat:no-repeat;
                        background-size: cover; background-position: center;">
    <?php
        if($preguntas) {
            echo "<h3 class='exito'>Mensaje cambiado con éxito.</h3>";
        } else {
            echo "<h3 class='frcaso'>No se ha podido modificar el mensaje.</h3>";
        }
    ?>
    <a href='admin.php'><img src='img/atras.png' class='volver'></a>
</div>
</main>
<?php
    $con = mysqli_close($con);
?>
</body>
</html>