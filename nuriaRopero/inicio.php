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
        <div id="cabecera">
            <div id="logo">
                <img src="img/logo.png" alt="logo">
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
        <div id="lienzo" style="background-image:url('img/logo.png'); background-repeat:no-repeat;
                        background-size: cover; background-position: center;"> 
        <div id="acceso">
        <h1 style="font-size:2em; padding:2%; margin-top:10%; color:gray; -webkit-text-stroke:2px black;"><?php
                                                $d['0'] = 'Domingo';
                                                $d['1'] = 'Lunes';
                                                $d['2'] = 'Martes';
                                                $d['3'] = 'Miercoles';
                                                $d['4'] = 'Jueves';
                                                $d['5'] = 'Viernes';
                                                $d['6'] = 'Sabado';
                                                $hoy = date('w');
                                                echo "Bienvenid@ hoy es ".$d[$hoy]."<br>";
                                                echo date('d-m-Y');
                                                ?>
        </h1>
        <button class="submit" ><a href="admin.php"><h3 style="color:white;">ADMIN</h3></button>
        <h2>Descargar app</h2>
        <img src="img/qrApp.png" alt=""><br>
        <a href="http://app.appsgeyser.com/12819473/NuriaRopero">http://app.appsgeyser.com/12819473/NuriaRopero</a>
        <?php 
        if($_SESSION['tipo'] == 'total')  { ?>
        <?php } 
        $actual = date('m-d');
        $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
        $query = mysqli_query($con, "SELECT * FROM matClientes WHERE estado = '1'");
        $actualizar = mysqli_query($con, "SELECT * FROM matClientes WHERE estado != '1'");
        while($rowAct = mysqli_fetch_array($actualizar)) {
            $cumple2 = date('m-d', strtotime($rowAct['nacimiento']));
            if($cumple2 != $actual) {
                mysqli_query($con, "UPDATE matClientes SET estado = '1' WHERE id = '$rowAct[id]'");
            }
        }
        $titulo = 'Nuria Ropero';
        $preguntas = mysqli_query($con, "SELECT * FROM matPreguntas");
        $rowmail = mysqli_fetch_array($preguntas);
        $mensaje = "
        <html>
        <head>
        <title>HTML email</title>
        </head>
        <body>
        <p>".$rowmail['p19']."</p>
        <table>
        <tr>
        <th><img src='http://pendientines.com/nuriaRopero/img/img2.png'></th>
        </tr>
        <tr>
        <th><img src='http://pendientines.com/nuriaRopero/img/img1.png'></th>
        </tr>
        </table>
        </body>
        </html>
        ";
        $cabeceras = "MIME-Version: 1.0" . "\r\n";
        $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $cabeceras .= "From: Nuria Ropero" . "\r\n";
        $cabeceras .= "Reply-To: mail@mail.com" . "\r\n";
        while($row = mysqli_fetch_array($query)) {
            $cumple = date('m-d', strtotime($row['nacimiento']));
            if($cumple == $actual) {
                $para = $row['email'];
                mail($para, $titulo, $mensaje, $cabeceras);
                mysqli_query($con, "UPDATE matClientes set estado = '2' WHERE id = '$row[id]'");
            }
        }
        $dia = date('d');
        $ahora = date('Y-m-d');
        if($dia == 7 || $dia == 13 || $dia == 19 || $dia == 25) {
            $morosos = mysqli_query($con, "SELECT * FROM matClientes WHERE pagar > '0' AND proximo < '$ahora'");
            $montante = mysqli_query($con, "SELECT SUM(pagar) as pagar FROM matClientes WHERE pagar > '0' AND proximo < '$ahora'");
            $rmontante = mysqli_fetch_array(($montante));
            $string = '';
            while($rm = mysqli_fetch_array($morosos)) {
                $string .= $rm['nombre']." ".$rm['apellidos']." ".$rm['pagar']."<br>";
            }
           $mensaje = "<html>
           <head>
           <title>HTML email</title>
           </head>
           <body>
           <h2>Listado clientes pendientes de pago.</h2>
           <table>
           <tr><div>".$string."</div></tr>
           <tr><td>Total: ".$rmontante['pagar']."€</td></tr>
           <tr>
           <th><img src='http://pendientines.com/maternity/img/img1.png'></th>
           </tr>
           </table>
           </body>
           </html>";
           $cabeceras = "MIME-Version: 1.0" . "\r\n";
           $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
           $cabeceras .= "From: Nuria Ropero" . "\r\n";
           $cabeceras .= "Reply-To: mail@mail.com" . "\r\n";
           $titulo = 'Nuria Ropero';
           $para = 'nurya_1506@hotmail.com';
           if($rm['estado'] == 1) {
           mail($para, $titulo, $mensaje, $cabeceras);
           mysqli_query($con, "UPDATE matClientes set estado = '2'");
            }}
            if($dia != 7 || $dia != 13 || $dia != 19 || $dia != 25) {
                mysqli_query($con, "UPDATE matClientes set estado = '1'");
            }
           
          ?>
        </div>
        </div>
        
    </main>
    <script src="js/app.js"></script>
</body>
</html>