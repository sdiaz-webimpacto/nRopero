<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maternity-fitness App</title>
    <link href="css/estilo.css" rel="stylesheet" media="">
    <link rel="icon" href="img/favicon.png">
    <!--color: ff0d90-->
</head>
<body>
<?php
    $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
?>
    <header>
        <div id="cabecera">
            <div id="logo">
                <img src="img/logo.png" alt="logo">
            </div>
            <div id="menu">
                <h1 style="position:absolute; top:2%; width:50%; left:25%; color:white;">NUEVO CLIENTE</h1>
            </div>
        </div>
    </header>
    <main>
        
            <?php
                if($_POST['actFisRec'] == 'SI'|| $_POST['pechoF'] == 'SI' || $_POST['pechoR'] == 'SI' ||
                $_POST['vertigos'] == 'SI' || $_POST['conocimiento'] == 'SI' || $_POST['oseo'] == 'SI' ||
                $_POST['medCor'] == 'SI' || $_POST['otraRazon'] == 'SI') {
                    $rec = 'KO';
                } else {
                    $rec = 'OK';
                }
                $alta = date('Y-m-d');
                $buscaRegistros = mysqli_query($con, "SELECT COUNT(*) as total FROM matClientes WHERE nombre = '$_POST[nombreForm]'
                AND apellidos = '$_POST[apellidosForm]' AND dni = '$_POST[dni]'");
                $registro = mysqli_fetch_array($buscaRegistros);

                if($registro['total'] == '0') {
                    if($_POST['nombreForm'] != '') {
                $query = mysqli_query($con, "INSERT INTO matClientes (
                    nombre, apellidos, telefono, email, nacimiento, alta, direccion, rrss, familia, tutor, dnitutor,
                    patDolMed, actFisRec, pechoF, pechoR, vertigos, conocimiento, oseo, medCor, otraRazon, dni, prefDisc,
                    prefDisc2, prefDisc3, prefDisc4, prefDisc5, prefDisc6, cont
                ) values (
                    '$_POST[nombreForm]','$_POST[apellidosForm]','$_POST[telefonoForm]','$_POST[emailForm]',
                    '$_POST[nacimientoForm]','$alta','$_POST[direccionForm]','$_POST[rrss]','$_POST[familia]',
                    '$_POST[tutor]','$_POST[dnitutor]','$_POST[patDolMed]','$_POST[actFisRec]','$_POST[pechoF]',
                    '$_POST[pechoR]','$_POST[vertigos]','$_POST[conocimiento]','$_POST[oseo]','$_POST[medCor]',
                    '$_POST[otraRazon]','$_POST[dni]', '$_POST[prefDisc]', '$_POST[prefDisc2]', '$_POST[prefDisc3]',
                    '$_POST[prefDisc4]','$_POST[prefDisc5]','$_POST[prefDisc6]','$_POST[dni]'
                )");
                 mysqli_query($con,"INSERT INTO matSemActualAlumnos (
                    nombre, apellidos, telefono, email, nacimiento, alta, direccion, rrss, familia, tutor, dnitutor,
                    patDolMed, actFisRec, pechoF, pechoR, vertigos, conocimiento, oseo, medCor, otraRazon, dni, disciplina,
                    disciplina2, disciplina3
                ) values (
                    '$_POST[nombreForm]','$_POST[apellidosForm]','$_POST[telefonoForm]','$_POST[emailForm]',
                    '$_POST[nacimientoForm]','$date','$_POST[direccionForm]','$_POST[rrss]','$_POST[familia]',
                    '$_POST[tutor]','$_POST[dnitutor]','$_POST[patDolMed]','$_POST[actFisRec]','$_POST[pechoF]',
                    '$_POST[pechoR]','$_POST[vertigos]','$_POST[conocimiento]','$_POST[oseo]','$_POST[medCor]',
                    '$_POST[otraRazon]','$_POST[dni]','$_POST[disciplina]','$_POST[disciplina2]','$_POST[disciplina3]'
                )" );
                if($query) {
                    if($rec == 'OK') {
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
                            '$_POST[otraRazon]','$_POST[dni]','$_POST[disciplina]','$_POST[disciplina2]','$_POST[disciplina3]',
                            '$id'
                        )" );
                        echo "<p class='exito'>Se ha registrado correctamente, puede acudir a NURIA ROPERO a contratar sus
                         actividades <br> 
                         Puede iniciar su actividad física cumpliendo las siguientes recomendaciones:<br>
                         En caso de sentir dolor o si su estado de salud cambia durante el programa, interrumpa 
                         el ejercicio inmediatamente y repórtelo al personal de este centro y a su médico.</p>";
                    } else {
                        echo "<p class='exito'>Se ha registrado correctamente, aunque debe consultar al médico para que sea valorado por él y considere 
                        si la actividad física que piensa realizar es segura para su salud.</p>";
                    } }
                } else {
                    echo "<p class='fracaso'>No se ha logrado realizar el registro.<br>Contacte con NURIA ROPERO
                    para realizar el proceso.<br>Disculpe las molestias.</p>";
                }} else {
                    echo "<p class='fracaso'>Usted ya esta dado de alta, disculpe las molestias.</p>";
                }
            ?>
        
        
    </main>
    <?php
        mysqli_close($con);
    ?>
</body>
</html>