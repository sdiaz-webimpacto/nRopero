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
    <header>
    <?php
             $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
             $taller = mysqli_query($con, "SELECT * FROM matTaller WHERE id = '$_REQUEST[id]'");
             $rowTaller = mysqli_fetch_array($taller);
             $alumnos = mysqli_query($con, "SELECT * FROM matClientesTaller");
             $rowAlumnos = mysqli_fetch_array($alumnos)
    ?>
        <div id="cabecera">
            <div id="logo">
                <a href="inicio.php"><img src="img/logo.png" alt="logo"></a>
            </div>
            <div id="menu">
                <ul>
                    <li id="opciones"><a href="nuevocliente.php">Nuevo cliente</a></li>
                    <li id="opciones"><a href="clientes.php">Clientes</a></li>
                    <li id="opciones"><a href="">Clases</a>
                        <ul>
                            <li id="submenu"><a href="clases.php">Clases</a></li>
                            <li id="submenu"><a href="espera.php">Lista Espera</a></li>
                        </ul></li>
                    <li id="opciones"><a href="talleres.php">Talleres</a></li>
                    <li id="opciones"><a href="">Pagos</a>
                        <ul>
                            <li id="submenu"><a href="corrientes.php">Al corriente</a></li>
                            <li id="submenu"><a href="pendientes.php">Pendientes</a></li>
                            <?php if($_SESSION['tipo'] == 'total') { ?>
                            <li id="submenu"><a href="facturacion.php">Facturacion</a></li><li id="submenu"><a href="resumen.php">Resumen</a></li>
                            <?php } ?>
                        </ul></li>
                </ul>
            </div>
        </div>
    </header>
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
                if($rowAlumnos['nombre'] == $_REQUEST['nombre'] 
                    && $rowAlumnos['apellidos'] == $_REQUEST['apellidos'] 
                    && $rowAlumnos['taller'] == $_REQUEST['id']) {
                        echo "<h2 class='fracaso'>El Alumno ya está registrado en este taller</h2>";
                    } else { 
                    echo "<h1>Total a pagar: ".$rowTaller['precio']."</h1>"; ?>

                    <form action="talleres4.php" method="post" class="formulario">
                        <input type="hidden" name="total" value=<?php echo $rowTaller['precio'];?> id="total"> 
                        <input type="hidden" name="nombre" value=<?php echo $_REQUEST['nombre'];?>>
                        <input type="hidden" name="apellidos" value=<?php echo $_REQUEST['apellidos'];?>>
                        <input type="hidden" name="id" value=<?php echo $_REQUEST['id'];?>>
                        <h3>Importe pagado:<input type="float" name="importe" id="importe" ></h3><br>
                        <h3>Entregado:<input type="float" name="entregado" id="entregado" ></h3><br>
                        <h3>Metodo:<select name="metodo">
                            <option value="efectivo">Efectivo</option>
                            <option value="tarjeta">Tarjeta</option>
                            <option value="bizum">Bizum</option>
                            <option value="transferencia">Transferencia</option>
                            <option value="domiciliado">Domiciliado</option>
                        </select></h3><br><br>
                        <input type="submit" class="submit" id="submit" value="Enviar">
                    </form> <?php } ?>
                    
                    <br><br><a href="talleres.php?taller=<?php echo $_REQUEST['id'];?>"><img src="img/atras.png" class="volver">
                                            
        </div>
        <?php
            mysqli_close($con);
        ?>
    </main>
</body>
</html>