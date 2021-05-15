<?php
include_once("partes/head.php");
?>
<body ontouchstart>
    <?php
    include_once("partes/headerCliente.php");
        /////////////////////////  QUERYS //////////////////////////////
        $siguiente = mysqli_query($con, "SELECT * FROM matSemUnoAlumnos WHERE dni = '$_SESSION[usuario]'");
        $clienteSiguiente = mysqli_fetch_array($siguiente);
        $actual = mysqli_query($con, "SELECT * FROM matSemActualAlumnos WHERE dni = '$_SESSION[usuario]'");
        $clienteActual = mysqli_fetch_array($actual);
        $buscaTotal = mysqli_query($con, "SELECT * FROM matClientes WHERE dni = '$_SESSION[usuario]'");
        $resultTotal = mysqli_fetch_array($buscaTotal);
        $hoy = date('w');
        for($i=1;$i<13;$i++) {
            if($clienteActual['dia'.$i] != '0' && $clienteActual['dia'.$i] != '901' && $clienteActual['dia'.$i] != '902') {
               $ca[] = '1';
            } else {
                $ca[] = '0';
            }
        }
        for($i=1;$i<13;$i++) {
            if($clienteSiguiente['dia'.$i] != '0' && $clienteSiguiente['dia'.$i] != '901' && $clienteSiguiente['dia'.$i] != '902') {
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
                       if($borradoActual) {
                           echo "<h3 class='exito'>Se ha borrado de la clase correctamente.</h3>";
                       }
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
                       if($borradoSiguiente) {
                        echo "<h3 class='exito'>Se ha borrado de la clase correctamente.</h3>";
                    }
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
                        if($borradoActual) {
                            echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                        } 
                    } 
                       
                } else if ($clienteActual['dia2'] == '0' && $clienteActual['disciplina'] == $_GET['disc']) {
                    if(($ca[0] + $ca[1] + $ca[2] + $ca[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
                    $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia2 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                    if($borradoActual) {
                        echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                    } 
                }
                } else if ($clienteActual['dia3'] == '0' && $clienteActual['disciplina'] == $_GET['disc']) {
                    if(($ca[0] + $ca[1] + $ca[2] + $ca[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
                    $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia3 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                    if($borradoActual) {
                            echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                        } 
                }
                } else if ($clienteActual['dia4'] == '0' && $clienteActual['disciplina'] == $_GET['disc']) {
                    if(($ca[0] + $ca[1] + $ca[2] + $ca[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
                    $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia4 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                    if($borradoActual) {
                            echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                        } 
                }
                } else if ($clienteActual['dia5'] == '0' && $clienteActual['disciplina2'] == $_GET['disc']) {
                    if(($ca[4] + $ca[5] + $ca[6] + $ca[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
                    $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia5 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                    if($borradoActual) {
                            echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                        } 
                }
                }else if ($clienteActual['dia6'] == '0' && $clienteActual['disciplina2'] == $_GET['disc']) {
                    if(($ca[4] + $ca[5] + $ca[6] + $ca[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
                    $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia6 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                    if($borradoActual) {
                            echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                        } 
                }
                }else if ($clienteActual['dia7'] == '0' && $clienteActual['disciplina2'] == $_GET['disc']) {
                    if(($ca[4] + $ca[5] + $ca[6] + $ca[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
                    $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia7 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                    if($borradoActual) {
                            echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                        } 
                }
                }else if ($clienteActual['dia8'] == '0' && $clienteActual['disciplina2'] == $_GET['disc']) {
                    if(($ca[4] + $ca[5] + $ca[6] + $ca[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
                    $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia8 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                    if($borradoActual) {
                            echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                        } 
                }
                }else if ($clienteActual['dia9'] == '0' && $clienteActual['disciplina3'] == $_GET['disc']) {
                    if(($ca[8] + $ca[9] + $ca[10] + $ca[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
                    $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia9 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                    if($borradoActual) {
                            echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                        } 
                }
                }else if ($clienteActual['dia10'] == '0' && $clienteActual['disciplina3'] == $_GET['disc']) {
                    if(($ca[8] + $ca[9] + $ca[10] + $ca[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
                    $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia10 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                    if($borradoActual) {
                            echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                        } 
                }
                }else if ($clienteActual['dia11'] == '0' && $clienteActual['disciplina3'] == $_GET['disc']) {
                    if(($ca[8] + $ca[9] + $ca[10] + $ca[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
                    $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia11 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                    if($borradoActual) {
                            echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                        } 
                }
                }else if ($clienteActual['dia12'] == '0' && $clienteActual['disciplina3'] == $_GET['disc']) {
                    if(($ca[8] + $ca[9] + $ca[10] + $ca[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
                    $borradoActual = mysqli_query($con, "UPDATE matSemActualAlumnos SET dia12 = '$_GET[apuntarseActual]' WHERE dni = '$_SESSION[usuario]'");
                    if($borradoActual) {
                            echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                        } 
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
                    if($borradoSiguiente) {
                        echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                    } 
                }
                   
            } else if ($clienteSiguiente['dia2'] == '0' && $clienteSiguiente['disciplina'] == $_GET['disc']) {
                if(($cs[0] + $cs[1] + $cs[2] + $cs[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
                $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia2 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
                if($borradoSiguiente) {
                        echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                    } 
            }
            } else if ($clienteSiguiente['dia3'] == '0' && $clienteSiguiente['disciplina'] == $_GET['disc']) {
                if(($cs[0] + $cs[1] + $cs[2] + $cs[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
                $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia3 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
                if($borradoSiguiente) {
                        echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                    } 
            }
            } else if ($clienteSiguiente['dia4'] == '0' && $clienteSiguiente['disciplina'] == $_GET['disc']) {
                if(($cs[0] + $cs[1] + $cs[2] + $cs[3]) < ($ct[0] + $ct[1] + $ct[2] + $ct[3])) {
                $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia4 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
                if($borradoSiguiente) {
                        echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                    } 
            } 
            } else if ($clienteSiguiente['dia5'] == '0' && $clienteSiguiente['disciplina2'] == $_GET['disc']) {
                if(($cs[4] + $cs[5] + $cs[6] + $cs[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
                $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia5 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
                if($borradoSiguiente) {
                        echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                    } 
            } 
            }else if ($clienteSiguiente['dia6'] == '0' && $clienteSiguiente['disciplina2'] == $_GET['disc']) {
                if(($cs[4] + $cs[5] + $cs[6] + $cs[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
                $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia6 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
                if($borradoSiguiente) {
                        echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                    } 
            }
            }else if ($clienteSiguiente['dia7'] == '0' && $clienteSiguiente['disciplina2'] == $_GET['disc']) {
                if(($cs[4] + $cs[5] + $cs[6] + $cs[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
                $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia7 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
                if($borradoSiguiente) {
                        echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                    } 
            } 
            }else if ($clienteSiguiente['dia8'] == '0' && $clienteSiguiente['disciplina2'] == $_GET['disc']) {
                if(($cs[4] + $cs[5] + $cs[6] + $cs[7]) < ($ct[4] + $ct[5] + $ct[6] + $ct[7])) {
                $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia8 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
                if($borradoSiguiente) {
                        echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                    } 
            } 
            }else if ($clienteSiguiente['dia9'] == '0' && $clienteSiguiente['disciplina3'] == $_GET['disc']) {
                if(($cs[8] + $cs[9] + $cs[10] + $cs[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
                $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia9 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
                if($borradoSiguiente) {
                        echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                    } 
            } 
            }else if ($clienteSiguiente['dia10'] == '0' && $clienteSiguiente['disciplina3'] == $_GET['disc']) {
                if(($cs[8] + $cs[9] + $cs[10] + $cs[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
                $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia10 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
                if($borradoSiguiente) {
                        echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                    } 
            } 
            }else if ($clienteSiguiente['dia11'] == '0' && $clienteSiguiente['disciplina3'] == $_GET['disc']) {
                if(($cs[8] + $cs[9] + $cs[10] + $cs[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
                $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia11 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
                if($borradoSiguiente) {
                        echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                    } 
            } 
            }else if ($clienteSiguiente['dia12'] == '0' && $clienteSiguiente['disciplina3'] == $_GET['disc']) {
                if(($cs[8] + $cs[9] + $cs[10] + $cs[11]) < ($ct[8] + $ct[9] + $ct[10] + $ct[11])) {
                $borradoSiguiente = mysqli_query($con, "UPDATE matSemUnoAlumnos SET dia12 = '$_GET[apuntarseSiguiente]' WHERE dni = '$_SESSION[usuario]'");
                if($borradoSiguiente) {
                        echo "<h3 class='exito'>Se ha inscrito a esta nueva clase.</h3>";
                    } 
            } 
            }
        }
    
        echo "<a href='principal.php'><button><h3>INICIO</h3></button></a>";
            }





    ?>
</body>
<?php
mysqli_close($con);
?>
</html>