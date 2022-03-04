<?php
class Script extends CI_Controller {
       	function __construct()
	{
		parent::__construct();
		$this->load->model('script_modelo','script');
		
	}
	
	function index()
	{
		
	}


function form_cargar_script()
	{
	
	  $id_campana = $this->session->userdata("campana_id_campana");
	  $id_lista = $this->session->userdata("lista_id_lista");
	  $data['menu_script'] = $this->script->get_script(0,$id_campana);		
	  $this->load->view('scripts/vista_script', $data);
	}
	




function form_cargar_script_particular()
{

	$id_lista = $this->session->userdata("lista_id_lista");
	$id_script =  $this->input->get_post("id_script");		
	$id_campana = $this->session->userdata("campana_id_campana");
	$data['cuerpo_script'] = $this->script->get_cuerpo_script($id_script, $id_campana);		
	$this->load->view('scripts/vista_script_particular', $data);
}
	


}
?>

