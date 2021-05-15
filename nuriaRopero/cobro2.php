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
        <div id="lienzo"> 
<?php
    $dia = date('Y-m');
    $hoy = date('Y-m-d');
    $devolucion = $_POST['entregado'] - $_POST['importe'];
    $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
    $cliente = mysqli_query($con, "SELECT * FROM matClientes WHERE id = '$_REQUEST[codigo]'");
    $rc = mysqli_fetch_array($cliente);
    $restante = $rc['pagar'] - $_REQUEST['importe'];
    if($_REQUEST['importe'] < $rc['pagar']) {
        
        mysqli_query($con, "UPDATE matClientes set pagar = '$restante',
        proximo = '$rc[proximo]' WHERE id= '$_REQUEST[codigo]'");
    } else {
    if($dia != 'Y-12') {
        $mes = date('Y-m', strtotime($dia.'+1month'));
        mysqli_query($con, "UPDATE matClientes set proximo = '$mes-01',
                                                    pagar = '$rc[cuota]',
                                                    pago = '$hoy',
                                                    bono = '10' WHERE id= '$_REQUEST[codigo]'");
    } else {
    if($dia == 'Y-12') {
        $mes = date('Y-m', strtotime($dia.'+1month'));
        $ano = date('Y-m', strtotime($mes.'+1year'));
        mysqli_query($con, "UPDATE matClientes set proximo = '$ano-01',
                                                    pago = '$hoy',
                                                    pagar =  '$rc[cuota]',
                                                    bono = '10' WHERE id= '$_REQUEST[codigo]'");
    }   }}
    if($rc['nombre'] != '') {
    $query = mysqli_query($con, "INSERT INTO matPagos (fecha, importe, nombre, apellidos, metodo, disciplina, resto, entregado, devuelto) 
    values    
    ('$hoy', '$_REQUEST[importe]', '$rc[nombre]', '$rc[apellidos]', '$_REQUEST[metodo]','$rc[disciplina]','$restante', '$_REQUEST[entregado]','$devolucion')");
    }
    if($query) {
        $buscaPago = mysqli_query($con, "SELECT id FROM matPagos WHERE nombre = '$rc[nombre]' AND apellidos = '$rc[apellidos]' AND 
        fecha = '$hoy' ORDER BY id DESC");
        $pagos = mysqli_fetch_array($buscaPago);
        echo "<h3 class='exito'>Se ha registrado el pago de ".$rc['nombre']." ".$rc['apellidos']."</h3>";
        echo "<h2>A devolver: ".$devolucion."€</h2>";
        ?>
            <form action="factura.php">
                <input type="hidden" name="codigo" value="<?php echo $pagos['id'];?>">
                <input type="hidden" name="operario" value="<?php echo $_SESSION['nombre'];?>">
                <input type="submit" value="FACTURA" class="submit">
            </form>
        <?php
    } else {
        echo "<h3 class='fracaso'>No ha podido guardarse el pago de ".$rc['nombre']." ".$rc['apellidos']."</h3>";
    }
?>
        



        <a href="javascript:history.back(-1);"><img src="img/atras.png" class="volver">
        </div>
        
    </main>
    <?php
    mysqli_close($con);
    ?>
</body>
</html>