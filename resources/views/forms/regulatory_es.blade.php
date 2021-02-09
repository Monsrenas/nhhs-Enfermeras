<style type = "text / css">
  
   .firma {
          ancho: 200px;

          altura: 130px;
          altura máxima: 135px;
          ancho máximo: 200px;
          alineación de texto: centro;
          relleno: 0px;
          margen superior: -60px;

          desbordamiento: oculto;
          fondo: ninguno;
          posición: absoluta;
         }

  @supports (object-fit: cover) {
    .firma img {
              altura: 50px;
              objeto de ajuste: cubierta;
              posición del objeto: centro centro;
              relleno: 2px;
          }
        }

</style>

<?php
     if (isset ($p)) {$firma = $frm['firma'] ?? ""; } else {$firma = $dts["frm"] ['firma'] ?? "";}
?>

<div style = "text-align: left;">
 
<h4> Requisitos normativos: </h4>

<ul>
<li> Certificación y experiencia: </li>
<ul>
<li> Certificado de asistente de salud en el hogar obtenido por: </li>
<ul>
<li> Finalización de un curso certificado para asistentes de salud en el hogar. </li>
<li> Certificado por el Departamento de Servicios de Salud del Estado. </li>
</ul>
<li> Instrucción en el trabajo relativa a las necesidades específicas del paciente y capacitación continua en el servicio, de modo que se pueda garantizar la seguridad del paciente y se satisfagan adecuadamente las necesidades de cuidado personal y de tareas del hogar del paciente. </li>
</ul>

<li> Cualificaciones generales: </li>
<ul>
<li> Madurez emocional y mental. </li>
<li> Licencia de conducir estatal válida y automóvil confiable, seguro de automóvil actual y estar dispuesto a operar un automóvil personal requerido por la naturaleza del trabajo. </li>
<li> Certificado de salud / examen físico actual y pruebas de tuberculosis. </li>
<li> Tarjeta de CPR actual. </li>
<li> Buenas habilidades de comunicación verbal y escrita. </li>
</ul>
</ul>
<h4> Habilidades lingüísticas: </h4>
<ul>
<li> Capacidad para leer y comunicarse eficazmente en inglés. </li>
<li> Se prefieren idiomas adicionales. </li>
</ul>

<h4> Demandas físicas: </h4>
<ul>
<li> Para conocer las exigencias físicas de la posición, incluida la visión, la audición, los movimientos repetitivos y el entorno, consulte la siguiente descripción. </p>
<p> Se pueden realizar adaptaciones razonables para que las personas con discapacidades puedan realizar las funciones esenciales del puesto sin comprometer la atención del paciente. </p>
</li>
</ul>
	@if (isset($p))
			<div style="page-break-after:always;"></div>		
	@endif
<h3 style="text-align: center;">{{trans('forms.POSITION')}}</h3>

<p>
===============================================================================
</p>
<p>
He recibido, leído y comprendido la Descripción del puesto / Evaluación de desempeño anterior.
</p>
@if (isset($p))
	
@endif

<table class="table" style="width: 100%;">
	<tr>
		<td width="50%">
			@if (($firma!=""))
		       <div class="firma">
		        <img src="data:image/png;base64,{{$firma}}" id="imgFirma" width="150" height="60">
		       </div> 
      		@endif			
      		@if (isset($p))
				{{$d["RegulatorySignature"]?? ""}} <br>
			@else
				<input type="text" name="RegulatorySignature" class="form-control" value="{{$d["RegulatorySignature"]?? ""}}" required>
			@endif
			<label style="color:gray;">Name/Signature</label>
		</td>
		<td>
			
			@if (isset($p))
				{{$d["RegulatoryDate"]?? ""}} <br>
			@else
				<input type="date" name="RegulatoryDate" class="form-control" value="{{$d["RegulatoryDate"]?? ""}}" required>
			@endif
			<label style="color:gray;" >Date</label>
		</td>
	</tr>
</table>
</div>