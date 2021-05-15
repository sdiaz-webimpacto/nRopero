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
        <?php
            $buscarCliente = mysqli_query($con, "SELECT * FROM matClientes WHERE id = '$_GET[id]'");
            $cliente = mysqli_fetch_array($buscarCliente);
        ?>
        <div id="lienzo"> 
        <form action="cambiardisciplina2.php" method="post" class="formulario">
        <input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
            <table class="form">
            <?php
                if($cliente['disciplina'] == '') { ?>
                <tr><td><h3>Nueva Disciplina:</h3></td></tr>
                <tr id="disc"><td><select name="disciplina" id="select1">
                <?php
                $query = mysqli_query($con, "SELECT * FROM matClases WHERE nombre != 'espera' GROUP by nombre");
                    while($row = mysqli_fetch_array($query)) {
                        echo "<option value='".$row['nombre']."'>".$row['nombre']."</option>";
                    }
                ?>
                </select></tr></td> <?php } ?>
            <?php
                if($cliente['disciplina2'] == '') { ?>
                <tr id="disc2"><td><select name="disciplina2" id="select2">
                <?php
                $query2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre != 'espera' GROUP by nombre");
                    while($row2 = mysqli_fetch_array($query2)) {
                        echo "<option value='".$row2['nombre']."'>".$row2['nombre']."</option>";
                    }
                ?>
                </select></tr></td> <?php } ?>
                <?php
                if($cliente['disciplina3'] == '') { ?>
                <tr id="disc3"><td><select name="disciplina3" id="select3">
                <?php
                $query3 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre != 'espera' GROUP by nombre");
                    while($row3 = mysqli_fetch_array($query3)) {
                        echo "<option value='".$row3['nombre']."'>".$row3['nombre']."</option>";
                    }
                ?>
                </select></tr></td> <?php } ?>
                <tr><td><input type="submit" value="IR A HORARIOS" class="submit"></td></tr>
                </table></form>
                <a href="javascript:history.back(-1);"><img src="img/atras.png" class="volver">
        </div>
</main>
            <?php
                mysqli_close($con);
            ?>
            <script src="js/disc.js"></script>
</body>
</html>