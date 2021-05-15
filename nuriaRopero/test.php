<?php
if($_GET['metodo'] != '') {
    $pagostotal = mysqli_query($con, "SELECT * FROM matPagos WHERE fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND nombre LIKE '%".$_GET['busqueda']."%' || 
                                fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND apellidos LIKE '%".$_GET['busqueda']."%' || 
                                fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND disciplina LIKE '%".$_GET['busqueda']."%' order by fecha");
    $metodos = mysqli_query($con, "SELECT metodo, SUM(importe) as importe FROM matPagos WHERE fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND nombre LIKE '%".$_GET['busqueda']."%' || 
                                fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND apellidos LIKE '%".$_GET['busqueda']."%' || 
                                fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND disciplina LIKE '%".$_GET['busqueda']."%'");
while($row = mysqli_fetch_array($metodos)) {
    $op[$row['metodo']] = $row['importe'];
}
$suma = $op['bizum'] + $op['efectivo'] + $op['transferencia'] + $op['tarjeta'] + $op['domiciliado'];
echo "<br><h1>FACTURACIÓN DESDE EL ".$desde." Y EL ".$hasta."</h1><br>";
echo "<h2>Todos los metodos de pago.</h2>";
echo "<h1>Total de ingresos del periodo:</h1><br>";
echo "<h1 style='color:blue; font-size:2em;'>".$suma."€</h1>";
echo "<h3><span style='background-color:#ff0d90; color:gainsboro; padding:3%;'>Efectivo:".$op['efectivo']."€</span>
        <span style='background-color:#FF69B4; color:lightgray; padding:3%;'>Tarjeta:".$op['tarjeta']."€</span>
        <span style='background-color:#FFB6C1; color:grey; padding:3%;'>Bizum:".$op['bizum']."€</span>
        <span style='background-color:#FFC0CB; color:dimgrey; padding:3%;'>Transferencia:".$op['transferencia']."</span></h3>";
?>
<table class="lista">
<tr><th>Nombre</th><th>fecha pago</th><th>Método</th><th>Importe</th></tr>
<?php
while($rc = mysqli_fetch_array($pagostotal)) {
 echo "<tr><td>".$rc['nombre']." ".$rc['apellidos']."</td><td>".$rc['fecha']."</td><td>".$rc['metodo']."</td><td>".$rc['importe']."</td></tr>";
} ?>
</table> <?php
} else {

        $pagostotal = mysqli_query($con, "SELECT * FROM matPagos WHERE metodo = '$metodo' AND  fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND nombre LIKE '%".$_GET['busqueda']."%' || 
                                    fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND apellidos LIKE '%".$_GET['busqueda']."%' || 
                                    fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND disciplina LIKE '%".$_GET['busqueda']."%' order by fecha");
        $metodos = mysqli_query($con, "SELECT SUM(importe) as importe FROM matPagos WHERE metodo = '$metodo' AND fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND nombre LIKE '%".$_GET['busqueda']."%' || 
        fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND apellidos LIKE '%".$_GET['busqueda']."%' || fecha BETWEEN '$_GET[desde]' AND '$_GET[hasta]' AND disciplina LIKE '%".$_GET['busqueda']."%'");
    while($row = mysqli_fetch_array($metodos)) {
        $op[$row['metodo']] = $row['importe'];
    }
    echo "<br><h1>FACTURACIÓN DESDE EL ".$desde." Y EL ".$hasta."</h1><br>";
    echo "<h2>Pagados mediante ".$metodo.".</h2>";
    echo "<h1>Total de ingresos del periodo:</h1><br>";
    echo "<h1 style='color:blue; font-size:2em;'>".$op[$row['metodo']]."€</h1>";
?>
<table class="lista">
    <tr><th>Nombre</th><th>fecha pago</th><th>Método</th><th>Importe</th></tr>
    <?php
    while($rc = mysqli_fetch_array($pagostotal)) {
     echo "<tr><td>".$rc['nombre']." ".$rc['apellidos']."</td><td>".$rc['fecha']."</td><td>".$rc['metodo']."</td><td>".$rc['importe']."</td></tr>";
    } 
    }