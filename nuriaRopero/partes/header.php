<header>
        <div id="cabecera">
            <div id="logo">
                <a href="inicio.php"><img src="img/logo.png" alt="logo"></a>
            </div>
            <div id="menu">
                <ul>
                <li id="opciones"><a href="nuevocliente.php">Nuevo cliente</a></li>
                    <li id="opciones"><a href="">Clientes</a>
                    <ul>
                            <li id="submenu"><a href="clientes.php">Clientes</a></li>
                            <li id="submenu"><a href="pref.php">Extracción</a></li>
                        </ul>
                </li>
                    <li id="opciones"><a href="">Clases</a>
                        <ul>
                            <li id="submenu"><a href="clases.php">Clases</a></li>
                            <li id="submenu"><a href="espera.php">Lista Espera</a></li>
                        </ul></li>
                    <li id="opciones"><a href="talleres.php">Talleres</a></li>
                    <li id="opciones"><a href="">Pagos</a>
                        <ul>
                            <li id="submenu"><a href="corrientes.php">Al corriente</a></li>
                            <li id="submenu"><a href="pendientes.php">Pendientes</a></li>
                            <?php if($_SESSION['tipo'] == 'total') { ?>
                            <li id="submenu"><a href="facturacion.php">Facturacion</a></li>
                            <li id="submenu"><a href="resumen.php">Resumen</a></li>
                            <li id="submenu"><a href="extPagos.php">Extracción</a></li>
                            <?php } ?>
                        </ul></li>
                </ul>
            </div>
        </div>
    </header>

    