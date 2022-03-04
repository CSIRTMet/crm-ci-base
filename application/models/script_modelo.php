<?php 
class Script_modelo extends CI_Model {

     
    var $rut   = '';
    var $nombre_usuario = '';
    var $clave    = '';
    var $nombre    = '';
    var $tipo_usuario    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    
    function get_last_ten_entries()
    {
        $query = $this->db->get('cliente', 10);
        return $query->result();
    }

	
	function get_script($id_script, $id_campana)
    {
	if($id_script == 0){
			 
		//$sql = "select id_script, nombre, descripcion, estado from script where  id_campana = ? ";
		//$query = $this->db->query($sql, array($id_campana));
		$sql = "select id_script, nombre, descripcion, estado from script where 1 ";
		$query = $this->db->query($sql);
		return $query->result();
	}else{
		
		//$sql = "select id_script, nombre, descripcion, estado from script where id_script = ? and id_campana = ? ";		
		//$query = $this->db->query($sql, array($id_script, $id_campana));
		$sql = "select id_script, nombre, descripcion, estado from script where id_script = ? ";		
		$query = $this->db->query($sql, array($id_script));
		return $query->row();
	}
	
    }
	
	function get_cuerpo_script($id_script, $id_campana)
    {
		$cuerpo = 'NO EXISTE EL SCRIPT';
		if($id_script > 0){
				 
				//$sql = "select cuerpo from script where id_script = ? and id_campana = ? ";
				//$query = $this->db->query($sql, array($id_script, $id_campana));
				$sql = "select cuerpo from script where id_script = ?  ";
				$query = $this->db->query($sql, array($id_script));
				
				
			if ($query->num_rows() > 0)
			{
				$row =  $query->row();
				$cuerpo =  $row->cuerpo;
			}
			return $cuerpo;
			
			
		}
		else return $cuerpo;    }


	
	 function eliminar_script_campana_gestion($id_script, $id_usuario , $id_campana)
	{
			
			$sql1 = "delete from script where id_script = ?;";		
			
			$this->db->trans_begin();
			
			$this->db->query($sql1 ,array($id_script));
			
			
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
	
	function crear_script($data){
		$this->db->insert('script',$data);
		return $this->db->insert_id();
	}
	
		function editar_script($data)
	{
		$this->db->update('script', $data, array('id_script' => $data['id_script']));
	}


}