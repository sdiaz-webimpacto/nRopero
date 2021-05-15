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
    <header>
    <?php
             $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
             $query = mysqli_query($con, "UPDATE matTaller SET nombre = '$_REQUEST[nombre]',
                                            fecha = '$_REQUEST[fecha]', inicio = '$_REQUEST[inicio]',
                                            fin = '$_REQUEST[fin]', precio ='$_REQUEST[precio]',
                                            aforo = '$_REQUEST[aforo]' WHERE id = '$_REQUEST[id]'");
    ?>
        <div id="cabecera">
            <div id="logo">
                <a href="inicio.php"><img src="img/logo.png" alt="logo"></a>
            </div>
            <div id="menu">
                <ul>
                    <li id="opciones"><a href="nuevocliente.php">Nuevo cliente</a></li>
                    <li id="opciones"><a href="clientes.php">Clientes</a></li>
                    <li id="opciones"><a href="">Clases</a>
                        <ul>
                            <li id="submenu"><a href="clases.php">Clases</a></li>
                            <li id="submenu"><a href="espera.php">Lista Espera</a></li>
                        </ul></li>
                    <li id="opciones"><a href="talleres.php">Talleres</a></li>
                    <li id="opciones"><a href="">Pagos</a>
                        <ul>
                            <li id="submenu"><a href="corrientes.php">Al corriente</a></li>
                            <li id="submenu"><a href="pendientes.php">Pendientes</a></li>
                            <?php if($_SESSION['tipo'] == 'total') { ?>
                            <li id="submenu"><a href="facturacion.php">Facturacion</a></li><li id="submenu"><a href="resumen.php">Resumen</a></li>
                            <?php } ?>
                        </ul></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
    <?php 
    if($_GET['salir']) {
        session_destroy();
        header("refresh:0;url='".$archivoActual);
    }
    $archivoActual = $_SERVER['PHP_SELF'];
    echo $_SESSION['nombre']." | ";echo "<a href='".$archivoActual."?salir=1'>SALIR</a>"; ?>
        <div id="lienzo"> 
            <?php
                if($query) {
                    echo "<h3 class='exito'>Los datos de la clase se han modificado con éxito.</h3>";
                } else {
                    echo "<h3 class='fracaso'>Ha sido imposible realizar la modificación.</h3>"; 
                }
                ?>
                    <br><br><a href="talleres.php"><img src="img/atras.png" class="volver">
                                            
        </div>
        <?php
            mysqli_close($con);
        ?>
    </main>
</body>
</html>