<?php

class Usuario_gestion_modelo extends CI_Model
{	
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function index()
	{
		
	}
	
	function get_usuario_gestion($campana)
	{
		
		
		$sql = "select * from usuario  where id_usuario in (select id_usuario from campana_usuario where id_campana = ".$campana.")";
		
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	
	
	function get_nombre_usuario_gestion($id_usuario)
	{
		
		$nombre =  '';
		$sql = "select nombre from usuario where id_usuario = ? ";
		$query = $this->db->query($sql,array($id_usuario));
 		
		if ($query->num_rows() > 0)
		{
		 	$row = $query->row(); 
			$nombre =  $row->nombre;
		}
		 
		return $nombre;
	}
	
	
	
	function add_usuario_gestion($campana,$user)
	{
		$data['id_usuario'] = $user;
		$data['id_campana'] = $campana;
		$this->db->insert('campana_usuario',$data);
	}
	
	function del_usuario_gestion($campana,$user)
	{
		$data = array('id_usuario' => $user, 'id_campana' => $campana);
		$this->db->delete('campana_usuario',$data);
	}
	
	function get_usuarios_no_gestion($campana, $empresa)
	{
		$sql = "SELECT * FROM usuario u where u.id_usuario not in(select cu.id_usuario from campana_usuario cu where cu.id_campana = ?) and u.id_usuario in (select eu.id_usuario from empresa_usuario eu where eu.id_empresa = ?)
and u.tipo_usuario not in (1,2)";
		$query = $this->db->query($sql,array($campana, $empresa));
 		return $query->result();
		
	}
	
	function get_agendamiento_usuario_gestion($id_usuario, $id_campana)
	{
		
		$agendamientos =  0;
		$sql = "select count(*) as agendamientos from lista_cliente_mkt where usuario_agendamiento = ? and estado_registro = 1 and id_lista in (select id_lista from lista where id_campana = ? )";
		$query = $this->db->query($sql,array($id_usuario, $id_campana));
 		
		if ($query->num_rows() > 0)
		{
		 	$row = $query->row(); 
			$agendamientos =  $row->agendamientos;
		}
		 
		return $agendamientos;
	}
	 
	 
	 function eliminar_usuario_campana_gestion($id_agente, $id_usuario , $id_campana)
	{
	
		
			

		    $sql2 = "update lista_cliente_mkt set usuario_actual = 0, 
						  usuario_agendamiento = 0, estado_registro = 2, 
						  estado_actual = 0, tipo_agendamiento = 2 
					 where estado_registro = 1  
					 and usuario_agendamiento = ? 
					 and id_lista in 
					 (select id_lista from lista where id_campana = ?);"; 
					 
			$sql3 = "update lista_cliente_mkt set usuario_actual = 0, estado_actual = 0, estado_registro = 3, tipo_agendamiento = 0 
					 where usuario_actual = ? and estado_actual = 1 
					 and id_lista in 
					 (select id_lista from lista where id_campana = ?);"; 
					 
			$sql4 = "update lista_cliente_mkt set usuario_agendamiento = 0 
					 where usuario_agendamiento = ? 
					 and estado_registro > 1  
					 and id_lista in 
					 (select id_lista from lista where id_campana = ?);"; 
		
						
			$sql6 = "delete from lista_usuario where id_usuario = ?
					 and  id_lista  in (select id_lista  from lista  where id_campana = ?) ;";		
					 
			$sql7 = "delete from campana_usuario where id_usuario = ?
					 and  id_campana   = ? ;";		
			
			$sql8 = "insert into log_operaciones_usuario(id_usuario,id_agente, id_campana, operacion)
					 values (?,?,?,?) ";

			$this->db->trans_begin();
			
			$this->db->query($sql2, array($id_agente, $id_campana));
			$this->db->query($sql3, array($id_agente, $id_campana));
			$this->db->query($sql4, array($id_agente, $id_campana));
			
			$this->db->query($sql6, array($id_agente, $id_campana));
			$this->db->query($sql7, array($id_agente, $id_campana));
			//$this->db->query($sql8, array($id_usuario,$id_agente, $id_campana,  'Eliminar usuario'));
			
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				$resultado = "error";
			}
			else
			{
				$this->db->trans_commit();
				$resultado = "ok";   
			}
	
			return $resultado;
	}
	





		function get_ejecutivos_por_lista($id_lista){
			
			
			$sql = "select u.id_usuario, u.nombre from lista_usuario lu 
			inner join usuario u on u.id_usuario = lu.id_usuario
			where lu.id_lista = ? and u.tipo_usuario = 3 ";
			return $this->db->query($sql, array($id_lista))->result();
			
			
			}






}
?>
