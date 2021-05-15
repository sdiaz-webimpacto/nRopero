<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maternity-fitness App</title>
    <link href="css/factura.css" rel="stylesheet" media="">
    <link rel="icon" href="img/favicon.png">
    <meta http-equiv="refresh" content="5; url=pendientes.php">
    <!--color: ff0d90-->
</head>
<body style="width: 210px; height:323px;">
    <?php 
        $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
        $buscarExiste = mysqli_query($con, "SELECT tiket FROM matPagos WHERE id = '$_REQUEST[codigo]'");
        $existe = mysqli_fetch_array($buscarExiste);
        $siExiste = $existe['tiket'];

        if($siExiste == '0') {

        $buscaNumero = mysqli_query($con, "SELECT numeracion FROM matPagos LIMIT 1");
        $numeros = mysqli_fetch_array($buscaNumero);
        $numero = $numeros['numeracion'];
        mysqli_query($con, "UPDATE matPagos set tiket = '$numero', empleado = '$_REQUEST[operario]' WHERE id = '$_REQUEST[codigo]'");
        mysqli_query($con, "UPDATE matPagos set numeracion = (numeracion + '1')");

        }

        $query = mysqli_query($con, "SELECT * FROM matPagos WHERE id = '$_REQUEST[codigo]'");
        $row = mysqli_fetch_array($query);        
        $cliente = mysqli_query($con, "SELECT disciplina, disciplina2, disciplina3 FROM matClientes 
        WHERE nombre = '$row[nombre]' AND apellidos = '$row[apellidos]'");
        $d = mysqli_fetch_array($cliente);
        include("partes/factura.php");
        mysqli_close($con);
    ?>
    <script>window.print();</script>
</body>
</html>