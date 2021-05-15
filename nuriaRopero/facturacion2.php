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
include_once "partes/header.php";
    ?>
    <main>
    <?php 
    if($_GET['salir']) {
        session_destroy();
        header("refresh:0;url='".$archivoActual);
    }
    $archivoActual = $_SERVER['PHP_SELF'];
    echo $_SESSION['nombre']." | ";echo "<a href='".$archivoActual."?salir=1'>SALIR</a>"; ?>
            <?php $desde = $_REQUEST['desde'];
            $hasta = $_REQUEST['hasta'];
            $metodo = $_REQUEST['metodo']; ?>
        <div id="lienzo"> 
        <table class="buscador">
            <tr><td><img src="img/lupa.png" alt="lupa"></td><td><form action="" method="get" id="busca"><input type="text" name="busqueda" id="busqueda">
            <input type="hidden" name="desde" id="desde" value="<?php echo $desde;?>">
            <input type="hidden" name="hasta" value="<?php echo $hasta;?>" id="hasta">
            <input type="hidden" name="metodo" id="metodo" value="<?php echo $metodo;?>">
            <input type="submit" value="buscar"></form></td></tr>
        </table>
            <?php 
            $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
            if($metodo == '') {
                if($_GET) {
                    $pagostotal = mysqli_query($con, "SELECT * FROM matPagos WHERE fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND nombre LIKE '%".$_GET['busqueda']."%' || 
                                                fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND apellidos LIKE '%".$_GET['busqueda']."%' || 
                                                fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND disciplina LIKE '%".$_GET['busqueda']."%' order by fecha");
                    $metodos = mysqli_query($con, "SELECT metodo, SUM(importe) as importe FROM matPagos WHERE fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND nombre LIKE '%".$_GET['busqueda']."%' || 
                    fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND apellidos LIKE '%".$_GET['busqueda']."%' || fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND disciplina LIKE '%".$_GET['busqueda']."%' Group by metodo");
                while($row = mysqli_fetch_array($metodos)) {
                    $op[$row['metodo']] = $row['importe'];
                }
                $suma = $op['bizum'] + $op['efectivo'] + $op['transferencia'] + $op['tarjeta'] + $op['domiciliado'];
                echo "<br><h1>FACTURACIÓN DESDE EL ".$desde." Y EL ".$hasta."</h1><br>";
                echo "<h2>Todos los metodos de pago.</h2>";
                echo "<h1>Total de ingresos del periodo:</h1><br>";
                echo "<h1 style='color:blue; font-size:2em;'>".$suma."€</h1>";
                echo "<h3><img src='img/moneda.png' class='icono'>".$op['efectivo']."€
                        <img src='img/tarjeta.png' class='icono'>".$op['tarjeta']."€
                        <img src='img/bizum.png' class='icono'>".$op['bizum']."€
                        <img src='img/banco.png' class='icono'>".$op['transferencia']."€
                        <img src='img/calendario.png' class='icono'>".$op['domiciliado']."€</h3>";
            ?>
            <table class="lista">
                <tr><th>Nombre</th><th>fecha pago</th><th>Método</th><th>Importe</th></tr>
                <?php
                while($rc = mysqli_fetch_array($pagostotal)) {
                 echo "<tr><td>".$rc['nombre']." ".$rc['apellidos']."</td><td>".$rc['fecha']."</td><td>".$rc['metodo']."</td><td>".$rc['importe']."</td>";
                 echo "<td><a href='factura.php?codigo=".$rc['id']."'>Ticket</a></td></tr>";
                } ?>
            </table> <?php
                } else {
                $pagostotal = mysqli_query($con, "SELECT * FROM matPagos WHERE fecha BETWEEN '$desde' AND '$hasta' order by fecha");              
                $metodos = mysqli_query($con, "SELECT metodo, SUM(importe) as importe FROM matPagos WHERE fecha BETWEEN '$desde' AND '$hasta' GROUP BY metodo");
                while($row = mysqli_fetch_array($metodos)) {
                    $op[$row['metodo']] = $row['importe'];
                }
                $suma = $op['bizum'] + $op['efectivo'] + $op['transferencia'] + $op['tarjeta'] + $op['domiciliado'];
                echo "<br><h1>FACTURACIÓN DESDE EL ".$desde." Y EL ".$hasta."</h1><br>";
                echo "<h2>Pagos con ".$metodo."</h2>";
                echo "<h1>Total de ingresos del periodo:</h1><br>";
                echo "<h1 style='color:blue; font-size:2em;'>".$suma."€</h1>";
                echo "<h3><h3><img src='img/moneda.png' class='icono'>".$op['efectivo']."€
                <img src='img/tarjeta.png' class='icono'>".$op['tarjeta']."€
                <img src='img/bizum.png' class='icono'>".$op['bizum']."€
                <img src='img/banco.png' class='icono'>".$op['transferencia']."€
                <img src='img/calendario.png' class='icono'>".$op['domiciliado']."€</h3>";
            ?>
            <table class="lista">
                <tr><th>Nombre</th><th>fecha pago</th><th>Método</th><th>Importe</th></tr>
                <?php
                while($rc = mysqli_fetch_array($pagostotal)) {
                 echo "<tr><td>".$rc['nombre']." ".$rc['apellidos']."</td><td>".$rc['fecha']."</td><td>".$rc['metodo']."</td><td>".$rc['importe']."</td>";
                 echo "<td><a href='factura.php?codigo=".$rc['id']."'>Ticket</a></td>";
                 echo "<td><a href='edipago.php?codigo=".$rc['id']."'>Editar</a></td></tr>";
                } ?>
            </table>
            <?php }} else {
                if($_GET) {
                    $pagostotal = mysqli_query($con, "SELECT * FROM matPagos WHERE metodo = '$metodo' AND  fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND nombre LIKE '%".$_GET['busqueda']."%' || 
                                                fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND apellidos LIKE '%".$_GET['busqueda']."%' || 
                                                fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND disciplina LIKE '%".$_GET['busqueda']."%' order by fecha");
                    $metodos = mysqli_query($con, "SELECT SUM(importe) as importe FROM matPagos WHERE metodo = '$metodo' AND fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND nombre LIKE '%".$_GET['busqueda']."%' || 
                    fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND apellidos LIKE '%".$_GET['busqueda']."%' || fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND disciplina LIKE '%".$_GET['busqueda']."%'");
                while($row = mysqli_fetch_array($metodos)) {
                    $op[$row['metodo']] = $row['importe'];
                }
                echo "<br><h1>FACTURACIÓN DESDE EL ".$desde." Y EL ".$hasta."</h1><br>";
                echo "<h2>Pagados mediante ".$metodo.".</h2>";
                echo "<h1>Total de ingresos del periodo:</h1><br>";
                echo "<h1 style='color:blue; font-size:2em;'>".$op[$row['metodo']]."€</h1>";
            ?>
            <table class="lista">
                <tr><th>Nombre</th><th>fecha pago</th><th>Método</th><th>Importe</th></tr>
                <?php
                while($rc = mysqli_fetch_array($pagostotal)) {
                 echo "<tr><td>".$rc['nombre']." ".$rc['apellidos']."</td><td>".$rc['fecha']."</td><td>".$rc['metodo']."</td><td>".$rc['importe']."</td></tr>";
                } 
                } else { 
$pagostotal = mysqli_query($con, "SELECT * FROM matPagos WHERE fecha BETWEEN '$desde' AND '$hasta' AND metodo = '$metodo' order by fecha");              
$metodos = mysqli_query($con, "SELECT SUM(importe) as importe FROM matPagos WHERE fecha BETWEEN '$desde' AND '$hasta' AND metodo = '$metodo'");
$row = mysqli_fetch_array($metodos);
echo "<br><h1>FACTURACIÓN DESDE EL ".$desde." Y EL ".$hasta."</h1><br>";
echo "<h2>Pagados mediante ".$metodo.".</h2>";
echo "<h1>Total de ingresos del periodo:</h1><br>";
echo "<h1 style='color:blue; font-size:2em;'>".$row['importe']."€</h1>";
                ?>
<table class="lista">
<tr><th>Nombre</th><th>fecha pago</th><th>Método</th><th>Importe</th></tr>
<?php
while($rc = mysqli_fetch_array($pagostotal)) {
 echo "<tr><td>".$rc['nombre']." ".$rc['apellidos']."</td><td>".$rc['fecha']."</td><td>".$rc['metodo']."</td><td>".$rc['importe']."</td></tr>";
} ?>
</table>
         <?php  } }?>
        </div>
</main>
<?php
mysqli_close($con);
?>
</body>
</html>