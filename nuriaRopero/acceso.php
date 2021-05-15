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
        <!--color: ff0d90-->
    </head>
    <?php
        $con = mysqli_connect("qaci391.pendientines.com", "qaci393", "Santi001", "qaci391");
        $query = mysqli_query($con, "SELECT * FROM matPerfiles WHERE user = '$_REQUEST[user]' AND cont = '$_REQUEST[cont]'");
        $row = mysqli_fetch_array($query);
    ?>
<body>
    <div id="container">
        <div id="acceso">
            <?php
                if($row['id'] != '') {
                    $_SESSION['usuario'] = $row['user'];
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['tipo'] = $row['tipo'];
                    echo "<h2>Bienvenid@ ".$row['nombre']."</h2><br><br>";
                    echo "<a href='inicio.php'><h3><button class='submit'>ACCEDER</button></h3></a>";
                    echo "<a href='cambiarclave.php'><h3><button class='submit'>CAMBIAR CONTRASEÑA</button></h3></a>";
                } else {
                    echo "<h3 class='fracaso'>Usuario o contraseña incorrectos.</h3>";
                    echo "<a href='index.html'><img src='img/atras.png' class='volver-fuera'>";
                }
            ?>
        </div>
    </div>    
</body>
</html>