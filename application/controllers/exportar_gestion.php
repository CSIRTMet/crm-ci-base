<?php

class Exportar_gestion extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('gestion');
		//$this->load->model('lista_gestion_modelo','lista');
		// descomentar parte de abajo una vez puesto en produccion y haya un link para acceder a este controlador
		
		 if(!is_supervisor_logged($this->session->userdata('is_logged_in'),$this->session->userdata('tipo_usuario'))){
			redirect(base_url().'index.php/usuario/logout', 'refresh');
		}
		if(!is_campana_set($this->session->userdata('campana'))){
			redirect(base_url().'index.php/campana_gestion/index', 'refresh');
		} 
	}
	
	function index($dia)
	{
		$tipo_campana = $this->session->userdata('campana_tipo');
		$id_campana = $this->session->userdata('campana');
		$this->load->model('Exportar_modelo');
		$data['exportar'] 	= $this->Exportar_modelo->get_registros($id_campana,$tipo_campana,$dia);
		if($tipo_campana == 1){
			$this->load->view('vista_exportar_registros_cob',$data);
		}else{
			$this->load->view('vista_exportar_registros_mkt',$data);
		}
	}
	function get_tbl()
	{
		$data['tabla'] = $this->input->post('tabla');
		
		$this->load->view('vista_form_tbl',$data);
	}
	function get_tbl_result($fecha,$tabla)
	{
		$this->load->model('Exportar_modelo');
		$tipo_campana = $this->session->userdata('campana_tipo');
		$id_campana = $this->session->userdata('campana');
		
		$data['exportar'] = $this->Exportar_modelo->get_tbl_result($id_campana,$tipo_campana,$tabla,$fecha);
		$data['tabla'] = $tabla;
		$data['fecha'] = $fecha;
		
		$this->load->view('vista_form_tbl_result',$data);
	}		
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
}
?>
	