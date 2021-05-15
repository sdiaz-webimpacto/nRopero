<h3 class="parrafo">
    <u>
    SOLICITUD DE CONSENTIMIENTO EXPLICITO PARA EL TRATAMIENTO DE SUS DATOS
PERSONALES QUE INCLUYAN DATOS DE SALUD
    </u>
</h3>
<p class="parrafo">
    <b>Responsable del Tratamiento:</b> Nuria Ropero Pérez
</p>
<p class="parrafo">
    <b>Dirección:</b> Goya 16, local, 13600, Alcázar de San Juán, Ciudad Real
</p>
<p class="parrafo">
    <b>Teléfono:</b> 626135115
</p>
<p class="parrafo">
Le informamos en relación a la gestión de sus datos personales (recabados de forma verbal o a través de la
documentación que en su caso nos aporte), que se tratarán bajo finalidades de <u> gestión de la actividad solicitada así
como los servicios derivados de esta relación (gestión de facturación o contabilidad, control de pagos,
cumplimiento con obligaciones legales, gestión de agenda y ponernos en contacto con el interesado a través de
los medios proporcionados para recordarle citaciones).</u> Si se incluyen datos de salud, precisamos de su
consentimiento explícito, que entenderemos dado con la firma de este documento. El tratamiento de sus datos de salud
por esta responsable no es obligatorio para la gestión del servicio solicitado. Puede negarse y oponerse al tratamiento
en cualquier momento, si bien ello no afectará a los tratamientos de datos producidos con anterioridad.
</p>
<p class="parrafo">
En general, conservaremos sus datos durante el tiempo en que se mantenga su relación con este centro, manteniéndose
posteriormente con medidas de seguridad de seudonimización o cifrado en la medida en que exista obligación legal
(ej., 5 años según art. 1964 del Código Civil -acciones personales sin plazo especial-, 6 años según art. 30 Código de
Comercio -libros de contabilidad, facturas...- 4 años según Ley General Tributaria, etc). Los datos de salud
proporcionados, en su caso, al no existir obligación legal de conservación por nuestra parte y dada su sensibilidad, se
destruirán finalizada la relación contractual. Al respecto, nos puede solicitar información adicional en un amplio
documento que hemos elaborado y que está a su disposición.
</p>
<p class="parrafo">
Se le reconocen sus derechos de acceso, rectificación, supresión, limitación al tratamiento y a la portabilidad de los
datos y para tal fin, le informamos que esta entidad ha elaborado unos formularios específicos (que están a su
disposición y que puede solicitar). No obstante, en cualquier momento puede dirigirse al responsable a través de una
petición con su nombre, apellidos, fotocopia de su dni -para acreditar su identidad- e indicarnos un domicilio a efecto
de notificaciones. En todo caso, si considera que estos derechos no se han satisfecho convenientemente por nuestra
parte, le informamos que puede presentar una reclamación ante la autoridad de control (Agencia Española de Protección
de Datos, Jorge Juan 6, 28001, Madrid, o ante su sede electrónica https://sedeagpd.gob.es). El ejercicio de estos
derechos es gratuitito.
</p>
<p class="parrafo">
D. <?php echo $row['nombre']." ".$row['apellidos'];?> con DNI/NIF <?php echo $row['dni'];?>  declaro
haber sido informado de lo dispuesto en este documento en relación al tratamiento de mis datos personales,
<u>consintiendo de forma explícita, con mi aceptación telemática, su tratamiento, que se destinarán a las finalidades indicadas en el
subrayado </u>del mismo.
</p>
<p class="parrafo">
<?php
    $dia = date('d',strtotime($row['alta']));
    $ano = date('Y',strtotime($row['alta']));
    $buscames = array('','enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
    $mes = $buscames[date('m',strtotime($row['alta']))];
    echo "En Alcázar de San Juan, a ".$dia." de ".$mes." de ".$ano;
    ?>
</p>
<p class="parrafo">
    Firmado mediante aceptación telemática.
</p>
<br><br><br>
<h3 class="parrafo">
AUTORIZACIÓN DEL FAMILIAR / TUTOR O REPRESENTANTE LEGAL (MENOR DE 14 AÑOS)
</h3>
<p class="parrafo">
Ante la imposibilidad de D/Dña_<?php echo $row['nombre']." ".$row['apellidos'];?>_con
DNI/NIF_<?php echo $row['dni'];?>_de acreditar haber recibido la información y haber consentido en
relación a los tratamientos de datos de salud que se detallan en el presente documento
D/Dña_<?php echo $row['tutor'];?>_con DNI/NIF__<?php echo $row['dnitutor'];?>_en
calidad de_<?php echo $row['familia'];?>_ (padre, madre, tutor legal, familiar, representante legal), declaro haber sido informado
de lo dispuesto del tratamiento de datos de mi representado, consintiendo su tratamiento, destinándose los mismos a
las finalidades indicadas en el <u>subrayado</u> del mismo.
</p>
<p class="parrafo">
<?php
    $dia = date('d',strtotime($row['alta']));
    $ano = date('Y',strtotime($row['alta']));
    $buscames = array('','enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
    $mes = $buscames[date('m',strtotime($row['alta']))];
    echo "En Alcázar de San Juan, a ".$dia." de ".$mes." de ".$ano;
    ?>
</p>
<p class="parrafo">
    Firmado mediante aceptación telemática.
</p>