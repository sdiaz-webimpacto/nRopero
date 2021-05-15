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
    $preguntas = mysqli_query($con, "SELECT * FROM matPreguntas");
    $row = mysqli_fetch_array($preguntas);
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
    <div id="acceso">
    <form action="preguntas2.php" method="post">
    <h3>Preguntas formulario embarazadas</h3>
Pregunta 1: <input type="text" name="p1" value="<?php echo $row['p1'];?>"><br>
Pregunta 2: <input type="text" name="p2" value="<?php echo $row['p2'];?>"><br>
Pregunta 3: <input type="text" name="p3" value="<?php echo $row['p3'];?>"><br>
Pregunta 4: <input type="text" name="p4" value="<?php echo $row['p4'];?>"><br>
Pregunta 5: <input type="text" name="p5" value="<?php echo $row['p5'];?>"><br>
Pregunta 6: <input type="text" name="p6" value="<?php echo $row['p6'];?>"><br>
Pregunta 7: <input type="text" name="p7" value="<?php echo $row['p7'];?>"><br>
Pregunta 8: <input type="text" name="p8" value="<?php echo $row['p8'];?>"><br>
Pregunta 9: <input type="text" name="p9" value="<?php echo $row['p9'];?>"><br>
Pregunta 10: <input type="text" name="p10" value="<?php echo $row['p10'];?>"><br>
Pregunta 11: <input type="text" name="p11" value="<?php echo $row['p11'];?>"><br>
Pregunta 12: <input type="text" name="p12" value="<?php echo $row['p12'];?>"><br>
Pregunta 13: <input type="text" name="p13" value="<?php echo $row['p13'];?>"><br>
Pregunta 14: <input type="text" name="p14" value="<?php echo $row['p14'];?>"><br>
Pregunta 15: <input type="text" name="p15" value="<?php echo $row['p15'];?>"><br>
Pregunta 16: <input type="text" name="p16" value="<?php echo $row['p16'];?>"><br>
Pregunta 17: <input type="text" name="p17" value="<?php echo $row['p17'];?>"><br>
<input type="submit" class="submit" value="ENVIAR">
    </form>
    </div>
</div>
<a href='admin.php'><img src='img/atras.png' class='volver-fuera'></a>
</main>
<?php
    $con = mysqli_close($con);
?>
</body>
</html>