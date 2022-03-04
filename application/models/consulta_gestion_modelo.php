<?php 
class Consulta_gestion_modelo extends CI_Model {

    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
	
	function buscar_gestion($id_campana, $tipo_campana, $fecha, $rut){
		$condicion='';
		if($fecha != ''){
			$condicion = $condicion." and date_format(gmkt.fecha_termino,'%Y%m%d')=".$fecha;
		}
		if($rut != ''){
			$condicion = $condicion." and ccmkt.rut=".$rut;
		}
		
		$query_aux = "select 
			gmkt.id_gestion,
			gmkt.id_cliente,
			ccmkt.rut as rut_cliente,
			ccmkt.dv,
			ccmkt.nombre as nombre_cliente,
			gmkt.fecha_termino,
			gmkt.grabacion,
			gmkt.numero_llamado,
			gmkt.anexo,
			gmkt.id_sub_respuesta,
			sr.nombre as sub_respuesta,
			u.nombre as ejecutivo,
			gmkt.glosa,
			gmkt.rut_contacto,
			gmkt.nombre_contacto,
			gmkt.apaterno_contacto,
			gmkt.amaterno_contacto,
			gmkt.rut_contacto
			from gestion_mkt as gmkt 
			inner join campana_cliente_mkt as ccmkt on (gmkt.id_cliente = ccmkt.id_cliente)
			inner join sub_respuesta as sr on (gmkt.id_sub_respuesta = sr.id_sub_respuesta)
			inner join usuario as u on (gmkt.id_usuario = u.id_usuario)
			where gmkt.id_campana= ".$id_campana." and ccmkt.id_campana=".$id_campana." ".$condicion."  
		   order by gmkt.id_gestion asc";
	   $query = $this->db->query($query_aux);
	   return $query;
	   //return $query_aux;
	}
	
}
