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
    <?php
        if(isset($_REQUEST['subirForm'])) {
            $nombre = $_FILES['archivo']['name'];
            $tipo = $_FILES['archivo']['type'];
            $tamano = $_FILES['archivo']['size'];
            $ruta = $_FILES['archivo']['tmp_name'];
            $destino = "img/".$nombre;
            copy($ruta, $destino);
            $archivoActual = $_SERVER['PHP_SELF'];
            header("refresh:0;url='".$archivoActual);
            echo "<img src='".$destino."'><br>";
        } 
        if($nombre != '') {
            echo "<h3 class='exito'>Se ha cambido la imagen correctamente.</h3>";
            echo "<h3>Esta es su nueva imagen</h3>";
            echo "<img src='".$destino."'><br>";
        } else {
            echo "<h3 class='fracaso'>Ha ocurrido un error, debe volver a leer la instrucciones y probar nuevamente.</h3>";
        }
    ?>
    <a href="javascript:history.back(-1);"><img src="img/atras.png" class="volver">
    </div>
</div>
</main>
</body>
</html>