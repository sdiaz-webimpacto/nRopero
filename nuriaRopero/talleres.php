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
             $hoy = date('Y-m-d');
             $cuenta = 1;
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
            
                                            <!-- Seleccionado Taller -->
            <?php
                if($_GET['borrar']) {
                    mysqli_query($con, "DELETE FROM matClientesTaller WHERE id = '$_GET[borrar]'");
                    $archivoActual = $_SERVER['PHP_SELF'];
                    header("refresh:0;url='".$archivoActual."?taller=".$_GET['taller']."'");
                } else {
                
                if($_GET['taller']) {
                $clase = mysqli_query($con, "SELECT * FROM matTaller WHERE id = '$_GET[taller]'");
                $row = mysqli_fetch_array($clase);
                $alumnos = mysqli_query($con, "SELECT *FROM matClientesTaller WHERE taller = '$_GET[taller]'");
                $conteo = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientesTaller WHERE taller = '$_GET[taller]'");
                $apuntados = mysqli_fetch_array($conteo);
                ?>
                <div id="fondo">
                    <div id="izda">
                        <form action="talleres2.php" method="post" class="formulario">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <h3>Clase:</h3>
                            <input type="text" name="nombre" value="<?php echo $row['nombre'];?>">
                            <h3>H. Inicio:</h3>
                            <input type="time" name="inicio" value="<?php echo $row['inicio'];?>">
                            <h3>H. Fin:</h3>
                            <input type="time" name="fin" value="<?php echo $row['fin'];?>">
                            <h3>Fecha:</h3>
                            <input type="date" name="fecha" value="<?php echo $row['fecha'];?>">
                            <h3>Precio:</h3>
                            <input type="float" name="precio" value="<?php echo $row['precio'];?>">
                            <h3>Aforo</h3>
                            <input type="number" name="aforo" value="<?php echo $row['aforo'];?>"><br><br>
                            <input type="submit" value="MODIFICAR" class="submit">
                        </form>
                    </div>

                                            <!-- Formulario nuevo Cliente -->
                    <div id="dcha">
                    <?php
                        if( $apuntados['total'] >= $row['aforo']) {
                            echo "<p class='fracaso' style='margin-top:0; margin-bottom:1%;'>El aforo del taller está completo. 
                                No pueden registrarse nuevos clientes</p>";
                        } else {
                        ?>
                    <form action='talleres3.php' method='post'>
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <h3>Nuevo ingreso</h3>
                        <p>Alumno a añadir:</p>
                        <p>Nombre:<input type="text" name="nombre"></p>
                        <p>Apellidos:<input type="text" name="apellidos"></p>
                        <input type="submit" class="submit" value="confirmar"></form> <?php } ?>
                            
                                            <!-- Cliente Apuntados-->
                            <table style="width:100%; height:100%;">
                            <tr><td colspan="3"><h3>Lista alumnos</h3></td></tr>
                            <?php
                                while($rowAlumnos = mysqli_fetch_array($alumnos)) {
                                    echo "<tr style='border:1px solid black;'><td>".$cuenta."</td><td>";
                                    echo "<input type='text' id='apuntados' name='apuntados' value='".$rowAlumnos['nombre']." ".$rowAlumnos['apellidos']."'>";
                                    echo "</td><td>";
                                    echo "<a href=\"?taller=".$row['id']."&borrar=".$rowAlumnos["id"]."\"><p class='delete'>X</p></a></td></tr>";
                                    $cuenta++;
                                }
                                ?> <a href="talleres.php"><img src="img/atras.png" class="volver-fuera"></a></div> <?php
                } else {
            ?>
            <h1>Talleres</h1>
            <div id="lienzo">
                                    
                                         <!-- Nuevo Taller -->
        <a href='nuevotaller.php'><div class='clases'>
        <img src='img/anadir.png'style='height:90%; margin:2% 0%;'></div class='clases'></a>
        
                                        <!-- Listado Talleres -->
        <?php
        $l1 = mysqli_query($con, "SELECT * FROM matTaller WHERE fecha >= '$hoy' order by fecha");
        while($r1 = mysqli_fetch_array($l1)) {
            $fecha = date('d-m-Y', strtotime($r1['fecha']));
            $numero = mysqli_query($con, "SELECT COUNT(*) as gente from matClientesTaller WHERE taller = '$r1[id]'");
            $rn = mysqli_fetch_array($numero);
            echo "<a href=\"?taller=".$r1["id"]."\">
            <div class='clases' style='background-color:pink;color:#ff0d90; border:1px solid #ff0d90'>
            <br><h3>".$fecha."</h3>
            <p>".$r1['inicio']."-".$r1['fin']."</p>
            <h3>".$r1['nombre']."</h3>
            <br><p>".$rn['gente']."/".$r1['aforo']."</p></div class='clases'></a>";
        }}}
        ?>
        </div>
        <?php
            mysqli_close($con);
        ?>
    </main>
</body>
</html>