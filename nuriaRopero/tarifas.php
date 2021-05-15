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
                        <h1>TABLA DE PRECIOS</h1>
        
            <table class="lista">
            <tr><th><h3>Disciplina</h3></th>
            <th><h3>1 Clase</h3></th>
            <th><h3>2 Clases</h3></th>
            <th><h3>3 Clases</h3></th>
            <th><h3>4 Clases</h3></th></tr>
            <form action="tarifas2.php" method="post">
             <?php
            while($tarifas = mysqli_fetch_array($buscarTarifas)) {
                echo "<tr><td style='opacity:1;color:#ff0d90;font-weight: bold;'>".$tarifas['nombre']."</td>
                <td style='opacity:1;background-color:#ff0d90'><input style='font-weight: bold;' type='float' name='".$tarifas['id']."precio1' value='".$tarifas['precio1']."'></td>
                <td style='opacity:1;background-color:#ff0d90'><input style='font-weight: bold;' type='float' name='".$tarifas['id']."precio2' value='".$tarifas['precio2']."'></td>
                <td style='opacity:1;background-color:#ff0d90'><input style='font-weight: bold;' type='float' name='".$tarifas['id']."precio3' value='".$tarifas['precio3']."'></td>
                <td style='opacity:1;background-color:#ff0d90'><input style='font-weight: bold;' type='float' name='".$tarifas['id']."precio4' value='".$tarifas['precio4']."'></td></tr>";
            }
            ?></tr>
        </table>
    
        <input type="submit" class="submit" value="ENVIAR">
    </form>
</div>
<a href='admin.php'><img src='img/atras.png' class='volver-fuera'></a>
</main>
<?php
    $con = mysqli_close($con);
?>
</body>
</html>