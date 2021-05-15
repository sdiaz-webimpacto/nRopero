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
<?php
    include("partes/header.php");
    ?>
<body>
<?php
    $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
    $perfiles = mysqli_query($con, "SELECT * FROM matPerfiles WHERE user != 'ADMIN'");
    if($_GET) {
        mysqli_query($con, "DELETE FROM matPerfiles WHERE id = '$_GET[borrar]'");
        $archivoActual = $_SERVER['PHP_SELF'];
        header("refresh:0;url='".$archivoActual);
    }
?>
<main>
    <?php 
    if($_GET['salir']) {
        session_destroy();
        header("refresh:0;url='".$archivoActual);
    }
    $archivoActual = $_SERVER['PHP_SELF'];
    echo $_SESSION['nombre']." | ";echo "<a href='".$archivoActual."?salir=1'>SALIR</a>"; ?>
<div id="fondo">
                <div id="izda">
                    <form action="perfiles2.php" method="post" class="formulario">
                        <h3>Usuario:</h3>
                        <input type="text" name="user">
                        <h3>Nombre:</h3>
                        <input type="text" name="nombre">
                        <h3>Apellidos:</h3>
                        <input type="text" name="apellidos">
                        <h3>Tipo de perfil:</h3>
                        <select name="tipo">
                            <option value="normal">Usuario</option>
                            <option value="total">Administracion</option>
                        </select><br><br>
                        <input type="submit" value="CREAR" class="submit">
                    </form>
                </div>
                <div id="dcha">
                    <table style="width:100%; height:100%;">
                        <?php
                           while($row = mysqli_fetch_array($perfiles)) {
                            echo "<tr>";
                            echo "<td>".$row['user']."</td>";
                            echo "<td>".$row['nombre']." ".$row['apellidos']."</td>";
                            echo "<td><a href='perfiles.php?borrar=".$row['id']."'><p class='delete'>X</p></a></td>";
                            echo "<tr>";
                           } 
                        ?>
                    </table>
                </div>
            </div>
            <a href="admin.php"><img src="img/atras.png" class="volver-fuera">
</main>
<?php
    $con = mysqli_close($con);
?>
</body>
</html>