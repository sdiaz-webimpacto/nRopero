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
    $query = mysqli_query($con, "INSERT INTO matPerfiles (user, cont, nombre, apellidos, tipo) values 
                        ('$_REQUEST[user]','$_REQUEST[user]','$_REQUEST[nombre]','$_REQUEST[apellidos]','$_REQUEST[tipo]')");
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
        if($query) {
            echo "<h3 class='exito'>Perfil creado con éxito.</h3><br>";
            echo "<a href='admin.php'><img src='img/atras.png' class='volver'>";
        } else {
            echo "<h3 class='fracaso'>Error creando el perfil.</h3><br>";
            echo "<a href='admin.php'><img src='img/atras.png' class='volver'>";
        }
    ?>
    
</div>
</main>
<?php
    $con = mysqli_close($con);
?>
</body>
</html>