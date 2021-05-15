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
    echo $_SESSION['nombre']." | ";echo "<a href='".$archivoActual."?salir=1'>SALIR</a>"; ?>
        <div id="lienzo"> 
        <?php
        $date = date('Y-m-d');
        $proximo = date('Y-m-01');
        $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
        $buscar = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dni = '$_REQUEST[dni]'");
        $rowBuscar = mysqli_fetch_array($buscar);
        if($rowBuscar['total'] == '0') {
            if($_POST['nombreForm'] != '') {
        $insertarNuevoCliente = mysqli_query($con, "INSERT INTO matClientes (
            nombre, apellidos, telefono, email, nacimiento, alta, direccion, rrss, familia, tutor, dnitutor,
            patDolMed, actFisRec, pechoF, pechoR, vertigos, conocimiento, oseo, medCor, otraRazon, dni, disciplina,
            disciplina2, disciplina3, bono, cont
        ) values (
            '$_POST[nombreForm]','$_POST[apellidosForm]','$_POST[telefonoForm]','$_POST[emailForm]',
            '$_POST[nacimientoForm]','$date','$_POST[direccionForm]','$_POST[rrss]','$_POST[familia]',
            '$_POST[tutor]','$_POST[dnitutor]','$_POST[patDolMed]','$_POST[actFisRec]','$_POST[pechoF]',
            '$_POST[pechoR]','$_POST[vertigos]','$_POST[conocimiento]','$_POST[oseo]','$_POST[medCor]',
            '$_POST[otraRazon]','$_POST[dni]','$_POST[disciplina]','$_POST[disciplina2]','$_POST[disciplina3]', '10',
            '$_POST[dni]'
        )"); 
        if($insertarNuevoCliente) {
            $buscaId = mysqli_query($con, "SELECT id FROM matClientes WHERE dni = '$_REQUEST[dni]'");
            $resultId = mysqli_fetch_array($buscaId);
            $id = $resultId['id'];

            mysqli_query($con,"INSERT INTO matSemActualAlumnos (
                nombre, apellidos, telefono, email, nacimiento, alta, direccion, rrss, familia, tutor, dnitutor,
                patDolMed, actFisRec, pechoF, pechoR, vertigos, conocimiento, oseo, medCor, otraRazon, dni, disciplina,
                disciplina2, disciplina3, id
            ) values (
                '$_POST[nombreForm]','$_POST[apellidosForm]','$_POST[telefonoForm]','$_POST[emailForm]',
                '$_POST[nacimientoForm]','$date','$_POST[direccionForm]','$_POST[rrss]','$_POST[familia]',
                '$_POST[tutor]','$_POST[dnitutor]','$_POST[patDolMed]','$_POST[actFisRec]','$_POST[pechoF]',
                '$_POST[pechoR]','$_POST[vertigos]','$_POST[conocimiento]','$_POST[oseo]','$_POST[medCor]',
                '$_POST[otraRazon]','$_POST[dni]','$_POST[disciplina]','$_POST[disciplina2]','$_POST[disciplina3]','$id'
            )" );
            mysqli_query($con,"INSERT INTO matSemUnoAlumnos (
                nombre, apellidos, telefono, email, nacimiento, alta, direccion, rrss, familia, tutor, dnitutor,
                patDolMed, actFisRec, pechoF, pechoR, vertigos, conocimiento, oseo, medCor, otraRazon, dni, disciplina,
                disciplina2, disciplina3, id
            ) values (
                '$_POST[nombreForm]','$_POST[apellidosForm]','$_POST[telefonoForm]','$_POST[emailForm]',
                '$_POST[nacimientoForm]','$date','$_POST[direccionForm]','$_POST[rrss]','$_POST[familia]',
                '$_POST[tutor]','$_POST[dnitutor]','$_POST[patDolMed]','$_POST[actFisRec]','$_POST[pechoF]',
                '$_POST[pechoR]','$_POST[vertigos]','$_POST[conocimiento]','$_POST[oseo]','$_POST[medCor]',
                '$_POST[otraRazon]','$_POST[dni]','$_POST[disciplina]','$_POST[disciplina2]','$_POST[disciplina3]','$id'
            )" );

            echo "<h3 class='exito'>Se ha registrado correctamente</h3>";
        }}
        } else {echo "<h2 class='fracaso'>El cliente ya tiene ficha.</h2>";}
        
        ?>
        <form action="nuevocliente3.php" method="post" class="form">
            <input type="hidden" value='<?php echo $_REQUEST['dni'];?>' name="dni">
            <h1>Horario de clases</h1>
            <table class="form">
            <tr><td></tr><h3><?php echo $_REQUEST['disciplina'];?></h3></td>
            <tr><td id="disc"><select name="dia1" id="select1" >
                <option value=""></option>
                <?php

                if($_REQUEST['disciplina'] == 'Personal') {
                    echo "<option value='901'>1d/s</option>
                    <option value='902'>2d/s</option>";
                } else {

                $buscaHorarios = mysqli_query($con, "SELECT dia, inicio FROM matClases where nombre = '$_REQUEST[disciplina]' order by dia,hora");
                
                 $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina]' GROUP BY dia, inicio ORDER by id");
                    while($row = mysqli_fetch_array($clases)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row[id]' || dia2 = '$row[id]' ||
                                dia3 = '$row[id]' || dia4 = '$row[id]' || dia5 = '$row[id]' || dia6 = '$row[id]' || dia7 = '$row[id]' ||
                                dia8 = '$row[id]' || dia9 = '$row[id]' || dia10 = '$row[id]' || dia11 = '$row[id]' || dia12 = '$row[id]'");
                         
                        $rowCuenta = mysqli_fetch_array($cuenta);
                                if($rowCuenta['total'] >= $row['aforo']) {
                                    echo "<option value=''>".$row['dia']." ".$row['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row['id']."'>".$row['dia']." ".$row['inicio']."</option>";
                    }}
                ?>
                <option value="226">Lista de Espera</option>
                <?php } ?>
            </select></td></tr><tr>
            <?php
            if($_REQUEST['disciplina'] != 'Personal') {
                ?>
            <td id="disc2"><select name="dia2" id="select2">
            <option value=""></option>
                <?php
                 $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina]' GROUP BY dia, inicio ORDER by id");
                    while($row = mysqli_fetch_array($clases)) {
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
            </select></td></tr>
            <?php } ?>
            <tr><td id="disc3"><select name="dia3" id="select3">
            <option value=""></option>
                <?php
                 $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina]' GROUP BY dia, inicio ORDER by id");
                    while($row = mysqli_fetch_array($clases)) {
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
            </select></td></tr>
            <tr><td id="disc4"><select name="dia4" id="select4">
            <option value=""></option>
                <?php
                 $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina]' GROUP BY dia, inicio ORDER by id");
                    while($row = mysqli_fetch_array($clases)) {
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
            </select></td></tr>
            <?php
            if($_REQUEST['disciplina2'] != '') { ?>
            <tr><td><h3><?php echo $_REQUEST['disciplina2'];?></h3></td></tr>
            <tr><td id="disc5"><select name="dia5" id="select5">
                <option value=""></option>
                <?php

                if($_REQUEST['disciplina2'] == 'Personal') {
                    echo "<option value='901'>1d/s</option>
                    <option value='902'>2d/s</option>";
                } else {

                 $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina2]' GROUP BY dia, inicio ORDER by id");
                    while($row = mysqli_fetch_array($clases)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row[id]' || dia2 = '$row[id]' ||
                                dia3 = '$row[id]' || dia4 = '$row[id]' || dia5 = '$row[id]' || dia6 = '$row[id]' || dia7 = '$row[id]' ||
                                dia8 = '$row[id]' || dia9 = '$row[id]' || dia10 = '$row[id]' || dia11 = '$row[id]' || dia12 = '$row[id]'");
                        $rowCuenta = mysqli_fetch_array($cuenta);
                        if($_REQUEST['disciplina2'] == 'Personal') {
                            echo "<option value='901'>1d/s</option>
                            <option value='902'>2d/s</option>";
                        } else {
                                if($rowCuenta['total'] >= $row['aforo']) {
                                    echo "<option value=''>".$row['dia']." ".$row['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row['id']."'>".$row['dia']." ".$row['inicio']."</option>";
                    }
                    }}
                ?>
                <option value="226">Lista de Espera</option>
                
                <?php
                    }
                ?>
            </select></td></tr>
            <?php
            if($_REQUEST['disciplina'] != 'Personal') {
                ?>
            <tr><td id="disc6"><select name="dia6" id="select6">
              
            <option value=""></option>
                <?php
                 $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina2]' GROUP BY dia, inicio ORDER by id");
                    while($row = mysqli_fetch_array($clases)) {
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
            </select></td></tr>
            <?php } ?>
            <tr><td id="disc7"><select name="dia7" id="select7">
            <option value=""></option>
                <?php
                 $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina2]' GROUP BY dia, inicio ORDER by id");
                    while($row = mysqli_fetch_array($clases)) {
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
            </select></td></tr>
            <tr><td id="disc8"><select name="dia8" id="select8">
            <option value=""></option>
                <?php
                 $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina2]' GROUP BY dia, inicio ORDER by id");
                    while($row = mysqli_fetch_array($clases)) {
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
            </select></td></tr>
            <?php }
            if($_REQUEST['disciplina3'] != '' && $_REQUEST['disciplina3'] != 'Personal1' && $_REQUEST['disciplina3'] != 'Personal2') { ?>
            <tr><td><h3><?php echo $_REQUEST['disciplina3'];?></h3></td></tr>
            <tr><td id="disc9"><select name="dia9" id="select9">
                <option value=""></option>
                <?php

                if($_REQUEST['disciplina3'] == 'Personal') {
                    echo "<option value='901'>1d/s</option>
                    <option value='902'>2d/s</option>";
                } else {

                 $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina3]' GROUP BY dia, inicio ORDER by id");
                    while($row = mysqli_fetch_array($clases)) {
                        $cuenta = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE dia1 = '$row[id]' || dia2 = '$row[id]' ||
                                dia3 = '$row[id]' || dia4 = '$row[id]' || dia5 = '$row[id]' || dia6 = '$row[id]' || dia7 = '$row[id]' ||
                                dia8 = '$row[id]' || dia9 = '$row[id]' || dia10 = '$row[id]' || dia11 = '$row[id]' || dia12 = '$row[id]'");
                        $rowCuenta = mysqli_fetch_array($cuenta);
                        if($_REQUEST['disciplina3'] == 'Personal') {
                            echo "<option value='901'>1d/s</option>
                            <option value='902'>2d/s</option>";
                        } else {
                                if($rowCuenta['total'] >= $row['aforo']) {
                                    echo "<option value=''>".$row['dia']." ".$row['inicio']." || Plazas completas.</option>"; 
                                } else {
                        echo "<option value='".$row['id']."'>".$row['dia']." ".$row['inicio']."</option>";
                    }
                    }}
                ?>
                <option value="226">Lista de Espera</option>
                <?php
                    }
                ?>
            </select></td></tr>
            <?php
            if($_REQUEST['disciplina'] != 'Personal') {
                ?>
            <tr><td id="disc10"><select name="dia10" id="select10">
            <option value=""></option>
                <?php
                 $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina3]' GROUP BY dia, inicio ORDER by id");
                    while($row2 = mysqli_fetch_array($clases)) {
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
            </select></td></tr>
            <?php } ?>
            <tr><td id="disc11"><select name="dia11" id="select11">
            <option value=""></option>
                <?php
                 $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina3]' GROUP BY dia, inicio ORDER by id");
                    while($row = mysqli_fetch_array($clases)) {
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
            </select></tr>
            <tr><td id="disc12"><select name="dia12" id="select12">
            <option value=""></option>
                <?php
                 $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$_REQUEST[disciplina3]' GROUP BY dia, inicio ORDER by id");
                    while($row = mysqli_fetch_array($clases)) {
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
            </select></td></tr>
                <?php }
            if($_REQUEST['disciplina'] == 'Embarazo' || $_REQUEST['disciplina2'] == 'Embarazo' ||$_REQUEST['disciplina3'] == 'Embarazo' ) {
            ?>
            <tr><td><h1>Cuestionario embarazo</h1></td></tr>
            <?php
            $preguntas = mysqli_query($con, "SELECT * FROM matPreguntas");
            $rowPreguntas = mysqli_fetch_array($preguntas);
            if($rowPreguntas['p1'] != '') {
                echo "<tr><td>".$rowPreguntas['p1'].":</td></tr></td></tr><tr><td><input type='text' name='alergias' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p2'] != 0) {
                echo "<tr><td>".$rowPreguntas['p2'].":</td></tr><tr><td><input type='text' name='abortos' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p3'] != '') {
                echo "<tr><td>".$rowPreguntas['p3'].":</td></tr><tr><td><input type='text' name='enfermedades' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p4'] != '') {
                echo "<tr><td>".$rowPreguntas['p4'].":</td></tr><tr><td><input type='text' name='deportes' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p5'] != '') {
                echo "<tr><td>".$rowPreguntas['p5'].":</td></tr><tr><td><input type='text' name='p5' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p6'] != '') {
                echo "<tr><td>".$rowPreguntas['p6'].":</td></tr><tr><td><input type='text' name='p6' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p7'] != '') {
                echo "<tr><td>".$rowPreguntas['p7'].":</td></tr><tr><td><input type='text' name='p7' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p8'] != '') {
                echo "<tr><td>".$rowPreguntas['p8'].":</td></tr><tr><td><input type='text' name='p8' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p9'] != '') {
                echo "<tr><td>".$rowPreguntas['p9'].":</td></tr><tr><td><input type='text' name='p9' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p10'] != '') {
                echo "<tr><td>".$rowPreguntas['p10'].":</td></tr><tr><td><input type='text'  name='p10' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p11'] != '') {
                echo "<tr><td>".$rowPreguntas['p11']."</td></tr>:<tr><td><input type='text'  name='p11' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p12'] != '') {
                echo "<tr><td>".$rowPreguntas['p12'].":</td></tr><tr><td><input type='text'  name='p12' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p13'] != '') {
                echo "<tr><td>".$rowPreguntas['p13'].":</td></tr><tr><td><input type='text'  name='p13' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p14'] != '') {
                echo "<tr><td>".$rowPreguntas['p14'].":</td></tr><tr><td><input type='text'  name='p14' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p15'] != '') {
                echo "<tr><td>".$rowPreguntas['p15'].":</td></tr><tr><td><input type='text'  name='p15' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p16'] != '') {
                echo "<tr><td>".$rowPreguntas['p16'].":</td></tr></td></tr><tr><td><input type='text'  name='p16' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            if($rowPreguntas['p17'] != '') {
                echo "<tr><td>".$rowPreguntas['p17'].":</td></tr><tr><td><input type='text'  name='p17' pattern='[a-zA-Z0-9 .,-_@]{1,}'></td></tr>";
            }
            ?>
                <tr><td>Semana de embarazo:</td></tr><tr><td><input type="number" name="semanas"></td></tr>
            <?php } ?>
            <tr><td>Pago correspondiente a una quincena <input type="checkbox" name="quincena" value="quincena"></td></tr>
            <tr><td><input type="submit" value="CONFIRMAR" class="submit"></td></tr>
                </table>
        </form>
        </div>
</main>
<footer>
    
</footer>
<?php
    mysqli_close($con);
?>
<script src="js/disc.js"></script>
</body>
</html>