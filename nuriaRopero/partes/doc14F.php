<h2 class="parrafo">
INFORMACIÓN EN RELACIÓN AL TRATAMIENTO DE TUS DATOS PERSONALES (MENORES
ENTRE 14 Y 18 AÑOS)
</h2>
<br>
<p class="parrafo">
Por favor, lee este documento que te informa sobre aspectos relacionados con el tratamiento de tus datos personales
(por ejemplo, porqué te los pedimos, durante cuánto tiempo tenemos intención de conservarlos u otras informaciones
importantes):
</p>
<br>
<h3 class="parrafo">
    <u>
    ¿Quién solicita tus datos?
    </u>
</h3>
<br>
<p class="parrafo">
    <b>Responsable:</b> Nuria Ropero Pérez
</p>
<br>
<p class="parrafo">
    <b>Dirección:</b> Goya 16, local, 13600, Alcázar de San Juán, Ciudad Real
</p>
<br>
<p class="parrafo">
    <b>Teléfono:</b> 626135115
</p>
<br>
<h3 class="parrafo">
    <u>¿Porqué necesitamos registrar tus datos en archivos informáticos o en documentos?</u>
</h3>
<br>
<p class="parrafo">
Los necesitamos porque resulta imprescindible para prestarte un buen servicio en relación a las actividades que
desarrollamos en este centro y finalidades administrativas propias de la gestión que nos has solicitado (gestión de
citaciones y agenda). También para cumplir con las obligaciones legales establecidas.
</p>
<br>
<h3 class="parrafo">
<u>¿En base a qué los tratamos?</u>
</h3>
<br>
<p class="parrafo">
Los tratamos porque has solicitado nuestros servicios, y registrarlos es imprescindible para que podamos prestarte los
servicios de forma controlada. También porque existe una obligación legal que nos obliga a guardarlos y conservarlos.
Si tenemos la necesidad de tratar tus datos de salud, lo haremos sólo si nos das tu permiso con la firma de este
documento.
</p>
<br>
<h3 class="parrafo">
    <u>¿Durante cuánto tiempo conservas mis datos?</u>
</h3>
<br>
<p class="parrafo">
Tan sólo durante el tiempo en que legalmente resulte exigible. Tus datos los conservaremos mientras dure la gestión
de los servicios que te prestamos. Finalizados los mismos, tenemos la obligación de conservarlos bloqueados de forma
segura durante el plazo que nos marque la ley.
</p>
<br>
<h3 class="parrafo">
    <u>¿Puede alguien más tener acceso a los datos personales?</u>
</h3>
<br>
<p class="parrafo">
Estamos obligados a mantener el deber de secreto de todos los datos que nos proporciones. No obstante, es posible que
exista alguna ley que nos obligue a cederlos en determinadas situaciones.
</p>
<br>
<h3 class="parrafo">
    <u>¿Qué derechos tengo?</u>
</h3>
<br>
<p class="parrafo">
Todos los que te confiere la ley. Por ejemplo, puedes saber qué datos personales tenemos acerca de tí en cualquier
momento, rectificarlos, o pedirnos que los borremos (lo haremos en aquellos casos en los que sea posible). Los derechos
DOC 14-F
que te confiere la normativa son los de acceso, rectificación, supresión, limitación al tratamiento y a la portabilidad de
tus datos. También podrás oponerte al tratamiento en cualquier momento, si bien ello no afectará a los tratmaientos de
datos que hayamos realizado hasta entonces, como es lógico. Tenemos unos formularios que puedes completar en
cualquier momento (te ayudaremos para que puedas hacerlo si es necesario). Simplemente tienes que dirigirte a las
direcciones arriba indicadas (por correo postal o electrónico, recuerda siempre acreditar tu identidad, por ejemplo con
una fotocopia de tu DNI). También puedes solicitarlos en este centro. Finalmente, también podrás reclamar a la Agencia
Española de Protección de Datos, en la dirección Jorge Juan 6, 28001, Madrid, o a través de su página web
https://sedeagpd.gob.es). El ejercicio de estos derechos es completamente gratuito.
</p>
<br>
<p class="parrafo">
D. <?php echo $row['nombre']." ".$row['apellidos'];?> con DNI/NIF <?php echo $row['dni'];?> declaro
haber sido informado de lo dispuesto en este documento en relación al tratamiento de mis datos personales, consintiendo
de forma explícita, su tratamiento, que se destinarán a las finalidades indicadas.
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