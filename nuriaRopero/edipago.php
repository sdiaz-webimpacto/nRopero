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
    <?php
    include_once "consultas/conexion.php";
    if($_GET['metodo']) {
        mysqli_query($con, "UPDATE matPagos set importe = '$_GET[importe]', metodo = '$_GET[metodo]'");
        echo "<h2 class='exito'>Se ha modificado satisfactoriamente el pago.</h2>";
        echo "<a href='facturacion.php'><input type='submit' class='submit' value='VOLVER A FACTURACION'><a>";
    }
    ?>
</head>
<body>
    <?php
    include_once "partes/header.php";
    $query = mysqli_query($con, "SELECT * FROM matPagos WHERE id = '$_GET[codigo]'");
    $row = mysqli_fetch_array($query);
    ?>
    <main>
    <table class="form">
        <form action="" method="get">
        <tr>
            <td><h3>Importe:</h3></td>
        </tr>
        <tr>
            <td><input type="number" value="<?php echo $row['importe'];?>" name='importe'></td>
        </tr>
        <tr>
            <td><h3>Metodo de pago:</h3></td>
        </tr>
        <tr>
            <td><select name="metodo">
                <option value="<?php echo $row['metodo'];?>"><?php echo $row['metodo'];?></option>
                <option value="efectivo">Efectivo</option>
                <option value="tarjeta">Tarjeta</option>
                <option value="bizum">Bizum</option>
                <option value="transferencia">Transferencia</option>
                <option value="domiciliado">Domiciliado</option>
            </select></td>
        </tr>
        <tr>
            <td>
                <input type="submit" class="submit" value="MODIFICAR">
            </td>
        </tr>
        </form>
    </table>
    </main>
</body>
<?php
mysqli_close($con);
?>
</html>
