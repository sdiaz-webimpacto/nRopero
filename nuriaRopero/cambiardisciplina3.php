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
    $hoy = date("Y-m-d");
    $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
  if($_REQUEST['dia1'] ) { $query = mysqli_query($con, "UPDATE matClientes set dia1 = '$_REQUEST[dia1]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['dia2'] ) {  $query = mysqli_query($con, "UPDATE matClientes set dia2 = '$_REQUEST[dia2]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['dia3'] ) {  $query = mysqli_query($con, "UPDATE matClientes set dia3 = '$_REQUEST[dia3]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['dia4'] ) {  $query = mysqli_query($con, "UPDATE matClientes set dia4 = '$_REQUEST[dia4]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['dia5'] ) {  $query = mysqli_query($con, "UPDATE matClientes set dia5 = '$_REQUEST[dia5]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['dia6'] ) {  $query = mysqli_query($con, "UPDATE matClientes set dia6 = '$_REQUEST[dia6]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['dia7'] ) {  $query = mysqli_query($con, "UPDATE matClientes set dia7 = '$_REQUEST[dia7]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['dia8'] ) {  $query = mysqli_query($con, "UPDATE matClientes set dia8 = '$_REQUEST[dia8]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['dia9'] ) {  $query = mysqli_query($con, "UPDATE matClientes set dia9 = '$_REQUEST[dia9]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['dia10'] ) {  $query = mysqli_query($con, "UPDATE matClientes set dia10 = '$_REQUEST[dia10]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['dia11'] ) {  $query = mysqli_query($con, "UPDATE matClientes set dia11 = '$_REQUEST[dia11]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['dia12'] ) {  $query = mysqli_query($con, "UPDATE matClientes set dia12 = '$_REQUEST[dia12]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['alergias'])  {  $query = mysqli_query($con, "UPDATE matClientes set alergias = '$_REQUEST[alergias]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['abortos']) {  $query = mysqli_query($con, "UPDATE matClientes set abortos = '$_REQUEST[abortos]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['enfermedades'])  {  $query = mysqli_query($con, "UPDATE matClientes set enfermedades = '$_REQUEST[enfermedades]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['semanas'] ) {  $query = mysqli_query($con, "UPDATE matClientes set semanas = '$_REQUEST[semanas]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['deportes'] ) {  $query = mysqli_query($con, "UPDATE matClientes set deportes = '$_REQUEST[deportes]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['p5'] ) {  $query = mysqli_query($con, "UPDATE matClientes set p5 = '$_REQUEST[p5]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['p6'] ) {  $query = mysqli_query($con, "UPDATE matClientes set p6 = '$_REQUEST[p6]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['p7'] ) {  $query = mysqli_query($con, "UPDATE matClientes set p7 = '$_REQUEST[p7]' where id = '$_REQUEST[id]'");}  
  if($_REQUEST['p8'] ) {  $query = mysqli_query($con, "UPDATE matClientes set p8 = '$_REQUEST[p8]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['p9'] ) {  $query = mysqli_query($con, "UPDATE matClientes set p9 = '$_REQUEST[p9]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['p10'] ) {  $query = mysqli_query($con, "UPDATE matClientes set p10 = '$_REQUEST[p10]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['p11'] ) {  $query = mysqli_query($con, "UPDATE matClientes set p11 = '$_REQUEST[p11]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['p12'] ) {  $query = mysqli_query($con, "UPDATE matClientes set p12 = '$_REQUEST[p12]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['p13'] ) {  $query = mysqli_query($con, "UPDATE matClientes set p13 = '$_REQUEST[p13]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['p14'] ) {  $query = mysqli_query($con, "UPDATE matClientes set p14 = '$_REQUEST[p14]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['p15'] ) {  $query = mysqli_query($con, "UPDATE matClientes set p15 = '$_REQUEST[p15]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['p16'] ) {  $query = mysqli_query($con, "UPDATE matClientes set p16 = '$_REQUEST[p16]' where id = '$_REQUEST[id]'");}
  if($_REQUEST['p17'] ) {  $query = mysqli_query($con, "UPDATE matClientes set p17 = '$_REQUEST[p17]' where id = '$_REQUEST[id]'");}
  
  if($_REQUEST['semanas'] >= 1) {
        mysqli_query($con, "INSERT INTO matMedida (id) value ('$_REQUEST[id]')");
        mysqli_query($con, "INSERT INTO matPeso (id) value ('$_REQUEST[id]')");

    }
        $cliente = mysqli_query($con, "SELECT * FROM matClientes WHERE id = '$_REQUEST[id]'");
         $codigo = mysqli_fetch_array($cliente);
    
    include("partes/precios.php");

    $suma = $importe1 + $importe2 + $importe3 + $importe4;
    $cuota = $_REQUEST['id'];
    $resultado = $suma - $cuota;
?>
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
        if($query) {
            echo "<h1 class='exito'>Se ha modificdo la disciplina del cliente.</h1><br>";
            if($suma > $cuota) {
                mysqli_query($con, "UPDATE matClientes set pagar = '$resultado',
                                                        proximo = '$hoy'");
            }
            echo "<h1>Su nueva cuota entrará en vigor el próximo mes será de</h1><h1 style='font-size:3em;'>".$suma."€</h1><br>";
            if($_REQUEST['quincena'] == 'quincena') {
                if($suma == 25) {
                    $quincena = 15;
                } else {
                    $quincena = ($suma / 2) + 5;
                }
                $cuota = mysqli_query($con, "UPDATE matClientes SET cuota = '$suma', pagar = '$quincena' WHERE id = '$codigo[id]'");
                echo "<h2>Aunque lo que queda de mes pagará:</h2><h2 style='font-size:2em;'>".$quincena."€</h2>";
            } else {
                $cuota = mysqli_query($con, "UPDATE matClientes SET cuota = '$suma', pagar = '$suma' WHERE id = '$codigo[id]'");
                }  
            echo "<a href='ficha.php?codigo=".$_REQUEST['id']."'><img src='img/ficha.png'></a>";
        } else {
            echo "<h1 class='fracaso'>Hubó un error actualizando el registro.</h1><br><br>";
            echo "<a href='ficha.php?codigo=".$_REQUEST['id']."'><img src='img/ficha.png'></a>";
        }
        ?> 
        </div>
</main>
</body>
</html>