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
             $hoy = date('Y-m-d');
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
                $nombre = $_REQUEST['nombre'];
                $apellidos = $_REQUEST['apellidos'];
                $resto = $_REQUEST['total'] - $_REQUEST['importe'];
                $devolver = $_REQUEST['entregado'] - $_REQUEST['importe'];
                mysqli_query($con, "INSERT INTO matClientesTaller (nombre, apellidos, taller) values (
                    '$_REQUEST[nombre]','$_REQUEST[apellidos]', '$_REQUEST[id]')");
                echo "<h2> A devolver: ".$devolver."€</h2>";
                echo "<h3 class='exito'>Se ha apuntado al taller satisfactoriamente</h3>";

                if($_REQUEST['total'] == $_REQUEST['importe']) {
                    mysqli_query($con, "INSERT INTO matPagos (nombre, apellidos, metodo, importe, disciplina, fecha, entregado, devuelto) values (
                                    '$_REQUEST[nombre]','$_REQUEST[apellidos]', '$_REQUEST[metodo]', '$_REQUEST[importe]',
                                    'Taller', '$hoy', '$_REQUEST[entregado]','$devolver')");
                } else {
                    if($resto != $_REQUEST['total']) {
                        mysqli_query($con, "INSERT INTO matPagos (nombre, apellidos, metodo, importe, disciplina, fecha, resto, entregado, devuelto) values (
                            '$_REQUEST[nombre]','$_REQUEST[apellidos]', '$_REQUEST[metodo]', '$_REQUEST[importe]',
                            'Taller', '$hoy', '$resto', '$_REQUEST[entregado]','$devolver')");
                        mysqli_query($con, "INSERT INTO matPagos (nombre, apellidos, importe, disciplina, pendiente) values (
                            '$_REQUEST[nombre]','$_REQUEST[apellidos]', '$resto', 'Taller', 'SI')");
                    } else {
                        mysqli_query($con, "INSERT INTO matPagos (nombre, apellidos, importe, disciplina, pendiente) values (
                            '$_REQUEST[nombre]','$_REQUEST[apellidos]', '$resto', 'Taller', 'SI')");
                    }

                    echo "<h3 class='fracaso'>Puede abonar el taller en pagos pendientes</h3>";
                }
                $verPago = mysqli_query($con, "SELECT id FROM matPagos WHERE nombre = '$_REQUEST[nombre]' AND 
                apellidos = '$_REQUEST[apellidos]' AND disciplina = 'Taller' AND pendiente != 'SI'");
                $rpago = mysqli_fetch_array($verPago);
                $pago = $rpago['id'];
                    if($_REQUEST['importe'] > 0) {
                        ?>
                        <form action="factura.php" method="post">
                        <input type="hidden" name="codigo" value="<?php echo $pago;?>">
                        <input type="hidden" name="operario" value="<?php echo $_SESSION['nombre'];?>">
                        <input type="submit" value="FACTURA" class="submit">
                        </form>
                        <?php
                    }

                   
            ?>
                    <br><br><a href="talleres.php?taller=<?php echo $_REQUEST['id'];?>"><img src="img/atras.png" class="volver">
                                            
        </div>
        <?php
            mysqli_close($con);
        ?>
    </main>
</body>
</html>