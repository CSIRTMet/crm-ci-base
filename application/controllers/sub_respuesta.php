<?php
class Sub_respuesta extends CI_Controller {
       	
		
		function __construct()
	{
		parent::__construct();
		 
	}
	
	function index()
	{
		
	}
	
	function get_sub_respuesta_por_respuesta_test($id_respuesta,$id_campana)
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
		
		
		
      echo $sql;
	  $query = $this->db->query($sql);
		foreach($query->result() as $item):
			echo "<br>".$item->id_sub_respuesta."  ".$item->nombre."";
		endforeach;
		
			
    }


	function get_sub_respuesta_por_respuesta(){

			$this->load->model('Sub_respuesta_modelo');
			$id_respuesta = $this->input->get_post("id");
			$id_campana = $this->session->userdata("campana_id_campana");			
			
			$sub_respuesta = $this->Sub_respuesta_modelo->get_sub_respuesta_por_respuesta($id_respuesta, $id_campana);
			
				
			if(!empty($sub_respuesta))
			{
				echo "<option value='0' selected>* Sub Respuesta *</option>";
				foreach($sub_respuesta as $item):
					echo "<option value='".$item->id_sub_respuesta."'>".$item->nombre."</option>";
				endforeach;
			}
			else
			{
			    echo "<option value='100' selected>--</option>";
			}
	}
	

	
}


