<div>
<img src="img/logo2.png" alt="logo" id="logo">
</div>
<h1>Centro de Entrenamiento.</h1>
<p>
Calle Goya 16. <br>
Alcázar de San Juan <br>
fitness.maternity@gmail.com <br>
626135115
</p><br>
<p class="especial">
Fact.Simple: <?php echo $row['tiket'];?> Fecha: <?php echo date('d/m/Y',strtotime($row['fecha']));?><br>
Empleado: <?php echo $row['empleado'];?><br>
Cliente: <?php echo $row['nombre']." ".$row['apellidos'];?>
</p><br>
<table>
<tr>
<th>Uds</th>
<th>Descripción</th>
<th>P.V.</th>
<th>Total</th>
</tr>
<tr>
    <td>1</td>
    <td>
        <?php
        if($row['disciplina'] != 'Taller') {
            echo $d['disciplina'];
        } else {
            echo "Taller";
        }
        ?>
    </td>
    <td><?php echo $row['importe'];?>€</td>
    <td><?php echo $row['importe'];?>€</td>
</tr>
<?php
if($d['disciplina2'] != '') { 
    ?>
<tr>
    <td>1</td>
    <td>
        <?php
        if($d['disciplina2'] != 'Taller') {
            echo $d['disciplina2'];
        } else {
            echo "Taller";
        }
        ?>
    </td>
    <td></td>
    <td></td>
    </tr>
    <?php } ?>
    <?php
    if($d['disciplina3'] != '') { 
    ?>
    <tr><td>1</td>
    <td>
        <?php
        if($d['disciplina3'] != 'Taller') {
            echo $d['disciplina3'];
        } else {
            echo "Taller";
        }
        ?>
    </td>
    <td></td>
    <td></td>
    </tr><?php } ?>
<tr>
    <th colspan="3">Total pagado:</th>
    <th><?php echo $row['importe'];?>€</th>
</tr>
<tr>
    <td colspan="3">Deuda de:</td>
    <td><?php echo $row['resto'];?>€</td>
</tr>
<tr>
    <td colspan="3">Entregado:</td>
    <td><?php echo $row['entregado'];?>€</td>
</tr>
<tr>
    <td colspan="3">Devolucion:</td>
    <td><?php echo $row['devuelto'];?>€</td>
</tr>
</table>
<p>Forma de pago: <?php echo $row['metodo'];?><br>
Impuestos incluidos <br>
<b>Gracias por su visita</b></p>