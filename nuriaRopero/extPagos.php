<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maternity-fitness App</title>
    <link href="css/estilo.css" rel="stylesheet" media="">
    <link rel="icon" href="img/favicon.png">
    <?php
    if($_GET) {
       header('Content-type:application/vnd.ms-excel;charset=iso-8859-15');
       header('Content-disposition:attachment; filename=pagos_'.date('dmY').'.xls');
        echo "</head>";

        $desde = $_REQUEST['desde'];
        $hasta = $_REQUEST['hasta'];
        include("consultas/conexion.php");
        include("consultas/extPagos.php");
        include("tablas/extPagos.php");
    } else {
    ?>
</head>
<body>
    <?php
    include("partes/header.php");
    ?>
    <main>
                
        <form action="" method="get">
        <table class="form">
            <tr>
                <th><h3>Desde:</h3></th><th><h3>Hasta:</h3></th>
            </tr>
            <tr>
                <td><input type="date" name="desde"></td><td><input type="date" name="hasta"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="DESCARGAR" class="submit"></td>
            </tr>

        </table>
        </form>

    </main>
    <?php }
    mysqli_close($con);
    ?>
</body>
</html>