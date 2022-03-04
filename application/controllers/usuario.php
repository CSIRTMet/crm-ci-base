<?php
class Usuario extends CI_Controller {       	
		
		function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
	}
	
	function index()
	{
		$this->load->library('table');
		$this->load->model('Usuario_modelo');
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'index.php/usuario/index/';
		$config['total_rows'] = $this->db->count_all('usuario');
		$config['per_page'] = '4'; 
		$config['full_tag_open'] = '<p>';
    		$config['full_tag_close'] = '</p>';

		$this->pagination->initialize($config);

	    $data['title']   = "Mis Usuarios";

		$data['heading'] = "Mi cabezera";
		$data['results'] = $this->Usuario_modelo->get_usuario(0,$config['per_page'],$this->uri->segment(3));
		
		// load the HTML Table Class
		//$this->load->library('table');
		//$this->table->set_heading('ID', 'rut', 'nombre_usuario', 'usuario','tipo_usuario');
		// load the view
		$this->load->view('lista_usuario', $data);
	}
	
	
function ingresar_usuario(){
		$this->load->view('vista_usuario');
	}
	function edita_usuario($id_usuario){
		$this->load->library('table');
		$this->load->model('Usuario_modelo');
		$data['results'] = $this->Usuario_modelo->get_usuario($id_usuario,0,0);
		$this->load->view('usuario_edit', $data);
	}
	function ingresa_usuario(){
				
		$config = array(
		       array(
		             'field'   => 'txt_rut',
		             'label'   => 'rut',
		             'rules'   => 'required'
		          ),
		       array(
		             'field'   => 'txt_nombre_usuario',
		             'label'   => 'nombre_usuario',
		             'rules'   => 'required'
		          ),
		       array(
		             'field'   => 'txt_clave',
		             'label'   => 'clave',
		             'rules'   => 'required'
		          ),   
		       array(
		             'field'   => 'txt_nombre',
		             'label'   => 'nombre',
		             'rules'   => 'required'
		          )
		    );
		
		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('vista_usuario');
		}else{
			$this->load->model('Usuario_modelo');
			$rut = $this->input->get_post('txt_rut');			
			$nombre_usuario = $this->input->get_post('txt_nombre_usuario');
			$clave = $this->input->get_post('txt_clave');
			$nombre = $this->input->get_post('txt_nombre');
			$tipo_usuario = $this->input->get_post('tipo_usuario');
			
			$id = $this->Usuario_modelo->set_usuario(0,$rut,$nombre_usuario,$clave,$nombre,$tipo_usuario);
			if($id == 1){
				$status = "Usuario agregado con exito";
				$this->index();
			}else{
				$status = "error al agregar usuario";
				$this->load->view('vista_usuario');	
			}
		}
	}
	
	
	function actualiza_usuario()
	{
		$config = array(
		       array(
		             'field'   => 'txt_id_usuario',
		             'label'   => 'id_usuario',
		             'rules'   => 'required'
		          ),	
		       array(
		             'field'   => 'txt_rut',
		             'label'   => 'rut',
		             'rules'   => 'required'
		          ),
		       array(
		             'field'   => 'txt_nombre_usuario',
		             'label'   => 'nombre_usuario',
		             'rules'   => 'required'
		          ),
		       array(
		             'field'   => 'txt_clave',
		             'label'   => 'clave',
		             'rules'   => 'required'
		          ),   
		       array(
		             'field'   => 'txt_nombre',
		             'label'   => 'nombre',
		             'rules'   => 'required'
		          )
		    );
		
		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('vista_usuario');
		}else{
			$this->load->model('Usuario_modelo');
			$id_usuario = $this->input->get_post('txt_id_usuario');			
			$rut = $this->input->get_post('txt_rut');			
			$nombre_usuario = $this->input->get_post('txt_nombre_usuario');
			$clave = $this->input->get_post('txt_clave');
			$nombre = $this->input->get_post('txt_nombre');
			$tipo_usuario = $this->input->get_post('tipo_usuario');
			
			$id = $this->Usuario_modelo->set_usuario($id_usuario,$rut,$nombre_usuario,$clave,$nombre,$tipo_usuario);
			if($id == 1){
				$status = "Usuario actualizado con exito";
				$this->index();
			}else{
				$status = "error al actualizar usuario";
				$this->load->view('vista_usuario');	
			}
		}
	}
	
	
	
	/**
	
	FUNCIONES DE LOGIN 
	-LOGIN : despliega el formulario de login
	-VALIDAR_USUARIO : comprueba credenciales
	-LOGOUT : termina sesion y redirige a login
	
	**/
	function login()
	{
	//$this->output->cache(3);
	$this->load->view('vista_login');		
	}
	

	function validar_usuario()
	{		
		$this->load->model('Usuario_modelo');
		$nombre_usuario = $this->input->post('txt_nombre_usuario');
		$clave = $this->input->post('txt_clave');
		$anexo = $this->input->post('txt_anexo');
		$ip = $this->input->post('hidden_ip');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt_nombre_usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('txt_clave', 'Clave', 'required');
		$this->form_validation->set_rules('txt_anexo', 'Anexo', 'required|is_natural_no_zero|min_length[3]|max_length[4]');
		
		$this->form_validation->set_message('is_natural_no_zero', 'Debe ingresar un valor numerico para %s');
		$this->form_validation->set_message('min_length', '%s debe contener al menos 3 digitos');
		$this->form_validation->set_message('max_length', '%s debe contener máximo 4 digitos');
		$this->form_validation->set_message('required', 'Usted debe ingresar %s');
		
		$success = $this->form_validation->run();
		
		/*APLICAR REGLA DE VALIDACION*/
		/* 
		1= admin
		2= supervisor
		3= agente
		
		*/
		//comprueba resultados 
		if ($success) { 
			$query = $this->Usuario_modelo->validar_usuario($nombre_usuario,$clave,$anexo,$ip);
			
			//echo $query." -- ";
			//echo var_dump($this->session->userdata);
			//exit;
			if($query){
				if($this->session->userdata('tipo_usuario') == 1){
					redirect(base_url().'index.php/principal_admin', 'refresh');
					
				}
				else if($this->session->userdata('tipo_usuario') == 2){ 
					redirect(base_url().'index.php/empresa_admin/get_lista_empresa_gestion');
				}else{
					redirect(base_url().'index.php/empresa/get_lista_empresa');
					//redirect(base_url().'index.php/principal', 'refresh');
				}
			}else{ // incorrect username or password
				//redirect(base_url().'index.php/usuario/login', 'refresh');
				$data['mensaje'] = 'El Usuario no existe o es inv&aacute;lido';
				$this->load->view('vista_login',$data);
			}
		}else { $this->load->view('vista_login'); }
	}	

	function logout()
	{
		$this->session->sess_destroy();
		$this->login();
	}
	
	
	
	
	function get_ejecutivos_por_lista(){
	  $this->load->model('usuario_gestion_modelo','user');
	   $id_lista =  $this->input->get_post("id_lista");
	   
		 $ejecutivos = $this->user->get_ejecutivos_por_lista($id_lista);
			if(!empty($ejecutivos))
			{
				echo "<option value='0' selected>* Ejecutivo *</option>";
				foreach($ejecutivos as $item):
					echo "<option value='".$item->id_usuario."'>".$item->nombre."</option>";
				endforeach;
			}
			else
			{
			    echo "<option value='0' selected>--</option>";
			}
	}
	
}


