<?php
class Tipo_contacto extends CI_Controller {
       	
		
		function __construct()
	{
		parent::__construct();
		 
	}
	
	function index()
	{
		
	}
	
	


	function get_tipo_contacto_por_sub_respuesta(){

			$this->load->model('Tipo_contacto_modelo');
			$id_sub_respuesta = $this->input->post("id");			
			
			$tipo_contacto = $this->Tipo_contacto_modelo->get_tipo_contacto_por_sub_respuesta($id_sub_respuesta);
			//$tipo_contacto = $this->Tipo_contacto_modelo->get_tipo_contacto_por_sub_respuesta(0); //parche para itel
				
			if(!empty($tipo_contacto))
			{
				echo "<option value='0' selected>* Tipo Contacto *</option>";
				foreach($tipo_contacto as $item):
					echo "<option value='".$item->id_tipo_contacto."'>".$item->nombre."</option>";
				endforeach;
			}
			else
			{
			    echo "<option value='100' selected>--</option>";
			}
	}
	

	
}


