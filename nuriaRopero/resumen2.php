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
    <?php
    $ano = $_REQUEST['ano'];
    $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
    $buscaDisciplinas = mysqli_query($con, "SELECT * FROM matClases WHERE nombre != '' AND nombre != 'espera' GROUP BY nombre");
        $d[] = 'Taller';
    while($rowBuscadisciplinas = mysqli_fetch_array($buscaDisciplinas)) {
      $d[] = $rowBuscadisciplinas['nombre'];
    }
    $buscaMetodos = mysqli_query($con, "SELECT * FROM matPagos GROUP BY metodo");
    while($rowBuscaMetodos = mysqli_fetch_array($buscaMetodos)) {
      $m[$rowBuscaMetodos['metodo']] = $rowBuscaMetodos['metodo'];
    }

    ?>
        <h1>RESUMEN AÑO <?php echo $ano;?></h1>
        <div id="lienzo">
            <div class="ano">
                <h2><?php echo $ano;?></h2>
                <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''12-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p>
            </div>
            <?php
                if($_REQUEST['tri'] == '') {
            ?>
            <div class="ano"><h3>Enero</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Febrero</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Marzo</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Abril</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Mayo</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Junio</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Julio</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Agosto</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Septiembre</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Octubre</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Noviembre</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''12-30'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Diciembre</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                        echo "</p></div>";}
                    } else if($_REQUEST['tri'] == 'primero') { ?>
                    <div class="ano"><h3>Trimestre 1</h3> <?php 
                    $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                    $total = mysqli_fetch_array($buscaTotal);
                    ?>
                    <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                    <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p> 
                    <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''03-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";}?>
                    </p></div>
                    <div class="ano"><h3>Enero</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''01-01' AND '$ano''01-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Febrero</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''02-01' AND '$ano''02-29'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Marzo</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''03-01' AND '$ano''03-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
                    <?php }
                    else if($_REQUEST['tri'] == 'segundo') { ?>
                    <div class="ano"><h3>Trimestre 2</h3> <?php 
                    $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                    $total = mysqli_fetch_array($buscaTotal);
                    ?>
                    <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                    <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p> 
                    <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''06-30'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";}?>
                    </p></div>
                    <div class="ano"><h3>Abril</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''04-01' AND '$ano''04-30'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Mayo</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''05-01' AND '$ano''05-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
                <div class="ano"><h3>Junio</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''06-01' AND '$ano''06-30'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
                    <?php }
                    else if($_REQUEST['tri'] == 'tercero') { ?>
                    <div class="ano"><h3>Trimestre 3</h3> <?php 
                    $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                    $total = mysqli_fetch_array($buscaTotal);
                    ?>
                    <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                    <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p> 
                    <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''09-30'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";}?>
                    </p></div>
                    <div class="ano"><h3>Julio</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''07-01' AND '$ano''07-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Agosto</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''08-01' AND '$ano''08-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
            <div class="ano"><h3>Septiembre</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''09-01' AND '$ano''09-30'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
                    <?php }
                    else if($_REQUEST['tri'] == 'cuarto') { ?>
                    <div class="ano"><h3>Trimestre 4</h3> <?php 
                    $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                    $total = mysqli_fetch_array($buscaTotal);
                    ?>
                    <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                    <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p> 
                    <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''12-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";}?>
                    </p></div>
                    <div class="ano"><h3>Octubre</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''10-01' AND '$ano''10-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }
                ?>
                </p></div>
                    <div class="ano"><h3>Noviembre</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''11-01' AND '$ano''11-30'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";
                    }?> </p></div>
                    <div class="ano"><h3>Diciembre</h3>
            <?php
                $buscaTotal = mysqli_query($con, "SELECT SUM(importe) as total FROM matPagos WHERE fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                $total = mysqli_fetch_array($buscaTotal);
                ?>
                <h3>INGRESOS: <?php echo $total['total'];?> </h3>
                <p style="background-color:white; color:#ff0d90; width:60%; margin-left:20%;"><p>
                <?php
                    if($m['bizum']) {
                        echo "<img src='img/bizum.png' class='icono'>";
                        $bizum = mysqli_query($con, "SELECT SUM(importe) as bizum FROM matPagos WHERE metodo = 'bizum' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowBizum = mysqli_fetch_array($bizum);
                        echo $rowBizum['bizum'];
                    }
                    if($m['efectivo']) {
                        echo "<img src='img/moneda.png' class='icono'>";
                        $efectivo = mysqli_query($con, "SELECT SUM(importe) as efectivo FROM matPagos WHERE metodo = 'efectivo' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowefectivo = mysqli_fetch_array($efectivo);
                        echo $rowefectivo['efectivo'];
                    }
                    if($m['tarjeta']) {
                        echo "<img src='img/tarjeta.png' class='icono'>";
                        $tarjeta = mysqli_query($con, "SELECT SUM(importe) as tarjeta FROM matPagos WHERE metodo = 'tarjeta' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowtarjeta = mysqli_fetch_array($tarjeta);
                        echo $rowtarjeta['tarjeta'];
                    }
                    if($m['transferencia']) {
                        echo "<img src='img/banco.png' class='icono'>";
                        $transferencia = mysqli_query($con, "SELECT SUM(importe) as transferencia FROM matPagos WHERE metodo = 'transferencia' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowtransferencia = mysqli_fetch_array($transferencia);
                        echo $rowtransferencia['transferencia'];
                    }
                    if($m['domiciliado']) {
                        echo "<img src='img/calendario.png' class='icono'>";
                        $domiciliado = mysqli_query($con, "SELECT SUM(importe) as domiciliado FROM matPagos WHERE metodo = 'domiciliado' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowdomiciliado = mysqli_fetch_array($domiciliado);
                        echo $rowdomiciliado['domiciliado'];
                    }
                ?>
                </p><br><br>
                <p style="background-color:white; color:#ff0d90;">
                <?php
                if($d['0']) {
                        $dato = $d['0'];
                        echo $dato;
                        $d0 = mysqli_query($con, "SELECT SUM(importe) as d0 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd0 = mysqli_fetch_array($d0);
                        echo " ".$rowd0['d0']." || ";
                    }
                    if($d['1']) {
                        $dato = $d['1'];
                        echo $dato;
                        $d1 = mysqli_query($con, "SELECT SUM(importe) as d1 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd1 = mysqli_fetch_array($d1);
                        echo " ".$rowd1['d1']." || ";
                    }
                    if($d['2']) {
                        $dato = $d['2'];
                        echo $dato;
                        $d2 = mysqli_query($con, "SELECT SUM(importe) as d2 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd2 = mysqli_fetch_array($d2);
                        echo " ".$rowd2['d2']." || ";
                    }
                    if($d['3']) {
                        $dato = $d['3'];
                        echo $dato;
                        $d3 = mysqli_query($con, "SELECT SUM(importe) as d3 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd3 = mysqli_fetch_array($d3);
                        echo " ".$rowd3['d3']." || ";
                    }
                    if($d['4']) {
                        $dato = $d['4'];
                        echo $dato;
                        $d4 = mysqli_query($con, "SELECT SUM(importe) as d4 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd4 = mysqli_fetch_array($d4);
                        echo " ".$rowd4['d4']." || ";
                    }
                    if($d['5']) {
                        $dato = $d['5'];
                        echo $dato;
                        $d5 = mysqli_query($con, "SELECT SUM(importe) as d5 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd5 = mysqli_fetch_array($d5);
                        echo " ".$rowd5['d5']." || ";
                    }
                    if($d['6']) {
                        $dato = $d['6'];
                        echo $dato;
                        $d6 = mysqli_query($con, "SELECT SUM(importe) as d6 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd6 = mysqli_fetch_array($d6);
                        echo " ".$rowd6['d6']." || ";
                    }
                    if($d['7']) {
                        $dato = $d['7'];
                        echo $dato;
                        $d7 = mysqli_query($con, "SELECT SUM(importe) as d7 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd7 = mysqli_fetch_array($d7);
                        echo " ".$rowd7['d7']." || ";
                    }
                    if($d['8']) {
                        $dato = $d['8'];
                        echo $dato;
                        $d8 = mysqli_query($con, "SELECT SUM(importe) as d8 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd8 = mysqli_fetch_array($d8);
                        echo " ".$rowd8['d8']." || ";
                    }
                    if($d['9']) {
                        $dato = $d['9'];
                        echo $dato;
                        $d9 = mysqli_query($con, "SELECT SUM(importe) as d9 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd9 = mysqli_fetch_array($d9);
                        echo " ".$rowd9['d9']." || ";
                    }
                    if($d['10']) {
                        $dato = $d['10'];
                        echo $dato;
                        $d10 = mysqli_query($con, "SELECT SUM(importe) as d10 FROM matPagos WHERE disciplina = '$dato' AND fecha BETWEEN '$ano''12-01' AND '$ano''12-31'");
                        $rowd10 = mysqli_fetch_array($d10);
                        echo " ".$rowd10['d10']." || ";}
                ?>
                </p></div>
                    <?php } ?>
                
        </div>
    </main>
    <?php 
        mysqli_close($con);
    ?>
</body>
</html>