<?php

    if($codigo['disciplina'] == 'Cancer M.'|| $codigo['disciplina2'] == 'Cancer M.' || $codigo['disciplina3'] == 'Cancer M.') {
        if($codigo['dia4'] != '0') {
            $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina]'");
            $clase = mysqli_fetch_array($clases);
            $importe1 = $clase['precio4'];
        } else if($codigo['dia3'] != '0') {
            $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina]'");
            $clase = mysqli_fetch_array($clases);
            $importe1 = $clase['precio3'];
        } else if($codigo['dia2'] != '0') {
            $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina]'");
            $clase = mysqli_fetch_array($clases);
            $importe1 = $clase['precio2'];
        } else if($codigo['dia1'] != '0') {
            $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina]'");
            $clase = mysqli_fetch_array($clases);
            $importe1 = $clase['precio1'];
        } 
        else if($codigo['dia8'] != '0') {
            $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina2]'");
            $clase = mysqli_fetch_array($clases);
            $importe1 = $clase['precio4'];
        } else if($codigo['dia7'] != '0') {
            $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina2]'");
            $clase = mysqli_fetch_array($clases);
            $importe1 = $clase['precio3'];
        } else if($codigo['dia6'] != '0') {
            $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina2]'");
            $clase = mysqli_fetch_array($clases);
            $importe1 = $clase['precio5'];
        } else if($codigo['dia1'] != '0') {
            $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina2]'");
            $clase = mysqli_fetch_array($clases);
            $importe1 = $clase['precio1'];
        } 
        else if($codigo['dia12'] != '0') {
            $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina3]'");
            $clase = mysqli_fetch_array($clases);
            $importe1 = $clase['precio4'];
        } else if($codigo['dia11'] != '0') {
            $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina3]'");
            $clase = mysqli_fetch_array($clases);
            $importe1 = $clase['precio3'];
        } else if($codigo['dia10'] != '0') {
            $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina3]'");
            $clase = mysqli_fetch_array($clases);
            $importe1 = $clase['precio5'];
        } else if($codigo['dia9'] != '0') {
            $clases = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina3]'");
            $clase = mysqli_fetch_array($clases);
            $importe1 = $clase['precio1'];
        } 
} 
if ($codigo['disciplina'] == 'Obesidad'|| $codigo['disciplina2'] == 'Obesidad' || $codigo['disciplina3'] == 'Obesidad') {
    if($codigo['dia4'] != '0') {
        $clases2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina]'");
        $clase2 = mysqli_fetch_array($clases2);
        $importe2 = $clase2['precio4'];
    } else if($codigo['dia3'] != '0') {
        $clases2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina]'");
        $clase2 = mysqli_fetch_array($clases2);
        $importe2 = $clase2['precio3'];
    } else if($codigo['dia2'] != '0') {
        $clases2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina]'");
        $clase2 = mysqli_fetch_array($clases2);
        $importe2 = $clase2['precio2'];
    } else if($codigo['dia1'] != '0') {
        $clases2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina]'");
        $clase2 = mysqli_fetch_array($clases2);
        $importe2 = $clase2['precio1'];
    } 
    else if($codigo['dia8'] != '0') {
        $clases2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina2]'");
        $clase2 = mysqli_fetch_array($clases2);
        $importe2 = $clase2['precio4'];
    } else if($codigo['dia7'] != '0') {
        $clases2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina2]'");
        $clase2 = mysqli_fetch_array($clases2);
        $importe2 = $clase2['precio3'];
    } else if($codigo['dia6'] != '0') {
        $clases2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina2]'");
        $clase2 = mysqli_fetch_array($clases2);
        $importe2 = $clase2['precio5'];
    } else if($codigo['dia1'] != '0') {
        $clases2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina2]'");
        $clase2 = mysqli_fetch_array($clases2);
        $importe2 = $clase2['precio1'];
    } 
    else if($codigo['dia12'] != '0') {
        $clases2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina3]'");
        $clase2 = mysqli_fetch_array($clases2);
        $importe2 = $clase2['precio4'];
    } else if($codigo['dia11'] != '0') {
        $clases2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina3]'");
        $clase2 = mysqli_fetch_array($clases2);
        $importe2 = $clase2['precio3'];
    } else if($codigo['dia10'] != '0') {
        $clases2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina3]'");
        $clase2 = mysqli_fetch_array($clases2);
        $importe2 = $clase2['precio2'];
    } else if($codigo['dia9'] != '0') {
        $clases2 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = '$codigo[disciplina3]'");
        $clase2 = mysqli_fetch_array($clases2);
        $importe2 = $clase2['precio1'];
    } 
    } 
if($codigo['disciplina'] == 'Personal'|| $codigo['disciplina2'] == 'Personal' || $codigo['disciplina3'] == 'Personal') {
        $clases3 = mysqli_query($con, "SELECT * FROM matClases WHERE nombre = 'Personal'");
        $clase3 = mysqli_fetch_array($clases3);
        if($codigo['dia1'] == '901' || $codigo['dia5'] == '901' || $codigo['dia9'] == '901') {
        $importe3 = $clase3['precio1'];} else {
            $importe3 = $clase3['precio2'];   
        }
    } 
    $contadorClases = array();   
if($codigo['disciplina'] != 'Cancer M.' && $codigo['disciplina'] != 'Obesidad' && $codigo['disciplina'] != 'Personal' && 
 $codigo['disciplina'] != 'Meditacion') {
        if($codigo['dia1'] > 0 && $codigo['dia1'] != 226) { array_push($contadorClases, $codigo['dia1']);}
        if($codigo['dia2'] > 0) { array_push($contadorClases, $codigo['dia2']);}
        if($codigo['dia3'] > 0) { array_push($contadorClases, $codigo['dia3']);}
        if($codigo['dia4'] > 0) { array_push($contadorClases, $codigo['dia4']);}
}
if($codigo['disciplina2'] != 'Cancer M.' && $codigo['disciplina2'] != 'Obesidad' && $codigo['disciplina2'] != 'Personal' && 
 $codigo['disciplina2'] != 'Meditacion') {
        if($codigo['dia5'] > 0 && $codigo['dia5'] != 226) { array_push($contadorClases, $codigo['dia5']);}
        if($codigo['dia6'] > 0) { array_push($contadorClases, $codigo['dia6']);}
        if($codigo['dia7'] > 0) { array_push($contadorClases, $codigo['dia7']);}
        if($codigo['dia8'] > 0) { array_push($contadorClases, $codigo['dia8']);}
}
if($codigo['disciplina3'] != 'Cancer M.' && $codigo['disciplina3'] != 'Obesidad' && $codigo['disciplina3'] != 'Personal' && $codigo['disciplina3'] != 'Meditacion') {
        if($codigo['dia9'] > 0 && $codigo['dia1'] != 226) { array_push($contadorClases, $codigo['dia9']);}
        if($codigo['dia10'] > 0) { array_push($contadorClases, $codigo['dia10']);}
        if($codigo['dia11'] > 0) { array_push($contadorClases, $codigo['dia11']);}
        if($codigo['dia12'] > 0) { array_push($contadorClases, $codigo['dia12']);}
}
    $clases4 = mysqli_query($con, "SELECT precio1, precio2, precio3, precio4 FROM matClases WHERE nombre = 'Pilates'");
    $clase4 = mysqli_fetch_array($clases4);
        $num = sizeof($contadorClases);
        if($num == '1') {
            $importe4 = $clase4['precio1'];
            } 
        else if ($num == '2') {
            $importe4 = $clase4['precio2'];
            } 
            else if($num == '3') {
            $importe4 = $clase4['precio3'];
            } 
            else if($num >= '4') {
            $importe4 = $clase4['precio4'];
            } 
            else {
            $importe4 = 0;
            }
        