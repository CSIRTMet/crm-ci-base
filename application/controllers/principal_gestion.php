<?php

class Principal_gestion extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('gestion');
		if(!is_supervisor_logged($this->session->userdata('is_logged_in'),$this->session->userdata('tipo_usuario'))){
			redirect(base_url().'index.php/usuario/logout', 'refresh');
		}
		if(!is_empresa_set($this->session->userdata('empresa'))){
			redirect(base_url().'index.php/empresa_admin/get_lista_empresa_gestion', 'refresh');
		}
	}
	
	//carga la vista principal del modulo gestión, que redirecciona a los demás controladores
	function index()
	{
		if(is_campana_set($this->session->userdata('campana'))){
			redirect(base_url().'index.php/campana_gestion/form_editar_campana_gestion', 'refresh');
		
		}	
		else{
			redirect(base_url().'index.php/campana_gestion/index', 'refresh');
		}
	}
	
	function load_campana_gestion()
	{
		redirect('campana_gestion/form_editar_campana_gestion');
	}
	
	function load_carga_gestion()
	{
		redirect('carga_gestion/index');
	}
	
	function load_lista_gestion()
	{
		redirect('lista_gestion/index');
	}
	
	function load_exportar_gestion($dia)
	{
		redirect('exportar_gestion/index/'.$dia);
	}
	function load_usuario_gestion()
	{
		redirect('usuario_gestion/index');
	}
	function load_administracion_gestion()
	{
		redirect('administracion_gestion/form_administrar_campana_gestion');
	}
	function load_script_gestion()
	{
		redirect('script_gestion/index');
	}
}	
?>