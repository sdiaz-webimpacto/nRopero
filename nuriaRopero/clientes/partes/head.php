<?php
session_start()
?>
<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nuria Ropero App</title>
        <link href="css/clientes.css" rel="stylesheet" media="">
        <link rel="icon" href="../img/favicon.png">
    <?php if (isset($_SESSION['usuario'])) {echo "";} else {echo "<meta http-equiv='refresh' content='0,URL=../index.html'>";}
    ?>
    </head>