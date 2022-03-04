<?php

class Usuario_admin_modelo extends CI_Model
{	
	var $id_usuario = 0;
	var $rut = "";
	var $nombre_usuario = "";
	var $clave = "";
	var $nombre = "";
	var $tipo_usuario = 0;
   
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function index()
	{
		
	}
	
	function get_usuario($limit)
	{
		$query = $this->db->query('SELECT id_usuario,rut,nombre_usuario,clave,nombre,tipo_usuario FROM usuario '.$limit);
		return $query->result();
	}
	
	function insert_usuario($data)
	{
		$this->rut = $data["rut"];
		$this->nombre_usuario = $data["nombre_usuario"];
		$this->clave = $data["clave"];
		$this->nombre = $data["nombre"];
		$this->tipo_usuario = $data["tipo_usuario"];
		
		$this->db->insert('usuario',$this);
		return $this->db->insert_id();
	}
	
	function update_usuario($data)
	{
		$this->db->update('usuario',$data,array('id_usuario' => $data['id_usuario']));
	}
	
	function delete_usuario($id)
	{
		// por implementar
	}
	
	function view_usuario($id)
	{	
		$sql = "SELECT id_usuario,rut,nombre_usuario,clave,nombre,tipo_usuario FROM usuario where id_usuario = ?";
		$query = $this->db->query($sql,array($id));
		return $query->row();
	}
	
	
}
?>
