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
    $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
    $buscaCliente = mysqli_query($con, "SELECT nombre, apellidos, semanas FROM matClientes WHERE id = '$_GET[id]'");
    $cliente = mysqli_fetch_array($buscaCliente);
    $filasPeso = mysqli_query($con, "SELECT * FROM matPeso WHERE id = '$_GET[id]'");
    $peso = mysqli_fetch_array($filasPeso);
    $filasMedida = mysqli_query($con, "SELECT * FROM matMedida WHERE id = '$_GET[id]'");
    $medida = mysqli_fetch_array($filasMedida);

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
                echo "<h1>".$cliente['nombre']." ".$cliente['apellidos']."</h1>";
                ?>
                <table class="lista">
        <tr><th>Semana</th><th>Peso</th><th>Cms</th></tr>
            <?php
            for($i = 11; $i < 41; $i++) {
                    if($i == $cliente['semanas']) 
                    {echo "<tr style='background-color:gold;'>";} else {echo "<tr>";}
                    echo "<td>".$i."</td>";
                    echo "<td>".$peso[$i]."</td>";
                    echo "<td>".$medida[$i]."</td>";                    
                    echo "</tr>";
                }
            ?>
        </table>
        </div>
        <a href="javascript:history.back(-1);"><img src="img/atras.png" class="volver-fuera">
    </main>
    <?php
        mysqli_close($con);
    ?>
</body>
</html>