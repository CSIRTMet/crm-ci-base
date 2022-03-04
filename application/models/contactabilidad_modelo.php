<?php 
class Contactabilidad_modelo extends CI_Model {

     
     
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    


     

    
    function get_contactabilidad()
    {
        $query = $this->db->get('contactabilidad');
        return $query->result();
    }

	

    


}