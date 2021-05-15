<?php
 $pagina = $_SERVER['PHP_SELF'];
 include_once "../consultas/conexion.php";
 $queryCliente = mysqli_query($con, "SELECT * FROM matClientes WHERE dni = '$_SESSION[usuario]'");
 $cliente = mysqli_fetch_array($queryCliente);
?>
<div id="cabecera">
    <div id="logo">
        <a href=""><img src="../img/logo.png" alt="logo"></a>
    </div>
    <div id="cliente">
        <?php echo "<h2>Bienvenid@ ".$_SESSION['nombre']."</h2>";?>
    </div>
    <div id="salir">
        <a href="../clientes/"><img src="../img/salir.png" alt="salir"></a>
    </div>

    <?php
    if($cliente['disciplina'] == 'Personal' || $cliente['disciplina2'] == 'Personal' || $cliente['disciplina3'] == 'Personal') {
        ?>
        <div id='bono'>
            <h3>BONO</h3>
            <h1><?php echo $cliente['bono'];?></h1>
        </div>
        <?php
    }
    ?>

</div>