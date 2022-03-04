<?php 
class Estado_deudor_modelo extends CI_Model {

     
     
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    


     

    
    function get_estados_deudor()
    {
        $query = $this->db->get('estado_deudor');
        return $query->result();
    }

	

    


}