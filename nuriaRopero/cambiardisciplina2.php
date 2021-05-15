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

if($_REQUEST['disciplina'] != '') {
    $query = mysqli_query($con, "UPDATE matClientes set disciplina = '$_REQUEST[disciplina]', bono = '10' where id = '$_REQUEST[id]'");
}
if($_REQUEST['disciplina2'] != '') {
    $query2 = mysqli_query($con, "UPDATE matClientes set disciplina2 = '$_REQUEST[disciplina2]', bono = '10' where id = '$_REQUEST[id]'");
}    
if($_REQUEST['disciplina3'] != '') {
    $query3 = mysqli_query($con, "UPDATE matClientes set disciplina3 = '$_REQUEST[disciplina3]', bono = '10' where id = '$_REQUEST[id]'");
}
 
    if($_REQUEST['disciplina'] != '') {  
    mysqli_query($con, "UPDATE matSemActualAlumnos set disciplina = '$_REQUEST[disciplina]' where id = '$_REQUEST[id]'"); 
 }
 if($_REQUEST['disciplina2'] != '') {  
    mysqli_query($con, "UPDATE matSemActualAlumnos set disciplina2 = '$_REQUEST[disciplina2]' where id = '$_REQUEST[id]'"); 
 }
 if($_REQUEST['disciplina3'] != '') {  
    mysqli_query($con, "UPDATE matSemActualAlumnos set disciplina3 = '$_REQUEST[disciplina3]' where id = '$_REQUEST[id]'"); 
 }
 
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
        <div id="lienzo"> 
        <form action="cambiardisciplina3.php" method="post" class="formulario">
        <input type="hidden" value="<?php echo $_REQUEST['id'];?>" name="id">
            <table class="form">
            <?php 
            if($_REQUEST['disciplina'] != '') { 
            ?>
                <tr><td colspan="4"><h2><?php echo $_REQUEST['disciplina'];?></h2></td></tr>
                <tr><td><h3>Clase 1:</h3></td><td colspan="3"><h3>Clases Adicionales:</h3></td></tr>
                
                <!-- COMIENZAN LOS SELECT -->
                <tr><td id="disc"><select name="dia1" id="select1">
                    <option value=""></option>
                <?php
                if($_REQUEST['disciplina'] == 'Personal') {
                    echo "<option value='901'>1d/s</option>
                    <option value='902'>2d/s</option>";
                } else {
                 $queryCl = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina]' GROUP by dia, inicio ORDER BY id");
                    while($row = mysqli_fetch_array($queryCl)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row[id]' || dia2 = '$row[id]' ||
                                dia3 = '$row[id]' || dia4 = '$row[id]' || dia5 = '$row[id]' || dia6 = '$row[id]' || dia7 = '$row[id]' ||
                                dia8 = '$row[id]' || dia9 = '$row[id]' || dia10 = '$row[id]' || dia11 = '$row[id]' || dia12 = '$row[id]'");
                        $rowCuenta = mysqli_fetch_array($cuenta);
                                if($rowCuenta['total'] >= $row['aforo']) {
                                    echo "<option value=''>".$row['dia']." ".$row['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row['id']."'>".$row['dia']." ".$row['inicio']."</option>";
                       
                    }
                    }
                    ?>
                    <option value="226">Lista de Espera</option>
                </select></td>
                <?php
                if($_REQUEST['disciplina'] == 'Personal') {
                   echo "<td><select name='dia2'>";
                } else {
                ?>
                <td id="disc2"><select name="dia2" id="select2"> <?php } ?>
                    <option value=""></option>
                <?php
                 $queryCl2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina]' GROUP by dia, inicio ORDER BY id");
                    while($row2 = mysqli_fetch_array($queryCl2)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row2[id]' || dia2 = '$row2[id]' ||
                                dia3 = '$row2[id]' || dia4 = '$row2[id]' || dia5 = '$row2[id]' || dia6 = '$row2[id]' || dia7 = '$row2[id]' ||
                                dia8 = '$row2[id]' || dia9 = '$row2[id]' || dia10 = '$row2[id]' || dia11 = '$row2[id]' || dia12 = '$row2[id]'");
                        $rowCuenta = mysqli_fetch_array($cuenta);
                                if($rowCuenta['total'] >= $row2['aforo']) {
                                    echo "<option value=''>".$row2['dia']." ".$row2['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row2['id']."'>".$row2['dia']." ".$row2['inicio']."</option>";
                    }
                    }
                ?>
                </select></td>
                <td id="disc3"><select name="dia3" id="select3">
                    <option value=""></option>
                <?php
                 $queryCl3 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina]' GROUP by dia, inicio ORDER BY id");
                    while($row3 = mysqli_fetch_array($queryCl3)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row3[id]' || dia2 = '$row3[id]' ||
                                dia3 = '$row3[id]' || dia4 = '$row3[id]' || dia5 = '$row3[id]' || dia6 = '$row3[id]' || dia7 = '$row3[id]' ||
                                dia8 = '$row3[id]' || dia9 = '$row3[id]' || dia10 = '$row3[id]' || dia11 = '$row3[id]' || dia12 = '$row3[id]'");
                        $rowCuenta = mysqli_fetch_array($cuenta);
                                if($rowCuenta['total'] >= $row3['aforo']) {
                                    echo "<option value=''>".$row3['dia']." ".$row3['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row3['id']."'>".$row3['dia']." ".$row3['inicio']."</option>";
                    }
                    }
                ?>
                </select></td>
                <td id="disc4"><select name="dia4" id="select4">
                    <option value=""></option>
                <?php
                 $queryCl4 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina]' GROUP by dia, inicio ORDER BY id");
                    while($row4 = mysqli_fetch_array($queryCl4)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row4[id]' || dia2 = '$row4[id]' ||
                                dia3 = '$row4[id]' || dia4 = '$row4[id]' || dia5 = '$row4[id]' || dia6 = '$row4[id]' || dia7 = '$row4[id]' ||
                                dia8 = '$row4[id]' || dia9 = '$row4[id]' || dia10 = '$row4[id]' || dia11 = '$row4[id]' || dia12 = '$row4[id]'");
                        $rowCuenta = mysqli_fetch_array($cuenta);
                                if($rowCuenta['total'] >= $row4['aforo']) {
                                    echo "<option value=''>".$row4['dia']." ".$row4['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row4['id']."'>".$row4['dia']." ".$row4['inicio']."</option>";
                    }
                    }
                ?>
                </select></td>
                </tr><?php }} ?>
                        <!--  FINAL DE LOS SELECT -->
                        
            <?php 
            if($_REQUEST['disciplina2'] != '') { 
            ?>
            <!-- COMIENZAN LOS SELECT -->
            <tr><td colspan="4"><h2><?php echo $_REQUEST['disciplina2'];?></h2></td></tr>
            <tr><td id="disc5"><select name="dia5" id="select5">
                    <option value=""></option>
                <?php
                if($_REQUEST['disciplina2'] == 'Personal') {
                    echo "<option value='901'>1d/s</option>
                    <option value='902'>2d/s</option>";
                } else {
                 $queryCl5 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina2]' GROUP by dia, inicio ORDER BY id");
                    while($row5 = mysqli_fetch_array($queryCl5)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row5[id]' || dia2 = '$row5[id]' ||
                                dia3 = '$row5[id]' || dia4 = '$row5[id]' || dia5 = '$row5[id]' || dia6 = '$row5[id]' || dia7 = '$row5[id]' ||
                                dia8 = '$row5[id]' || dia9 = '$row5[id]' || dia10 = '$row5[id]' || dia11 = '$row5[id]' || dia12 = '$row5[id]'");
                        $rowCuenta = mysqli_fetch_array($cuenta);
                                if($rowCuenta['total'] >= $row5['aforo']) {
                                    echo "<option value=''>".$row5['dia']." ".$row5['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row5['id']."'>".$row5['dia']." ".$row5['inicio']."</option>";
                    }
                    }
                    ?>
                    <option value="226">Lista de Espera</option>
                </select></td>
                <?php
                    if($_REQUEST['disciplina2' == 'Presonal']) {
                      echo "<td><select name='dia6'>";  
                    } else {
                ?>
                <td id="disc6"><select name="dia6" id="select6"> <?php } ?>
                    <option value=""></option>
                <?php
                 $queryCl6 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina2]' GROUP by dia, inicio ORDER BY id");
                    while($row6 = mysqli_fetch_array($queryCl6)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row6[id]' || dia2 = '$row6[id]' ||
                                dia3 = '$row6[id]' || dia4 = '$row6[id]' || dia5 = '$row6[id]' || dia6 = '$row6[id]' || dia7 = '$row6[id]' ||
                                dia8 = '$row6[id]' || dia9 = '$row6[id]' || dia10 = '$row6[id]' || dia11 = '$row6[id]' || dia12 = '$row6[id]'");
                        $row6Cuenta = mysqli_fetch_array($cuenta);
                                if($row6Cuenta['total'] >= $row6['aforo']) {
                                    echo "<option value=''>".$row6['dia']." ".$row6['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row6['id']."'>".$row6['dia']." ".$row6['inicio']."</option>";
                    }
                    }
                ?>
                </select></td>
                <td id="disc7"><select name="dia7" id="select7">
                    <option value=""></option>
                <?php
                 $queryCl7 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina2]' GROUP by dia, inicio ORDER BY id");
                    while($row7 = mysqli_fetch_array($queryCl7)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row7[id]' || dia2 = '$row7[id]' ||
                                dia3 = '$row7[id]' || dia4 = '$row7[id]' || dia5 = '$row7[id]' || dia6 = '$row7[id]' || dia7 = '$row7[id]' ||
                                dia8 = '$row7[id]' || dia9 = '$row7[id]' || dia10 = '$row7[id]' || dia11 = '$row7[id]' || dia12 = '$row7[id]'");
                        $row7Cuenta = mysqli_fetch_array($cuenta);
                                if($row7Cuenta['total'] >= $row7['aforo']) {
                                    echo "<option value=''>".$row7['dia']." ".$row7['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row7['id']."'>".$row7['dia']." ".$row7['inicio']."</option>";
                    }
                    }
                ?>
                </select></td>
                <td id="disc8"><select name="dia8" id="select8">
                    <option value=""></option>
                <?php
                 $queryCl8 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina2]' GROUP by dia, inicio ORDER BY id");
                    while($row8 = mysqli_fetch_array($queryCl8)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row8[id]' || dia2 = '$row8[id]' ||
                        dia3 = '$row8[id]' || dia4 = '$row8[id]' || dia5 = '$row8[id]' || dia6 = '$row8[id]' || dia7 = '$row8[id]' ||
                        dia8 = '$row8[id]' || dia9 = '$row8[id]' || dia10 = '$row8[id]' || dia11 = '$row8[id]' || dia12 = '$row8[id]'");
                $row8Cuenta = mysqli_fetch_array($cuenta);
                        if($row8Cuenta['total'] >= $row8['aforo']) {
                            echo "<option value=''>".$row8['dia']." ".$row8['inicio']." || Plazas completas.</option>"; 
                        } else {
                echo "<option value='".$row8['id']."'>".$row8['dia']." ".$row8['inicio']."</option>";
            }
                    }
                ?>
                </select></td>
            </tr>
                        <!--  FINAL DE LOS SELECT -->
            <?php
            }} ?> 
            <?php 
            if($_REQUEST['disciplina3'] != '') { 
            ?>
            <!-- COMIENZAN LOS SELECT -->
            <tr><td colspan="4"><h2><?php echo $_REQUEST['disciplina3'];?></h2></td></tr>
            <tr><td id="disc9"><select name="dia9" id="select9">
                    <option value=""></option>
                <?php
                if($_REQUEST['disciplina3'] == 'Personal') {
                    echo "<option value='901'>1d/s</option>
                    <option value='902'>2d/s</option>";
                    
                } else {
                 $queryCl9 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina3]' GROUP by dia, inicio ORDER BY id");
                    while($row9 = mysqli_fetch_array($queryCl9)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row9[id]' || dia2 = '$row9[id]' ||
                                dia3 = '$row9[id]' || dia4 = '$row9[id]' || dia5 = '$row9[id]' || dia6 = '$row9[id]' || dia7 = '$row9[id]' ||
                                dia8 = '$row9[id]' || dia9 = '$row9[id]' || dia10 = '$row9[id]' || dia11 = '$row9[id]' || dia12 = '$row9[id]'");
                        $row9Cuenta = mysqli_fetch_array($cuenta);
                                if($row9Cuenta['total'] >= $row9['aforo']) {
                                    echo "<option value=''>".$row9['dia']." ".$row9['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row9['id']."'>".$row9['dia']." ".$row9['inicio']."</option>";
                    }
                    }
                    ?>
                    <option value="226">Lista de Espera</option>
                </select></td>
                <?php
                if($_REQUEST['disciplina3'] == 'Personal') {
                    echo "<td><select name='dia10'>";
                } else {
                ?>
                <td id="disc10"><select name="dia10" id="select10"> <?php } ?>
                    <option value=""></option>
                <?php
                 $queryCl10 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina3]' GROUP by dia, inicio ORDER BY id");
                    while($row10 = mysqli_fetch_array($queryCl10)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row10[id]' || dia2 = '$row10[id]' ||
                                dia3 = '$row10[id]' || dia4 = '$row10[id]' || dia5 = '$row10[id]' || dia6 = '$row10[id]' || dia7 = '$row10[id]' ||
                                dia8 = '$row10[id]' || dia9 = '$row10[id]' || dia10 = '$row10[id]' || dia11 = '$row10[id]' || dia12 = '$row10[id]'");
                        $row10Cuenta = mysqli_fetch_array($cuenta);
                                if($row10Cuenta['total'] >= $row10['aforo']) {
                                    echo "<option value=''>".$row10['dia']." ".$row10['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row10['id']."'>".$row10['dia']." ".$row10['inicio']."</option>";
                    }
                    }
                ?>
                </select></td>
                <td id="disc11"><select name="dia11" id="select11">
                    <option value=""></option>
                <?php
                 $queryCl11 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina3]' GROUP by dia, inicio ORDER BY id");
                    while($row11 = mysqli_fetch_array($queryCl11)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row11[id]' || dia2 = '$row11[id]' ||
                                dia3 = '$row11[id]' || dia4 = '$row11[id]' || dia5 = '$row11[id]' || dia6 = '$row11[id]' || dia7 = '$row11[id]' ||
                                dia8 = '$row11[id]' || dia9 = '$row11[id]' || dia10 = '$row11[id]' || dia11 = '$row11[id]' || dia12 = '$row11[id]'");
                        $row11Cuenta = mysqli_fetch_array($cuenta);
                                if($row11Cuenta['total'] >= $row11['aforo']) {
                                    echo "<option value=''>".$row11['dia']." ".$row11['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row11['id']."'>".$row11['dia']." ".$row11['inicio']."</option>";
                    }
                    }
                ?>
                </select></td>
                <td id="disc12"><select name="dia12" id="select12">
                    <option value=""></option>
                <?php
                 $queryCl12 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina3]' GROUP by dia, inicio ORDER BY id");
                    while($row12 = mysqli_fetch_array($queryCl12)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row12[id]' || dia2 = '$row12[id]' ||
                                dia3 = '$row12[id]' || dia4 = '$row12[id]' || dia5 = '$row12[id]' || dia6 = '$row12[id]' || dia7 = '$row12[id]' ||
                                dia8 = '$row12[id]' || dia9 = '$row12[id]' || dia10 = '$row12[id]' || dia11 = '$row12[id]' || dia12 = '$row12[id]'");
                        $row12Cuenta = mysqli_fetch_array($cuenta);
                                if($row12Cuenta['total'] >= $row12['aforo']) {
                                    echo "<option value=''>".$row12['dia']." ".$row12['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row12['id']."'>".$row12['dia']." ".$row12['inicio']."</option>";
                    }
                    }
                ?>
                </select></td>
            </tr>
                        <!--  FINAL DE LOS SELECT -->
            <?php
            }} ?>
                
                <?php
            if($_REQUEST['disciplina'] == 'Embarazo' || $_REQUEST['disciplina2'] == 'Embarazo' || $_REQUEST['disciplina3'] == 'Embarazo') {
            echo "<tr><td colspan='4'><h1>Cuestionario embarazo</h1></td></tr>";
            $preguntas = mysqli_query($con, "SELECT * FROM matPreguntas");
            $rowPreguntas = mysqli_fetch_array($preguntas);
            if($rowPreguntas['p1'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p1'].":<input type='text' name='alergias'></td></tr>";}
            if($rowPreguntas['p2'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p2'].":<input type='text' name='abortos'></td></tr>";}
            if($rowPreguntas['p3'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p3'].":<input type='text' name='enfermedades'></td></tr>";}
            if($rowPreguntas['p4'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p4'].":<input type='text' name='deportes'></td></tr>";}
            if($rowPreguntas['p5'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p5'].":<input type='text' name='p5'></td></tr>";}
            if($rowPreguntas['p6'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p6'].":<input type='text' name='p6'></td></tr>";}
            if($rowPreguntas['p7'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p7'].":<input type='text' name='p7'></td></tr>";}
            if($rowPreguntas['p8'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p8'].":<input type='text' name='p8'></td></tr>";}
            if($rowPreguntas['p9'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p9'].":<input type='text' name='p9'></td></tr>";}
            if($rowPreguntas['p10'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p10'].":<input type='text' name='p10'></td></tr>";}
            if($rowPreguntas['p11'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p11'].":<input type='text' name='p11'></td></tr>";}
            if($rowPreguntas['p12'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p12'].":<input type='text' name='p12'></td></tr>";}
            if($rowPreguntas['p13'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p13'].":<input type='text' name='p13'></td></tr>";}
            if($rowPreguntas['p14'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p14'].":<input type='text' name='p14'></td></tr>";}
            if($rowPreguntas['p15'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p15'].":<input type='text' name='p15'></td></tr>";}
            if($rowPreguntas['p16'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p16'].":<input type='text' name='p16'></td></tr>";}
            if($rowPreguntas['p17'] != '') {echo "<tr><td colspan='2'> ".$rowPreguntas['p17'].":<input type='text' name='p17'></td></tr>";}
            ?>
                <tr><td colspan="4">Semana de embarazo:<input type="number" name="semanas"></td></tr>
            <?php } ?>
            <h3 class="fracaso" id="mensaje">No puedes elegir la misma clase más de una vez</h3>
            <tr><td>Pago correspondiente a una quincena <input type="checkbox" name="quincena" value="quincena"></td></tr>
                <tr><td colspan="4"><input type="submit" value="FINALIZAR" class="submit" id="boton"></td></tr>
                </table></form>
                <a href="ficha.php?codigo=<?php echo $_REQUEST['id'];?>"><img src="img/atras.png" class="volver">
        </div>
</main>
<script src="js/disc.js"></script>
</body>
</html>