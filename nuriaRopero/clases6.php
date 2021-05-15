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
            $primero = $_REQUEST['codigo'];
            $ultimo = $_REQUEST['codigo'] + 4;
            $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
            if($_REQUEST['sala'] == '5') {
                $query = mysqli_query($con, "UPDATE matSemtres set nombre = '$_REQUEST[nombre]',
                inicio = '$_REQUEST[inicio]',
                fin = '$_REQUEST[fin]',
                dia = '$_REQUEST[dia]',
                sala = '$_REQUEST[sala]',
                profesor = '$_REQUEST[monitor]',
                aforo = '$_REQUEST[aforo]' WHERE id BETWEEN '$primero' AND '$ultimo'");
            } else {
            $query = mysqli_query($con, "UPDATE matSemtres set nombre = '$_REQUEST[nombre]',
                                                            inicio = '$_REQUEST[inicio]',
                                                            fin = '$_REQUEST[fin]',
                                                            dia = '$_REQUEST[dia]',
                                                            sala = '$_REQUEST[sala]',
                                                            profesor = '$_REQUEST[monitor]',
                                                            aforo = '$_REQUEST[aforo]' WHERE id = '$_REQUEST[codigo]'");}
        if($query) {
            echo "<h3 class='exito'>Los datos de la clase se han modificado con éxito.</h3>";
        } else {
            echo "<h3 class='fracaso'>Ha sido imposible realizar la modificación.</h3>"; 
        }
        ?>
            <a href="clases.php"><img src="img/atras.png" class="volver">
           
       
    </main>
    <?php
    mysqli_close($con);
    ?>
</body>
</html>