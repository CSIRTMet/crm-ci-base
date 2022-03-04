<?php
class Respuesta extends CI_Controller {
       	
		
		function __construct()
	{
		parent::__construct();
		 
	}
	
	function index()
	{
		
	}
	
	


	function get_respuesta_por_contactabilidad(){
				
 
			$this->load->model('Respuesta_modelo');
			$id_contactabilidad = $this->input->post("id");			
			
			$respuesta = $this->Respuesta_modelo->get_respuesta_por_contactabilidad($id_contactabilidad);
			/* print_r($respuesta);
			echo $id_contactabilidad; */
			if(!empty($respuesta))
			{
				echo "<option value='0' selected>* Respuesta *</option>";
			foreach($respuesta as $item):
				echo "<option value='".$item->id_respuesta."'>".$item->nombre."</option>";
			endforeach;
			}
			else
			{
			    echo "<option value='100' selected>--</option>";
			}
			
			
			
		
	}
	
	
	
	
	/**
	
	FUNCIONES DE LOGIN 
	-LOGIN : despliega el formulario de login
	-VALIDAR_USUARIO : comprueba credenciales
	-LOGOUT : termina sesion y redirige a login
	
	**/
	
	
}


