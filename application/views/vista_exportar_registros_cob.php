<?php
$id_campana = $this->session->userdata('campana');
date_default_timezone_set("America/Santiago");
$fecha = time ();  
$fecha  = date ( "dmY" , $fecha );
$campana_fecha="default";
switch ($id_campana){
	case "5":
		$campana_fecha="TV_CONTROLADA_".$fecha;
		break;
	case "6":
		$campana_fecha="DTH_Recuperacion_30_60_90_".$fecha;
		break;
	case "7":
		$campana_fecha="DTH_Recuperacion_WINBACK_".$fecha;
		break;
	case "8":
		$campana_fecha="DTH_Recuperacion_Regiones_".$fecha;
		break;
	case "9":
		$campana_fecha="DTH_Cobranza_".$fecha;
		break;
}
$filename="gestion_".$campana_fecha.".xls";

header("Content-type: application/ms-excel"); 
header("Content-Disposition: attachment;  filename=".$filename);
										
	echo "<table border='1' cellspacing='2' cellpadding='2'>";
	echo "<thead><tr bgcolor='#ACFA58'>";
	 echo "<th>fecha</th>";
	 echo "<th>hora</th>";
	 echo "<th>campana</th>";
	 echo "<th>id_campana</th>";
	 echo "<th>id_carga</th>";
	 echo "<th>id_lista</th>";
	 echo "<th>telefono</th>";
	 echo "<th>rut</th>";
	 echo "<th>cliente</th>";
	 echo "<th>ejecutivo</th>";
	 echo "<th>accion</th>";
	 echo "<th>contactabilidad</th>";
	 echo "<th>respuesta</th>";
	 echo "<th>sub_respuesta</th>";
	 echo "<th>tipo_contacto</th>";
	 echo "<th>nombre_contacto</th>";
	 echo "<th>apaterno_contacto</th>";
	 echo "<th>amaterno_contacto</th>";
	 echo "<th>rut_contacto</th>";
	 echo "<th>glosa</th>";
	 echo "<th>numero_documento</th>";
	 echo "<th>monto_documento</th>";
	 echo "<th>perven</th>";
	 echo "<th>fecha_de_pago</th>";
	 echo "<th>monto_compromiso</th>";
	 echo "<th>fecha_compromiso</th>";
	echo "</tr></thead>"; 
		
	foreach($exportar as $item):
	echo "<tr>";
		
		
	 echo "<td>".$item->fecha."</td>";
	 echo "<td>".$item->hora."</td>";
	 echo "<td>".$item->campana."</td>";
	 echo "<td>".$item->id_campana."</td>";		
	 echo "<td>".$item->id_carga."</td>";
	 echo "<td>".$item->id_lista."</td>";
	 echo "<td>".$item->telefono."</td>";
	 echo "<td style=\"mso-number-format:'\@';\">".$item->rut."</td>";
	 echo "<td>".$item->cliente."</td>";
	 echo "<td>".$item->ejecutivo."</td>";
	 echo "<td>".$item->accion."</td>";
	 echo "<td>".$item->contactabilidad."</td>";
	 echo "<td>".$item->respuesta."</td>";
	 echo "<td>".$item->sub_respuesta."</td>";
	 echo "<td>".$item->tipo_contacto."</td>";
	 echo "<td>".$item->nombre_contacto."</td>";
	 echo "<td>".$item->apaterno_contacto."</td>";
	 echo "<td>".$item->amaterno_contacto."</td>";
	 echo "<td>".$item->rut_contacto."</td>";
	 echo "<td>".$item->glosa."</td>";
	 echo "<td>".$item->numero_documento."</td>";
	 echo "<td>".$item->monto_documento."</td>";
	 echo "<td>".$item->perven."</td>";
	 echo "<td>".$item->fecha_de_pago."</td>";
	 echo "<td>".$item->monto_compromiso."</td>";
	 echo "<td>".$item->fecha_compromiso."</td>";
		    
	echo "</tr>";
	endforeach;
	
	echo "</table>";
	
	


?>
