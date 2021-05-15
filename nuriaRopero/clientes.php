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
    <main>
    <?php 
    if($_GET['salir']) {
        session_destroy();
        header("refresh:0;url='".$archivoActual);
    }
    $archivoActual = $_SERVER['PHP_SELF'];
    echo $_SESSION['nombre']." | ";echo "<a href='".$archivoActual."?salir=1'>SALIR</a>"; ?>
        <h1 class="titulo">Listado de clientes</h1>
        <?php
         $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
         $numero = '1';
         $disciplina = mysqli_query($con, "SELECT * FROM matClases WHERE nombre != '' AND nombre != 'espera' GROUP BY nombre");
         echo "<h3 style='background-color:white;color:#1a1a18;'>Clientes por disciplina</h3>";
         while($rd = mysqli_fetch_array($disciplina)) {
             $rdo = mysqli_query($con, "SELECT COUNT(id) as 'cuenta' FROM matClientes WHERE disciplina = '$rd[nombre]' || 
             disciplina2 = '$rd[nombre]' || disciplina3 = '$rd[nombre]'");
             $rrdo = mysqli_fetch_array($rdo);
             echo "<a href='clientes.php?busqueda=".$rd['nombre']."'><h3 class='sexto'>".$rd['nombre'].":".$rrdo['cuenta']."</h3></a>";
             $numero++;
         }
         $countApuntados = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes");
         $apuntados = mysqli_fetch_array($countApuntados);

         echo "<h3 class='sexto'>Total:".$apuntados['total']."</h3>";

        ?>
        <table class="buscador">
            <tr><td><img src="img/lupa.png" alt="lupa"></td><td><form action="" method="get" id="busca"><input type="text" name="busqueda" id="busqueda"><input type="submit" value="buscar"></form></td></tr>
        </table>
         
        <table class="lista">
        <tr><th>Cliente</th><th>Ultimo pago</th><th></th></tr>
            <?php
            if($_GET) {
           if($_GET['busqueda'] == '') {
            $query = mysqli_query($con, "SELECT * FROM matClientes WHERE disciplina = '' AND disciplina2 = '' AND disciplina3 = '' ORDER BY apellidos");
           } else { 
            $query = mysqli_query($con, "SELECT * FROM matClientes WHERE apellidos LIKE '%".$_GET['busqueda']."%' || nombre LIKE '%".$_GET['busqueda']."%'
            || disciplina LIKE '%".$_GET['busqueda']."%' || disciplina2 LIKE '%".$_GET['busqueda']."%' || disciplina3 LIKE '%".$_GET['busqueda']."%' ORDER BY apellidos");
            }} else {
            $query = mysqli_query($con, "SELECT * FROM matClientes ORDER BY apellidos");   
            }
            while($row = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>".$row['nombre']." ".$row['apellidos']."</td>";
                echo "<td>";
                if($row['pago'] != '0000-00-00') {
                    echo date('d-m-y',strtotime($row['pago']));
                } else {
                    echo "Primer mes.";
                }
                echo "</td>";
                echo "<td><a href='ficha.php?codigo=".$row['id']."'><img src='img/ficha.png'></a></td>";
                $comprobacion = mysqli_query($con, "SELECT COUNT(*) as total FROM matPeso WHERE id = '$row[id]'");
                $total = mysqli_fetch_array($comprobacion);
                if($row['disciplina'] == 'Embarazo' || $row['disciplina2'] == 'Embarazo' || $row['disciplina3'] == 'Embarazo') {
                    echo "<td><a href='seguimiento.php?id=".$row['id']."'><img src='img/seg.png'></a></td>";
                } else if($total['total'] >= '1') {
                    echo "<td><a href='seguimiento.php?id=".$row['id']."'><img src='img/seguimiento.png'></a></td>";
                } else {
                echo "<td></td></tr>";}
            }
            ?>
        </table>
    </main>
    <?php 
        mysqli_close($con);
    ?>
</body>
</html>