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
        <div id="lienzo"> 
        <?php
            $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
            $query = mysqli_query($con, "INSERT INTO matTaller (nombre, fecha, inicio, fin, precio, aforo)
                        values ('$_REQUEST[nombre]','$_REQUEST[fecha]','$_REQUEST[inicio]','$_REQUEST[fin]',
                        '$_REQUEST[precio]','$_REQUEST[aforo]')");
            if($query) {
                echo "<h2 class='exito'>Se ha creado el taller correctamente.</h2>";
            } else {
                echo "<h2 class='fracaso'>No se ha podido crear el taller.</h2>";
            }
        ?>
        <a href="nuevotaller.php"><img src="img/atras.png" class="volver">
        </div>
    </main>
</body>
</html>