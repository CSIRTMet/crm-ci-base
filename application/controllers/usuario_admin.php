<?php

class Usuario_admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_admin_modelo','user_admin');
		$this->load->helper(array('url','form'));
		$this->load->library('uri','form_validation');
	}

	function index()
	{
		$this->load->view('');
	}
	
	function form_listar_usuario()
	{
		// implementar posiblemente los limites si hay un grid segmentado, 
		//$limit1 = "Limit ".$this->uri->segment(3).", ".$this->uri->segment(4);
		// luego ingresar limite como parámetro a la función get_usuario del modelo...
		
		$data["title"] = "Lista de Usuarios";
		$data["usuarios"] = $this->user_admin->get_usuario(" order by tipo_usuario asc , id_usuario asc");
		$this->load->view('vista_listar_usuario_admin',$data);
	}
	
	function crear_usuario()
	{	
		$config = array(
		       array(
		             'field'   => 'rut',
		             'label'   => 'RUT Usuario',
		             'rules'   => 'required|max_length[15]'
		          ),
		       array(
		             'field'   => 'nombre_usuario',
		             'label'   => 'Nombre de Usuario',
		             'rules'   => 'required|max_length[20]|xss_clean'
		          ),
			   array(
		             'field'   => 'clave',
		             'label'   => 'Contraseña',
		             'rules'   => 'required|min_length[4]|max_length[20]|xss_clean'
		          ),
			   array(
		             'field'   => 'nombre',
		             'label'   => 'Nombre',
		             'rules'   => 'required|max_length[50]'
		          ),
			   array(
		             'field'   => 'tipo_usuario',
		             'label'   => 'Tipo de Usuario',
		             'rules'   => 'required|is_natural_no_zero'
		          ));
		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('vista_crear_usuario_admin');
		}
		else{
			$data['rut'] = $this->input->get_post("rut");
			$data['nombre_usuario'] = $this->input->get_post("nombre_usuario");
			$data['clave'] = $this->input->get_post("clave");
			$data['nombre'] = $this->input->get_post("nombre");
			$data['tipo_usuario'] = $this->input->get_post("tipo_usuario");
			$id = $this->user_admin->insert_usuario($data);
			
			$this->form_listar_usuario();
			//$this->load->view('');
		}
	}
	
	
	
	function editar_usuario()
	{
		$config = array(
		       array(
		             'field'   => 'id_usuario',
		             'label'   => 'Id del Usuario',
		             'rules'   => 'required|is_natural_no_zero'
		          ),
		       array(
		             'field'   => 'rut',
		             'label'   => 'RUT Usuario',
		             'rules'   => 'required|max_length[15]'
		          ),
		       array(
		             'field'   => 'nombre_usuario',
		             'label'   => 'Nombre de Usuario',
		             'rules'   => 'required|max_length[20]|xss_clean'
		          ),
			   array(
		             'field'   => 'clave',
		             'label'   => 'Contraseña',
		             'rules'   => 'required|min_length[4]|max_length[20]|xss_clean'
		          ),
			   array(
		             'field'   => 'nombre',
		             'label'   => 'Nombre',
		             'rules'   => 'required|max_length[50]'
		          ),
			   array(
		             'field'   => 'tipo_usuario',
		             'label'   => 'Tipo de Usuario',
		             'rules'   => 'required|is_natural_no_zero'
		          ));
		$this->form_validation->set_rules($config);
		
		$data['id_usuario'] = $this->input->get_post("id_usuario");
		$data['rut'] = $this->input->get_post("rut");
		$data['nombre_usuario'] = $this->input->get_post("nombre_usuario");
		$data['clave'] = $this->input->get_post("clave");
		$data['nombre'] = $this->input->get_post("nombre");
		
		$data['tipo_usuario'] = $this->input->get_post("tipo_usuario");
		if($this->form_validation->run() == TRUE)
		{			
			$this->user_admin->update_usuario($data);
			$data['usuario'] = $this->user_admin->view_usuario($data['id_usuario']);
			$data['mensaje'] = "Operacion realizada con exito";
			$this->load->view('vista_editar_usuario_admin',$data); 	
		}	
		
		else
		{
		$data['usuario'] = $this->user_admin->view_usuario($data['id_usuario']);
		
		$this->load->view('vista_editar_usuario_admin',$data); 	
		}		
	}
	
	function form_editar_usuario($id_user)
	{
		if($this->form_validation->is_natural_no_zero($id_user))
		{
			$data['usuario'] = $this->user_admin->view_usuario($id_user);
			$data['msg'] = "success";
			$this->load->view('vista_editar_usuario_admin',$data);
		}
		else{
			$data['usuario'] = null;
			$data['msg'] = "error";
			//$this->load->view('vista_detalle_usuario_admin',$data);
			echo "Error: no se pudo cargar el registro";
		}
	}
	
	function form_crear_usuario()
	{
		
			$this->load->view('vista_crear_usuario_admin');
		
	}
	
	
	function eliminar_usuario($id_user)
	{
		if($this->form_validation->is_natural_no_zero($id_user))
		{
			$this->user_admin->delete_usuario($id_user);
			$data['msg'] = "success";
			//$this->load->view('',$data);
			$this->get_user_list();
		}
		else{
			$data['msg'] = "error";
			$this->load->view('',$data);
		}
	}
}
?>
