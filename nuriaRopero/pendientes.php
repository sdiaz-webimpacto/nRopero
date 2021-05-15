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
        $pendientes = mysqli_query($con, "SELECT * FROM matPagos WHERE pendiente = 'SI'");
        if($_GET) { 
            if($_GET['busqueda'] != '') {
            $query = mysqli_query($con, "SELECT * FROM matClientes WHERE pagar > '0' AND apellidos LIKE '%".$_GET['busqueda']."%' AND proximo <= '$hoy' || 
            pagar > '0' AND nombre LIKE '%".$_GET['busqueda']."%' AND proximo <= '$hoy' || 
            pagar > '0' AND disciplina LIKE '%".$_GET['busqueda']."%' AND proximo <= '$hoy' ||
            pagar > '0' AND disciplina2 LIKE '%".$_GET['busqueda']."%' AND proximo <= '$hoy' ||
            pagar > '0' AND disciplina3 LIKE '%".$_GET['busqueda']."%' AND proximo <= '$hoy'");
        } else {
            $query = mysqli_query($con, "SELECT * FROM matClientes WHERE pagar > '0' AND proximo <= '$hoy'");
        }}
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
        <h1 class="titulo">Clientes pendientes de pago</h1> 
        <table class="lista">
        <tr><th>Nº</th><th>Cliente</th><th>Ultimo pago</th><th>Por pagar</th><th></th></tr>
        <?php
            while($row = mysqli_fetch_array($query)) {
                if($row['disciplina'] != 'Personal' && $row['disciplina2'] != 'Personal' && $row['disciplina3'] != 'Personal') {
            echo "<tr><td>".$row['id']."</td><td>".$row['nombre']." ".$row['apellidos']."</td>
            <td>";
            if($row['pago'] != '0000-00-00') {
                echo date('d-m-y',strtotime($row['pago']));
            } else {
                echo "Primer mes.";
            }
            echo "</td><td>".$row['pagar']."€</td>
            <td><a href='cobro.php?codigo=".$row['id']."'><p style='background-color:blue;color:white; border-radius:20px; padding:1%;'>€</p></a></td>";
                } else {
                    if($row['bono'] == '0') {
                        echo "<tr><td>".$row['id']."</td><td>".$row['nombre']." ".$row['apellidos']."</td>
                        <td>";
                        if($row['pago'] != '0000-00-00') {
                            echo date('d-m-y',strtotime($row['pago']));
                        } else {
                            echo "Primer mes.";
                        }
                        echo "</td><td>".$row['pagar']."€</td>
                        <td><a href='cobro.php?codigo=".$row['id']."'><p style='background-color:blue;color:white; border-radius:20px; padding:1%;'>€</p></a></td>"; 
                    }
                }

        }
        while($row2 = mysqli_fetch_array($pendientes)) {
            echo "<tr><td>".$row2['id']."</td><td>".$row2['nombre']." ".$row2['apellidos']."</td>
            <td>".$row2['fecha']."</td><td>".$row2['importe']."€</td>
            <td><a href='cobro3.php?id=".$row2['id']."&importe=".$row2['importe']."'><p style='background-color:blue;color:white; border-radius:20px; padding:1%;'>€</p></a></td>";
        }
        ?>
        </table>
        
    </main>
    <?php 
        mysqli_close($con);
    ?>
</body>
</html>