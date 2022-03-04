<?php

class Empresa_admin_modelo extends CI_Model
{	
	var $id_empresa = 0;
	var $nombre = "";
	var $codigo = "";
   
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function index()
	{
		
	}
	
	
	function get_empresa($limit)
	{
		$query = $this->db->query("SELECT id_empresa, nombre, codigo FROM empresa order by nombre asc ".$limit);
		return $query->result();
	}
	
	function insert_empresa($data)
	{
		$this->nombre = $data['nombre'];
		$this->codigo = $data['codigo'];
		
		$this->db->insert('empresa',$this);
		return $this->db->insert_id();
	}
	
	function update_empresa($data)
	{
		$this->db->update('empresa',$data,array('id_empresa' => $data['id_empresa']));
	}

	function view_empresa($id)
	{
		$sql = "SELECT id_empresa, nombre, codigo FROM empresa where id_empresa = ?";
		$query = $this->db->query($sql,array($id));
		return $query->row();
	}
	
	function delete_empresa($id)
	{
		// por implementar
	}
	
	function add_usuario_empresa($id_user, $id_empresa)
	{
		$data = array(
               'id_usuario' => $id_user,
               'id_empresa' => $id_empresa );

		$this->db->insert('empresa_usuario',$data);
	}
	
	
	function get_empresa_usuario($id_empresa, $limit)
	{
		$sql = "SELECT * FROM usuario WHERE id_usuario IN (SELECT id_usuario FROM empresa_usuario WHERE id_empresa = ?) ".$limit; 
		$query = $this->db->query($sql,array($id_empresa));
		return $query->result();
	}
	
	
	function get_no_usuario($id_empresa, $resto) //retorna usuarios no pertenecientes a la empresa
	{
		$sql = "SELECT * FROM usuario WHERE id_usuario NOT IN (SELECT id_usuario FROM empresa_usuario WHERE id_empresa = ?) ".$resto; 
		$query = $this->db->query($sql,array($id_empresa));
		return $query->result();
	}

	function eliminar_usuario_empresa($id_user, $id_empresa)
	{
		
		//elimino al usuario de la lista_usuario si existe. (en la campaña)
		$consulta = 'delete from lista_usuario where id_usuario = '.$id_user.' 
		and id_lista in (
		select id_lista from lista where id_campana in 
		(select id_campana from campana where id_empresa = '.$id_empresa.') )';
		$this->db->query($consulta);
		
		//elimino al usuario de la campaña si existe.
		$consulta2 = 'delete from campana_usuario where id_usuario = '.$id_user.' 
		and id_campana in 
		(select id_campana from campana where id_empresa = '.$id_empresa.') ';
		$this->db->query($consulta2);
		
		//elimino al usuario de la lista si existe.
		$data = array(
               'id_usuario' => $id_user,
               'id_empresa' => $id_empresa );
		$this->db->where($data);
		$this->db->delete('empresa_usuario');
		
	}
	
	
	




	function get_empresas_supervisor($id_usuario, $limit)
	{
		$sql = "SELECT * FROM empresa WHERE id_empresa IN (SELECT id_empresa FROM empresa_usuario WHERE id_usuario = ?) ".$limit; 
		$query = $this->db->query($sql,array($id_usuario));
		return $query->result();
	}
	
	function get_empresas_agente($id_usuario, $limit)
	{
		$sql = "SELECT * FROM empresa WHERE id_empresa IN (SELECT id_empresa FROM empresa_usuario WHERE id_usuario = ?) ".$limit; 
		$query = $this->db->query($sql,array($id_usuario));
		return $query->result();
	}


}
?>