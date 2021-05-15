<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maternity-fitness App</title>
    <link href="css/estilo.css" rel="stylesheet" media="">
    <link rel="icon" href="img/favicon.png">
    <!--color: ff0d90-->
</head>
<body>
    <header>
        <div id="cabecera">
            <div id="logo">
                <img src="img/logo.png" alt="logo">
            </div>
            <div id="menu">
                <ul>
                    <li id="opciones"><a href="nuevocliente.php">Nuevo cliente</a></li>
                    <li id="opciones"><a href="clientes.php">Clientes</a></li>
                    <li id="opciones"><a href="clases.php">Clases</a></li>
                    <li id="opciones"><a href="talleres.php">Talleres</a></li>
                    <li id="opciones"><a href="">Pagos</a>
                        <ul>
                            <li id="submenu"><a href="corrientes.php">Al corriente</a></li>
                            <li id="submenu"><a href="pendientes.php">Pendientes</a></li>
                            <li id="submenu"><a href="facturacion.php">Facturacion</a></li>
                        </ul></li>
                </ul>
            </div>
        </div>
    </header>
    <?php
        $desde = $_REQUEST['desde'];
        $hasta = $_REQUEST['hasta'];
        $metodo = $_REQUEST['metodo'];
        $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
    ?>
    <main>
        <div id="lienzo"> 
            <h1>Fechas de facturación a consultar:</h1>
            <form action="facturacion2.php" method="post" class="formulario">
               
                <input type="submit" class="submit" value="consultar">
            </form>
        </div>
</main>
</body>
</html>