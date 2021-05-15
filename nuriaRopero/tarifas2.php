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
    $buscarTarifas = mysqli_query($con, "SELECT * FROM matClases WHERE nombre != '' AND nombre != 'espera' GROUP BY nombre");
    
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
            while($tarifas = mysqli_fetch_array($buscarTarifas)) {
                $precio1 = $_REQUEST[$tarifas['id'].'precio1'];
                $precio2 = $_REQUEST[$tarifas['id'].'precio2'];
                $precio3 = $_REQUEST[$tarifas['id'].'precio3'];
                $precio4 = $_REQUEST[$tarifas['id'].'precio4'];
                $update = mysqli_query($con, "UPDATE matClases SET precio1 = '$precio1',
                                                        precio2 = '$precio2',
                                                        precio3 = '$precio3',
                                                        precio4 = '$precio4' WHERE nombre = '$tarifas[nombre]'");
            }
            if($update) {
                echo "<h2 class='exito'>Se han actualizado los precios correctamente</h2><br><br>";
                echo "<a href='tarifas.php'><img src='img/atras.png' class='volver'></a>";
            } else {
                echo "<h2 class='fracaso'>No se ha podido actualizar la tabla correctamente. Contacte con su técnico</h2><br><br>";
                echo "<a href='tarifas.php'><img src='img/atras.png' class='volver'></a>";
            }
            ?>
        
</div>
</main>
<?php
    $con = mysqli_close($con);
?>
</body>
</html>