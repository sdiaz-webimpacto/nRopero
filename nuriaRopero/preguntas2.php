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
    $update = mysqli_query($con, "UPDATE matPreguntas set p1 = '$_REQUEST[p1]',
                                                p2 = '$_REQUEST[p2]',
                                                p3 = '$_REQUEST[p3]',
                                                p4 = '$_REQUEST[p4]',
                                                p5 = '$_REQUEST[p5]',
                                                p6 = '$_REQUEST[p6]',
                                                p7 = '$_REQUEST[p7]',
                                                p8 = '$_REQUEST[p8]',
                                                p9 = '$_REQUEST[p9]',
                                                p10 = '$_REQUEST[p10]',
                                                p11 = '$_REQUEST[p11]',
                                                p12 = '$_REQUEST[p12]',
                                                p13 = '$_REQUEST[p13]',
                                                p14 = '$_REQUEST[p14]',
                                                p15 = '$_REQUEST[p15]',
                                                p16 = '$_REQUEST[p16]',
                                                p17 = '$_REQUEST[p17]'")
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
        if($update) {
            echo "<h2 class='exito'> Se han modificado con éxito</h2>";
            echo "<a href='admin.php'><img src='img/atras.png' class='volver'>";
        } else {
            echo "<h2 class='fracaso'>Error modificando las preguntas, contacte con su técnico</h2>";
        }
    ?>
    
</div>
</main>
<?php
    $con = mysqli_close($con);
?>
</body>
</html>