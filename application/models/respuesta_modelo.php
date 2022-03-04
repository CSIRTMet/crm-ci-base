<?php 
class Respuesta_modelo extends CI_Model {

     
     
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
    function get_respuesta_por_contactabilidad($id_contactabilidad)
    {
        
		$query = $this->db->where('id_contactabilidad', $id_contactabilidad);
		$query = $this->db->where('visible', '1');
		$query = $this->db->get('respuesta');
        return $query->result();
    }

	

    


}