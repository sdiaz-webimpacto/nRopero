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
                            <li id="submenu"><a href="facturacion.php">Facturacion</a></li>
                            <li id="submenu"><a href="resumen.php">Resumen</a></li>
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
            <h1>Fechas de facturación a consultar:</h1>
            <form action="facturacion2.php" method="post" class="formulario">
                <h3>Desde:</h3>
                <input type="date" name="desde"><br>
                <h3>Hasta:</h3>
                <input type="date" name="hasta"><br>
                <h3>Método de pago</h3>
                <select name="metodo">
                <option value="">Todos</option>
                <option value="efectivo">Efectivo</option>
                <option value="tarjeta">Tarjeta</option>
                <option value="bizum">Bizum</option>   
                <option value="transferencia">Transferencia</option>
                <option value="domiciliado">Domiciliado</option> 
        </select><br><br>
                <input type="submit" class="submit" value="consultar">
            </form>
        </div>
</main>
</body>
</html>