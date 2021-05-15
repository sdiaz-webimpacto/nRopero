<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maternity-fitness App</title>
    <link href="css/folio.css" rel="stylesheet" media="">
    <link rel="icon" href="img/favicon.png">
    <!--color: ff0d90-->
</head>
<body style="width: 700px;">
    <?php 
        $con = mysqli_connect('qaci391.pendientines.com', 'qaci393', 'Santi001', 'qaci391');
        $query = mysqli_query($con, "SELECT * FROM matClientes WHERE id = '$_GET[codigo]'");
        $row = mysqli_fetch_array($query);
        include("partes/parq.php");
    ?>
</body>
</html>