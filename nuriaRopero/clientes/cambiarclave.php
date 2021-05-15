<?php
session_start()
?><!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Maternity-fitness App</title>
        <link href="css/estilo.css" rel="stylesheet" media="">
        <link rel="icon" href="../img/favicon.png">
    <?php if (isset($_SESSION['usuario'])) {echo "";} else {echo "<meta http-equiv='refresh' content='0,URL=index.html'>";}?>
        <!--color: ff0d90-->
    </head>
<body>
    <div id="container">
        <div id="acceso">
        <table class="form">
            <form action="cambiarclave2.php" method="post" class="formulario">
                <tr><td><h2>USUARIO:</h2></td></tr>
                <tr><td><input type="text" name="user" required></td></tr>
                <tr><td><h2>CONTRASEÑA</h2></td></tr>
                <tr><td><input type="password" name="cont" required></td></tr>
                <tr><td><h2>NUEVA CONTRASEÑA</h2></td></tr>
                <tr><td><input type="password" name="cont2" required></td></tr>
                <tr><td><h2>CONFIRMAR CONTRASEÑA</h2></td></tr>
                <tr><td><input type="password" name="cont3" required></td></tr>
                <tr><td><input type="submit" class="submit" value="CAMBIAR"></td></tr>
            </form>
            </table>
        </div>
    </div>    
</body>
</html>