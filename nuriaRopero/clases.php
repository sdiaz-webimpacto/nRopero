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
        $l1 = mysqli_query($con, "SELECT * FROM matClases ORDER BY inicio, sala, id");
        $l2 = mysqli_query($con, "SELECT * FROM matSemActual ORDER BY inicio, sala, id");
        $l3 = mysqli_query($con, "SELECT * FROM matSemUno ORDER BY inicio, sala, id");
        $hoy = date('w');
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

                                                <!--MATRIZ-->
        <?php
        if($_GET['semana'] == 'matClases') {
            $clase = mysqli_query($con, "SELECT * FROM matClases WHERE id = '$_GET[codigo]'");
            $row = mysqli_fetch_array($clase);
            $alumnos = mysqli_query($con, "SELECT * FROM matClientes WHERE dia1 = '$_GET[codigo]'|| 
            dia2 = '$_GET[codigo]'|| dia3 = '$_GET[codigo]' || dia4 = '$_GET[codigo]'|| 
            dia5 = '$_GET[codigo]' || dia6 = '$_GET[codigo]' || dia7 = '$_GET[codigo]' || 
            dia8 = '$_GET[codigo]' || dia9 = '$_GET[codigo]' || dia10 = '$_GET[codigo]' || 
            dia11 = '$_GET[codigo]' || dia12 = '$_GET[codigo]'");
            ?>
            <div id="fondo">
                <div id="izda">
                    <form action="clases2.php" method="post" class="formulario">
                        <input type="hidden" name="codigo" value="<?php echo $row['id'];?>">
                        <h3>Clase:</h3>
                        <input type="text" name="nombre" value="<?php echo $row['nombre'];?>">
                        <h3>H. Inicio:</h3>
                        <input type="time" name="inicio" value="<?php echo date('H:i',strtotime($row['inicio']));?>">
                        <h3>H. Fin:</h3>
                        <input type="time" name="fin" value="<?php echo date('H:i',strtotime($row['fin']));?>">
                        <h3>Dia:</h3>
                        <input type="text" name="dia" value="<?php echo $row['dia'];?>">
                        <h3>Sala:</h3>
                        <input type="text" name="sala" value="<?php echo $row['sala'];?>">
                        <h3>Monitor</h3>
                        <input type="text" name="monitor" value="<?php echo $row['profesor'];?>">
                        <h3>Aforo</h3>
                        <input type="number" name="aforo" value="<?php echo $row['aforo'];?>"><br><br>
                        <input type="submit" value="MODIFICAR" class="submit">
                    </form>
                </div>
                <div id="dcha">
                    <table style="width:100%; height:100%;">
                        <?php
                            while($rowAlumnos = mysqli_fetch_array($alumnos)) {
                                echo "<tr style='border:1px solid black;'><td>";
                                echo $rowAlumnos['nombre']." ".$rowAlumnos['apellidos'];
                                echo "</td><td>";
                                echo "<a href='ficha.php?codigo=".$rowAlumnos['id']."'><img src='img/ficha.png'></a></td></tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
            <a href="clases.php"><img src="img/atras.png" class="volver-fuera">
                                                        <!--FIN MATRIZ-->

                                                        <!--SEMaNA ACTUAL-->

            <?php
        } else if($_GET['semana'] == 'matSemActual') {
            $totalactual = mysqli_query($con, "SELECT count(*) as total FROM matClientes WHERE dia1 = '$_GET[codigo]'|| 
                                    dia2 = '$_GET[codigo]'|| dia3 = '$_GET[codigo]' || dia4 = '$_GET[codigo]'|| 
                                    dia5 = '$_GET[codigo]' || dia6 = '$_GET[codigo]' || dia7 = '$_GET[codigo]' || 
                                    dia8 = '$_GET[codigo]' || dia9 = '$_GET[codigo]' || dia10 = '$_GET[codigo]' || 
                                    dia11 = '$_GET[codigo]' || dia12 = '$_GET[codigo]'");
        $totalA = mysqli_fetch_array($totalactual);
        $apuntadosActual = $totalA['total'];
                $clase = mysqli_query($con, "SELECT * FROM matSemActual WHERE id = '$_GET[codigo]'");
                $row = mysqli_fetch_array($clase);
                $alumnos = mysqli_query($con, "SELECT * FROM matSemActualAlumnos WHERE dia1 = '$_GET[codigo]'|| 
                dia2 = '$_GET[codigo]'|| dia3 = '$_GET[codigo]' || dia4 = '$_GET[codigo]'|| 
                dia5 = '$_GET[codigo]' || dia6 = '$_GET[codigo]' || dia7 = '$_GET[codigo]' || 
                dia8 = '$_GET[codigo]' || dia9 = '$_GET[codigo]' || dia10 = '$_GET[codigo]' || 
                dia11 = '$_GET[codigo]' || dia12 = '$_GET[codigo]'");
                ?>
                <div id="fondo">
                    <div id="izda">
                        <form action="clases3.php" method="post" class="formulario">
                            <input type="hidden" name="codigo" value="<?php echo $row['id'];?>">
                            <h3>Clase:</h3>
                            <input type="text" name="nombre" value="<?php echo $row['nombre'];?>">
                            <h3>H. Inicio:</h3>
                            <input type="time" name="inicio" value="<?php echo date('H:i',strtotime($row['inicio']));?>">
                            <h3>H. Fin:</h3>
                            <input type="time" name="fin" value="<?php echo date('H:i',strtotime($row['fin']));?>">
                            <h3>Dia:</h3>
                            <input type="text" name="dia" value="<?php echo $row['dia'];?>">
                            <h3>Sala:</h3>
                            <input type="text" name="sala" value="<?php echo $row['sala'];?>">
                            <h3>Monitor</h3>
                            <input type="text" name="monitor" value="<?php echo $row['profesor'];?>">
                            <h3>Aforo</h3>
                            <input type="number" name="aforo" value="<?php echo $row['aforo'];?>"><br><br>
                            <input type="submit" value="MODIFICAR" class="submit">
                        </form>
                    </div>
                    <div id="dcha">
                        <?php
                    if( $apuntadosActual >= $row['aforo']) {
                            echo "<p class='fracaso' style='margin-top:0; margin-bottom:1%;'>El aforo del taller está completo. 
                                No pueden registrarse nuevos clientes</p>";
                        } else { ?>
                    <form action='clases33.php' method='post'>
                    <input type="hidden" name="codigo" value="<?php echo $row['id'];?>">
                    <input type="hidden" name="nombreCurso" value="<?php echo $row['nombre'];?>">
                        <table style="width:100%; height:100%;">
                        <tr><td colspan="2"><h3>Nuevo ingreso</h3></td></tr>
                        <tr><td>Alumno a añadir: 
                            <select name="nuevoNombre" required>
                            <option value=""></option>
                            <?php
                                $consulta = mysqli_query($con, "SELECT * FROM matSemActual WHERE id = '$_GET[codigo]'");
                                $disciplina = mysqli_fetch_array($consulta);
                                $consultaAlumnos = mysqli_query($con, "SELECT * FROM matSemActualAlumnos WHERE disciplina = '$disciplina[nombre]' ||
                                disciplina2 = '$disciplina[nombre]' || disciplina3 = '$disciplina[nombre]'");
                                while($row2 = mysqli_fetch_array($consultaAlumnos)) {
                                    echo "<option value='".$row2['id']."'>".$row2['nombre']." ".$row2['apellidos']."</option>";
                                }
                            ?>
                        </select></td></tr>
                            <tr><td colspan="2"><input type="submit" class="submit" value="confirmar"></td></tr> </form> <?php } ?>
                            <tr><td colspan="2"><h3>Lista alumnos</h3></td></tr>
                            <?php
                                while($rowAlumnos = mysqli_fetch_array($alumnos)) {
                                    if($disciplina['nombre'] != 'Embarazo') {
                                    echo "<tr style='border:1px solid black;'><td>";
                                    echo "<input type='text' id='apuntados' name='apuntados' value='".$rowAlumnos['nombre']." ".$rowAlumnos['apellidos']."'>";
                                    echo "</td><td>";
                                    echo "<a href=\"?codigo=".$row['id']."&semana=matSemActual&borrar=".$rowAlumnos["id"]."\">"; } 
                                    else {
                                        $buscarPeso = mysqli_query($con, "SELECT * FROM matPeso WHERE id = '$rowAlumnos[id]'");
                                        $peso = mysqli_fetch_array($buscarPeso);
                                        $buscarMedida = mysqli_query($con, "SELECT * FROM matMedida WHERE id = '$rowAlumnos[id]'");
                                        $medida = mysqli_fetch_array($buscarMedida);
                                        $semanas = $rowAlumnos['semanas'];
                                        echo "</table><table style='width:95%;'>";
                                        echo "<tr style='border:1px solid black;'><td>";
                                        echo "<form action='' method='get'><input type='hidden' name='codigo' value='".$row['id']."'>";
                                        echo "<input type='hidden' name='semana' value='matSemActual'>";
                                        echo "<input type='hidden' name='id' value='".$rowAlumnos["id"]."'>";
                                        echo "<input type='text' id='apuntados' name='apuntados' value='".$rowAlumnos['nombre']." ".$rowAlumnos['apellidos']."'>";
                                        echo "</td><td>";
                                        echo "<input type='number' id='peso' name='peso' value='".$peso[$semanas]."' style='width:30%;'>kg</td>";
                                        echo "<td><input type='number' id='medida' name='medida' value='".$medida[$semanas]."' style='width:30%;'>cm</td>";
                                        echo "<td><input type='submit' class='submit' value='Actualizar'></form></td>";
                                        echo "<td><a href=\"?codigo=".$row['id']."&semana=matSemActual&borrar=".$rowAlumnos["id"]."\">";  
                                    }
                                    echo "<p class='delete'>X</p></a></td></tr>";
                                
                                if($_GET['peso']) {
                                                                       $acPeso = mysqli_query($con, "UPDATE matPeso set `$semanas` = '$_GET[peso]' WHERE id = '$_GET[id]'");
                                    $acMedida = mysqli_query($con, "UPDATE matMedida set `$semanas` = '$_GET[medida]' WHERE id = '$_GET[id]'");
                                    
                                }}
                                if($_GET['borrar']) {
                                    $campo = mysqli_query($con, "SELECT * FROM matSemActualAlumnos WHERE id = '$_GET[borrar]'");
                                    $rcampo = mysqli_fetch_array($campo);
                                    if($rcampo['dia1'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia1 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia2'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia2 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia3'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia3 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia4'] == $_GET['codigo']) {
                                        $borrado=  mysqli_query($con, "UPDATE matSemActualAlumnos set dia4 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia5'] == $_GET['codigo']) {
                                        $borrado=  mysqli_query($con, "UPDATE matSemActualAlumnos set dia5 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia6'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia6 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia7'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia7 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia8'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia8 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia9'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia9 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia10'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia10 = '0' WHERE id = '$_GET[borrar]'");
                                    }else if($rcampo['dia11'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia11 = '0' WHERE id = '$_GET[borrar]'");
                                    }else if($rcampo['dia12'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemActualAlumnos set dia12 = '0' WHERE id = '$_GET[borrar]'");
                                    }
                                    $archivoActual = $_SERVER['PHP_SELF'];
                                    header("refresh:0;url='".$archivoActual."?codigo=".$row['id']."&semana=matSemActual'");
                                }             

                            ?>
                        </table>
                           
                    </div>
                </div>
                <a href="clases.php"><img src="img/atras.png" class="volver-fuera">
                                                    <!--FIN SEMaNA ACTUAL-->

                                                    <!--SEMaNA UNO-->

            <?php
        } else if($_GET['semana'] == 'matSemUno') {
            $totaluno = mysqli_query($con, "SELECT count(*) as total FROM matSemUnoAlumnos WHERE dia1 = '$_GET[codigo]'|| 
                                    dia2 = '$_GET[codigo]'|| dia3 = '$_GET[codigo]' || dia4 = '$_GET[codigo]'|| 
                                    dia5 = '$_GET[codigo]' || dia6 = '$_GET[codigo]' || dia7 = '$_GET[codigo]' || 
                                    dia8 = '$_GET[codigo]' || dia9 = '$_GET[codigo]' || dia10 = '$_GET[codigo]' || 
                                    dia11 = '$_GET[codigo]' || dia12 = '$_GET[codigo]'");
        $totalA = mysqli_fetch_array($totaluno);
        $apuntadosUno = $totalU['total'];
                $clase = mysqli_query($con, "SELECT * FROM matSemUno WHERE id = '$_GET[codigo]'");
                $row = mysqli_fetch_array($clase);
                $alumnos = mysqli_query($con, "SELECT * FROM matSemUnoAlumnos WHERE dia1 = '$_GET[codigo]'|| 
                dia2 = '$_GET[codigo]'|| dia3 = '$_GET[codigo]' || dia4 = '$_GET[codigo]'|| 
                dia5 = '$_GET[codigo]' || dia6 = '$_GET[codigo]' || dia7 = '$_GET[codigo]' || 
                dia8 = '$_GET[codigo]' || dia9 = '$_GET[codigo]' || dia10 = '$_GET[codigo]' || 
                dia11 = '$_GET[codigo]' || dia12 = '$_GET[codigo]'");
                ?>
                <div id="fondo">
                    <div id="izda">
                        <form action="clases4.php" method="post" class="formulario">
                            <input type="hidden" name="codigo" value="<?php echo $row['id'];?>">
                            <h3>Clase:</h3>
                            <input type="text" name="nombre" value="<?php echo $row['nombre'];?>">
                            <h3>H. Inicio:</h3>
                            <input type="time" name="inicio" value="<?php echo date('H:i',strtotime($row['inicio']));?>">
                            <h3>H. Fin:</h3>
                            <input type="time" name="fin" value="<?php echo date('H:i',strtotime($row['fin']));?>">
                            <h3>Dia:</h3>
                            <input type="text" name="dia" value="<?php echo $row['dia'];?>">
                            <h3>Sala:</h3>
                            <input type="text" name="sala" value="<?php echo $row['sala'];?>">
                            <h3>Monitor</h3>
                            <input type="text" name="monitor" value="<?php echo $row['profesor'];?>">
                            <h3>Aforo</h3>
                            <input type="number" name="aforo" value="<?php echo $row['aforo'];?>"><br><br>
                            <input type="submit" value="MODIFICAR" class="submit">
                        </form>
                    </div>
                    <div id="dcha">
                        <?php
                    if( $apuntadosUno >= $row['aforo']) {
                            echo "<p class='fracaso' style='margin-top:0; margin-bottom:1%;'>El aforo del taller está completo. 
                                No pueden registrarse nuevos clientes</p>";
                        } else { ?>
                    <form action='clases44.php' method='post'>
                    <input type="hidden" name="codigo" value="<?php echo $row['id'];?>">
                    <input type="hidden" name="nombreCurso" value="<?php echo $row['nombre'];?>">
                        <table style="width:100%; height:100%;">
                        <tr><td colspan="2"><h3>Nuevo ingreso</h3></td></tr>
                        <tr><td>Alumno a añadir: 
                            <select name="nuevoNombre" required>
                            <option value=""></option>
                            <?php
                                $consulta = mysqli_query($con, "SELECT * FROM matSemUno WHERE id = '$_GET[codigo]'");
                                $disciplina = mysqli_fetch_array($consulta);
                                $consultaAlumnos = mysqli_query($con, "SELECT * FROM matSemUnoAlumnos WHERE disciplina = '$disciplina[nombre]' ||
                                disciplina2 = '$disciplina[nombre]' || disciplina3 = '$disciplina[nombre]'");
                                while($row2 = mysqli_fetch_array($consultaAlumnos)) {
                                    echo "<option value='".$row2['id']."'>".$row2['nombre']." ".$row2['apellidos']."</option>";
                                }
                            ?>
                        </select></td></tr>
                            <tr><td colspan="2"><input type="submit" class="submit" value="confirmar"></td></tr> </form> <?php } ?>
                            <tr><td colspan="2"><h3>Lista alumnos</h3></td></tr>
                            <?php
                                while($rowAlumnos = mysqli_fetch_array($alumnos)) {
                                    if($disciplina['nombre'] != 'Embarazo') {
                                    echo "<tr style='border:1px solid black;'><td>";
                                    echo "<input type='text' id='apuntados' name='apuntados' value='".$rowAlumnos['nombre']." ".$rowAlumnos['apellidos']."'>";
                                    echo "</td><td>";
                                    echo "<a href=\"?codigo=".$row['id']."&semana=matSemActual&borrar=".$rowAlumnos["id"]."\">"; } 
                                    else {
                                        $buscarPeso = mysqli_query($con, "SELECT * FROM matPeso WHERE id = '$rowAlumnos[id]'");
                                        $peso = mysqli_fetch_array($buscarPeso);
                                        $buscarMedida = mysqli_query($con, "SELECT * FROM matMedida WHERE id = '$rowAlumnos[id]'");
                                        $medida = mysqli_fetch_array($buscarMedida);
                                        $semanas = $rowAlumnos['semanas'];
                                        echo "</table><table style='width:95%;'>";
                                        echo "<tr style='border:1px solid black;'><td>";
                                        echo "<form action='' method='get'><input type='hidden' name='codigo' value='".$row['id']."'>";
                                        echo "<input type='hidden' name='semana' value='matSemActual'>";
                                        echo "<input type='hidden' name='id' value='".$rowAlumnos["id"]."'>";
                                        echo "<input type='text' id='apuntados' name='apuntados' value='".$rowAlumnos['nombre']." ".$rowAlumnos['apellidos']."'>";
                                        echo "</td><td>";
                                        echo "<input type='number' id='peso' name='peso' value='".$peso[$semanas]."' style='width:30%;'>kg</td>";
                                        echo "<td><input type='number' id='medida' name='medida' value='".$medida[$semanas]."' style='width:30%;'>cm</td>";
                                        echo "<td><input type='submit' class='submit' value='Actualizar'></form></td>";
                                        echo "<td><a href=\"?codigo=".$row['id']."&semana=matSemActual&borrar=".$rowAlumnos["id"]."\">";  
                                    }
                                    echo "<p class='delete'>X</p></a></td></tr>";
                                
                                if($_GET['peso']) {
                                                                       $acPeso = mysqli_query($con, "UPDATE matPeso set `$semanas` = '$_GET[peso]' WHERE id = '$_GET[id]'");
                                    $acMedida = mysqli_query($con, "UPDATE matMedida set `$semanas` = '$_GET[medida]' WHERE id = '$_GET[id]'");
                                    
                                }}
                                if($_GET['borrar']) {
                                    $campo = mysqli_query($con, "SELECT * FROM matSemUnoAlumnos WHERE id = '$_GET[borrar]'");
                                    $rcampo = mysqli_fetch_array($campo);
                                    if($rcampo['dia1'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemUnoAlumnos set dia1 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia2'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemUnoAlumnos set dia2 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia3'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemUnoAlumnos set dia3 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia4'] == $_GET['codigo']) {
                                        $borrado=  mysqli_query($con, "UPDATE matSemUnoAlumnos set dia4 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia5'] == $_GET['codigo']) {
                                        $borrado=  mysqli_query($con, "UPDATE matSemUnoAlumnos set dia5 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia6'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemUnoAlumnos set dia6 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia7'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemUnoAlumnos set dia7 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia8'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemUnoAlumnos set dia8 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia9'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemUnoAlumnos set dia9 = '0' WHERE id = '$_GET[borrar]'");
                                    } else if($rcampo['dia10'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemUnoAlumnos set dia10 = '0' WHERE id = '$_GET[borrar]'");
                                    }else if($rcampo['dia11'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemUnoAlumnos set dia11 = '0' WHERE id = '$_GET[borrar]'");
                                    }else if($rcampo['dia12'] == $_GET['codigo']) {
                                        $borrado = mysqli_query($con, "UPDATE matSemUnoAlumnos set dia12 = '0' WHERE id = '$_GET[borrar]'");
                                    }
                                    $archivoActual = $_SERVER['PHP_SELF'];
                                    header("refresh:0;url='".$archivoActual."?codigo=".$row['id']."&semana=matSemActual'");
                                }             

                            ?>
                        </table>
                           
                    </div>
                </div>
                <a href="clases.php"><img src="img/atras.png" class="volver-fuera">
                                                    <!--FIN SEMaNA UNO-->


                                                    
        <?php
            } else {
            ?>
        <h1 class="titulo">Esquema de clases</h1>
        <buton class="cuarto" id="matriz">Matriz</buton>
        <buton class="cuarto" id="actual">Actual</buton>
        <buton class="cuarto" id="masuno">Siguiente</buton>
        <a href="semana.php"><buton class="cuarto" id="ejecutar">Cerrar Semana</buton></a>
        
        
        <!--MATRIZ-->
        
        <div id="cuadro">
            <h1>MATRIZ</h1>
        <div class="subclases">Lunes</div>
        <div class="subclases">Martes</div>
        <div class="subclases">Miercoles</div>
        <div class="subclases">Jueves</div>
        <div class="subclases">Viernes</div>
            <?php
            $buscaColores = mysqli_query($con, "SELECT nombre FROM matClases WHERE nombre != '' AND nombre != 'espera'
             GROUP BY nombre");
             $estilo[0] = '';
             while ($colores = mysqli_fetch_array($buscaColores)) {
                $estilo[] = $colores['nombre'];
             }

            while($r1 = mysqli_fetch_array($l1)) {
                if($r1['inicio'] != '00:00:00') {
                $numero = mysqli_query($con, "SELECT COUNT(*) as gente from matClientes WHERE dia1 = '$r1[id]' || 
                dia2 = '$r1[id]' || dia3 = '$r1[id]' || dia4 = '$r1[id]' || dia5 = '$r1[id]' || dia6 = '$r1[id]' ||
                dia7 = '$r1[id]' || dia8 = '$r1[id]' || dia9 = '$r1[id]' || dia10 = '$r1[id]' || dia11 = '$r1[id]' ||
                dia12 = '$r1[id]'");
                if($r1['nombre'] == $estilo[0]) {
                    $color = "opacity:0.8;background-color:white;";
                } else if($r1['nombre'] == $estilo[1]) {
                    $color = "opacity:0.8;background-color:red;color:white;";
                } else if($r1['nombre'] == $estilo[2]) {
                    $color = "opacity:0.8;background-color:yellow;";
                } else if($r1['nombre'] == $estilo[3]) {
                    $color = "opacity:0.8;background-color:green;color:white;";
                } else if($r1['nombre'] == $estilo[4]) {
                    $color = "opacity:0.8;background-color:#633974;color:white;";
                } else if($r1['nombre'] == $estilo[5]) {
                    $color = "opacity:0.8;background-color:#52BE80;color:white;";
                } else if($r1['nombre'] == $estilo[6]) {
                    $color = "opacity:0.8;background-color:olive;color:white;";
                } else if($r1['nombre'] == $estilo[7]) {
                    $color = "opacity:0.8;background-color:darkgray;";
                } else if($r1['nombre'] == $estilo[8]) {
                    $color = "opacity:0.8;background-color:greenyellow;";
                } else if($r1['nombre'] == $estilo[9]) {
                    $color = "opacity:0.8;background-color:mediumturquoise;";
                } else if($r1['nombre'] == $estilo[10]) {
                    $color = "opacity:0.8;background-color:sandybrown;color:white;";
                } else if($r1['nombre'] == $estilo[11]) {
                    $color = "opacity:0.8;background-color:pink;";
                } else if($r1['nombre'] == $estilo[12]) {
                $color = "opacity:0.8;background-color:brown;color:white";
                }
                $rn = mysqli_fetch_array($numero);
                echo "<a href=\"?semana=matClases&codigo=".$r1["id"]."\"><div class='clases' style=".$color."><p>".date('H:i',strtotime($r1['inicio']))."-".date('H:i',strtotime($r1['fin']))."</p>
                <h3>".$r1['nombre']."</h3>
                <p>".$r1['profesor']."</p><p>Sala: ".$r1['sala']."</p><p>".$rn['gente']."/".$r1['aforo']."</p></div class='clases'></a>";
            }
        }
        $nuevaclase = mysqli_query($con, "SELECT * FROM matClases WHERE inicio = '00:00:00' ORDER BY id LIMIT 1");
        $rnc = mysqli_fetch_array($nuevaclase);
        echo "<a href=\"?semana=matClases&codigo=".$rnc["id"]."\"><div class='clases' style=".$estilo[$rnc['nombre']].">
        <img src='img/anadir.png'style='height:90%; margin:2% 0%;'>
        </div class='clases'></a>";
            ?>
        </div>
        
        <!--SEMANA ACTUAL-->
        
        <div id="cuadro2">
            <h1>SEMANA ACTUAL</h1>

        <div class="subclases"><?php $date = new DateTime(); if($hoy > 0 && $hoy < 6) {$date->modify('monday this week');}
                                                                else {$date->modify('monday next week');} echo $date->format('d-m');?></div>
        
        <div class="subclases"><?php $date = new DateTime(); if($hoy > 0 && $hoy < 6) {$date->modify('tuesday this week');}
                                                                else {$date->modify('tuesday next week');} echo $date->format('d-m');?></div>

        <div class="subclases"><?php $date = new DateTime(); if($hoy > 0 && $hoy < 6) {$date->modify('wednesday this week');}
                                                                else {$date->modify('wednesday next week');} echo $date->format('d-m');?></div>

        <div class="subclases"><?php $date = new DateTime(); if($hoy > 0 && $hoy < 6) {$date->modify('thursday this week');}
                                                                else {$date->modify('thursday next week');} echo $date->format('d-m');?></div>

        <div class="subclases"><?php $date = new DateTime(); if($hoy > 0 && $hoy < 6) {$date->modify('friday this week');}
                                                                else {$date->modify('friday next week');} echo $date->format('d-m');?></div>
            <?php
           
            while($r1 = mysqli_fetch_array($l2)) {
                if($r1['nombre'] == $estilo[0]) {
                    $color = "background-color:white;";
                } else if($r1['nombre'] == $estilo[1]) {
                    $color = "background-color:red;color:white;";
                } else if($r1['nombre'] == $estilo[2]) {
                    $color = "background-color:yellow;";
                } else if($r1['nombre'] == $estilo[3]) {
                    $color = "background-color:green;color:white;";
                } else if($r1['nombre'] == $estilo[4]) {
                    $color = "background-color:#633974;color:white;";
                } else if($r1['nombre'] == $estilo[5]) {
                    $color = "background-color:#52BE80;color:white;";
                } else if($r1['nombre'] == $estilo[6]) {
                    $color = "background-color:olive;color:white;";
                } else if($r1['nombre'] == $estilo[7]) {
                    $color = "background-color:darkgray;";
                } else if($r1['nombre'] == $estilo[8]) {
                    $color = "background-color:greenyellow;";
                } else if($r1['nombre'] == $estilo[9]) {
                    $color = "background-color:mediumturquoise;";
                } else if($r1['nombre'] == $estilo[10]) {
                    $color = "background-color:sandybrown;color:white;";
                } else if($r1['nombre'] == $estilo[11]) {
                    $color = "background-color:pink;";
            } else if($r1['nombre'] == $estilo[12]) {
                $color = "background-color:brown;color:white";
        }
                if($r1['inicio'] != '00:00:00') {
                $numero = mysqli_query($con, "SELECT COUNT(*) as gente from matSemActualAlumnos WHERE dia1 = '$r1[id]' || 
                dia2 = '$r1[id]' || dia3 = '$r1[id]' || dia4 = '$r1[id]' || dia5 = '$r1[id]' || dia6 = '$r1[id]' ||
                dia7 = '$r1[id]' || dia8 = '$r1[id]' || dia9 = '$r1[id]' || dia10 = '$r1[id]' || dia11 = '$r1[id]' || 
                dia12 = '$r1[id]'");
                $rn = mysqli_fetch_array($numero);
                echo "<a href=\"?semana=matSemActual&codigo=".$r1["id"]."\"><div class='clases' style=".$color."><p>".date('H:i',strtotime($r1['inicio']))."-".date('H:i',strtotime($r1['fin']))."</p>
                <h3>".$r1['nombre']."</h3>
                <p>".$r1['profesor']."</p><p>Sala: ".$r1['sala']."</p><br><p>".$rn['gente']."/".$r1['aforo']."</p></div class='clases'></a>";
            }
        }
        $nuevaclase = mysqli_query($con, "SELECT * FROM matSemActual WHERE inicio = '00:00:00' ORDER BY id LIMIT 1");
        $rnc = mysqli_fetch_array($nuevaclase);
        echo "<a href=\"?semana=matSemActual&codigo=".$rnc["id"]."\"><div class='clases' style=".$estilo[$rnc['nombre']].">
        <img src='img/anadir.png'style='height:90%; margin:2% 0%;'></div class='clases'></a>";
            ?>
        </div>

        <!--SEMANA UNO-->
        
        <div id="cuadro3">
            <h1>SEMANA SIGUIENTE</h1>

        <div class="subclases"><?php $date = new DateTime(); if($hoy > 0 && $hoy < 6) {$date->modify('monday next week');}
                                                                else {$date->modify('next monday + 1 week');} echo $date->format('d-m');?></div>
        
        <div class="subclases"><?php $date = new DateTime(); if($hoy > 0 && $hoy < 6) {$date->modify('tuesday next week');}
                                                                else {$date->modify('next tuesday + 1 week');} echo $date->format('d-m');?></div>

        <div class="subclases"><?php $date = new DateTime(); if($hoy > 0 && $hoy < 6) {$date->modify('wednesday next week');}
                                                                else {$date->modify('next wednesday + 1 week');} echo $date->format('d-m');?></div>

        <div class="subclases"><?php $date = new DateTime(); if($hoy > 0 && $hoy < 6) {$date->modify('thursday next week');}
                                                                else {$date->modify('next thursday + 1 week');} echo $date->format('d-m');?></div>

        <div class="subclases"><?php $date = new DateTime(); if($hoy > 0 && $hoy < 6) {$date->modify('friday next week');}
                                                                else {$date->modify('next friday + 1 week');} echo $date->format('d-m');?></div>
            <?php
           
            while($r1 = mysqli_fetch_array($l3)) {
                if($r1['nombre'] == $estilo[0]) {
                    $color = "background-color:white;";
                } else if($r1['nombre'] == $estilo[1]) {
                    $color = "background-color:red;color:white;";
                } else if($r1['nombre'] == $estilo[2]) {
                    $color = "background-color:yellow;";
                } else if($r1['nombre'] == $estilo[3]) {
                    $color = "background-color:green;color:white;";
                } else if($r1['nombre'] == $estilo[4]) {
                    $color = "background-color:#633974;color:white;";
                } else if($r1['nombre'] == $estilo[5]) {
                    $color = "background-color:#52BE80;color:white;";
                } else if($r1['nombre'] == $estilo[6]) {
                    $color = "background-color:olive;color:white;";
                } else if($r1['nombre'] == $estilo[7]) {
                    $color = "background-color:darkgray;";
                } else if($r1['nombre'] == $estilo[8]) {
                    $color = "background-color:greenyellow;";
                } else if($r1['nombre'] == $estilo[9]) {
                    $color = "background-color:mediumturquoise;";
                } else if($r1['nombre'] == $estilo[10]) {
                    $color = "background-color:sandybrown;color:white;";
                } else if($r1['nombre'] == $estilo[11]) {
                    $color = "background-color:pink;";
            } else if($r1['nombre'] == $estilo[12]) {
                $color = "background-color:brown;color:white";
        }
                if($r1['inicio'] != '00:00:00') {
                $numero = mysqli_query($con, "SELECT COUNT(*) as gente from matSemActualAlumnos WHERE dia1 = '$r1[id]' || 
                dia2 = '$r1[id]' || dia3 = '$r1[id]' || dia4 = '$r1[id]' || dia5 = '$r1[id]' || dia6 = '$r1[id]' ||
                dia7 = '$r1[id]' || dia8 = '$r1[id]' || dia9 = '$r1[id]' || dia10 = '$r1[id]' || dia11 = '$r1[id]' || 
                dia12 = '$r1[id]'");
                $rn = mysqli_fetch_array($numero);
                echo "<a href=\"?semana=matSemActual&codigo=".$r1["id"]."\"><div class='clases' style=".$color."><p>".date('H:i',strtotime($r1['inicio']))."-".date('H:i',strtotime($r1['fin']))."</p>
                <h3>".$r1['nombre']."</h3>
                <p>".$r1['profesor']."</p><p>Sala: ".$r1['sala']."</p><br><p>".$rn['gente']."/".$r1['aforo']."</p></div class='clases'></a>";
            }
        }
        $nuevaclase = mysqli_query($con, "SELECT * FROM matSemUno WHERE inicio = '00:00:00' ORDER BY id LIMIT 1");
        $rnc = mysqli_fetch_array($nuevaclase);
        echo "<a href=\"?semana=matSemUno&codigo=".$rnc["id"]."\"><div class='clases' style=".$estilo[$rnc['nombre']].">
        <img src='img/anadir.png'style='height:90%; margin:2% 0%;'></div class='clases'></a>";
            ?>
        </div>

        


        <?php
        }
        $contador = mysqli_query($con, "SELECT COUNT(*) as total FROM matSemActual");
        $contaje = mysqli_fetch_array($contador);
        $cuenta = $contaje['total'];
        if($cuenta != 0) {echo "";} else {
            $crearTablaClases = mysqli_query($con, "CREATE TABLE matSemActual SELECT * FROM matClases");
            $crearTablaAlumnos = mysqli_query($con, "CREATE TABLE matSemActualAlumnos SELECT * FROM matClientes");
        }
        $contador2 = mysqli_query($con, "SELECT COUNT(*) as total FROM matSemUno");
        $contaje2 = mysqli_fetch_array($contador2);
        $cuenta2 = $contaje2['total'];
        if($cuenta2 != 0) {echo "";} else {
            $crearTablaClases = mysqli_query($con, "CREATE TABLE matSemUno SELECT * FROM matClases");
            $crearTablaAlumnos = mysqli_query($con, "CREATE TABLE matSemUnoAlumnos SELECT * FROM matClientes");
        }
        ?>
    </main>
    <?php
    mysqli_close($con);
    ?>
<script src="js/app.js"></script>
</body>
</html>