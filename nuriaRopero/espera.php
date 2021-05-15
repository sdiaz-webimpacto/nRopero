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
        <h1 class="titulo">Lista de espera</h1>
        <?php
         $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
         ?>
        <table class="buscador">
            <tr><td><img src="img/lupa.png" alt="lupa"></td><td><form action="" method="get" id="busca"><input type="text" name="busqueda" id="busqueda"><input type="submit" value="buscar"></form></td></tr>
        </table>
         
        <table class="lista">
        <tr><th>Cliente</th><th>Disciplina</th><th>Fecha</th><th>email</th><th>Telefono</th><th>Preferencia</th></tr>
            <?php
            if($_GET['clases']) {
                mysqli_query($con, "UPDATE matClientes set prefDisc = '$_GET[clases]'");
            }
           if($_GET['busqueda']) { 
            $query = mysqli_query($con, "SELECT * FROM matClientes WHERE disciplina LIKE '%".$_GET['busqueda']."%' AND dia1 = '226' || dia5 = '226' || dia9 = '226'|| disciplina2 LIKE '%".$_GET['busqueda']."%' AND dia1 = '226' || dia5 = '226' || dia9 = '226'|| disciplina3 LIKE '%".$_GET['busqueda']."%' 
                                    AND dia1 = '226' || dia5 = '226' || dia9 = '226' ORDER BY alta");
            } else {
            $query = mysqli_query($con, "SELECT * FROM matClientes WHERE dia1 = '226' || dia5 = '226' || dia9 = '226' ORDER BY alta");   
            }
            while($row = mysqli_fetch_array($query)) {
                if($row['dia1'] == 226) {$disciplina = $row['disciplina'];}
                else if($row['dia5'] == 226) {$disciplina = $row['disciplina2'];}
                else {$disciplina = $row['disciplina3'];}
                $buscaclase = mysqli_query($con, "SELECT dia, inicio FROM matClases WHERE nombre = '$disciplina'");
                echo "<tr><td>".$row['nombre']." ".$row['apellidos']."</td>";
                echo "<td>".$disciplina."</td>";
                echo "<td>".$row['alta']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['telefono']."</td>";

                echo "<form action='' method='get'>";
                echo "<td><select name='clases'>";
                echo "<option value='".$row['prefDisc']."'>".$row['prefDisc']."</option>";
                while($verClase = mysqli_fetch_array($buscaclase)) {
                    echo "<option value='".$verClase['dia']." ".$verClase['inicio']."'>".$verClase['dia']." ".$verClase['inicio']."</option>";
                }
                echo "</select></td>";
                echo "<td><input type='submit' value='CONFIRMAR'</td>";
                echo "</form>";
                echo "</tr>";}
            ?>
        </table>
    </main>
    <?php 
        mysqli_close($con);
    ?>
</body>
</html>