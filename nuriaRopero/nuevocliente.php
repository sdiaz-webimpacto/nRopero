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
        <div id="lienzo"> 
        <form action="nuevocliente2.php" method="post" class="formulario" autocomplete="off">
            <table class="form">
                <tr><td><h3>Nombre:</h3></td><td><h3>Apellidos:</h3></td></tr>
                <tr><td><input type="text" name="nombreForm" pattern="[a-zA-Z áéíóú]{1,}" required></td>
                <td><input type="text" name="apellidosForm" pattern="[a-zA-Z áéíóú]{1,}" required></td></tr>
                <tr><td><h3>Telefono:</h3></td><td><h3>eMail:</h3></td></tr>
                <tr><td><input type="number" name="telefonoForm" size="9" required></td>
                <td><input type="email" name="emailForm" required></td></tr>
                <tr><td><h3>Fecha nacimiento:</h3></td><td><h3>Dirección:</h3></td></tr>
                <tr><td><input type="date" name="nacimientoForm" required></td>
                <td><input type="text" name="direccionForm" pattern="[a-zA-Z áéíóú-_/ºª0-9()]{1,}" required></td></tr>
                
                <tr><td><h3>DNI</h3></td><td><p><b> Autorizo a que se muestre mi imagen de forma puntual <br> con fines de publicidad y marketing, asi como en RRSS.</b></p></td></tr>
                <tr><td><input type="text" name="dni" pattern="[a-zA-Z0-9]{9,12}" required></td>
                <td>SI<input type="radio" name="rrss" value="SI" style="width:15%;" required>
                    NO<input type="radio" name="rrss" value="NO" style="width:15%;" required></td></tr>
                    <tr><td><br></td></tr>

                <tr><td colspan="2"><p><b>
                ¿Alguna vez el médico le ha dicho que usted tiene un problema <br>
                cardíaco y que por eso sólo debería realizar actividad física recomendada por él?
                </b></p></td></tr>
                <tr><td colspan="2">SI<input type="radio" name="actFisRec" value="SI" style="width:15%;" required>
                    NO<input type="radio" name="actFisRec" value="NO" style="width:15%;" required></td></tr>

                    <tr><td colspan="2"><p><b>
                    ¿Cuando hace actividad física siente dolor en el pecho?
                </b></p></td></tr>
                <tr><td colspan="2">SI<input type="radio" name="pechoF" value="SI" style="width:15%;" required>
                    NO<input type="radio" name="pechoF" value="NO" style="width:15%;" required></td></tr>

                    <tr><td colspan="2"><p><b>
                    ¿En el último mes y estando en reposo, ha sentido dolor en el pecho?
                </b></p></td></tr>
                <tr><td colspan="2">SI<input type="radio" name="pechoR" value="SI" style="width:15%;" required>
                    NO<input type="radio" name="pechoR" value="NO" style="width:15%;" required></td></tr>

                    <tr><td colspan="2"><p><b>
                    ¿Pierde el equilibrio por mareos o vértigo? 
                </b></p></td></tr>
                <tr><td colspan="2">SI<input type="radio" name="vertigos" value="SI" style="width:15%;" required>
                    NO<input type="radio" name="vertigos" value="NO" style="width:15%;" required></td></tr>

                    <tr><td colspan="2"><p><b>
                    ¿Alguna vez ha perdido el conocimiento? 
                </b></p></td></tr>
                <tr><td colspan="2">SI<input type="radio" name="conocimiento" value="SI" style="width:15%;" required>
                    NO<input type="radio" name="conocimiento" value="NO" style="width:15%;" required></td></tr>

                    <tr><td colspan="2"><p><b>
                    ¿Tiene un problema óseo o articular que pudiera empeorar por un aumento en su actividad física habitual? 
                </b></p></td></tr>
                <tr><td colspan="2">SI<input type="radio" name="oseo" value="SI" style="width:15%;" required>
                    NO<input type="radio" name="oseo" value="NO" style="width:15%;" required></td></tr>

                    <tr><td colspan="2"><p><b>
                    ¿Actualmente el médico le está prescribiendo medicamentos (por ejemplo diuréticos) 
                    para su presión arterial o para su corazón? 
                </b></p></td></tr>
                <tr><td colspan="2">SI<input type="radio" name="medCor" value="SI" style="width:15%;" required>
                    NO<input type="radio" name="medCor" value="NO" style="width:15%;" required></td></tr>

                    <tr><td colspan="2"><p><b>
                    ¿Conoce alguna otra razón por la cual no debería hacer actividad física?
                </b></p></td></tr>
                <tr><td colspan="2">SI<input type="radio" name="otraRazon" value="SI" style="width:15%;" required>
                    NO<input type="radio" name="otraRazon" value="NO" style="width:15%;" required></td></tr>

                    <tr><td colspan="2"><p><b>
                    Indique cualquier dato que considere relevante en cuanto a patologías, dolores o medicación.
                </b></p></td></tr>
                <tr><td colspan="2"><textarea name="patDolMed" cols="30" rows="8" pattern="[a-zA-Z 0-9áéíóú.,-_/@]{1,250}"></textarea>
                    </td></tr>
                    <tr><td colspan="2">
                        <p style="background-color:green;color:white;padding:1%;">
                            Los siguientes 3 campos se rellenan unicamente en caso de ser un alumno menor de edad.</p>
                    </td></tr>
                    <tr><td><h3>Padre, madre o tutor.</h3></td><td><h3>Nombre</h3></td></tr>
                    <tr><td>
                        <select name="familia">
                            <option value=""></option>
                            <option value="Padre">Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Tutor">Tutor</option>
                        </select>
                    </td><td>
                        <input type="text" name="tutor" pattern="[a-z A-Z]{1,}">
                    </td></tr>

                    <tr><td colspan="2"><h3>DNI del tutor</h3></td></tr>
                    <tr><td colspan="2"><input type="text" name="dnitutor" pattern="[a-zA-Z0-9]{9,12}"></td></tr>
                    <tr><td colspan="2">Acepto las normas y politicas de privacidad y protección de datos, así como los documentos que 
                        pueden leerse en los enlaces siguientes.
                    </td></tr>
                    <tr><td colspan="2">
                        <input type="checkbox" name="conforme" value="aceptado" required>
                    </td></tr>
                    <tr><td colspan="2">
                    <p class="pie">
                    <a href="docs/Autorizacion e Informacion normas 2020.pdf">Normas de uso</a> ||  
                    <a href="docs/PAR-Q word.pdf">PAR-Q</a> ||
                    <a href="docs/Doc 14B modificado 2810 Nuria Ropero.pdf">Protección datos +18</a> ||
                    <a href="docs/Doc 14F modificado 2810 Nuria Ropero.pdf">Protección datos -18</a> ||
                    <a href="docs/COVID-19.pdf">COVID 19</a>
                    </p>
                    </td></tr>
                
                <tr id="disc"><td><h3>Disciplina:</h3><select name="disciplina" id="select1">
                <?php
                    $query = mysqli_query($con, "SELECT * FROM matClases WHERE nombre != 'espera' GROUP by nombre");
                    while($row = mysqli_fetch_array($query)) {
                        echo "<option value='".$row['nombre']."'>".$row['nombre']."</option>";
                    }
                ?>
                </select></td>
                <tr id="disc2">
                <td><h3>Disciplina:</h3><select name="disciplina2" id="select2">
                <?php
                    $query2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre != 'espera' GROUP by nombre");
                    while($row2 = mysqli_fetch_array($query2)) {
                        echo "<option value='".$row2['nombre']."'>".$row2['nombre']."</option>";
                    }
                ?>
                </select></td></tr>
                <tr id="disc3"><td colspan="2"><h3>Disciplina:</h3><select name="disciplina3" id="select3">
                <?php
                    $query3 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre != 'espera' GROUP by nombre");
                    while($row3 = mysqli_fetch_array($query3)) {
                        echo "<option value='".$row3['nombre']."'>".$row3['nombre']."</option>";
                    }
                ?>
                </select></td></tr>
                <tr><td colspan="2"><input type="submit" value="REGISTRAR" class="submit"></td></tr>
                </table>
               
            
        </form>
        </div>
    </main>
    <?php
        mysqli_close($con);
    ?>
    <script src="js/disc.js"></script>
</body>
</html>