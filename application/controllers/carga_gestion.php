<?php

class Carga_gestion extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('gestion');
		$this->load->helper(array('form', 'url'));
		$this->load->model('carga_gestion_modelo','carga_gestion_modelo');
		$this->load->library('grocery_CRUD');
		
		if(!is_supervisor_logged($this->session->userdata('is_logged_in'),$this->session->userdata('tipo_usuario'))){
			redirect(base_url().'index.php/usuario/logout', 'refresh');
		}
		if(!is_campana_set($this->session->userdata('campana'))){
			redirect(base_url().'index.php/campana_gestion/index', 'refresh');
		}
	}
	
	function index()
	{
		$this->form_listar_carga_gestion();

	}
	
	function form_listar_carga_gestion()
	{

		try {
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->where('id_campana', $this->session->userdata('campana'));
			$crud->set_table('carga');
			$crud->set_subject('Carga');
			$crud->required_fields('nombre', 'nombre_archivo');
			$crud->columns('id_carga', 'nombre', 'nombre_archivo','fecha');
			$crud->set_field_upload('nombre_archivo', 'assets/uploads/files');
			$crud->edit_fields('nombre');
			$crud->unset_fields('fecha','id_tipo_carga', 'estado_carga', 'estado_segmentacion');
			$crud->change_field_type('id_campana', 'hidden', $this->session->userdata('campana'));
			$crud->change_field_type('id_tipo_carga', 'hidden', 1);
			$crud->change_field_type('id_usuario', 'hidden', $this->session->userdata('usuario'));
			$crud->change_field_type('tipo_campana', 'hidden', 2);
			//$crud->display_as('nombre_archivo', 'Archivo');
			$crud->order_by('id_carga','desc');
			
			


			$crud->callback_after_upload(array($this, 'carga_callback_after_upload'));

			$crud->callback_after_insert(array($this, 'carga_callback_after_insert'));


			$data = $crud->render();

			$this->load->view('vista_listar_carga_gestion',$data);
		} catch (Exception $e) {
			show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
		}


	}

	function carga_callback_after_upload($uploader_response, $field_info, $files_to_upload) {

		//$ruta_archivo = $_SERVER['DOCUMENT_ROOT'] . '/kubo_ibr/' . $field_info->upload_path . '/' . $uploader_response[0]->name;
		$ruta_archivo = $_SERVER['DOCUMENT_ROOT'] . '/' . $field_info->upload_path . '/' . $uploader_response[0]->name;
		$this->session->set_userdata("ruta_archivo", $ruta_archivo);

       return true;//$this->archivoCumpleFormato($ruta_archivo, "extranjera");

   }
   function carga_callback_after_insert($post_array, $primary_key) {
   	$this->load->model('Carga_gestion_modelo');
   	$nombre_archivo = "";

   	$ruta_archivo = $this->session->userdata('ruta_archivo');



   	//$this->Carga_gestion_modelo->cargar_archivo($ruta_archivo, $nombre_archivo, $primary_key);
   	$id_campana= $this->session->userdata('campana');
   	$this->Carga_gestion_modelo->cargar_archivo($ruta_archivo, $primary_key, $id_campana);

   	$this->session->unset_userdata("ruta_archivo");
   	return true;
   }




   function form_crear_carga()
   {
   	$data['tipo_carga'] = $this->db->get('tipo_carga');
   	$data['mensaje'] 		= '';
   	$this->load->view('vista_crear_carga_gestion',$data);
   }

   function crear_carga_gestion()
   {
   	$config = array(
   		array(
   			'field'   => 'nombre',
   			'label'   => 'Nombre de Carga',
   			'rules'   => 'required|max_length[50]'
   			),
   		array(
   			'field'   => 'id_tipo_carga',
   			'label'   => 'Tipo',
   			'rules'   => 'required|is_natural_no_zero'
   			),
   		array(
   			'field'   => 'id_campana',
   			'label'   => 'Campa�a',
   			'rules'   => 'required|is_natural_no_zero'
   			));
   	$this->form_validation->set_rules($config);

   	$config['upload_path'] = './subidos/cargas/';
   	$config['allowed_types'] = 'csv|txt';
   	$config['max_size']	= '100';

   	$this->load->library('upload', $config);

   	$data['id_campana'] = $this->input->get_post("id_campana");
   	$data['nombre'] = $this->input->get_post("nombre");
   	$data['id_tipo_carga'] = $this->input->get_post("id_tipo_carga");
   	$data['id_usuario'] = $this->session->userdata('id_usuario');
   	$data['estado_carga'] = 0;
   	$data['mensaje'] = '';
   	if($this->form_validation->run() == TRUE){
   		if ( ! $this->upload->do_upload())
   		{

   			$data['mensaje'] = $this->upload->display_errors();
   			$this->load->view('vista_crear_carga_gestion',$data);
   		}
   		else 
   		{
   			$id_campana = $this->session->userdata('campana');
   			$data['mensaje'] 	= $this->upload->data();
   			$item = $this->upload->data();
   			$data['ruta'] = $item["file_path"];
   			$data['archivo'] = $item["file_name"];
   			$id_carga = $this->carga_gestion_modelo->add_carga($data);
   			$this->carga_gestion_modelo->cargar_archivo($data['ruta'].'/'.$data['archivo'], $id_carga, $id_campana);
   			echo '<body onload="opener.location.reload(); window.close();"></body>';
   		}
   	}
   	else{
   		$data['msg'] = "Carga no pudo ser creada..."; 
   		$this->form_crear_carga();
			//$this->load->view('vista_crear_carga_gestion',$data);

   	}
   }





   function borrar_carga($id)
   {
   	$this->carga_gestion_modelo->del_carga($id);
   	redirect(base_url().'index.php/carga_gestion/index', 'refresh');
   }


}
?>
