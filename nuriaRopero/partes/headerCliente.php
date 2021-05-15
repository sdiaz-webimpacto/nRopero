<?php
 $actual = $_SERVER['PHP_SELF'];
?>
<div id="cabecera">
    <div id="logo">
        <a href="inicio.php"><img src="../img/logo.png" alt="logo"></a>
    </div>
    <div id="cliente">
        <?php echo "<h2>Bienvenido ".$_SESSION['nombre']."</h2>";?>
    </div>
    <div id="salir">
        <a href="../clientes/principal.php?salir"><img src="../img/salir.png" alt="salir"></a>
    </div>
    <div id="clases"></div>
</div>