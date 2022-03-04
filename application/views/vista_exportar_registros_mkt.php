<?php
$nombre_campana = $this->session->userdata('campana_nombre');
date_default_timezone_set("America/Santiago");
$fecha = time ();  
$fecha  = date ( "dmY" , $fecha );
$campana_fecha="default";

$filename="gestion_".$nombre_campana.".xls";

header("Content-type: application/ms-excel"); 
header("Content-Disposition: attachment;  filename=".$filename);
					
	echo "<table border='1' cellspacing='2' cellpadding='2'>";
	echo "<thead><tr bgcolor='#ACFA58'>";
	 echo "<th>id_gestion</th>";
	 echo "<th>fecha_gestion</th>";
	 echo "<th>hora_gestion</th>";
	 echo "<th>nombre_cliente</th>";
	 echo "<th>rut </th>";
	 echo "<th>dv </th>";
	 echo "<th>monto </th>";
	 echo "<th>vigencia</th>";
	 
	 echo "<th>monto_prepago</th>";
	 echo "<th>cuota_actual</th>";
	 echo "<th>modulo</th>";
	 echo "<th>sucursal</th>";
	 echo "<th>nombre_ejecutivo_banco</th>";
	 
	 echo "<th>respuesta</th>";
	 echo "<th>sub_respuesta</th>";
	 echo "<th>tipo_contacto</th>";
	 
	 echo "<th>ejecutivo</th>";
	 echo "<th>fecha_nacimiento</th>";
	 echo "<th>estado_civil</th>";
	 echo "<th>sexo</th>";
	 echo "<th>bancarizado</th>";
	 echo "<th>glosa</th>"; 
	 echo "<th>campo1</th>";
	 echo "<th>campo2 </th>";
	 echo "<th>campo3 </th>";
	 echo "<th>campo4</th>";
	 echo "<th>campo5 </th>";
	 echo "<th>campo6 </th>";
	 echo "<th>campo7 </th>";
	 echo "<th>campo8 </th>";
	 echo "<th>campo9 </th>";
	 echo "<th>telefono </th>";
	 echo "<th>direccion </th>";
	 echo "<th>comuna </th>";
	 echo "<th>grabacion </th>";
	 echo "<th>numero_llamado</th>";
	echo "</tr></thead>"; 
	

		
	foreach($exportar as $item):
	echo "<tr>";
		
		
	 echo "<td>".$item->id_gestion."</td>";
	 echo "<td>".$item->fecha."</td>";
	 echo "<td>".$item->hora."</td>";
	 echo "<td>".$item->nombre_cliente."</td>";
	echo "<td style=\"mso-number-format:'\@';\">".$item->rut."</td>";		
	 echo "<td>".$item->dv."</td>";
	 echo "<td style=\"mso-number-format:'\@';\">".$item->monto."</td>";
	 echo "<td>".$item->vigencia."</td>";
	 
	 
	 echo "<td>".$item->monto_prepago."</td>";
	 echo "<td>".$item->cuota_actual."</td>";
	 echo "<td>".$item->modulo."</td>";
	 echo "<td>".$item->sucursal."</td>";
	 echo "<td>".$item->nombre_ejecutivo."</td>";
 
	 
	 echo "<td style=\"mso-number-format:'\@';\">".$item->respuesta."</td>";
	 echo "<td>".$item->sub_respuesta."</td>";
	 echo "<td>".$item->tipo_contacto."</td>";
	 echo "<td>".$item->ejecutivo."</td>";
	 echo "<td>".$item->fecha_nacimiento."</td>";
	 echo "<td>".$item->estado_civil."</td>";
	 echo "<td>".$item->sexo."</td>";
	 echo "<td>".$item->bancarizado."</td>";
	 echo "<td>".$item->glosa."</td>";
	 echo "<td>".$item->campo1."</td>";
	 echo "<td>".$item->campo2."</td>";
	 echo "<td>".$item->campo3."</td>";
	 echo "<td>".$item->campo4."</td>";
	 echo "<td>".$item->campo5."</td>";
	 echo "<td>".$item->campo6."</td>";
	 echo "<td>".$item->campo7."</td>";
	 echo "<td>".$item->campo8."</td>";
	 echo "<td>".$item->campo9."</td>";
	 echo "<td>".$item->telefono."</td>";
	 echo "<td>".$item->direccion."</td>";
	 echo "<td>".$item->nombre_comuna."</td>";
	 echo "<td>".$item->grabacion."</td>";
	 echo "<td>".$item->numero_llamado."</td>";
	
		    
	echo "</tr>";
	endforeach;
	
	echo "</table>";
	
	


?>
