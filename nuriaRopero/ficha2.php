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
    $clases = mysqli_query($con, "SELECT * FROM matClases ORDER BY id");
    while ($rclases = mysqli_fetch_array($clases)) {
        $curso[$rclases['dia']." ".$rclases['inicio']] = $rclases['id'];
    }
    $update = mysqli_query($con, "UPDATE matClientes set direccion = '$_REQUEST[direccion]',
                                                        nombre = '$_REQUEST[nombre]',
                                                        apellidos = '$_REQUEST[apellidos]',
                                                        telefono = '$_REQUEST[telefono]',
                                                        email = '$_REQUEST[email]',
                                                        alta = '$_REQUEST[alta]',
                                                        nacimiento = '$_REQUEST[nacimiento]',
                                                        cuota = '$_REQUEST[cuota]',
                                                        pagar = '$_REQUEST[cuota]',
                                                        pago = '$_REQUEST[pago]',
                                                        proximo = '$_REQUEST[proximo]',
                                                        pagar = '$_REQUEST[pagar]',
                                                        metodoPago = '$_REQUEST[metodo]',
                                                        alergias = '$_REQUEST[alergias]',
                                                        abortos = '$_REQUEST[abortos]',
                                                        enfermedades = '$_REQUEST[enfermedades]',
                                                        deportes = '$_REQUEST[deportes]',
                                                        dni = '$_REQUEST[dni]',
                                                        p5 = '$_REQUEST[p5]',
                                                        p6 = '$_REQUEST[p6]',
                                                        p7 = '$_REQUEST[p7]',
                                                        p8 = '$_REQUEST[p8]',
                                                        p9 = '$_REQUEST[p9]',
                                                        p10 = '$_REQUEST[p10]',
                                                        p11 = '$_REQUEST[p11]',
                                                        p12 = '$_REQUEST[p12]',
                                                        p13 = '$_REQUEST[p13]',
                                                        p14 = '$_REQUEST[p14]',
                                                        p15 = '$_REQUEST[p15]',
                                                        p16 = '$_REQUEST[p16]',
                                                        p17 = '$_REQUEST[p17]',
                                                        patDolMed = '$_REQUEST[patDolMed]',
                                                        semanas = '$_REQUEST[semanas]' WHERE id = '$_REQUEST[id]'
                                                        ");
if($update) {
    echo "<h3 class='exito'>Se ha modificado la ficha correctamente</h3>";
} else {
    echo "<h3 class='fracaso'>No se ha podido modificar la ficha</h3>";
}
?>
        <br><br><a href="javascript:history.back(-1);"><img src="img/atras.png" class="volver">
        </div>
        
    </main>
</body>
</html>