<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maternity-fitness App</title>
    <link href="css/estilo.css" rel="stylesheet" media="">
    <link rel="icon" href="img/favicon.png">
    <!--color: ff0d90-->
</head>
<body>
    <header>
        <div id="cabecera">
            <div id="logo">
                <a href="index.php"><img src="img/logo.png" alt="logo"></a>
            </div>
            <div id="menu">
                <ul>
                <li id="opciones"><a href="nuevocliente.php">Nuevo cliente</a></li>
                    <li id="opciones"><a href="clientes.php">Clientes</a></li>
                    <li id="opciones"><a href="clases.php">Clases</a></li>
                    <li id="opciones"><a href="talleres.php">Talleres</a></li>
                    <li id="opciones"><a href="">Pagos</a>
                        <ul>
                            <li id="submenu"><a href="corrientes.php">Al corriente</a></li>
                            <li id="submenu"><a href="pendientes.php">Pendientes</a></li>
                            <li id="submenu"><a href="facturacion.php">Facturacion</a></li><li id="submenu"><a href="prueba2.php">Resumen</a></li>
                        </ul></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <h1 class="titulo">Seguimiento Embarazo</h1>
         
        <table class="lista">
        <tr><td colspan="3"><h2>Sonia Moldes Jerez</h2></td>
        <tr><td colspan="3"><h3>Alergias: NO || Abortos: 1 || Enfermedades: No || Deporte: 2 dias</h3></td>
        </tr>
        <tr><th>Semana</th><th>Peso</th><th>Ctms</th></tr>
        <tr><td>29</td>
        <td>65</td>
        <td>70</td></tr>
        <tr><td>30</td>
        <td>68</td>
        <td>72</td></tr>
        <tr><td>31</td>
        <td>69</td>
        <td>74</td></tr>
        <tr><td>31</td>
        <td>72</td>
        <td>78</td></tr>
        </table>
        <a href="clientes.php"><img src="img/atras.png" class="volver-fuera"></a>
    </main>
</body>
</html>