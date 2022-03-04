<?php 
class Empresa_modelo extends CI_Model {

    var $nombre   = '';
    var $codigo = '';

    function __construct(){
      parent::__construct();
   }
    	
   function get_empresa($id_empresa, $num, $offset)
    {
	if($id_empresa == 0){
        	$query = $this->db->get('empresa', $num, $offset);
	}else{
		$this->db->where('id_empresa', $id_empresa);
		$query = $this->db->get('empresa'); 
	}
	return $query->result();
    }

    function set_empresa($id_empresa,$nombre,$codigo)
    {
        $this->nombre   = $nombre; // please read the below note
        $this->codigo = $codigo;
	if($id_empresa == 0)	return $this->db->insert('empresa', $this);
	else	return $this->db->update('empresa', $this, array('id_empresa' => $id_empresa));
    }


}