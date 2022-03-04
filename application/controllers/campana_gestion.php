<?php

class Campana_gestion extends CI_Controller 
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
	
	//carga la vista principal del modulo gestión, que redirecciona a los demás controladores
	function index()
	{
		$data = $this->listar_campana_gestion();
		$this->load->view('vista_seleccion_campana_gestion',$data);
	}
	
	function set_campana_selected($id_campana)
	{
		$id_usuario = $this->session->userdata('id_usuario');
		$this->session->set_userdata('campana',$id_campana);
		$this->setea_session($id_usuario,$id_campana);
		redirect(base_url().'index.php/principal_gestion/index', 'refresh');
	}
	
	
	
	function setea_session($id_usuario,$id_campana)
	{

		$campana_id_empresa = 0;
		$campana_id_campana = 0;
		$campana_nombre 	= '';
		$campana_estado 	= 0;
		$campana_tipo   	= 0;
		$empresa_nombre		= '';
		$this->load->model('Campana_gestion_modelo');
		$resultado = $this->Campana_gestion_modelo->get_campanas($id_campana);
		foreach($resultado as $result):
			$campana_id_empresa = $result->id_empresa;
			$campana_id_campana = $result->id_campana;
			$campana_nombre = $result->nombre;
			$campana_estado = $result->estado;
			$campana_tipo = $result->tipo;
			$empresa_nombre = $result->nombre_empresa;
		endforeach;
		
		$this->session->set_userdata('campana_id_empresa',$campana_id_empresa);
		$this->session->set_userdata('campana_id_campana',$campana_id_campana);
		$this->session->set_userdata('campana_nombre',$campana_nombre);
		$this->session->set_userdata('campana_estado',$campana_estado);
		$this->session->set_userdata('campana_tipo',$campana_tipo);
		$this->session->set_userdata('empresa_nombre',$empresa_nombre);
		
		/* echo "</br>".$this->session->userdata("campana_id_empresa");
		echo "</br>".$this->session->userdata("campana_id_campana");
		echo "</br>".$this->session->userdata("campana_nombre");
		echo "</br>".$this->session->userdata("campana_estado");
		echo "</br>".$this->session->userdata("campana_tipo");
		echo "</br>".$this->session->userdata("empresa_nombre"); */
		//recupero los valores de la campaña
		
		
	}
	
	
	
	
	function form_crear_campana_gestion()
	{
		$this->load->view('vista_crear_campana_gestion');
	}
	
	function crear_campana_gestion()
	{
		$config = array(
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
		             'rules'   => 'required|max_length[50]'
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
			$this->load->view('vista_crear_campana_gestion');
		}
		else{
			$data['nombre'] = $this->input->get_post("nombre");
			$data['fecha_inicio'] = $this->input->get_post("fecha_inicio");
			$data['fecha_termino'] = $this->input->get_post("fecha_termino");
			$data['codigo'] = $this->input->get_post("codigo");
			$data['estado'] = $this->input->get_post("estado");
			$data['tipo'] = $this->input->get_post("tipo");
			$data['id_empresa'] = $this->session->userdata('empresa');
			$id = $this->camp->add_campana($data);
			
			$this->index();
		}
	}
	
	function form_editar_campana_gestion()
	{
		$id_camp = $this->session->userdata('campana');
		$data['campana'] = $this->camp->get_campana($id_camp);
		$this->load->view('vista_editar_campana_gestion',$data);
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
	
	function listar_campana_gestion()
	{
		$empresa = $this->session->userdata('empresa');
		$data["campanas_usuario"] = $this->camp->list_campana($empresa);
		return $data;
	}
	
	
}
?>