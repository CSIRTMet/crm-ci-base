<?php

class Script_gestion extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('gestion');
		$this->load->model('script_modelo','script');
		
		$this->load->library('ckeditor',array('instanceName' => 'CKEDITOR1','basePath' => base_url()."ckeditor/", 'outPut' => true));
		
		if(!is_supervisor_logged($this->session->userdata('is_logged_in'),$this->session->userdata('tipo_usuario'))){
			redirect(base_url().'index.php/usuario/logout', 'refresh');
		}
		if(!is_campana_set($this->session->userdata('campana'))){
			redirect(base_url().'index.php/campana_gestion/index', 'refresh');
		}
		
		
	}
	
	function index()
	{
		$data["scripts"] = $this->listar_script_gestion();
		$this->load->view('vista_listar_script_gestion',$data);
	}
	
	function listar_script_gestion()
	{
		$campana = $this->session->userdata('campana');
		$query = $this->script->get_script(0,$campana);
		return $query;
	}
	
	function form_editar_script_campana($id_script)
	{
		session_start();
		$_SESSION['KCFINDER'] = array();
		$_SESSION['KCFINDER']['disabled'] = false;
		$campana = $this->session->userdata('campana');
		$config = array();
		//  ckFinder
		$config['filebrowserBrowseUrl'] = base_url()."ckeditor/kcfinder/browse.php";
		$config['filebrowserImageBrowseUrl'] = base_url()."ckeditor/kcfinder/browse.php?type=images";
		$config['filebrowserUploadUrl'] = base_url()."ckeditor/kcfinder/upload.php?type=files";
		$config['filebrowserImageUploadUrl'] = base_url()."ckeditor/kcfinder/upload.php?type=images";
		$config['toolbar'] = array(
		array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Preview' ),
		array( 'Image', 'Link', 'Unlink', 'Anchor', 'Table','Rule','PageBreak', '-','Outdent','Indent','Blockquote'),
		array( 'PasteWord','Cut','Copy','Paste','PasteText', '-','Print','SpellCheck'  ),
		array( 'Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'  ),
		array( 'JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'   ),
			array( 'Style','FontFormat','FontName','FontSize','-', 'TextColor','BGColor' )
		);
		
 
 

		$data['script'] = $this->script->get_script($id_script, $campana );
		$cuerpo_script = $this->script->get_cuerpo_script($id_script, $campana);
		$campana = $this->session->userdata('campana');   

		$data['text_area'] = $this->ckeditor->editor("cuerpo", $cuerpo_script, $config);
		
		$this->load->view('vista_editar_script_gestion',$data);
	}
	
	function form_crear_script_campana()
	{
		session_start();
		$_SESSION['KCFINDER'] = array();
		$_SESSION['KCFINDER']['disabled'] = false;
		$config = array();
		//  ckFinder
		$config['filebrowserBrowseUrl'] = base_url()."ckeditor/kcfinder/browse.php";
		$config['filebrowserImageBrowseUrl'] = base_url()."ckeditor/kcfinder/browse.php?type=images";
		$config['filebrowserUploadUrl'] = base_url()."ckeditor/kcfinder/upload.php?type=files";
		$config['filebrowserImageUploadUrl'] = base_url()."ckeditor/kcfinder/upload.php?type=images";
		$config['toolbar'] = array(
		array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Preview' ),
		array( 'Image', 'Link', 'Unlink', 'Anchor', 'Table','Rule','PageBreak', '-','Outdent','Indent','Blockquote'),
		array( 'PasteWord','Cut','Copy','Paste','PasteText', '-','Print','SpellCheck'  ),
		array( 'Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'  ),
		array( 'JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'   ),
		array( 'Style','FontFormat','FontName','FontSize','-', 'TextColor','BGColor' )
		);

		
		$data['text_area'] = $this->ckeditor->editor("cuerpo", '' ,$config);
		
		$this->load->view('vista_crear_script_gestion',$data);
	}
	
	function eliminar_script_campana($id_script)
	{
		$id_campana = $this->session->userdata('campana_id_campana');
		$id_usuario = $this->session->userdata('id_usuario');
		
		$resultado = $this->script->eliminar_script_campana_gestion($id_script, $id_usuario , $id_campana);
		
		if($resultado == "ok")
		{
			redirect('script_gestion/index');
		}
		else
		{
			echo "NO SE PUDO ELIMINAR EL SCRIPT, VUELVA A INTENTAR MAS TARDE LA OPERACION";
		}
		
	}
	
 
 	function crear_script()
	{
		$id_campana = $this->session->userdata('campana_id_campana');
		$id_usuario = $this->session->userdata('id_usuario');
		$config = array(
		       array(
		             'field'   => 'nombre',
		             'label'   => 'Nombre',
		             'rules'   => 'required|max_length[30]'
		          ),
			   array(
		             'field'   => 'descripcion',
		             'label'   => 'Descripcion',
		             'rules'   => 'required|max_length[50]'
		          )
				  );
		$this->form_validation->set_rules($config);
		
		$data['id_campana'] = $id_campana;
		$data['nombre'] = $this->input->get_post("nombre");
		$data['descripcion'] = $this->input->get_post("descripcion");
		$data['estado'] = $this->input->get_post("estado");
		$data['cuerpo'] = $this->input->get_post("cuerpo");
		$data['id_creador'] = $id_usuario;
		$data['id_modificador'] = $id_usuario;
		
		if($this->form_validation->run() == TRUE){
			$this->script->crear_script($data);
			$this->index();

		}
		else{
			$data['mensaje'] = "Script no pudo ser creado..."; 
			$this->form_crear_script_campana();
		}
	}
	
	
	
	
	
	function editar_script()
	{
		$id_campana = $this->session->userdata('campana_id_campana');
		$id_usuario = $this->session->userdata('id_usuario');
		$config = array(
		       array(
		             'field'   => 'nombre',
		             'label'   => 'Nombre',
		             'rules'   => 'required|max_length[30]'
		          ),
			   array(
		             'field'   => 'descripcion',
		             'label'   => 'Descripcion',
		             'rules'   => 'required|max_length[50]'
		          )
				  );
		$this->form_validation->set_rules($config);
		$data['id_script'] = $this->input->get_post("id_script");
		

		if($this->form_validation->run() == FALSE)
		{
			$this->form_editar_script_campana($data['id_script']);
		}
		else{
			$data['id_campana'] = $id_campana;
			$data['id_script'] = $this->input->get_post("id_script");
			$data['nombre'] = $this->input->get_post("nombre");
			$data['descripcion'] = $this->input->get_post("descripcion");
			$data['estado'] = $this->input->get_post("estado");
			$data['cuerpo'] = $this->input->get_post("cuerpo");		 
			$data['id_modificador'] = $id_usuario;
			$this->script->editar_script($data);
			$this->index();
			 
			 
			 
		}
	}
	
}
?>
