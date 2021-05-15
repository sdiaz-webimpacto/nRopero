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
            $fecha = date('Y-m-d');
            if($_GET['metodo']) {
            $devolver = $_GET['entregado'] - $_GET['importe'];
            $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
            $query = mysqli_query($con, "UPDATE matPagos set pendiente = '',
                                                    metodo = '$_GET[metodo]',
                                                    fecha = '$fecha',
                                                    entregado = '$_GET[entregado]',
                                                    devuelto = '$devolver' WHERE id = '$_REQUEST[id]'");
            if($query) {
                echo "<h2 class='exito'>Se ha pagado correctamente.</h2>";
                echo "<h2>A devolver: ".$devolver."€</h2>";
                ?>
                        <form action="factura.php" method="post">
                        <input type="hidden" name="codigo" value="<?php echo $_REQUEST['id'];?>">
                        <input type="hidden" name="operario" value="<?php echo $_SESSION['nombre'];?>">
                        <input type="submit" value="FACTURA" class="submit">
                        </form>
                        <?php
            } else {
                echo "<h2 class='fracaso'>No se ha podido pagar.</h2>";
            }} else {
        ?>
        <form action="" method="get">
            <input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
            <input type="hidden" value="<?php echo $_GET['importe'];?>" name="importe">
            <h2>Importe a pagar</h2>
            <h1><?php echo $_GET['importe'];?></h1>
            <h2>Entregado</h2>
            <h2><input type="float" name="entregado"></h2>
        <h3>Metodo de pago:<br></pago:br><select name="metodo">
            <option value="efectivo">Efectivo</option>
            <option value="tarjeta">Tarjeta</option>
            <option value="bizum">Bizum</option>   
            <option value="transferencia">Transferencia</option> 
        </select></h3><br>
            <input type="submit" class="submit"></form> <?php } ?>
        <a href="pendientes.php"><img src="img/atras.png" class="volver">
        </div>
    </main>
</body>
</html>