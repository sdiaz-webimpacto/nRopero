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
    <h2>Imagenes en los email.</h2>
    <h3>Selección actual:</h3>
    <div class="imagen">Logo</div><div class="imagen">Cumpleaños</div><div class="imagen">Especial</div>
    <div style="width:100%;"><img src="img/img1.png" class='imagen'><img src="img/img2.png" class='imagen'><img src="img/img3.png" class='imagen'></div>
    <h2>Modificar imagenes:</h2>
    <p class="exito">Para cambiar las imagenes deben subirse en PNG, con un ancho máximo de 250px.
                    Para cambiar el logo, el archivo debe llamarse img1, la de cumpleaños img2 y la especial img3</p>
    <form action="imagenes2.php" method="post" enctype="multipart/form-data" class="formulario">
        <input type="file" name="archivo"><br><br>
	    <input type="submit" value="Subir" name="subirForm" class="submit"/>
    </form>
    </div>
</div>
<a href="admin.php"><img src="img/atras.png" class="volver-fuera">
</main>
</body>
</html>