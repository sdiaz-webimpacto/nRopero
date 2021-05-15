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
    echo $_SESSION['nombre']." | ";echo "<a href='".$archivoActual."?salir=1'>SALIR</a>"; 
    $hoy = date('Y-m-d');
    $siguiente = new DateTime();
    $siguiente->modify('next month');
    $impresion = $siguiente->format('Y-m');
    $mesMas = $impresion.'-01';  
    $total = 0;
    require_once "consultas/conexion.php";
$query = mysqli_query($con, "SELECT * FROM matClientes WHERE proximo <= '$hoy' AND metodoPago = 'domiciliado'");
while($row = mysqli_fetch_array($query)) {
    mysqli_query($con, "UPDATE matClientes set proximo = '$mesMas' WHERE id = '$row[id]'");
    $total += $row['pagar'];
    mysqli_query($con, "INSERT into matPagos (fecha, importe, nombre, apellidos, metodo, disciplina) values 
    ('$hoy', '$row[pagar]','$row[nombre]','$row[apellidos]','domiciliado', '$row[disciplina]')");

}
if($query) {
echo "<h2 class='exito'>Se han realizado las domiciliaciones el total de la operación es de:</h2>";
echo "<h1>".$total."€</h1>";
} else {
    echo "<h2 class='fracaso'>Ha ocurrido un error interno que ha impedido realizar la operación.</h2>"; 
}
?>
</main>
    <?php 
        mysqli_close($con);
    ?>
</body>
</html>