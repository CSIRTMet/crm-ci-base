<?php

class Agenda_modelo extends CI_Model
{	
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function index()
	{
		
	}
	

	
	function get_agendamiento_usuario($id_campana,$id_usuario)

	{
	$sql = "select lc.id_lista, 
			lc.id_cliente, 
			lc.fecha_agendada, 
			lc.usuario_agendamiento,
		
			l.nombre as lista, 
			s.nombre as ultima_gestion, 
			d.rut, 
			'' as numero_documento, 	 	 
			'' as monto, 
			(select glosa from gestion_mkt where estado_gestion = 2 
			and id_cliente = lc.id_cliente
			order by fecha_termino desc limit 1)  as glosa 
			
			from lista_cliente_mkt lc
			inner join lista l on l.id_lista = lc.id_lista 
			left join sub_respuesta s on s.id_sub_respuesta = lc.ultima_gestion 
			inner join cliente_mkt d on d.id_cliente = lc.id_cliente			
	
			where lc.estado_registro = 1 and lc.usuario_agendamiento = ?  
			and lc.id_lista in (select id_lista from lista where id_campana = ?)";

	$res = $this->db->query($sql, array($id_usuario, $id_campana));
    return $res->result();
 	
	}
	
	//entrega un resumen de todos los usuarios con agendamiento privados para graficar
	function get_agendamiento_usuario_campana($id_campana)
	{
	$sql = "select u.nombre, count(*) as registros

			from lista_cliente_mkt lc
			inner join usuario u on u.id_usuario = lc.usuario_agendamiento
			inner join lista l on l.id_lista = lc.id_lista
			where lc.estado_registro = 1  
			and l.id_campana = ?
			group by u.nombre order by registros desc";

	$res = $this->db->query($sql, array($id_campana));
    return $res->result();
 	
	}
	
	function set_agendamiento_publico_gestion($agendamientos,$id_usuario, $id_campana, $id_supervisor)
	{
	$sql = "update lista_cliente_mkt  set estado_registro = 2 , tipo_agendamiento = 2 where usuario_agendamiento = ?
	and id_cliente in ($agendamientos) and estado_registro = 1
	";
	 $this->db->query($sql, array($id_usuario));
     $res = $this->db->affected_rows();
	
		if($res > 0)
		{
		//LOG DE LA OPERACION
			$cliente = explode(",", $agendamientos);
			foreach($cliente as $id_cliente){
			$sql = "insert into log_operaciones_agendamiento(id_cliente, id_campana, operacion, id_usuario_origen, id_usuario)
					values (?, ?, 'Se pasa a agendamiento publico', ? , ? )";
			$this->db->query($sql, array($id_cliente, $id_campana, $id_usuario, $id_supervisor));
			}
		}


	return $res;

	}
	
	function set_fecha_agendamiento_gestion($agendamientos, $id_usuario, $fecha_agendada, $id_campana, $id_supervisor)
	{
	$sql = "update lista_cliente_mkt set fecha_agendada = ? where usuario_agendamiento = ? 
	and id_cliente in ($agendamientos)  
	";
	$this->db->query($sql, array( $fecha_agendada, $id_usuario));
    $res = $this->db->affected_rows();
	
		if($res > 0)
		{
		//LOG DE LA OPERACION
			$cliente = explode(",", $agendamientos);
			foreach($cliente as $id_cliente){
			$sql = "insert into log_operaciones_agendamiento(id_cliente, id_campana, operacion, fecha_reagendada, id_usuario_origen, id_usuario)
					values (?, ?, 'Reagendamiento de fecha',?, ? , ? )";
			$this->db->query($sql, array($id_cliente, $id_campana,  $fecha_agendada, $id_usuario, $id_supervisor));
			}
		}
	return $res;
  
	}
	
	function get_usuarios_misma_lista_gestion($campana , $empresa, $agendamientos, $id_usuario)
	{
		$sql = "SELECT id_usuario, 
				tipo_usuario, 
				nombre, 
				nombre_usuario 
				FROM usuario u 
				where u.id_usuario 
				in (select id_usuario 
					from lista_usuario 
					where id_lista in  (select distinct id_lista 
										from lista_cliente_mkt
										where id_cliente in ($agendamientos) )
					)
				and u.tipo_usuario not in (1,2,4)
				and u.id_usuario <> ?";
		$query = $this->db->query($sql,array($id_usuario));
 		return $query->result();
		
	}
	
	
	function asignar_otro_usuario_agenda_gestion($agendamientos, $id_usuario, $id_usuario_destino, $id_campana, $id_supervisor)
	{
		
		$sql = "update lista_cliente_mkt set usuario_agendamiento = ? where usuario_agendamiento = ? 
		and id_cliente in ($agendamientos) 
		";
		$this->db->query($sql, array( $id_usuario_destino, $id_usuario));
		$res = $this->db->affected_rows();
		
			if($res > 0)
			{
			//LOG DE LA OPERACION
				$cliente = explode(",", $agendamientos);
				foreach($cliente as $id_cliente){
				$sql = "insert into log_operaciones_agendamiento(id_cliente, id_campana, operacion, id_usuario_origen, id_usuario_destino, id_usuario)
						values (?, ?, 'Traspasar agendamiento otro usuario',?, ? , ? )";
				$this->db->query($sql, array($id_cliente, $id_campana, $id_usuario, $id_usuario_destino,  $id_supervisor));
				}
			}
		return $res;
		
		
		
			
	}

}
?>
