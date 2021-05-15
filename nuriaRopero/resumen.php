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
        $hoy = date('Y');
        $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
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
            <table class="form">
            <tr><td><h3>AÑO SOBRE EL QUE DESEA HACER LA CONSULTA</h3></td></tr>
            <form action="resumen2.php" method="post">
            <tr><td><select name="ano" id="ano" style="font-size:2em;">
                <option value="<?php echo $hoy; ?>"><?php echo $hoy;?></option>
                <option value="<?php echo ($hoy - 1); ?>"><?php echo ($hoy - 1);?></option>
                <option value="<?php echo ($hoy - 2); ?>"><?php echo ($hoy - 2);?></option>
                </select></td></tr>
                <tr><td><h3>TRIMESTRE</h3></td></tr>
            <tr><td><select name="tri" id="tri" style="font-size:1.3em;">
                <option value="">Todo</option>
                <option value="primero">T1</option>
                <option value="segundo">T2</option>
                <option value="tercero">T3</option>
                <option value="cuarto">T4</option>
                </select></td></tr>
                <tr><td><input type="submit" class="submit" value="CONSULTAR"></td></tr></form>
            </table>
        </div>
    </main>
    <?php 
        mysqli_close($con);
    ?>
</body>
</html>