<?php 
class Sub_respuesta_modelo extends CI_Model {

     
     
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
    function get_sub_respuesta_por_respuesta($id_respuesta,$id_campana)
    {
        $sql = "select 
		id_sub_respuesta
		,id_respuesta	
		,id_estado_cliente_gestion
		,nombre
		 from sub_respuesta where id_respuesta = ".$id_respuesta." and 
		id_sub_respuesta in (select id_sub_respuesta from template_respuesta_sub_respuesta where id_template_respuesta  = 
		(select id_template_respuesta from campana_template_respuesta where id_campana = ".$id_campana."  limit 1)
		) order by nombre ";
		
		$query = $this->db->query($sql);
		
        return $query->result();
    }

	
function get_sub_respuesta()
    {
        $sql = "select  
		id_sub_respuesta
		,nombre
		,codigo
		,visible
		,peso
		,accion
		,genera_pago
		 from sub_respuesta order by nombre ";
		
		$query = $this->db->query($sql);
		
        return $query;
    }


	function set_sub_respuesta($columna, $valor, $id_sub_respuesta)
    {
        $sql = "update sub_respuesta set $columna = $valor where id_sub_respuesta = $id_sub_respuesta";
		
		$query = $this->db->query($sql);
		
        return $query;
    }
	
    //se rescatan las sub respuestas para ser usadas en el dropdown, ordenadas por peso de la respuesta asc
	//podria ser filtrada por la campania o por accion - repsuesta 
    function llenar_dropdown()
	{
		$query = $this->db->query('select id_sub_respuesta, nombre, visible from sub_respuesta order by peso desc');
		$data = array();
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[$row['id_sub_respuesta']]= $row['nombre'];
			}
			return $data;
		}
	}
	
	
	


}