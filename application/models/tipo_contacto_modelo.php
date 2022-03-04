<?php 
class Tipo_contacto_modelo extends CI_Model {

     
     
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
    function get_tipo_contacto_por_sub_respuesta($id_sub_respuesta)
    {
        
		if($id_sub_respuesta > 0){
			$consulta = "select * from tipo_contacto where id_tipo_contacto in (
			select id_tipo_contacto from sub_respuesta_tipo_contacto where id_sub_respuesta = ".$id_sub_respuesta."
			)";
		} 
		else //muestro todo menos el sin clasificacion
		{
			$consulta = "select * from tipo_contacto where id_tipo_contacto <> 6  ";
		}
		$query = $this->db->query($consulta);
        return $query->result();
    }

	

    


}