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
        $clases = mysqli_query($con, "UPDATE matClientes SET dia1 = '$_REQUEST[dia1]',
         dia2 = '$_REQUEST[dia2]',
         dia3 = '$_REQUEST[dia3]',
         dia4 = '$_REQUEST[dia4]',
         dia5 = '$_REQUEST[dia5]',
         dia6 = '$_REQUEST[dia6]',
         dia7 = '$_REQUEST[dia7]',
         dia8 = '$_REQUEST[dia8]',
         dia9 = '$_REQUEST[dia9]',
         dia10 = '$_REQUEST[dia10]',
         dia11 = '$_REQUEST[dia11]',
         dia12 = '$_REQUEST[dia12]',
         alergias = '$_REQUEST[alergias]',
         abortos = '$_REQUEST[abortos]',
         enfermedades = '$_REQUEST[enfermedades]',
         deportes = '$_REQUEST[deportes]',
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
         semanas = '$_REQUEST[semanas]' WHERE dni = '$_REQUEST[dni]'");
         $cliente = mysqli_query($con, "SELECT * FROM matClientes WHERE dni = '$_REQUEST[dni]'");
         $codigo = mysqli_fetch_array($cliente);
         if($_REQUEST['semanas'] != 0) {
             mysqli_query($con, "INSERT INTO matPeso (id) value ('$codigo[id]')");
             mysqli_query($con, "INSERT INTO matMedida (id) value ('$codigo[id]')");
             mysqli_query($con, "UPDATE matSemActualAlumnos set semanas = '$_REQUEST[semanas]' WHERE id = '$codigo[id]'");
             mysqli_query($con, "UPDATE matSemUnoAlumnos set semanas = ('$_REQUEST[semanas]' + '1')  WHERE id = '$codigo[id]'");
         }
        if($clases) {
            echo "<h3 class='exito'>Se ha apuntado correctamente a las clases</h3><br>";
        } else {
            echo "<h3 clas='fracaso'>Error grabando los registros</h3><br>";
        }
         $cliente = mysqli_query($con, "SELECT * FROM matClientes WHERE dni = '$_REQUEST[dni]'");
         $codigo = mysqli_fetch_array($cliente);

        include("partes/precios.php");

        $suma = $importe1 + $importe2 + $importe3 + $importe4;
        echo "<h1>Su cuota es de</h1><h1 style='font-size:3em;'>".$suma."€</h1>";
        if($_REQUEST['quincena'] == 'quincena') {
            if($suma == '25') {
                $quincena = '15';
            } else {
                $quincena = ($suma / 2) + 5;
            }
            $cuota = mysqli_query($con, "UPDATE matClientes SET cuota = '$suma', pagar = '$quincena' WHERE id = '$codigo[id]'");
            echo "<h2>Aunque lo que queda de mes pagará:</h2><h2 style='font-size:2em;'>".$quincena."€</h2>";
        } else {
        $cuota = mysqli_query($con, "UPDATE matClientes SET cuota = '$suma', pagar = '$suma' WHERE id = '$codigo[id]'");
        }  
        mysqli_close($con);
    ?>
     </div>
</main>
</body>
</html>