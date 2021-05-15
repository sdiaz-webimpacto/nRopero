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
    $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
    $alumno = mysqli_query($con, "SELECT * FROM matClientes WHERE id = '$_GET[codigo]'");
    $ralumno = mysqli_fetch_array($alumno);
   
?>
        <h1><?php echo $ralumno['nombre']." ".$ralumno['apellidos'];?></h1><br>
        <h2>Cuota: <?php echo $ralumno['cuota'];?></h2><br><br>
        <h3>Deuda: <?php echo $ralumno['pagar'];?></h3><br>
        
        <form action="cobro2.php" method="post" class="formulario">
        <input type="hidden" value="<?php echo $_GET['codigo']; ?>" name="codigo">
        <h3>Total a pagar: <span><h2><?php echo $ralumno['pagar'];?>€</h2></span></h3><br>
        <h3>Abonado: <input type="float" name="importe"></h3><br>
        <h3>Entregado: <input type="float" name="entregado"></h3><br>
        <h3>Metodo de pago:<select name="metodo">
            <option value="efectivo">Efectivo</option>
            <option value="tarjeta">Tarjeta</option>
            <option value="bizum">Bizum</option>   
            <option value="transferencia">Transferencia</option>
            <option value="domiciliado">Domiciliado</option> 
        </select></h3><br>
        <input type="submit" class="submit">
        </form>



        <a href="javascript:history.back(-1);"><img src="img/atras.png" class="volver">
        </div>
        
    </main>
    <?php
    mysqli_close($con);
    ?>
</body>
</html>