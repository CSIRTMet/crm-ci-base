<?php

class Empresa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('empresa_admin_modelo','empresa_admin');
		$this->load->helper(array('url','form'));
		$this->load->library('uri','form_validation');
	}

	function index()
	{
		$this->load->view('');
	}
	

	function get_lista_empresa_usuario($id)
	{
		$data["title"] = "Lista de Empresas";
		$data["empresa_usuarios"] = $this->empresa_admin->get_empresa_usuario($id,"");
		$this->load->view('',$data);
	}
	
	
	/*----------------- FUNCIONES DE SELECCION DE EMPRESA --------------------------*/
	
	
	//despliega la vista de seleccion de empresa
	function form_seleccion_empresa($data)
	{
		
		$this->load->view('vista_seleccion_empresa', $data);
	}
	
	
	//obtiene la lista de empresas asociadas al usuario y muestra la vista para seleccionar empresa
	
	function get_lista_empresa()
	{
		$usuario = $this->session->userdata("id_usuario"); //captura el id del usuario que está en sesión...
		$data["empresas_usuario"] = $this->empresa_admin->get_empresas_agente($usuario,""); //obtiene la lista de empresas asociadas al usuario
		$this->form_seleccion_empresa($data);
	}
	
	
	
	//obtiene la empresa seleccionada y envia todos los datos al controlador principal
	function set_empresa_selected($id_empresa)
	{
		$this->session->set_userdata('empresa',$id_empresa);
		redirect('campana/index');
	}
	
	
	
	
}
?>