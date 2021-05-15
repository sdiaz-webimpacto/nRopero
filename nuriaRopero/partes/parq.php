<h3 class="parrafo">CUESTIONARIO PAR-Q (Physical Activity Readiness Questionnaire)</h3>
<p class="parrafo">
Para poder aumentar su nivel habitual de actividad física o realizar esfuerzo físico mayor del que 
habitualmente realiza en su vida diaria, es recomendable que responda las siguientes siete preguntas 
<b>(SI o NO)</b> de forma honesta y responsable. Luego, siga las instrucciones que se dan al final 
del cuestionario.
</p>
<table>
    <tr><td><p class="parrafo">Fecha: <?php echo date('d-m-Y',strtotime($row['alta']));?></p></td><td></td></tr>
    <tr>
        <td>
            <p class="parrafo">
            ¿Alguna vez el médico le ha dicho que usted tiene un problema cardíaco y que por eso sólo 
            debería realizar actividad física recomendada por él?
            </p>
        </td>
        <td>
            <p class="respuesta"><?php echo $row['actFisRec'];?></p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="parrafo">
            ¿Cuando hace actividad física siente dolor en el pecho?
            </p>
        </td>
        <td>
            <p class="respuesta"><?php echo $row['pechoF'];?></p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="parrafo">
            ¿En el último mes y estando en reposo, ha sentido dolor en el pecho?
            </p>
        </td>
        <td>
            <p class="respuesta"><?php echo $row['pechoR'];?></p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="parrafo">
            ¿Pierde el equilibrio por mareos o vértigo?
            </p>
        </td>
        <td>
            <p class="respuesta"><?php echo $row['vertigos'];?></p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="parrafo">
            ¿Alguna vez ha perdido el conocimiento?
            </p>
        </td>
        <td>
            <p class="respuesta"><?php echo $row['conocimiento'];?></p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="parrafo">
            ¿Tiene un problema óseo o articular que pudiera empeorar por un aumento en su 
            actividad física habitual?
            </p>
        </td>
        <td>
            <p class="respuesta"><?php echo $row['oseo'];?></p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="parrafo">
            ¿Actualmente el médico le está prescribiendo medicamentos (por ejemplo diuréticos) 
            para su presión arterial o para su corazón?
            </p>
        </td>
        <td>
            <p class="respuesta"><?php echo $row['medCor'];?></p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="parrafo">
            ¿Conoce alguna otra razón por la cual no debería hacer actividad física?
            </p>
        </td>
        <td>
            <p class="respuesta"><?php echo $row['otraRazon'];?></p>
        </td>
    </tr>
</table>
<h4 class="parrafo">
Si el 100% de sus respuestas fueron negativas, por lo tanto puede iniciar su actividad física 
cumpliendo las siguientes recomendaciones:
</h4>
<p class="parrafo">
En caso de sentir dolor o si su estado de salud cambia durante el programa, interrumpa el 
ejercicio inmediatamente y repórtelo al personal de este centro y a su médico.
</p>
<h4 class="parrafo">
Si por lo menos una de sus respuestas fue positiva, por lo tanto debe consultar al médico para 
que sea valorado por él y considere si la actividad física que piensa realizar es segura para su salud.
</h4>
<p class="parrafo">
“Yo, <?php echo $row['nombre']." ".$row['apellidos'];?>, he leído, entendido y contestado este cuestionario 
con libertad y confidencialidad”.
</p>
<p class="parrafo">
    <?php
    $dia = date('d',strtotime($row['alta']));
    $ano = date('Y',strtotime($row['alta']));
    $buscames = array('','enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
    $mes = $buscames[date('m',strtotime($row['alta']))];
    echo "Alcázar de San Juan, a ".$dia." de ".$mes." de ".$ano;
    ?>
</p>