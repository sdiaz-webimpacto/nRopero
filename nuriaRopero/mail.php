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
    if($_GET['solicitar']) {
        $hoy = date('Y-m-d');
        $query = mysqli_query($con, "SELECT * FROM matClientes WHERE pagar > '0' AND proximo < '$hoy'");
        $titulo = 'Nuria Ropero';
        $mensaje = "
        <html>
        <head>
        <title>HTML email</title>
        </head>
        <body>
        <p>".$row['p18']."</p>
        <table>
        <tr>
        <th><img src='http://pendientines.com/maternity/img/img1.png'></th>
        </tr>
        </table>
        </body>
        </html>
        ";
        $cabeceras = "MIME-Version: 1.0" . "\r\n";
        $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $cabeceras .= "From: Nuria Ropero" . "\r\n";
        $cabeceras .= "Reply-To: mail@mail.com" . "\r\n";
        while($rowpara = mysqli_fetch_array($query)) {
            $para = $rowpara['email'];
            mail($para, $titulo, $mensaje, $cabeceras);
        }
    }
    if($_GET['especial']) {
        $query = mysqli_query($con, "SELECT * FROM matClientes");
        $titulo = 'Maternity Fitness';
        $mensaje = "
        <html>
        <head>
        <title>HTML email</title>
        </head>
        <body>
        <p>".$row['p20']."</p>
        <table>
        <tr><th><img src='http://pendientines.com/maternity/img/img3.png'></th></tr>
        <tr>
        <th><img src='http://pendientines.com/maternity/img/img1.png'></th>
        </tr>
        </table>
        </body>
        </html>
        ";
        $cabeceras = "MIME-Version: 1.0" . "\r\n";
        $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $cabeceras .= "From: Nuria Ropero" . "\r\n";
        $cabeceras .= "Reply-To: mail@mail.com" . "\r\n";
        while($rowpara = mysqli_fetch_array($query)) {
            $para = $rowpara['email'];
            mail($para, $titulo, $mensaje, $cabeceras);
        }
    }
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
    <table class="form">
        <form action="mail2.php" method="post">
            <tr><td><h2>Mensaje pago:<a href="mail.php?solicitar=1"><label class="submit">SOLICITAR</label></a></h2></td></tr>
            <tr><td><textarea col="40" rows="5" name="p18"><?php echo $row['p18']?></textarea></td></tr>
            <tr><td><h2>Mensaje especial:<a href="mail.php?especial=1"><label class="submit">SOLICITAR</label></a></h2></h2></td></tr>
            <tr><td><textarea col="40" rows="5" name="p20"><?php echo $row['p20']?></textarea></td></tr>
            <tr><td><h2>Mensaje cumpleaños:</h2></td></tr>
            <tr><td><textarea col="40" rows="5" name="p19"><?php echo $row['p19']?></textarea></td></tr>
            <tr><td><h2>Bienvenida App:</h2></td></tr>
            <tr><td><textarea col="40" rows="5" name="bienvenida"><?php echo $row['bienvenida']?></textarea></td></tr>
            <tr><td><input type="submit" class="submit" value="CAMBIAR"></td></tr>
        </form>
    </table>
    </div>
</div>
<a href='admin.php'><img src='img/atras.png' class='volver-fuera'></a>
</main>
<?php
    $con = mysqli_close($con);
?>
</body>
</html>