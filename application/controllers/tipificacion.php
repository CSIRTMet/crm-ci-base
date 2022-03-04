<?php
class Tipificacion extends CI_Controller {
       	
		
		function __construct()
	{
		parent::__construct();
		 
	}
	
	function index()
	{
		
	}
	
	function get_nivel1(){
			$this->load->model('Tipificacion_modelo');
			 
			$id_campana = $this->session->userdata("campana_id_campana");			
			$nivel = $this->Tipificacion_modelo->getNivel1($id_campana);
			if(!empty($nivel))
			{
				echo "<option value='0' selected>* Nivel 1 *</option>";
				foreach($nivel as $item):
					echo "<option value='".$item->id_nivel."'>".$item->nombre."</option>";
				endforeach;
			}
			else
			{
			    echo "<option value='100' selected>--</option>";
			}
	} 


	function get_nivel2(){
			$this->load->model('Tipificacion_modelo');
			$id_respuesta = $this->input->get_post("id");
			$id_campana = $this->session->userdata("campana_id_campana");			
			$nivel = $this->Tipificacion_modelo->getNivel2($id_respuesta, $id_campana);
			if(!empty($nivel))
			{
				echo "<option value='0' selected>* Nivel 2 *</option>";
				foreach($nivel as $item):
					echo "<option value='".$item->id_nivel."'>".$item->nombre."</option>";
				endforeach;
			}
			else
			{
			    echo "<option value='100' selected>--</option>";
			}
	}
	
	function get_nivel3(){
			$this->load->model('Tipificacion_modelo');
			$id_respuesta = $this->input->get_post("id");
			$id_campana = $this->session->userdata("campana_id_campana");			
			$nivel = $this->Tipificacion_modelo->getNivel3($id_respuesta, $id_campana);
			if(!empty($nivel))
			{
				echo "<option value='0' selected>* Nivel 3 *</option>";
				foreach($nivel as $item):
					echo "<option value='".$item->id_nivel."'>".$item->nombre."</option>";
				endforeach;
			}
			else
			{
			    echo "<option value='100' selected>--</option>";
			}
	}
	
	function get_nivel4(){
			$this->load->model('Tipificacion_modelo');
			$id_respuesta = $this->input->get_post("id");
			$id_campana = $this->session->userdata("campana_id_campana");			
			$nivel = $this->Tipificacion_modelo->getNivel4($id_respuesta, $id_campana);
			if(!empty($nivel))
			{
				echo "<option value='0' selected>* Nivel 4 *</option>";
				foreach($nivel as $item):
					echo "<option value='".$item->id_nivel."'>".$item->nombre."</option>";
				endforeach;
			}
			else
			{
			    echo "<option value='100' selected>--</option>";
			}
	}
	

function get_detalle_nivel4(){
			$this->load->model('Tipificacion_modelo');
			$id_respuesta = $this->input->get_post("id");
			$id_campana = $this->session->userdata("campana_id_campana");			
			$nivel = $this->Tipificacion_modelo->getRowNivel4($id_respuesta, $id_campana);
			
			if(!empty($nivel))
			{
				echo json_encode($nivel);
			}
			else
			{
			    echo "";
			}
	}
	

	
}


