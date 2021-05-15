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
    <?php
        $hoy = date('Y-m-d');
        $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
        if($_GET) { 
            $query = mysqli_query($con, "SELECT * FROM matClientes WHERE apellidos LIKE '%".$_GET['busqueda']."%' AND proximo > '$hoy' || nombre LIKE '%".$_GET['busqueda']."%' AND proximo > '$hoy' || pagar = '0'");
            } else {
                $query = mysqli_query($con, "SELECT * FROM matClientes WHERE proximo > '$hoy' || pagar = '0'");  
            }
    ?>
    <main>
    <?php 
    if($_GET['salir']) {
        session_destroy();
        header("refresh:0;url='".$archivoActual);
    }
    $archivoActual = $_SERVER['PHP_SELF'];
    echo $_SESSION['nombre']." | ";echo "<a href='".$archivoActual."?salir=1'>SALIR</a>"; ?>
    <table class="buscador">
            <tr><td><img src="img/lupa.png" alt="lupa"></td>
                <td><form action="" method="get" id="busca">
                    <input type="text" name="busqueda" id="busqueda">
                    <input type="submit" value="buscar">
                    </form></td></tr>
        </table>
        <h1 class="titulo">Clientes al corriente de pago</h1>         
        <table class="lista">
        <tr><th>Nº</th><th>Cliente</th><th>Ultimo pago</th><th></th></tr>
    <?php
        while($row = mysqli_fetch_array($query)) {
            echo "<tr><td>".$row['id']."</td><td>".$row['nombre']." ".$row['apellidos']."</td>
            <td>".$row['pago']."</td><td><a href='ficha.php?codigo=".$row['id']."'><img src='img/ficha.png'></a></td>";
        }
    ?>
        </table>
        
    </main>
    <?php 
        mysqli_close($con);
    ?>
</body>
</html>