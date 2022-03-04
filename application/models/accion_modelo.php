<?php 
class Accion_modelo extends CI_Model {

     
     
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    


     

    
    function get_accion()
    {
        $query = $this->db->get('accion');
        return $query->result();
    }

	

    


}