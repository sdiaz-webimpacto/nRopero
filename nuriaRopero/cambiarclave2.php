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
    <div id="container">
        <div id="acceso">
        <?php
        $con = mysqli_connect("qaci391.pendientines.com", "qaci393", "Santi001", "qaci391");
        if($_REQUEST['cont2'] != $_REQUEST['cont3']) {
            echo "<h3 class='fracaso'>No coincide la contraseña con la confirmación.</h3><br>";
            echo "<a href='index.html'><img src='img/atras.png' class='volver'>";
        } else {
            $query = mysqli_query($con, "SELECT * FROM matPerfiles WHERE user = '$_REQUEST[user]' AND cont = '$_REQUEST[cont]'");
            $row = mysqli_fetch_array($query);
            if($row['id'] != '') {
                $cambio = mysqli_query($con, "UPDATE matPerfiles set cont = '$_REQUEST[cont2]' WHERE id = '$row[id]'");
                if($cambio) {
                    echo "<h3 class='exito'>Se ha cambiado la contraseña correctamente.</h3><br>";
                    echo "<a href='index.html'><img src='img/atras.png' class='volver'>";
                } else {
                    echo "<h3 class='fracaso'>No se ha podido cambiar la contraseña. Contacte con su servicio técnico.</h3><br>";
                    echo "<a href='index.html'><img src='img/atras.png' class='volver'>";
                }
            } else {
                echo "<h3 class='fracaso'>Usuario o contraseña incorrectos.</h3><br>";
                echo "<a href='index.html'><img src='img/atras.png' class='volver'>";
            }
        }
    ?>
        </div>
    </div>    
</body>
</html>