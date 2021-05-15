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
    include("partes/header.php");
    ?>
    <main>
    <?php 
    if($_GET['salir']) {
        session_destroy();
        header("refresh:0;url='".$archivoActual);
    }
    $archivoActual = $_SERVER['PHP_SELF'];
    echo "<p>".$_SESSION['nombre']." | ";echo "<a href='".$archivoActual."?salir=1'>SALIR</a></p>"; ?>
        <?php
         $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
         $alumno = mysqli_query($con, "SELECT * FROM matClientes WHERE id = '$_GET[codigo]'");         
         $ralumno = mysqli_fetch_array($alumno);
         if($_GET['borrar']) {
            $eliminado = mysqli_query($con, "UPDATE matClientes set disciplina = '',
                                                                         disciplina2 = '',
                                                                         disciplina3 = '',
                                                                         dia1 = '0',
                                                                         dia2 = '0',
                                                                         dia3 = '0',
                                                                         dia4 = '0',
                                                                         dia5 = '0',
                                                                         dia6 = '0',
                                                                         dia7 = '0',
                                                                         dia8 = '0',
                                                                         dia9 = '0',
                                                                         dia10 = '0',
                                                                         dia11 = '0',
                                                                         dia12 = '0' WHERE id = '$_GET[borrar]'");
            echo "<h1 class='exito'>Se ha limpiado la ficha sitisfactoriamente.</h1>";
            echo "<a href='ficha.php?codigo=".$_GET['codigo']."'><img src='img/atras.png' class='volver-fuera'>";
        } else {
         ?>
         <a href="cambiardisciplina.php?id=<?php echo $ralumno['id'];?>"><button class="submenus">Disciplinas</button></a>
                    <?php if($ralumno['disciplina'] == 'Embarazo' || $ralumno['disciplina2'] == 'Embarazo' || 
                    $ralumno['disciplina3'] == 'Embarazo') { ?>
         <button class="submenus" id="matriz">Embarazo</button>
         <button class="submenus" id="actual">Ficha</button> 
                    <?php } ?>
        <a href="ficha.php?codigo=<?php echo $_GET['codigo'];?>&borrar=<?php echo $_GET['codigo'];?>"><button class="submenus">Limpiar Clases</button></a>
         <div id="cuadro">
         <h1><?php echo $ralumno['nombre']." ".$ralumno['apellidos'];?></h1>
             <h3>Gestión del Embarazo</h3><br><br>
             <form action="ficha2.php" method="post" class="formulario">
            <?php
            $preguntas = mysqli_query($con, "SELECT * FROM matPreguntas");
            $rowPreguntas = mysqli_fetch_array($preguntas);
            if($_GET['eliminar']) {
                mysqli_query($con, "DELETE FROM matClientes WHERE id = '$_GET[codigo]'");
                header("refresh:0;url='clientes.php'");}
            
            if($_GET['limpiar'] == '1') {
                mysqli_query($con, "UPDATE matClientes SET disciplina = '',
                                                            dia1 = '0',
                                                            dia2 = '0',
                                                            dia3 = '0',
                                                            dia4 = '0' WHERE id = '$ralumno[id]'");
                $archivoActual = $_SERVER['PHP_SELF'];
                header("refresh:0;url='".$archivoActual."?codigo=".$ralumno['id']);}
                if($_GET['limpiar'] == '2') {
                    mysqli_query($con, "UPDATE matClientes SET disciplina2 = '',
                                                                dia5 = '0',
                                                                dia6 = '0',
                                                                dia7 = '0',
                                                                dia8 = '0' WHERE id = '$ralumno[id]'");
                    $archivoActual = $_SERVER['PHP_SELF'];
                    header("refresh:0;url='".$archivoActual."?codigo=".$ralumno['id']);
            }
            if($_GET['limpiar'] == '3') {
                mysqli_query($con, "UPDATE matClientes SET disciplina3 = '',
                                                            dia9 = '0',
                                                            dia10 = '0',
                                                            dia11 = '0',
                                                            dia12 = '0' WHERE id = '$ralumno[id]'");
                $archivoActual = $_SERVER['PHP_SELF'];
                header("refresh:0;url='".$archivoActual."?codigo=".$ralumno['id']);}
            if($rowPreguntas['p1'] != '') {
                echo $rowPreguntas['p1'].":<input type='text' value='".$ralumno['alergias']."' name='alergias'><br><br>";
            }
            if($rowPreguntas['p2'] != 0) {
                echo $rowPreguntas['p2'].":<input type='text' value='".$ralumno['abortos']."' name='abortos'><br><br>";
            }
            if($rowPreguntas['p3'] != '') {
                echo $rowPreguntas['p3'].":<input type='text' value='".$ralumno['enfermedades']."' name='enfermedades'><br><br>";
            }
            if($rowPreguntas['p4'] != '') {
                echo $rowPreguntas['p4'].":<input type='text' value='".$ralumno['deportes']."' name='deportes'><br><br>";
            }
            if($rowPreguntas['p5'] != '') {
                echo $rowPreguntas['p5'].":<input type='text' value='".$ralumno['p5']."' name='p5'><br><br>";
            }
            if($rowPreguntas['p6'] != '') {
                echo $rowPreguntas['p6'].":<input type='text' value='".$ralumno['p6']."' name='p6'><br><br>";
            }
            if($rowPreguntas['p7'] != '') {
                echo $rowPreguntas['p7'].":<input type='text' value='".$ralumno['p7']."' name='p7'><br><br>";
            }
            if($rowPreguntas['p8'] != '') {
                echo $rowPreguntas['p8'].":<input type='text' value='".$ralumno['p8']."' name='p8'><br><br>";
            }
            if($rowPreguntas['p9'] != '') {
                echo $rowPreguntas['p9'].":<input type='text' value='".$ralumno['p9']."' name='p9'><br><br>";
            }
            if($rowPreguntas['p10'] != '') {
                echo $rowPreguntas['p10'].":<input type='text' value='".$ralumno['p10']."' name='p10'><br><br>";
            }
            if($rowPreguntas['p11'] != '') {
                echo $rowPreguntas['p11'].":<input type='text' value='".$ralumno['p11']."' name='p11'><br><br>";
            }
            if($rowPreguntas['p12'] != '') {
                echo $rowPreguntas['p12'].":<input type='text' value='".$ralumno['p12']."' name='p12'><br><br>";
            }
            if($rowPreguntas['p13'] != '') {
                echo $rowPreguntas['p13'].":<input type='text' value='".$ralumno['p13']."' name='p13'><br><br>";
            }
            if($rowPreguntas['p14'] != '') {
                echo $rowPreguntas['p14'].":<input type='text' value='".$ralumno['p14']."' name='p14'><br><br>";
            }
            if($rowPreguntas['p15'] != '') {
                echo $rowPreguntas['p15'].":<input type='text' value='".$ralumno['p15']."' name='p15'><br><br>";
            }
            if($rowPreguntas['p16'] != '') {
                echo $rowPreguntas['p16'].":<input type='text' value='".$ralumno['p16']."' name='p16'><br><br>";
            }
            if($rowPreguntas['p17'] != '') {
                echo $rowPreguntas['p17'].":<input type='text' value='".$ralumno['p17']."' name='p17'><br><br>";
            }
            ?>

            Semana de embarazo: <input type="number" value="<?php echo $ralumno['semanas'];?>" name="semanas"><br><br><br><br>
            <?php if($ralumno['disciplina'] == 'Embarazo' || $ralumno['disciplina2'] == 'Embarazo' || $ralumno['disciplina3'] == 'Embarazo') { ?>
                <a href='seguimiento.php?id=<?php echo $_GET['codigo'];?>'><img src='img/seg.png' style='border:2px solid #ff0d90;border-radius:16px;padding:5px;'></a>
            <?php } else { ?>
            <a href='seguimiento.php?id=<?php echo $_GET['codigo'];?>'><img src='img/seguimiento.png' style='border:2px solid #ff0d90;border-radius:16px;padding:5px;'></a><?php } ?>
         </div>
         <div id="cuadro2">
         <input type="text" class="especial" name="nombre" value="<?php echo $ralumno['nombre'];?>" pattern="[a-z A-Záéíóú]{1,}">
         <input type="text" class="especial" name="apellidos" value="<?php echo $ralumno['apellidos'];?>" pattern="[a-z A-Záéíóú]{1,}">
         <a href="ficha.php?codigo=<?php echo $_GET['codigo'];?>&eliminar=1"><span style="float:right; font-size:1em; padding:1%;" class="delete">X</span></a>
        </h1>
         <h3>
         <?php
            if($ralumno['rrss'] == 'SI') {
                echo "Publicida, marketing y RRSS autorizadas.";
            }
         ?>
         </h3>
        <input type="hidden" value="<?php echo $ralumno['id'];?>" name="id">
        Dirección:<br>
        <input type="text" value="<?php echo $ralumno['direccion'];?>" name="direccion"><br><br>
        Telefono:<input type="text" value="<?php echo $ralumno['telefono'];?>" name="telefono">
        eMail:<input type="email" value="<?php echo $ralumno['email'];?>" name="email"><br><br>
        Fecha de alta:<input type="date" value="<?php echo $ralumno['alta'];?>" name="alta">
        Fecha nacimiento:<input type="date" value="<?php echo $ralumno['nacimiento'];?>" name="nacimiento">
        DNI:<input type="text" name="dni" pattern="[0-9a-zA-Z]{9,12}" value="<?php echo $ralumno['dni'];?>"><br><br>
        Cuota:<input type="float" value="<?php echo $ralumno['cuota'];?>€" name="cuota">
        Ultimo pago:<input type="date" value="<?php echo $ralumno['pago'];?>" name="pago" readonly>
        Próximo pago:<input type="date" value="<?php echo $ralumno['proximo'];?>" name="proximo" readonly>
        Deuda:<input type="float" value="<?php echo $ralumno['pagar'];?>€" name="pagar">
        <br><br>
        Metodo de pago:
        <select name="metodo">
        <option value="<?php echo $ralumno['metodoPago'];?>"><?php echo $ralumno['metodoPago'];?></option>
        <option value="domiciliado">Domiciliado</option>
        <option value="">No domiciliado</option>
        </select>
        Dolencias:<input type="text" value="<?php echo $ralumno['patDolMed'];?>" name="patDolMed" pattern="[a-zA-Z 0-9,._-/@]{0,}">
        <br><br>
        Disciplina y clases:<br>
        <?php if($ralumno['disciplina'] != '') { ?>
        <input type="text" value="<?php echo $ralumno['disciplina']?>" name="disciplina" style="background-color:#ff0d90; color:white;" readonly>
        <input type="text" value="<?php  
            $clase = mysqli_query($con, "SELECT * FROM matClases WHERE id = '$ralumno[dia1]'");
            $rc = mysqli_fetch_array($clase);
                echo $rc['dia']." ".$rc['inicio'];?>" name="dia1" readonly>
        <input type="text" value="<?php 
         $clase = mysqli_query($con, "SELECT * FROM matClases WHERE id = '$ralumno[dia2]'");
         $rc = mysqli_fetch_array($clase);
             echo $rc['dia']." ".$rc['inicio'];?>" name="dia2" readonly>
        <input type="text" value="<?php  
        $clase = mysqli_query($con, "SELECT * FROM matClases WHERE id = '$ralumno[dia3]'");
            $rc = mysqli_fetch_array($clase);
                echo $rc['dia']." ".$rc['inicio'];?>" name="dia3" readonly>
        <input type="text" value="<?php  
        $clase = mysqli_query($con, "SELECT * FROM matClases WHERE id = '$ralumno[dia4]'");
            $rc = mysqli_fetch_array($clase);
                echo $rc['dia']." ".$rc['inicio'];?>" name="dia4" readonly>
                <a href="ficha.php?codigo=<?php echo $ralumno['id']."&limpiar=1";?>" class="delete2">X</a>
                <br><br>
            <?php }
        if($ralumno['disciplina2'] != '') { ?>
            <input type="text" value="<?php echo $ralumno['disciplina2']?>" name="disciplina2" style="background-color:#ff0d90; color:white;" readonly>
        <input type="text" value="<?php  
            $clase = mysqli_query($con, "SELECT * FROM matClases WHERE id = '$ralumno[dia5]'");
            $rc = mysqli_fetch_array($clase);
                echo $rc['dia']." ".$rc['inicio'];?>" name="dia5" readonly>
        <input type="text" value="<?php 
         $clase = mysqli_query($con, "SELECT * FROM matClases WHERE id = '$ralumno[dia6]'");
         $rc = mysqli_fetch_array($clase);
             echo $rc['dia']." ".$rc['inicio'];?>" name="dia6" readonly>
        <input type="text" value="<?php  
        $clase = mysqli_query($con, "SELECT * FROM matClases WHERE id = '$ralumno[dia7]'");
            $rc = mysqli_fetch_array($clase);
                echo $rc['dia']." ".$rc['inicio'];?>" name="dia7" readonly>
        <input type="text" value="<?php  
        $clase = mysqli_query($con, "SELECT * FROM matClases WHERE id = '$ralumno[dia8]'");
            $rc = mysqli_fetch_array($clase);
                echo $rc['dia']." ".$rc['inicio'];?>" name="dia8" readonly>
                <a href="ficha.php?codigo=<?php echo $ralumno['id']."&limpiar=2";?>" class="delete2">X</a>
                <br><br>
          
               <?php  }    if($ralumno['disciplina3'] != '')  { ?>
                <input type="text" value="<?php echo $ralumno['disciplina3']?>" name="disciplina3" style="background-color:#ff0d90; color:white;" readonly>
        <input type="text" value="<?php  
            $clase = mysqli_query($con, "SELECT * FROM matClases WHERE id = '$ralumno[dia9]'");
            $rc = mysqli_fetch_array($clase);
                echo $rc['dia']." ".$rc['inicio'];?>" name="dia9" readonly>
        <input type="text" value="<?php 
         $clase = mysqli_query($con, "SELECT * FROM matClases WHERE id = '$ralumno[dia10]'");
         $rc = mysqli_fetch_array($clase);
             echo $rc['dia']." ".$rc['inicio'];?>" name="dia10" readonly>
        <input type="text" value="<?php  
        $clase = mysqli_query($con, "SELECT * FROM matClases WHERE id = '$ralumno[dia11]'");
            $rc = mysqli_fetch_array($clase);
                echo $rc['dia']." ".$rc['inicio'];?>" name="dia11" readonly>
        <input type="text" value="<?php  
        $clase = mysqli_query($con, "SELECT * FROM matClases WHERE id = '$ralumno[dia12]'");
            $rc = mysqli_fetch_array($clase);
                echo $rc['dia']." ".$rc['inicio'];?>" name="dia12" readonly>
                <a href="ficha.php?codigo=<?php echo $ralumno['id']."&limpiar=3";?>" class="delete2">X</a>
                <br><br> <?php } ?>
                <input type="submit" value="MODIFICAR" class="submit"><br><br>
                
        </form>
        <a href="javascript:history.back(-1);"><img src="img/atras.png" class="volver">
        <p class="pie">
                    <a href="autorizacion.php?codigo=<?php echo $_GET['codigo'];?>">Normas de uso</a> || 
                    <a href="protecciónDatos.php?codigo=<?php echo $_GET['codigo'];?>">Política de protección de datos</a> || 
                    <a href="parq.php?codigo=<?php echo $_GET['codigo'];?>">PAR-Q</a> ||
                    <a href="doc14b.php?codigo=<?php echo $_GET['codigo'];?>">Protección datos +18</a> ||
                    <a href="doc14F.php?codigo=<?php echo $_GET['codigo'];?>">Protección datos -18</a> ||
                    <a href="covid19.php?codigo=<?php echo $_GET['codigo'];?>">COVID 19</a>
                    </p>
         </div>
         <?php } ?>
    </main>
    <?php
    mysqli_close($con);
    ?>
    <script src="js/app.js"></script>
</body>
</html>