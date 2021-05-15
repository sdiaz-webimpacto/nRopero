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
        <form action="nuevotaller2.php" method="post" class="formulario">
            <table class="form">
                <tr><td><h3>Nombre:</h3></td></tr>
                <tr><td><input type="text" name="nombre" pattern="[a-zA-Z0-9 áéíóú-_/@]{3,}" required></td></tr>
                <tr><td><h3>Fecha:</h3></td></tr>
                <tr><td><input type="date" name="fecha" required></td></tr>
                <tr><td><h3>Hora Inicio:</h3></td></tr>
                <tr><td><input type="time" name="inicio" required></td></tr>
                <tr><td><h3>Hora Fin:</h3></td></tr>
                <tr><td><input type="time" name="fin" required></td></tr>
                <tr><td><h3>Precio:</h3></td></tr>
                <tr><td><input type="float" name="precio" required></td></tr>
                <tr><td><h3>Aforo:</h3></td></tr>
                <tr><td><input type="number" name="aforo" required></td></tr>
                <tr><td><input type="submit" value="REGISTRAR" class="submit"></td></tr>
                </table>
               
            
        </form>
        </div>
    </main>
</body>
</html>