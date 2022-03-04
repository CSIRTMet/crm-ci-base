<?php

class Administracion_gestion extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('gestion');
		$this->load->model('campana_gestion_modelo','camp');
		
		if(!is_supervisor_logged($this->session->userdata('is_logged_in'),$this->session->userdata('tipo_usuario'))){
			redirect(base_url().'index.php/usuario/logout', 'refresh');
		}
		if(!is_empresa_set($this->session->userdata('empresa'))){
			redirect(base_url().'index.php/empresa_admin/get_lista_empresa_gestion', 'refresh');
		}
	}
	
	
	function index()
	{
		
	}
	
	
	
	
	
	
	
	
	function form_administrar_campana_gestion()
	{
		$id_camp = $this->session->userdata('campana');
		$data['campana'] = $this->camp->get_campana($id_camp);
		$this->load->view('vista_administracion_gestion',$data);
	}
	
	function editar_campana_gestion()
	{
		$config = array(
		       array(
		             'field'   => 'id_campana',
		             'label'   => 'Campaña',
		             'rules'   => 'required|is_natural_no_zero'
		          ),
		       array(
		             'field'   => 'nombre',
		             'label'   => 'Nombre',
		             'rules'   => 'required|max_length[50]'
		          ),
		       array(
		             'field'   => 'fecha_inicio',
		             'label'   => 'Fecha de Inicio',
		             'rules'   => 'required'
		          ),
			   array(
		             'field'   => 'fecha_termino',
		             'label'   => 'Fecha de Termino',
		             'rules'   => 'required'
		          ),
			   array(
		             'field'   => 'codigo',
		             'label'   => 'Codigo',
		             'rules'   => 'required|max_length[10]'
		          ),
			   array(
		             'field'   => 'estado',
		             'label'   => 'Estado',
		             'rules'   => 'is_natural_no_zero'
		          ),
			   array(
		             'field'   => 'tipo',
		             'label'   => 'Tipo',
		             'rules'   => 'is_natural_no_zero'
		          ));
		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run() == FALSE)
		{
			$this->form_editar_campana_gestion();
		}
		else{
			$data['id_campana'] = $this->input->get_post("id_campana");
			$data['nombre'] = $this->input->get_post("nombre");
			$data['fecha_inicio'] = $this->input->get_post("fecha_inicio");
			$data['fecha_termino'] = $this->input->get_post("fecha_termino");
			$data['codigo'] = $this->input->get_post("codigo");
			$data['estado'] = $this->input->get_post("estado");
			$data['tipo'] = $this->input->get_post("tipo");
			
			$this->camp->edit_campana($data);
			$id_usuario = $this->session->userdata("id_usuario");
			$id_campana = $this->input->get_post("id_campana");
			$this->setea_session($id_usuario,$id_campana);
			$this->form_editar_campana_gestion();
		}
	}
	
	
	
	
}
?>