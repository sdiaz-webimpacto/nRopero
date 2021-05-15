<h1 class="parrafo">AUTORIZACION CENTRO DE ENTRENAMIENTO NURIA ROPERO</h1>
<h3 class="parrafo">PRECIOS POR ACTIVIDAD Y DÍAS:</h3>
<p class="parrafo">El precio variará en función del número de sesiones 
    semanales que escojas (las podrás encontrar en la página web).</p>
    <br>
<p class="parrafo">
Los pagos se harán del 1-5 de cada mes con pago en metálico, tarjeta bancaria o 
transferencia bancaria. De lo contrario, se perderá el derecho a la reserva de la 
plaza y se pasará a otra persona.
</p>
<br>
<p class="parrafo">
Las cuotas se pagan completas para mantener la continuidad del curso. 
Solo se podrán pagar quincenas al iniciar la actividad como usuario 
nuevo o al finalizarla (pudiendo pagar la primera quincena de ese último mes).
</p>
<br>
<p class="parrafo">
Para darse de baja será necesario avisarlo antes de finalizar el mes. 
Una vez empezado el nuevo mes, deberá abonarse la cuota completa.
</p>
<br>
<h3 class="parrafo">
NORMAS DE CONVIVENCIA:
</h3>
<p class="parrafo">
- Se ruega mantener una higiene corporal. <br>
- El uso de toalla grande que cubra la colchoneta es obligatorio. <br>
- El uso de mascarilla es obligatorio en todo el centro. <br>
- Cada alumno traerá su propia colchoneta/esterilla para las actividades. <br>
- Se recomiendan calcetines antideslizantes <br>
- Es de obligado cumplimiento las normas de desinfección e higiene en todo el centro. <br>
- Cualquier consulta podéis hacerla a través del teléfono o concretar una cita, evitando 
así retrasar las clases posteriores. <br>
- A la hora de realizar el pago se podrá reclamar un recibo si así lo desea.
</p>
<br>
<h3 class="parrafo">
PATOLOGÍAS, DOLORES O MEDICACIÓN
</h3>
<p class="parrafo">
A continuación comenta en este espacio si sufres molestias en alguna parte de tu cuerpo, 
si tienes alguna patología diagnosticada por médico o si tomas algún tipo de medicación. 
Toda la información que podamos recoger se trata de forma confidencial y nos ayudará a trabajar mejor contigo.
</p>
<p class="respuesta" style="border:1px solid black">
    <?php echo $row['patDolMed'];?>
</p>
<br>
<p class="respuesta">
    <?php 
        if($row['rrss'] == 'SI') {
            echo "Yo ".$row['nombre']." ".$row['apellidos']." con DNI ".$row['dni']." autorizo a Nuria Ropero a utilizar 
            de forma puntual mi imagen con fines de publicidad y marketing de la actividad.";
        }
    ?>
</p>
<p class="parrafo">Documento aceptado de forma telemática.</p>