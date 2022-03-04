<?php

class Campana_gestion_modelo extends CI_Model
{	
 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function index()
	{
		
	}
	
	function add_campana($data)
	{
		$this->db->insert('campana',$data);
		return $this->db->insert_id();
	}
	
	function edit_campana($data)
	{
		$this->db->update('campana', $data, array('id_campana' => $data['id_campana']));
	}
	
	function get_campana($id)
	{
		$sql = "SELECT c.* ,e.nombre as nombre_empresa FROM campana c inner join empresa e where id_campana = ? and c.id_empresa = e.id_empresa";
		$query = $this->db->query($sql,array($id));
		return $query->row();
	}
	
	
	function get_campanas($id) //este es igual al anterior solo que entrega  result y no row
	{
		$sql = "SELECT c.* ,e.nombre as nombre_empresa FROM campana c inner join empresa e where id_campana = ? and c.id_empresa = e.id_empresa";
		$query = $this->db->query($sql,array($id));
		return $query->result();
	}
	
	function list_campana($empresa)
	{
		$sql = "SELECT * FROM campana where id_empresa = ?";
		$query = $this->db->query($sql,array($empresa));
		return $query->result();
	}
	
	function list_campana_agente($empresa, $id_usuario)
	{
		$sql = "SELECT * FROM campana where id_empresa = ? and id_campana in 
		(select id_campana from campana_usuario where id_usuario = ?)
		";
		$query = $this->db->query($sql,array($empresa,$id_usuario));
		return $query->result();
	}

	
}
?>