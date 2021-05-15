<?php
session_start()
?>
<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nuria Ropero App</title>
        <link href="css/clientes.css" rel="stylesheet" media="">
        <link rel="icon" href="../img/favicon.png">
    <?php if (isset($_SESSION['usuario'])) {echo "";} else {echo "<meta http-equiv='refresh' content='0,URL=../index.html'>";}
    ?>
    </head>
<body ontouchstart>
    <?php
        include("partes/headerCliente.php");
        $siguiente = mysqli_query($con, "SELECT * FROM matSemUnoAlumnos WHERE dni = '$_SESSION[usuario]'");
        $clienteSiguiente = mysqli_fetch_array($siguiente);
        $actual = mysqli_query($con, "SELECT * FROM matSemActualAlumnos WHERE dni = '$_SESSION[usuario]'");
        $clienteActual = mysqli_fetch_array($actual);
        $buscaTotal = mysqli_query($con, "SELECT * FROM matClientes WHERE dni = '$_SESSION[usuario]'");
        $resultTotal = mysqli_fetch_array($buscaTotal);
        $hoy = date('w');
        for($i=1;$i<13;$i++) {
            if($clienteActual['dia'.$i] != '0') {
               $ca[] = '1';
            } else {
                $ca[] = '0';
            }
        }
        for($i=1;$i<13;$i++) {
            if($clienteSiguiente['dia'.$i] != '0') {
               $cs[] = '1';
            } else {
                $cs[] = '0';
            }
        }
        for($i=1;$i<13;$i++) {
            if($resultTotal['dia'.$i] == '902') {
               $ct[] = '2';
            } else if($resultTotal['dia'.$i] != '0' && $resultTotal['dia'.$i] != '902') {
                $ct[] = '1';
            } else {
                $ct[] = '0';
            }
        }
        if($_GET) {
        /*-----------------------------------------------------------------------
        ------------------------------PULSA BORRAR ACTUAL------------------------
        ------------------------------------------------------------------------*/
        if($_GET['borrarseActual'] != '0') {
            for($i = 1; $i < 13; $i++) {
                if($clienteActual['dia'.$i] == $_GET['borrarseActual']) {
                    $dia = 'dia'.$i;
                   $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET $dia = '0' WHERE dni = '$_SESSION[usuario]'");
                   
                }
            }
            
        }
        /*-----------------------------------------------------------------------
        ------------------------------PULSA BORRAR SIGUIENTE---------------------
        ------------------------------------------------------------------------*/
        if($_GET['borrarseSiguiente'] != '0') {
            for($i = 1; $i < 13; $i++) {
                if($clienteSiguiente['dia'.$i] == $_GET['borrarseSiguiente']) {
                    $dia = 'dia'.$i;
                   $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET $dia = '0' WHERE dni = '$_SESSION[usuario]'");
                   
                }
            }
            
        }

        /*------------------------------------------------------------------------
        ------------------------------PULSA APUNTARSE ACTUAL----------------------
        ------------------------------------------------------------------------*/
        if($_GET['apuntarseActual'] != '0') {
                if($clienteActual['dia1'] == '0' && $clienteActual['disciplina'] == $_GET['disc']) {
                   if(($ca[0] + $ca[1] + $ca[2] + $ca[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
                    $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia1 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                    header("refresh:0;url='principal.php'");
                } else {
                    header("refresh:0;url='principal.php'");
                }
                   
            } else if ($clienteActual['dia2'] == '0' && $clienteActual['disciplina'] == $_GET['disc']) {
                if(($ca[0] + $ca[1] + $ca[2] + $ca[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
                $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia2 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                header("refresh:0;url='principal.php'");
            } else {
                header("refresh:0;url='principal.php'");
            }
            } else if ($clienteActual['dia3'] == '0' && $clienteActual['disciplina'] == $_GET['disc']) {
                if(($ca[0] + $ca[1] + $ca[2] + $ca[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
                $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia3 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                header("refresh:0;url='principal.php'");
            } else {
                header("refresh:0;url='principal.php'");
            }
            } else if ($clienteActual['dia4'] == '0' && $clienteActual['disciplina'] == $_GET['disc']) {
                if(($ca[0] + $ca[1] + $ca[2] + $ca[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
                $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia4 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                header("refresh:0;url='principal.php'");
            } else {
                header("refresh:0;url='principal.php'");
            }
            } else if ($clienteActual['dia5'] == '0' && $clienteActual['disciplina2'] == $_GET['disc']) {
                if(($ca[4] + $ca[5] + $ca[6] + $ca[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
                $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia5 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                header("refresh:0;url='principal.php'");
            } else {
                header("refresh:0;url='principal.php'");
            }
            }else if ($clienteActual['dia6'] == '0' && $clienteActual['disciplina2'] == $_GET['disc']) {
                if(($ca[4] + $ca[5] + $ca[6] + $ca[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
                $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia6 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                header("refresh:0;url='principal.php'");
            } else {
                header("refresh:0;url='principal.php'");
            }
            }else if ($clienteActual['dia7'] == '0' && $clienteActual['disciplina2'] == $_GET['disc']) {
                if(($ca[4] + $ca[5] + $ca[6] + $ca[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
                $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia7 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                header("refresh:0;url='principal.php'");
            } else {
                header("refresh:0;url='principal.php'");
            }
            }else if ($clienteActual['dia8'] == '0' && $clienteActual['disciplina2'] == $_GET['disc']) {
                if(($ca[4] + $ca[5] + $ca[6] + $ca[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
                $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia8 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                header("refresh:0;url='principal.php'");
            } else {
                header("refresh:0;url='principal.php'");
            }
            }else if ($clienteActual['dia9'] == '0' && $clienteActual['disciplina3'] == $_GET['disc']) {
                if(($ca[8] + $ca[9] + $ca[10] + $ca[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
                $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia9 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                header("refresh:0;url='principal.php'");
            } else {
                header("refresh:0;url='principal.php'");
            }
            }else if ($clienteActual['dia10'] == '0' && $clienteActual['disciplina3'] == $_GET['disc']) {
                if(($ca[8] + $ca[9] + $ca[10] + $ca[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
                $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia10 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                header("refresh:0;url='principal.php'");
            } else {
                header("refresh:0;url='principal.php'");
            }
            }else if ($clienteActual['dia11'] == '0' && $clienteActual['disciplina3'] == $_GET['disc']) {
                if(($ca[8] + $ca[9] + $ca[10] + $ca[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
                $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia11 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                header("refresh:0;url='principal.php'");
            } else {
                header("refresh:0;url='principal.php'");
            }
            }else if ($clienteActual['dia12'] == '0' && $clienteActual['disciplina3'] == $_GET['disc']) {
                if(($ca[8] + $ca[9] + $ca[10] + $ca[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
                $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia12 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                header("refresh:0;url='principal.php'");
            } else {
                header("refresh:0;url='principal.php'");
            }
            }
        }

        /*-----------------------------------------------------------------------
        ------------------------------PULSA APUNTARSE SIGUIENTE------------------
        ------------------------------------------------------------------------*/

        if($_GET['apuntarseSiguiente'] != '0') {
            if($clienteSiguiente['dia1'] == '0' && $clienteSiguiente['disciplina'] == $_GET['disc']) {
               if(($cs[0] + $cs[1] + $cs[2] + $cs[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
                $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia1 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
                header("refresh:0;url='principal.php'");
            } else {
                header("refresh:0;url='principal.php'");
            }
               
        } else if ($clienteSiguiente['dia2'] == '0' && $clienteSiguiente['disciplina'] == $_GET['disc']) {
            if(($cs[0] + $cs[1] + $cs[2] + $cs[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
            $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia2 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
            header("refresh:0;url='principal.php'");
        } else {
            header("refresh:0;url='principal.php'");
        }
        } else if ($clienteSiguiente['dia3'] == '0' && $clienteSiguiente['disciplina'] == $_GET['disc']) {
            if(($cs[0] + $cs[1] + $cs[2] + $cs[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
            $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia3 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
            header("refresh:0;url='principal.php'");
        } else {
            header("refresh:0;url='principal.php'");
        }
        } else if ($clienteSiguiente['dia4'] == '0' && $clienteSiguiente['disciplina'] == $_GET['disc']) {
            if(($cs[0] + $cs[1] + $cs[2] + $cs[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
            $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia4 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
            header("refresh:0;url='principal.php'");
        } else {
            header("refresh:0;url='principal.php'");
        } 
        } else if ($clienteSiguiente['dia5'] == '0' && $clienteSiguiente['disciplina2'] == $_GET['disc']) {
            if(($cs[4] + $cs[5] + $cs[6] + $cs[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
            $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia5 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
            header("refresh:0;url='principal.php'");
        } else {
            header("refresh:0;url='principal.php'");
        } 
        }else if ($clienteSiguiente['dia6'] == '0' && $clienteSiguiente['disciplina2'] == $_GET['disc']) {
            if(($cs[4] + $cs[5] + $cs[6] + $cs[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
            $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia6 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
            header("refresh:0;url='principal.php'");
        } else {
            header("refresh:0;url='principal.php'");
        }
        }else if ($clienteSiguiente['dia7'] == '0' && $clienteSiguiente['disciplina2'] == $_GET['disc']) {
            if(($cs[4] + $cs[5] + $cs[6] + $cs[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
            $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia7 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
            header("refresh:0;url='principal.php'");
        } else {
            header("refresh:0;url='principal.php'");
        } 
        }else if ($clienteSiguiente['dia8'] == '0' && $clienteSiguiente['disciplina2'] == $_GET['disc']) {
            if(($cs[4] + $cs[5] + $cs[6] + $cs[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
            $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia8 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
            header("refresh:0;url='principal.php'");
        } else {
            header("refresh:0;url='principal.php'");
        } 
        }else if ($clienteSiguiente['dia9'] == '0' && $clienteSiguiente['disciplina3'] == $_GET['disc']) {
            if(($cs[8] + $cs[9] + $cs[10] + $cs[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
            $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia9 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
            header("refresh:0;url='principal.php'");
        } else {
            header("refresh:0;url='principal.php'");
        } 
        }else if ($clienteSiguiente['dia10'] == '0' && $clienteSiguiente['disciplina3'] == $_GET['disc']) {
            if(($cs[8] + $cs[9] + $cs[10] + $cs[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
            $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia10 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
            header("refresh:0;url='principal.php'");
        } else {
            header("refresh:0;url='principal.php'");
        } 
        }else if ($clienteSiguiente['dia11'] == '0' && $clienteSiguiente['disciplina3'] == $_GET['disc']) {
            if(($cs[8] + $cs[9] + $cs[10] + $cs[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
            $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia11 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
            header("refresh:0;url='principal.php'");
        } else {
            header("refresh:0;url='principal.php'");
        } 
        }else if ($clienteSiguiente['dia12'] == '0' && $clienteSiguiente['disciplina3'] == $_GET['disc']) {
            if(($cs[8] + $cs[9] + $cs[10] + $cs[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
            $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia12 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
            header("refresh:0;url='principal.php'");
        } else {
            header("refresh:0;url='principal.php'");
        } 
        }
    }

        } else {
        ?>
        <button class="semanas" id='b1'>Semana actual</button>
        <button class="semanas" id='b2'>Semana siguiente</button>

        <!-----------------------------------------------------------------------
        ------------------------------DIV SEMANA ACTUAL--------------------------
        ------------------------------------------------------------------------>
        <div class="pantalla" id="actual">
            <h2>SEMANA ACTUAL</h2>
        <?php
        if($clienteActual['disciplina'] != '') {
            if($resultTotal['dia4'] != '0') { $total = '4';}
            else if($resultTotal['dia3'] != '0') { $total = '3';}
            else if($resultTotal['dia2'] != '0' || $resultTotal['dia1'] == '902') { $total = '2';}
            else {$total = '1';}
            if($clienteActual['dia4'] != '0') { $totalActual1 = '4';}
            else if($clienteActual['dia3'] != '0') { $totalActual1 = '3';}
            else if($clienteActual['dia2'] != '0') { $totalActual1 = '2';}
            else if ($clienteActual['dia1'] != '0' && $clienteActual['dia1'] != '901' && $clienteActual['dia1'] != '902') {$totalActual1 = '1';}
        else {$totalActual1 = '0';}
            
            ?>
            <div class="clases" id="c1">
                <?php echo $clienteActual['disciplina']." ".$totalActual1."/".$total;?>
            </div>
            <?php
        }
        if($clienteActual['disciplina2'] != '') {
            if($resultTotal['dia8'] != '0') { $total = '4';}
            else if($resultTotal['dia7'] != '0') { $total = '3';}
            else if($resultTotal['dia6'] != '0' || $resultTotal['dia5'] == '902') { $total = '2';}
            else {$total = '1';}
            if($clienteActual['dia8'] != '0') { $totalActual2 = '4';}
            else if($clienteActual['dia7'] != '0') { $totalActual2 = '3';}
            else if($clienteActual['dia6'] != '0') { $totalActual2 = '2';}
            else if ($clienteActual['dia5'] != '0' && $clienteActual['dia5'] != '901' && $clienteActual['dia5'] != '902') {$totalActual2 = '1';}
            else {$totalActual2 = '0';}
            
            ?>
            <div class="clases" id="c2">
                <?php echo $clienteActual['disciplina2']." ".$totalActual2."/".$total;?>
            </div>
            <?php
        }
        if($clienteActual['disciplina3'] != '') {
            if($resultTotal['dia12'] != '0') { $total = '4';}
            else if($resultTotal['dia11'] != '0') { $total = '3';}
            else if($resultTotal['dia10'] != '0' || $resultTotal['dia9'] == '902') { $total = '2';}
            else {$total = '1';}
            if($clienteActual['dia12'] != '0') { $totalActual3 = '4';}
            else if($clienteActual['dia11'] != '0') { $totalActual3 = '3';}
            else if($clienteActual['dia10'] != '0') { $totalActual3 = '2';}
            else if ($clienteActual['dia9'] != '0' && $clienteActual['dia9'] != '901' && $clienteActual['dia9'] != '902') {$totalActual3 = '1';}
            else {$totalActual3 = '0';}
            
            ?>
            <div class="clases" id="c3">
                <?php echo $clienteActual['disciplina3']." ".$totalActual3."/".$total;?>
            </div>
            <?php
        }

        ?>
        <h3>Clases Actuales:</h3>
        <table class='apuntado'>
            <?php
include('partes/semana.php');
        for($i = 1; $i < 13; $i++) {
            if($clienteActual['dia'.$i] != '0' && $clienteActual['dia'.$i] != '901'  && $clienteActual['dia'.$i] != '902') {
                $id = $clienteActual['dia'.$i];
                $clase = mysqli_query($con, "SELECT * FROM matSemActual WHERE id = '$id'");
                $clases = mysqli_fetch_array($clase);
                echo "<tr>";
                echo "<td>";
                echo $clases['nombre']." ".$clases['dia']." <span class='fecha'>".date('d-m',strtotime('this '.$s[$clases['dia']]))."</span> || ".date('H:i',strtotime($clases['inicio']))."-".date('H:i',strtotime($clases['fin']));
                echo "</td>";
                echo "<th>";
                if($hoy == '6' || $hoy == '0') {
                echo "<a href='principal.php?borrarseActual=".$clases['id']."'><img src='../img/borrarse.png'></a>";
                } else if($hoy == '1') {
                    if($clases['dia'] == 'Lunes') {
                        echo "";
                    } else {
                        echo "<a href='principal.php?borrarseActual=".$clases['id']."'><img src='../img/borrarse.png'></a>";
                    }
                } else if($hoy == '2') {
                    if($clases['dia'] == 'Lunes' || $clases['dia'] == 'Martes') {
                        echo "";
                    } else {
                        echo "<a href='principal.php?borrarseActual=".$clases['id']."'><img src='../img/borrarse.png'></a>";
                    }
                } else if($hoy == '3') {
                    if($clases['dia'] == 'Lunes' || $clases['dia'] == 'Martes' || $clases['dia'] == 'Miercoles') {
                        echo "";
                    } else {
                        echo "<a href='principal.php?borrarseActual=".$clases['id']."'><img src='../img/borrarse.png'></a>";
                    }
                } else if($hoy == '4') {
                    if($clases['dia'] != 'Viernes') {
                        echo "";
                    } else {
                        echo "<a href='principal.php?borrarseActual=".$clases['id']."'><img src='../img/borrarse.png'></a>";
                    }
                } else {
                    echo "";
                }
                echo "</th>";
                echo "</tr>";
            }
        }
    ?>  
        </table>
        <h3>Clases Disponibles:</h3>
        <table class='disponible'>
            <?php
                if($hoy == '5' || $hoy == '6') {
                $clase = mysqli_query($con, "SELECT * FROM matSemActual WHERE nombre = '$clienteActual[disciplina]' AND nombre != ''||
                nombre = '$clienteActual[disciplina2]' AND nombre != ''|| nombre = '$clienteActual[disciplina3]'AND nombre != ''");
                } else if($hoy == '1') {
                    $clase = mysqli_query($con, "SELECT * FROM matSemActual WHERE nombre = '$clienteActual[disciplina]' AND nombre != '' AND dia != 'Lunes'||
                nombre = '$clienteActual[disciplina2]' AND nombre != '' AND dia != 'Lunes'|| nombre = '$clienteActual[disciplina3]'AND nombre != '' AND dia != 'Lunes'");
                } else if($hoy <= '2') {
                    $clase = mysqli_query($con, "SELECT * FROM matSemActual WHERE nombre = '$clienteActual[disciplina]' AND nombre != '' AND dia != 'Lunes' AND dia != 'Martes'||
                nombre = '$clienteActual[disciplina2]' AND nombre != '' AND dia != 'Lunes' AND dia != 'Martes'|| nombre = '$clienteActual[disciplina3]'AND nombre != '' AND dia != 'Lunes' AND dia != 'Martes'");
                } else if($hoy <= '3') {
                    $clase = mysqli_query($con, "SELECT * FROM matSemActual WHERE nombre = '$clienteActual[disciplina]' AND nombre != '' AND dia != 'Lunes' AND dia != 'Martes' AND dia != 'Miercoles'||
                nombre = '$clienteActual[disciplina2]' AND nombre != '' AND dia != 'Lunes' AND dia != 'Martes' AND dia != 'Miercoles'|| nombre = '$clienteActual[disciplina3]'AND nombre != '' 
                AND dia != 'Lunes' AND dia != 'Martes' AND dia != 'Miercoles'");
                } else if($hoy <= '4') {
                    $clase = mysqli_query($con, "SELECT * FROM matSemActual WHERE nombre = '$clienteActual[disciplina]' AND nombre != '' AND dia != 'Lunes' AND dia != 'Martes' AND dia != 'Miercoles' AND dia != 'Jueves'||
                nombre = '$clienteActual[disciplina2]' AND nombre != '' AND dia != 'Lunes' AND dia != 'Martes' AND dia != 'Miercoles' AND dia != 'Jueves'|| nombre = '$clienteActual[disciplina3]'AND nombre != '' 
                AND dia != 'Lunes' AND dia != 'Martes' AND dia != 'Miercoles' AND dia != 'Jueves'");
                } else {
                    $clase = mysqli_query($con, "SELECT * FROM matSemActual WHERE nombre = '$clienteActual[disciplina]' AND nombre != '' AND dia != 'Lunes' AND dia != 'Martes' AND dia != 'Miercoles' AND dia != 'Jueves' AND dia != 'Viernes'||
 nombre = '$clienteActual[disciplina2]' AND nombre != '' AND dia != 'Lunes' AND dia != 'Martes' AND dia != 'Miercoles' AND dia != 'Jueves' AND dia != 'Viernes'|| nteActual[disciplina3]'AND nombre != '' 
                AND dia != 'Lunes' AND dia != 'Martes' AND dia != 'Miercoles' AND dia != 'Jueves' AND dia != 'Viernes'");
                }
               
  
                while ($clases = mysqli_fetch_array($clase)) {

                    $numero = mysqli_query($con, "SELECT COUNT(*) as gente from matSemActualAlumnos WHERE dia1 = '$clases[id]' || 
                    dia2 = '$clases[id]' || dia3 = '$clases[id]' || dia4 = '$clases[id]' || dia5 = '$clases[id]' || dia6 = '$clases[id]' ||
                    dia7 = '$clases[id]' || dia8 = '$clases[id]' || dia9 = '$clases[id]' || dia10 = '$clases[id]' || dia11 = '$clases[id]' || 
                    dia12 = '$clases[id]'");
                    $rn = mysqli_fetch_array($numero);

                    if($clases['aforo'] > $rn['gente']) {

                echo "<tr>";
                echo "<td>";
                echo $clases['nombre']." ".$clases['dia']." <span class='fecha'>".date('d-m',strtotime('this '.$s[$clases['dia']]))."</span> || ".date('H:i',strtotime($clases['inicio']))."-".date('H:i',strtotime($clases['fin']));
                echo "</td>";
                echo "<th>";
                echo "<a href='principal.php?apuntarseActual=".$clases['id']."&disc=".$clases['nombre']."'><img src='../img/apuntarse.png'></a>";
                echo "</th>";
                echo "</tr>";
                $cuenta1 = 1;
                    } else {
                        $cuenta1 = -1;
                    }

                    
                }
                if($cuenta1 < 0) {
                    echo "<h2 class='fracaso'>Actualmente no hay plazas libres esta semana, prueba más adelante por si hubiera quedado algun hueco libre.</h2>";
                }
                
    ?>  
        </table> 
    </div>
        <!-----------------------------------------------------------------------
        ----------------------------FIN DIV SEMANA ACTUAL------------------------
        ------------------------------------------------------------------------>

        <!-----------------------------------------------------------------------
        ------------------------------DIV SEMANA SIGUIENTE--------------------------
        ------------------------------------------------------------------------>
        <div class="pantalla" id="siguiente">
            <h2>SEMANA PRÓXIMA</h2>
        <?php
        if($clienteSiguiente['disciplina'] != '') {
            if($resultTotal['dia4'] != '0') { $total = '4';}
            else if($resultTotal['dia3'] != '0') { $total = '3';}
            else if($resultTotal['dia2'] != '0' || $resultTotal['dia1'] == '902') { $total = '2';}
            else {$total = '1';}
            if($clienteSiguiente['dia4'] != '0') { $totalSiguiente1 = '4';}
            else if($clienteSiguiente['dia3'] != '0') { $totalSiguiente1 = '3';}
            else if($clienteSiguiente['dia2'] != '0') { $totalSiguiente1 = '2';}
            else if ($clienteSiguiente['dia1'] != '0' && $clienteSiguiente['dia1'] != '901' && $clienteSiguiente['dia1'] != '902') {$totalSiguiente1 = '1';}
        else {$totalSiguiente1 = '0';}
            
            ?>
            <div class="clases" id="s1">
                <?php echo $clienteSiguiente['disciplina']." ".$totalSiguiente1."/".$total;?>
            </div>
            <?php
        }
        if($clienteSiguiente['disciplina2'] != '') {
            if($resultTotal['dia8'] != '0') { $total = '4';}
            else if($resultTotal['dia7'] != '0') { $total = '3';}
            else if($resultTotal['dia6'] != '0' || $resultTotal['dia5'] == '902') { $total = '2';}
            else {$total = '1';}
            if($clienteSiguiente['dia8'] != '0') { $totalSiguiente2 = '4';}
            else if($clienteSiguiente['dia7'] != '0') { $totalSiguiente2 = '3';}
            else if($clienteSiguiente['dia6'] != '0') { $totalSiguiente2 = '2';}
            else if ($clienteSiguiente['dia5'] != '0' && $clienteSiguiente['dia5'] != '901' && $clienteSiguiente['dia5'] != '902') {$totalSiguiente2 = '1';}
            else {$totalSiguiente2 = '0';}
            
            ?>
            <div class="clases" id="s2">
                <?php echo $clienteSiguiente['disciplina2']." ".$totalSiguiente2."/".$total;?>
            </div>
            <?php
        }
        if($clienteSiguiente['disciplina3'] != '') {
            if($resultTotal['dia12'] != '0') { $total = '4';}
            else if($resultTotal['dia11'] != '0') { $total = '3';}
            else if($resultTotal['dia10'] != '0' || $resultTotal['dia9'] == '902') { $total = '2';}
            else {$total = '1';}
            if($clienteSiguiente['dia12'] != '0') { $totalSiguiente3 = '4';}
            else if($clienteSiguiente['dia11'] != '0') { $totalSiguiente3 = '3';}
            else if($clienteSiguiente['dia10'] != '0') { $totalSiguiente3 = '2';}
            else if ($clienteSiguiente['dia9'] != '0' && $clienteSiguiente['dia9'] != '901' && $clienteSiguiente['dia9'] != '902') {$totalSiguiente3 = '1';}
            else {$totalSiguiente3 = '0';}
            
            ?>
            <div class="clases" id="s3">
                <?php echo $clienteSiguiente['disciplina3']." ".$totalSiguiente3."/".$total;?>
            </div>
            <?php
        }

        ?>
        <h3>Clases Actuales:</h3>
        <table class='apuntado'>
            <?php
        for($i = 1; $i < 13; $i++) {
            if($clienteSiguiente['dia'.$i] != '0' && $clienteSiguiente['dia'.$i] != '901'  && $clienteSiguiente['dia'.$i] != '902') {
                $id = $clienteSiguiente['dia'.$i];
                $clase = mysqli_query($con, "SELECT * FROM matSemUno WHERE id = '$id'");
                $clases = mysqli_fetch_array($clase);
                echo "<tr>";
                echo "<td>";
                echo $clases['nombre']." ".$clases['dia']." <span class='fecha'>".date('d-m',strtotime('this '.$s[$clases['dia']].'+ 1 week'))."</span> || ".date('H:i',strtotime($clases['inicio']))."-".date('H:i',strtotime($clases['fin']));
                echo "</td>";
                echo "<th>";
                echo "<a href='principal.php?borrarseSiguiente=".$clases['id']."'><img src='../img/borrarse.png'></a>";
                echo "</th>";
                echo "</tr>";
            }
        }
    ?>  
        </table>
        <h3>Clases Disponibles:</h3>
        <table class='disponible'>
            <?php
                $clase = mysqli_query($con, "SELECT * FROM matSemUno WHERE nombre = '$clienteSiguiente[disciplina]' AND nombre != ''||
                nombre = '$clienteSiguiente[disciplina2]' AND nombre != ''|| nombre = '$clienteSiguiente[disciplina3]'AND nombre != ''");
                while ($clases = mysqli_fetch_array($clase)) {

                    $numero = mysqli_query($con, "SELECT COUNT(*) as gente from matSemUnoAlumnos WHERE dia1 = '$clases[id]' || 
                    dia2 = '$clases[id]' || dia3 = '$clases[id]' || dia4 = '$clases[id]' || dia5 = '$clases[id]' || dia6 = '$clases[id]' ||
                    dia7 = '$clases[id]' || dia8 = '$clases[id]' || dia9 = '$clases[id]' || dia10 = '$clases[id]' || dia11 = '$clases[id]' || 
                    dia12 = '$clases[id]'");
                    $rn = mysqli_fetch_array($numero);

                    if($clases['aforo'] > $rn['gente']) {

                echo "<tr>";
                echo "<td>";
                echo $clases['nombre']." ".$clases['dia']." <span class='fecha'>".date('d-m',strtotime('this '.$s[$clases['dia']].'+ 1 week'))."</span>  || ".date('H:i',strtotime($clases['inicio']))."-".date('H:i',strtotime($clases['fin']));
                echo "</td>";
                echo "<th>";
                echo "<a href='principal.php?apuntarseSiguiente=".$clases['id']."&disc=".$clases['nombre']."'><img src='../img/apuntarse.png'></a>";
                echo "</th>";
                echo "</tr>";
                $cuenta = 1;
                    } else {
                        $cuenta = -1;
                    }
                }
                if($cuenta < 0) {
                    echo "<h2 class='fracaso'>Actualmente no hay plazas libres esta semana, prueba más adelante por si hubiera quedado algun hueco libre.</h2>";
                }
    ?>  
        </table> 
    </div>
        <!-----------------------------------------------------------------------
        ----------------------------FIN DIV SEMANA SIGUIENTE------------------------
        ------------------------------------------------------------------------>
    <script src="js/clases.js"></script> 
    <script src="js/semanas.js"></script>
            <?php } 
            mysqli_close($con)?>
</body>
</html>