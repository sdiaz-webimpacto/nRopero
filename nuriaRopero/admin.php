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
    <a href="tarifas.php"><button class="submit"><h2>Tarifas</h2></button></a>
    <a href="perfiles.php"><button class="submit"><h2>Perfiles</h2></button></a><br>
    <a href="preguntas.php"><button class="submit"><h2>Preguntas</h2></button></a>
    <a href="mail.php"><button class="submit"><h2>eMails</h2></button></a><br>
    <a href="imagenes.php"><button class="submit"><h2>Imagenes</h2></button></a>
    <a href="domiciliaciones.php"><button class="submit"><h2>Domiciliaciones</h2></button></a>
    <p>
<a href="docs/Autorizacion e Informacion normas 2020.pdf">Normas de uso</a> || 
<a href="docs/protección de Datos.pdf">Política de protección de datos</a> || 
<a href="docs/PAR-Q word.pdf">PAR-Q</a> || </p><p>
<a href="docs/Doc 14B modificado 2810 Nuria Ropero.pdf">Protección datos +18</a> ||
<a href="docs/Doc 14F modificado 2810 Nuria Ropero.pdf">Protección dtos -18</a> ||
<a href="docs/COVID-19.pdf">COVID 19</a>
</p>
    </div>
</div>
</main>
</body>
</html>