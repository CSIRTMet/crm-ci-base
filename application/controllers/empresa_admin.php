<?php

class Empresa_admin extends CI_Controller {

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
	
	function form_listar_empresa()
	{
		// implementar posiblemente los limites si hay un grid segmentado, 
		//$limit1 = "Limit ".$this->uri->segment(3).", ".$this->uri->segment(4);
		// luego ingresar limite como parámetro a la función get_usuario del modelo...
		
		$data["title"] = "Lista de Empresas";
		$data["empresas"] = $this->empresa_admin->get_empresa("");
		$this->load->view('vista_listar_empresa_admin',$data);
	}
	
	
	
	
	function form_crear_empresa()
	{
		$this->load->view('vista_crear_empresa_admin');
	}
	
	
	function form_asignar_usuario($id_empresa)
	{
 		if($this->form_validation->is_natural_no_zero($id_empresa))
		{
			$data['empresa'] = $this->empresa_admin->view_empresa($id_empresa);
			
			$this->load->model('usuario_admin_modelo','user_admin');
			$data["usuarios"] = $this->empresa_admin->get_no_usuario($id_empresa, " order by tipo_usuario asc, id_usuario asc");
			$data['msg'] = "success";
			$this->load->view('vista_asignar_usuario_empresa_admin',$data);
		}
		else{
			$data['usuarios'] = null;
			$data['msg'] = "error";
			//$this->load->view('vista_detalle_usuario_admin',$data);
			echo "Error: no se pudo cargar el listado";
		}
	}
	
	function form_editar_empresa($id_empresa)
	{
 		if($this->form_validation->is_natural_no_zero($id_empresa))
		{
			$data['empresa'] = $this->empresa_admin->view_empresa($id_empresa);
			
			//$this->load->model('usuario_admin_modelo','user_admin');
			$data["usuarios"] = $this->empresa_admin->get_empresa_usuario($id_empresa, " order by tipo_usuario asc, nombre_usuario asc");	
			$data['msg'] = "success";
			$this->load->view('vista_editar_empresa_admin',$data);
		}
		else{
			$data['empresa'] = null;
			$data['msg'] = "error";
			
			echo "Error: no se pudo cargar el registro";
		}
	}
 
	
	function crear_empresa()
	{	
		$config = array(
		       array(
		             'field'   => 'nombre',
		             'label'   => 'Nombre de la Empresa',
		             'rules'   => 'required|max_length[50]'
		          ),
		       array(
		             'field'   => 'codigo',
		             'label'   => 'Codigo',
		             'rules'   => 'required|max_length[50]'
		          ));
		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run() == FALSE)
		{
			$this->form_crear_empresa();
		}
		else{
			$data['nombre'] = $this->input->get_post("nombre");
			$data['codigo'] = $this->input->get_post("codigo");
			$id = $this->empresa_admin->insert_empresa($data);
			
			$this->form_listar_empresa();
		}
	}
	
	
	function editar_empresa()
	{	
		$config = array(
		       array(
		             'field'   => 'nombre',
		             'label'   => 'Nombre de la Empresa',
		             'rules'   => 'required|max_length[50]'
		          ),
		       array(
		             'field'   => 'codigo',
		             'label'   => 'Codigo',
		             'rules'   => 'required|max_length[50]'
		          ));
		$this->form_validation->set_rules($config);
		
		
		$data['id_empresa'] = $this->input->get_post("id_empresa"); 
		$data['nombre'] = $this->input->get_post("nombre");
		$data['codigo'] = $this->input->get_post("codigo");
		
		
		
		if($this->form_validation->run() == TRUE)
		{
			$this->empresa_admin->update_empresa($data);
			$data['empresa'] = $this->empresa_admin->view_empresa($data['id_empresa']);
			$data['mensaje'] = "Operacion realizada con exito";
			$this->form_editar_empresa($data['id_empresa']);
			
		
		}
		else{
			$this->form_editar_empresa($data['id_empresa']);
 
		}
	} 
	
	
	function ver_empresa($id)
	{
		if($this->form_validation->is_natural_no_zero($id))
		{
			$data['query_row'] = $this->empresa_admin->view_empresa($id);
			$data['msg'] = "success";
			$this->load->view('',$data);
		}
		else{
			$data['query_row'] = null;
			$data['msg'] = "error";
			$this->load->view('',$data);
		}
	}
	
	function eliminar_empresa($id)
	{
		if($this->form_validation->is_natural_no_zero($id))
		{
			$this->empresa_admin->delete_empresa($id);
			$data['msg'] = "success";
			//$this->load->view('',$data);
			$this->get_empresa_list();
		}
		else{
			$data['msg'] = "error";
			$this->load->view('',$data);
		}
	}
	
	
	function eliminar_usuario_empresa($id_empresa, $id_usuario)
	{
			$this->empresa_admin->eliminar_usuario_empresa($id_usuario, $id_empresa);
		
			 redirect("/empresa_admin/form_editar_empresa/$id_empresa", 'refresh');    
	}
	
	
	function add_usuario_empresa()
	{ 
		$id_empresa = $this->input->post("id_empresa");
		$usuarios = $this->input->post("usuarios");
		
		foreach($usuarios as $usuario)
		{ 
		//echo "add_usuario_empresa($usuario, $id_empresa)";
		$this->empresa_admin->add_usuario_empresa($usuario, $id_empresa);
		}
		echo '<body onload="opener.location.reload(); window.close();"></body>';
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
	
	function get_lista_empresa_gestion()
	{
		$usuario = $this->session->userdata("id_usuario"); //captura el id del usuario que está en sesión...
		$data["empresas_usuario"] = $this->empresa_admin->get_empresas_supervisor($usuario,""); //obtiene la lista de empresas asociadas al usuario
		$this->form_seleccion_empresa($data);
	}
	
	
	
	//obtiene la empresa seleccionada y envia todos los datos al controlador principal
	function set_empresa_selected($id_empresa)
	{
		
		$this->session->unset_userdata('campana');
		$this->session->unset_userdata('campana_id_campana');
		$this->session->set_userdata('empresa',$id_empresa);
		redirect('principal_gestion/index');
	}
	
	
	
	
}
?>
