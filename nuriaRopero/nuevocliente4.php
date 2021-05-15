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
                <a href="index.php"><img src="img/logo.png" alt="logo"></a>
            </div>
            <div id="menu">
                <ul>
                <li id="opciones"><a href="nuevocliente.php">Nuevo cliente</a></li>
                    <li id="opciones"><a href="clientes.php">Clientes</a></li>
                    <li id="opciones"><a href="clases.php">Clases</a></li>
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
    <main>
        <div id="lienzo"> 
        <?php
    $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
    $query = mysqli_query($con, "UPDATE matClientes SET alergias = '$_REQUEST[alergias]',
    abortos = '$_REQUEST[abortos]', enfermedades = '$_REQUEST[enfermedades]', deportes = '$_REQUEST[deportes]'
    WHERE nombre = '$_REQUEST[nombreForm]' AND apellidos = '$_REQUEST[apellidosForm]'");
    if($query) {
        echo "<h3 class='exito'>Puede hacer el seguimiento del embarazo en la ficha de la clienta.</h3><br>";
    } else {
        echo "<h3 class='fracaso'>Error al completar la ficha de embarazo.</h3><br>";
    }
    mysqli_close($con);
?>
</body>
</html>